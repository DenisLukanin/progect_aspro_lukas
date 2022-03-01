<?php

class Model {
    public $table_name;
    public $table_columns;
    private $connection;

    function __construct($name){
        $this->connection = Db::get_instance();
        $this->table_name = $name;
        
    }





}
?>