<?php
/**
 * The template for displaying all plan posts
 *
 * @package gvdesign
 */

wp_enqueue_script("jquery");
featherlight_scripts();
get_header();

// Vars

// Post data

$title = get_the_title();
$id = get_the_ID();
$beds = get_field( 'bedrooms' );
$baths = get_field( 'bathrooms' );
$garage = get_field( 'garage_spaces' );
$sqft = get_field( 'square_feet' );
$description = get_field( 'plan_description' );
$video = get_field( 'vimeo_id' );
$quote = get_field( 'plan_quote' );

// Elevation repeater fields

$rows = get_field( 'available_elevations' );
$frow = $rows[0];
$frow_image = $frow['elevation_image'];
$frow_elev = $frow['elevation_name'];
$image = wp_get_attachment_image_src( $frow_image, 'full' );
$thumb = wp_get_attachment_image_src( $frow_image, 'thumbnail' );

?>

<style>
    .plan-image-container {
        position: relative;
        display: block;
        background-color: rgba(0,0,0,.8);
        margin: auto; 
        min-height: 56.25%;
    }
    .plan-image-container img {
        display: block;
    }
    .plan-image-container::before {
        content: "a";
        background: url(<?php echo $image[0]; ?>) -50% center / auto;
        bottom: 0;
        right: 0;
        height: 100%;
        width: 100%;
        position: absolute;
        z-index: -1;   
    }
    .plan-image-container::after {
		content: 'Pictured: <?php echo $frow_elev; ?>';
		opacity: 1;
		bottom: 20px;
		right: 20px;
		font-size: calc(.7rem + .2vw);
		position: absolute;
		font-weight: bold;
		color: white;
        z-index: 10;
        font-style: italic;
        text-align: right;
        padding: 3px 10px;
        border-radius: 3px;
        background-color: rgba(0,0,0,.3);
        box-shadow: var(--element-shadow);
    }
    .plan-info {
        width: 40%; 
        background-color: var(--bright-color); 
        text-align: right; 
        color: white;
        padding: 30px 20px 100px;
        outline: 1px solid black;
    }
    .plan-info div {
        margin-right: 2%;
    }
    .plan-info h2 {
        margin-bottom: 0px;
        font-size: calc(1.6rem + .2vw);
    }
    .plan-info p {
        margin-top: 0px;
        font-weight: bold;
        font-size: calc(.7rem + .2vw);
    }
    .elevation-container {
        margin: auto;
        max-width: var(--wide-max-width);
    }
    .elevation-container a {
        color: black;
        text-decoration: none;
    }
    .elevation-info {
        border: 1px solid black;
        overflow: hidden;
        margin: -30px -30px 50px -30px;
        box-shadow: var(--element-shadow-2);
        z-index: 100;
        position: relative;
        background-color: white;
        padding: 2% 8% 2% 50px;
        max-width: 100%;
    }
    .elevation-row img {
        display: block;
        position: relative;
    }
    .plan-quote {
        background-color: var(--accent-color-3); 
        z-index: 100; 
        min-height: 0;
        color: white;
    }
    .plan-quote>div:nth-of-type(1) {
        position: relative; 
        margin: auto; 
        padding: 50px; 
        font-family: var(--accent-font); 
        font-size: calc(1.2rem + .8vw);
    }
    .plan-quote>div:nth-of-type(2) {
        font-size: calc(.7rem + .8vw); 
        font-style: italic; 
        align-self: flex-end; 
    }
    #interior-query {
        padding-bottom: 60px;
    }
    #interior-query h2 {
        margin: auto;
        text-align: center;
        padding: 40px 30px 50px 32px;
        margin-bottom: -20px;
        font-size: calc(1.6rem + .2vw);
        text-decoration: underline;
        text-decoration-color: var(--accent-color-2-half-op);
        position: relative;
    }
    .interior-image-frame {
        margin: auto;
        text-align: center;
        display: block;
        margin-bottom: -250px;
        position: relative;
        padding-top: 100px;
    }
