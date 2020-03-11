<?php

//////////////////////////////////////////////////////////////////
// Image Feed
//////////////////////////////////////////////////////////////////

// Last touch - 01/14/2020 - Hannah Reilly

function image_feed( $atts ) {
	
	// Attributes - Defaults to 'newest'
	$a = shortcode_atts( array(
		'type' 	   => 'newest',
	), $atts );

	// Begin content

	$content = '<section id="image-feed">';
	if ( esc_attr($a['type']) == 'newest' ) {
		$content .= '<h2><span class="deco-underline" style="background-color: white; padding-left: 10px; outline: 1px solid white;">Get Inspired:</span><span class="deco-underline-2" style="background-color: white; padding-right: 10px; outline: 1px solid white;"> Newest Photos</span></h2>';
	}
	if ( esc_attr($a['type']) == 'random' ) {
		$content .= '<h2><span class="deco-underline" style="background-color: white; padding-left: 10px; outline: 1px solid white;">Explore:</span><span class="deco-underline-2" style="background-color: white; padding-right: 10px; outline: 1px solid white;"> Photos from the Archive</span></h2>';
	}
        $content .= '<div class="flex-row-wrap" style="justify-content: space-between; margin: auto; max-width: 1920px;">';
	
		if ( esc_attr($a['type']) == 'newest' ) {

			$imageArgs = array(
				'posts_per_page'  => 6,
				'post_type'       => 'attachment', 
				'post_status'     => 'inherit', 
				'meta_query'      => array(
					array (
						'key'      => 'office_only',
						'value'    => 1,
						'compare'  => '!=',
					),
				)
			);

			$images = get_posts( $imageArgs );
			
            foreach ( $images as $key=>$image ) {
				$image_id = $image->ID;
				$image_name = get_the_title($image_id);
                $image_link = get_the_permalink($image_id);

                $content .= '<a href="' . $image_link . '" class="image-tile-link feed-image" aria-label="View Image: ' . $image_name . '">' . wp_get_attachment_image( $image_id ) . '</a>';

            }

		}

		if ( esc_attr($a['type']) == 'random' ) {

			$imageArgsRand = array(
				'orderby'         => 'rand',
				'posts_per_page'  => 6,
				'post_type'       => 'attachment', 
				'post_status'     => 'inherit', 
				'meta_query'      => array(
					array (
						'key'      => 'office_only',
						'value'    => 1,
						'compare'  => '!=',
					),
				)
			);

			$images = get_posts ( $imageArgsRand );
			
            foreach ( $images as $key=>$image ) {
				$image_id = $image->ID;
				$image_name = get_the_title($image_id);
                $image_link = get_the_permalink($image_id);

                $content .= '<a href="' . $image_link . '" class="image-tile-link feed-image" aria-label="View Image: ' . $image_name . '">' . wp_get_attachment_image( $image_id ) . '</a>';

            }

		}

        $content .= '</div>';
    $content .= '</section><!-- #image-feed -->';

	return $content;

}

add_shortcode( 'imageFeed', 'image_feed' );

//////////////////////////////////////////////////////////////////
// Video Lazy Embed
//////////////////////////////////////////////////////////////////

// Last touch - 01/16/2020 - Hannah Reilly

function getVimeoThumb($id) {

	// Get the JSON response from Vimeo
	$arr_vimeo = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php"));

	// Parse the JSON response
	$vimeo_video_width = $arr_vimeo[0]['width'];
	$vimeo_thumbnail_large = $arr_vimeo[0]['thumbnail_large'];

	// Check and update image size
	if( $vimeo_video_width < 1280 ) {
		$vimeo_thumbnail = $vimeo_thumbnail_large;
	} else {
		$vimeo_thumbnail = str_replace('_640.jpg', '_1280.jpg', $vimeo_thumbnail_large);
	}
	return $vimeo_thumbnail;
}

function lazy_video_shortcode( $atts = [] ) {
	
	wp_enqueue_style( 'lazy-video-style', get_template_directory_uri() . '/css/lazy-video.css' );
	wp_enqueue_script( 'lazy-video-script', get_template_directory_uri() . '/js/lazy-video.js' );

	// Attributes - Defaults to 'youtube'
	$a = shortcode_atts( array(
		'type' 	   => '',
		'dataid'  => '',
	), $atts );
	
	// Begin content
	if ( esc_attr($a['type']) == 'youtube' ) {
		// Video wrapper
		$content = '<div class="lazy-video" data-type="youtube" data-embed="' . esc_attr( $a['dataid'] ) . '">';
			// Play button
			$content .= '<div class="lazy-play-button"></div>';
		$content .= '</div>';
	} else if ( esc_attr($a['type']) == 'vimeo' ) {

		$thumbnail = getVimeoThumb( esc_attr( $a['dataid'] ) );

		$content = '<div class="lazy-video" data-type="vimeo" data-embed="' . esc_attr( $a['dataid'] ) . '">';
			$content .= '<div class="lazy-play-button"></div>';
			$content .= '<img src="' . $thumbnail . '" alt=""/>';
		$content .= '</div>';
	} else {
		$content = '<p>Please enter a valid type attribute in the shortcode ( currently supports type="vimeo" or type="youtube").</p>';
	}

	return $content;
}

add_shortcode( 'lazyVideo', 'lazy_video_shortcode' );

?>