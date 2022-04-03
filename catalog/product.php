<?php
    $layout = Layout::get_instance();
    $layout->set_statics(["product_detail.css","vue.min.js","product_detail.js"]);
    $layout->get_static_style();
    $product_id = Route::get_instance()->get_params();
    $product = new Product($product["product_id"]);
?>

<div class="container" id="app" v-cloak >
    <product product_id="<?=$product->id?>"></product>
</div>


<?php
    $layout->get_static_script();
?>

