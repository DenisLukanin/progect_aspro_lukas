<?php

class View{

    private static $instance;
    private $matches;
    private static function head_directory_classes() {
        return $_SERVER["DOCUMENT_ROOT"]."/classes/";
    }
    private static function head_directory_path() {
        return $_SERVER["DOCUMENT_ROOT"]."/";
    }
    private $params = [];
    public $content;
    private $module;
    private $name_view;
    private $id;
    private $info;


    /**
     * Конструктор класса View
     */
    private function __construct(){
        
        // echo __METHOD__."<br>";
        $this->matches = Route::get_instance()->get_params();   // получение параметров переданных в url
    }

    /**
     * проверка существует ли экземпляр класса
     *
     * @return View
     */
    public static function get_instance(): View {

        if (self::$instance === null){
            self::$instance = new self();
        }
        
        return self::$instance;
    }



    function dispatch(){
        if($this->matches["module"]){
            if(file_exists(self::head_directory_classes()."Module/".ucfirst($this->matches["module"]))){
                $this->module =  ucfirst($this->matches["module"]);
            } else {
                include self::head_directory_path()."errors/404.php";
                die();
            }
            
        } else {
            $this->module = "Main";
        }

        if($this->matches["name"]){
            if (file_exists(self::head_directory_classes()."Module/".$this->module."/View/".$this->matches["name"].".php")){
                $this->name_view = $this->matches["name"].".php";
            } else {
                include self::head_directory_path()."errors/404.php";
                die();
            }
        } else {
            $this->name_view = "index.php";
        }

        if($this->matches["id"]){
            $this->id = $this->matches["id"]; 
        }


        if($this->matches["info"]){
            $this->info = $this->matches["info"]; 
        }

        

        $this->render($this->name_view);
    }

    // подключает шаблон
    function render($name, $params =[]){
        $this->content = $this->include($name, $params); 
        include self::head_directory_path()."view/main.php";
    }



    // подключает контент
    function include($name, $params =[]){
        ob_start();
        include self::head_directory_classes()."Module/".$this->module."/View/".$name;
        return ob_get_clean();
    }



    function __get($name){
        if (in_array($name, array_keys($this->params))){
            return $this->params[$name];
        } else {
            echo "нет такого параметра {$name}";
        }
    }

    function __set($name, $value){
        $this->params[$name] = $value;
    }




        

    // защита от создания копий объекта*********
    private function __clone()
    {
        throw new Exception("No clone", 1);
    }
    private function __wakeup()
    {
        throw new Exception("No unserialize", 1);
    }
    
    

}

?>