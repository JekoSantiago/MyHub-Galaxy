<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }
    
	public function index()
	{
        $dateFrom  = date('Y-m-d', strtotime('-7 days'));
        $dateTo    = date('Y-m-d');

        if($this->input->post('btnFilterSearch') == 'search') :
            $dateFrom  = ($this->input->post('dateFrom') == "") ? date('Y-m-d') : $this->input->post('dateFrom');
            $dateTo    = ($this->input->post('dateTo') == "") ? date('Y-m-d') : $this->input->post('dateTo');
        else :
            $dateFrom  = date('Y-m-d', strtotime('-7 days'));
            $dateTo    = date('Y-m-d');
        endif;
        // var_dump(date('Y-m-d', strtotime('-7 days'))); exit;

        // $dateFrom = "2020-02-21";
        // $dateTo   = "2020-02-25";

        $data['store']     = $this->m_monitoring->getMonitoring($dateFrom, $dateTo, 1);
        $data['container'] = $this->m_monitoring->getMonitoring($dateFrom, $dateTo, 2 );

        $this->template->set('title', TITLE .' | Monitoring Page');
    	$this->template->load('base_template', 'tpl/monitoring', $data);
    }

    public function getActivity()
    {
        $data = $this->m_monitoring->getActivities();
        $count = $data->num_rows();
        $encode = array();

        if($count > 0) :
            foreach($data->result() as $items)
            {
               $encode[] = array_map("utf8_encode", (array)$items);
            }
        endif;

        echo $this->mylibrary->buildJSONTable($data, $encode);
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