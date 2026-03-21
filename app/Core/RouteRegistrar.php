<?php

namespace App\Core;

class RouteRegistrar {
    public function __construct(
        private Router $router,
        private array $attributes = []
    ) {
    }

    public function prefix(string $prefix): self {
        $attributes = $this->attributes;
        $attributes['prefix'] = $this->joinPaths($attributes['prefix'] ?? '', $prefix);

        return new self($this->router, $attributes);
    }

    public function middleware(string|array $middleware): self {
        $attributes = $this->attributes;
        $attributes['middleware'] = array_merge(
            (array) ($attributes['middleware'] ?? []),
            array_values(array_filter((array) $middleware))
        );

        return new self($this->router, $attributes);
    }

    public function group(callable $callback): void {
        $this->router->group($callback, $this->attributes);
    }

    public function get(string $uri, array $action): RouteDefinition {
        return $this->captureRouteDefinition(function () use ($uri, $action): RouteDefinition {
            return $this->router->get($uri, $action);
        });
    }

    public function post(string $uri, array $action): RouteDefinition {
        return $this->captureRouteDefinition(function () use ($uri, $action): RouteDefinition {
            return $this->router->post($uri, $action);
        });
    }

    private function captureRouteDefinition(callable $callback): RouteDefinition {
        $route = null;

        $this->group(function () use ($callback, &$route): void {
            $route = $callback();
        });

        return $route;
    }

    private function joinPaths(string $prefix, string $uri): string {
        $prefix = trim($prefix, '/');
        $uri = trim($uri, '/');

        if ($prefix === '') {
            return $uri;
        }

        if ($uri === '') {
            return $prefix;
        }

        return $prefix . '/' . $uri;
    }
}
