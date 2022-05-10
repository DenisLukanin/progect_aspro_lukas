<?php
class Component {

    static protected $matches = [];
    protected $target;


    static function factory($name, array $target = []) {
        $component_namespace = "Component\\".ucfirst($name)."\\Main";
        // echo "ok";

        return new $component_namespace($target);
    }



    protected function __construct($target){
        // echo get_class($this);
        $this->target = $target;
        // $this->get_target($target);
    }



    /**
     * достает из модели поля, которые можно заполнить
     *
     * 
     * @return array
     */
    function get_target(): array{

        extract($this->target);
        $model_product = Model::factory($model, $module);
        return $model_product->get_form_fields();               // Возвращает поля таблиы которые можно заполнить в форме
        
    }



}
?>