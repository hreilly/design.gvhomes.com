<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package gvdesign
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found" style="padding: 20px;">
				<header class="page-header">
					<h1 class="entry-title">Hmm, this door won't open...</h1>
				</header><!-- .page-header -->

				<div class="page-content" style="margin: auto; max-width: var(--wide-max-width); text-align: center;">
					<img src="/wp-content/uploads/2020/01/closed_doors_1280w-01.jpg" style="max-width: 100%; display: block;" alt="" />
					<p style="font-family: var(--script-font); font-size: 1.5rem; display: block;">We're sorry, it looks like this page doesn't exist or it has been moved.</p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php echo do_shortcode( '[imageFeed type="random"]' ); ?>

<?php
get_footer();
