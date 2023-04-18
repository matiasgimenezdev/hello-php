<?php 
    namespace PAW\App\Models;

    use PAW\Core\AbstractModel;
    use PAW\Core\Exceptions\InvalidValueFormatException;
    use Exception;

    class Author extends AbstractModel { 
        public $table = 'authors';
        public $fields = [
            "name" => null,
            "email" => null,
        ];

        public function setName (string $name) {
            if(strlen($name) > 60) {
                throw new InvalidValueFormatException("El nombre del autor no puede ser mayor a 60 caracteres.");
            }
            $this -> fields["name"] = $name;
        }

        public function setEmail (string $email) {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidValueFormatException("El formato del email es invalido.");
            }
            $this -> fields["email"] = $email;
        }
        
        public function set(array $values) {
            foreach(array_keys($this -> fields) as $field){
                if(!isset($values[$field])){
                    continue;
                }
                $method = "set". ucfirst($field); // setName() o setEmail()
                $this -> $method($values[$field]);
            }

        }
    }


?>