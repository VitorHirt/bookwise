<?php

namespace App\Core;

use Closure;
use RuntimeException;

class Router {
    private const METHOD_OVERRIDE_KEY = '_method';

    private array $routes = [];
    private array $groupStack = [];
    private array $middlewareAliases = [];
    private array $namedRoutes = [];
    private $fallbackAction = null;
    private ?array $currentRoute = null;

    public function get(string $uri, array $action): RouteDefinition {
        return $this->addRoute('GET', $uri, $action);
    }

    public function post(string $uri, array $action): RouteDefinition {
        return $this->addRoute('POST', $uri, $action);
    }

    public function put(string $uri, array $action): RouteDefinition {
        return $this->addRoute('PUT', $uri, $action);
    }

    public function delete(string $uri, array $action): RouteDefinition {
        return $this->addRoute('DELETE', $uri, $action);
    }

    public function prefix(string $prefix): RouteRegistrar {
        return new RouteRegistrar($this, ['prefix' => $prefix]);
    }

    public function middleware(string|array $middleware): RouteRegistrar {
        return new RouteRegistrar($this, ['middleware' => $middleware]);
    }

    public function group(callable $callback, array $attributes = []): void {
        $this->groupStack[] = $this->mergeGroupAttributes($attributes);

        try {
            $callback();
        } finally {
            array_pop($this->groupStack);
        }
    }

    public function registerMiddleware(string $alias, string|callable $handler): void {
        $this->middlewareAliases[$alias] = $handler;
    }

    public function fallback(callable $action): void {
        $this->fallbackAction = $action;
    }

