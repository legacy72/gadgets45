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
	<meta name="description" content="Лучшие смартфоны, ноутбуки и аксессуры к ним по самым низким ценам на просторах России. Быстрая доставка, отличное качество и гарантия возврата товара">
	<!-- Metas -->
	<? require_once('html_templates/head.php'); ?>
</head>
<body>
	<!-- Header -->
	<header class="header" id="header">
		<? require_once('html_templates/preloader.php'); ?>
		<? require_once('html_templates/header.php'); ?>
		<div class="offer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<!-- Empty -->
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
                                                <span class="slide__price_new product__price_new discount_price product_price">
                                                    <?=priceFormat($bestseller['discount_price']); ?>
                                                </span>
                                                <span class="slide__price_old standart_price">
                                                    <?=priceFormat($bestseller['price']); ?>
                                                </span>
                                            </div>
                                            <button class="slide__btn buy-btn button_add_product_to_cart add_product_to_cart_main product__btn">
                                                В корзину
                                                <span>
                                                    Товар добавлен
                                                </span>
                                                <i class="fas fa-shopping-cart"></i>
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
		<? require_once('templates/stock_items.php'); ?>
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
		<? require_once('html_templates/benefits.php'); ?>
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
							<textarea name="message" class="form-order__message" placeholder="Ваш комментарий"></textarea>
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

	
	<!-- Scripts -->
	<? require_once('html_templates/scripts_imports.php'); ?>
</body>
</html>