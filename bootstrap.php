 
<?php

spl_autoload_register(function($path){ 
    $path = strtolower($path); 
    $class_path = __DIR__."\\classes\\".$path.".php";
    if (file_exists($class_path)){
        include $class_path;
    }
}
)




?>