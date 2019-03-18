<?
require_once '../db/queries.php';
require_once 'config.php';

$category_id = $_POST['category_id'];
$price_from = $_POST['price_from'];
$price_to = $_POST['price_to'];

if ($category_id == 1){
	$productItems = getSmartphones($dbh, $price_from, $price_to);
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
				if ($product['discount_price'])
					echo '<strike>'. $product['price']. '</strike>';
				else
					echo $product['price'];
	echo '
			</div>
			<div class="discount_price">'. $product['discount_price'] .'</div>
		</div>
		<div class="item_button">
			<button>
				В корзину
			</button>
		</div>
	</div>
	';
}
