<?php
return [
    
    // [
    //     "url" => "/catalog/product/(?<component>[^/]+)/",
    //     "controller" => "\Component",
    //     "action" => "factory",
    //     "name" => "model_create",
    // ],
    [
        "url" => "/(?<module>[^/]+)/(?<name>[^/]+)/(?<id>[^/]+)/",
        "controller" => "\View",
        "action" => "dispatch",
    ],
    [
        "url" => "/",
        "controller" => "\View",
        "action" => "dispatch",
    ],
    [
        "url" => "/test/",
        "file" => "test/index.php",
    ],
    [
        "url" => "/(?<module>[^/]+)/",
        "controller" => "\View",
        "action" => "dispatch",
    ],
    [
        "url" => "/(?<module>[^/]+)/rest/(?<rest>[^/]+)/(?<action>[^/]+)/(?<id>[^/]+)/",
        "controller" => "\Rest",
        "action" => "dispatch",
    ],
    [
        "url" => "/(?<module>[^/]+)/rest/(?<rest>[^/]+)/(?<action>[^/]+)/",
        "controller" => "\Rest",
        "action" => "dispatch",
    ],
    

]
?>