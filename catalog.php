<?

require_once 'db/queries.php';
require_once 'templates/config.php';
require_once 'templates/functions.php';

// получаем id категории по названию из $_GET
$categoryID = getCategoryID($dbh, $_GET['category_name']);
// Получаем все характеристики самртфонов для заполнения фильтра фронта
$specifications = getSpecifications($dbh, $categoryID);

// Перевод характеристик с английского на русский
list($rusSpecifications, $specificationIDS) = getRusAndIDSSpecifications($categoryID);


// Получаем фильтры, по которым нужно сортирвать (по активным чекбоксам)
// для стартовой (этой) страницы фиьлтры пустые
$filterSpecs = getSpecificationsForFilter($dbh);
// количество продуктов всего (чтобы посчитать сколько страниц)
$countProducts = getCountProducts($dbh, $filterSpecs, $categoryID);
// Получаем смартфоны, удовлетворяющие фильтрам
$productItems = getProductItems($dbh, $filterSpecs, $categoryID);
// Количество страниц для вывода всех продуктов
$countPages = getCountPages($countProducts);
// Текущая страница
$currentPage = 1;
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Каталог</title>
	<? require_once('html_templates/links.php'); ?>
</head>
<body>
	<? require_once('html_templates/header.php'); ?>
			<div class="default_container new_container">
				<div class="navigation_menu">
					<a href="/">Главная</a>
					<img src="../../images/strelka.png">
					<a href="/catalog/smartphones">Каталог</a>
					<img src="../../images/strelka.png">
					<?='<a href="/catalog/'. $_GET['category_name'].'">'. CATEGORY_ENG_TO_RUS[$_GET['category_name']].'</a>';?>
				</div>
			</div>
		</section>
		<section>
			<div class="default_container new_container">
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
											<input class="price_from" id="price_from" type="text" pattern="^[0-9]+$" placeholder="6990" name="">
											<input class="price_to" id="price_to" type="text" pattern="^[0-9]+$" placeholder="199 000" name="">
										</div>
									</div>
									<div class="prices-range__checkbox">
										<div class="variants_row">
											<input type="radio" class="price_range" name="price_variant">
											<span class="variants_value">Все цены</span>
										</div>
										<div class="variants_row">
											<input type="radio" data-min="10000" data-max="20000" class="price_range" name="price_variant">
											<span class="variants_value">10 000 - 20 000 р.</span>
										</div>
										<div class="variants_row">
											<input type="radio" data-min="20000" data-max="30000" class="price_range" name="price_variant">
											<span class="variants_value">20 000 - 30 000 р.</span>
										</div>
										<div class="variants_row">
											<input type="radio" data-min="30000" data-max="40000" class="price_range" name="price_variant">
											<span class="variants_value">30 000 - 40 000 р.</span>
										</div>
										<div class="variants_row">
											<input type="radio" data-min="40000" data-max="50000" class="price_range" name="price_variant">
											<span class="variants_value">40 000 - 50 000 р.</span>
										</div>
										<div class="variants_row">
											<input type="radio" data-min="50000" data-max="60000" class="price_range" name="price_variant">
											<span class="variants_value">50 000 - 60 000 р.</span>
										</div>
										<div class="variants_row">
											<input type="radio" data-min="60000" data-max="70000" class="price_range" name="price_variant">
											<span class="variants_value">60 000 - 70 000 р.</span>
										</div>
										<div class="variants_row">
											<input type="radio" data-min="70000" data-max="80000" class="price_range" name="price_variant">
											<span class="variants_value">70 000 - 80 000 р.</span>
										</div><div class="variants_row">
											<input type="radio" data-min="80000" data-max="90000" class="price_range" name="price_variant">
											<span class="variants_value">80 000 - 90 000 р.</span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<?
						// вывод всех фильтров
						foreach ($rusSpecifications as $key => $value) {
							echo '
								<div class="card">
									<div class="card-header" id="heading'.$key.'">
										<h2 class="mb-0">
											<div class="header-menu-link collapsed" data-toggle="collapse" data-target="#collapse'.$key.'" aria-expanded="false" aria-controls="collapse'.$key.'">
												'.$rusSpecifications[$key].'
											</div>
										</h2>
									</div>
									<div id="collapse'.$key.'" class="collapse" aria-labelledby="heading'.$key.'" data-parent="#accordionExample">
										<div class="card-body">
							';
							foreach($specifications as $spec){
								if($spec['specification_id'] != $specificationIDS[$key]) 
									continue;
								echo '
									<div class="variants_row">
										<input class="filterCheckBox" type="checkbox" name="'.$specificationIDS[$key].'" value="'.$spec['value'].'">
										<span class="variants_value">'.$spec['value'].'</span>
									</div>
								';
							}
							echo '
										</div>
									</div>
								</div>
							';
						} 
						?>


						<div class="accept_filters">
							<button class="btn_accept_filters">Применить</button>
						</div>

					</div>
					<div class="catalog_block">
						<div class="catalog_header">
							<div class="catalog_title">
								<?=CATEGORY_ENG_TO_RUS[$_GET['category_name']];?>
							</div>
							<div class="catalog_sort_block">
								<div class="sort_text">
									Соритровать по:
								</div>
								<div class="dropdown price-button">
									<button class="btn dropdown-toggle expanded" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Цене
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<div value="up" id="order_by_asc" class="dropdown-item price_sort_order_by dropdown-menu__row">По возрастанию</div>
										<div value="down" id="order_by_desc" class="dropdown-item price_sort_order_by dropdown-menu__row">По убыванию</div>
									</div>
								</div>
							</div>
						</div>
						<div class="catalog_items_block">
							<div class="catalog_items">
								<?php foreach($productItems as $product): ?>
									<div class="catalog_item">
										<?='<div class="item_name" ptc_id="'. $product['ptc_id']. '">';?>
											<?
												$productFullName = getProductNameWithColor($product['product_name'], $product['color_name']);
												echo '<a href="'. concatCategoryAndFullName($_GET['category_name'], $product['url_name'], $product['color_name']) .'">'; 
											?>
											<?=$productFullName;?>
											</a>
										</div>
										<div class="item_image">
											<? echo '<a href="'. concatCategoryAndFullName($_GET['category_name'], $product['url_name'], $product['color_name']) .'">';?> 
												<img class="item_img" src=<?='../'. PRODUCT_IMAGES_PATH.$product['image_name']; ?>>
											</a>
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
						<div class="pages_list">
							<?showPageNumbers($countPages, $currentPage);?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<? require_once('html_templates/footer.php'); ?>
	<? require_once('html_templates/scripts_imports.php'); ?>
</body>
</html>

<?
require_once 'templates/close_connection.php';
?>
