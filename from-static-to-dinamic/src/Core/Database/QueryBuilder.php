<?php
    namespace PAW\Core\Database;
    use PDO;
    use PAW\Core\Traits\Loggable;

    class QueryBuilder {
        use Loggable;

        public function __construct(PDO $pdo) {
            $this -> pdo = $pdo;
        }

        public function select() {}
        public function insert() {}
        public function update() {}
        public function delete() {}
    }

?>
