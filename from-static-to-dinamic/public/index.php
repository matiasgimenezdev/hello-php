<?php
    require __DIR__."/../src/bootstrap.php";
    use PAW\Core\Router;
    use PAW\Core\Exceptions\RouteNotFoundException;
    
    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    
    $router = new Router;
    $router -> loadRoutes("/", "PageController@index");
    $router -> loadRoutes("/about", "PageController@about");
    $router -> loadRoutes("/services", "PageController@services");
    $router -> loadRoutes("/contact", "PageController@contact");
    $router -> loadRoutes("/notFound", "ErrorController@notFound");
    $router -> loadRoutes("/internalError", "ErrorController@internalError");

    try {
        $router -> direct($path);
        $logger -> info("Successful request: 200", ["INFO" => $path]);
        
    } catch (RouteNotFoundException $exception) {
        $router -> direct("/notFound");
        $logger -> info("Status Code: 404 - Route Not Found", ["INFO" => $path]);
    } catch (Exception $exception) {
        $router -> direct("/internalError");
        $logger -> error("Status Code: 500 - Internal Server Error", ["ERROR" => $exception]);
    }
?>
