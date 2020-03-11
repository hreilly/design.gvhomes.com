<?php
/**
 * The template for displaying category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gvdesign
 */

wp_enqueue_script("jquery");
featherlight_scripts();
get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" style="max-width: 1280px; margin: auto;">

        <?php
        $cat_id = get_query_var('cat');
        ?>

        <h1 class="entry-title">
            <?php 
                echo get_cat_name( $cat_id ); 
                if( $paged > 1 ) { 
                    echo '&nbsp;-&nbsp;Page&nbsp;' . $paged; 
                } 
            ?>
        </h1>

        <?php if ( $paged < 2 ) : ?>

        <p class="entry-description two-column" style="max-width: 80%; margin: 50px auto; padding: 10px;"><?php echo category_description(); ?></p>

        <div class="callout-boxes">
            <div class="callout-boxes-text">PHOTOS</div>
            <div class="callout-sub-box-1"></div>
            <div class="callout-sub-box-2"></div>
        </div>

        <?php endif; ?>

            <?php if( have_posts() ): ?>

                <div class="image-flex-container">

                <?php while ( have_posts() ) : the_post(); 
                
                $image_id = get_the_ID();

                ?>

                    <a href="#" class="image-tile-link image-flex-item" 
                                aria-label="<?php the_title(); ?>" 
                                data-featherlight="<div class='fl-image-wrap'>
                                    <img src='<?php echo wp_get_attachment_url( $image_id ); ?>' />
                                    <h3><?php the_title(); ?></h3>
                                    <div style='position: absolute; bottom: 10px; left: 10px;'>
                                        <a style='position: absolute;' data-pin-do='buttonPin' 
                                            href='https://www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo wp_get_attachment_url( $image_id ); ?>' 
                                            data-pin-description='<?php the_title(); ?>: <?php echo wp_get_attachment_caption( $image_id ); ?>' 
                                            data-pin-tall='true'></a>
                                    </div>
                                    <a class='gv-button-one' href='<?php the_permalink(); ?>'>More Details</a>
                                </div>">
                        <?php echo wp_get_attachment_image( $image_id ); ?>
                    </a>

                <?php endwhile; ?>

                </div>

            <?php endif; ?>

        <?php wp_reset_query();	?>

        <?php gv_pagination(); ?>

        <script>
            jQuery(document).on("click",'.image-flex-container', function() {
                if (typeof PinUtils == "undefined") {
                    jQuery.getScript("http://assets.pinterest.com/js/pinit_main.js", function() {
                    });
                } else {
                    PinUtils.build();
                }
            });
        </script>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
