<?php
    require __DIR__."/../vendor/autoload.php";
    use PAW\App\Controllers\PageController; // Usamos el controlador.
    use PAW\App\Controllers\ErrorController; // Usamos el controlador.

    $whoops = new \Whoops\Run; // Crea una instancia de la clase "Run" de la libreria "Whoops".
    $whoops -> pushHandler(new \Whoops\Handler\PrettyPageHandler); // Crea una instancia de la clase "PrettyHandler" de la libreria "Whoops\Handler".
    $whoops -> register();

    // $request_uri = parse_url($_SERVER["REQUEST_URI"]);
    // $path = $request_uri["path"];
    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    
    $pageController = new PageController;
    $errorController = new ErrorController;
    if($path == "/"){
        $pageController -> index();
    } else if($path == "/services"){
        $pageController -> services();
    } else if($path == "/about"){
        $pageController -> about();
    } else if($path == "/contact"){
        $pageController -> contact();
    } else {
        $errorController -> notFound();
    };


    // echo "<pre>";
    // var_dump($_SERVER);
    // print_r($_SERVER);
    // die;

?>
