<?php

namespace App\Core\Middleware;

use App\Core\Route;
use Closure;
use RuntimeException;

class AuthMiddleware {
    public function handle(Closure $next): void {
        if (!isset($_SESSION['user'])) {
            try {
                header('Location: ' . Route::route('auth.login'));
            } catch (RuntimeException) {
                header('Location: ' . BASE_URL . '/');
            }

            exit;
        }

        $next();
    }
}
