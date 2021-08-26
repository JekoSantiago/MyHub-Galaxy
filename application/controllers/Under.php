<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Under extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }
    
    public function index()
    { 
        $this->load->view('tpl/under/index');
    }
}

/* End of file Under.php 
 * Location: ./application/controllers/Under.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Dec. 1, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */
