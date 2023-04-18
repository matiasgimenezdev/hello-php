<?php
    namespace PAW\App\Controllers;
    use PAW\App\Models\AuthorsCollection;
    use PAW\Core\AbstractController;

    class AuthorController extends AbstractController{

        /* Definimos el nombre del modelo para que, al instanciar el controlador,
            tambien se instancie el modelo asociado. */
        public ?string $modelName = AuthorsCollection::class; // Equivalente a PAW\App\Models\AuthorsCollection (full path a AuthorsCollection.php)

        public function index() {
            $title = "Authors";
            $authors = $this -> model -> getAll();
            require $this -> viewsDir ."authors.index.view.php";
        }

        public function get() {
            global $request;
            $authorId = $request -> get("id");
            $author = $this -> model -> get($authorId);
            $title = "Author";
            require $this -> viewsDir . "author.show.view.php";
        }

        public function edit() {
        }

        public function set() {
        }
    }
?>