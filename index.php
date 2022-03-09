
<?php

include "./bootstrap.php";
$layout = Layout::get_instance();
$layout->get_static();


$sql = Db::get_instance();
// $sql->create_table("test5", [
//     "id" => [ Db::T_INT."(10)", Db::A_I, Db::P_KEY],
//     "name" => [ Db::T_VARCHAR."(30)", Db::DEFAULT_VALUE("no name")],
//     "age" => [Db::T_INT."(2)"]
// ]);
// aa($sql->table_exist("test5"));
// aa($sql->insert("test5",[
//     "age" => "27",
// ]));

// $sql->select("test5", [
//     "where" => [
//         "id" => "2",
//     ],
//     "limit" => "5"
    
// ]);




?>