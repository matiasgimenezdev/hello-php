<?php
    namespace PAW\Core;
    use PAW\Core\Exceptions\RouteNotFoundException;
    use PAW\Core\Request;
    use PAW\Core\Traits\Loggable;

    class Router  {
        use Loggable;

        public array $routes = [
            "GET" => [],
            "POST" => []
        ];

        public string $notFound = "/notFound";
        public string $internalError = "/internalError";

        public function __construct(){
            $this -> get($this -> notFound, "ErrorController@notFound");
            $this -> get($this -> internalError, "ErrorController@internalError");
        }

        public function loadRoutes($path, $action, $httpMethod = "GET") {
            $this -> routes[$httpMethod][$path] = $action;
        }

        public function get($path, $action) {
            $this -> loadRoutes($path, $action, "GET");
        }

        public function post($path, $action) {
            $this -> loadRoutes($path, $action, "POST");

        }

        public function exists($path, $httpMethod) {
            return array_key_exists($path, $this -> routes[$httpMethod]);
        }

        public function getController($path, $httpMethod) {
            if (!$this -> exists($path, $httpMethod)) {
                throw new RouteNotFoundException("There is no route for that path");
            }
            return explode('@', $this -> routes[$httpMethod][$path]);
        }

        public function call($controller, $method) {
            $controllerName = "PAW\\App\\Controllers\\{$controller}";
            $controllerInstance = new $controllerName;
            $controllerInstance -> $method();
        }

        public function direct(Request $request){
            try{
                list($path, $httpMethod) = $request -> route();
                list($controller, $method) = $this -> getController($path, $httpMethod);
                $this -> logger -> info(
                    "Status Code: 200",
                    [
                        "Path" => $path,
                        "Method" => $httpMethod
                    ]
                ) ;
            } catch (RouteNotFoundException $exception) {
                list($controller, $method) = $this -> getController($this -> notFound, "GET");
                $this -> logger -> debug(
                    "Status Code: 404 - Route Not Found",
                    ["ERROR" => $exception]
                );
            } catch (Exception $exception) {
                list($controller, $method) = $this -> getController($this -> internalError, "GET");
                $this -> logger -> error(
                    "Status Code: 500 - Internal server error",
                    ["ERROR" => $exception]
                );
            } finally {
                $this -> call($controller, $method);
            }
        }
    }

?>
