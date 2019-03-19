<?

require_once '../db/queries.php';
require_once '../templates/config.php';
$productItems = getSmartphones($dbh, 1);
$specifications = getSmartphonesSpecifications($dbh);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Каталог</title>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
	<link rel="stylesheet" type="text/css" href="../slick-master/slick/slick-theme.css"/>
	<link rel="stylesheet" type="text/css" href="../slick-master/slick/slick.css"/>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<header>
		<section>
			<div class="container header_container">
				<div class="logo">
					<img src="../logo/white_logo.png">
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
						<img src="../images/phone.png">
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
					<div class="dropdown menu-button">
						<button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Каталог товаров
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" id="1" href="/catalog/smartphones.php">Смартфоны</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" id="2" href="/catalog/notebooks.php">Ноутбуки</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" id="3" href="/catalog/accessories.php">Аксессуары</a>
						</div>
					</div>
				</div>
				<div class="main_content">
					<div class="main_top_head">
						<div class="main_top_menu">
							<ul>
								<li><a href="">Оплата и доставка</a></li>
								<li><a href="">Гаратнии</a></li>
								<li><a href="">Возврат</a></li>
							</ul>
						</div>
						<div class="loupe">
							<img src="../images/loupe.png">
						</div>
						<div class="shopping_cart_block">
							<div class="shopping_cart_text">
								<img src="../images/push_cart.png">
								6 540р. (2)
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container new_container">
				<div class="navigation_menu">
					<a href="#">Главная</a>
					<img src="../images/strelka.png">
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

					<div class="accordion catalog_menu" id="accordionExample">
						<div class="card">
							<div class="card-header" id="headingOne">
								<h2 class="mb-0">
									<div class="header-menu-link gray-colored expanded" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Цена
									</div>
								</h2>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<div class="price_range">
										<div class="price_range__inputs">
											<input class="price_from" id="price_from" type="text" placeholder="6990" value="<?=$_GET['price_from']; ?>" name="">
											<input class="price_to" id="price_to" type="text" placeholder="199 000" name="">
										</div>

									</div>
									<div class="prices-range__checkbox">
										<div class="variants_row">
											<input type="radio" name="price_variant">
											<span class="variants_value">Все цены</span>
										</div>
										<div class="variants_row">
											<input type="radio" name="price_variant">
											<span class="variants_value">20 000 - 30 000 р.</span>
										</div>
										<div class="variants_row">
											<input type="radio" name="price_variant">
											<span class="variants_value">30 000 - 40 000 р.</span>
										</div>
										<div class="variants_row">
											<input type="radio" name="price_variant">
											<span class="variants_value">40 000 - 50 000 р.</span>
										</div>
										<div class="variants_row">
											<input type="radio" name="price_variant">
											<span class="variants_value">50 000 - 60 000 р.</span>
										</div>
										<div class="variants_row">
											<input type="radio" name="price_variant">
											<span class="variants_value">60 000 - 70 000 р.</span>
										</div>
										<div class="variants_row">
											<input type="radio" name="price_variant">
											<span class="variants_value">70 000 - 80 000 р.</span>
										</div><div class="variants_row">
											<input type="radio" name="price_variant">
											<span class="variants_value">80 000 - 90 000 р.</span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header" id="headingTwo">
								<h2 class="mb-0">
									<div class="header-menu-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										Диагональ
									</div>
								</h2>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
								<div class="card-body">
									<div class="variants_row">
										<input type="checkbox" name="screen_diagonal_variant">
										<span class="variants_value">1720х1980</span>
									</div>
									<div class="variants_row">
										<input type="checkbox" name="screen_diagonal_variant">
										<span class="variants_value">1280х720</span>
									</div>
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header" id="headingThree">
								<h2 class="mb-0">
									<div class="header-menu-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										Бренд
									</div>
								</h2>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
								<div class="card-body">
									<div class="variants_row">
										<input type="checkbox" name="brand_variant">
										<span class="variants_value">Xiaomi</span>
									</div>
									<div class="variants_row">
										<input type="checkbox" name="brand_variant">
										<span class="variants_value">Huawei</span>
									</div>
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header" id="headingFour">
								<h2 class="mb-0">
									<div class="header-menu-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
										Оперативная память
									</div>
								</h2>
							</div>
							<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
								<div class="card-body">
									<div class="card-body">
									<?php foreach($specifications as $spec):?>
										<?php if($spec['specification_id'] != SPECIFICATIONS_DICT['ram_size']) continue;?>
										<div class="variants_row">
											<input type="checkbox" name="ram_variant">
											<span class="variants_value"><?=$spec['value']?></span>
										</div>
									<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-header" id="headingFive">
								<h2 class="mb-0">
									<div class="header-menu-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
										Версия операционной системы
									</div>
								</h2>
							</div>
							<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
								<div class="card-body">
									<div class="card-body">
									<?php foreach($specifications as $spec):?>
										<?php if($spec['specification_id'] != SPECIFICATIONS_DICT['operating_system_version']) continue;?>
										<div class="variants_row">
											<input type="checkbox" name="operating_system_version_variant">
											<span class="variants_value"><?=$spec['value']?></span>
										</div>
									<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>

						<div class="accept_filters">
							<button class="btn_accept_filters">Применить</button>
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
								<div class="dropdown price-button">
									<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Цене
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<div value="up" class="dropdown-item dropdown-menu__row">По возрастанию</div>
										<div value="down" class="dropdown-item dropdown-menu__row">По убыванию</div>
									</div>
								</div>
							</div>
						</div>
						<div class="catalog_items">
							<?php foreach($productItems as $product): ?>
								<div class="catalog_item">
									<div class="item_name">
										<?=$product['product_name'] .' '. $product[
											'color_name'];?>
									</div>
									<div class="item_image">
										<img src=<?='../'. PRODUCT_IMAGES_PATH.$product['image_name']; ?>>
									</div>
									<div class="item_count">
										Кол-во:
										<?=$product['quantity'];?>
									</div>
									<div class="item_price">
										<div class="standart_price">
											<?
											if ($product['discount_price'] != $product['price'])
												echo '<strike>'. $product['price']. '</strike>';
											else
												echo $product['price'];
											?>
										</div>
										<div class="discount_price">
											<?
											if ($product['discount_price'] != $product['price'])
												echo $product['discount_price'];
											?>
										</div>
									</div>
									<div class="item_button">
										<button>
											В корзину
										</button>
									</div>
								</div>
							<?php endforeach; ?>
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
					<img src="../logo/black_logo.png">
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
						<img src="../images/phone.png">
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
	<script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

	<!-- Phone Animation -->
	<script src="../scripts/script.js" type="text/javascript"></script>

	<!-- Ajax -->
	<script src="../scripts/ajax.js" type="text/javascript"></script>

</body>
</html>

<?
require_once '../templates//close_connection.php';
?>
