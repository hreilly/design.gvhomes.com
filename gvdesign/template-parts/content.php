<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gvdesign
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php gvdesign_post_thumbnail(); ?>

	<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; 
		?>

		<h4 class="byline"><?php the_author(); ?><span style="font-weight: bold; color: var(--bright-color);"> &nbsp;|&nbsp; </span><?php echo get_the_date(); ?></h4>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gvdesign' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gvdesign' ),
			'after'  => '</div>',
		) );
		?>

	<?php
		
		$args = array(
			'prev_text'          => '&#9664;&#xFE0E; &nbsp;Prev.',
			'next_text'          => 'Next&nbsp; &#9654;&#xFE0E;',
			'screen_reader_text' => 'Post navigation'
		);
		
	the_post_navigation($args); ?>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php echo do_shortcode( '[imageFeed type="random"]' ); ?>
