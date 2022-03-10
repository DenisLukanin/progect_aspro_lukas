<?php

class Product extends Model{
    protected $table_name = "product";
    
    
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
        "image" => [
            "VARCHAR(200)"
        ],
        "price" => [
            "INT(8)"
        ],
    ];
}

?>