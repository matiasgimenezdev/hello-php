<?php 
    namespace PAW\Core\Traits;

    use Monolog\Logger;

    trait Loggable {
        public $logger;

        public function setLogger(Logger $logger) {
            $this -> logger = $logger;
        }
    }
?>