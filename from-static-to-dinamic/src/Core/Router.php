<?php
    namespace PAW\Core;
    use PAW\Core\Exceptions\RouteNotFoundException;
    
    class Router {
        public array $routes;

        public function loadRoutes($path, $action) {
            $this -> routes[$path] = $action;
        }

        public function direct($path){
            
            if (!array_key_exists($path, $this -> routes)) {
                throw new RouteNotFoundException("There is no route for that path");
            }
            list($controller, $method) = explode('@', $this -> routes[$path]);
            $controllerName = "PAW\\App\\Controllers\\{$controller}";
            $controllerInstance = new $controllerName;
            $controllerInstance -> $method();
        }
    }

?>
