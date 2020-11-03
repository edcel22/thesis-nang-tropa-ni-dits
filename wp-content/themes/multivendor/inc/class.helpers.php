<?php 

class Helper {

    public function verifyCaptcha( $site_key, $secret_key ) {
        $site_key = urlencode($site_key);
        $secret_key = urlencode($secret_key);
        $url      = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $site_key;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_TIMEOUT, 15);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); 
        $response = curl_exec($curl);
 
        curl_close($curl);
        
        $responseKey = json_decode($response, true);

        if ( $responseKey['success'] == 1 ) {
            return $responseKey['success'];
        }
    }

    public function verifyCaptchav1( $site_key, $secret_key ) {
        $ip       = $_SERVER['REMOTE_ADDR'];
        $site_key = urlencode($site_key);
        $secret_key = urlencode($secret_key);
        $url      = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $site_key;

        $response = file_get_contents( $url );

        $responseKey = json_decode($response, true);

        if ( $responseKey['success'] == 1 ) {
            return $responseKey['success'];
        }
    }


}

$helper = new Helper;