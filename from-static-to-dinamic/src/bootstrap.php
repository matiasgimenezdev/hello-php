<?php
    require __DIR__."/../vendor/autoload.php";
    
    use PAW\Core\Router;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    $logger = new Logger("mvc-app");
    $logger -> pushHandler(new StreamHandler(__DIR__."/../logs/app.log", LOGGER::DEBUG));
    
    $whoops = new \Whoops\Run; // Crea una instancia de la clase "Run" de la libreria "Whoops".
    $whoops -> pushHandler(new \Whoops\Handler\PrettyPageHandler); // Crea una instancia de la clase "PrettyHandler" de la libreria "Whoops\Handler".
    $whoops -> register();

    $router = new Router;
    $router -> get("/", "PageController@index");
    $router -> get("/about", "PageController@about");
    $router -> get("/services", "PageController@services");
    $router -> get("/contact", "PageController@contact");
    $router -> post("/contact", "PageController@contactProcess");
    $router -> get("/notFound", "ErrorController@notFound");
    $router -> get("/internalError", "ErrorController@internalError");

?>