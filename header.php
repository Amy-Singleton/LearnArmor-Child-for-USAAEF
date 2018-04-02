<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package learnarmor-child
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'learnarmor-child' ); ?></a>
<header id="masthead" class="site-header">
	<nav class="navbar navbar-default" role="navigation">
		<div>
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header-menus">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <div class="navbar-brand">
			      <?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
			  </div>
		  </div>
		  <script>
jQuery(document).ready(function($) {
    $(window).scroll(function () {
        if ($(window).width() > 768) { 
            $('#header-menus').addClass('collapse');
        }
        else{
            $('#header-menus').addClass('in');
        }
    });
});
</script>
		  <div id="header-menus" class="">
	      	      <?php
			  wp_nav_menu( array(
			      'menu'              => 'login',
			      'theme_location'    => 'login',
			      'depth'             => 1,
			      'container'         => 'div',
			      'container_id'      => 'header-top-menu',
			      'menu_class'        => 'nav navbar-nav',
			      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			      'walker'            => new WP_Bootstrap_Navwalker())
			  );
		      ?>
		      <?php
			  wp_nav_menu( array(
			      'menu'              => 'primary',
			      'theme_location'    => 'primary',
			      'depth'             => 2,
			      'container'         => 'div',
			      'container_id'      => 'header-menu-primary',
			      'menu_class'        => 'nav navbar-nav',
			      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			      'walker'            => new WP_Bootstrap_Navwalker())
			  );
		      ?>
		  </div>
		</div>
	      </nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	

	<div id="content" class="site-content">

