<?php 
    namespace PAW\Core;
    use PAW\Core\AbstractModel;
    use PAW\Core\Database\QueryBuilder;
    
    class AbstractController {
        public string $viewsDir;
        public ?string $modelName = null;
        
        public function __construct() {
            /* Invocamos variables globales. Es una MALA practica. Buscar mejor implementacion
              ya sea implementando esas clases como Singleton o usando un contenedor de dependencias.  */
            global $connection, $logger; 
            $this -> viewsDir = __DIR__ . "/../App/Views/";

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
                ],
                [
                    "href" => "/authors",
                    "name" => "Authors",
                ]
            ]; 

            /* Los controladores que definan un nombre de modelo, 
                generaran esta instanciación del modelo asociado a ese
                controlador */
            if(!is_null($this -> modelName)){
                // Usamos las variables globales (incorrecto - Mejor usar Singleton o Contenedor de dependencias).
                $queryBuilder = new QueryBuilder($connection);
                $queryBuilder -> setLogger($logger);
                $model = new $this -> modelName;
                $model -> setQueryBuilder($queryBuilder);
                $this -> setModel($model);
            }
        }

        public function setModel(AbstractModel $model) {
            $this -> model = $model;
        }
    }
?>