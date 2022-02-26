<?php
class Dbg {

    const TEST = "test";
    static function dbg_print($value){
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
    }
    function show_const(){
        echo self::TEST;
    }
}
?>