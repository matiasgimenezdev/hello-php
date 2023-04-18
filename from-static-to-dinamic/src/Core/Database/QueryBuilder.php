<?php
    namespace PAW\Core\Database;
    use PDO;
    use PAW\Core\Traits\Loggable;

    class QueryBuilder {
        use Loggable;

        public function __construct(PDO $pdo) {
            $this -> pdo = $pdo;
        }

        public function select($table) {
            $query = "SELECT * FROM {$table}";
            $statement = $this -> pdo -> prepare($query);
            $statement -> setFetchMode(PDO::FETCH_ASSOC);
            $statement -> execute();
            return $statement -> fetchAll();
        }

        public function insert() {}
        public function update() {}
        public function delete() {}
    }

?>
