<?php

namespace App\Controllers\Admin;

class SaveBookController {
    public function index(): void {
        view('saveBook', 'admin', [], 'layouts.layout');
    }

    public function saveBookShow(string $id): void {
        view('saveBook-show', 'admin', ['bookId' => $id], 'layouts.layout');
    }

    public function update(string $id): void {
        http_response_code(501);
        echo "Update do saveBook {$id} ainda nao foi implementado.";
    }
}
