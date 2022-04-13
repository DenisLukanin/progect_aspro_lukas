<?php
    namespace Catalog\Rest;
    
    use Catalog\Model\Product as Product_model;

    class Product{
        // /Catalog/rest/Product/get/16
        static function action_get($id){
            $product = new Product_model($id);
            echo $product->get_json();
        }


        // /Catalog/rest/Product/delete/16
        static function action_delete($id){
            $product = new Product_model();
            echo json_encode($product->delete($id));
        }

    }

?>