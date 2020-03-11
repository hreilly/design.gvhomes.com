<?php
// Template Name: FAQ
/**
 * The template for displaying the FAQ Page
 *
 * @package gvdesign
 */

get_header();
?>

<style>
	.faq {
		max-width: var(--narrow-max-width);
		margin: 40px auto 100px auto;
	}
	.faq-card {
		border: var(--thin-border);
		padding: 40px;
		box-shadow: var(--element-shadow);
		background-color: #ffffff;
		margin: 10px;
		position: relative;
	}
	.faq-card::before {
		content: 'Q';
		opacity: .5;
		top: -15px;
		left: 20px;
		font-size: 100px;
		position: absolute;
		font-weight: bold;
		color: var(--bright-color);
		z-index: 10;
	}
	.faq-card::after {
		content: 'A';
		opacity: .5;
		bottom: -5px;
		right: 25px;
		font-size: 100px;
		position: absolute;
		font-weight: bold;
		color: var(--accent-color-2);
		font-family: var(--accent-font);
		z-index: 10;
	}
	.faq-card h2 {
		margin: 0 0 20px 0;
		position: relative;
		z-index: 1000;
	}
</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php 
					
			$exteriors = array(
				'posts_per_page' => 16,
				'post_type'      => 'attachment',
				'orderby'        => 'rand',
				'post_status'    => 'inherit', 
				'meta_query'      => array(
					array (
						'key'      => 'office_only',
						'value'    => 1,
						'compare'  => '!=',
					),
				)
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

			<h1 class="entry-title"><?php the_title(); ?></h1>
			<p style="max-width: var(--narrow-max-width); margin: auto; padding: 20px 40px; text-align: center;">Our newest photos, trends, and advice - curated especially for Granville enthusiasts.</p>

        <?php if( have_rows('questions_answers') ): ?>

			<div class="faq">

			<?php while( have_rows('questions_answers') ): the_row(); 

				// vars
				$question = get_sub_field('question');
				$answer = get_sub_field('answer');
				$link = get_sub_field('qa_link');
				$label = get_sub_field('link_text');

				?>

				<div class="faq-card">

					<h2>
						<?php echo $question; ?>
					</h2>

					<?php echo $answer; ?>
					
					<?php if ( $link ) : ?>
						<a href="<?php echo $link; ?>" class="gv-button-one">
							<?php echo $label; ?>
						</a>
					<?php endif; ?>

				</div>

			<?php endwhile; ?>

			</div>

		<?php endif; ?>

		<div style="margin: auto; max-width: var(--narrow-max-width); position: relative;">
			<img src="/wp-content/uploads/2020/01/snake_plant_200x300.jpg" style="display: block; margin: 50px auto -90px;" alt="" />
		</div>
		
		<div id="disclosures-overview" class="split-page-container" style="border: none; margin-bottom: 100px; box-shadow: 0 0 10px rgba(0,0,0,.5); position: relative;">

			<div class="split-page" style="background-color: var(--accent-color-2); z-index: 100;">
				<h2 style=" margin: 0 0px 50px -60px; padding-left: 60px;">Understand our design disclosures.</h2>
				<p>We want your design experience to go as smoothly as possible - which is why we've created this video to cover the main points of the design disclosures included in your contract. From selecting options to defining the terms of your warranty, we want to make sure we've covered all the bases before you make final descisions.</p>
				<p>Plus, watching this video fulfills the requirement to read through all of the disclosures in your options contract before you sign it! It's just one more way we're working to shape the design process around your needs.</p>
			</div><!-- .split-page left -->
			<div class="split-page" style="background: 
												url('<?php echo get_template_directory_uri(); ?>/svg/abstract_bg_3.svg')
												bottom center / cover
												no-repeat; 
												padding: 0px; z-index: 1;">
				<?php echo do_shortcode( '[lazyVideo dataid="353452223" type="vimeo"]' ); ?>
				<div class="split-page-caption">
					<p><strong>WATCH:</strong> See what the design process means for your home.</p>
				</div>
			</div><!-- .split-page right -->

		</div><!-- #disclosures-overview -->

		<div style="margin: auto auto -50px; padding: 250px 30px 300px; text-align: center; background-image: linear-gradient(to bottom right, var(--bright-color), var(--accent-color-2)); box-shadow: inset 0 0 15px rgba(0,0,0,.5); position: relative; position: relative; outline: 1px solid black;">
			<h2 style="display: inline-block; color: white;"><span class="deco-underline">Dive deeper with the GV Design Blog</span></h2>
			<p style="color: white; margin: 0 auto; padding: 10px 30px 40px;">Our newest photos, trends, and advice - curated especially for Granville enthusiasts.</p>
			<a href="/blog/" class="gv-button-one gv-light-button">Visit the Blog</a>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div style="margin: auto; max-width: var(--narrow-max-width); position: relative;">
        <img src="/wp-content/uploads/2020/03/snake_plant_tall_200w.jpg" style="display: block; margin: 150px auto 0px;" alt="" />
    </div>

    <?php echo do_shortcode( '[imageFeed type="random"]' ); ?>

<?php
get_footer();