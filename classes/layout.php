<?php 
class Layout
{

    private static $instance;
    private static $static_type = [
        "style" => [
            "css",
        ],
        "script" => [
            "js",
        ],
    ];
    
    private static $list_script = []; 
    private static $list_style = [];


    private static $static_relative_path = "/static/";
    private static function static_absolute_path() {
        return $_SERVER['DOCUMENT_ROOT'] ."/static/";
    }








    // Логика создания экземпляра класса*******
    private function __construct(){
        // self::set_static("general/reset.css");
        self::set_fonts("Cormorant Garamond");
        self::set_static("general/bootstrap.css");
    }

    public static function get_instance(): Layout {
        if (self::$instance === null){
            self::$instance = new self();
        }
        
        return self::$instance;
    }





    // логика подключения статики******
    

    // private static $static_absolute_path = __DIR__."/../static/";
    
    // подключение стиля
    private static function set_static_style($path){
        $path_info = pathinfo($path);
            if(!in_array($path_info['basename'],array_keys(self::$list_style))){
                self::$list_style[$path_info['basename']] = '<link rel="stylesheet" href="'.$path.'">';
                // echo ;
            }else{
                // echo $path_info['basename']." - такой стиль уже подключен".__LINE__."<br>";
            }
    }   

    // подключение скрипта
    private static function set_static_script($path){
        $path_info = pathinfo($path);
            if(!in_array($path_info['basename'],array_keys(self::$list_script))){
                self::$list_script[$path_info['basename']] = '<script src="'.$path.'"></script>';
                // echo '<script src="'.$path.'"></script>';
                
            } else {
                // echo $path_info['basename']." - такой скрипт уже подключен".__LINE__."<br>";
            }
    }
    static function get_static_style(){
        foreach(self::$list_style as $link){
            echo $link;
        };
    }
    static function get_static_script(){
        foreach(self::$list_script as $script){
            echo $script;
        };
    }
    static function get_static(){
        self::get_static_script();
        self::get_static_style();
    }

    // определяем скрипт это или стиль
    public static function set_static($path){
        $path_info = pathinfo($path);  

        foreach(self::$static_type as $type => $extension){
            if (in_array($path_info['extension'], $extension)){
                if(file_exists(self::static_absolute_path().$path_info['extension']."/".$path)){
                    switch($type){
                        case 'style':
                            self::set_static_style(self::$static_relative_path.$path_info['extension']."/".$path);
                            break;
                        case 'script':
                            self::set_static_script(self::$static_relative_path.$path_info['extension']."/".$path);
                            break;
                    }
                } else {
                    // echo 'такого файла нет<br>'; 
                }
            }
        }

    }






    // подключение шрифта google fonts***********
    private static function set_fonts(string $font_name){
        $font_name = str_replace(" ", "+", $font_name);
        echo '
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family='.$font_name.':wght@400;600&display=swap" rel="stylesheet">
        ';
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