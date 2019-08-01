<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Заказ</title>
	<? require_once('html_templates/links.php'); ?>
</head>
<body>
	<? require_once('html_templates/header.php'); ?>
			<div class="default_container new_container">
				<div class="navigation_menu">
					<a href="/">Главная</a>
					<img src="../../images/strelka.png">
					<a href="/order">Заказ</a>
				</div>
			</div>
		</section>
		<section>
			<div class="default_container new_container">
				<div class="default_container new_section_title">
					Оформление заказа
				</div>
				<form onsubmit="return false">
					<div class="order_container">
						<div class="order_info">
							<div class="order_info_title">
								Укажите адрес доставки
							</div>
							<div class="order_info_row">
								<input id="street_order" class="order_input" type="text" placeholder="Улица" name="" value="1" required>
							</div>
							<div class="order_info_row">
								<input id="home_order" class="home_info order_input" type="text" placeholder="Дом" name="" value="1" required>
								<input id="entrance_order" class="home_info order_input" type="text" placeholder="Подъезд" name="" value="1" required>
								<input id="apartment_order" class="home_info order_input" type="text" placeholder="Квартира" name="" value="1" required>
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
								<input id="name_customer_order" class="order_input" type="text" placeholder="Ваше имя" name="" value="1" required>
							</div>
							<div class="order_info_row">
								<input id="phone_customer_order" class="order_input" type="text" placeholder="Ваш телефон" name="" value="89991232111" required>
							</div>
							<div class="order_info_row">
								<input id="email_customer_order" class="order_input" type="email" placeholder="Ваш email" name="" value="1@mail.ru" required>
							</div>
							<div class="order_info_row">
								<textarea id="comment_order" class="order_rich_text_box" type="text" placeholder="Ваш комментарий (не обязательно)" name="" value="1"></textarea>
							</div>
							<button class="btn_order">
								Оформить заказ
							</button>
						</div>
					</div>
				</form>
			</div>
		</section>
	</main>
	<? require_once('html_templates/footer.php'); ?>
	<? require_once('html_templates/scripts_imports.php'); ?>
	<script src="scripts/maskedinput.js" type="text/javascript"></script>
	<script>
		// Маска для телефона
		$("#phone_customer_order").mask("8(999) 999-9999");
	</script>
</body>
</html>
