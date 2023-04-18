<?php
    require __DIR__."/../vendor/autoload.php";

    use PAW\Core\Router;
    use PAW\Core\Config;
    use PAW\Core\Request;
    use PAW\Core\Database\ConnectionBuilder;
    use PAW\Core\Database\QueryBuilder;

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    
    $config = new Config;
    $logger = new Logger("mvc-app");
    $logHandler = new StreamHandler($config -> getConfig("LOG_PATH"));
    $logHandler -> setLevel($config -> getConfig("LOG_LEVEL"));
    $logger -> pushHandler($logHandler);

    $request = new Request;

    $connectionBuilder = new ConnectionBuilder;
    $connectionBuilder -> setLogger($logger);
    $connectionBuilder -> make($config);
    
    $whoops = new \Whoops\Run; // Crea una instancia de la clase "Run" de la libreria "Whoops".
    $whoops -> pushHandler(new \Whoops\Handler\PrettyPageHandler); // Crea una instancia de la clase "PrettyHandler" de la libreria "Whoops\Handler".
    $whoops -> register();
    
    $router = new Router;
    $router -> setLogger($logger);
    $router -> get("/", "PageController@index");
    $router -> get("/about", "PageController@about");
    $router -> get("/services", "PageController@services");
    $router -> get("/contact", "PageController@contact");
    $router -> post("/contact", "PageController@contactProcess");
    $router -> get("/authors", "AuthorController@index");
    $router -> get("/author", "AuthorController@get");
    $router -> get("/author/edit", "AuthorController@edit");
    $router -> post("/author/edit", "AuthorController@set");


?>