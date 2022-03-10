<?php
class Nodel{

    private static $table_exist = []; 
    private static $loader = [];
    private $table_elem;
    private $db_object;

    private $table_name = "nodel";
    
    
    private $column = [
        "id" => [
            "INT(11)",
            Db::NOT_NULL,
            Db::A_I,
            Db::P_KEY
        ],
        "name" => [
            "VARCHAR(50)"
        ],
        "description" => [
            Db::T_TEXT
        ],
        "price" => [
            "INT(8)"
        ],
    ];


    function __construct($id = null){
        $this->db_object = Db::get_instance();
        if (!in_array($this->table_name, array_keys(Nodel::$table_exist))){
            
            if (!$this->check_table()){
                $this->create_table();
                Nodel::$table_exist[$this->table_name] = "exist";
            }   
        }

        // if (in_array($id, Nodel::$loader)) {
            $this->table_elem[$id] = $this->select_elem($id);
            aa($this->table_elem[$id]);
        // };

    }

    private function select_elem($id){
        $request = [
            "where" => [
                "id = $id",
            ],
            "limit" => 1
        ];
        return $this->db_object->select($this->table_name, $request);
    }


    function show_elem(){

    }



    function save(){
        if ($this->id){



        } else {
            // echo $this->table_name;
            // aa($this->properties);

            $result = $this->db_object->insert($this->table_name, $this->properties);
            Nodel::$loader[] = $result;

            // aa($result);
        }
    }



    // создание таблицы
    function create_table(){
        $this->db_object->create_table($this->table_name, $this->column);
    }


    // проверяем существует ли таблица
    function check_table(){
        return $this->db_object->table_exist($this->table_name);
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
        if (in_array("$name", array_keys($this->column))) {
            return  $this->column[$name];
        }
        echo "такой колонки нет в таблице";
        return false;
    }


    // устанавливает новое поле 
    function __set($name, $value){
        if (in_array($name, array_keys($this->column))) {
            $this->properties[$name] = $value;
            // echo "значение добавленно в properties <br>";
        } else {
            echo "такого свойства нет в таблице";
        }
    }




}
?>