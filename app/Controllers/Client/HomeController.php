<?php

namespace App\Controllers\Client;

class HomeController {
    public function index(): void {
        $data['teste'] = 'teste';
        view('home', 'client', $data, 'layouts.layout');
    }
}
