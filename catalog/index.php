<?php



Layout::get_instance()->set_static("catalog.css");
Layout::get_instance()->get_static();




// $content = [
//     [
//         "title" => "Бодрящий Americano",
//         "photo" => "../static/img/americano.jpeg",
//         "price" => 100,
//         "description" => "Попробовав Americano с утра, больше не захочется начинать день по другому",
//     ],
//     [
//         "title" => "Классический Capuchino",
//         "photo" => "../static/img/capuchino.jpg",
//         "price" => 200,
//         "description" => "Самый популярный вид кофе Capuchino, лучший способ скоротать ожидание.",
//     ],
//     [
//         "title" => "Воздушный Latte",
//         "photo" => "../static/img/latte.jpg",
//         "price" => 300,
//         "description" => "Напиток которым можно наслаждаться каждый день",
//     ],
//     [
//         "title" => "Ароматный Amaretto",
//         "photo" => "../static/img/amareto.jpg",
//         "price" => 350,
//         "description" => "Неповторимый вкус бразильского Amaretto не оставить вас равнодушными.",
//     ],
// ];

// foreach ($content as $value){
//     $product = new Product();
//     $product->set($value);
//     $product->save();
// }

$products = new Product();
$products = $products->find_all();


?>

<div class="container">
    <ul class="catalog_list">
        <?php foreach($products as $product) {?>

            <li class="catalog_item">
                <div class="catalog_item_photo" style="background-image: url('<?= $product->photo ?> ');">
                    <a href="/catalog/<?= $product->id ?>/" class="catalog_item_photo_link">
                    </a>
                </div>
                <div class="flex_wrap">
                    <a href="/catalog/<?= $product->id ?>/" class="catalog_item_title_link">
                    <h3 class="catalog_item_title"><?= $product->title ?></h3>
                    </a>
                    <span class="catalog_item_price"><?= $product->price ?> р.</span>
                </div>
                <p class="catalog_item_description">
                    <?= $product->description ?>
                </p>
            </li>

        <?php }?>
    </ul>

</div>