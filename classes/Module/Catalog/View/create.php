<?php

View::get_instance()->title = "Создание товара";

    
$component_model_create = Component::factory("model_create", [
    "module" => "catalog",
    "model" => "product",
]);
// $component_model_create->render();




$form_field = $component_model_create->get_target();

?>
<form action="<?php echo '../../' . Model::path_rest_create()?>" method="post">
<?php

foreach($form_field as $name_field => $parametrs_field){
    if ($parametrs_field["type"] == Db::T_TEXT)  {
        ?><textarea name="<?=$name_field?>" cols="40" rows="10"></textarea><?php
    }
    if ($parametrs_field["type"] == Db::T_VARCHAR)  {
        ?><input type="text" name="<?=$name_field?>"><?php
    }
    if ($parametrs_field["type"] == Db::T_INT)  {
        ?><input type="number" name="<?=$name_field?>"><?php
    }
}

?>
<input type="submit" value="SAVE">
</form>
