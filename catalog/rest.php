<?php
    $product_id = Route::get_instance()->get_params();
    $product = new Product($product_id["product_id"]);
    $product_JSON = $product->get_json();
    return $product_JSON;

?>