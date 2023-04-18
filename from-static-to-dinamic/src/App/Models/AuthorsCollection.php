<?php 
    namespace PAW\App\Models;
    use PAW\Core\AbstractModel;
    use PAW\App\Models\Author;

    class AuthorsCollection extends AbstractModel{
        public $table = "authors";

        // Crea tantos 'Author' como filas de la tabla de author existan.
        public function getAll() {
            $authors = $this -> queryBuilder -> select($this-> table);
            $authorsCollection = [];
            foreach($authors as $author) {
                $authorInstance = new Author;
                $authorInstance -> set($author);
                $authorsCollection[] = $authorInstance;
            }
            // Retorna un array de instancias de 'Author'.
            return $authorsCollection;
        }

        public function get($id){
            $author = new Author;
            $author -> setQueryBuilder($this -> queryBuilder);
            $author -> load($id);
            return $author;
        }
    }

?>