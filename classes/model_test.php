<?php

class Model {
    public $table_name;
    public $table_columns;
    private $db_element;
    static $cache_model = [];


    private $primary_key = "";

    function __construct($name){
        
        $this->db_element = Db::get_instance();
        $this->table_name = $name;
        if (!$this->db_element->table_exist("$name")){
            $this->db_element->create_table($name);
        };
        self::$cache_model[$name] = "exists";
        $this->set_table_columns($this->db_element->get_field($name));
        // aa($this->table_columns);
        
        
        
    }

    

    // Запоняем $table_columns************
    private function set_table_columns(array $arr){
        foreach($arr as $column){

            $this->table_columns[$column["COLUMN_NAME"]] =  $this->column_description($column);
            // echo $column["COLUMN_NAME"]."<br>";
        }

        // aa($this->table_columns);
    }
    // описание для колонок таблицы
    private function column_description(array $column): array{
        $columns_description = [];
        $columns_description["type"] = $column["COLUMN_TYPE"];
        $column["IS_NULLABLE"]  === "NO" ? $columns_description["null"] = false : $columns_description["null"] = true;
        if ($column["EXTRA"] === "auto_increment") $columns_description["a_i"] = true;
        if ($column["COLUMN_DEFAULT"]) $columns_description["default_value"] = $column["COLUMN_DEFAULT"];
        if ($column["COLUMN_KEY"] === "PRI") $columns_description["primary_key"] = true;
        return $columns_description;
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
        if (in_array("$name", array_keys($this->properties))) return  $this->properties[$name];
        if (in_array("$name", array_keys($this->column))) {
            $this->properties[$name] = $this->column[$name];
            return  $this->properties[$name];

        }
        echo "not find this value";
        return false;
    }


    // устанавливает новое поле 
    function __set($name, $value){
        if (in_array($name, array_keys($this->column))) {
            $this->properties[$name] = $this->column[$name];
            echo "значение свойства уже есть в column <br>";
        } else {
            $this->properties[$name] = $value;
            echo "значение свойства записано в properties <br>";
        }
    }



    // добавляем новые поля в таблицу
    function add_column(){
        
        $request = "ALTER TABLE $this->table_name ADD ". $this->prop_columns($this->properties).";";
        try{
            echo $request;
            $stm = $this->db_element->conection->prepare($request);
            $stm->execute();

        } catch (Exception $e) {
            aa($e);
        }
    }

    private function prop_columns(array $columns): string{
        $columns_request = [];
        $columns = array_map(fn ($item) => implode(" " , $item) , $columns);
        foreach ($columns as $name => $value){
            $columns_request[] = "$name ".$value;
        }
        aa($columns_request);
        return implode(", " , $columns_request);
    }




    // создание таблицы
    // public function create_table(array $new_columns = []){
    //     if (!$new_columns) {
    //         $this->table_columns = array_merge($this->table_columns, $new_columns);
    //     }
    //     Db::create_table($this->table_name, $this->table_columns);
    // }




}
?>