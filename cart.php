<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Корзина</title>
	<? require_once('html_templates/links.php'); ?>
</head>
<body>
	<? require_once('html_templates/header.php'); ?>
		<section>
			<div class="default_container new_container">
				<div class="new_section_title">
					Корзина
				</div>



				<!-- Переделать норм -->
				<div class="button_clear_cart">
					<button>
						Очистить корзину
					</button>
				</div>

				<div class="cart_items">
					
				</div>



<!-- 				<div class="cart_row">
					<div class="cart_item">
						<div class="item_image">
							<img src="images/ex1.jpg">
						</div>
						<div class="item_description">
							Huawei
							<br>
							MediaPad M5
						</div>
						<div class="item_price">
							35 990 р.
						</div>
						<div class="item_count">
							<div class="counter_minus">-</div>
							<div class="item_counter">1</div>
							<div class="counter_plus">+</div>
						</div>
					</div>
					<div class="cart_result">
						<div class="result_info">
							<div class="cart_res_descr">
								Итого:
							</div>
							<div class="count_orders">
								Количество товаров: <b>1 шт</b>
							</div>
							<div class="sum_orders">
								Итоговая стоимость: <b>35 990 р.</b>
							</div>
						</div>
						<div class="button_order">
							<button>
								Оформить заказ
							</button>
						</div>
					</div>
				</div>
				<div class="cart_row">
					<div class="cart_item">
						<div class="item_image">

						</div>
						<div class="item_description">
							Huawei
							<br>
							MediaPad M5
						</div>
						<div class="item_price">
							35 990 р.
						</div>
						<div class="item_count">
							<div class="counter_minus">-</div>
							<div class="item_counter">1</div>
							<div class="counter_plus">+</div>
						</div>
					</div>
				</div> -->
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
