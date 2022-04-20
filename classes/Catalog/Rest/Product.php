<?php

    namespace Catalog\Rest;
    
    use Catalog\Model\Product as Product_model;

    class Product{
        // /Catalog/rest/Product/get/16
        static function action_get(){
            $matches = \Route::get_instance()->get_params();
            $product = new Product_model($matches["id"]);
            echo $product->get_json();
        }


        // /Catalog/rest/Product/delete/16
        static function action_delete(){
            $product = new Product_model();

            $matches = \Route::get_instance()->get_params();

            echo json_encode($product->delete($matches["id"]));
        }

    }

?>