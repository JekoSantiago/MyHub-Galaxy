<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receive extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }
    
	public function index()
	{
        $del_ID = base64_decode($this->uri->segment(2));
		$info = $this->m_global->viewDetails($del_ID);
        $data['location'] = $this->m_global->getLocation($info->DC_ID);
        $data['dcOption'] = $this->m_global->dcOptions();
        $data['trucks']   = $this->m_global->getTruck();
        $data['drivers']  = $this->m_global->getDrivers($info->DC_ID);
        $data['info']     = $info;
        $data['ids']      = $this->detailIDs($info->Deliver_ID);
        $data['item']     = $this->countProgressBar($info->Deliver_ID, $info->TotalContainer);
        $this->template->set('title', TITLE .' | Receive Page');
        $this->template->load('base_template', 'tpl/form/receive_form', $data);
    }
    
    /**
     * Display Delivery details Ids as string
     */
    public function detailIDs($del_ID)
    {
        $items = $this->m_global->getJSONDeliveryDetails_View($del_ID);
        $strIDs = '';
        foreach($items->result() as $row) :
            $strIDs .= $row->DeliverDetail_ID.',';
        endforeach;

        return substr($strIDs, 0, -1);
    }

    /**
     * Receive delivery items
     */
    public function receiveDeliveryItems()
    {
        $bCode = $this->input->post('bcode');
        $del_ID = base64_decode($this->input->post('id'));
        $qty    = $this->input->post('q');
        $scanFrom = 'Web';

        $result = $this->m_receive->receiveDeliveryItem($bCode, $del_ID, $qty, $scanFrom);
        $res = $result[0]->RETURN;
        $count = $this->m_receive->countScannedItems($del_ID);
       
        if($res > 0) :
            $num = 1;
            $msg = 'Delivery details successfully unload.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;
        
        echo json_encode(array('num'=>$num, 'message'=>$msg, 'receiveCount' => $count['count'], 'countUL'=>$count['countUL'], 'countOL'=>$count['countOL']));
    }

    /**
     * Progress bar count 
     */
    public function countProgressBar($del_ID, $totalNum)
    {
        $count = $this->m_receive->countScannedItems($del_ID);
        //$receiveCount = ($count == null) ? 0 : intval($count);
        $countNonOffLoad = $this->m_receive->countItemWithOutOffload($del_ID);
        $countOffLoad = $this->m_receive->countItemWithOffload($del_ID);
        $cnt = intval($totalNum) - $countOffLoad;

        $bar = ($count['countUL'] / intval($totalNum)) * 100;
        $count_text = $count['countUL'] .'/'. intval($totalNum);
        $result = array('bar'=>$bar, 'ctext'=>$count_text, 'scanCount'=>$count['count'], 'countUL'=>$count['countUL'], 'countOL'=>$count['countOL']);
        
        return $result;
    }

    /**
     * Check code existense
     */
    public function checkCode()
    {
        $code   = $this->input->post('code');
        $del_ID = base64_decode($this->input->post('d'));
        $result = $this->m_receive->checkBarcode($code, $del_ID);
        $res = $result[0]->RETURN;

        echo json_encode($res);
    }
    
    /**
     * Receive quantity form
     */
    public function quantityForm()
    {
        $this->load->view('tpl/modals/receive_qty');
    }

    /**
     * Receive quantity form
     */
    public function remarksForm()
    {
        $del_ID = $this->input->post('d');
        $dd_ID = $this->input->post('dd');
        $isEmpty = 0;

        $data['info'] = $this->m_receive->getJSONDD_Remarks($del_ID, $dd_ID, $isEmpty)->result();

        $this->load->view('tpl/modals/dd_remarks', $data);
    }

    public function ddRemarks()
    {
        $del_ID = base64_decode($this->uri->segment(3));
        $dd_ID = 0;
        $isEmpty = 1;

        // var_dump($del_ID); exit;

        $encode = array();
        $items = $this->m_receive->getJSONDD_Remarks($del_ID, $dd_ID, $isEmpty);
        
        if($items->num_rows() > 0) :
                
            foreach($items->result() as $row) :
                $encode[] = array_map("utf8_encode", (array)$row);

            endforeach;

        endif;
        
        echo $this->mylibrary->viewDetailsJSON_Data($items, $encode);
    }

    public function modifyDD_Remarks()
    {
        $delID = base64_decode($this->input->post('d'));
        $dd_ID = $this->input->post('dd');
        $remarks = $this->input->post('r');

        $result = $this->m_receive->modifyDD_Remarks($delID, $dd_ID, $remarks);
        $res = $result[0]->RETURN;

        if($res > 0) :
            $num = 1;
            $msg = 'Succesfully updated remarks!';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;
        
        echo json_encode(array('num'=>$num, 'message'=>$msg));

    }

    /**
     * Quantity count per case
     */
    public function qtyCount()
    {
        $del_ID = base64_decode($this->input->post('id'));
        $barCode = $this->input->post('code');

        $result = $this->m_receive->caseQty($del_ID, $barCode);

        echo json_encode($result[0]->Qty);
    }

    /**
     * Clear Delivery detail status
     */

    public function clearDeliveryDetailStatus()
    {
        $ids = explode(',', $this->input->post('ids'));

        foreach($ids as $id) :
            $this->m_receive->clearDeliveryDetailStatus($id);
        endforeach;
    }

    public function detailsForEmail($del_ID)
    { 
        $items = $this->m_dashboard->getJSONDeliveryDetails_View($del_ID); 
        $data['batch'] = $this->m_dashboard->getBatchDelivery($del_ID, 0); 
        $data['deliver'] = $this->m_dashboard->getDeliver($del_ID); 
        $data['items'] = $items->result();
        $data['total'] = $items->num_rows();   
        return $data; 
    }

     /**
     * Sending Email
     */
    public function sendEmail($to,$subject,$content)
    {
        $this->email->from(EMAIL_FROM, 'MyHub');
        $content = $this->myemail->headerTemplate().$content.$this->myemail->footerTemplate();
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($content);
        if ($this->email->send()) 
		{ 
            return 1;
		}  
		return -1; 
    }
    /**
     * Received delivery - 
     */
    public function receivedDelivery()
    {
        $del_ID  = base64_decode($this->uri->segment(3));
        $ship    = 0;
        $receive = 1;
        
        $rows = $this->m_receive->modifyDeliveryData($del_ID, $ship, $receive); 

        //PDF DOWNLOAD
        $this->pdfDownload($del_ID);

        if($rows[0]->RETURN >= 0 ): 
            $dataEmail = $this->detailsForEmail($del_ID); 

            //send notification to warehouse
            $warehouseEmail = $dataEmail['deliver'][0]->DCEmail;
            if($warehouseEmail != null):
                $content   = $this->myemail->content(2,$dataEmail);
                $this->sendEmail($warehouseEmail ,'[MyHub] Container Monitoring : Delivery Received ('.$dataEmail['deliver'][0]->ControlNo.' - ['.$dataEmail['deliver'][0]->LocationCode.'] '.$dataEmail['deliver'][0]->Location.')',$content); 
            endif;

            //send notification to store
            $storeEmail = $dataEmail['deliver'][0]->Email;
            if($storeEmail != null):
                $content   = $this->myemail->content(2,$dataEmail);
                $this->sendEmail($storeEmail ,'[MyHub] Container Monitoring : Received Delivery - '.$dataEmail['deliver'][0]->ControlNo,$content); 
            endif;
        endif;
        redirect('dashboard');
    }
    
    /**
     * Checking barcode status
     */
    public function checkBarcodeStatus()
    {
        $barcode = $this->input->post('bCode');
        $del_ID  = base64_decode($this->input->post('theID'));

        $result = $this->m_receive->barcodeStatus($barcode, $del_ID);
        $res = $result[0]->RETURN;

        if($res > 0) :
            $num = 1;
            $msg = '';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;
        
        echo json_encode(array('num'=>$num, 'message'=>$msg));

    }

    public function updateDelTap()
    { 
        $deliverID  = $this->input->post('deliverID');
        $ddID       = $this->input->post('ddID'); 
        $qty        = $this->input->post('qty'); 
        $status     = 2;
        $remarks    = "";

        // print_r($deliverID);
    
        $result = $this->m_receive->updateDelTap($deliverID, $ddID, $qty, $status, $remarks);
        
        return $result;
         
    }  

    public function pdfDownload($delID)
    {   
        $files = glob("./pdf/include/*.php");
        foreach($files as $file) include_once($file);
        $del = 30308;
       
            $tarazone = $this->m_delivery->getTaraZone($del);
            $taracolor = $this->m_delivery->getTaraColor($del);
            $taracont = $this->m_delivery->getTaraCont($del);
            $data['zone'] = json_decode(json_encode($tarazone), true);
            $data['color'] = json_decode(json_encode($taracolor), true);
            $data['sign'] = $this->m_delivery->getTaraSign($del);
            $data['conts'] = json_decode(json_encode($taracont), true);
            $filename = $tarazone['0']->LocationCode . ' - ' . $tarazone['0']->ControlNo . '.pdf';
            $output = $this->mylibrary->download_pdf("tpl/pdf-email/taradet.php", $data, $filename);
            
    }
}

/* End of file Receive.php 
 * Location: ./application/controllers/Receive.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */