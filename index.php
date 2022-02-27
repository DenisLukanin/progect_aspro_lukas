
<?php

include "./bootstrap.php";
$layout = Layout::get_instance();
$layout->get_static();


$sql = Db::get_instance();
    $sql->create_table("test3", [
        "id" => ["integer(10)", "auto_increment", "primary key"],
        "name" => ["varchar(30)"],
        "age" => ["integer(2)"]
    ]);




?>