

<!-- Navigation -->
<nav class="main-nav">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-3 col-md-2 col-lg-3">
				<?php 
				if ($_SERVER[REQUEST_URI]=="/")  { 
				?>
					<img src="/images/logo/white_logo.png" alt="Gadgets45">
				<?php } else { ?>
					<a href="/" class="logo">
						<img src="/images/logo/white_logo.png" alt="Gadgets45">
					</a>
				<?php } ?>
			</div>
			<div class="col-sm-9 col-md-7 col-lg-5">
				<ul class="mnu d-flex">
					<li class="mnu__item">
						<?php 
						if ($_SERVER[REQUEST_URI]=="/about")  { 
						?>
							<span>	
								О компании
							</span>
						<?php } else { ?>
							<a href="/about">	
								О компании
							</a>
						<?php } ?>
					</li>
					<li class="mnu__item">
						<?php 
						if ($_SERVER[REQUEST_URI]=="/catalog/smartphones" || $_SERVER[REQUEST_URI]=="/catalog/notebooks" || $_SERVER[REQUEST_URI]=="/catalog/accessories")  { 
						?>
							<span>	
								Каталог
							</span>
						<?php } else { ?>
							<a href="/catalog/smartphones">	
								Каталог
							</a>
						<?php } ?>
					</li>
					<li class="mnu__item">
						<?php 
						if ($_SERVER[REQUEST_URI]=="/contacts")  { 
						?>
							<span>	
								Контакты
							</span>
						<?php } else { ?>
							<a href="/contacts">	
								Контакты
							</a>
						<?php } ?>
					</li>
				</ul>
			</div>
			<div class="d-none d-lg-block col-lg-2">
				<div class="work">
					<span class="work__txt">
						Без выходных
					</span>
					<span class="work__time">
						С 8:00 до 22:00
					</span>
				</div>
			</div>
			<div class="order-2 order-md-0 col-6 col-sm-4 col-md-3 col-lg-2">
				<div class="phone">
					<a href="tel:+79164486284" class="phone__number">
						<i class="fas fa-phone-alt"></i>
						+7 916 448 62 84
					</a>
					<a href="#callMe" class="call-me">
						Заказать звонок
					</a>
				</div>
			</div>
			<div class="order-4 order-lg-0 col-12 col-lg-3">
				<div class="dropdown-mnu">
					<div class="drop-head d-flex">
						<button class="drop-btn">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<h4 class="drop-title">
							Каталог товаров
						</h4>
					</div>
					<ul class="drop">
						<li class="drop__item">
							<a href="/catalog/smartphones">
								Смартфоны
							</a>
						</li>
						<li class="drop__item">
							<a href="/catalog/notebooks">
								Ноутбуки
							</a>
						</li>
						<li class="drop__item">
							<a href="/catalog/accessories">
								Аксессуары
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="order-1 order-md-0 col-12 col-sm-8 col-md-6 col-lg-5">
				<ul class="add-mnu d-flex">
					<li class="add-mnu__item">
						<?php 
						if ($_SERVER[REQUEST_URI]=="/shipping")  { 
						?>
							<span>	
								Оплата и доставка
							</span>
						<?php } else { ?>
							<a href="/shipping">	
								Оплата и доставка
							</a>
						<?php } ?>
					</li>
					<li class="add-mnu__item">
						<?php 
						if ($_SERVER[REQUEST_URI]=="/guarantee")  { 
						?>
							<span>	
								Гарантия
							</span>
						<?php } else { ?>
							<a href="/guarantee">	
								Гарантия
							</a>
						<?php } ?>
					</li>
					<li class="add-mnu__item">
						<?php 
						if ($_SERVER[REQUEST_URI]=="/return")  { 
						?>
							<span>	
								Возврат
							</span>
						<?php } else { ?>
							<a href="/return">	
								Возврат
							</a>
						<?php } ?>
					</li>
				</ul>
			</div>
			<div class="order-3 order-sm-2 order-md-0 col-12 col-sm-8 col-md-3 col-lg-2">
				<div class="search">
					<div class="search__data">
						<input type="text" placeholder="Введите товар..." class="search__input" id="search_input">
						<div class="search__icon"></div>
					</div>
				</div>
			</div>
			<div class="order-2 order-sm-2 order-md-0 col-6 col-sm-4 col-md-3 col-lg-2">
				<a href="/cart" class="shopping-cart d-flex">
					<div class="shopping-wrap">
						<i class="fas fa-shopping-cart"></i>
						<span class="quantity cart_quantity"></span>
					</div>
					<span class="price cart_price"></span>
				</a>
			</div>
		</div>
	</div>
</nav>
<div class="fixed-shop">
	<div class="fixed-visible">
		<i class="fas fa-shopping-cart"></i>
		<span class="quantity cart_quantity"></span>
	</div>
	<div class="fixed-hidden">
		<p class="fixed-price">
			Сумма:
			<span class="price cart_price"></span>
		</p>
		<a href="/cart" class="fixed-link">
			К оплате
		</a>
	</div>
</div>