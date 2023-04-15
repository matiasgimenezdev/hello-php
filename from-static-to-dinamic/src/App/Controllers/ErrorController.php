<?php 
    namespace PAW\App\Controllers;

    class ErrorController {
        public string $viewsDir;
        public $menu;
        
        public function __construct() {
            $this -> viewsDir = __DIR__ . "/../Views/";
            $this -> menu = [
                [
                    "href" => "/",
                    "name" => "Home",
                ],
                [
                    "href" => "/about",
                    "name" => "About us",
                ],
                [
                    "href" => "/services",
                    "name" => "Services",
                ],
                [
                    "href" => "/contact",
                    "name" => "Contact",
                ]
            ]; 
        }

        public function notFound() {
            http_response_code(404); 
            require $this -> viewsDir .'not-found.view.php';
        }

        public function internalError() {
            http_response_code(500); 
            require $this -> viewsDir .'internal-error.view.php';
        }
    }
?>
