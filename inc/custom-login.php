<?php 
/**
 * WordPress Custom Login Logo
 */
 
function custom_login_logo() {
  if ( has_custom_logo() ) :
 
        $image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
        ?>
        <style type="text/css">
            .login h1 a {
                background-image: url(<?php echo esc_url( $image[0] ); ?>);
                -webkit-background-size: <?php echo absint( $image[1] )?>px;
                background-size: <?php echo absint( $image[1] ) ?>px;
                height: <?php echo absint( $image[2] ) ?>px;
                width: <?php echo absint( $image[1] ) ?>px;
            }
        </style>
        <?php
    endif;
}
add_action( 'login_head', 'custom_login_logo' );

    // custom login url
    function custom_login_url(){
    return esc_url(home_url()); // website url
    }
add_filter('login_headerurl', 'custom_login_url');

function learnarmor_custom_title_on_logo() {
	return 'Powered by the LearnArmor Theme';
}
add_filter('login_headertitle', 'learnarmor_custom_title_on_logo');

/**
 * WordPress Custom Login Styles
 */
 
function learnarmor_custom_login_style() {
        echo '<style type="text/css">
        .login #login_error, .login .message {
                border-left: 4px solid #1c3a54;
        }
        .login form .input {
            background: #eeeeee;
            color: #1c3a54!important;
        }
        .login form .input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: #1c3a54!important;
        }
        .login form .input::-moz-placeholder { /* Firefox 19+ */
            color: #1c3a54!important;
        }
        .login form .input:-ms-input-placeholder { /* IE 10+ */
            color: #1c3a54!important;
        }
        .login form .input:-moz-placeholder { /* Firefox 18- */
                    color: #1c3a54!important;
        }
        .login form .forgetmenot input[type="checkbox"] {
             opacity: 1;
        }
        .wp-core-ui .button-primary {
             text-shadow: none;
        }
        #login form p.submit input {
             background-color: #1c3a54 !important;
        }

         </style>';
}
add_action( 'login_head', 'learnarmor_custom_login_style' );
?>