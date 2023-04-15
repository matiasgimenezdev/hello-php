<?php
    require __DIR__."/../vendor/autoload.php";

    $whoops = new \Whoops\Run; // Crea una instancia de la clase "Run" de la libreria "Whoops".
    $whoops -> pushHandler(new \Whoops\Handler\PrettyPageHandler); // Crea una instancia de la clase "PrettyHandler" de la libreria "Whoops\Handler".
    $whoops -> register();

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
        [
            "href" => "/contact",
            "name" => "Contact",
        ],

    ];

    // $request_uri = parse_url($_SERVER["REQUEST_URI"]);
    // $path = $request_uri["path"];
    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    
    
    if($path == "/"){
        $titulo = "Hello world, ". htmlspecialchars($_GET['nombre'] ?? "PAW");
        require __DIR__ .'/../src/index.view.php';
    } else if($path == "/services"){
        $titulo = "Services";
        $main = "Services page content";
        require __DIR__ .'/../src/services.view.php';
    } else if($path == "/about"){
        $titulo = "About us";
        $main = "About us page content";
        require __DIR__ .'/../src/about.view.php';
    } else if($path == "/contact"){
        $titulo = "Contact";
        $main = "Contact page content";
        require __DIR__.'/../src/contact.view.php';
    } else {
        http_response_code(404); // Le indica al web server el status code de la respuesta
        require __DIR__ .'/../src/not-found.view.php';
    };
    // echo "<pre>";
    // var_dump($_SERVER);
    // print_r($_SERVER);
    // die;

?>
