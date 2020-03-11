<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gvdesign
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );
				

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		<ul>
		<?php 
		$args = array(
			'taxonomy'               => 'category',
			'orderby'                => 'count',
			'order'                  => 'ASC',
			'hide_empty'             => false,
		);
		$the_query = new WP_Term_Query($args);
		foreach($the_query->get_terms() as $term){ 
		?>
			<li><?php echo $term->name." (".$term->count.")"; ?></li>
		<?php
		}
		?>
		</ul>

			<div class="gv-card-container" style="display: flex; flex-direction: row; justify-content: space-between;">
				<a href="<?php the_field('card_link_1', get_option('Home Page')); ?>" class="gv-card-item">
					<div class="gv-card-item-image"></div>
					<div class="gv-card-item-stack">
						<h2><?php the_field('card_title_1', get_option('Home Page')); ?></h2>
						<p><?php the_field('card_text_1', get_option('Home Page')); ?></p>
						<div class="gv-button-one">Photos</div>
					</div>
				</a>
				<a href="<?php the_field('card_link_2', get_option('Home Page')); ?>" class="gv-card-item">
					<div class="gv-card-item-image"></div>
					<div class="gv-card-item-stack">
						<h2><?php the_field('card_title_2', get_option('Home Page')); ?></h2>
						<p><?php the_field('card_text_2', get_option('Home Page')); ?></p>
						<div class="gv-button-one">Photos</div>
					</div>
				</a>
				<a href="<?php the_field('card_link_3', get_option('Home Page')); ?>" class="gv-card-item">
					<div class="gv-card-item-image"></div>
					<div class="gv-card-item-stack">
						<h2><?php the_field('card_title_3', get_option('Home Page')); ?></h2>
						<p><?php the_field('card_text_3', get_option('Home Page')); ?></p>
						<div class="gv-button-one">Photos</div>
					</div>
				</a>
				<a href="<?php the_field('card_link_4', get_option('Home Page')); ?>" class="gv-card-item">
					<div class="gv-card-item-image"></div>
					<div class="gv-card-item-stack">
						<h2><?php the_field('card_title_4', get_option('Home Page')); ?></h2>
						<p><?php the_field('card_text_4', get_option('Home Page')); ?></p>
						<div class="gv-button-one">Photos</div>
					</div>
				</a>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
