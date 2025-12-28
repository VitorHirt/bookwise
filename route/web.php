<?php
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = trim($uri, '/');

    $uri = str_replace('.php', '', $uri);

    if ($uri !== '' && file_exists(__DIR__ . '/' . $uri)) {
        return false;
    }

    switch ($uri) {
        case 'index':
            require __DIR__ . '/../controller/index.controller.php';
            break;
        case 'book':
            require __DIR__ . '/../controller/book.controller.php';
            break;
        default:
            http_response_code(404);
            echo 'Página não encontrada';
    }
