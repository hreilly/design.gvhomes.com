<?php
/**
 * The template for displaying all plan posts
 *
 * @package gvdesign
 */

wp_enqueue_script("jquery");
featherlight_scripts();
get_header();

$post_tags = get_the_tags();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<article style="max-width: var(--wide-max-width); margin: auto;" id="post-<?php echo $post_id; ?>" <?php post_class(); ?>>

                <h1 class="entry-title">
                    <?php 
                        echo 'Tagged in: ';
                        single_tag_title(); 
                        if( $paged > 1 ) { 
                            echo '&nbsp;-&nbsp;Page&nbsp;' . $paged; 
                        } 
                    ?>
                </h1>
                
                <?php if( have_posts() ): ?>

                    <div class="image-flex-container">

                        <?php while ( have_posts() ) : the_post(); 

                        $image_id = get_the_ID();

                        ?>

                            <a href="<?php the_permalink(); ?>" class="image-tile-link image-flex-item" aria-label="<?php the_title(); ?>">
                                <?php echo wp_get_attachment_image( $image_id ); ?>
                            </a>

                        <?php endwhile; ?>

                    </div>

                <?php endif; ?>

                <?php wp_reset_query();	?>

                <?php gv_pagination(); ?>

			</article>

		</main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();