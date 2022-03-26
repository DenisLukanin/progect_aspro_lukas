<?php

    // echo "Детальная страница товара";
    $product_id = Route::get_instance()->get_params()["product_id"];
    $product = new Product($product_id);
    
    echo $product->title." по цене ".$product->price." р.";

?>