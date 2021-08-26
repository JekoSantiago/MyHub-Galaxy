<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mylibrary
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Manila');
    }

	public function passwordEncryptNew($data)
    {
        //user encryption
        $username = $data['user'];
        $password = $data['pass'];
        
        $method = 'aes-256-cbc';
        // Must be exact 32 chars (256 bit)
        $hashed = substr(hash('sha256', $password, true), 0, 32); 
        // IV must be exact 16 chars (128 bit)
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
    	    chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
    		chr(0x0) .chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
    		chr(0x0);  
            
        $e_password =  base64_encode(openssl_encrypt($username, $method, $hashed, OPENSSL_RAW_DATA, $iv));  
        
        $encrypted = array(
            'username' => $data['user'],
            'password' => $e_password 
        );
    
        return $encrypted;
    } 

    public function apiRequestEncrypt($data)
    {
      //user encryption
      $plain_text = $data;
      $key   = API_KEY;
          
      $method = 'aes-256-cbc';
      // Must be exact 32 chars (256 bit)
      $newKey = substr(hash('sha256', $key, true), 0, 32); 
      // IV must be exact 16 chars (128 bit)
      $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
                chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
                chr(0x0) .chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
                chr(0x0);
      
      $encrypted=  base64_encode(openssl_encrypt($plain_text, $method, $newKey, OPENSSL_RAW_DATA, $iv));
      
      return $encrypted;
    } 
      
    public function apiRequestDecrypt($data)
    {
      //user encryption
      $encrypted = $data;
      $key  = API_KEY;
          
      $method = 'aes-256-cbc';
      // Must be exact 32 chars (256 bit)
      $newKey = substr(hash('sha256', $key, true), 0, 32); 
      // IV must be exact 16 chars (128 bit)
      $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
                chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
                chr(0x0) .chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
                chr(0x0);  
          
        // av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
        $decrypted = openssl_decrypt(base64_decode($encrypted), $method, $newKey, OPENSSL_RAW_DATA, $iv);
      
      return $decrypted;
    } 

    public function checkPhoneIMEI()
    {
        $file = fopen('./imei/imei.csv', 'r');
        $encode = array();
        while (($line = fgetcsv($file)) !== FALSE) 
        {
            $encode[] = $line[2];
        }
        
        fclose($file);

        return $encode;
    }

    public function generate_pdf( $tpl, $data)
    {
        $ci = &get_instance();
        $data['data'] = $data;
        $ci->load->view($tpl, $data);
        // Get output html
        $html = $ci->output->get_output();
        // Load pdf library
        $ci->load->library('pdf');
        $ci->dompdf->loadHtml($html);
        // setup size
        $ci->dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $ci->dompdf->render();
        $output = $ci->dompdf->output();
        return $output;
    
    }

    

}


/* End of file Mylibrary.php */
/* Location: ./application/libraries/Mylibrary.php */
/*
 * Author: Igor M. Lucmayon 
 * Created Date: Sept. 19, 2019
 * Updated Date: -----
 *
 */