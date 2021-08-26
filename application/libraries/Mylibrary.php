<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mylibrary
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Manila');
    }

    public function buildJSONTable($r, $encode)
    {
        $this->CI =& get_instance();
        $draw     = $this->CI->input->post('draw');
        $start    = $this->CI->input->post('start');
        $length   =  $this->CI->input->post('length');
        $pageSize = ($length != null ? $length :0);
        $skip     = ($start != null ? $start : 0);   
        $recordsTotal = $r->num_rows(); 
        $data = array_slice($encode, $skip, $pageSize);
    
        return '{"draw":"'.$draw.'","recordsFiltered":'.$recordsTotal.',"recordsTotal":'.$recordsTotal.',"data":'.json_encode($data).'}';  
    }

    public function viewDetailsJSON_Data($r, $encode)
    {
        $this->CI =& get_instance();
        $draw     = $this->CI->input->post('draw');
        $recordsTotal = $r->num_rows(); 
        $data = $encode;
    
        return '{"draw":"'.$draw.'","recordsFiltered":'.$recordsTotal.',"recordsTotal":'.$recordsTotal.',"data":'.json_encode($data).'}';  
    }

    public function errorMessages($return)
    {
        $error = array(
             1  => 'Delivery successfully created.',
            -2  => 'Delivery ID does not exist.',
            -4  => 'User ID does not exist.',
            -5  => 'User ID does not exist.',
            -11 => 'Invalid location.',
            -12 => 'Invalid Truck.',
            -13 => 'Invalid Driver.',
            -14 => 'Invalid container count.',
            -15 => 'Invalid user.',
            -16 => 'The store that you selected already has a delivery list.',
            -17 => 'Failed to insert delivery data. ',
            -18 => 'Invalid deliver ID.',
            -19 => 'Invalid container ID.',
            -20 => 'Invalid barcode',
            -21 => 'Barcode already exists.',
            -22 => 'Failed to insert delivery details.',
            -23 => 'Invalid delivery detail ID.',
            -24 => 'Invalid delivery detail status ID.',
            -25 => 'Delivery note already used.',
            -30 => 'Store delivery is already loaded in the selected truck.',
            -31 => 'You cannot assign driver at the same truck at the same ship date. Select another driver.',
            -32 => 'Truck is already on transit.',
            -33 => 'You cannot assign driver to a different truck when it is already assigned.',
            -34 => 'Color name already exist!',
            -35 => 'Container type already exist!',
            -36 => 'Container already exist!',
            -37 => 'Operator already exist!',
            -38 => 'Truck plate no. already exist!',
            -39 => 'License number already exist!',
            -40 => 'Driver name already exist!',
            -41 => 'The barcode you scan was offloaded by warehouse due to truck delivery capacity. Please expect this on your next delivery.',
            -42 => 'Schedule already exist!',
            -43 => 'There are no containers that needs to be loaded!',
            -1000 => 'Barcode already scanned!',
            -1001 => 'Total container is not equal to total scanned. Kindly check your delivery list before assigning a truck.',
            100 => 'Invalid username or password, or you dont have access to this application.',
            101 => 'User information not complete!'            
        );

        return $error[$return];
    }

    public function encrypt($data)
    {
        //user encryption
        $plain_text = $data;
        $password = 'atp_dev';
            
        $method = 'aes-256-cbc';
        // Must be exact 32 chars (256 bit)
        $$password = substr(hash('sha256', $password, true), 0, 32); 
        // IV must be exact 16 chars (128 bit)
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
		      chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
		      chr(0x0) .chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
		      chr(0x0);
    
        $encrypted=  base64_encode(openssl_encrypt($plain_text, $method, $password, OPENSSL_RAW_DATA, $iv));
    
        return $encrypted;
    } 

    public function decrypted($data)
    {
        //user encryption
        $encrypted = $data;
        $password  = 'atp_dev';
        $method    = 'aes-256-cbc';

        // Must be exact 32 chars (256 bit)
        $$password = substr(hash('sha256', $password, true), 0, 32); 
        // IV must be exact 16 chars (128 bit)
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
              chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
              chr(0x0) .chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
              chr(0x0);  
        
        // av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
        $decrypted = openssl_decrypt(base64_decode($encrypted), $method, $password, OPENSSL_RAW_DATA, $iv);
        
        return $decrypted;
    }

    public function passwordEncrypt($data)
    {
        //user encryption
        $username = $data['username'];
        $password = $data['password'];
        
        $method = 'aes-256-cbc';
        // Must be exact 32 chars (256 bit)
        $$password = substr(hash('sha256', $password, true), 0, 32); 
        // IV must be exact 16 chars (128 bit)
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
              chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
              chr(0x0) .chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
              chr(0x0);  
            
        // av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
        $e_password =  base64_encode(openssl_encrypt($username, $method, $password, OPENSSL_RAW_DATA, $iv));  
        $encrypted = array(
            'username' => $data['username'],
            'password' => $e_password 
        );
    
        return $encrypted;
    } 
    
    public function passwordEncryptNew($data)
    {
        //user encryption
        $username = $data['username'];
        $password = $data['password'];
        
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
            'username' => $data['username'],
            'password' => $e_password 
        );
    
        return $encrypted;
    } 

    public function formatDate($date)
    {/*
        $d = preg_replace('/\s\s+/', ' ', $date);
        $cdate = explode(' ', $d);
        $newDate = $cdate[0].' '.$cdate[1].', '.$cdate[2]; */

        return date('Y-m-d', strtotime($date));
    }

    public function generate_pdf($tpl, $data)
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

    public function download_pdf($tpl, $data, $name)
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
        $ci->dompdf->stream($name, array("Attachment" => true));

        return $output;
    
    }
}

/* End of file Mylibrary.php 
 * Location: ./application/libraries/Mylibrary.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */