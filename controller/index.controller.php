<?php
    $listaDeLivros = json_decode(file_get_contents(__DIR__ .'/../model/livros.json'), true);
    $views = 'book';
    require_once __DIR__ . '/../helpers/dump.php';
    require_once __DIR__ . '/../views/layout/layout.php';    
