<?php


class Route {
    private static $instance;
    private $config = [];
    private $url;
    private $params = [];
    private function head_directory_path() {
        return $_SERVER["DOCUMENT_ROOT"]."/";
    }

    private function __construct(){
        $this->config = Config::get_config("route");
        $this->url = $_SERVER["REDIRECT_URL"];
    }

    public static function get_instance(): Route{
        if (self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }



    
    // подключение файла если есть такой роут
    function load_file(){

        foreach($this->config as $template => $path){
            $rule = "#^{$template}$#";
            $resul_matches = preg_match($rule, $this->url, $matches);
            if($resul_matches){
                $this->set_params($matches);
                include $this->head_directory_path().$path;
                return;
            }
        }
        throw new Exception("no find", 404);
    }


    // запись именованых групп из регулярки в переменную
    private function set_params(array $matches){
        foreach($matches as $name => $value){
            if(!is_numeric($name)){
                $this->params[$name] = $value;
            }
        }
    }


    // выдача именованных групп из переменной
    function get_params(){
        return $this->params;
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