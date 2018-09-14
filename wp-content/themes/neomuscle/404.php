<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package neomuscle
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<section class="error-404 not-found">
							<div class="error-404-content">
								<h1>Мы сожалеем!</h1>
								<h2>Похоже у этой страницы выходной :(</h2>
								<p>Попробуйте панель поиска или зайдите на нашу домашнюю страницу.</p>
								<a href="<?php echo get_home_url(); ?>" class="button">Вернуться в Neomuscle</a>
							</div>
							<div class="error-404-image">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/404-image.jpg"/>
							</div>
						</section>
					</div>
				</div>
			</div>
		</main>
	</div>

<?php
get_footer();
