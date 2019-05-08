<?
require_once 'db/queries.php';
require_once 'templates/config.php';
require_once 'templates/functions.php';
?>

<?
$bestsellers = getBestSellers($dbh);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Главная</title>
	<? require_once('html_templates/links.php'); ?>
</head>
<body>
	<? require_once('html_templates/header.php'); ?>
	<section>
		<div class="default_container new_container">
			<div class="slide-main main-carousel">
				<div class="slider_container">
					<div class="slider_image_block">
						<div class="slider_image">
							<img src="images/phone_slider.png">
						</div>
						<div class="slider_image_frame">
							<img src="images/ramka.png">
						</div>
					</div>
					<div class="slider_info">
						<div class="slider_title">
							Топовый
							<br>
							смартфон
						</div>
						<div class="slider_description">
							Lorem idаыфpsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut афlabore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitыation ullвamco lаaboris nisi ut aliquip ex ea commodo
						</div>
						<div class="slider_more_info">
							<a href="#">Подробнее</a>
							<img src="images/strelka.png">
						</div>
					</div>
				</div>
				<div class="slider_container">
					<div class="slider_image_block">
						<div class="slider_image">
							<img src="images/phone_slider.png">
						</div>
						<div class="slider_image_frame">
							<img src="images/ramka.png">
						</div>
					</div>
					<div class="slider_info">
						<div class="slider_title">
							Топовый
							<br>
							смартфон
						</div>
						<div class="slider_description">
							Lorem idаыфpsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut афlabore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitыation ullвamco lаaboris nisi ut aliquip ex ea commodo
						</div>
						<div class="slider_more_info">
							<a href="#">Подробнее</a>
							<img src="images/strelka.png">
						</div>
					</div>
				</div>
			</div>
		</div>
		</section>
		<section>
			<div class="default_container new_section_container">
				<div class="new_section_title">
					Наши акции
				</div>
				<div class="stock_items">
					<div class="goods-carousel">
						<div class="stock_block">
							<div class="stock_image">
								<img src="images/stock_item_1.jpg">
							</div>
							<div class="stock_text_container">
								<div class="stock_text">
									<div class="stock_description">
										Легкие ноутбуки
										<br>
										Xiaomi Mi Notebook Air
									</div>
									<div class="stock_prices">
										<div class="stock_new_price">
											64 990 р.
										</div>
										<div class="stock_old_price">
											72 990
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="stock_block">
							<div class="stock_image">
								<img src="images/stock_item_1.jpg">
							</div>
							<div class="stock_text_container">
								<div class="stock_text">
									<div class="stock_description">
										Легкие ноутбуки
										<br>
										Xiaomi Mi Notebook Air
									</div>
									<div class="stock_prices">
										<div class="stock_new_price">
											64 990 р.
										</div>
										<div class="stock_old_price">
											72 990
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="stock_block">
							<div class="stock_image">
								<img src="images/stock_item_1.jpg">
							</div>
							<div class="stock_text_container">
								<div class="stock_text">
									<div class="stock_description">
										Легкие ноутбуки
										<br>
										Xiaomi Mi Notebook Air
									</div>
									<div class="stock_prices">
										<div class="stock_new_price">
											64 990 р.
										</div>
										<div class="stock_old_price">
											72 990
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="stock_block">
							<div class="stock_image">
								<img src="images/stock_item_2.jpg">
							</div>
							<div class="stock_text_container">
								<div class="stock_text">
									<div class="stock_description">
										Беспроводные
										<br>
										Наушники
									</div>
									<div class="stock_prices">
										<div class="stock_new_price">
											8 590 р.
										</div>
										<div class="stock_old_price">
											10 590
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="new_section_container">
				<div class="default_container new_section_title">
					Хиты продаж
				</div>
				<div class="slider_main_block">
					<div class="bg_slider">
						<div class="items_bestsellers_container bestseller-carousel">
							<?php foreach($bestsellers as $bestseller): ?>
							<div class="item_bestseller">
								<div class="bestseller_image">
									<?='<a href="/catalog/'. concatCategoryAndFullName($bestseller['category_name'], $bestseller['url_name'], $bestseller['color_name']). '">';?>
										<?='<img src="'. PRODUCT_IMAGES_PATH . $bestseller['image_name']. '">';?>
									</a>
								</div>
								<div class="bestseller_description">
									<?=$bestseller['name']; ?>
								</div>
								<div class="bestseller_price">
									<div class="standart_price">
										<?
										if ($bestseller['discount_price'] != $bestseller['price'])
											echo '<strike>'. $bestseller['price']. '</strike>';
										else
											echo $bestseller['price'];
										?>
									</div>
									<div class="discount_price">
										<?
										if ($bestseller['discount_price'] != $bestseller['price'])
											echo $bestseller['discount_price'];
										?>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="default_container advertising">
				<div class="left_advertising_block">
					<div class="left_advertising">
						<div class="left_advertising_description">
							Мощные смартфоны
							<br>
							по вкусной цене
						</div>
						<div class="button_see_all">
							<button>Смотреть все</button>
						</div>
					</div>
					<div class="left_advertising_image">
						<img src="images/left_adv.png">
					</div>
				</div>
				<div class="right_advertising_block">
					<div class="right_advertising">
						<div class="image_advertising">
							<img src="images/top_right_adv.png">
						</div>
						<div class="description_advertising">
							Скоростные
							<br>
							ноутбуки
						</div>
					</div>
					<div class="right_advertising">
						<div class="image_advertising">
							<img src="images/bottom_right_adv.png">
						</div>
						<div class="description_advertising">
							Удобные
							<br>
							Аксессуары
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="new_section_container">
				<div class="default_container new_section_title">
					О компании
				</div>
				<div class="about_company">
					<div class="about_company_left_container">
						<div class="about_company_description">
							<div class="about_company_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
								<p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
								<p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>
								<p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<p>
									<b>Узнать больше</b>
									<img src="images/double_strelka.png">
								</p>
							</div>
						</div>
					</div>
					<div class="about_company_right_container"></div>
				</div>
			</div>
		</section>
		<section>
			<div class="default_container new_section_container">
				<div class="advantages">
					<div class="advantage_item">
						<div class="advantage_image">
							<img src="images/truck.png">
						</div>
						<div class="advantage_description">
							Бесплатная
							<br>
							и быстрая доставка
						</div>
					</div>
					<div class="advantage_item">
						<div class="advantage_image">
							<img src="images/clock.png">
						</div>
						<div class="advantage_description">
							Работа
							<br>
							Без выходных
						</div>
					</div>
					<div class="advantage_item">
						<div class="advantage_image">
							<img src="images/coins.png">
						</div>
						<div class="advantage_description">
							Отсутствие предоплаты
							<br>
						</div>
					</div>
					<div class="advantage_item">
						<div class="advantage_image">
							<img src="images/thumbs_up.png">
						</div>
						<div class="advantage_description">
							Гарантия качества
							<br>
							и простой возврат
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	
	<? require_once('html_templates/footer.php'); ?>
	<? require_once('html_templates/scripts_imports.php'); ?>

	<script src="slick-master/slick/slick.min.js" type="text/javascript"></script>
	<script src="scripts/catalog-carousel.js" type="text/javascript"></script>
</body>
</html>
