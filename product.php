<?

require_once 'templates/config.php';
require_once 'db/queries.php';
require_once 'templates/functions.php';

// Айди цвета
$color_id = getColorID($dbh, $_GET['color_name']);
// Основная информация о пордукте
$productMainInfo = getProductMainInfo($dbh, $_GET['product_url_name'], $color_id);
// Цвет товара
$colorName = getColorName($_GET['color_name']);
// Все картинки продукта
$productImages = getProductImages($dbh, $productMainInfo['id'], $color_id);
// Основная картинка продукта
$mainImage = getMainImage($productImages);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Товар</title>
	<? require_once('html_templates/links.php'); ?>
</head>
<body>
	<? require_once('html_templates/header.php'); ?>
		<section>
			<div class="container new_container">
				<div class="product_container">
					<div class="product_images">
						<div class="main_image">
							<? echo' <img src="../'. PRODUCT_IMAGES_PATH. $mainImage .'">'; ?>
						</div>
						<div class="small_images">
							<div class="small_img"></div>
							<div class="small_img"></div>
							<div class="small_img"></div>
							<div class="small_img"></div>
						</div>
					</div>
					<div class="product_description">
						<div class="product_title">
							<?=$productMainInfo['name']. ' '. $colorName;?>
						</div>
						<div class="product_price">
							<?=priceFormat($productMainInfo['discount_price']);?>
						</div>
						<div class="product_color">
							Цвет
							<div class="product_colors_blocks">
								<div class="color_block black">

								</div>
								<div class="color_block blue">

								</div>
							</div>
						</div>
						<div class="product_specifications">
							<div class="specification_row">
								<div class="key">Материал корпуса</div>
								<div class="value">металл, стекло</div>
							</div>
							<div class="specification_row">
								<div class="key">Вес</div>
								<div class="value">169 г.</div>
							</div>
							<div class="specification_row">
								<div class="key">Диагональ</div>
								<div class="value">6.26 дюйм</div>
							</div>
							<div class="specification_row">
								<div class="key">Размер изображения</div>
								<div class="value">2280х1080</div>
							</div>
							<div class="specification_row">
								<div class="key">Фотокамера</div>
								<div class="value">12.5 МП</div>
							</div>
							<div class="specification_row">
								<div class="key">Фронтальная камера</div>
								<div class="value">24 млн пикс</div>
							</div>
							<div class="specification_row">
								<div class="key">Процессор</div>
								<div class="value">Qualcom Snapdragon 660</div>
							</div>
							<div class="specification_row">
								<div class="key">Количество ядер процессора</div>
								<div class="value">8</div>
							</div>
							<div class="specification_row">
								<div class="key">Объем встроенной памяти</div>
								<div class="value">64 Гб</div>
							</div>
							<div class="specification_row">
								<div class="key">Емкость аккумулятора</div>
								<div class="value">3350 мА/ч</div>
							</div>
						</div>
						<div class="product_buttons">
							<button class="button_add_product_to_cart">
								Добавить в корзину
							</button>
							<button class="button_fast_order">
								Быстрый заказ
							</button>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="container product_menu_background">
				<div class="product_menu_container">
					<div class="product_menu">
						<ul>
							<li><a href="">Описание</a></li>
							<li><a href="">Технические характеристики</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="product_info">
				<div class="product_info_title">
					Смартфон Xiaomi Mi8
				</div>
				<div class="product_info_text">
					<p>
						ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					</p>
					<p>
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
				</div>
			</div>
		</section>
	</main>

	<? require_once('html_templates/footer.php'); ?>
	<? require_once('html_templates/scripts_imports.php'); ?>

</body>
</html>