</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <section style="margin: auto auto 100px auto;">
                <div class="plan-image-container"><img src="<?php echo $image[0]; ?>" alt="<?php echo $frow_elev . ' ' . $title; ?>" /></div>
                <div style="width: 100%; display: flex; border-top: 1px solid black; margin-bottom: -50px;">
                    <div class="plan-info">
                        <div>
                            <h2><?php echo $beds; ?></h2>
                            <p>Bedrooms</p>
                        </div>
                        <div>
                            <h2><?php echo $baths; ?></h2>
                            <p>Bathrooms</p>
                        </div>
                        <div>
                            <h2><?php echo $garage; ?></h2>
                            <p>Car Gar.</p>
                        </div>
                        <div>
                            <h2><?php echo $sqft; ?></h2>
                            <p>Feet<sup>2</sup></p>
                        </div>
                    </div>
                    <div style="width: 60%;">
                        <h1 class="entry-title" style="font-size: calc(1rem + 1.2vw); margin: 70px 20px 5% 20px;"><span style="font-family: var(--primary-font); font-weight: normal;">The </span><?php echo $title; ?></h1>
                        <p style="padding: 2% 10% 70px; max-width: 1024px; margin: auto;"><?php echo $description; ?></p>
                    </div>
                </div>
                <?php 

                // get repeater field data
                $repeater = get_field('available_elevations');

                $order = array();

                // Obtain list of columns
                foreach ($repeater as $key => $row) {
                    $e_name[$key] = $row['elevation_name'];
                    $e_option[$key] = $row['standard_or_upgrade'];
                    $e_image[$key] = $row['elevation_image'];
                }

                array_multisort( $e_option, SORT_ASC, $repeater );

                if( $repeater ): ?>

                    <div class="elevation-container">

                    <?php foreach( $repeater as $row ) { ?>

                        <a class="elevation-row" href="<?php echo get_attachment_link( $row['elevation_image'] ); ?>">

                            <?php echo wp_get_attachment_image( $row['elevation_image'], 'medium-large' ); ?>

                            <div class="elevation-info">
                                <h3 class="deco-underline">
                                    <?php echo $row['elevation_name']; ?>
                                </h3>
                                
                                <?php if ( $row['standard_or_upgrade'] == 'standard' ) : ?>
                                    <p>Included Exterior</p>
                                <?php elseif ( $row['standard_or_upgrade'] == 'upgrade' ): ?>
                                    <p><sup>★</sup>Upgraded Exterior</p>
                                <?php endif; ?>
                            </div>

                                </a>

                    <?php } ?>

                    </div>

                <?php endif; ?>

            </section>

            <div id="room-continued" class="split-page-container">

                <div class="split-page" style="background: 
                                                    url('<?php echo get_template_directory_uri(); ?>/svg/abstract_bg_3.svg')
                                                    bottom center / cover
                                                    no-repeat; 
                                                    padding: 0px; z-index: 1; min-height: 0;">

                    <?php echo do_shortcode( '[lazyVideo dataid="'.$video.'" type="vimeo"]' ); ?>

                    <div class="split-page-caption" style="border-bottom: none; box-shadow: none;">
                        <p style="margin: 0 auto 0 0; text-align: left;"><strong>WATCH:</strong> Take a tour of our <?php the_title(); ?> model.</p>
                    </div>
                </div><!-- .split-page right -->

                <div class="split-page flex-column plan-quote">
                    <div>"<?php if ($quote['quote_text']) { echo $quote['quote_text']; } else { echo 'One of the great beauties of architecture is that each time, it is like life starting all over again.'; }?>"</div>
                    <div>- <?php if ($quote['quote_citation']) { echo $quote['quote_citation']; } else { echo 'Renzo Piano, Italian Architect'; }?></div>
                </div><!-- .split-page left -->

            </div><!-- #room-continued -->

            <div id="interior-query">

                <div class="split-page-item-container">
                    <?php 
                            
                    $interiors = array(
                        'posts_per_page' => 15,
                        'paged'          => $paged,
                        'post_type'      => 'attachment', 
                        'orderby' => array(
                            'roomsort' => 'ASC',
                            'title'    => 'DESC',
                        ),
                        'post_status'    => 'inherit', 
                        'cat'            => array( 5,4,6,13,43,7,57 ),
                        'meta_query'     => array(
                            'relation'   => 'AND',
                            array(
                                'key'        => 'plan_shown',
                                'value'      => $id,
                                'compare'    => 'IN',
                            ),
                            'roomsort'       => array(
                                'key'        => 'room_shown',
                                'compare'      => 'EXISTS',
                            )
                        )
                    );     

                    $the_query = new WP_Query( $interiors );

                    ?>

                        <?php if( $the_query->have_posts() ): ?>

                            <img class="interior-image-frame" src="/wp-content/uploads/2020/01/frame_gray_600x400.jpg">

                            <h2>Interior Photos</h2>

                            <div class="image-flex-container">

                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
                                
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
                </div>

                <div id="interior-pagination">
                    <?php gv_pagination(); ?>
                </div>

            </div><!-- #interior-query -->

            <script>
                // AJAX load of pagination results/interaction
                jQuery(function($) {
                    $('#interior-query').on('click', '#interior-pagination a', function(e){
                        e.preventDefault();
                        var link = $(this).attr('href');
                        $('#interior-query').animate(
                            {opacity: 0},
                            500, 
                            function(){
                                $(this).load(link + ' #interior-query').delay(300).animate({opacity: 1}, 500);
                                $("body, html").animate({
                                    scrollTop: $('#interior-query').position().top
                                });
                            }
                        );
                    });
                });
                jQuery(document).on("click",'.image-flex-container', function() {
                    if (typeof PinUtils == "undefined") {
                        jQuery.getScript("http://assets.pinterest.com/js/pinit_main.js", function() {
                        });
                    } else {
                        PinUtils.build();
                    }
                });
            </script>

            <?php 

            $spotlight = get_field('spotlight_box');
            $spotlight_photo = $spotlight['spotlight_photo'];
            $spotlight_video = $spotlight['spotlight_video'];
            $spotlight_caption = $spotlight['spotlight_caption'];

            if( $spotlight['spotlight_headline'] ):

            ?>

            <div id="spotlight-box" class="split-page-container">

                <div class="split-page flex-column" style="background-color: var(--accent-color-2); z-index: 100; min-height: 0;">
                    <h2 style=" margin: 0 0px 50px -60px; padding-left: 60px;"><?php echo esc_attr( $spotlight['spotlight_headline']); ?></h2>
                    <p><?php echo esc_attr( $spotlight['spotlight_text']); ?></p>
                </div><!-- .split-page left -->

                <div class="split-page" style="background: 
                                                    url('<?php if ($spotlight['spotlight_media_toggle'] != true) { echo $spotlight_photo; } ?>')
                                                    bottom center / cover
                                                    no-repeat; 
                                                    padding: 0px; z-index: 1; min-height: 40vh; background-color: var(--bright-color-half-op);">
                    <?php if( $spotlight['spotlight_media_toggle'] == 'video' ) { echo do_shortcode( '[lazyVideo dataid="'.$spotlight_video.'" type="vimeo"]
                    <div class="split-page-caption" style="margin-bottom: 50px;">
					    <p><strong>WATCH: </strong>'.$spotlight_caption.'</p>
				    </div>' ); } ?>

                </div><!-- .split-page right -->

            </div><!-- #spotlight-box -->

            <?php endif; ?>

            <div id="links-box" class="split-page-container">

				<a href="/plans/" class="split-page flex-column" style="background-color: var(--bright-color); z-index: 100; min-height: 0;">
					<div style="position: relative; margin: auto; padding: 50px; color: white; font-family: var(--accent-font); font-size: calc(1.5rem + .5vw); text-align: center;">🠴︎ Explore All Plans</div>
                </a><!-- .split-page left -->

				<a href="https://gvhomes.com/floorplans/<?php echo str_replace(' ', '-', $title); ?>/" class="split-page flex-column" target="_blank" style="background-color: var(--accent-color-3); z-index: 90; min-height: 0;">
					<div style="position: relative; margin: auto; padding: 50px; color: white; font-family: var(--accent-font); font-size: calc(1.5rem + .5vw); text-align: center;">More at GVHomes.com 🌐︎</div>
                </a><!-- .split-page right -->

            </div><!-- #links-box -->

		</main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();