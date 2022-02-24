<?php
// include "../bootstrap.php";
class Config{

    private static $config_project = [];

    static function get_config($file_name, $key_config){
        $file_name = strtolower($file_name).'.php';
        $config_path = $_SERVER['DOCUMENT_ROOT']."/configs/".$file_name;

        if(file_exists($config_path)){
            if (in_array($file_name, self::$config_project)){
                return self::$config_project[$file_name][$key_config];
            } else {
                $class_config = include $config_path;
                
                // Dbg::dbg_print(self::$config_project);
                self::$config_project[$file_name] = $class_config;
                // Dbg::dbg_print(self::$config_project);
                return $class_config[$key_config];
            }
        }
        echo "такого файла тут нет";

        // Dbg::dbg_print($class_config);
    }


}
?>