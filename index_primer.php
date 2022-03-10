<?php

// приходят данные от пользователя на просмотр товаров
// программа идет в класс продуков 
// класс продуктов по модели делает выборку из бд

include "../bootstrap.php";

class Model{
    public $table_name = "test"; // имя таблицы в бд
    public $table_columns = [    // название колонок в бд
        "id" => [
            "type" => "int"
        ],
        "name" => [
            "type" => "varchar"
        ]
    ]; 
    public $primary_key = "id";  // имя свойства которое будет primary 
    public $properties = [       // динамический набор свойств (??? свойства чего)


    ];
    static $cashe_table = [ // для каких таблиц уже создана модель
        "product" => "exist",
    ];







    /**
     * создает таблицу в бд по свойствам $table_name и $table_columns (название таблицыи её колонки)
     * 
     * ??? про какие 2 метода написано в тз
     * 
     * так же учитывается создание колонки primary (значение для primary храниться в свойстве  )
     *
     * @param [type] $table_name
     * @param [type] $table_columns
     * @return void
     */
    function create_table($table_name, $table_columns){   
        return "создание таблицы в бд";
    }


    /**
     * показывает свойство если оно есть в свойстве $properties
     * если свойства нет то вернет false
     *
     * @param [type] $name_prop
     * @return void
     */
    function __get($name_prop){

    }

    /**
     * устанавливает значения в свойство properties.
     * проеверка есть ли такое значение в $table_column, если есть то записывает его в свойство $properties
     * если нет в table_column то записывает на прямую в properties
     * 
     * 
     *
     * @param [type] $name_prop
     * @return void
     */
    function __set($name_prop, $value){
    }



    /**
     * инициализирует определенную таблицу в бд как экземпляр класса Module
     * 
     * $name - имя таблицы для которой нужна модель
     */
    function __construct($name){

        function check_table($name){  // ??? не совсем понимаю как его потом вызывать если он в конструкторе ??? где кешировать
            // if (in_array($name, array_keys( Db::cashe_table ))) {   // проверка инициализирована ли уже таблица

            // };   
        }


    }










}



?>