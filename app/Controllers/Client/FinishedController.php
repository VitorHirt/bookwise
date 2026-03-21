<?php

namespace App\Controllers\Client;

class FinishedController {
    public function index(): void {
        $data['teste'] = 'teste';
        view('finished/finished', 'client', $data, 'layouts.layout');
    }
}

