<?
require_once 'db/queries.php';
require_once 'templates/config.php';
require_once 'templates/functions.php';
?>

<?
// Айди цвета
$color_id = getColorID($dbh, $_GET['color_name']);
// Основная информация о пордукте
$productMainInfo = getProductMainInfo($dbh, $_GET['product_url_name'], $color_id);
// Цвет товара
$colorName = getColorName($_GET['color_name']);
// Все картинки продукта
$productImages = getProductImages($dbh, $productMainInfo['id'], $color_id);
// Характеристики продукта
$productSpecificatios = getProductSpecifictions($dbh, $_GET['product_url_name']);
// Основные характеристики продукта на русском
$mainSpec = getMainProductSpecifications($productSpecificatios, $_GET['category_name']);
// Получаем характеристики сгруппированные по  категориям
$specificationsByGroups = getSpecificationsByGroups($productSpecificatios);
// Получаем все цвета продукта
$colors = getProductColors($dbh, $productMainInfo['id']);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title><?= $productMainInfo['description_title']; ?></title>
	<!-- Favicons -->
	<? require_once('html_templates/links_favicons.php'); ?>
	<!-- CSS Styles -->
	<? require_once('html_templates/links.php'); ?>
</head>

<body>
	<? require_once('html_templates/header.php'); ?>
	<section class="s-crumbs" id="s-crumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ul class="crumbs d-flex">
						<li class="crumbs__item">
							<a href="/">
								Главная
							</a>
						</li>
						<li class="crumbs__item">
							<a href="/catalog/smartphones">
								Каталог
							</a>
						</li>
						<li class="crumbs__item">
							<?='<a href="/catalog/'. $_GET['category_name'].'">'. CATEGORY_ENG_TO_RUS[$_GET['category_name']].'</a>';?>
						</li>
						<li class="crumbs__item active">
							<?= '<a href="/catalog/smartphones/' . concatProductNameAndColor($_GET['product_url_name'], $_GET['color_name']) . '">' . $productMainInfo['name'] . ' ' . $colorName . '</a>'; ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="s-product" id="s-product">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="single-product d-flex">
						<?= '<div class="product_container" ptc_id="' . $productMainInfo['ptc_id'] . '">'; ?>
							<div class="product_images">
								<div class="slider-main-image">
									<?php foreach ($productImages as $productImage) : ?>
										<div class="main_image">
											<a <?= 'href="../../' . PRODUCT_IMAGES_PATH . $productImage['name'] . '"' ?> class='main_page'>
												<?= '<img src="../../' . PRODUCT_IMAGES_PATH . $productImage['name'] . '">'; ?>
											</a>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="small_images slider-small-images">
									<?php foreach ($productImages as $productImage) : ?>
										<div class="small_img">
											<?= '<img src="../../' . PRODUCT_IMAGES_PATH . $productImage['name'] . '">'; ?>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<div class="product_description">
							<h4 class="product_title">
								<?= $productMainInfo['name'] . ' ' . $colorName; ?>
							</h4>
							<span class="product_price">
								<?= priceFormat($productMainInfo['discount_price']); ?>
							</span>
							<?php if (count($colors) != 1 && $colors[0]['name'] != 'standart') : ?>
								<div class="product_color">
									Цвет
									<div class="product_colors_blocks">
										<?php foreach ($colors as $color) : ?>
											<?= '<a href="' . $_GET['product_url_name'] . '-' . $color['name'] . '">'; ?>
											<? if ($color['name'] == mb_strtolower($colorName)): ?>
												<div class="color_block active" style="background-color: <?= COLORS_TO_RGB[$color['name']]; ?>"></div>
											<? else: ?>
												<div class="color_block" style="background-color: <?= COLORS_TO_RGB[$color['name']]; ?>"></div>
											<? endif; ?>
											<?= '</a>'; ?>
										<?php endforeach; ?>
									</div>
								</div>
							<?php endif; ?>
							<div class="product_specifications">
								<?php foreach ($mainSpec as $mainSpecKey => $mainSpecValue) : ?>
									<div class="specification_row">
										<div class="key">
											<?= $mainSpecKey; ?>
										</div>
										<div class="value">
											<?= $mainSpecValue; ?>
										</div>
									</div>
								<?php endforeach ?>
							</div>
							<div class="product_buttons d-flex">
								<button class="product__btn button_add_product_to_cart" id="add_product_to_cart_from_prod">
									В корзину
									<span>
										Товар добавлен
									</span>
									<i class="fas fa-shopping-cart"></i>
								</button>
								<button class="button_fast_order">
									<span>
										Быстрый заказ
									</span>
								</button>
							</div>
						</div>	
				</div>
			</div>
		</div>
	</section>
	<section class="s-tech" id="s-tech">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="tech-info">
						<ul class="tech-mnu d-flex">
							<li class="tech-mnu__item">
								<a id="product_description">
									Описание 
								</a>
							</li>
							<li class="tech-mnu__item">
								<a id="product_specifications">
									<span class="d-none d-sm-inline">Технические</span> характеристики
								</a>
							</li>
						</ul>
					</div>
					
					<div class="product_info_descr_block product_info">
						<div class="product_info_title">
							<?= $productMainInfo['description_title']; ?>
						</div>
						<div class="product_info_text">
							<?= $productMainInfo['description_text']; ?>
						</div>
					</div>
					<div class="product_info_specs_block product_info">
						<?php foreach ($specificationsByGroups as $specGroupKey => $specGroupValue) : ?>
							<div class="specifications_group_block">
								<div class="specification_category">
									<?= CATEGORY_GROUP_ENG_TO_RUS[$specGroupKey]; ?>
								</div>
								<?php for ($i = 0; $i < count($specGroupValue); $i++) : ?>
									<?php foreach ($specGroupValue[$i] as $specKey => $specValue) : ?>
										<div class="specification_block">
											<div class="specification_key">
												<?= $specKey; ?>
											</div>
											<div class="specification_value">
												<?= $specValue; ?>
											</div>
										</div>
									<?php endforeach; ?>
								<?php endfor; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<? require_once('html_templates/footer.php'); ?>
	<!-- Modal Quick Order -->
	<div style="display: none;">
	    <div class="box-modal quick-order" id="quickOrder">
	        <div class="box-modal_close arcticmodal-close">
	        	<i class="fas fa-times"></i>
	        </div>
	       <div class="q-order">
	       		<h3 class="q-order__title">
	       			Быстрый заказ
	       		</h3>
	       		<div class="q-order__body d-flex">
	       			<div class="q-order__pic">
	       				<img src="" alt="Товар">
	       			</div>
	       			<div class="q-order__info">
						<h3 class="q-order__head">
							Huawei Honor 8
						</h3>
						<span class="q-order__price">
							26 990 р.
						</span>
						<form action="#" class="form-order">
							<input type="text" class="form-order__input" id="name_customer_quick_order" required placeholder="Ваше имя:*">
							<input type="text" class="form-order__input phone_mask" id="phone_customer_quick_order" required placeholder="Ваш телефон:*">
							<input type="email" class="form-order__input" id="email_customer_quick_order" required placeholder="Ваш e-mail:*">
							<textarea name="message" class="form-order__message" id="comment_quick_order" placeholder="Ваш комементарий"></textarea>
							<div class="form-order__personal d-flex">
								<input type="checkbox" id="personal-data">
								<label for="personal-data" class="form-order__link">
									Я даю согласие на <a href="#">обработку персональных данных</a>
								</label>
							</div>
							<button class="form-order__btn" id="quick-order__btn" disabled>
								Купить
							</button>
						</form>
	       			</div>
	       		</div>	
	       </div>
	    </div>

	
	<!-- Modal Call Back -->
	<? require_once('html_templates/modal_call_back.php') ?>;
	<!-- Scripts -->
	<? require_once('html_templates/scripts_imports.php'); ?>

	<script src="../../scripts/product.js" charset="utf-8"></script>
</body>

</html>