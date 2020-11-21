<?php 

class Theme_Contact {

    private $email = 'edcelestadola.dbmanila@gmail.com';
    

    public function __construct() {
        add_action( 'wp_ajax_sunset_save_user_contact_form', array( $this, 'sunset_save_contact' ) ); 
        add_action( 'wp_ajax_nopriv_sunset_save_user_contact_form',array( $this, 'sunset_save_contact' )  );
    }
    
    public function sunset_save_contact() {
        if( ! empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            
            $fullname = wp_strip_all_tags($_POST["fullname"]);
            $phone_number = wp_strip_all_tags($_POST["phonenumber"]);
            $email = wp_strip_all_tags($_POST["email"]);
            $message = wp_strip_all_tags($_POST["message"]);
            $group_mails = array('edcel.estadola.dev@gmail.com');

            $response['status'] = 'success';

            $to = $group_mails;
            $inquiry = 'Multi Restaurant';
            $headers[] = 'From: '.get_bloginfo('name').' <'.$to.'>'; // 'From: Edcel'
            $headers[] = 'Bcc: edcelestadola.dbmanila@gmail.com';
            $headers = array('Content-Type: text/html; charset=UTF-8');

            $message = "
                <strong>From:</strong> $fullname<br>
                <strong>Contact Number:</strong> $phone_number<br>
                <strong>Email:</strong> $email <br>
                <strong>Message Body:</strong> <br> $message <br>
            ";
             
            wp_mail($to, $inquiry, $message, $headers);
            
            echo json_encode( $response );
            die();

        }
    }
}


$theme_contact = new Theme_Contact();