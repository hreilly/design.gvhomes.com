<?php
/**
 * gvdesign functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gvdesign
 */

if ( ! function_exists( 'gvdesign_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gvdesign_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gvdesign, use a find and replace
		 * to change 'gvdesign' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gvdesign', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'mini-thumb', 150, 150, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'gvdesign' ),
			'menu-2' => esc_html__( 'Footer', 'gvdesign' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'gvdesign_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'gvdesign_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gvdesign_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'gvdesign_content_width', 640 );
}
add_action( 'after_setup_theme', 'gvdesign_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gvdesign_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gvdesign' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gvdesign' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gvdesign_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gvdesign_scripts() {
	wp_enqueue_style( 'gvdesign-style', get_stylesheet_uri() );

	wp_enqueue_script( 'gvdesign-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'gvdesign-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gvdesign_scripts' );

/**
 * Call function to include Featherlight.
 */
function featherlight_scripts() {
	wp_enqueue_style( 'featherlight-style', get_template_directory_uri() . '/css/featherlight.min.css', array(), true);

	wp_enqueue_script( 'featherlight-script', get_template_directory_uri() . '/js/featherlight.min.js', array(), true );

}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Shortcodes to include modular content.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Taxonomies contained in one place.
 */
require get_template_directory() . '/inc/taxonomies.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add tags to attachment pages
 */
function wptp_add_tags_to_attachments() {
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );
}
add_action( 'init' , 'wptp_add_tags_to_attachments' );

/**
 * Add numbered pagination function
 */
if ( !function_exists( 'gv_pagination' ) ) {
	
	function gv_pagination() {
		
		$prev_arrow = is_rtl() ? '→' : '←';
		$next_arrow = is_rtl() ? '←' : '→';
		
		global $wp_query, $the_query;
		if ( $the_query ) {
			$total = $the_query->max_num_pages;
		} else {
			$total = $wp_query->max_num_pages;
		}
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
}

/**
 * Alter main query on category pages
 */
function category_attachment_query( $query ) {
	if ( $query->is_category() && $query->is_main_query() ) {
		$cat_id = get_query_var('cat');
		$query->set( 'posts_per_page', 15 );
		$query->set( 'post_type', 'attachment' );
		$query->set( 'post_status', 'inherit' );
		$query->set( 'cat', array( $cat_id ) );
		$query->set( 'meta_query', array(
            array(
				'key'     => 'office_only',
				'compare' => '!=',
                'value'   => 1,
            )
        ) );
    }
}
add_action( 'pre_get_posts', 'category_attachment_query' );

/**
 * Alter main query on tag pages
 */
function tag_attachment_query( $query ) {
	if ( $query->is_tag() && $query->is_main_query() ) {
		$tag_id = get_queried_object()->term_id;
		$query->set( 'posts_per_page', 15 );
		$query->set( 'post_type', 'attachment' );
		$query->set( 'post_status', 'inherit' );
		$query->set( 'tag', array( $tag_id ) );
		$query->set( 'meta_query', array(
            array(
				'key'     => 'office_only',
				'compare' => '!=',
                'value'   => 1,
            )
        ) );
    }
}
add_action( 'pre_get_posts', 'tag_attachment_query' );

/**
 * Alter main query on tag pages
 */
function term_attachment_query( $query ) {
	if ( $query->is_tax() && $query->is_main_query() ) {
		$term_id = get_queried_object()->term_id;
		$query->set( 'posts_per_page', 15 );
		$query->set( 'post_type', 'attachment' );
		$query->set( 'post_status', 'inherit' );
		$query->set( 'term', array( $term_id ) );
		$query->set( 'meta_query', array(
            array(
				'key'     => 'office_only',
				'compare' => '!=',
                'value'   => 1,
            )
        ) );
    }
}
add_action( 'pre_get_posts', 'term_attachment_query' );

/**
 * Alter main query on Blog
 */
function blog_archive_query( $query ) {
	if ( $query->is_post_type_archive( 'blog' ) && $query->is_main_query() ) {
		$query->set( 'posts_per_page', 6 );
	}
}
add_action( 'pre_get_posts', 'blog_archive_query' );

/**
 * Allow pagination in queries on single plan
 */
add_action( 'template_redirect', function() {
    if ( is_singular( 'plan' ) ) {
        global $wp_query;
        $page = ( int ) $wp_query->get( 'page' );
        if ( $page > 1 ) {
            $wp_query->set( 'page', 1 );
            $wp_query->set( 'paged', $page );
        }
        remove_action( 'template_redirect', 'redirect_canonical' );
    }
}, 0 );

/**
 * Remove p tags from category description
 */
remove_filter('term_description','wpautop');

/**
 * SVG Support
 */
function my_custom_mime_types( $mimes ) {
 
	// New allowed mime types.
	$mimes['svg'] = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	 
	// Optional. Remove a mime type.
	unset( $mimes['exe'] );
	 
	return $mimes;
	}
add_filter( 'upload_mimes', 'my_custom_mime_types' );

/**
 * Templates and Page IDs without editor
 *
 */
function ea_disable_editor( $id = false ) {

	$excluded_templates = array(
		'options',
	);

	$excluded_ids = array(
		'78', '186', '184',
	);

	if( empty( $id ) )
		return false;

	$id = intval( $id );
	$template = get_page_template_slug( $id );

	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

/**
 * Disable Gutenberg by template
 *
 */
function ea_disable_gutenberg( $can_edit, $post_type ) {

	if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
		return $can_edit;

	if( ea_disable_editor( $_GET['post'] ) )
		$can_edit = false;

	return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );

/**
 * Disable Classic Editor by template
 *
 */
function ea_disable_classic_editor() {

	$screen = get_current_screen();
	if( 'page' !== $screen->id || ! isset( $_GET['post']) )
		return;

	if( ea_disable_editor( $_GET['post'] ) ) {
		remove_post_type_support( 'page', 'editor' );
	}

}
add_action( 'admin_head', 'ea_disable_classic_editor' );

/**
 * Register additional settings page
 *
 */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Color Settings',
		'menu_title'	=> 'Color',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Disclaimer Settings',
		'menu_title'	=> 'Disclaimer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

/**
 * Disable standard posts in menu
 *
 */
function post_remove () { 
   remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');

/**
 * Disable default load of block css
 *
 */
function remove_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
} 
add_action( 'wp_enqueue_scripts', 'remove_block_library_css' );