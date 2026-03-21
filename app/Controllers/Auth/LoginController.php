<?php

namespace App\Controllers\Auth;

class LoginController {
    public function index(): void {
        $data = [];

        view('login', 'auth', $data, 'layouts.layout');
    }
}
