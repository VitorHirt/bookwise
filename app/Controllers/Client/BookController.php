<?php

namespace App\Controllers\Client;

class BookController {
    public function index(): void {
        $data['teste'] = 'teste';
        view('book/book', 'client', $data, 'layouts.layout');
    }
}
