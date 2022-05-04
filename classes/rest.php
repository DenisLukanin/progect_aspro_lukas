<?php

class Rest{
    private static $matches;
    static function dispatch(){
        self::$matches = Route::get_instance()->get_params();
        self::include_action();

    }

    
    private static function include_action(){
        $name = "\\Module\\".ucfirst(self::$matches['module'])."\\Rest\\".ucfirst(self::$matches['rest'])."::action_".self::$matches['action'];
        // aa($name);
        $name();
    }
}

?>