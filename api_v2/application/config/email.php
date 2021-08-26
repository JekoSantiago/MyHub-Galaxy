<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => '10.13.188.121',
    'smtp_port' => 25,
    'smtp_user' => '',
    'smtp_pass' => '',
    // 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '60',  
    'charset' => 'iso-8859-1'
    // 'wordwrap' => TRUE
		);


    $config1 = array(
      'protocol' => 'smtp', 
      'smtp_host' => 'ssl://smtp.gmail.com', 
      'smtp_port' => 587 , 
      'smtp_user' => '',
      'smtp_pass' => '', 
      'mailtype' => 'html', //plaintext 'text' mails or 'html' 
      'charset' => 'utf-8',
      //'smtp_timeout' => '4',
      'wordwrap' => TRUE
      );
  