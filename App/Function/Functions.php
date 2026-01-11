<?php

class Functions
{
    public function dump($info): void
    {
        echo '<pre>';
        echo $info;
        echo '</pre>';
        die();
    }

    public function view($view): String
    {
        $explode = explode('.', $view);
        $map = [];

        foreach ($explode as $value) {
            array_push($map, ucfirst($value));
        }

        $view = implode('.', $map);
        $view = ucfirst(str_replace('.', '/', $view));

        return BASE_PATH . "Resources/Views/{$view}.php";
    }

    public function include($partial)
    {
        $explode = explode('.', $partial);
        $map = [];

        foreach ($explode as $value) {
            array_push($map, ucfirst($value));
        }

        $view = implode('.', $map);
        $view = ucfirst(str_replace('.', '/', $view));

        return BASE_PATH . "Resources/Views/{$view}.php";
    }

    public function title($title): String
    {
        return $title;
    }


    public function asset(string $custom, string $type, string $img = 'https://placehold.co/600x400'): String
    {
        if ($custom == 'img' && $type == 'img') {
            return "assets/img/{$img}";
        }

        if ($custom === "js" || $custom === "css") {
            return "/assets/custom/custom.{$type}";
        }

        return $img;
    }


    public function notFound(): String
    {
        return BASE_PATH . "Resources/Views/404/NotFound.php";
    }
}
