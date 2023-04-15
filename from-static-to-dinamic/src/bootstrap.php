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
    $router -> loadRoutes("/", "PageController@index");
    $router -> loadRoutes("/about", "PageController@about");
    $router -> loadRoutes("/services", "PageController@services");
    $router -> loadRoutes("/contact", "PageController@contact");
    $router -> loadRoutes("/notFound", "ErrorController@notFound");
    $router -> loadRoutes("/internalError", "ErrorController@internalError");

?>