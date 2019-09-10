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
	<? require_once('html_templates/links_favicons.php'); ?>
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
							<a href="/catalog">
								Каталог
							</a>
						</li>
						<li class="crumbs__item active">
							<?='<span>'. CATEGORY_ENG_TO_RUS[$_GET['category_name']].'</span>';?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="s-catalog" id="s-catalog">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 col-xl-3">
					<h2 class="s-title">
						Каталог
					</h2>
				</div>
				<div class="col-sm-6 order-0 order-sm-1 order-lg-0  col-lg-8 col-xl-9">
					<div class="catalog__head d-flex">
						<h3 class="catalog__title">
							<?=CATEGORY_ENG_TO_RUS[$_GET['category_name']];?>
						</h3>
						<div class="catalog__filter">
							<span class="catalog__txt">
								Сортировать <br class="d-sm-none"> цену по:
							</span>
							<select name="price" class="catalog__select dropdown-toggle">
								<option value="up" class="dropdown-item price_sort_order_by dropdown-menu__row expanded" id="order_by_asc" >
									возрастанию
								</option>
								<option value="down" class="dropdown-item price_sort_order_by dropdown-menu__row" id="order_by_desc">
									убыванию
								</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4 col-xl-3">
					<div class="filter-toggle">
						Фильтры
						<i class="fas fa-chevron-down"></i>	
					</div>
					<div class="filter">
						<div class="filter__part">
							<h4 class="filter__head">
								Цена
								<i class="fas fa-chevron-down"></i>	
							</h4>
							<div class="filter__body">
								<div class="price_range__inputs">
									<input class="price_from" id="price_from" type="text" pattern="^[0-9]+$" placeholder="6990" name="">
									<input class="price_to" id="price_to" type="text" pattern="^[0-9]+$" placeholder="199 000" name="">
								</div>
								<div class="prices-range__checkbox">
									<div class="variants_row">
										<input type="radio" id="filter-all" class="price_range" name="price_variant">
										<label for="filter-all" class="variants_value">
											Все цены
										</label>
									</div>
									<div class="variants_row">
										<input type="radio" data-min="10000" data-max="20000" class="price_range" name="price_variant" id="filter-12">
										<label for="filter-12" class="variants_value">
											10 000 - 20 000 р.
										</label>
									</div>
									<div class="variants_row">
										<input type="radio" data-min="20000" data-max="30000" class="price_range" name="price_variant" id="filter-23">
										<label for="filter-23" class="variants_value">
											20 000 - 30 000 р.
										</label>
									</div>
									<div class="variants_row">
										<input type="radio" data-min="30000" data-max="40000" class="price_range" name="price_variant" id="filter-34">
										<label for="filter-34" class="variants_value">
											30 000 - 40 000 р.
										</label>
									</div>
									<div class="variants_row">
										<input type="radio" data-min="40000" data-max="50000" class="price_range" name="price_variant" id="filter-45">
										<label for="filter-45" class="variants_value">
											40 000 - 50 000 р.
										</label>
									</div>
									<div class="variants_row">
										<input type="radio" data-min="50000" data-max="60000" class="price_range" name="price_variant" id="filter-56">
										<label for="filter-56" class="variants_value">
											50 000 - 60 000 р.
										</label>
									</div>
									<div class="variants_row">
										<input type="radio" data-min="60000" data-max="70000" class="price_range" name="price_variant" id="filter-67">
										<label for="filter-67" class="variants_value">
											60 000 - 70 000 р.
										</label>
									</div>
									<div class="variants_row">
										<input type="radio" data-min="70000" data-max="80000" class="price_range" name="price_variant" id="filter-78">
										<label for="filter-78" class="variants_value">
											70 000 - 80 000 р.
										</label>
									</div>
									<div class="variants_row">
										<input type="radio" data-min="80000" data-max="90000" class="price_range" name="price_variant"  id="filter-89">
										<label for="filter-89" class="variants_value">
											80 000 - 90 000 р.
										</label>
									</div>
								</div>
							</div>
						</div>

						<?
						// вывод всех фильтров
						foreach ($rusSpecifications as $key => $value) {
							echo '
								<div class="filter__part">
									<h4 class="filter__head">
										'.$rusSpecifications[$key].'
										<i class="fas fa-chevron-down"></i>
									</h4>
									<div class="filter__body">
										<div class="prices-range__checkbox">
								';
							foreach($specifications as $spec){
								if($spec['specification_id'] != $specificationIDS[$key]) 
									continue;
								echo '
											<div class="variants_row">
												<input type="checkbox" id="'.$rusSpecifications[$key].''.$spec['value'].'" class="price_range filterCheckBox" name="'.$specificationIDS[$key].'" value="'.$spec['value'].'">
												<label for="'.$rusSpecifications[$key].''.$spec['value'].'" class="variants_value">
													'.$spec['value'].'
												</label>
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
					</div>		
					<div class="accept-filters">
						<button class="accept-filters__btn">
							Применить
						</button>
					</div>
				</div>
				<div class="col-12 order-0 order-sm-1 order-lg-0 col-lg-8 col-xl-9">
					<div class="catalog">
						<div class="catalog preloader">
							<div class="preloader-img">
								<img class="gear" src="../images/loader.svg" alt="Загрузка">
								Gadgets45
							</div>
						</div>
						<div class="catalog_items_block">
							<div class="products catalog_items d-flex">
								<?php foreach($productItems as $product): ?>
								<div class="product catalog_item">
									<?='<h4 class="product__title item_name" ptc_id="'. $product['ptc_id']. '">';?>
										<?
											$productFullName = getProductNameWithColor($product['product_name'], $product['color_name']);
											echo '<a href="'. concatCategoryAndFullName($_GET['category_name'], $product['url_name'], $product['color_name']) .'">'; 
										?>
										<?=$productFullName;?>
										</a>
									</h4>	
									<div class="item_image product__pic">
										<? echo '<a href="'. concatCategoryAndFullName($_GET['category_name'], $product['url_name'], $product['color_name']) .'">';?> 
											<img class="item_img" src=<?='../'. PRODUCT_IMAGES_PATH.$product['image_name']; ?>>
										</a>
									</div>
									<p class="product__total item_count">
										Кол-во на складе:
										<span><?=$product['quantity'];?></span>
									</p>

									<div class="product__price item_price d-flex">
										<?
										if ($product['discount_price'] != $product['price']){
										echo '<span class="product__price_old dashed standart_price">'. $product['price']. '</span>';
										echo '<span class="product__price_new discount_price">'.$product['discount_price'].'</span>';
										}
										else
										echo '<span class="product__price_old standart_price">'. $product['price']. '</span>';

										?>
									</div>
									<div class="product-wrap item_button d-flex">
										<button class="product__btn">
											В корзину
											<span>
												Товар добавлен
											</span>
											<i class="fas fa-shopping-cart"></i>
										</button>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
							<div class="pages_list d-flex">
								<?showPageNumbers($countPages, $currentPage);?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<? require_once('html_templates/footer.php'); ?>
	<? require_once('html_templates/modal_call_back.php'); ?>
	<? require_once('html_templates/scripts_imports.php'); ?>
</body>
</html>

<?
require_once 'templates/close_connection.php';
?>
