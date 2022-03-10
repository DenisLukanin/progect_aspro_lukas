<?php
class Model{

    protected static $table_exist = []; 
    protected static $loader = [];
    protected $table_elem;
    protected $db_object;

    protected $table_name = "nodel";
    
    
    protected $column = [
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
        // aa(Model::$table_exist);
        if (!in_array($this->table_name, array_keys(Model::$table_exist))){
            // echo "создание";
            if (!$this->check_table()){
                $this->create_table();
                Model::$table_exist[$this->table_name] = "exist";
            }   
        }
        if($id) {
        // if (in_array($id, Model::$loader)) {
            $this->table_elem[$id] = $this->select_elem($id);
            aa($this->table_elem[$id]);
        // };
        }
    }

    protected function select_elem($id){
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
        if ($this->table_elem){



        } else {
            // echo $this->table_name;
            // aa($this->properties);

            $result = $this->db_object->insert($this->table_name, $this->properties);
            Model::$loader[] = $result;

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
    protected $properties = [
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