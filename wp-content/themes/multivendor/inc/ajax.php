<?php 
/*
@package sunsettheme
	
	===========================
		AJAX FUNCTION 
	===========================
*/
add_action( 'wp_ajax_nopriv_sunset_save_user_contact_form', 'sunset_save_contact' );
add_action( 'wp_ajax_sunset_save_user_contact_form', 'sunset_save_contact' ); 
function sunset_save_contact(){
	$fullname = wp_strip_all_tags($_POST["fullname"]);
	$phonenumber = wp_strip_all_tags($_POST["phonenumber"]);
	$email = wp_strip_all_tags($_POST["email"]);
	$message = wp_strip_all_tags($_POST["message"]);
	
	$args = array(
		'post_title' => $fullname,
		'post_content' => $message,
		'post_author' => 1,
		'post_status' => 'publish',
		'post_type' => 'sunset-contact',
		'meta_input' => array(
			'_contact_email_value_key' => $email
		)
	);
	$postID = wp_insert_post( $args );
	 if ($postID !== 0) {
        $to = 'edcelestadola.dbmanila@gmail.com';
        $subject = 'Seafront Corporation';
        $headers[] = 'From: '.get_bloginfo('name').' <'.$to.'>'; // 'From: Edcel'
 		$headers[] = 'Bcc: edcelestadola.dbmanila@gmail.com';
		$headers = array('Content-Type: text/html; charset=UTF-8');
                        $message = "
                            Name: $fullname<br>
                            Email: $email <br>
                            Contact: $phonenumber <br>
                            Message: $message <br>
                        ";
		 
	
		 
        wp_mail($to, $subject, $message, $headers);
    }
    echo $postID;
    die();
}