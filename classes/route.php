<?php


class Route {
    private static $instance;
    private $config = [];
    private $url;

    private function __construct(){
        $this->config = Config::get_config("route");
        $this->url = $_SERVER["REQUEST_URI"];
    }

    public static function get_instance(): Route{
        if (self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }



    
    // подключение файла если есть такой роут
    function load_file(){
        if(in_array($this->url , array_keys($this->config))){
            echo "ok";
            include $this->config[$this->url];
        } else  {
            throw new Exception("No find" , 404);
        }
        
    }



    // распковка параметров
    function get_param(){
        
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