<?php

class Db {
    private $conection;
    private static $instance;
    const T_INT = "INT";
    const T_VARCHAR = "VARCHAR";
    const T_TEXT = "TEXT";
    const T_DATE = "DATE";
    const A_I = "AUTO_INCREMENT";
    const P_KEY = "PRIMARY KEY";
    const NULL_DEFAULT = "NULL";
    const NOT_NULL = "NOT NULL";
    static function DEFAULT_VALUE($value){
        return "DEFAULT '$value'";
    }
    

    private function __construct(){
        $this->connect(Config::get_config("db"));
    }
    public static function get_instance(): Db {
        if (self::$instance === NULL){

            self::$instance = new self();
        }
        return self::$instance;
    }
    // создание соединения*************
    private function connect($config_db){
        $this->conection = new PDO("mysql:host=".$config_db["host"].";dbname=".$config_db["name"], $config_db["user"], $config_db["password"]);
    }



    // создание таблицы*******
    public function create_table(string $name, array $columns = [] ){
        $reqest = "create table $name (".$this->create_columns($columns).");";
        echo $reqest;
        $this->conection->exec($reqest);
    }

    public function create_columns(array $columns): string{
        $columns_request = "";
        $columns = array_map(fn ($item) => implode(" " , $item) , $columns);
        foreach ($columns as $name => $value){
            $columns_request .= $name." ".$value.", ";
        }
        return substr($columns_request, 0, -2);
    }


    


    // проверка существования талицы*********************
    public function table_exist($table_name): bool {
        if($this->conection->exec("select * from $table_name") === false){
            return false;
        } else {
            return true;
        }
    }



    // запись в таблицу****************
    public function insert(string $name, array $arr){
        $keys = implode(", ", array_keys($arr));
        $keys_placeholder = implode(", ", array_map(fn ($item) => ":".$item, array_keys($arr)) );
        
        $stm = $this->conection->prepare("insert into $name ($keys) value ($keys_placeholder)");
        foreach ($arr as $name => $value){
            $stm->bindValue($name , $value);
        }
        $stm->execute();;
        return $this->conection->lastInsertId();
    }


    

    // получение данных таблицы***********
    public function select(string $name, array $arr = []){
        $request = "SELECT * FROM $name ";
        if (!$arr){
            echo "ok";
            $stm = $this->conection->query($request);
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            if ($arr["where"]){
                $request .= " WHERE ". implode(" ", $arr["where"]);
            }
            if ($arr["limit"]){
                $request .= " LIMIT ".$arr["limit"];
            }
            // echo $request;
            $stm = $this->conection->query($request);
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        
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