    public function dispatch(): void {
        $httpMethod = $this->resolveHttpMethod();
        $uri = $this->normalizeUri(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/');
        [$route, $routeParameters, $matchedUri] = $this->matchRoute($httpMethod, $uri);

        if ($route === null) {
            if ($this->fallbackAction !== null) {
                $this->invokeAction($this->fallbackAction);
                return;
            }

            http_response_code(404);
            $this->renderView('404/404');
            return;
        }

        $this->currentRoute = [
            'method' => $httpMethod,
            'uri' => $matchedUri,
            'name' => $route['name'],
        ];

        $this->runMiddlewares(
            $route['middleware'],
            function () use ($route, $routeParameters): void {
                $this->invokeAction($route['action'], $routeParameters);
            }
        );
    }

    public function nameRoute(string $method, string $uri, string $name): void {
        if (!isset($this->routes[$method][$uri])) {
            throw new RuntimeException("Rota [{$method} {$uri}] nao foi encontrada para receber o nome [{$name}].");
        }

        $this->routes[$method][$uri]['name'] = $name;
        $this->namedRoutes[$name] = $uri;
    }

    public function route(string $name): string {
        if (!isset($this->namedRoutes[$name])) {
            throw new RuntimeException("Rota nomeada [{$name}] nao foi registrada.");
        }

        return BASE_URL . $this->namedRoutes[$name];
    }

    public function currentRouteName(): ?string {
        return $this->currentRoute['name'] ?? null;
    }

    public function is(string|array $patterns): bool {
        $currentRouteName = $this->currentRouteName();

        if ($currentRouteName === null) {
            return false;
        }

        foreach ((array) $patterns as $pattern) {
            $regex = '/^' . str_replace('\*', '.*', preg_quote($pattern, '/')) . '$/';

            if (preg_match($regex, $currentRouteName) === 1) {
                return true;
            }
        }

        return false;
    }

    private function addRoute(string $method, string $uri, array $action): RouteDefinition {
        $attributes = $this->getCurrentGroupAttributes();
        $fullUri = $this->buildUri($attributes['prefix'], $uri);

        $this->routes[$method][$fullUri] = [
            'action' => $action,
            'middleware' => $attributes['middleware'],
            'name' => null,
        ];

        return new RouteDefinition($this, $method, $fullUri);
    }

    private function getCurrentGroupAttributes(): array {
        $attributes = [
            'prefix' => '',
            'middleware' => [],
        ];

        foreach ($this->groupStack as $group) {
            $attributes['prefix'] = $this->joinPaths($attributes['prefix'], $group['prefix']);
            $attributes['middleware'] = array_merge($attributes['middleware'], $group['middleware']);
        }

        return $attributes;
    }

    private function mergeGroupAttributes(array $attributes): array {
        return [
            'prefix' => $attributes['prefix'] ?? '',
            'middleware' => $this->normalizeMiddleware($attributes['middleware'] ?? []),
        ];
    }

    private function normalizeMiddleware(string|array $middleware): array {
        return array_values(array_filter((array) $middleware));
    }

    private function buildUri(string $groupPrefix, string $uri): string {
        return $this->joinPaths($groupPrefix, $uri);
    }

    private function joinPaths(string $prefix, string $uri): string {
        $prefix = trim($prefix, '/');
        $uri = trim($uri, '/');

        if ($prefix === '' && $uri === '') {
            return '/';
        }

        if ($prefix === '') {
            return '/' . $uri;
        }

        if ($uri === '') {
            return '/' . $prefix;
        }

        return '/' . $prefix . '/' . $uri;
    }

    private function normalizeUri(string $uri): string {
        if ($uri === '' || $uri === '/') {
            return '/';
        }

        return '/' . trim($uri, '/');
    }

    private function matchRoute(string $httpMethod, string $uri): array {
        $routes = $this->routes[$httpMethod] ?? [];

        if (isset($routes[$uri])) {
            return [$routes[$uri], [], $uri];
        }

        foreach ($routes as $registeredUri => $route) {
            $parameters = $this->extractRouteParameters($registeredUri, $uri);

            if ($parameters !== null) {
                return [$route, $parameters, $registeredUri];
            }
        }

        return [null, [], null];
    }

    private function extractRouteParameters(string $registeredUri, string $requestedUri): ?array {
        if (!str_contains($registeredUri, '{')) {
            return null;
        }

        $parameterNames = [];
        $pattern = preg_replace_callback(
            '/\{([^}]+)\}/',
            function (array $matches) use (&$parameterNames): string {
                $parameterNames[] = $matches[1];

                return '___BW_ROUTE_PARAMETER___';
            },
            $registeredUri
        );

        if (!is_string($pattern)) {
            return null;
        }

        $pattern = preg_quote($pattern, '/');
        $pattern = str_replace('___BW_ROUTE_PARAMETER___', '([^/]+)', $pattern);

        $matched = preg_match('/^' . $pattern . '$/', $requestedUri, $matches);

        if ($matched !== 1) {
            return null;
        }

        array_shift($matches);

        return array_combine($parameterNames, $matches) ?: [];
    }

    private function resolveHttpMethod(): string {
        $method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');

        if ($method !== 'POST') {
            return $method;
        }

        $overriddenMethod = $_POST[self::METHOD_OVERRIDE_KEY]
            ?? $_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE']
            ?? null;

        if (!is_string($overriddenMethod) || $overriddenMethod === '') {
            return $method;
        }

        $overriddenMethod = strtoupper(trim($overriddenMethod));

        return in_array($overriddenMethod, ['PUT', 'DELETE'], true)
            ? $overriddenMethod
            : $method;
    }

    private function runMiddlewares(array $middlewares, Closure $destination): void {
        $pipeline = array_reduce(
            array_reverse($middlewares),
            function (Closure $next, string $middleware): Closure {
                return function () use ($middleware, $next): void {
                    $handler = $this->resolveMiddleware($middleware);

                    if (is_callable($handler)) {
                        $handler($next);
                        return;
                    }

                    $instance = new $handler();

                    if (!method_exists($instance, 'handle')) {
                        throw new RuntimeException("Middleware [{$middleware}] precisa definir o metodo handle().");
                    }

                    $instance->handle($next);
                };
            },
            $destination
        );

        $pipeline();
    }

    private function resolveMiddleware(string $middleware): string|callable {
        if (!isset($this->middlewareAliases[$middleware])) {
            throw new RuntimeException("Middleware [{$middleware}] nao foi registrado.");
        }

        return $this->middlewareAliases[$middleware];
    }

    private function invokeAction(array|callable $action, array $routeParameters = []): mixed {
        if (is_callable($action) && !is_array($action)) {
            return $action(...array_values($routeParameters));
        }

        if (is_array($action) && count($action) === 2) {
            [$controller, $actionMethod] = $action;

            $instance = new $controller();

            return $instance->$actionMethod(...array_values($routeParameters));
        }

        throw new RuntimeException('Acao de rota invalida.');
    }

    private function renderView(string $view, ?string $layout = null, array $data = []): void {
        $base = BASE_PATH . '/resources/views/';
        $viewFile = $base . str_replace('.', '/', $view) . '.php';

        if (!file_exists($viewFile)) {
            throw new RuntimeException('View não encontrada para renderização.');
        }

        extract($data);

        if ($layout === null) {
            require $viewFile;
            return;
        }

        $layoutFile = $base . str_replace('.', '/', $layout) . '.php';

        if (!file_exists($layoutFile)) {
            throw new RuntimeException('Layout não encontrado para renderização.');
        }

        ob_start();
        require $viewFile;
        ob_end_clean();

        ob_start();
        require $layoutFile;
        $layoutContent = ob_get_clean();

        echo View::renderStacks($layoutContent);
    }
}
