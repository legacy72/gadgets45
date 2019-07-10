<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Корзина</title>
	<? require_once('html_templates/links.php'); ?>
</head>
<body>
	<? require_once('html_templates/header.php'); ?>
			<div class="default_container new_container">
				<div class="navigation_menu">
					<a href="/">Главная</a>
					<img src="../../images/strelka.png">
					<a href="/cart">Корзина</a>
				</div>
			</div>
		<section>
			<div class="default_container new_container">
				<div class="new_section_title">
					Корзина
				</div>

				<div class="cart">
					<div class="cart_items">
						
					</div>

					<div class="cart_result">
						<div class="result_info">
							<div class="cart_res_descr">
								Итого:
							</div>
							<div class="count_orders">
								Количество товаров: <b></b>
							</div>
							<div class="sum_orders">
								Итоговая стоимость: <b></b>
							</div>
						</div>
						<div class="button_order">
							<a href="/order">
								<button>
									Оформить заказ
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>

		</section>
		<section>
			<? require_once('templates/stock_items.php'); ?>
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
