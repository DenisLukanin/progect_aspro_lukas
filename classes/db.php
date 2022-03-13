<?php

class Db {
    public $conection;
    private static $instance;
    const NOT_ID = false;
    public static function T_INT(int $count = 10){
        return "INT($count)";
    } 
    public static function T_VARCHAR(int $count = 255){
        return "VARCHAR($count)";
    } 
    const T_TEXT = "TEXT";
    const T_DATE = "DATETIME";
    const NULL_DEFAULT = "NULL";
    const NOT_NULL = "NOT NULL";
    const A_I = "AUTO_INCREMENT";
    public static function DEFAULT_VALUE($value){
        return "DEFAULT '$value'";
    }
    const CUR_TIME = "DEFAULT CURRENT_TIMESTAMP";
    const P_KEY = "PRIMARY KEY";
    

    private function __construct(){
        // echo __METHOD__."<br>";
        $this->connect();
    }
    public static function get_instance(): Db {
        // echo __METHOD__."<br>";
        if (self::$instance === NULL){

            self::$instance = new self();
        }
        return self::$instance;
    }





    // создание соединения*************
    private function connect(){
        // echo __METHOD__."<br>";
        $config_db = Config::get_config("db");
        $this->conection = new PDO("mysql:host=".$config_db["host"].";dbname=".$config_db["name"].";charset=".$config_db["charset"], $config_db["user"], $config_db["password"]);
    }
    




    // создание таблицы*******
    public function create_table(string $name, array $columns = []){
        // echo __METHOD__."<br>";
        $reqest = "CREATE TABLE $name (".$this->create_columns($columns).");";
        $result = $this->conection->prepare($reqest);
        return $result->execute();
        
    }

    public function create_columns(array $columns): string{
        // echo __METHOD__."<br>";
        $columns_request = [];

        $columns = array_map(fn ($item) => implode(" " , $item), $columns);
        foreach ($columns as $name => $value){
            $columns_request[] = $name." ".$value;
        }
        return implode(", " , $columns_request);
    }










    // проверка существования талицы*********************
    public function table_exist($table_name): bool { 
        // echo __METHOD__."<br>";
        $result = $this->conection->query("SHOW TABLES LIKE '$table_name'");
        
        if ($result->fetch()) return true;
        return false;

    }





    // запись в таблицу****************
    // пример запроса
    // "test5",[
    //     "age" => "27",
    // ]

    public function insert(string $name, array $arr){
        // echo __METHOD__."<br>";
        $keys = implode(", ", array_keys($arr));
        $keys_placeholder = implode(", ", array_map(fn ($item) => ":".$item, array_keys($arr)) );
        
        $stm = $this->conection->prepare("insert into $name ($keys) value ($keys_placeholder)");
        foreach ($arr as $name => $value){
            $stm->bindValue($name , $value);
        }
        $stm->execute();
        // aa( $this->conection->errorInfo());

        return $this->conection->lastInsertId();
    }


    



    // получение данных таблицы***********
    /** пример запроса
     * ("test", [
     *   where" => [
     *      "id = 1"
     *   ],
     *   "limit" => "5"
     *   ])
     */
    public function select(string $name, array $arr = []){
        // echo __METHOD__."<br>";
        $request = "SELECT * FROM $name";
        if ($arr){
            if ($arr["where"]){
                $request .= " WHERE ". implode(" ", $arr["where"]);
            }
            if ($arr["limit"]){
                $request .= " LIMIT ".$arr["limit"];
            }
        }
         
        $result = $this->conection->prepare($request);
        $result->execute();
        return $result;
        
    }


    // обновление записи в таблице
    public function update($table_name, $id, array $new_value){
        // echo __METHOD__."<br>";
        $request = "
            UPDATE $table_name 
            SET ".$this->set_values($new_value)." 
            WHERE id = $id
        ";
        $state = $this->conection->prepare($request);
        return $state->execute();
    }
    private function set_values(array $values): string{
        $result = [];
        foreach ($values as $column => $value){
            $result[] = "$column = '$value'";
        }
        return implode(", " , $result);
    }



    // Получение информации о полях в таблице
    function get_field($table_name){
        // echo __METHOD__."<br>";

        $sql = $this->conection->prepare("
            SELECT COLUMN_TYPE , COLUMN_NAME, EXTRA, COLUMN_KEY, COLUMN_DEFAULT, IS_NULLABLE
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_SCHEMA = ?
            AND TABLE_NAME = ?;
        ");
        $sql->execute([
            Config::get_config("db","name") , $table_name
        ]);
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
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