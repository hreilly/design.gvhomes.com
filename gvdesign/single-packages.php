<?php
/**
 * The template for displaying all package posts
 *
 * @package gvdesign
 */

get_header();

// Vars

// Post data


?>

<style>
    #description {
        border: 1px solid black;
        margin: 10px;
        background-color: var(--bright-color);
        color: white;
        box-shadow: var(--element-shadow);
    }
    .options-page-wrapper {
        display: grid; 
        grid-template-columns: 3fr 2fr 2fr; 
        grid-auto-rows: auto;
        padding-bottom: 30px;
    }
    .options-page-section {
        padding: 10px;
    }
    .options-page-section:first-of-type {
        grid-column: 2 / 4; grid-row: 1 / 2;
    }
    .options-page-section:nth-of-type(2) {
        grid-column: 1 / 2; grid-row: 1 / 2;
    }
    .options-page-section:nth-of-type(3) {
        grid-column: 1 / 2; grid-row: 2 / 4;
    }
    .options-page-section:nth-of-type(4) {
        grid-column: 2 / 4; grid-row: 2 / 3;
    }
    .options-page-section:nth-of-type(5) {
        grid-column: 2 / 4; grid-row: 3 / 5;
    }
    .options-page-section:nth-of-type(6) {
        grid-column: 1 / 2; grid-row: 4 / 6;
    }
    .options-page-section:nth-of-type(7) {
        grid-column: 2 / 4; grid-row: 5 / 6;
    }
    .options-page-section>h3 {
        margin: 0;
        border-bottom: 2px solid var(--bright-color);
        margin-bottom: 15px;
    }
    .options-page-section>div {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-template-rows: auto;
        gap: 10px 10px;
    }
    .options-page-section:nth-of-type(2)>div {
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: auto;
    }
    .options-page-section:nth-of-type(3)>div, .options-page-section:nth-of-type(6)>div {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
    }
    .options-page-section>div>a {
        border: 1px solid black;
        cursor: pointer;
        width: 100%;
        display: flex;
        flex-direction: column;
        color: black;
        text-decoration: none;
        box-shadow: none;
        transition: ease .1s;
    }
    .options-page-section>div>a:hover {
        box-shadow: var(--element-shadow);
    }
    .options-page-section:nth-of-type(3)>div>a, .options-page-section:nth-of-type(6)>div>a {
        flex-direction: row;
    }
    .options-page-section:nth-of-type(3)>div>a>img, .options-page-section:nth-of-type(6)>div>a>img {
        max-height: 120px;
        width: auto;
    }
    .options-page-section>div>a>p {
        padding: 10px;
        margin: 0px;
        font-size: 14px;
    }
    @media screen and (max-width : 720px) {
        .options-page-wrapper { 
            grid-template-columns: 1fr; 
        }
        .options-page-section:first-of-type {
            grid-column: 1 / 2; grid-row: 1 / 2;
        }
        .options-page-section:nth-of-type(2) {
            grid-column: 1 / 2; grid-row: 2 / 3;
        }
        .options-page-section:nth-of-type(3) {
            grid-column: 1 / 2; grid-row: 3 / 4;
        }
        .options-page-section:nth-of-type(4) {
            grid-column: 1 / 2; grid-row: 4 / 5;
        }
        .options-page-section:nth-of-type(5) {
            grid-column: 1 / 2; grid-row: 5 / 6;
        }
        .options-page-section:nth-of-type(6) {
            grid-column: 1 / 2; grid-row: 6 / 7;
        }
        .options-page-section:nth-of-type(7) {
            grid-column: 1 / 2; grid-row: 7 / 8;
        }
    }
    .fade-in-content {
        animation: fadein 1s;
    }
    @keyframes fadein {
        0% { opacity: 0; }
        25% { opacity: 0; }
        100% { opacity: 1; }
    }
    @media print {
        header nav, .flex-footer-menu, .flex-footer-info .site-branding, .nav-links {
            display: none;
        }
        .site-header {
            background-color: none;
            position: relative;
        }
        .site-content {
            padding-top: 0;
        }
        .flex-footer {
            display: block;
            margin-right: 0;
        }
        .flex-footer-info {
            border-left: none;
        }
    }
