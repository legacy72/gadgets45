<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Заказ</title>
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
								<a href="/order">
									Заказ
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section class="s-order" id="s-order">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2 class="s-title">
							Оформление заказа
						</h2>
					</div>
					<div class="col-12">
						<form onsubmit="return false">
							<div class="order_container d-flex">
								<div class="order_info">
									<div class="order_info_title">
										Укажите адрес доставки
									</div>
									<div class="order_info_row">
										<input id="street_order" class="order_input" type="text" placeholder="Улица" name="" required>
									</div>
									<div class="order_info_row">
										<input id="home_order" class="home_info order_input" type="text" placeholder="Дом" name="" required>
										<input id="entrance_order" class="home_info order_input" type="text" placeholder="Подъезд" name="" required>
										<input id="apartment_order" class="home_info order_input" type="text" placeholder="Квартира" name="" required>
									</div>
									<div class="payment_block">
										<div class="payment_title">
											Выберите способ оплаты
										</div>
										<div class="payment">
											<input type="radio" name="pay" id="pay-online">
											<label for="pay-online" class="pay-online">
												<div>
													<img src="images/icons/money.png" alt="Онлайн касса">
												</div>
												<span>Онлайн касса</span>
												
											</label>
										</div>
										<div class="payment">
											<input type="radio" name="pay" id="pay-home">
											<label for="pay-home" class="pay-home">
												<img src="images/icons/hand_with_cart.png" alt="Оплата наличными">
												<span>Наличными при получении</span>
												
											</label>
										</div>
									</div>
								</div>
								<div class="order_contacts">
									<div class="order_info_title">
										Укажите контактные данные
									</div>
									<div class="order_info_row">
										<input id="email_customer_order" class="order_input" type="text" placeholder="Ваше имя" name="" required>
									</div>
									<div class="order_info_row">
										<input id="phone_customer_order" class="order_input phone_mask" type="tel" placeholder="Ваш телефон" name="" required>
									</div>
									<div class="order_info_row">
										<input id="email_customer_order" class="order_input" type="email" placeholder="Ваш email" name="" required>
									</div>
									<div class="order_info_row">
										<textarea id="comment_order" class="order_rich_text_box" type="text" placeholder="Ваш комментарий (не обязательно)" name=""></textarea>
									</div>
									<button class="btn_order" type="submit">
										Оформить заказ
									</button>
								</div>
							</div>
						</form>
					</div>
				
			</div>
		</section>
	</main>
	<? require_once('html_templates/footer.php'); ?>
	<? require_once('html_templates/scripts_imports.php'); ?>
</body>
</html>
