<?php
/**
 * learnarmor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package learnarmor
 */

if ( ! function_exists( 'learnarmor_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function learnarmor_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on learnarmor, use a find and replace
		 * to change 'learnarmor' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'learnarmor', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in two location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'learnarmor' ),
                        'footer' => esc_html__( 'Footer', 'learnarmor' ),
                        'login' => esc_html__( 'Login', 'learnarmor')
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
		add_theme_support( 'custom-background', apply_filters( 'learnarmor_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
                // Add theme support for excerpt.
		add_post_type_support( 'page', 'excerpt' );
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
add_action( 'after_setup_theme', 'learnarmor_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function learnarmor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'learnarmor_content_width', 640 );
}
add_action( 'after_setup_theme', 'learnarmor_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function learnarmor_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'learnarmor' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'learnarmor' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        //Learndash sSidebar Widget Area
        register_sidebar(
                array (
                    'name' => __( 'LearnDash Widgets', 'learnarmor-child' ),
                    'id' => 'ld-sidebar',
                    'description' => __( 'Custom LearnDash Sidebar', 'learnarmor-child' ),
                    'before_widget' => '<section id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
        );
        //Footer Sidebar Widget Area
	register_sidebar( array(
		'name' => __('Footer Widgets','learnarmor'),
		'id' => 'footer-sidebar',
		'description' => 'The footer widget area appears at the bottom of the website. It is designed to use four widgets.',
		'before_widget' => '<aside id="%1$s" class="col-sm-3 widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'learnarmor_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function learnarmor_scripts() {
        // Bootstrap Styles
	wp_enqueue_style( 'learnarmor-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css', '20172410');
	// Theme Styles
        wp_enqueue_style( 'learnarmor-style', get_stylesheet_uri(), array( 'learnarmor-bootstrap-style' ), wp_get_theme()->get('Version'));
        //Google Fonts Open Sans
	wp_enqueue_style( 'learnarmor-google-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,800,300,600,300italic,400italic,600italic,800italic' );
	//Google Font Martel
	wp_enqueue_style( 'learnarmor-martel-google-fonts', 'https://fonts.googleapis.com/css?family=Martel:400,300,600,700,800' );
	//jQuery Script 1.11.3
	//wp_enqueue_script( 'learnarmor-jquery-script', get_template_directory_uri() . '/js/jquery-1.11.3.js', array(), '20151210', true );
	//wp_enqueue_script( 'learnarmor-jquery-script', get_template_directory_uri() . '/js/jquery-1.11.3.min.js', array(), '20151210', true );
	//Bootstrap Script
	wp_enqueue_script( 'learnarmor-bootstrap-script', get_template_directory_uri() . '/js/bootstrap.js', array(), '20170928', true );
	wp_enqueue_script( 'learnarmor-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20170928', true );
        wp_enqueue_script( 'learnarmor-animated-header', get_template_directory_uri() . '/js/animated-header.js', array(), '20170928', true );
	wp_enqueue_script( 'learnarmor-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170928', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'learnarmor_scripts' );

// Register Custom Navigation Walker
function load_parent_walker(){
	require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'load_parent_walker' );
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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
/**
 * Back to Top Widget
 */
require get_template_directory() . '/inc/back-to-top-widget.php';
/**
 * Breadcrumbs 
 */
include get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Customize WordPress Login
 */
require get_template_directory() . '/inc/custom-login.php';

/**
 * Custom Pagination
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Excerpt Length
 * @link https://developer.wordpress.org/reference/functions/the_excerpt/
 *
 * Filter the except length to 70 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function learnarmor_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'learnarmor_custom_excerpt_length', 999 );

function learnarmor_add_class_to_excerpt( $excerpt ){
		return '<div class="excerpt">'.$excerpt.'</div>';
}
add_filter('the_excerpt','learnarmor_add_class_to_excerpt');
/**
 * Customize Archive Pages
 * @link https://premium.wpmudev.org/blog/add-custom-post-types-to-tags-and-categories-in-wordpress/
 *
 */

//function learnarmor_add_custom_types_to_tax( $query ) {
//if (( is_tag() || is_category() ) && $query->is_main_query() && empty( $query->query_vars[‘suppress_filters’] )) {
//
//    // Get all your post types
//    $post_types = get_post_types();
//    
//    $query->set( 'post_type', $post_types );
//    return $query;
//    }
//}
//add_filter( 'pre_get_posts', 'learnaromor_add_custom_types_to_tax' );

//function learnarmor_search_filter($query) {
//	//With Courses
//	if ($query->is_search) {
//		$query->set('post_type', array('post', 'sfwd-courses', 'page'));
//	}
//	return $query;
//}
// 
//add_filter('pre_get_posts','learnarmor_search_filter');
/**
 * Modify the Serach Form Results if not on an Admin page.
 */
function learnarmor_search_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_search) {
      $query->set('post_type', array( 'post','sfwd-courses' ) );
    }
  }
}

add_action('pre_get_posts','learnarmor_search_filter'); 

/**
 * Add the Serach Form to the Primary Menu
 * @link https://bavotasan.com/2011/adding-a-search-bar-to-the-nav-menu-in-wordpress
 */
add_filter( 'wp_nav_menu_items','learnarmor_add_search_box', 10, 2 );
function learnarmor_add_search_box( $items, $args ) {
    //If the menu is Primary add the search form
    if ( 'login' == $args->theme_location ) {
        $items .= '<li class="menu-form-search" tabindex="0"><div id="header-search" class="collapse" tabindex="0">' . get_search_form( false )  . '</div></li>';
        $items.= '<li id="menu-item-search"  data-toggle="collapse" data-target="#header-search" tabindex="0">'. '<span class="search-icon hide-search"></span></li>';
    }
    return $items;
}

/**
 * Make the Menu Responsive by Changing the #header-menus class when the screen is less than @768px wide
 *
 * Make Header Shrink on Page Scroll
 * https://journalxtra.com/wordpress/quicksnips/make-wordpress-theme-headers-shrink-on-scroll/
 * 
**/
add_action ('wp_footer','learnarmor_custom_head',1);
function learnarmor_custom_head() {
?>
 
<script>
jQuery(document).ready(function($) {
	$('.menu-form-search').on('focus', function(){
		$('#header-search').addClass('collapse in');
		$('#header-search').css('display', 'block');
	});
	$('.search-field').on('submit blur', function(){
		$('#header-search').removeClass('in');
		$('#header-search').css('display', 'none');
	});
	$('.products').find('a').on('focus blur', function(){
		$('this').parents('ul','li').attr('tabindex', '0');
	});
	if ($(window).width() <= 800) {
			
			$('#header-menus').removeClass('in');
			$('#header-menus').addClass('collapse');
			$('#header-top-menu > ul > li').addClass('col-sm-3');
		}
		else{
			$('#header-menus').removeClass('collapse');
			$('#header-top-menu > ul > li').removeClass('col-sm-3');		    
		}
	$(window).on('resize', function(){
		if ($(window).width() <= 800) {
			
			$('#header-menus').removeClass('in');
			$('#header-menus').addClass('collapse');
			//$('#menu-registration-and-login > ul > li').removeClass('col-sm-3');
		}
		else{
			$('#header-menus').removeClass('collapse');
			$('#header-top-menu > ul > li').removeClass('col-sm-3');	
		}
	});
	$(window).scroll(function () {
		if ($(window).scrollTop() > 75 && $(window).width() > 1024) { 
			$('#masthead').addClass('shrink');
			$('.navbar-brand').addClass('shrink');
			$('.custom-logo').addClass('shrink');
			$('#header-top-menu').addClass('shrink');
			$('#header-menu-primary').addClass('shrink');
			$('#menu-registration-and-login').addClass('shrink');
			$('#menu-primary').addClass('shrink');
		}
		else{
			$('#masthead').removeClass('shrink');
			$('.navbar-brand').removeClass('shrink');
			$('.custom-logo').removeClass('shrink');
			$('#header-top-menu').removeClass('shrink');
			$('#header-menu-primary').removeClass('shrink');
			$('#menu-registration-and-login').removeClass('shrink');
			$('#menu-primary').removeClass('shrink');		
		}
	});
});
</script><?php 
}
if ( is_plugin_active( 'sfwd-lms/sfwd_lms.php' ) ) { 
	/**
	 * Hide Menu Items and Romove Toolbar Nodes from Group Leaders
	 */
	add_action('admin_menu', 'learnarmor_hide_pages_from_group_leader', 999);
	function learnarmor_hide_pages_from_group_leader() {
		if( !current_user_can('administrator') && current_user_can('group_leader') || current_user_can('subscriber') || current_user_can('Participant')) { 
			remove_menu_page( 'edit-comments.php' );                                        //Comments
			remove_menu_page( 'jetpack' );                                        		//JetPack
			remove_menu_page( 'index.php' );                                        	//Dashboard
			remove_menu_page( 'options-general.php' );                                      //Settings
			remove_menu_page( 'ipt_fsqm_dashboard' );                                       //eForm
			remove_menu_page( 'gf_edit_forms' );	                                        //Gravity Form
			remove_menu_page( 'edit.php' );                                                 //Posts
			remove_menu_page( 'upload.php' );                                               //Media
			remove_menu_page( 'edit.php?post_type=page' );                                  //Pages
			remove_menu_page( 'tools.php' );                                                //Tools
			remove_menu_page( 'users.php' );                                                //Users
			remove_submenu_page( 'learndash-lms', 'edit.php?post_type=sfwd-courses' );
			remove_submenu_page( 'learndash-lms', 'edit.php?post_type=sfwd-lessons' );
			remove_submenu_page( 'learndash-lms', 'edit.php?post_type=sfwd-topic' );
			remove_submenu_page( 'learndash-lms', 'edit.php?post_type=sfwd-quiz' );
			remove_submenu_page( 'learndash-lms', 'edit.php?post_type=sfwd-assignment' );
			remove_submenu_page( 'learndash-lms', 'edit.php?post_type=sfwd-certificates' );
			remove_submenu_page( 'learndash-lms', 'edit.php?post_type=groups' );
			remove_submenu_page( 'learndash-lms', 'edit.php?post_type=sfwd-essays' );
			
			if (class_exists( 'Jetpack' ) && current_user_can('group_leader') ) {
			    remove_menu_page( 'jetpack' );                                                  //Jetpack Dashboard
			    remove_menu_page( 'edit.php?post_type=jetpack-testimonial' );                   //Jetpack Testimonials
			}
			if ( is_plugin_active( 'tin-canny-learndash-reporting/tin-canny-learndash-reporting.php' ) ) {
			    remove_menu_page( 'uncanny-learnDash-reporting');               		//UnCanny LearnDash Reporting
			}
		}
	}
}
function learnarmor_remove_dashboard_widgets() {
    	global $wp_meta_boxes;
	// wp..
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	// eForms
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
	// jetpack
	unset($wp_meta_boxes['dashboard']['normal']['core']['jetpack_summary_widget']);
	// bbpress
	unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);
	// yoast seo
	unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);
	// gravity forms
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
 
}
if( !current_user_can('administrator') && current_user_can('group_leader') || current_user_can('subscriber') || current_user_can('Participant')) {
    add_action('wp_dashboard_setup', 'learnarmor_remove_dashboard_widgets', 11 );
}
//Remove unessary toolbar nodes
add_action( 'admin_bar_menu', 'learnarmor_remove_toolbar_nodes', 999 );
function learnarmor_remove_toolbar_nodes( $wp_admin_bar ) {
    
	$wp_admin_bar->remove_node( 'comments' );
	if ( is_plugin_active( 'wordpress-seo-premium/wordpress-seo-premium.php' ) ) {
		$wp_admin_bar->remove_node( 'wpseo-menu' );
	}
	//$wp_admin_bar->remove_node( 'stats' );
}
if ( is_plugin_active( 'revslider/revslider.php' ) ) {
        add_action( 'wp_before_admin_bar_render', 'learnarmor_remove_revslider_from_admin_bar_menu', 999 );
	function learnarmor_remove_revslider_from_admin_bar_menu( $wp_admin_bar ) {
		global $wp_admin_bar;
		$wp_admin_bar->remove_node( 'revslider' );
	}
}
/* Add a link to featured images */
add_filter( 'post_thumbnail_html', 'link_post_image_html', 10, 3 );
function link_post_image_html( $html, $post_id, $post_image_id ) {

  $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
  return $html;
}


/* Detect WPBakery plugin. For use in Admin area only. */
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
	//plugin is activated
	//Remove WPBakery Edit Page Links
	add_action( 'vc_after_init', 'learnarmor_vc_remove_frontend_links' );
	function learnarmor_vc_remove_frontend_links() {
		vc_disable_frontend(); // this will disable frontend editor
	}
}

/* Detect WPBakery plugin. For use in Frontend only. */
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
	//plugin is activated
	//Remove WPBakery WordPress Top Bar 
	add_action( 'vc_after_init', 'learnarmor_vc_remove_wp_admin_bar_button' );
	function learnarmor_vc_remove_wp_admin_bar_button() {
		remove_action( 'admin_bar_menu', array( vc_frontend_editor(), 'adminBarEditLink' ), 1000 );
	}
}


?>