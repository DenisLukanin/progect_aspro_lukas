
<?php

include "./bootstrap.php";
$route = Route::get_instance();
try{
    $route->load_file();
} catch (Exception $e){
    $error_file_path = "./errors/".$e->getCode().".php";
    if (file_exists($error_file_path)){
        include $error_file_path;
    } else {
        echo "Ошибка не обработана";
    }
    
    
}

?>