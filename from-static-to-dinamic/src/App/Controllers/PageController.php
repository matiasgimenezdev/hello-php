<?php 
    namespace PAW\App\Controllers;

    class PageController {
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

        public function index() {
            $titulo = "Hello world, ". htmlspecialchars($_GET['nombre'] ?? "PAW");
            require $this -> viewsDir . 'index.view.php';
        }

        public function services() {
            $titulo = "Services";
            $main = "Services page content";
            require $this -> viewsDir . 'services.view.php';
        }

        public function about() {
            $titulo = "About us";
            $main = "About us page content";
            require $this -> viewsDir . 'about.view.php';
        }

        public function contact() {
            $titulo = "Contact";
            $main = "Contact page content";
            require $this -> viewsDir . 'contact.view.php';
        }
    }
?>