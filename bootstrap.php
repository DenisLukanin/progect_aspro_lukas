 
<?php

spl_autoload_register(function($path){ 
    $path = strtolower($path); 
    $class_path = __DIR__."\\classes\\".$path.".php";
    if ($class_path){
        include $class_path;
    }
}
)




?>