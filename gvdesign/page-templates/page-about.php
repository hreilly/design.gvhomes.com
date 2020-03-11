<?php
// Template Name: About
/**
 * The template for displaying the about page
 *
 * @package gvdesign
 */

get_header();
?>

<style>
    #team-overview {
        margin: auto;
        margin-bottom: 100px;
    }
    #team-overview h2 {
        text-align: center;
    }
    .team {
        display: flex;
        flex-wrap: wrap;
        margin: auto;
        justify-content: space-around;
        max-width: var(--mid-max-width);
    }
    .team-card {
        display: flex;
        flex-wrap: wrap;
        position: relative;
        width: 100%;
        min-height: 470px;
        padding: 50px;
        justify-content: space-around;
        outline: var(--thin-border);
        margin: 10px;
        box-shadow: var(--element-shadow);
    }
    .team-card::after {
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
    .team-image {
        display: inline-block;
        position: relative;
    }
    .team-image::after {
        position: absolute;
        content: "";
        top: 20px;
        left: 20px;
        width: 99%;
        height: 98%;
        max-height: 450px;
        max-width: 300px;
        outline: 5px solid var(--bright-color);
    }
    .team-image img {
        min-width: 300px;
        margin-right: 25px;
        margin-bottom: 25px;
    }
    .team-info {
        padding: 15px 50px;
        max-width: 550px;
        min-width: 400px;
        width: 100%;
    }
</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <picture>
                <source media="(max-width: 1024px)" srcset="/wp-content/uploads/2020/02/design_swatch_column_1600x600.jpg">
                <img src="/wp-content/uploads/2020/02/design_swatch_grid_1600x600.jpg" alt="" style="display: block; width:100%;">
            </picture>

            <div id="about-overview" class="split-page-container">

                <div class="split-page" style="background: 
                                                    url('/wp-content/uploads/2020/01/canvas_background_1_1024x1024.jpg')
                                                    bottom center
                                                    no-repeat; 
                                                    padding: 0; z-index: 100;">
                    <h1><?php the_title(); ?></h1>
                </div><!-- .split-page left -->
                <div class="split-page" style="background-color: var(--accent-color-2); z-index: 1; overflow-x: hidden;">
                    <h2 style="margin: 0 -60px 50px 0;">From foundation to finish.</h2>
                    <p>Aenean vestibulum magna sed augue posuere bibendum. Suspendisse posuere arcu tellus, et malesuada turpis pretium eget. Vestibulum gravida velit et mattis fermentum. Aliquam erat volutpat. Pellentesque venenatis dapibus enim, in iaculis nibh ullamcorper ut.</p>
                    <p>Integer tortor est, congue vel hendrerit eu, sodales nec libero. Maecenas lacus quam, faucibus a elit vitae, pharetra euismod augue. Praesent eget lectus ut ipsum consectetur porta nec eget lacus. Etiam a vestibulum lectus. Morbi et erat vitae ex ultricies elementum.</p>
                </div><!-- .split-page right -->
            
            </div><!-- #about-overview -->
            <div id="video-overview" class="split-page-container">

                <div class="split-page flex-column" style="background-color: var(--bright-color); z-index: 100;">
					<div style="position: relative; margin: auto; padding: 50px; color: white; font-family: var(--accent-font); font-size: calc(1.2rem + .8vw);">"The ultimate luxury is being able to relax and enjoy your home."</div>
					<div style="font-size: calc(.7rem + .8vw); font-style: italic; align-self: flex-end; color: white; font-weight: 300;">- Jeff Lincoln, American Designer</div>
				</div><!-- .split-page left -->
                <div class="split-page" style="background: 
                                                    url('<?php echo get_template_directory_uri(); ?>/svg/abstract_bg_2.svg')
                                                    bottom center / cover
                                                    no-repeat; 
                                                    padding: 0px; z-index: 1;">
                    <?php echo do_shortcode( '[lazyVideo dataid="387550813" type="vimeo"]' ); ?>
                    <div class="split-page-caption">
                        <p><strong>WATCH:</strong> Get a preview of your design experience.</p>
                    </div>
                </div><!-- .split-page right -->
            
            </div><!-- #video-overview -->
            <div id="team-overview">
                <div style="margin: 100px auto 50px; max-width: 600px; max-height: 600px; height: 600px; background: 
                                                    url('/wp-content/uploads/2020/01/meeting_table_1_600x600.jpg')
                                                    center center / cover
                                                    no-repeat; padding: 0px;">

                    <h2 style="text-align: center; margin: auto; padding-top: 280px;"><span class="deco-underline">Meet Your Team</span></h2>
                </div>

                <?php if( have_rows('design_team') ): ?>

                <div class="team">

                    <?php while( have_rows('design_team') ): the_row(); 

                    // vars
                    $image = get_sub_field('team_member_photo');
                    $name  = get_sub_field('team_member_name');
                    $title = get_sub_field('team_member_title');
                    $email = get_sub_field('team_member_email');
                    $phone = get_sub_field('team_member_direct_line');
                    $quote = get_sub_field('team_member_quote');
                    $usera = get_sub_field('team_member_user_account');

                    $nameClean = $name;
                    $nameClean = str_replace(' ', '', $nameClean);

                    ?>

                    <div class="team-card" id="<?php echo $nameClean; ?>">
                        
                        <div class="team-image">
                            <?php if ( $image ) : ?>
                            <img src="<?php echo $image; ?>" alt="" />
                            <?php else : ?>
                            <img src="/wp-content/uploads/2020/01/chair_combo_1_300x450.jpg" alt="" style="outline: var(--thin-border);" />
                            <?php endif; ?>
                        </div>

                        <div class="team-info">
                            <?php
                            $expr = '/(?<=\s|^)[a-z]/i';
                            preg_match_all($expr, $name, $matches);
                            $initials = implode('', $matches[0]);
                            $initials = strtoupper($initials);
                            ?>
                            <style>
                                #<?php echo $nameClean; ?>.team-card::after {
                                    content: '<?php echo $initials; ?>';
                                }
                            </style>
                            <h3 class="deco-underline-2">
                                <?php echo $name; ?>
                            </h3>
                            <h4>
                                <?php echo $title; ?>
                            </h4>
                            <p>E: <?php echo $email; ?><br>P: <?php echo $phone; ?></p>
                            <h5>Favorite Design Quote:</h5>
                            <p style="font-style: italic;">
                                <?php echo $quote; ?>
                            </p>
                        </div>

                    </div>

                    <?php endwhile; ?>

                </div><!-- .team -->

                <?php endif; ?>

                <div style="margin: auto; max-width: var(--narrow-max-width);">
                    <img src="/wp-content/uploads/2020/01/snake_plant_200x300.jpg" style="display: block; margin: 50px auto -180px;" alt="" />
                </div>

            </div><!-- #team-overview -->
            <div id="gvhomes-overview" class="split-page-container">

                <div class="split-page" style="background-color: #445b66; z-index: 100;">
                    <h2 style=" margin: 0 0px 50px -60px; padding-left: 60px; overflow-x: hidden;">Why Granville Homes?</h2>
                    <p>Aliquam non mi lacinia, ornare massa vitae, pretium mauris. Nam egestas ullamcorper neque pulvinar ultrices. Duis semper tincidunt vulputate. Aliquam at finibus orci, eu mollis orci. Nunc eget tempor odio. Fusce dapibus arcu vitae lacus vulputate interdum.</p>
                    <p>Quisque pellentesque malesuada sapien non elementum. Pellentesque sed est rutrum, ornare quam vel, ullamcorper nisl. Sed erat magna, sodales eget semper at, eleifend eget ex. Aenean rutrum eros nec imperdiet suscipit. Cras eleifend ipsum ut imperdiet pretium.</p>
                    <a href="https://www.gvhomes.com/" class="gv-button-one gv-button-one-large" style="margin: 50px 0px;">GVHomes.com</a>
                </div><!-- .split-page left -->
                <div class="split-page" style="background: 
                                                    url('<?php echo get_template_directory_uri(); ?>/svg/abstract_bg_3.svg')
                                                    top center / cover
                                                    no-repeat; 
                                                    padding: 0px; z-index: 1;">
                    <?php echo do_shortcode( '[lazyVideo dataid="386320835" type="vimeo"]' ); ?>
                    <div class="split-page-caption">
                        <p><strong>WATCH:</strong> Become part of the Granville family.</p>
                    </div>
                </div><!-- .split-page right -->
            
            </div><!-- #gvhomes-overview -->

		</main><!-- #main -->
    </div><!-- #primary -->
    
    <div style="margin: auto; max-width: var(--narrow-max-width); position: relative;">
        <img src="/wp-content/uploads/2020/01/perfect_pillows_300x150.jpg" style="display: block; margin: 150px auto -150px;" alt="" />
    </div>

    <?php echo do_shortcode( '[imageFeed type="random"]' ); ?>

<?php
get_footer();