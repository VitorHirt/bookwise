<?php

namespace App\Core;

class Router {
    private array $routes = [];

    public function get(string $uri, array $action): void {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, array $action): void {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch(): void {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $action = $this->routes[$method][$uri] ?? null;

        if (!$action) {
            http_response_code(404);
            $this->renderView('404/404');
            return;
        }

        [$controller, $method] = $action;

        $instance = new $controller();
        $instance->$method();
    }

    private function renderView(string $view, ?string $layout = null, array $data = []): void {
        $base = BASE_PATH . '/resources/views/';
        $viewFile = $base . str_replace('.', '/', $view) . '.php';

        if (!file_exists($viewFile)) {
            throw new \RuntimeException('View não encontrada para renderização.');
        }

        extract($data);

        if ($layout === null) {
            require $viewFile;
            return;
        }

        $layoutFile = $base . str_replace('.', '/', $layout) . '.php';

        if (!file_exists($layoutFile)) {
            throw new \RuntimeException('Layout não encontrado para renderização.');
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
