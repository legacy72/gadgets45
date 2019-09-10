<footer class="footer" id="footer">
	<div class="container">
		<div class="row">
			<div class="col-6 col-md-2">
				<a href="#header" class="footer-logo">
					<img src="/images/logo/black_logo.png" alt="Gadgets45">
				</a>
			</div>
			<div class="col-12 order-1 order-md-0 col-md-7 col-lg-8">
				<ul class="footer-mnu d-flex">
					<li class="footer-mnu__item">
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
					<li class="footer-mnu__item">
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
					<li class="footer-mnu__item">
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
			<div class="col-6 col-md-3 col-lg-2">
				<div class="phone footer-phone">
					<a href="tel:+79164486284" class="phone__number">
						<i class="fas fa-phone-alt"></i>
						+7 916 448 62 84
					</a>
					<a href="#callMe" class="footer-call-me call-me">
						Заказать звонок
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>

<div class="respond-overlay">
	<div class="respond-to-call">
	</div>
</div>
<div id="loader">
    <img src="/images/ripple.svg" alt="">
</div>


<!-- Modal Call Back -->
<? require_once('html_templates/modal_call_back.php'); ?>
<?
require_once 'templates/close_connection.php';
?>