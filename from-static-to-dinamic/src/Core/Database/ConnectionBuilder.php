<?php 
    namespace PAW\Core\Database;

    use PDO;
    use PDOException;
    use PAW\Core\Config;
    use PAW\Core\Traits\Loggable;

    class ConnectionBuilder{
        use Loggable;

        public function make(Config $config): PDO{
            try{
                $adapter = $config -> getConfig("DB_ADAPTER");
                $hostname = $config -> getConfig("DB_HOSTNAME");
                $dbname = $config -> getConfig("DB_DBNAME");
                $port = $config -> getConfig("DB_PORT");
                $charset = $config -> getConfig("DB_CHARSET");
                $dataSourceName = "{$adapter}:host={$hostname};dbname={$dbname};port={$port};charset={$charset}";
                return new PDO(
                    $dataSourceName,
                    $config -> getConfig("DB_USERNAME"),
                    $config -> getConfig("DB_PASSWORD"),
                    [
                        'options' => [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                        ]
                    ]
                );
            } catch(PDOException $exception) {
                $this -> logger -> error(
                    "Status Code: 500 - Internal server error",
                    ["ERROR" => $exception]
                );
                die("Error Interno - Consulte al administrador.");
            }
        }
    }
?>