<?php

/*
@package sunsettheme

	=============================================
				ADMIN PAGE
	=============================================
	

*/
function sunset_add_admin_page() {

	//Generate Sunset admin page
	add_menu_page( 'Sunset Theme Options', 'Sunset', 'manage_options', 'edcel_sunset', 'sunset_theme_create_page', 'dashicons-admin-users', 100 );
	//Contact Submenu
	add_submenu_page('edcel_sunset', 'Sunset Contact Form', 'Contact Form', 'manage_options', 'edcel_sunset_theme_contact','sunset_contact_form_page');
	/*Activate custom settings*/
	add_action('admin_init', 'sunset_custom_settings');

}
	add_action('admin_menu', 'sunset_add_admin_page');


function sunset_custom_settings() {
	//Theme suppport options
	register_setting('sunset-theme-support', 'post_formats','sunset_post_formats_callback');
	add_settings_section('sunset-theme-options','Theme Options', 'sunset_theme_options','edcel_sunset_theme');
	add_settings_field('post-formats', 'Post Formats', 'sunset_post_formats', 'edcel_sunset_theme','sunset-theme-options');
	//Contact form support
	register_setting( 'sunset-contact-options', 'activate_contact' );
	add_settings_section('sunset-contact-section', 'Contact Form', 'sunset_contact_section','edcel_sunset_theme_contact');
	add_settings_field('activate-form', 'Activate Contact Form', 'sunset_activate_contact','edcel_sunset_theme_contact', 'sunset-contact-section');
}
	//post formats callback function 
	function sunset_post_formats_callback( $input ){
		return $input;
	}
	/*For contact form*/
	function sunset_theme_options(){
		echo "Activate and deactive the built in contact form";
	}
	function sunset_contact_section(){
		echo "Activate and deactive specific Theme Support options";
	}
	function sunset_activate_contact(){
		$options = get_option('activate_contact');
		$checked = ( @options == 1 ? 'checked' : '' );
		echo '<labe><input type="checkbox" id="custom_header" name="activate_contact" value ="1" '.$checked.' /></label>';
	}

	function sunset_post_formats(){
		$options = get_option('post_formats');
		$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video','audio', 'chat');
		$output = '';
		foreach( $formats as $format){
			$checked = ( @$options[$format] == 1 ? 'checked' : '' );
			$output.= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value = "1" '.$checked.' />'.$format.'</label><br>';
		}
		echo $output;//this can be return $output
	}
	//Template submenu functions
	function sunset_contact_form_page() {//Contact
		//generation of our admin page
		require_once(get_template_directory().'/inc/templates/sunset-contact-form.php');
	}
	function sunset_theme_create_page() {
		//generation of our admin page
		require_once(get_template_directory().'/inc/templates/sunset-admin.php');

	}