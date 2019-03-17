<?
require_once '../db/queries.php';
require_once 'config.php';

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
								<li><a href=""></a>Оплата и доставка</li>
								<li><a href=""></a>Гаратнии</li>
								<li><a href=""></a>Возврат</li>
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
									<div class="header-menu-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
							<div class="card-header" id="headingFor">
								<h2 class="mb-0">
									<div class="header-menu-link collapsed" data-toggle="collapse" data-target="#collapseFor" aria-expanded="false" aria-controls="collapseFor">
										Оперативная память
									</div>
								</h2>
							</div>
							<div id="collapseFor" class="collapse" aria-labelledby="headingFor" data-parent="#accordionExample">
								<div class="card-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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