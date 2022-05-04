<?php

namespace Module\Catalog\Model;



class Product extends \Model{
    protected $table_name = "product";
    
    
    protected $table_columns = [
        "id" => [
            "type" => \Db::T_INT,
            "null_default" => \Db::NOT_NULL,
        ],
        "title" => [
            "type" => \Db::T_VARCHAR,
            "null_default" => \Db::NOT_NULL,
            "lable" => "Заголовок",
        ],
        "description" => [
            "type" => \Db::T_TEXT,
            "null_default" => \Db::NULL_DEFAULT,
            "lable" => "Описание",
        ],
        "photo" => [
            "type" => \Db::T_VARCHAR,
            "null_default" => \Db::NULL_DEFAULT,
        ],
        "price" => [
            "type" => \Db::T_INT,
            "null_default" => \Db::NOT_NULL,
            "lable" => "Цена",
        ],
    ];
}

?>