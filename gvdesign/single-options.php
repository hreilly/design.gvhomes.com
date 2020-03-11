<?php
/**
 * The template for displaying all option pages
 *
 * @package gvdesign
 */

wp_enqueue_script("jquery");
featherlight_scripts();
get_header();

$taxo = $post->post_name;

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<article style="max-width: var(--narrow-max-width); margin: auto;" <?php post_class(); ?>>

				<h1 class="entry-title"><?php the_title(); ?></h1>

				<?php echo do_shortcode('[optionFilterSearch]'); ?>

				<p class="deco-underline" style="text-align: center; padding: 15px 20px 50px; margin: auto; font-style: italic;"><?php the_field('upgrade_disclaimer', 'option'); ?></p>

			</article>

			<p class="disclaimer" style="max-width: var(--narrow-max-width); margin: auto;"><?php the_field('options_disclaimer', 'option'); ?></p>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();