<?php
// Template Name: Plan Overview
/**
 * The template for displaying the plan overview page
 *
 * @package gvdesign
 */

wp_enqueue_script("jquery");
get_header();
wp_enqueue_style( 'plans', get_template_directory_uri() . '/css/overview-plans.css');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php 
					
			$exteriors = array(
				'posts_per_page' => 16,
				'post_type'      => 'attachment',
				'orderby'        => 'rand',
				'post_status'    => 'inherit', 
				'cat'            => array( 8 ),
			);     

			$the_query = new WP_Query( $exteriors );

			?>

				<?php if( $the_query->have_posts() ): ?>

					<div class="grid-image-header">

						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
						
						$image_id = get_the_ID();

						?>
						<div class="flush-image">
							<?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
						</div>

						<?php endwhile; ?>

					</div>

				<?php endif; ?>

				<?php wp_reset_query();	?>

			<div class="split-page-container" style="background-color: var(--accent-color-2-half-op);">

				<div id="plans-overview" class="split-page">
					<div class="plans-overview-content">
						<h1 style="margin: 0; outline: none; text-align: left; background-color: white; color: black; border-left: 45px solid var(--bright-color); font-size: 3.5rem;"><?php the_title(); ?></h1>
						<p style="color: black; border-left: 80px solid white; margin-bottom: 50px; font-size: 1.1rem;">
						It doesn't matter if this is your first home or your fifth - with any of Granville's floorplan collections, you know that you're investing in a piece of timeless design, quality and architecture.</p>
						<h2 style="margin: 0; outline: none; text-align: left; background-color: white; color: black; border-left: 15px solid var(--accent-color-2); box-shadow: none; padding-left:30px; line-height: 1.0;">Traditional: <span style="font-size: 1rem; font-family: var(--primary-font); font-weight: 300;">The heart of what it means to be a Granville homeowner. With beautiful designer options available inside and out, this could be your "forever home."</span></h2>
						<h2 style="margin: 0; outline: none; text-align: left; background-color: white; color: black; border-left: 15px solid var(--accent-color-2); box-shadow: none; padding-left:30px; line-height: 1.0;">Canvas: <span style="font-size: 1rem; font-family: var(--primary-font); font-weight: 300;">All of Granville's expertise and signature elements in a more affordable and efficient home - still with plenty of designer options.</span></h2>
						<h2 style="margin: 0; outline: none; text-align: left; background-color: white; color: black; border-left: 15px solid var(--accent-color-2); box-shadow: none; padding-left:30px; line-height: 1.0;">Estates: <span style="font-size: 1rem; font-family: var(--primary-font); font-weight: 300;">Luxurious homes with endless opportunity for custom features and amenities that could make it hard to ever leave.</span></h2>
					</div>
				</div><!-- #plans-overview -->

				<div class="split-page scroll-container" style="background-color: var(--accent-color-3-half-op);">

					<?php echo do_shortcode( '[planFilterSearch]' ); ?>

				</div>

			</div>
			<div style="margin: auto auto -50px; padding: 250px 30px 300px; text-align: center; background-image: linear-gradient(to bottom right, var(--bright-color), var(--accent-color-2)); box-shadow: inset 0 0 15px rgba(0,0,0,.5); position: relative; position: relative; border-bottom: 1px solid black;">
				<h2 style="display: inline-block; color: white;"><span class="deco-underline">Dive deeper with the GV Design Blog</span></h2>
				<p style="color: white; margin: 0 auto; padding: 10px 30px 40px;">Our newest photos, trends, and advice - curated especially for Granville enthusiasts.</p>
				<a href="/blog/" class="gv-button-one gv-light-button">Visit the Blog</a>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div style="margin: auto; max-width: var(--narrow-max-width); position: relative;">
        <img src="/wp-content/uploads/2020/03/indoor_palm_200w.jpg" style="display: block; margin: 150px auto 0px;" alt="" />
    </div>

	<?php echo do_shortcode( '[imageFeed type="random"]' ); ?>

<?php
get_footer();