<?php
return [
    [
        "url" => "/(?<module>[^/]+)/rest/(?<rest>[^/]+)/(?<action>[^/]+)/(?<id>[^/]+)/",
        "controller" => "\Rest::dispatch",
    ],
    [
        "url" => "/catalog/rest/product/(?<product_id>[^/]+)/",
        "file" => "catalog/rest.php",
    ],
    [
        "url" => "/",
        "file" => "pages/head_page.php",
    ],
    [
        "url" => "/catalog/(?<product_id>[^/]+)/",
        "file" => "catalog/product.php",
    ],
    [
        "url" => "/test/",
        "file" => "test/index.php",
    ],
    [
        "url" => "/catalog/",
        "file" => "catalog/index.php",
    ], 
]
?>