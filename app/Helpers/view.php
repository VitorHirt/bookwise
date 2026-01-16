<?php

function view(string $view, string $module, array $data = [], string $layout = 'layouts.app'): void {
    $base = BASE_PATH . '/resources/views/';

    // Caminho da view
    $viewFile = $base . $module . '/' . str_replace('.', '/', $view) . '.php';

      // Caminho do layout
    $layoutFile = $base . $module . '/' . str_replace('.', '/', $layout) . '.php';

    if (!file_exists($viewFile)) {
        throw new RuntimeException("View não encontrada: {$viewFile}");
    }

    if (!file_exists($layoutFile)) {
        throw new RuntimeException("Layout não encontrado: {$layoutFile}");
    }

    extract($data);

    ob_start();
    require $viewFile;
    $content = ob_get_clean(); // Captura o conteúdo da view

    require $layoutFile; /* O layout deve usar <?= $content ?> */
}