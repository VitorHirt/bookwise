<?php

namespace App\Core;

class RedirectResponse {
    public function to(string $url): never {
        header('Location: ' . $url);
        exit;
    }

    public function route(string $name): never {
        $this->to(Route::route($name));
    }
}
