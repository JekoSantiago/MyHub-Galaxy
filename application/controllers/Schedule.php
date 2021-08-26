<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller 
{
    public $locID = null;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->locID = $this->mylibrary->decrypted($this->session->userdata('Location_ID'));
    }
    
	public function index()
	{
        $data['calendarData'] = $this->m_schedule->viewCalendar($this->locID);

        $this->template->set('title', TITLE .' | Schedule Page' );
    	$this->template->load('base_template', 'tpl/schedule/index', $data);
    }
    
    public function manage()
    {
        $data['schedules'] = $this->m_schedule->getSchedules($this->locID);
        $data['location'] = $this->m_global->getLocation($this->locID);
        $data['deliveryType'] = $this->m_schedule->getDeliveryType();
        $data['dcOption'] = $this->m_global->dcOptions();
        $data['dcID'] = $this->locID;

        $this->template->set('title', TITLE .' | Schedule Page' );
    	$this->template->load('base_template', 'tpl/schedule/manage', $data);
    }

    public function save()
    {
        $sched_Date = $this->input->post('scheduleDate');
        $dc_ID      = $this->input->post('dc_ID');
        $loc_ID     = $this->input->post('location_ID');
        $dt_ID      = $this->input->post('deliveryType');

        $result = $this->m_schedule->insertSchedule($sched_Date, $loc_ID, $dc_ID, $dt_ID);
        $res = $result[0]->RETURN;

        if($res > 0) :
            $num = 1;
            $msg = 'Schedule successfully save.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;
        
        echo json_encode(array('num'=>$num, 'message'=>$msg));

    }

    public function edit()
    {
        $sID = base64_decode($this->uri->segment(3));
        $data['info'] = $this->m_schedule->scheduleDetails($sID);
        $data['location'] = $this->m_global->getLocation($this->locID);
        $data['deliveryType'] = $this->m_schedule->getDeliveryType();
        $data['dcOption'] = $this->m_global->dcOptions();

        $this->load->view('tpl/schedule/modals/edit', $data);
    }

    public function update()
    {
        $sched_Date = $this->input->post('editScheduleDate');
        $loc_ID     = $this->input->post('editLocationID');
        $dt_ID      = $this->input->post('editDTID');
        $sched_ID   = $this->input->post('sched_ID');

        $result = $this->m_schedule->updateSchedule($sched_ID, $sched_Date, $loc_ID, $dt_ID);
        $res = $result[0]->RETURN;

        if($res > 0) :
            $num = 1;
            $msg = 'Schedule successfully update.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;
        
        echo json_encode(array('num'=>$num, 'message'=>$msg));
    }

    public function modify()
    {
        $dt_ID      = $this->input->post('id');
        $sched_ID   = $this->input->post('schedID');

        $result = $this->m_schedule->updateSchedule($sched_ID, '', 0, $dt_ID);
        $res = $result[0]->RETURN;

        if($res > 0) :
            $num = 1;
            $msg = 'Schedule successfully update.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;
        
        echo json_encode(array('num'=>$num, 'message'=>$msg));
    }

    public function view()
    {
        $sched_Date = $this->uri->segment(3);
        $data['del_Date'] = date('M j, Y', strtotime($sched_Date));
        $data['sched_Date'] = $sched_Date;
        $data['details'] = $this->m_schedule->calendarSchedulesList($sched_Date, $this->locID);
        $data['deliveryType'] = $this->m_schedule->getDeliveryType();
        
        $this->load->view('tpl/schedule/modals/calendar_details', $data);
    }
}

/* End of file Schedule.php 
 * Location: ./application/controllers/Schedule.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */