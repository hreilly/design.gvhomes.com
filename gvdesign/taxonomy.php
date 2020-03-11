<?php
/**
 * The template for displaying taxonomy pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gvdesign
 */

wp_enqueue_script("jquery");
featherlight_scripts();
get_header();

$term_obj = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
$friendlyname = get_field('friendly_name', $term_obj);
$img = get_field('option_image', $term_obj);

$tax = $term_obj->taxonomy;
$taxName = get_taxonomy($tax)->labels->singular_name;

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" style="max-width: var(--wide-max-width); margin: auto;">

            <h1 class="entry-title"><?php echo $taxName; ?> Details:</h1>
            <?php
                echo '<div class="single-option option-breakout" style="position: relative; margin: auto; max-width: 720px;">
                    <a href="/'.$tax.'">';
                $img = get_field('option_image', $term_obj);
                if ($img != '') {
                    echo '<img src="'.$img['sizes']['mini-thumb'].'" alt=""/>';
                } else {
                    echo '<div></div>';
                }
                $tax = $term_obj->taxonomy;
                $taxName = get_taxonomy($tax)->labels->singular_name;
                echo '<div>';
                $standardtoggle = get_field('available_as_standard_feature', $term_obj);
                $friendlyname = get_field('friendly_name', $term_obj);
                echo '<p>';
                if ($friendlyname) {
                    echo $friendlyname;
                } else {
                    echo $term_obj->name;
                }
                if ($standardtoggle != 'true') {
                    echo '<sup>★</sup>';
                } 
                echo '</p>';
                echo '<p>';
                echo $term_obj->description;
                echo '</p>';
                $lines = get_field('product_lines', $term_obj);
                $lines_string = implode(", ", $lines);
                echo '<p style="font-style: italic;">Available in: '.ucwords($lines_string).'</p>';
                echo	'</div>
                    </a>
                    <div style="position: absolute; bottom: 10px; right: 25px; padding: 0;">
                    <a data-pin-do="buttonPin" 
                        href="https://www.pinterest.com/pin/create/button/" data-pin-media="'.$img['sizes']['thumbnail'].'" data-pin-description="'.$term_obj->name.': '.$term_obj->description.'" data-pin-tall="true" data-pin-shape="round"></a>
                    </div>
                </div>';
                ?>

                <?php if ($standardtoggle != 'true') : ?>

                <p style="margin: 20px auto 120px auto; text-align: center;"><?php the_field('upgrade_disclaimer', 'option'); ?></p>

                <?php endif; ?>

                <?php if( have_posts() ): ?>

                <div class="callout-boxes">
                    <div class="callout-boxes-text">SHOWN IN:</div>
                    <div class="callout-sub-box-1"></div>
                    <div class="callout-sub-box-2"></div>
                </div>

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
                                            <a data-pin-do='buttonPin' 
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

                <?php else: ?>

                    <p style="text-align: center; font-style: italic; margin-top: 50px;">There are currently no photos to display.</p>

                <?php endif; ?>

                <?php wp_reset_query();	?>

            <?php gv_pagination(); ?>

            <p class="disclaimer"><?php the_field('options_disclaimer', 'option'); ?></p>

		</main><!-- #main -->
    </div><!-- #primary -->
    
    <script
    type="text/javascript"
    async defer
    src="//assets.pinterest.com/js/pinit.js"
	></script>

<?php
get_footer();