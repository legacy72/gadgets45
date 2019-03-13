<?
require_once 'db/queries.php';
require_once 'templates/config.php';

$images = getImages($dbh);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Каталог</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<link rel="stylesheet" type="text/css" href="slick-master/slick/slick-theme.css"/>
	<link rel="stylesheet" type="text/css" href="slick-master/slick/slick.css"/>
</head>
<body>
	<header>
		<section>
			<div class="container header_container">
				<div class="logo">
					<img src="logo/white_logo.png">
				</div>
				<div class="header_menu">
					<ul>
						<li><a href="">О компании</a></li>
						<li><a href="">Каталог</a></li>
						<li><a href="">Контакты</a></li>
					</ul>
				</div>
				<div class="working_period">
					<div class="working_period_text">Без выходных</div>
					<div class="working_period_time">С 8:00 до 22:00</div>
				</div>
				<div class="header_contacts">
					<div class="header_phone">
						<img src="images/phone.png">
						<div class="phone_number">+7 916 448 62 84</div>
					</div>
					<div class="call_order">
						Заказать звонок
					</div>
				</div>
			</div>
		</section>
	</header>
	<main>
		<section>
			<div class="container minimized_menu">
				<div class="sidebar">
					<div class="sidebar_menu_container">
						<div class="header_catalog_menu">
							<img src="images/burger.png">
							<p>Каталог товаров</p>
						</div>
					</div>
					<!-- <div class="catalog catalog_gadgets">
						<ul>
							<li><a href="#"></a>Смартфоны</li>
							<li><a href="#"></a>Ноутбуки</li>
							<li><a href="#"></a>Аксессуары</li>
						</ul>
					</div>
					<div class="catalog catalog_firms">
						<ul>
							<li><a href="#"></a>Meizu</li>
							<li><a href="#"></a>Xiaomi</li>
							<li><a href="#"></a>Huawei</li>
						</ul>
					</div> -->
				</div>
				<div class="main_content">
					<div class="main_top_head">
						<div class="main_top_menu">
							<ul>
								<li><a href=""></a>Оплата и доставка</li>
								<li><a href=""></a>Гаратнии</li>
								<li><a href=""></a>Возврат</li>
							</ul>
						</div>
						<div class="loupe">
							<img src="images/loupe.png">
						</div>
						<div class="shopping_cart_block">
							<div class="shopping_cart_text">
								<img src="images/push_cart.png">
								6 540р. (2)
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container new_container">
				<div class="navigation_menu">
					<a href="#">Главная</a>
					<img src="images/strelka.png">
					<a href="#">Каталог</a>
				</div>
			</div>
		</section>
		<section>
			<div class="container new_container">
				<div class="new_section_title">
					Каталог
				</div>
				<div class="catalog_container">
					<div class="catalog_menu">
						<div class="catalog_price_title">
							Цена
						</div>
						<div class="price_range">
							<input class="price_from" type="text" placeholder="6990" name="">
							<input class="price_to" type="text" placeholder="199 000" name="">
						</div>
						<div class="price_variants">
							<div class="price_variants_row">
								<input type="checkbox" name="" checked=""><p>Все цены</p>
							</div>
							<div class="price_variants_row">
								<input type="checkbox" name=""><p>Менее 20 000 р.</p>
							</div>
							<div class="price_variants_row">
								<input type="checkbox" name=""><p>20 000 - 30 000 р.</p>
							</div>
							<div class="price_variants_row">
								<input type="checkbox" name=""><p>30 000 - 40 000 р.</p>
							</div>
							<div class="price_variants_row">
								<input type="checkbox" name=""><p>40 000 - 50 000 р.</p>
							</div>
							<div class="price_variants_row">
								<input type="checkbox" name=""><p>50 000 - 60 000 р.</p>
							</div>
							<div class="price_variants_row">
								<input type="checkbox" name=""><p>60 000 р. и более</p>
							</div>
						</div>
					</div>
					<div class="catalog_block">
						<div class="catalog_header">
							<div class="catalog_title">
								Смартфоны
							</div>
							<div class="catalog_sort_block">
								<div class="sort_text">
									Соритровать по:
								</div>
								<div class="sort_menu">
									Цене
								</div>
							</div>
						</div>
						<div class="slider">
							<div class="phone-carousel">
								<?php foreach($images as $image): ?>
									<div class="catalog_item"><img src=<?=PRODUCT_IMAGES_PATH.$image['name']; ?>></div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<footer>
		<div class="container">
			<div class="footer_container">
				<div class="footer_logo">
					<img src="logo/black_logo.png">
				</div>
				<div class="footer_menu">
					<ul>
						<li><a href="#">О компании</a></li>
						<li><a href="#">Каталог</a></li>
						<li><a href="#">Контакты</a></li>
						<li><a href="#">Помощь</a></li>
					</ul>
				</div>
				<div class="footer_contacts">
					<div class="footer_phone">
						<img src="images/phone.png">
						+7 916 448 62 84
					</div>
					<div class="footer_call_order">
						Заказать звонок
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuerry -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>

	<!-- Bootstrap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

	<!-- Slick-Carousel -->
	<script type="text/javascript" src="scripts/catalog-carousel.js" charset="utf-8"></script>
	<script type="text/javascript" src="slick-master/slick/slick.min.js"></script>
</body>
</html>
