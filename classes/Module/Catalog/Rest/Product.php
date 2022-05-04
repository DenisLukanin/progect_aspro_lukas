<?php

    namespace Module\Catalog\Rest;
    

    class Product{
        // /Catalog/rest/Product/get/16
        static function action_get(){
            $matches = \Route::get_instance()->get_params();
            $product = \Model::factory("product", "catalog", "", $matches["id"]);
            echo $product->get_json();
        }

        // catalog/rest/product/create/
        static function action_create(){
            
            $new_product = \Model::factory("product", "catalog");
            $new_product->set($_POST);
            $new_product->save();

            header("Location: /catalog/");
            
        }


        // /Catalog/rest/Product/delete/16
        static function action_delete(){
            
            $product = \Model::factory("product", "catalog");

            $matches = \Route::get_instance()->get_params();

            echo json_encode($product->delete($matches["id"])); 
        }

    }

?>