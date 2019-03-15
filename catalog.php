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
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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

										<div class="price_range__label">
											<label class="label-price-form" for="price_from">От</label>
											<label class="label-price-to" for="price_to">До</label>
										</div>
										<div class="price_range__inputs">
											<input class="price_from" id="price_from" type="text" placeholder="6990" name="">
											<input class="price_to" id="price_to" type="text" placeholder="199 000" name="">
										</div>

									</div>
									<div class="prices-range__checkbox">
										<div class="price_variants_row">
											<input type="checkbox" name="">
											<span class="price-variants-row__range">20 000 - 30 000 р.</span>
										</div>
										<div class="price_variants_row">
											<input type="checkbox" name="">
											<span class="price-variants-row__range">30 000 - 40 000 р.</span>
										</div>
										<div class="price_variants_row">
											<input type="checkbox" name="">
											<span class="price-variants-row__range">40 000 - 50 000 р.</span>
										</div>
										<div class="price_variants_row">
											<input type="checkbox" name="">
											<span class="price-variants-row__range">50 000 - 60 000 р.</span>
										</div>
										<div class="price_variants_row">
											<input type="checkbox" name="">
											<span class="price-variants-row__range">60 000 - 70 000 р.</span>
										</div>
										<div class="price_variants_row">
											<input type="checkbox" name="">
											<span class="price-variants-row__range">70 000 - 80 000 р.</span>
										</div><div class="price_variants_row">
											<input type="checkbox" name="">
											<span class="price-variants-row__range">80 000 - 90 000 р.</span>
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
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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

					</div>
					<!-- <div class="catalog_menu">
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
					</div> -->
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
						<div class="catalog_items">
							<?php foreach($images as $image): ?>
								<div class="catalog_item">
									<div class="item_name">
										Xiaomi Note 4 Super Puper Pro
									</div>
									<div class="item_image">
										<img src=<?=PRODUCT_IMAGES_PATH.$image['name']; ?>>
									</div>
									<div class="item_price">
										14 990 р.
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

</body>
</html>
