<?php
    namespace PAW\App\Controllers;
    use PAW\App\Models\Author;
    use PAW\Core\AbstractController;

    class AuthorController extends AbstractController{

        /* Definimos el nombre del modelo para que, al instanciar el controlador,
            tambien se instancie el modelo asociado. */
        public ?string $modelName = Author::class; // Equivalente a PAW\App\Models\Author (full path a Author.php)

        public function index() {

        }

        public function get() {
        }

        public function edit() {
        }

        public function set() {
        }
    }
?>