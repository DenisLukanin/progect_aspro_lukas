<?php
class Nodel{

    private static $table_exist = []; 

    public $name = "nodel";
    
    public $column = [
        // "id" => [
        //     Db::T_INT(1),
        //     Db::NOT_NULL,
        //     Db::A_I
        // ],
        // "name" => [
        //     Db::T_VARCHAR(50)
        // ],
        "description" => [
            Db::T_TEXT
        ],
        // "price" => [
        //     Db::T_INT(8)
        // ],
    ];

    private $db_object;


    function __construct($id){
        $this->db_object = Db::get_instance();
        if (!in_array($this->name, array_keys(Nodel::$table_exist))){
            if (!$this->check_table()){
                $this->create_table();
                Nodel::$table_exist[$this->name] = "exist";
            }   
        }
        


    }

    function create_table(){
        $this->db_object->create_table($this->name, $this->column);
    }

    function check_table(){
        return $this->db_object->table_exist($this->name);
    }

    // добавление свойств в properties
    private $properties = [
    ];
    function test_prop(){
        return $this->properties;
    }
    // показывает значение поля
    function __get($name){
        // aa($name) ;
        if (in_array("$name", array_keys($this->table_columns))) {
            return  $this->table_columns[$name];
        }
        echo "такой колонки нет в таблице";
        return false;
    }


    // устанавливает новое поле 
    function __set($name, $value){
        if (in_array($name, array_keys($this->table_columns))) {
            $this->properties[$name] = $value;
            echo "значение свойства уже есть в table_columns <br>";
        } else {
            
            echo "такого свойства нет в таблице";
        }
    }




}
?>