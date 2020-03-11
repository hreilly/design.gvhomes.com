<?php
// Template Name: Options Overview
/**
 * The template for displaying the options overview page
 *
 * @package gvdesign
 */

get_header();
?>

<style>
    .option-packages {
        display: flex; 
        flex-direction: row; 
        width: 100%; 
        outline: 1px solid black;
    }
    .option-packages-description {
        padding: 30px; 
        background-color: var(--accent-color-3); 
        width: 35%; 
        border-right: 1px solid black; 
        color: white;
    }
    .option-packages-container {
        display: flex; 
        flex-direction: row; 
        padding: 20px 20px 0px; 
        width: 65%; 
        justify-content: space-around; 
        box-shadow: inset 0 0 10px rgba(0,0,0,.2); 
        background-color: var(--accent-color-3-half-op);
    }
    .option-package-tile {
        padding: 20px; 
        width: 24%; 
        box-shadow: var(--element-shadow); 
        border: 1px solid black; 
        border-bottom: none; 
        background-color: white;
        position: relative;
        color: black;
    }
    .option-package-tile img {
        position: relative; 
        max-width: 250px;
    }
    .option-package-tile h3 {
        position: absolute; 
        top: 10px; 
        left: 40px;
    }
    @media screen and (max-width:1600px) {
        .option-packages {
            flex-direction: column;
        }
        .option-packages-description {
            width: 100%;
        }
        .option-packages-container {
            width: 100%;
        }
    }
    @media screen and (max-width:1024px) {
        .option-packages-container {
            flex-direction: column;
        }
        .option-package-tile {
            width: 100%;
        }
    }
</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" style="margin: auto; width: 100%;">

            <div style="max-width: var(--extra-wide-max-width); margin: auto;">

                <h1 class="entry-title">Option Catalog</h1>

                <?php 
                            
                query_posts( array(
                    'posts_per_page' => -1,
                    'post_type'      => 'options', 
                    'post__not_in' => ['822'],
                    'orderby' => array(
                        'name' => 'ASC',
                    ),
                ) );

                echo '<div class="gv-card-container" style="margin-bottom: 20px;">';

                while ( have_posts() ) { the_post();

                    $image_id = get_field('preview_image');
                    $image_url = wp_get_attachment_image_src( $image_id, 'thumbnail' );

                    echo '<a href="'.get_the_permalink().'" class="gv-card-item" style="margin-bottom: 20px; min-height: 300px;">';
                        echo '<div class="gv-card-item-image" style="background: center / cover no-repeat url('.$image_url[0].')"></div>';
                        echo '<div class="gv-card-item-stack">';
                            echo '<h2 style="font-size: calc(1rem + .2vw);">'.get_the_title().'</h2>';
                            echo '<p>'.get_field('category_description').'</p>';
                            echo '<div class="gv-button-one">View All</div>';
                        echo '</div>';
                    echo '</a>';

                }

                echo '</div>';

                wp_reset_query();

                ?>

            </div>

            <div style="margin: 50px auto; padding: 250px 30px 300px; text-align: center; background-image: linear-gradient(to bottom right, var(--bright-color), var(--accent-color-2)); box-shadow: inset 0 0 15px rgba(0,0,0,.5); position: relative; position: relative; outline: 1px solid black;">
                <h2 style="display: inline-block; color: white;"><span class="deco-underline">Make a statement with Designer Features.</span></h2>
                <p style="color: white; margin: 0 auto; padding: 10px 30px 40px;">Pick the perfect extra touch, curated by our designers to make your home feel like a masterpiece.</p>
                <a href="/options/designer-features/" class="gv-button-one gv-light-button">Get Inspired</a>
            </div>

            <div class="option-packages">
                <div class="option-packages-description">
                    <h2>Option Packages</h2>
                    <p style="font-size: 18pt;">Want some guidance? Our expert designers have assembled a variety of packages to fit every style and budget. Giving your home personality can be as effortless or detailed as you want - the choice is entirely yours.</p>
                </div>
                <div class="option-packages-container">
                    <?php 

                    echo '<a href="/packages/" class="option-package-tile">';
                        echo '<div>';
                            echo '<img src="'.get_template_directory_uri().'/svg/tab_tag.svg" alt="" />';
                            echo '<h3>View All</h3>';
                            echo '<p>Here is some text to describe the packages available to you.</p>';
                        echo '</div>';
                    echo '</a>';
                                
                    query_posts( array(
                        'posts_per_page' => 3,
                        'post_type'      => 'packages', 
                        'orderby' => array(
                            'name' => 'ASC',
                        ),
                        'meta_query' => array(
                            array(
                                'key' => 'available_as',
                                'value' => 1
                            )
                        )
                    ) );

                    while ( have_posts() ) { the_post();

                        $product_lines = get_field('product_line');

                        echo '<a href="'.get_the_permalink().'" class="option-package-tile">';
                            echo '<div>';
                                echo '<img src="'.get_template_directory_uri().'/svg/tab_tag.svg" alt="" />';
                                echo '<h3>';
                                foreach ($product_lines as $line_name) {
                                    echo $line_name['label'];
                                }
                                echo '</h3>';
                                echo '<p>Here is some text to describe the packages available to you.</p>';
                            echo '</div>';
                        echo '</a>';

                    }

                    wp_reset_query();

                    ?>
                </div>
            </div>

            <div style="margin: auto; max-width: var(--narrow-max-width); position: relative;">
                <img src="/wp-content/uploads/2020/03/indoor_palm_200w.jpg" style="display: block; margin: 150px auto 0px;" alt="" />
            </div>

		</main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();