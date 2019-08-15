<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>О компании</title>
	<? require_once('html_templates/links.php'); ?>
	<? require_once('html_templates/links_favicons.php'); ?>
</head>
<body class="about_background">
	<? require_once('html_templates/preloader.php'); ?>
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
							<a href="/contacts">
								Контакты
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="s-about" id="s-about">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-8">
					<div class="about">
						<p class="about__txt">
							&#171;Gadgets45&#187; - российский магазин цифровой электротехники.
						</p>
						<p class="about__txt">
							Магазин &#171;Gadgets45&#187; охватывает территорию Курганской области и доставляет товар в любую ее точку.
						</p>
						<p class="about__txt">
							Бренд придерживается следующей философии: 
						</p>
						<ul class="about__list">
							<li>
								Потребителю предоставляется самая актуальная информация; 
							</li>
							<li>
								Потребитель не должен переплачивать; 
							</li>
							<li>
								Потребителю должно быть выгодно и удобно пользоваться нашим магазином.
							</li>
						</ul>
						<p class="about__txt">
							Эти и еще многие другие принципы выполняются нами при помощи удобного, понятного интернет-магазина, оперативной службы поддержки и очень быстрой службы доставки!
						</p>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="about">
						<div class="contacts">
							<h2 class="s-title about__title">
								Контакты
							</h2>
							<div class="contacts__body">
								<p class="contacts__info">
									Телефон:
									<a href="tel:+79164486284">
										+7 916 448 62 84
									</a>
								</p>
								<p class="contacts__info">
									E-mail:
									<a href="mailto:sitename@gmail.com">
										sitename@gmail.com
									</a>
								</p>
								<p class="contacts__info">
									Адрес:
									<span>
										город, улица, дом
									</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2263.230662175317!2d65.33853621603109!3d55.441209880471185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43b7bc4ec6b4f537%3A0x9e83c3f9f7e6a068!2z0L_Quy4g0JvQtdC90LjQvdCwLCAxLCDQmtGD0YDQs9Cw0L0sINCa0YPRgNCz0LDQvdGB0LrQsNGPLCDQoNC-0YHRgdC40Y8sIDY0MDAwMA!5e0!3m2!1sru!2sby!4v1565875895956!5m2!1sru!2sby" style="border:0" allowfullscreen></iframe>
	</div>
	<? require_once('html_templates/footer.php'); ?>
	<? require_once('html_templates/scripts_imports.php'); ?>

</body>
</html>
