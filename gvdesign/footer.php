<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gvdesign
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" style="background-color: white;">
		<div class="rooms-footer" style="background-image: linear-gradient(to right, var(--bright-color), var(--accent-color-2)); border-bottom: 1px solid black;">
			<div style="max-width: var(--extra-wide-max-width); margin: auto; padding: 15px 30px;">
			<p style="color: white; text-decoration: none; font-size: 14px; display: inline-block; margin: 0; padding: 0;">Categories:</p>
				<?php 
					$args = array(
						'hide_empty'=> 0,
						'orderby'    => 'include',
						'include'    => array( 8,5,4,57,6,13,43,7 )
					);
					$categories = get_categories($args);
					
					foreach ($categories as $cat) {
						
						$id = $cat->term_id;

						echo '<a href="/category/'.$cat->slug.'" style="color: white; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 0;">';
							echo '&nbsp; '.$cat->name.'&nbsp&nbsp;&#9653;';
						echo '</a>';
					}
				?>
				<a href="/plans/" style="color: white; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 0;">
					&nbsp;By Plan
				</a>
			</div>
		</div>
		<div class="flex-footer">
			<div class="flex-footer-menu">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'footer-menu',
				) );
				?>
			</div>
			<div class="flex-footer-info">
				<div class="site-branding">
					<?php the_custom_logo(); ?>
				</div><!-- .site-branding -->
				<div class="site-legal">
				Contractor License #586845<br>
				RE License #01258537<br>
				</div>
				<div class="site-eho">
					<img src="<?php echo get_template_directory_uri(); ?>/svg/Equal-Opportunity-Logo.svg" alt="Equal Housing Opportunity">
				</div>
				<div class="site-info">
					&copy; Granville Homes, <?php echo date("Y"); ?>
				</div><!-- .site-info -->
			</div>
		</div><!-- .flex-footer -->
		<div class="main-disclaimer disclaimer"><?php the_field('footer_disclaimer', 'option'); ?></div>
		<!--<div style="width: 100%; height: 20px; background-color: var(--bright-color);"></div>-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
