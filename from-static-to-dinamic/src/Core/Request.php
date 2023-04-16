<?php 
    namespace PAW\Core;

    class Request {
        public function url() {
            return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        }

        public function method() {
            return parse_url($_SERVER["REQUEST_METHOD"], PHP_URL_PATH);
        }

        public function route() {
            return [
                $this -> url(),
                $this -> method()
            ];
        }
    }
?>