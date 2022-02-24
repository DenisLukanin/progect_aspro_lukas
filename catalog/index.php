<?php
include "../bootstrap.php";



$layout = Layout::get_instance();
$layout->set_static("catalog.css");
$layout->set_static("catalog.css");
$layout->set_static("general/reset.css");
$layout->get_static();


$content = [
    [
        "title" => "Бодрящий Americano",
        "photo" => "../static/img/americano.jpeg",
        "price" => 100,
        "description" => "Попробовав Americano с утра, больше не захочется начинать день по другому",
    ],
    [
        "title" => "Классический Capuchino",
        "photo" => "../static/img/capuchino.jpg",
        "price" => 200,
        "description" => "Самый популярный вид кофе Capuchino, лучший способ скоротать ожидание.",
    ],
    [
        "title" => "Воздушный Latte",
        "photo" => "../static/img/latte.jpg",
        "price" => 300,
        "description" => "Напиток которым можно наслаждаться каждый день",
    ],
    [
        "title" => "Ароматный Amaretto",
        "photo" => "../static/img/amareto.jpg",
        "price" => 350,
        "description" => "Неповторимый вкус бразильского Amaretto не оставить вас равнодушными.",
    ],
];

?>

<div class="container">
    <ul class="catalog_list">
        <?php foreach($content as $product) {?>

            <li class="catalog_item">
                <div class="catalog_item_photo" style="background-image: url('<?= $product["photo"] ?> ');">
                    <a href="#" class="catalog_item_photo_link">
                    </a>
                </div>
                <div class="flex_wrap">
                    <a href="" class="catalog_item_title_link">
                    <h3 class="catalog_item_title"><?= $product["title"] ?></h3>
                    </a>
                    <span class="catalog_item_price"><?= $product["price"] ?> р.</span>
                </div>
                <p class="catalog_item_description">
                    <?= $product["description"] ?>
                </p>
            </li>

        <?php }?>
    </ul>

</div>