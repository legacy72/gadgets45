<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Заказ</title>
	<? require_once('html_templates/links.php'); ?>
</head>
<body>
	<? require_once('html_templates/header.php'); ?>
		<section>
			<div class="default_container new_container">
				<div class="default_container new_section_title">
					Оформление заказа
				</div>
				<div class="order_container">
					<div class="order_info">
						<div class="order_info_title">
							Укажите адрес доставки
						</div>
						<div class="order_info_row">
							<input class="order_input" type="text" placeholder="Улица" name="" value="">
						</div>
						<div class="order_info_row">
							<input class="home_info order_input" type="text" placeholder="Дом" name="" value="">
							<input class="home_info order_input" type="text" placeholder="Подъезд" name="" value="">
							<input class="home_info order_input" type="text" placeholder="Квартира" name="" value="">
						</div>
						<div class="order_info_row">
							<input class="intercom_info order_input" type="text" placeholder="Домофон" name="" value="">
							<input class="home_info order_input" type="text" placeholder="Этаж" name="" value="">
						</div>
						<div class="paymant_block">
							<div class="paymant_title">
								Выберите способ оплаты
							</div>
							<div class="paymant">
								<img src="images/money.png">
								<div class="paymant_text">Онлайн касса</div>
							</div>
							<div class="paymant">
								<img src="images/hand_with_cart.png">
								<div class="paymant_text">Наличными при получении</div>
							</div>
						</div>
					</div>
					<div class="order_contacts">
						<div class="order_info_title">
							Укажите контактные данные
						</div>
						<div class="order_info_row">
							<input class="order_input" type="text" placeholder="Ваше имя" name="" value="">
						</div>
						<div class="order_info_row">
							<input class="order_input" type="text" placeholder="Ваш телефон" name="" value="">
						</div>
						<div class="order_info_row">
							<textarea class="order_rich_text_box" type="text" placeholder="Ваш комментарий" name="" value=""></textarea>
						</div>
						<button class="btn_order">
							Оформить заказ
						</button>
					</div>
				</div>
			</div>
		</section>
	</main>
	<? require_once('html_templates/footer.php'); ?>
	<? require_once('html_templates/scripts_imports.php'); ?>
</body>
</html>
