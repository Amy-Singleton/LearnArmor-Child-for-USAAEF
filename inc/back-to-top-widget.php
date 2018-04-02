<?php
/*
Plugin Name: HavaWebsite Back to Top Button
Plugin URI: http://themes.havawebsite.com/havawebsite-back-to-top-widget
Description: This awesome plugin adds a Back to Top Scroll Button to the Sidebar
Version: 2.0
Author: Amy Singleton
Author URI: http://havawebsite.com/
Text Domain: havawebsite
License: GPL2

Copyright 2016  HavaWebsite
 
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.
 
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/

 
class HavaWebsiteScroll_Widget extends WP_Widget {
 
    public function __construct() {
     
        parent::__construct(
            'havawebsite_widget',
            __( 'Back to Top Button', 'havawebsite'),
            array(
                'classname'   => 'havawebsitescroll_widget',
                'description' => __( 'Provide a better user experience on long web pages with a scroll to top button.', 'havawebsite')
                )
        );
       
        load_plugin_textdomain( 'havawebsite', false, basename( dirname( __FILE__ ) ) . '/languages' );
       
    }
 
    /**  
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {    
    ?>    
        <a href="#" class="back-to-top">
            <span class="glyphicon glyphicon-circle-arrow-up"></span>
        </a>


    <?php
    //jQuery Script Smooth Scroll
    wp_enqueue_script( 'havawebsite-jquery-script-smooth-scroll', get_template_directory_uri() . '/js/smoothscroll.js', '20160201', true );
    //jQuery Script Scroll Top
    wp_enqueue_script( 'havawebsite-jquery-script-scroll-top', get_template_directory_uri() . '/js/scroll-top.js', '20160201', true );
  
    }
  
    /**
      * Back-end widget form.
      *
      * @see WP_Widget::form()
      *
      * @param array $instance Previously saved values from database.
      */
    public function form( $instance ) {?>
    <p><span class="glyphicon glyphicon-circle-arrow-up"></span>
    Back to Top Button
    </p>
    <?php
    //Back to Top Back End Styles
    wp_enqueue_style( 'havawebsite-scroll-style', get_template_directory_uri() . '/css/back-to-top-back-end-styles.css', '20160201', true );
    }
     
}
 
/* Register the widget */
add_action( 'widgets_init', function(){ 
     register_widget( 'havawebsitescroll_widget' );
});

?>