<?
require_once '../db/queries.php';
require_once 'config.php';

$filter = array(); // инициализируем пустой фильтр
$category_id = 1; // по умолчанию ищем смартфоны
$price_from = 0;
$price_to = 999999;
// если выбраны чекбоксы заполняем фильтр
if(!empty($_POST['filter'])) {
    $filter = $_POST['filter'];
}
if(!empty($_POST['category_id'])){
	$category_id = $_POST['category_id'];
}
if(!empty($_POST['price_from'])){
	$price_from = intval($_POST['price_from']);
}
if(!empty($_POST['price_to'])){
	$price_to = intval($_POST['price_to']);
}

// Получаем фильтры, по которым нужно сортирвать (по активным чекбоксам)
list($filterSpecs, $filterParams) = getSpecificationsForFilter($dbh, $filter);

// Выбор какую категорию сортировать
if ($category_id == 1){
	$productItems = getSmartphones($dbh, $filterSpecs, $filterParams, $price_from, $price_to);
}
else if ($category_id == 2){
	$productItems = getNotebooks($dbh, $price_from, $price_to);
}
else if ($category_id == 3){
	//
}

foreach($productItems as $product){
	echo '
		<div class="catalog_item">
			<div class="item_name">'.$product['product_name'] .' '. $product['color_name'].'</div>
			<div class="item_image">
				<img src="../'. PRODUCT_IMAGES_PATH.$product['image_name'] .'">
			</div>
			<div class="item_count">
				Кол-во: '. $product['quantity'].'
			</div>
			<div class="item_price">
				<div class="standart_price">';
				if ($product['discount_price'] != $product['price'])
					echo '<strike>'. $product['price']. '</strike>';
				else
					echo $product['price'];
	echo '
			</div>
			<div class="discount_price">';
				if ($product['discount_price'] != $product['price'])
					echo $product['discount_price'];
	echo	'</div>
		</div>
		<div class="item_button">
			<button>
				В корзину
			</button>
		</div>
	</div>
	';
}
