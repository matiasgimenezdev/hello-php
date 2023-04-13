<?php
    $titulo = "Hello world, ". htmlspecialchars($_GET['nombre'] ?? "PAW");
    $menu = [
        [
            "href" => "/",
            "name" => "Home",
        ],
        [
            "href" => "/about",
            "name" => "About us",
        ],
        [
            "href" => "/services",
            "name" => "Services",
        ],

    ];
    // echo "<pre>";
    // var_dump($menu);
    // die;

    require __DIR__ .'/../src/index.view.php';
?>
