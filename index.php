
<?php

include "./bootstrap.php";
$layout = Layout::get_instance();
$layout->get_static();






$sql = Db::get_instance();

$sql->create_table("test5", [
    "id" => ["INT(11)", Db::A_I, Db::P_KEY],
    "name" => [ Db::T_VARCHAR(20), Db::DEFAULT_VALUE("no name")],
]);



// aa($sql->table_exist("ad"));
// $sql->table_exist("test5");
// aa($sql->insert("test5",[
//     "age" => "27",
// ]));

// $result = $sql->select("test", [
//     "where" => [
//         "id = 1"
//     ],
//     "limit" => "5"
// ]);
// aa($result);






?>