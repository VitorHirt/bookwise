<?php 
    $uri = $_SERVER['REQUEST_URI'];

    $jsonPath = __DIR__ . '/../model/livros.json';
    $listaDeLivros = json_decode(file_get_contents($jsonPath), true);  
    $id = explode("/", $uri);
    $livro = array_filter($listaDeLivros, fn($livro) => $livro['id'] == (int) $id[3]);
    $livro = array_values($livro)[0];
    $views = 'book_book';
    
    require_once __DIR__ . '/../helpers/dump.php';
    require_once __DIR__ . '/../views/layout/layout.php';    
