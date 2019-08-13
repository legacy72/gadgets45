<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Корзина</title>
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
							<a href="/cart">
								Корзина
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="s-cart" id="s-cart">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="s-title">
						Корзина
					</h2>
				</div>
				<div class="col-12 order-1 order-lg-0 col-lg-8">
					<div class="cart_items">
						
					</div>
				</div>
				<div class="col-12 col-lg-4">
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
		</div>		
	</section>

	<? require_once('templates/stock_items.php'); ?>
	<? require_once('html_templates/benefits.php'); ?>
	<? require_once('html_templates/footer.php'); ?>
	<? require_once('html_templates/modal_call_back.php'); ?>
	<? require_once('html_templates/scripts_imports.php'); ?>
	
</body>
</html>
