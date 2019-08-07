<?
require_once 'db/queries.php';
require_once 'templates/config.php';
require_once 'templates/functions.php';
?>

<?
$bestsellers = getBestSellersOrStocks($dbh, 'bestseller');
$stocks = getBestSellersOrStocks($dbh, 'stock');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Gadgets45 - смартфоны, ноутбуки и аксессуары к ним по выгодным ценам</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="ОПИСАНИЕ">
	<meta name="keywords" content="смартфоны, ноутбуки, аксессуары, Meizu, Xiaomi, Huawei">

	<!-- Favicons -->
	<? require_once('html_templates/links_favicons.php'); ?>
	<!-- OG Tags -->
	<meta property="og:title" content="Gadgets45">
	<meta property="og:description" content="Смартфоны и ноутбуки по выгодным ценам">
	<meta property="og:type" content="article">
	<meta property="og:image" content="images/preview.jpg">
	<meta property="og:site_name" content="Gadgets45">
	<meta name="robots" content="noindex, follow">
	<!-- Head Color -->
	<meta name="theme-color" content="#0093ed" />
	<!-- CSS Styles -->
	<? require_once('html_templates/links.php'); ?>
</head>
<body>
	<!-- Preloader -->

	<!-- Header -->
	<header class="header" id="header">
		<? require_once('html_templates/header.php'); ?>
		<div class="offer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<!-- Empty, paste after -->
					</div>
					<div class="col-12 col-xl-9">
						<div class="offer-slider">
							<div class="slide d-flex">
								<div class="slide__pic">
									<div class="wrap"></div>
									<img src="images/slider/phone_slider.png" alt="Топовый смартфон">
								</div>
								<div class="slide__descr">
									<p class="slide__head">
										Топовый 
										<span>
											смартфон
										</span>
									</p>
									<p class="slide__txt">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, placeat ratione, in libero quis doloribus necessitatibus
									</p>
									<a href="" class="slide__link know-more">
										Подробнее
										<i class="fas fa-long-arrow-alt-right"></i>
									</a>
								</div>
							</div>
							<div class="slide d-flex">
								<div class="slide__pic">
									<div class="wrap"></div>
									<img src="images/slider/phone_slider.png" alt="Топовый смартфон">
								</div>
								<div class="slide__descr">
									<p class="slide__head">
										Топовый 
										<span>
											смартфон
										</span>
									</p>
									<p class="slide__txt">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, placeat ratione, in libero quis doloribus necessitatibus earum temporibus quia
									</p>
									<a href="" class="slide__link know-more">
										Подробнее
										<i class="fas fa-long-arrow-alt-right"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<main class="main" id="main">
		<section class="s-shares" id="s-shares">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="shares">
							<h2 class="s-title">
								Наши акции
							</h2>
							<div class="shares-slider">
								<?php foreach($stocks as $stock): ?>
									<?='<a href="/catalog/'. concatCategoryAndFullName($stock['category_name'], $stock['url_name'], $stock['color_name']). '" class="slide d-flex">';?>
										<div class="slide__pic">
											<?='<img src="'. PRODUCT_IMAGES_PATH . $stock['image_name']. '" alt="'. getProductNameWithColor($stock['name'], $stock['color_name']). '">';?>
										</div>
										<div class="slide__descr d-flex">
											<h4 class="slide__head">
												<?=getProductNameWithColor($stock['name'], $stock['color_name']); ?>
											</h4>
											<div class="slide__price">
												<span class="slide__price_new">
													<?=priceFormat($stock['discount_price']); ?>
												</span>
												<span class="slide__price_old">
													<?=priceFormat($stock['price']); ?>
												</span>
											</div>
										</div>
									</a>
								<?php endforeach;?>
							</div>
							<div class="shares-slider__dots"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="s-bestseller" id="s-bestseller">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bestseller">
							<h2 class="s-title">
								Хиты продаж
							</h2>
							<div class="bestseller-slider">
								<?php foreach($bestsellers as $bestseller): ?>
									<div class="slide">
										<div class="slide__pic">
											<?='<a href="/catalog/'. concatCategoryAndFullName($bestseller['category_name'], $bestseller['url_name'], $bestseller['color_name']). '" class="product_ref">'; ?>
											<?='<img src="'. PRODUCT_IMAGES_PATH . $bestseller['image_name']. '" alt="'. getProductNameWithColor($bestseller['name'], $bestseller['color_name']). '">';?>
											</a>
										</div>
										<div class="slide__descr d-flex">
											<?='<h4 class="slide__head" ptc_id="'. $bestseller['ptc_id']. '">'; ?>
												<?=getProductNameWithColor($bestseller['name'], $bestseller['color_name']); ?>
											</h4>
											<div class="slide__price">
												<span class="slide__price_new discount_price product_price">
													<?=priceFormat($bestseller['discount_price']); ?>
												</span>
												<span class="slide__price_old standart_price">
													<?=priceFormat($bestseller['price']); ?>
												</span>
											</div>
											<button class="slide__btn buy-btn button_add_product_to_cart add_product_to_cart_main">
												В корзину
											</button>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="bestseller-slider__dots"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="s-list" id="s-list">
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-7">
						<div class="phones d-flex">
							<div class="phones__descr d-flex">
								<h5 class="phones__title list-title">
									Мощные смартфоны по вкусной цене
								</h5>
								<a href="/catalog/smartphones" class="phones__btn list-btn">
									Смотреть все
								</a>
							</div>
							<div class="phones__pic"></div>
						</div>
					</div>
					<div class="col-12 col-lg-5">
						<div class="apps-wrapper d-flex">
							<div class="apps d-flex">
								<div class="apps__wrap">
									<div class="apps__pic">
										<img src="images/list/top_right_adv.png" alt="Мощные ноутбуки">
									</div>
									<div class="btn-wrap">
										<a href="/catalog/notebooks" class="apps__btn list-btn">
											Смотреть все
										</a>
									</div>
								</div>
								<h5 class="apps__title list-title">
									Мощные ноутбуки
								</h5>
							</div>
							<div class="apps d-flex">
								<div class="apps__wrap">
									<div class="apps__pic">
										<img src="images/list/bottom_right_adv.png" alt="Мощные ноутбуки">
									</div>
									<div class="btn-wrap">
										<a href="/catalog/accessories" class="apps__btn list-btn">
											Смотреть все
										</a>
									</div>
								</div>
								<h5 class="apps__title list-title">
									Удобные аксессуары
								</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="s-about" id="s-about">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2 class="s-title">
							О компании
						</h2>
					</div>		
				</div>
			</div>
			<div class="gray-bg">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<div class="company">
								<p class="company__txt">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum officia libero excepturi magnam aliquid ullam 				
								</p>
								<p class="company__txt">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum tempora atque a necessitatibus odio labore molestiae rem dicta, culpa doloremque, delectus blanditiis velit
								</p>
								<p class="company__txt">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, reprehenderit, amet
								</p>
								<a href="/about" class="company__link">
									Узнать больше
									<i class="fas fa-angle-double-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</section>
		<section class="s-benefits" id="s-benefits">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-6 col-lg-3">
						<div class="benefit">
							<div class="benefit__pic">
								<img src="images/icons/truck.png" alt="Бесплатная и быстрая доставка">
							</div>
							<h6 class="benefit__title">
								Бесплатная <br> и быстрая доставка
							</h6>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3">
						<div class="benefit">
							<div class="benefit__pic">
								<img src="images/icons/clock.png" alt="Работа без выходных">
							</div>
							<h6 class="benefit__title">
								Работа <br> без выходных
							</h6>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3">
						<div class="benefit">
							<div class="benefit__pic">
								<img src="images/icons/coins.png" alt="Отсутствие переплаты">
							</div>
							<h6 class="benefit__title">
								Отсутствие переплаты
							</h6>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3">
						<div class="benefit">
							<div class="benefit__pic">
								<img src="images/icons/thumbs_up.png" alt="Гарантия качества и простой возврат">
							</div>
							<h6 class="benefit__title">
								Гарантия качества и простой возврат
							</h6>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<? require_once('html_templates/footer.php'); ?>

	<!-- Modal Window -->
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
							<input type="text" class="form-order__input" required placeholder="Ваше имя:*">
							<input type="text" class="form-order__input" required placeholder="Ваш телефон:*">
							<input type="text" class="form-order__input" required placeholder="Ваш e-mail:*">
							<textarea name="message" class="form-order__message" placeholder="Ваш комементарий"></textarea>
							<div class="form-order__personal d-flex">
								<input type="checkbox" id="personal-data">
								<label for="personal-data" class="form-order__link">
									Я даю согласие на <a href="#">обработку персональных данных</a>
								</label>
							</div>
							<button type="submit" class="form-order__btn" disabled>
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
</body>
</html>