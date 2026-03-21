<?php

namespace App\Core;

class RouteDefinition {
    public function __construct(
        private Router $router,
        private string $method,
        private string $uri
    ) {
    }

    public function name(string $name): self {
        $this->router->nameRoute($this->method, $this->uri, $name);

        return $this;
    }
}
