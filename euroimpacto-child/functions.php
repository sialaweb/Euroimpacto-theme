<?php
/* ADD custom theme functions here  */


function scrits_forms() {
	wp_enqueue_script( 'script-forms', get_template_directory_uri() . '/js/forms.js', array(), '1.0.1', true );
}

add_action( 'wp_enqueue_scripts', 'scrits_forms' );
