<?php
// Template Name: Blog Overview
/**
 * The template for displaying the Blog Overview Page
 *
 * @package gvdesign
 */

get_header();
?>

<style>
    #crossfade-blog-header {
        position: relative;
        height: auto;
        margin: auto;
        max-width: 100%;
        padding-top: 84.6667%;
    }

    #crossfade-blog-header img {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        animation-name: img3FadeInOut;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        /* (a+b)*n */
        animation-duration: 18s;
    }

    @keyframes img3FadeInOut {
        0% {
            opacity:1;
        }
        /* a/t*100 */
        33.33% {
            opacity:1;
        }
        /* (a+b)/t*100 */
        38.89% {
            opacity:0;
        }
        /* 100-((b/t)*100) */
        94.44% {
            opacity:0;
        }
        100% {
            opacity:1;
        }
    }

    #crossfade-blog-header img:nth-of-type(1) {
        animation-delay: 12s;
    }
    #crossfade-blog-header img:nth-of-type(2) {
        animation-delay: 6s;
    }
    #crossfade-blog-header img:nth-of-type(3) {
        animation-delay: 0s;
    }
    
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: 2fr 2fr 2fr 1fr;
        grid-gap: 20px;
        margin: 20px;
    }
    .blog-grid>.blog-sidebar {
        grid-column: 3;
        grid-row: 1 / 4;
        background-image: linear-gradient(to bottom right, var(--accent-color-2-half-op), var(--bright-color-half-op));
        border-radius: 5px;
    }
    .blog-grid>.page-numbers {
        grid-column: 1 / 4;
        grid-row: 4 / 5;
    }
    .blog-grid>.blog-grid-item {
        background-color: white;
        box-shadow: var(--element-shadow);
        border-radius: 5px;
        text-decoration: none;
        color: black;
        opacity: 1;
        transition: .1s ease;
    }
    .blog-grid>.blog-grid-item:hover {
        color: var(--bright-color);
    }
    .blog-grid-item h2 {
        margin: 0;
        padding: 20px 20px 0px;
        font-size: 1rem;
        text-decoration: underline;
    }
    .blog-grid-item p {
        padding: 20px;
        margin: 0;
        font-size: .8rem;
    }
    .blog-grid-item div {
        width: 100%; 
        height: 70px; 
        background: center center / cover no-repeat;
        opacity: 1;
        transition: .1s ease;
    }
    .blog-grid>.blog-grid-item:hover div {
        opacity: .8;
    }
    @media screen and (max-width: 820px) {
        .blog-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .blog-grid>.blog-sidebar {
            grid-column: 1 / 3;
            grid-row: 5 / 6;
        }
        .blog-grid>.page-numbers {
            grid-column: 1 / 3;
        }
    }

</style>

	<div id="primary" class="content-area" style="max-width: var(--mid-max-width); margin: 20px auto auto;">
		<main id="main" class="site-main" style="margin: auto;">

            <?php if ( $paged < 2 ) : ?>
                <div style="max-width: var(--narrow-max-width); margin: auto;">
                    <div id="crossfade-blog-header">
                        <img src="/wp-content/uploads/2020/02/blog_headers_760x635-02.jpg" alt="">
                        <img src="/wp-content/uploads/2020/02/blog_headers_760x635-03.jpg" alt="">
                        <img src="/wp-content/uploads/2020/02/blog_headers_760x635-01.jpg" alt="">
                    </div>
                </div>

                <div style="max-width: var(--narrow-max-width); margin: 30px auto 60px; text-align: center; padding: 20px;">
                    <h1>The GV Design Blog</h1>
                    <p>Donec et purus leo. Nulla et facilisis sem. In hac habitasse platea dictumst. Mauris lacinia eros mi, vel porttitor ligula rhoncus in. Integer urna odio, aliquet sed augue in, congue imperdiet purus. Curabitur et consequat enim, sed finibus est.</p>
                </div>

            <?php endif; ?>

            <div class="blog-grid">

                <?php if( have_posts() ): ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <a href="<?php the_permalink(); ?>" class="blog-grid-item">
                            <div style="background-image: url(<?php the_post_thumbnail_url('thumbnail'); ?>)"></div>

                            <h2><?php the_title(); ?></h2>

                            <p style="text-decoration: none;"><?php 
                            $thedesc = get_the_excerpt();
                            $getlength = strlen($thedesc);
                            $thelength = 80;
                            $truncdesc = rtrim(substr($thedesc, 0, $thelength)); 
                            echo $truncdesc;
                            if ($getlength > $thelength) echo "..."; ?></p>
                        </a>

                    <?php endwhile; ?>

                <?php endif; ?>

                <?php wp_reset_query();	?>

                <?php gv_pagination(); ?>

                <div class="blog-sidebar">
                    <div style="padding: 20px; margin: 20px; border-radius: 5px; background: white; box-shadow: var(--element-shadow);">Sidebar</div>
                </div>

            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php echo do_shortcode( '[imageFeed type="random"]' ); ?>

<?php
get_footer();