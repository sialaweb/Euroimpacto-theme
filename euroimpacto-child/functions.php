<?php
/* ADD custom theme functions here  */


function scrits_forms() {
	wp_enqueue_script( 'script-forms', get_template_directory_uri() . '/js/forms.js', array(), '1.0.1', true );
}

add_action( 'wp_enqueue_scripts', 'scrits_forms' );

add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('euroimpacto-child', get_template_directory() . '/languages');
}
