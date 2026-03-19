<?php

namespace App\Controllers\Client;

class SaveController {
    public function index(): void {
        $data['teste'] = 'teste';
        view('save/save', 'client', $data, 'layouts.layout');
    }
}
