<?php 
    namespace PAW\Core;
    
    // Libreria elegida
    use Dotenv\Dotenv;

    class Config{
        private array $configs;

        public function __construct() {
            $this -> loadConfig();
            $this -> configs["LOG_LEVEL"] = getenv("LOG_LEVEL", "INFO");
            $path = getenv("LOG_PATH", "/logs/app.log");
            $this -> configs["LOG_PATH"] = $this -> joinPaths("..", $path) ;
        }

        public function joinPaths() {
            $paths = array();
            foreach(func_get_args() as $arg){
                if($arg !== '') {
                    $paths[] = $arg;
                }
            }

            return preg_replace('#/+#', '/', join('/', $paths));
        }


        public function getConfig($name) {
            return $this -> configs[$name] ?? null;
        }

        // Carga la configuracion desde .ENV usando la libreria elegida para 
        // manejar la configuracion.
        public function loadConfig() {
            $dotenv = Dotenv::createUnsafeImmutable(__DIR__ . "/../../");
            $dotenv -> load();
        }
    }
?>