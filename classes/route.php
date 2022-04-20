<?php
include "test/ChromePhp.php";

class Route {
    private static $instance;
    private $config = [];
    private $url;
    private $params = [];
    private function head_directory_path() {
        return $_SERVER["DOCUMENT_ROOT"]."/";
    }

    private function __construct(){
        // echo __METHOD__."<br>";
        $this->config = Config::get_config("route");
        $this->url = $_SERVER["REDIRECT_URL"];
        
    }

    /**
     * создание экземпляра класса, либо возврат уже существуещего экземпляра
     *
     * @return Route
     */
    public static function get_instance(): Route{
        // echo __METHOD__."<br>";
        if (self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }



    
    /**
     * подключение файла если есть такой роут
     *
     * @return void
     */
    function load_file(){
        
        // echo __METHOD__."<br>";
        foreach($this->config as $template){
            $rule = "#^{$template["url"]}$#";
            $resul_matches = preg_match($rule, $this->url, $matches);
            
            if($resul_matches){
                
                $this->set_params($matches);
                if($template["controller"]) {
                    if($template["controller"] == "\View"){
                        $view_element = $template["controller"]::get_instance();
                        $action = $template["action"];
                        $view_element->$action();
                    } else {
                        $action = $template["controller"]."::".$template["action"];
                        $action();
                    }
                    
                } else {
                    include $this->head_directory_path().$template["file"];
                }
                return;
            }
        }
        throw new Exception("no find", 404);

        

    }


    
    /**
     * запись именованых групп из регулярки в переменную
     *
     * @param array $matches
     * @return void
     */
    private function set_params(array $matches){
        // echo __METHOD__."<br>";
        foreach($matches as $name => $value){
            if(!is_numeric($name)){
                $this->params[$name] = $value;
            }
        }
    }


    
    /**
     * выдача именованных групп из переменной
     *
     * @return void
     */
    function get_params(){
        // echo __METHOD__."<br>";
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