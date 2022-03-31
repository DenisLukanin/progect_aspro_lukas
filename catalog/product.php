<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $layout = Layout::get_instance();
        $layout->set_static("product_detail.css");
        $layout->set_static("product_detail.js");
        $layout->get_static_style();
    ?>
    <title>Детальна страница</title>
</head>
<body>
    

    <div class="container " id="app" v-cloak>
        <div class="flex_vrap">
            <img class="photo" :src="photo" :alt="title" >

            <div class="decription">
                <h1 class="title">{{ title }}</h1>
                <p class="text">{{ description }}</p>
                <span class="price">{{ price }} р.</span>
            </div>
        </div>



    </div>
    <button @click ="adda">rkbrrfefffffffffryb</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script src="https://unpkg.com/vue@3"></script>
    <?php
        $layout->get_static_script();
    ?>
    <script>
        // function add(){
        //     $.ajax({
        //         url: 'catalog/rest/product/1/',         /* Куда пойдет запрос */
        //         method: 'post',                         /* Метод передачи (post или get) */
        //         dataType: 'json',                       /* Тип данных в ответе (xml, json, script, html). */
        //         data: {},                               /* Параметры передаваемые в запросе. */
        //         success: function(data){                /* функция которая будет выполнена после успешного запроса.  */
        //             alert(data);                        /* В переменной data содержится ответ от index.php. */
        //         }
        //     })
        // }
        // if (window.jQuery) {
        //     alert("ok")
        // } else {
        //     alert("no")
        // }
    </script>
</body>
</html>

