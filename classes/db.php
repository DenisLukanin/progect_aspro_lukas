<?php

class Db {
    private $conection;
    private static $instance;
    

    private function __construct(){
        $this->connect(Config::get_config("db"));
    }

    public static function get_instance(): Db {
        if (self::$instance === NULL){

            self::$instance = new self();
        }
        return self::$instance;
    }

    private function connect($config_db){
        $this->conection = new PDO("mysql:host=".$config_db["host"].";dbname=".$config_db["name"], $config_db["user"], $config_db["password"]);
    }


    public function create_table(string $name, array $columns = [] ){
        $reqest = "create table $name (".$this->create_columns_in_table($columns).");";
        echo $reqest;
        $this->conection->exec($reqest);
    }

    public function create_columns_in_table(array $columns): string{
        $columns_request = "";
        $columns = array_map(fn ($item) => implode(" " , $item) , $columns);
        foreach ($columns as $name => $value){
            $columns_request .= $name." ".$value.", ";
        }
        return substr($columns_request, 0, -2);
    }













    // защита от создания копий объекта*********
    private function __clone()
    {
        throw new Exception("No clone", 1);
        
    }
    private function __wakeup()
    {
        throw new Exception("No unserialize", 1);
        
    }
}




    
?>