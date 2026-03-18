<?php

use App\Core\View;

/* Sections */
function section(string $name): void {
    View::start($name);
}

function endsection(): void {
    View::end();
}

function yieldSection(string $name, string $default = ''): void {
    View::yield($name, $default);
}

/* Stacks */
function push(string $name): void {
    View::push($name);
}

function endpush(): void {
    View::endPush();
}

function stack(string $name): void {
    View::stack($name);
}

/* Includes */
function includeView(string $path, array $data = []): void {
    $fullPath = BASE_PATH . '/resources/views/' . $path;

    if (!file_exists($fullPath)) {
        throw new RuntimeException("Arquivo não encontrado: {$fullPath}");
    }

    extract($data);
    include $fullPath;
}

/* Assets */
function asset(string $path): string {
    // Remove barras duplicadas no começo/fim
    $path = ltrim($path, '/');

    // Se você estiver rodando no localhost, ajuste BASE_URL
    $baseUrl = defined('BASE_URL') ? rtrim(BASE_URL, '/') : '';

    return "{$baseUrl}/{$path}";
}