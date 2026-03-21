<?php

namespace App\Controllers\Client;

class FavoriteController {
    public function index(): void {
        $data['teste'] = 'teste';
        view('save/save', 'client', $data, 'layouts.layout');
    }
}
