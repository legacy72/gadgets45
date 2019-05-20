<?
require_once 'config.php';
require_once '../db/queries.php';
require_once '../templates/functions.php';

$filter = array(); // инициализируем пустой фильтр
$category_id = 1; // по умолчанию ищем смартфоны
$category_name = 'smartphones'; // по умолчанию категория смартфоны
$price_from = 0;
$price_to = 999999;
$order_by = 1; // по умолчанию сортировка по возрастанию
$page_num = 1; // по умолчанию первая страница
// Сортировка по возрастанию (1) или по убыванию (2)
if(!empty($_GET['order_by'])){
	$order_by = $_GET['order_by'];
}
// если выбраны чекбоксы заполняем фильтр
if(!empty($_GET['filter'])) {
    $filter = $_GET['filter'];
}
if(!empty($_GET['category_id'])){
	$category_id = $_GET['category_id'];
}
if(!empty($_GET['category_name'])){
	$category_name = $_GET['category_name'];
}
if(!empty($_GET['price_from'])){
	$price_from = intval($_GET['price_from']);
}
if(!empty($_GET['price_to'])){
	$price_to = intval($_GET['price_to']);
}
if(!empty($_GET['page_num'])){
	$page_num = intval($_GET['page_num']);
}
// офсет для вывода продуктов конкретной страницы
$offset = ($page_num - 1) * PRODUCTS_ON_PAGE;

// Получаем фильтры, по которым нужно сортирвать (по активным чекбоксам)
$filterSpecs = getSpecificationsForFilter($dbh, $filter);

// Выбор всех продуктов подходящих под фильтры
$productItems = getProductItems($dbh, $filterSpecs, $category_id, $price_from, $price_to, $order_by, $limit = True, $offset);



// количество продуктов всего (чтобы посчитать сколько страниц)
$countProducts = getCountProducts($dbh, $filterSpecs, $category_id, $price_from, $price_to);
// Количество страниц для вывода всех продуктов
$countPages = getCountPages($countProducts);
// Текущая страница
$currentPage = $page_num;

echo '<div class="catalog_items">';
foreach($productItems as $product){
	$productFullName = getProductNameWithColor($product['product_name'], $product['color_name']);
	echo '
		<div class="catalog_item">
			<div class="item_name" ptc_id="'. $product['ptc_id']. '">
				<a href="'. concatCategoryAndFullName($category_name, $product['url_name'], $product['color_name']) .'">
					'. $productFullName. '
				</a>
			</div>
			<div class="item_image">
				<a href="'. $category_name. '/'. $product['url_name']. '-'. $product['color_name'] .'">
					<img src="../'. PRODUCT_IMAGES_PATH.$product['image_name'] .'">
				</a>
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
echo '</div>';
echo '<div class="pages_list">';
showPageNumbers($countPages, $currentPage);
echo '</div>';
