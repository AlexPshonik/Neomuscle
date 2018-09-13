<?php get_header();?>

	<div class="contacts">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<header class="entry-header">
						<h1 class="entry-title">Контакты</h1>
					</header>
				</div>
				<div class="col-12 col-md-6 col-xl-7">
					<h2>Оставте нам сообщение</h2>
					<?php echo do_shortcode('[contact-form-7 id="538" title="Contact form"]'); ?>
				</div>
				<div class="col-12 col-md-6 col-xl-5">
					<h2>Наш магазин</h2>
					<div class="phones">
						<h5 class="subtitle">Телефоны</h5>
						<ul class="phones-list">
							<li class="phones-list-item">Kyivstar <span><a href="tel:+38 (068) 208-17-17">+38 (068) 208-17-17</a></span></li>
							<li class="phones-list-item">Lifecell <span><a href="tel:+38 (073) 208-17-17">+38 (073) 208-17-17</a></span></li>
							<li class="phones-list-item">Vodafone <span><a href="tel:+38 (095) 238-17-17">+38 (095) 238-17-17</a></span></li>
						</ul>
					</div>
					<div class="email">
						<h5 class="subtitle">Электронная почта</h5>
						<p class="email-item">info@neomuscle.com.ua</p>
					</div>
					<div class="work-time">
						<h5 class="subtitle">Время работы</h5>
						<ul class="work-time-list">
							<li class="work-time-list-item">В будние дни: <span>11:00 до 18:00</span></li>
							<li class="work-time-list-item">Суббота, воскресенье: <span>11:00 до 17:00</span></li>
							<li class="work-time-list-item">Оформление заказов на сайте: <span>круглосуточно</span></li>
							<li class="work-time-list-item">Работаем без выходных</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();?>