<?php
if ( function_exists('register_sidebar') )
    register_sidebar();
    
    add_theme_support( 'post-thumbnails' );
    
    
    //load extra-editor-styles.css in tinymce
add_editor_style('editor-style.css');
add_filter('tiny_mce_before_init', 'myCustomTinyMCE' );
/* Custom CSS styles on TinyMCE Editor */
if ( ! function_exists( 'myCustomTinyMCE' ) ) {
	function myCustomTinyMCE($init) {
		$init['theme_advanced_styles'] = 'intro=intro';
	return $init;
	}
}

// hook failed login
add_action('wp_login_failed', 'my_front_end_login_fail'); 
 
function my_front_end_login_fail($username){
    // Get the reffering page, where did the post submission come from?
    $referrer = $_SERVER['HTTP_REFERER'];
 
    // if there's a valid referrer, and it's not the default log-in screen
    if(!empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin')){
        // let's append some information (login=failed) to the URL for the theme to use
        wp_redirect($referrer . 'membership/membership-form/'); 
    exit;
    }
}

?>