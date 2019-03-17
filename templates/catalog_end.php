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
										<div class="dropdown-item dropdown-menu__row">По возрастанию</div>
										<div class="dropdown-item dropdown-menu__row">По убыванию</div>
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
												if ($product['discount_price'])
													echo '<strike>'. $product['price']. '</strike>';
												else
													echo $product['price'];
												?>
											</div>
											<div class="discount_price">
												<?=$product['discount_price'];?>
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