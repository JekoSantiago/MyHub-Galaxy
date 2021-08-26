<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends CI_Controller 
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
        $data['locationOption'] = $this->m_global->getLocation($this->locID);
        $data['dcOption']       = $this->m_global->dcOptions();
        $data['dcID']           = $this->mylibrary->decrypted($this->session->userdata('Location_ID'));
    
		$this->template->set('title', TITLE .' | Delivery Page' );
    	$this->template->load('base_template', 'tpl/form/delivery_form', $data);
    }

    public function details()
    {
        $del_ID = base64_decode($this->uri->segment(3));
        $encode = array();
        $items = $this->m_global->getJSONDeliveryDetails_View($del_ID);
        

        // echo ('ETOBAYON');
        if($items->num_rows() > 0) :
                
            foreach($items->result() as $row) :
                $row->Loaded   = ($row->Loaded == null) ? '' : date('Y-m-d H:i A', strtotime($row->Loaded));
                $row->Unloaded = ($row->Unloaded == null) ? '' : date('Y-m-d H:i A', strtotime($row->Unloaded));
                $encode[] = array_map("utf8_encode", (array)$row);

            endforeach;

        endif;
        
        echo $this->mylibrary->viewDetailsJSON_Data($items, $encode);
    }
    
    /**
     * Saving delivery info 
     */
    public function create()
    {
        $data = array(
            'shipTo'       => $this->input->post('location_ID'),
            'numContainer' => $this->input->post('totalNumContainer'),
            'controlNum'   => $this->input->post('controlNum'),
            'remarks'      => $this->input->post('remarks')
        );

        $result = $this->m_delivery->saveDelivery($data);

        $res = $result[0]->RETURN;
        
        if($res > 0) :
            $num    = 1;
            $del_ID = base64_encode($res); 
        else :
            $num    = $res;
            $del_ID = 0;
        endif;

        $msg = $this->mylibrary->errorMessages($num);
        
        echo json_encode(array('num'=>$res, 'message'=>$msg, 'del_ID'=>$del_ID));
    }

    /**
     * Saving the scanned barcode as delivery items
     */
    public function saveDeliveryItems()
    {
        $data = array(
            'cType'   => $this->input->post('c'),
            'barCode' => $this->input->post('b'),
            'delID'   => base64_decode($this->input->post('d')),
            'qty'     => $this->input->post('q')
        );

        $result = $this->m_delivery->insertDeliveryItem($data);
        $res = $result[0]->RETURN;
        $row = $this->m_global->viewDetails($data['delID']);
        $count = $row->LoadCount;

        if($res > 0) :
            $num = 1;
            $msg = 'Delivery successfully created.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);

        endif;

        echo json_encode(array('num'=>$num, 'message'=>$msg, 'loadCount'=>$count));
    }

    /**
     * Count scanned barcode
     */
    public function countScanCode()
    {
        $id = base64_decode($this->input->post('id'));
        $res = $this->m_global->countDeliveryDetails($id);
        
        echo json_encode(array('total'=> $res[0]->Total, 'loc_Code' => $res[0]->LocationCode));
    }

    /**
     * Load quantity form
     */
    public function quantity()
    {
        $this->load->view('tpl/modals/qty_form');
    }

    /**
     * Load quantity form
     */
    public function container()
    {
        $data['containers'] = $this->m_global->getContainerType();

        $this->load->view('tpl/modals/container_form', $data);
    }

    /**
     * Get Location ID
     */
    public function getLocationID()
    {
        $locCode = $this->input->post('code');
        $result = $this->m_global->getLocationID($locCode);

        echo json_encode($result);
    }

    /**
     * Insert invalid barcode
     */
    public function invalidBarcode()
    {
        $data = array(
            'cType'   => $this->input->post('c'),
            'barCode' => $this->input->post('b'),
            'delID'   => base64_decode($this->input->post('d')),
            'qty'     => $this->input->post('q')
        );

        $result = $this->m_global->insertInvalidBarcode($data);
        $res = $result[0]->RETURN;
        $row = $this->m_global->viewDetails($data['delID']);
        $count = $row->LoadCount;

        if($res > 0) :
            $num = 1;
        else :
            $num = $res;
        endif;

        echo json_encode(array('num'=>$num, 'loadCount'=>$count));
    }

    /**
     * Update delivery form
     */
    public function edit()
    {
        $del_ID = base64_decode($this->uri->segment(3));
        $info = $this->m_global->viewDetails($del_ID);
        $data['location'] = $this->m_global->getLocation($info->DC_ID);
        $data['dcOption'] = $this->m_global->dcOptions();
        $data['trucks']   = $this->m_global->getTruck();
        $data['drivers']  = $this->m_global->getDrivers($info->DC_ID);
        $data['info']     = $info;
        $data['item']     = $this->defaultProgressBar($info->Deliver_ID, $info->TotalContainer);

        $this->template->set('title', TITLE .' | Delivery Page' );
        $this->template->load('base_template', 'tpl/form/edit_delivery_form', $data);
    }

    /**
     * Default progress bar
     */
    public function defaultProgressBar($del_ID, $totalNum)
    {
        $row = $this->m_global->viewDetails($del_ID);
        $count = $row->LoadCount;
        $loadCount = ($count == null) ? 0 : intval($count);

        $bar = ($loadCount / intval($totalNum)) * 100;
        $count_text = $loadCount .'/'. intval($totalNum);
        $result = array('bar'=>$bar, 'ctext'=>$count_text);
        
        return $result;
    }

    public function update()
    {
        $remarks = $this->input->post('remarks');
        $totcon  = $this->input->post('totalNumContainer');
        $delnote  = $this->input->post('controlNum');
        $del_ID  = base64_decode($this->input->post('createdDeliveryID'));

        $result = $this->m_delivery->updateDelivery($del_ID, $delnote, $totcon, $remarks);
        $res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Successfully updated delivery information.';
        else :
            $num = $res;
            $msg = 'Failed to update delivery details. Try again';
        endif;

        echo json_encode(array('num'=>$res, 'message'=>$msg));
    }

    public function checkCode()
    {
        $code   = $this->input->post('bc');
        $qty    = $this->input->post('q');
        $del_ID = base64_decode($this->input->post('d'));
        $result = $this->m_delivery->checkBarcodeQty($code, $qty, $del_ID);
        $res = $result[0]->RETURN;

        echo json_encode($res);
    }

    public function updateDetStatus()
    {
        $del_ID  = base64_decode($this->input->post('d'));
        $barcode  = $this->input->post('b');
        $qty  = $this->input->post('q');
        $status = 1;

        $result = $this->m_delivery->updateDeliverDetStatus($del_ID, $barcode, $qty, $status);
        $res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Successfully updated deliver detail status.';
        else :
            $num = $res;
            $msg = 'Failed to update deliver detail status. Try again';
        endif;

        echo json_encode(array('num'=>$num, 'message'=>$msg));
    }

    public function pdfEmail()
    {   
        
        $del = 30308;

       
            $tarazone = $this->m_delivery->getTaraZone($del);
            $taracolor = $this->m_delivery->getTaraColor($del);
            $taracont = $this->m_delivery->getTaraCont($del);
            $data['zone'] = json_decode(json_encode($tarazone), true);
            $data['color'] = json_decode(json_encode($taracolor), true);
            $data['sign'] = $this->m_delivery->getTaraSign($del);
            $data['conts'] = json_decode(json_encode($taracont), true);
            $filename = $tarazone['0']->LocationCode . ' - ' . $tarazone['0']->ControlNo . '.pdf';
            $output = $this->mylibrary->download_pdf("tpl/pdf-email/taradet.php", $data,$filename);

    }
}

/* End of file Delivery.php 
 * Location: ./application/controllers/Delivery.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */