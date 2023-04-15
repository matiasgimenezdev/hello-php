<?php
    namespace PAW\Core;
    use PAW\Core\Exceptions\RouteNotFoundException;
    
    class Router {
        public array $routes = [
            "GET" => [],
            "POST" => []
        ];

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
            return explode('@', $this -> routes[$httpMethod][$path]);
        }

        public function direct($path, $httpMethod = "GET"){
            if (!$this -> exists($path, $httpMethod)) {
                throw new RouteNotFoundException("There is no route for that path");
            }

            list($controller, $method) = $this -> getController($path, $httpMethod);
            $controllerName = "PAW\\App\\Controllers\\{$controller}";
            $controllerInstance = new $controllerName;
            $controllerInstance -> $method();
        }
    }

?>
