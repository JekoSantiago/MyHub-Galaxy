<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }
    
	public function index()
	{
        $this->template->set('title', TITLE .' | Contact Page');
    	$this->template->load('base_template', 'tpl/contact');
	}
}

/* End of file Contact.php 
 * Location: ./application/controllers/Contact.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 17, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */