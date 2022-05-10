<?php
    Layout::get_instance()->set_statics(["product_detail.css","vue.min.js","product_detail.js"]);


    $product_id = Route::get_instance()->get_params();
    $product = Model::factory("product", "catalog" , "", $product_id["id"] );
    View::get_instance()->title = $product->title;
?>

<div class="container" id="app" v-cloak  >
    <product product_id="<?=$product->id?>"></product>
</div>
