<?php 
    namespace PAW\Core;

    use PAW\Core\Database\QueryBuilder;
    use PAW\Core\Traits\Loggable;

    class AbstractModel {
        use Loggable;

        public function setQueryBuilder(QueryBuilder $queryBuilder){
            $this -> queryBuilder = $queryBuilder;
        }
    }
?>