<?php

class Product extends Model{
    protected $table_name = "product";
    
    
    protected $table_columns = [
        "id" => [
            "INT(11)"
        ],
        "title" => [
            "VARCHAR(50)"
        ],
        "description" => [
            Db::T_TEXT
        ],
        "photo" => [
            "VARCHAR(200)"
        ],
        "price" => [
            "INT(8)"
        ],
    ];
}

?>