</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" style="min-height: 100vh;">

            <section class="fade-in-content" style="max-width: 900px; height: auto; margin: 20px auto; padding: 10px;">

                <?php if( have_rows( 'interior_options' ) ): 

                while( have_rows('interior_options') ): the_row();
                    
                    $cabs = get_sub_field('cabinet_finishes');
                    $cabstyle = get_sub_field('cabinet_style');
                    $paint  = get_sub_field('paint_color');
                    $counters = get_sub_field('counters');
                    $wall = get_sub_field('wall_tile');
                    $floor = get_sub_field('floor_tile');
                    $carpet = get_sub_field('carpet');
                    
                ?>

                    <div class="options-page-wrapper">

                        <div class="options-page-section" id="description">
                            <?php the_title( '<h1 style="margin: 0; padding: 10px; text-align: left; font-size: calc(1.3rem + 0.25vw);">', '</h1>' ); ?>
                            <p style="padding: 10px; margin: 0px;"><?php echo get_field('package_description'); ?></p>
                        </div>

                        <?php if( $cabs != '' ): ?>
                            <div class="options-page-section" id="cabinets">
                                <h3>Cabinets</h3>
                                <div>
                                    <?php if ( $cabstyle != '' ) {
                                        foreach ( $cabstyle as $key => $value ) {
                                            $term_obj = get_term($value);
                                            $img = get_field('option_image', $term_obj);
                                            $standardtoggle = get_field('available_as_standard_feature', $term_obj);
                                            echo '<a href="'.get_term_link($term_obj).'">'.
                                                '<img src="'.$img['sizes']['mini-thumb'].'">'.
                                                '<p>'.$term_obj->name.' Style';
                                                if ($standardtoggle != 'true') {
                                                    echo '<sup>★</sup>';
                                                }
                                                echo '</p>';
                                            echo '</a>';
                                        }
                                    } ?>
                                    <?php foreach ( $cabs as $key => $value ) {
                                        $term_obj = get_term($value);
                                        $img = get_field('option_image', $term_obj);
                                        $standardtoggle = get_field('available_as_standard_feature', $term_obj);
                                        echo '<a href="'.get_term_link($term_obj).'">'.
                                            '<img src="'.$img['sizes']['mini-thumb'].'">'.
                                            '<p>'.$term_obj->name;
                                            if ($standardtoggle != 'true') {
                                                echo '<sup>★</sup>';
                                            }
                                            echo '</p>';
                                        echo '</a>';
                                    }  ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if( $paint != '' ): ?>
                            <div class="options-page-section" id="paint">
                                <h3>Paint</h3>
                                <div>
                                    <?php foreach ( $paint as $key => $value ) {
                                        $term_obj = get_term($value);
                                        $img = get_field('option_image', $term_obj);
                                        $standardtoggle = get_field('available_as_standard_feature', $term_obj);
                                        echo '<a href="'.get_term_link($term_obj).'">'.
                                            '<img src="'.$img['sizes']['mini-thumb'].'">'.
                                            '<p>'.$term_obj->name;
                                            if ($standardtoggle != 'true') {
                                                echo '<sup>★</sup>';
                                            }
                                            echo '</p>';
                                        echo '</a>';
                                    }  ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if( $counters != '' ): ?>
                            <div class="options-page-section" id="counters">
                                <h3>Counters</h3>
                                <div>
                                    <?php foreach ( $counters as $key => $value ) {
                                        $term_obj = get_term($value);
                                        $img = get_field('option_image', $term_obj);
                                        $standardtoggle = get_field('available_as_standard_feature', $term_obj);
                                        echo '<a href="'.get_term_link($term_obj).'">'.
                                            '<img src="'.$img['sizes']['mini-thumb'].'">'.
                                            '<p>'.$term_obj->name;
                                            if ($standardtoggle != 'true') {
                                                echo '<sup>★</sup>';
                                            }
                                            echo '</p>';
                                        echo '</a>';
                                    }  ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if( $wall != '' ): ?>
                            <div class="options-page-section" id="wall-tile">
                                <h3>Wall Tile</h3>
                                <div>
                                    <?php foreach ( $wall as $key => $value ) {
                                        $term_obj = get_term($value);
                                        $img = get_field('option_image', $term_obj);
                                        $standardtoggle = get_field('available_as_standard_feature', $term_obj);
                                        echo '<a href="'.get_term_link($term_obj).'">'.
                                            '<img src="'.$img['sizes']['mini-thumb'].'">'.
                                            '<p>'.$term_obj->name;
                                            if ($standardtoggle != 'true') {
                                                echo '<sup>★</sup>';
                                            }
                                            echo '</p>';
                                        echo '</a>';
                                    }  ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if( $floor != '' ): ?>
                            <div class="options-page-section" id="floor-tile">
                                <h3>Floor Tile</h3>
                                <div>
                                    <?php foreach ( $floor as $key => $value ) {
                                        $term_obj = get_term($value);
                                        $img = get_field('option_image', $term_obj);
                                        $standardtoggle = get_field('available_as_standard_feature', $term_obj);
                                        echo '<a href="'.get_term_link($term_obj).'">'.
                                            '<img src="'.$img['sizes']['mini-thumb'].'">'.
                                            '<p>'.$term_obj->name;
                                            if ($standardtoggle != 'true') {
                                                echo '<sup>★</sup>';
                                            }
                                            echo '</p>';
                                        echo '</a>';
                                    }  ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if( $carpet != '' ): ?>
                            <div class="options-page-section" id="carpet">
                                <h3>Carpet</h3>
                                <div>
                                    <?php foreach ( $carpet as $key => $value ) {
                                        $term_obj = get_term($value);
                                        $img = get_field('option_image', $term_obj);
                                        $standardtoggle = get_field('available_as_standard_feature', $term_obj);
                                        echo '<a href="'.get_term_link($term_obj).'">'.
                                            '<img src="'.$img['sizes']['mini-thumb'].'">'.
                                            '<p>'.$term_obj->name;
                                            if ($standardtoggle != 'true') {
                                                echo '<sup>★</sup>';
                                            }
                                            echo '</p>';
                                        echo '</a>';
                                    }  ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div><!-- .options-page-wrapper -->

                <?php endwhile; ?>

                <?php elseif( have_rows( 'exterior_options' ) ): ?>

                <?php endif; ?>

                <?php
		
                    $args = array(
                        'prev_text'          => '&#9664;&#xFE0E; &nbsp;Prev.',
                        'next_text'          => 'Next&nbsp; &#9654;&#xFE0E;',
                        'screen_reader_text' => 'Post navigation'
                    );
                    
                the_post_navigation($args); ?>

                <p class="disclaimer" style="margin: 0; padding: 10px 10px 0;"><?php the_field('options_disclaimer', 'option'); ?></p>

            </section>

		</main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();