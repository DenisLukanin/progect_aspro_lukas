<?php
return [
    "/catalog/" => "catalog/index.php",  
    "/test/" => "test/index.php",
    "/catalog/(?<product_id>[^/]+)/" => "catalog/product.php",
    "/" => "pages/head_page.php",
    "/catalog/rest/product/(?<product_id>[^/]+)/" => "catalog/rest.php",
]
?>