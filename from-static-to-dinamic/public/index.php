<?php
    require __DIR__."/../vendor/autoload.php";
    use PAW\App\Controllers\PageController; // Usamos el controlador.
    use PAW\App\Controllers\ErrorController; // Usamos el controlador.
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    $logger = new Logger("mvc-app");
    $logger -> pushHandler(new StreamHandler(__DIR__."/../logs/app.log", LOGGER::DEBUG));
    $whoops = new \Whoops\Run; // Crea una instancia de la clase "Run" de la libreria "Whoops".
    $whoops -> pushHandler(new \Whoops\Handler\PrettyPageHandler); // Crea una instancia de la clase "PrettyHandler" de la libreria "Whoops\Handler".
    $whoops -> register();

    // $request_uri = parse_url($_SERVER["REQUEST_URI"]);
    // $path = $request_uri["path"];
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


    // echo "<pre>";
    // var_dump($_SERVER);
    // print_r($_SERVER);
    // die;

?>
