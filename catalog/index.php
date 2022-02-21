<?php
include "../bootstrap.php";

// echo '<link rel="stylesheet" href="../static/css/general/reset.css">';
// echo '<link rel="stylesheet" href="../static/css/general/bootstrap.css">';
// echo '<link rel="stylesheet" href="../static/css/catalog.css">';
Layout::set_static("general/reset.css");
$layout = Layout::get_instance("catalog");
// Layout::set_static("general/bootstrap.css");
Layout::set_static("catalog.css");

?>
<div class="container">
    <ul class="catalog_list">
        <li class="catalog_item">
            <div class="catalog_item_photo" style="background-image: url('../static/img/americano.jpeg');">
                <a href="#" class="catalog_item_photo_link">
                </a>
            </div>
            <div class="flex_wrap">
                <a href="" class="catalog_item_title_link">
                <h3 class="catalog_item_title">Бодрящий Americano</h3>
                </a>
                <span class="catalog_item_price">100 р.</span>
            </div>
            <p class="catalog_item_description">
                Попробовав Americano с утра, больше не захочется начинать день по другому
            </p>


        </li>
        <li class="catalog_item">
            <div class="catalog_item_photo" style="background-image: url('../static/img/capuchino.jpg');">
                <a href="#" class="catalog_item_photo_link"></a>
            </div>
            <!-- <a href="#" class="catalog_item_photo_link">
                <img src="../static/img/capuchino.jpg" alt="" class="catalog_item_photo">
            </a> -->
            <div class="flex_wrap">
                <a href="" class="catalog_item_title_link">
                    <h3 class="catalog_item_title">Классический Capuchino</h3>
                </a>
                <span class="catalog_item_price">200 р.</span>
            </div>
            <p class="catalog_item_description">Самый популярный вид кофе Capuchino, лучший способ скоротать ожидание.</p>

        </li>
        <li class="catalog_item">
            <div class="catalog_item_photo" style="background-image: url('../static/img/latte.jpg');">
                <a href="#" class="catalog_item_photo_link"></a>
            </div>

            <div class="flex_wrap">
                <a href="" class="catalog_item_title_link">
                    <h3 class="catalog_item_title">Воздушный Latte</h3>
                </a>
                <span class="catalog_item_price">300 р.</span>
            </div>
            
            <p class="catalog_item_description">Напиток которым можно наслаждаться каждый день</p>

        </li>
        <li class="catalog_item">
            <div class="catalog_item_photo" style="background-image: url('../static/img/amareto.jpg');">
                <a href="#" class="catalog_item_photo_link"></a>
            </div>

            <div class="flex_wrap">
                <a href="" class="catalog_item_title_link">
                    <h3 class="catalog_item_title">Ароматный Amaretto</h3>
                </a>
                <span class="catalog_item_price">350 р.</span>
            </div>

            <p class="catalog_item_description">Неповторимый вкус бразильского Amaretto не оставить вас равнодушными.</p>

        </li>
    </ul>

</div>