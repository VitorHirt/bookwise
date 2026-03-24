<?php

namespace App\Controllers\Admin;

class FinishedController {
    public function index(): void {
        view('finished', 'admin', [], 'layouts.layout');
    }

    public function finishedShow(string $id): void {
        view('finished-show', 'admin', ['bookId' => $id], 'layouts.layout');
    }
}
