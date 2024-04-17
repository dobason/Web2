<?php
    class Database {
        public static $instance = null;
        public function __construct() {}
        public function __clone(){}

        public static function call(){
            if(!isset(self::$instance)){  
                self::$instance = new MySQLi("localhost", "root", "", "web2");  
                if(self::$instance->connect_error){  
                    throw new Exception('Error MySQL: ' . self::$instance->connect_error);  
                }  
            } 
            return self::$instance;
        }

        public static function getAllRows($table_name){
            if(self::$instance?->error) {
                throw new Exception('Error MySQL: ' . self::$instance->error);  
            }
            $query = "SELECT * FROM ".$table_name;
            $result = self::call()->query($query);
          
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public static function closeConnection() {
            if(!(self::$instance?->close())){  
                throw new Exception('Error MySQL: ' . self::$instance->connect_error);  
            }
        }
    }
?>