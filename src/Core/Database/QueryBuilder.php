<?php
    namespace PAW\Core\Database;
    use PDO;
    use PAW\Core\Traits\Loggable;

    class QueryBuilder {
        use Loggable;

        public function __construct(PDO $pdo) {
            $this -> pdo = $pdo;
        }

        public function select($table, $params = []) {
            $where = "1 = 1"; // Valor por defecto del where en caso de que no se indiquen parametros.
            if(isset($params["id"])){
                $where = " id = :id";
            }

            $query = "SELECT * FROM {$table} WHERE {$where}";
            $statement = $this -> pdo -> prepare($query);
            if(isset($params["id"])){
                $statement -> bindValue(":id", $params["id"]);
            }
            $statement -> setFetchMode(PDO::FETCH_ASSOC);
            $statement -> execute();
            return $statement -> fetchAll();
        }

        public function insert() {}
        public function update() {}
        public function delete() {}
    }

?>
