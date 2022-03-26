<?php
return [
    "/catalog/" => "catalog/index.php",  
    "/test/" => "test/index.php",
    "/catalog/(?<product_id>[^/]+)/" => "catalog/product.php",
    "/" => "pages/head_page.php"
]
?>