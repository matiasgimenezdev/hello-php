<?php
    require __DIR__."/../src/bootstrap.php";
    use PAW\App\Controllers\PageController; // Usamos el controlador.
    use PAW\App\Controllers\ErrorController; // Usamos el controlador.

    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $logger -> info("Request to: {$path}");
    
    $pageController = new PageController;
    $errorController = new ErrorController;
    if($path == "/"){
        $pageController -> index();
        $logger -> info("Successful request: 200");
    } else if($path == "/services"){
        $pageController -> services();
        $logger -> info("Successful request: 200");
    } else if($path == "/about"){
        $pageController -> about();
        $logger -> info("Successful request: 200");
    } else if($path == "/contact"){
        $pageController -> contact();
        $logger -> info("Successful request: 200");
    } else {
        $errorController -> notFound();
        $logger -> info("Path not found: 404");
    
    };
?>
