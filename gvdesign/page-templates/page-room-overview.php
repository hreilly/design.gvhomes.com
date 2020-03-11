<?php
// Template Name: Room Overview
/**
 * The template for displaying the room overview page
 *
 * @package gvdesign
 */

get_header();
?>

<style>
	.room-card {
		background-color: rgba(255,255,255,.9); 
		direction: ltr;
		border: 1px solid black;
		box-shadow: var(--element-shadow-2); 
		padding: 4%; 
		margin: 20px auto; 
		border-radius: 10px;
		transition: ease .1s;
	}
	.room-card h2 {
		margin: 0;
		outline: none; 
		border-bottom: 30px solid var(--bright-color-half-op); 
		border-image-source: linear-gradient(45deg, var(--bright-color-half-op), var(--accent-color-2-half-op)); 
		border-image-slice: 1; 
		padding-left: 30px;
		border-radius: 5px 5px 0 0;
		text-decoration: none;
		box-shadow: none;
	}
	.room-card h2:hover {
		text-decoration: underline;
	}
	.room-card img {
		display: block;
		border-radius: 0 0 5px 5px;
		transition: ease .1s;
		position: relative;
	}
	.room-thumb {
		position: relative;
		width: 24%;
		transition: ease .1s;
	}
	.room-thumb::after {
		position: absolute;
		top: 0;
		left: 0;
		background-color: var(--bright-color-half-op);
		content: "VIEW ALL";
		padding: 40% 15% 0 15%;
		height: 100%;
		width: 100%;
		z-index: 10;
		font-weight: bold;
		font-size: calc(10px + .2vw);
		color: white;
		opacity: 0;
		margin: auto;
		text-align: center;
		vertical-align: center;
		border-radius: 0 0 5px 5px;
		transition: ease .1s;
		text-decoration: none;
	}
	.room-thumb:nth-of-type(n+4)::after {
		opacity: 1;
	}
	.room-thumb:nth-of-type(n+4):hover::after {
		background-color: var(--accent-color-2-half-op);
		opacity: 1;
	}
	.room-thumb:hover::after {
		opacity: 1;
	}
	.room-card:hover img {
		opacity: .8;
	}
	.room-card [data-room] {
		background: white center right / contain no-repeat;
	}
	.room-card [data-room="bedrooms"] {
		background-image: url('/wp-content/uploads/2020/01/bedrooms_peach_200x70.jpg');
	}
	.room-card [data-room="dining"] {
		background-image: url('/wp-content/uploads/2020/01/dining_peach_200x70.jpg');
	}
	.room-card [data-room="kitchens"] {
		background-image: url('/wp-content/uploads/2020/01/kitchens_peach_200x70.jpg');
	}
	.room-card [data-room="bathrooms"] {
		background-image: url('/wp-content/uploads/2020/01/bathrooms_peach_200x70.jpg');
	}
	.room-card [data-room="living-spaces"] {
		background-image: url('/wp-content/uploads/2020/01/living_peach_200x70.jpg');
	}
	.room-card [data-room="studies-offices"] {
		background-image: url('/wp-content/uploads/2020/01/libraries_peach_200x70.jpg');
	}
	.room-card [data-room="closets"] {
		background-image: url('/wp-content/uploads/2020/01/closets_peach_200x70.jpg');
	}
</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div id="room-overview" class="split-page-container">

				<div class="split-page" style="background: 
													white
													url('/wp-content/uploads/2020/01/cozy_library_1024x1024.jpg')
													center center / auto
													no-repeat; 
													padding: 0; z-index: 100; background-color: white;">
					<div style="max-width: 50ch; margin-top: 25%;">
					<h1 style="margin: auto;"><?php the_title(); ?></h1>
					<p style="outline: 1px solid black; background-color: rgba(255,255,255,.9); padding: 30px; color: black;">Nunc semper orci ultricies augue pretium, id condimentum orci facilisis. Etiam ultrices massa tortor, ut convallis velit euismod at. Quisque nec nibh ultricies, mattis lorem at, vehicula velit. Pellentesque id nisl facilisis urna consequat aliquet euismod eget justo.</p>
					</div>
				</div><!-- .split-page left -->
				<div class="split-page scroll-container" style="background-color: var(--accent-color-2);">

					<?php 
					$args = array(
						'hide_empty'=> 0,
						'orderby'    => 'include',
						'include'    => array( 5,4,57,6,13,43,7 )
					);
					$categories = get_categories($args);
					
					foreach ($categories as $cat) {
						
						$id = $cat->term_id;

						echo '<a href="/category/'.$cat->slug.'" style="color: black; text-decoration: none;"><div class="room-card">';
							echo '<h2 data-room="'.$cat->slug.'">'.$cat->name.'</h2>';
							echo '<div style="display: flex; justify-content: space-between; margin-top: 10px;">';
							$post = array( 'posts_per_page' => 4, 'category' => $id, 'post_type' => 'attachment', 'post_status' => 'inherit', );
							$images = get_posts( $post );

							foreach ($images as $image) {
								$image_id = $image->ID;
								$pic = wp_get_attachment_image( $image_id );

								echo '<div class="room-thumb">'.$pic.'</div>';
							}

							echo '</div>';
						echo '</div></a>';
					}
					?>

				</div><!-- .split-page right -->

			</div><!-- #room-overview -->
			<div id="room-continued" class="split-page-container">

				<div class="split-page flex-column" style="background-color: var(--accent-color-3); z-index: 100;">
					<div style="position: relative; margin: auto; padding: 50px; color: white; font-family: var(--accent-font); font-size: calc(1.2rem + .8vw);">"The best rooms have something to say about the people who live in them."</div>
					<div style="font-size: calc(.7rem + .8vw); font-style: italic; align-self: flex-end; color: white;">- David Hicks, Interior Designer</div>
				</div><!-- .split-page left -->
				<div class="split-page" style="background: 
													url('<?php echo get_template_directory_uri(); ?>/svg/abstract_bg_3.svg')
													bottom center / cover
													no-repeat; 
													padding: 0px; z-index: 1;">

					<?php echo do_shortcode( '[lazyVideo dataid="368899555" type="vimeo"]' ); ?>

					<div class="split-page-caption">
						<p><strong>WATCH:</strong> Get a preview of your design experience.</p>
					</div>
				</div><!-- .split-page right -->

			</div><!-- #room-continued -->

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