<?php
/**
 * Template part for displaying image attachments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gvdesign
 */

wp_enqueue_script("jquery");
featherlight_scripts();
get_header();

$post_id = get_the_ID();
$categories = wp_get_post_categories( get_the_ID() );
$plan = get_field('plan_shown');

?>

<style>
    .entry-attachment {
        margin: auto 20px;
    }
    @media screen and (max-width:1240px) {
        .entry-attachment {
            margin: auto;
        }
    }
    .entry-caption {
        margin: 20px;
        padding: 20px 40px;
        position: relative;
        border-top: 2px solid var(--accent-color-2-half-op);
        border-bottom: 2px solid var(--accent-color-2-half-op);
    }
    .entry-caption p {
        margin: 0;
    }
    .entry-caption::before {
        position: absolute;
        top: -35px;
        left: -5px;
        content: '"';
        font-familY: var(--accent-font);
        font-size: 60px;
    }
    .entry-caption::after {
        position: absolute;
        bottom: -57px;
        right: -5px;
        content: '"';
        font-familY: var(--accent-font);
        font-size: 60px;
    }
    .entry-categories, .entry-terms {
        width: 30%;
    }
    .entry-tags {
        width: 40%;
    }
    .entry-footer > div {
        padding: 0px 20px 20px 20px;
    }
    .entry-footer {
        background-color: white;
        margin: 0px auto;
        padding: 25px 0px;
        box-shadow: 0px 12px 15px -20px rgba(0,0,0,0.7), 0px -12px 15px -20px rgba(0,0,0,0.7);
        position: relative;
    }
    @media screen and (max-width:900px) {
        .entry-footer {
            flex-direction: column;
        }
        .entry-categories, .entry-tags, .entry-terms {
            width: 100%;
        }
    }
    .image-nav-container {
        display: flex;
        justify-content: space-between;
        margin: 25px auto;
    }
    .image-nav-link {
        width: 49.5%; 
        border: 1px solid var(--accent-color-3-half-op);
        display: flex;
        flex-direction: row;
        overflow: hidden;
        border-radius: 5px;
        color: black;
        align-content: center;
        text-decoration: none;
        font-weight: bold;
        transition: ease .1s;
        background-color: var(--bright-color-light);
    }
    .image-nav-link:hover {
        box-shadow: var(--element-shadow);
    }
    .image-nav-link:hover img {
        opacity: .8;
    }
    .image-nav-link:last-of-type {
        justify-content: flex-end;
    }
    .image-nav-link img {
        width: auto;
        height: auto;
        opacity: 1;
        transition: .1s ease;
    }
    .image-nav-link p {
        margin: auto 0;
        padding: 20px;
        font-weight: 700;
    }
    .image-nav-link p:last-of-type {
        padding-left: 0px;
    }
    .image-nav-link p:first-of-type {
        padding-right: 5px;
    }
    .image-nav-link:last-of-type {
        text-align: right;
    }
    @media screen and (max-width: 600px) {
        .image-nav-container {
            display: block;
        }
        .image-nav-link {
            width: 90%;
            margin: auto auto 20px;
        }
    }
