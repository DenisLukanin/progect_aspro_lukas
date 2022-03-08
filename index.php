
<?php

include "./bootstrap.php";
$layout = Layout::get_instance();
$layout->get_static();


$sql = Db::get_instance();

// $sql->get_field("test4");
// $sql->query("SHOW LIKE test");
$sql->create_table("test14", [
    "name" => [ Db::T_VARCHAR(20), Db::DEFAULT_VALUE("no name")],
    "age" => [Db::T_INT(2)],
    "city" => [Db::T_VARCHAR(20), Db::DEFAULT_VALUE("world")],
    "date" => [Db::T_DATE, Db::CUR_TIME]

],);
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


// $test = new Model("test");
// $test = new Model("test14");
$test = new Model("fdfd");
$test->test12 = [
    "type" => Db::T_DATE,
    "null" => Db::NOT_NULL,
    "cur_time" => Db::CUR_TIME
];
aa($test->test_prop());
$test->add_column();
// $test->ids = [
//     "type" => Db::T_INT."(15)",
//     "type" => Db::A_I, 
// ];
// $test->test_prop();
// aa($test->test_prop());




?>