
<?php

include "./bootstrap.php";
$layout = Layout::get_instance();
$layout->get_static();

$model = new Model("product"); //создание модели

$model->name = [
    "type" => Db::T_VARCHAR(100)  // создание колонки
];
$model->price = [
    "type" => Db::T_INT(7)
];

$model->add_column(); // собавление колонки в таблицу





// $sql = Db::get_instance();

// $sql->create_table("test15", [
//     "id" => [Db::T_INT(), Db::NOT_NULL,  Db::A_I,],
//     "name" => [ Db::T_VARCHAR(20), Db::DEFAULT_VALUE("no name")],
// ]);
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
// $test = new Model("fdfd");
// $test->test12 = [
//     "type" => Db::T_DATE,
//     "null" => Db::NOT_NULL,
//     "cur_time" => Db::CUR_TIME
// ];
// aa($test->test_prop());
// $test->add_column();
// $test->ids = [
//     "type" => Db::T_INT."(15)",
//     "type" => Db::A_I, 
// ];
// $test->test_prop();
// aa($test->test_prop());




?>