<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manual extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

    public function index()
	{
        $data['rowAC']       = $this->m_global->getOperationHead(0);
        $data['dcOptions']   = $this->m_global->dcOptions();

        $this->template->set('title', TITLE .' | Manual Receiving');
    	$this->template->load('base_template', 'tpl/manual_receiving', $data);
    }
    
	public function getUnreceivedList()
	{

        $controlNum = ($this->input->post('controlNo') == "") ? "" : $this->input->post('controlNo');
        $dcID       = ($this->input->post('dcID') == "") ? 0 : $this->input->post('dcID');
        $locationID = ($this->input->post('locID') == "") ? 0 : $this->input->post('locID');
        $sdfrom     = ($this->input->post('sdFrom') == "") ? "1900-01-01" : $this->input->post('sdFrom');
        $sdto       = ($this->input->post('sdTo') == "") ? "1900-01-01" : $this->input->post('sdTo');
        $acID       = ($this->input->post('acID') == "") ? 0 : $this->input->post('acID');
        $amID       = ($this->input->post('amID') == "") ? 0 : $this->input->post('amID');
        $isOff      = $this->input->post('isOff');

        $param = array(
            'controlNum' => $controlNum, 
            'dcID'       => $dcID, 
            'locationID' => $locationID, 
            'sdfrom'     => $sdfrom,
            'sdto'       => $sdto,
            'acID'       => $acID,
            'amID'       => $amID,
            'isOff'      => $isOff
        );

        $data = $this->m_manual->getUnreceivedList($param);
        $count = $data->num_rows();
        $encode = array();

        if($count > 0) :
            foreach($data->result() as $items)
            {
               $encode[] = array_map("utf8_encode", (array)$items);
            }
        endif;

        echo $this->mylibrary->viewDetailsJSON_Data($data, $encode);
    }

    public function getStoreOption($dcID)
    {
        $data = $this->m_global->getLocation($dcID);

        $html = '<option></option>';
        foreach($data as $store)
        {
            $html .= '<option value="'. $store->Location_ID .'">'. $store->Location . ' ['. $store->LocationCode . ']</option>';
        }

        echo $html;
    }

    public function receivedDelivery()
    {
        $del_ID  = $this->input->post('data');
        $count   = count($del_ID);
        $success = 0;
        $fail    = 0;
        $num     = 0;

        foreach($del_ID as $d) :

            $result = $this->m_manual->modifyDelivery($d);

            if($result[0]->RETURN = 2) :
                $success = $success + 1;
            else :
                $fail = $fail + 1;
            endif;

        endforeach;
        
        if($count = $success) :
            $num = 1;
            $msg = 'Successfully received '. $count .  ' delivery note(s)!';
        else :
            $num = 0;
            $msg = 'Failed to receive '. $fail . ' deliveries.';
        endif;
        
        $result = json_encode(array('num' => $num, 'msg' => $msg));
        echo $result;
    }

    // public function getAMHeadsOption($acID)
    // {
    //     $data = $this->m_global->getOperationHeadAM($acID);

    //     $html = '<option></option>';
    //     foreach($data as $am)
    //     {
    //         $html .= '<option value="'. $am->AM_ID .'">'. $am->AM . '</option>';
    //     }

    //     echo $html;
    // }

}

/* End of file Contact.php 
 * Location: ./application/controllers/ManualReceiving.php
 * 
 * Author: Jose Lorenzo D. Tambagan
 * Created Date: June 25, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */