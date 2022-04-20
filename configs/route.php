<?php
return [
    [
        "url" => "/(?<module>[^/]+)/view/(?<name>[^/]+)/(?<id>[^/]+)/(?<info>[^/]+)/",
        "controller" => "\View",
        "action" => "dispatch",
    ],
    [
        "url" => "/(?<module>[^/]+)/view/(?<name>[^/]+)/(?<id>[^/]+)/",
        "controller" => "\View",
        "action" => "dispatch",
    ],
    [
        "url" => "/(?<module>[^/]+)/view/(?<name>[^/]+)/",
        "controller" => "\View",
        "action" => "dispatch",
    ],
    
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
    

]
?>