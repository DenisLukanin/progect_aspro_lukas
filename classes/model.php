<?php
class Model{

    private static $table_exist = [];                // список таблиц которые были закешированы а значит точно есть
    protected static $loader = [];                   // список закешированых записей где id => массив значений
    protected $table_elem_id;                        // id текущей модели 
    protected $db_object;                            // объект ДБ
    protected $table_name = "";                      // имя таблицы
    protected $table_columns = [];                   // описание колонок таблицы
    protected $properties = [];                      // значения полей модели
    protected $properties_new = [];                  // новые значения которые ждут добавления
    protected $primary_key = "id";



    function __construct($id = null){
        // echo __METHOD__."<br>";
        $this->db_object = Db::get_instance();                              // инициализируем объект бд
        if (!in_array($this->table_name, array_keys(self::$table_exist))){ // проверка кеша в котором указывается была ли таблица заширована
            if (!$this->check_table()){                                     // проверка существует ли таблица
                $this->create_table();                                      // создание таблицы
                              
            }   
            self::$table_exist[$this->table_name] = true;                  // кеширование того что таблица есть
        }
        if($id) {                                                           // передан ли id
            
            $this->table_elem_id = $id; 

            if (in_array($id, array_keys(static::$loader))) {               // проверка была ли закеширована запись
                  
                $this->properties = static::$loader[$id];                   // распаковыем значения из кеша в properties

            } else {
                
                $result = $this->select_elem($id);                          // достаем значения кешируем и распаковываем в properties или false если такой элемент существует
                if(!$result){
                    echo "элемента нет";
                    $this->table_elem_id = null;
                }
            }

            
        }
    }


    // достает запись из базы данных
    protected function select_elem($id){
        // echo __METHOD__."<br>";
        $request = [
            "where" => [
                "id = $id",
            ],
            "limit" => 1
        ];
        $result = $this->db_object->select($this->table_name, $request);     // получаем массив со значением полей у записи
        if (!$result) return false;
        $result = $result->fetch(PDO::FETCH_ASSOC);
        if (!$result) return false;
        static::$loader[$id] =  $result;                                     // кешируем если такой элемент есть в таблице
        $this->set($result);                                                 // распаковываем значения в properties
        
        return true;
    } 

    // определяет нужно сохранить новую запись или изменить существующую
    function save(){
        // echo __METHOD__."<br>";
        if ($this->table_elem_id) {
            $this->update();
            echo "up<br>";
        }else{
            $this->create();
        };
        
    }
    // создать новую
    protected function create(){
        // echo __METHOD__."<br>";
        $result = $this->db_object->insert($this->table_name, $this->properties);       // создается запись в таблице
        static::$loader[$result] = $this->properties;                                   // кешируются значения таблиц
        $this->table_elem_id = $result;                                                 // моделе присваивается id под которой она находится в таблице
    }


    // изменить существующую
    protected function update(){
        // echo __METHOD__."<br>";
        $this->db_object->update($this->table_name, $this->table_elem_id, $this->properties_new);           // обновляется запись
        static::$loader[$this->table_elem_id] = $this->properties;                                          // изменения фиксируются в кеше
        $this->properties_new = [];                                                                         // обнуляется массив с изменениями
        
    }



    // создание таблицы
    function create_table(){
        // echo __METHOD__."<br>";
        foreach($this->table_columns as $name => &$type){
            if ($name == $this->primary_key){
                $type[] = Db::A_I;
                $type[] = Db::P_KEY;
            }
            if (is_string($type)){
                $this->table_columns[$this->primary_key] = [$type];
            }
        }
        unset($type);

        $this->db_object->create_table($this->table_name, $this->table_columns);
    }


    // проверяем существует ли таблица
    function check_table(){
        // echo __METHOD__."<br>";
        return $this->db_object->table_exist($this->table_name);
    }



    // показывает значение колонки
    function __get($name){
        // echo __METHOD__."<br>";
        if (in_array($name, array_keys($this->table_columns))) {    // определена ли такая колонка в таблице
            return  $this->properties[$name];                       // возвращается значение 
        }
        echo "$name - нет такой колонки<br>";
        return false;
    }


    // устанавливает новое значение колонки 
    function __set($name, $value){
        // echo __METHOD__."<br>";
        if (in_array($name, array_keys($this->table_columns))) {                                                // определена ли такая колонка в таблице
            if ($this->table_elem_id && $this->properties[$name] != $value){                                    // проверка определен ли id для модели, отличается ли значение от существующего
                                                                                                                // - имеет ли таблица статус новой   
                
                $this->properties_new[$name] = $value;                                                          // записываем новое значение в массив для update
            }
            $this->properties[$name] = $value;                                                                  // записываем новое значение в properties
            
        } else {
            echo "$name   - нет такой колонки запись невозможна<br>";
        }
    }

    // добавление записей в properties массивом
    function set($elem){
        // echo __METHOD__."<br>";
        foreach($elem as $column => $value){
            $this->$column = $value;
        }
    }


    // получить одно значение
    // [
    //     "id = 3",
    //     "title = ''" 
    // ]
    function find(array $where = null){
        // echo __METHOD__."<br>";
        $filter = [];
        if ($where) $filter["where"] = $where;
        $statement = $this->db_object->select($this->table_name, $filter);
        $sql_result = $statement->fetch(PDO::FETCH_ASSOC);
        if($sql_result){
            $this->table_elem_id = $sql_result["id"];
            $this->set($sql_result);
            static::$loader[$this->table_elem_id] = $sql_result;
        }
        return $this;
    }



    // получить все значения
    function find_all(array $where = null, int $limit = null){
        // echo __METHOD__."<br>";

        $filter = [];
        if ($where) $filter["where"] = $where;
        if ($limit) $filter["limit"] = $limit;
        $statement = $this->db_object->select($this->table_name, $filter);
        $sql_result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(!$sql_result) return $this;
        $array_model = [];
        foreach($sql_result as $elem){
            $array_model[] = new static($elem["id"]); 
        }
        return $array_model;
        
    }
    // проверяет загруженность таблицы
    function loaded(){
        if ($this->table_elem_id) return true;
        return false;
    }

    
    // возвращает модель в json
    function get_json(){
        return json_encode($this->properties, JSON_UNESCAPED_UNICODE);
    }


    // удаление записи
    function delete($id){
        if(in_array($id , array_keys(static::$loader))){
            if($this->db_object->delete($this->table_name,$id)){
                unset(static::$loader["$id"]);
                return true;
            };
        } else {
            return $this->db_object->delete($this->table_name,$id);
        }

    }

}
?>