<?php

namespace App\Controllers\Admin;

class BookController {
    public function index(): void {
        view('book/book', 'admin', [], 'layouts.layout');
    }

    // GET

    public function create(): void {
        view('book/create', 'admin', [], 'layouts.layout');
    }

    public function edit(string $id): void {
        view('book/edit', 'admin', ['bookId' => $id], 'layouts.layout');
    }

    // POST

    // public function store(string $id): void {
    //     http_response_code(501);
    //     echo "Store do livro {$id} ainda nao foi implementado.";
    // }

    // public function update(string $id): void {
    //     http_response_code(501);
    //     echo "Update do livro {$id} ainda nao foi implementado.";
    // }

    // public function delete(string $id): void {
    //     http_response_code(501);
    //     echo "Delete do livro {$id} ainda nao foi implementado.";
    // }
}
