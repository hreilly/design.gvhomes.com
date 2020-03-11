<?php
/**
 * The template for displaying the home page
 *
 * @package gvdesign
 */

get_header();
wp_enqueue_style( 'home', get_template_directory_uri() . '/css/home.css');
?>

<style>
	.color-block-1 {
		background-color: <?php the_field('color_block_1', get_option('Home Page')); ?>;
	}
	.color-block-2a {
		background-color: <?php the_field('color_block_2', get_option('Home Page')); ?>;
	}
	.color-block-2b {
		background-color: <?php the_field('color_block_2', get_option('Home Page')); ?>;
	}
	.detail-1 {
		background: center / cover no-repeat url('<?php the_field('accent_detail_1', get_option('Home Page')); ?>');
	}
	.main-image {
		background: center / cover no-repeat url('<?php the_field('main_elevation_image', get_option('Home Page')); ?>');
	}
	.detail-2 {
		background: center / cover no-repeat url('<?php the_field('accent_detail_2', get_option('Home Page')); ?>');	
	}
	.detail-3 {
		background: center / cover no-repeat url('<?php the_field('accent_detail_3', get_option('Home Page')); ?>');
	}
	.image-block-link-1::after {
		background: center / cover no-repeat url('<?php the_field('image_block_1', get_option('Home Page')); ?>'); 
	}
	.image-block-link-2::after {
		background: center / cover no-repeat url('<?php the_field('image_block_2', get_option('Home Page')); ?>');
	}
	.gv-card-item:first-of-type .gv-card-item-image {
		background: center / cover no-repeat url('<?php the_field('card_image_1', get_option('Home Page')); ?>');	
	}
	.gv-card-item:nth-of-type(2) .gv-card-item-image {
		background: center / cover no-repeat url('<?php the_field('card_image_2', get_option('Home Page')); ?>');	
	}
	.gv-card-item:nth-of-type(3) .gv-card-item-image {
		background: center / cover no-repeat url('<?php the_field('card_image_3', get_option('Home Page')); ?>');	
	}
	.gv-card-item:nth-of-type(4) .gv-card-item-image {
		background: center / cover no-repeat url('<?php the_field('card_image_4', get_option('Home Page')); ?>');	
	}

</style>

<section id="mosaic-header" style="margin: auto; max-width: var(--extra-wide-max-width);" aria-hidden="true">
    <div class="mosaic-container">
        <div class="color-block-1"></div>
        <div class="color-block-2a"></div>
        <div class="color-block-2b"></div>
        <div class="detail-1"></div>
        <div class="bottom-arrow"><img src="<?php echo get_template_directory_uri(); ?>/svg/arrow.svg" style="max-height: 90px; padding: 20px 0px 0px 20px;" alt=""></div>
        <div class="bottom-text"><?php the_field('detail_1_text', get_option('Home Page')); ?></div>
        <div class="main-image"></div>
        <div class="top-text"><?php the_field('detail_2_text', get_option('Home Page')); ?></div>
        <div class="top-arrow"><img src="<?php echo get_template_directory_uri(); ?>/svg/arrow.svg" style="max-height: 60px; padding: 0px 20px 0px 0px; transform: rotate(90deg);" alt=""></div>
        <div class="detail-2"></div>
        <div class="detail-3"></div>
    </div>
</section><!-- #mosaic-header -->
<section id="home-body" style="margin: auto; max-width: var(--extra-wide-max-width);">
	<h1 class="aligncenter" style="padding: 35px 20px 0px 20px;">Make your new Granville <span class="deco-underline">uniquely yours.</span></h1>
	<h4 class="aligncenter" style="padding: 0px 20px; font-weight: 300;">The Granville design team is here to turn your vision into reality.</h4>
	<div class="gv-card-container" style="margin-bottom: 30px;">
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
	</div><!-- .gv-card-container -->
	<div class="image-swatch-container">
		<a href="/appointments/" class="image-block-link-1">
			<h1 style="margin: auto; max-width: 18ch;"><span style="background-color: var(--dark-color); color: var(--light-color);">What to expect from your design appointment.</h1>
		</a>
		<div class="swatch-block">
			<a href="/blog" class="swatch-item">
				<h3 style="text-decoration: underline; text-decoration-color: var(--accent-color-2);">
					The GV Design Blog: 
				</h3>
			</a>
			
			<?php 

			$args = array(
				'posts_per_page' => 3,
				'post_type'      => 'blog',
				'order'          => 'DESC',
			);

			$the_query = new WP_Query( $args );

			?>

			<?php if( $the_query->have_posts() ): ?>

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<a href="<?php the_permalink(); ?>" class="swatch-item">
				<h4>
					<?php
					$thetitle = $post->post_title;
					$getlength = strlen($thetitle);
					$thelength = 32;
					echo substr($thetitle, 0, $thelength);
					if ($getlength > $thelength) echo "...";
					?>
				</h4>
				<p>
					<?php echo get_the_date(); ?> | <?php the_author(); ?>
				</p>
			</a>

			<?php endwhile; ?>

			<?php wp_reset_query();	?>
			
			<?php endif; ?>
		</div>
	</div><!-- .image-swatch-container -->
	<div class="image-swatch-container">
		<div class="swatch-block">
			<a href="/plans/" class="swatch-item">
				<h3 style="text-decoration: underline; text-decoration-color: var(--bright-color);">
					Featured Plans:
				</h3>
			</a>
			
			<?php 

				$featplans = get_field( 'featured_plans' );

			?>

			<?php if( $featplans ): ?>
				<?php foreach( $featplans as $fplan ): ?>
					<a href="<?php echo get_permalink( $fplan->ID ); ?>" class="swatch-item">
						<h4>
							<?php echo get_the_title( $fplan->ID ); ?>
						</h4>
						<p>
							<?php echo get_field( 'square_feet', $fplan->ID ); ?> Feet<sup>2</sup> | <?php echo get_field( 'bedrooms', $fplan->ID ); ?> Bedrooms
						</p>
					</a>
				<?php endforeach; ?>
			<?php endif; ?>

		</div>
		<a href="/options/" class="image-block-link-2">
			<h1 style="margin: auto; max-width: 18ch;"><span style="background-color: var(--dark-color); color: var(--light-color);">Browse our most popular colors and options.</h1>
		</a>
	</div><!-- .image-swatch-container -->
</section><!-- .home-body -->

<?php echo do_shortcode( '[imageFeed type="newest"]' ); ?>

<?php get_footer(); ?>
