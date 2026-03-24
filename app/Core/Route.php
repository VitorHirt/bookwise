<?php

namespace App\Core;

use RuntimeException;

class Route {
    private static ?Router $router = null;

    public static function setRouter(Router $router): void {
        self::$router = $router;
    }

    public static function get(string $uri, array $action): RouteDefinition {
        return self::router()->get($uri, $action);
    }

    public static function post(string $uri, array $action): RouteDefinition {
        return self::router()->post($uri, $action);
    }

    public static function put(string $uri, array $action): RouteDefinition {
        return self::router()->put($uri, $action);
    }

    public static function delete(string $uri, array $action): RouteDefinition {
        return self::router()->delete($uri, $action);
    }

    public static function prefix(string $prefix): RouteRegistrar {
        return self::router()->prefix($prefix);
    }

    public static function middleware(string|array $middleware): RouteRegistrar {
        return self::router()->middleware($middleware);
    }

    public static function group(callable $callback): void {
        self::router()->group($callback);
    }

    public static function fallback(callable $action): void {
        self::router()->fallback($action);
    }

    public static function route(string $name): string {
        return self::router()->route($name);
    }

    public static function currentRouteName(): ?string {
        return self::router()->currentRouteName();
    }

    public static function is(string|array $patterns): bool {
        return self::router()->is($patterns);
    }

    private static function router(): Router {
        if (self::$router === null) {
            throw new RuntimeException('Router ainda nao foi definido para a facade Route.');
        }

        return self::$router;
    }
}
