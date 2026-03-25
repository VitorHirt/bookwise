<?php

namespace App\Controllers\Admin;

use App\Services\Admin\BookDataTableService;

class BookController {
    public function index(): void {
        view('book/book', 'admin', [], 'layouts.layout');
    }

    // GET

    public function dataTables(): void {
        header('Content-Type: application/json; charset=UTF-8');

        $service = new BookDataTableService();

        echo json_encode($service->handle($_GET), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function create(): void {
        view('book/show/create', 'admin', [], 'layouts.layout');
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
