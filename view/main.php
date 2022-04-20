<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        Layout::get_instance()->set_statics(View::get_instance()->static);
        Layout::get_instance()->get_static_style();
    ?>
    <title><?=View::get_instance()->title; ?></title>
    
</head>
<body>
    
    <?= View::get_instance()->content ?>



    <?php Layout::get_instance()->get_static_script();?>  


</body>
</html>