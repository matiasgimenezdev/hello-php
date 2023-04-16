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
            // $title = "Hello world, ". htmlspecialchars($_GET['nombre'] ?? "PAW");
            $title = "Home";
            require $this -> viewsDir . 'index.view.php';
        }

        public function services() {
            $title = "Services";
            $main = "Services page content";
            require $this -> viewsDir . 'services.view.php';
        }

        public function about() {
            $title = "About us";
            $main = "About us page content";
            require $this -> viewsDir . 'about.view.php';
        }

        public function contact($processed = false) {
            $title = "Contact";
            $main = "Contact page content";
            require $this -> viewsDir . 'contact.view.php';
        }

        public function contactProcess() {
            $form = $_POST;
            // Realizar alguna accion a partir de los datos del formulario.
            $this -> contact(true);
        }
    }
?>