</style>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

        <article style="max-width: var(--wide-max-width); margin: auto;" id="post-<?php echo $post_id; ?>" <?php post_class(); ?>>

            <div class="entry-attachment" style="position: relative;">
                <?php echo wp_get_attachment_image( $post_id, 'full' ); ?>
                <div style='position: absolute; bottom: 12px; right: 12px;'>
                    <a style='position: absolute;' data-pin-aria-label='Pin this Image' data-pin-do='buttonPin' 
                        href='https://www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo wp_get_attachment_url( $post_id ); ?>' 
                        data-pin-description='<?php the_title(); ?>: <?php echo wp_get_attachment_caption( $post_id ); ?>' 
                        data-pin-tall='true'
                        data-pin-shape='round'></a>
                </div>

            </div><!-- .entry-attachment -->

                <div class="options-container">

                    <?php the_title( '<h1 class="entry-title" style="font-family: var(--script-font); margin: 0; padding: 30px 20px 20px;">', '</h1>' ); ?>

                    <?php if ( has_excerpt() ) : ?>
                        <div class="entry-caption">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if( get_field('show_option_selection') == true ): ?>

                    <?php if( have_rows('all_options') ): ?>

                    <div style="text-align: center; margin-top: 30px;">
                        <div class="dot-divider">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <h2 style="font-size: 1.3rem; padding: 20px; margin: 0;">Our designers selected the following options for this <?php echo get_the_title( $plan->ID ); ?>:</h2>
                    </div>

                    <?php endif; ?>

                    <div class="flex-row-wrap all-options">

                        <?php if( have_rows('all_options') ): ?>
                            <?php while( have_rows('all_options') ): the_row(); 

                                // Get sub field values.
                                $subfields = array();
                                $subfields[] = get_field('all_options');

                                foreach ( $subfields as $options ) {
                                
                                    foreach ( $options as $opname => $array ) {

                                        if($array != ''){
                                            foreach ( $array as $key => $value ) {
                                                $term_obj = get_term($value);
                                                echo '<div class="single-option">
                                                    <a href="'.get_term_link($term_obj).'">';
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
                                                echo '<p>'.$taxName.'</p>
                                                        </div>
                                                    </a>
                                                </div>';
                                            }
                                        }
                                    }
                                } ?>

                            <?php endwhile; ?>

                        <?php endif; ?>

                    </div>
                    <p class="disclaimer aligncenter"><?php the_field('upgrade_disclaimer', 'option'); ?></p>

                    <?php endif; ?>

                </div>

            <div style="height: auto; background-color: white; position: relative;">
                <img src="/wp-content/uploads/2020/03/dream_of_home_palm_400x400.jpg" class="aligncenter" style="margin: 0px auto 80px; padding-top: 30px;" alt="">
            </div>

            <div style="width: 100%; height: 40px; background-image: linear-gradient(to right, var(--bright-color), var(--accent-color-2)); box-shadow: inset 0 0 10px rgba(0,0,0,.5); position: relative; border-radius: 10px 10px 0 0;">
            </div>

            <div class="entry-footer flex-row-wrap">

                <div class="entry-categories deco-border-left">

                    <h2 class="">Room Category:</h2>

                    <?php
                        foreach($categories as $c){
                            $cat = get_category( $c );
                            $cat_id = get_cat_ID( $cat->name );
                            echo '<a href="'.get_category_link($cat_id).'" class="boxed-link boxed-link-2">'.$cat->name.'</a>';
                        }
                    ?>

                    <div style="padding-top: 20px;">

                        <?php 
                        
                        $images = array(
                            'posts_per_page' => 4,
                            'post_type'      => 'attachment', 
                            'post_status'    => 'inherit', 
                            'cat'            => array($cat_id),
                            'post__not_in'   => array(get_the_ID())
                        );  

                        $the_query = new WP_Query( $images );

                        ?>

                            <?php if( $the_query->have_posts() ): ?>

                                <div class="flex-row-wrap" style="justify-content: space-between;">

                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
                                $image_id = get_the_ID();
                                $image_name = get_the_title($image_id);

                                ?>

                                    <a href="#" class="image-tile-link" aria-label="Launch in Lightbox: <?php echo $image_name; ?>" style="width: 23%;" 
                                    data-featherlight="<div class='fl-image-wrap'>
                                                    <img src='<?php echo wp_get_attachment_url( $image_id ); ?>' />
                                                    <h3><?php the_title(); ?></h3>
                                                    <a class='gv-button-one' href='<?php the_permalink(); ?>'>More Details</a>
                                                </div>">
                                        <?php echo wp_get_attachment_image( $image_id ); ?>
                                    </a>

                                <?php endwhile; ?>

                                </div>

                            <?php endif; ?>

                        <?php wp_reset_query();	?>

                    </div>

                </div><!-- .entry-categories -->

                <div class="entry-tags deco-border-left">

                    <h2>Style Tags:</h2>

                    <div class="tag-wrapper flex-row-wrap">
                        <?php
                            $tags = wp_get_post_tags( get_the_ID() );
                            if ($tags){
                                foreach($tags as $t){
                                    $tag = get_tag( $t );
                                    echo '<a href="'.get_category_link($tag).'" class="boxed-link">'.$tag->name.'</a>';
                                }
                            } else {
                                echo '<p style="font-style: italic; margin-top: 0;">No tags assigned. Browse popular tags:</p>';
                                echo '<div class="flex-row-wrap">';
                                wp_tag_cloud( array(
                                    'smallest' => .8,
                                    'largest'  => .8,
                                    'unit'     => 'rem',
                                    'number'   => 8,
                                    'orderby'  => 'name', 
                                    'order'    => 'ASC',
                                ) );
                                echo '</div>';
                            }
                        ?>
                    </div>

                </div><!-- .entry-tags -->

                <div class="entry-terms deco-border-left">

                    <?php 

                    if( $plan ): ?>

                        <h2>Floor Plan:</h2>
                        
                        <a href="<?php echo get_permalink( $plan->ID ); ?>" class="boxed-link boxed-link-2">
                            <?php echo get_the_title( $plan->ID ); ?>
                        </a>

                        <div style="padding-top: 20px;">

                            <?php 
                            
                            $images = array(
                                'posts_per_page' => 4,
                                'post_type'      => 'attachment', 
                                'post_status'    => 'inherit', 
                                'meta_query' => array(
                                    array (
                                        'key' => 'plan_shown',
                                        'value' => $plan->ID,
                                    ),
                                ),
                                'post__not_in'   => array(get_the_ID())
                            );  

                            $the_query = new WP_Query( $images );

                            ?>

                                <?php if( $the_query->have_posts() ): ?>

                                    <div class="flex-row-wrap" style="justify-content: space-between;">

                                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
                                    $image_id = get_the_ID();
                                    $image_name = get_the_title($image_id);

                                    ?>

                                        <a href="#" class="image-tile-link" aria-label="Launch in Lightbox: <?php echo $image_name; ?>" style="width: 23%;"
                                        data-featherlight="<div class='fl-image-wrap'>
                                                    <img src='<?php echo wp_get_attachment_url( $image_id ); ?>' />
                                                    <h3><?php the_title(); ?></h3>
                                                    <a class='gv-button-one' href='<?php the_permalink(); ?>'>More Details</a>
                                                </div>">
                                            <?php echo wp_get_attachment_image( $image_id ); ?>
                                        </a>

                                    <?php endwhile; ?>

                                    </div>

                                <?php endif; ?>

                            <?php wp_reset_query();	?>

                        </div>

                    <?php endif; ?>

                </div><!-- .entry-terms -->

            </div><!-- .entry-footer -->

            <div class="image-nav-container">

            <?php

            $args =  array(
                'post_status'    => 'inherit',
                'post_type'      => 'attachment',
                'post_mime_type' => 'image',
                'posts_per_page' => 1,
                'order'          => 'ASC',
                'date_query'     => array(
                    array(
                        'after' => $post->post_date,
                        'column' => 'post_date',
                    ),
                ),
                'meta_query'     => array(
                    array(
                        'key'    => 'office_only',
                        'value'  => 1,
                        'compare' => '!=',
                    )
                )
            );

            $previous = get_posts( $args );

            if ( isset( $previous[0]->ID ) ) {
                echo '<a href="'.get_attachment_link( $previous[0]->ID ).'" class="image-nav-link">';
                echo wp_get_attachment_image(  $previous[0]->ID, 'mini-thumb', true );
                echo '<p style="font-size: 2rem;">↶</p>';
                echo '<p>Previous Photo</p>';
                echo '</a>';
            }

            unset( $args['date_query'][0]['after'] );

            $args['order'] = 'DESC';
            $args['date_query'][0]['before'] = $post->post_date;

            $next = get_posts( $args );

            if ( isset( $next[0]->ID ) ) {
                echo '<a href="'.get_attachment_link( $next[0]->ID ).'" class="image-nav-link">';
                echo '<p>Next Photo</p>';
                echo '<p style="font-size: 2rem;">↷</p>';
                echo wp_get_attachment_image(  $next[0]->ID, 'mini-thumb', true );
                echo '</a>';
            }
            ?>

            </div><!-- .image-nav-container -->

            <div style="width: 100%; height: 40px; background-image: linear-gradient(to right, var(--bright-color), var(--accent-color-2)); box-shadow: inset 0 0 10px rgba(0,0,0,.5); position: relative; border-radius: 0 0 10px 10px;">
            </div>

            <p class="disclaimer" style="margin: 20px auto auto auto; padding-bottom: 0px; padding-top: 30px;"><?php the_field('options_disclaimer', 'option'); ?></p>

        </article><!-- #post-<?php echo $post_id; ?> -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php echo do_shortcode( '[imageFeed type="random"]' ); ?>

<script
    type="text/javascript"
    async defer
    src="//assets.pinterest.com/js/pinit.js"
></script>

<?php
get_footer();