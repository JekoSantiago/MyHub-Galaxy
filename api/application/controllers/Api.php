<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require_once APPPATH . '/libraries/REST_Controller.php';
// use namespace
use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index_get()
     {
	$result = array('apiReturn' => 1); 
        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
     }
    public function index_post()
    {
        $result = array('apiReturn' => 1); 
        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }

    public function login_post()
    {
        
        $data = array(
            'user' => $this->input->post('username'),
            'pass' => $this->input->post('password'),
            'imei' => $this->input->post('imei'),
            'userVersion' => $this->input->post('userVersion')
        );

        $check = $this->m_api->checkUser($data);
            
        if($check == false)
        {
            
            $result = array('apiReturn' => -2); 
            $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
        }
        else
        {
            $auth = array(
                'username' => $check[0]->EmployeeNo,
                'password' => $check[0]->Password
            );

            $encrypted =  $this->mylibrary->passwordEncryptNew($data);  
            if($encrypted['username'] == $auth['username'] && $encrypted['password'] == $auth['password'])
            {

                $result = array(
                    'apiReturn'        => 1,
                    'userEmpID'        => $check[0]->Emp_ID,
                    'userEmpNum'       => $check[0]->EmployeeNo,
                    'userFullName'     => $check[0]->empl_name,
                    'userLocationID'   => $check[0]->Location_ID,
                    'userLocationCode' => $check[0]->LocationCode,
                    'userLocation'     => $check[0]->Location
                );

                $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
            }
            else
            { 
                $result = array('apiReturn' => -2); 
                $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function display_post()
    {
        $locID = $this->input->post('loc_id');
        $empID  = $this->input->post('employeeID');
        $encode = array();
        $items = $this->m_api->getDeliveryNotes($locID, $empID);

        foreach($items as $row) : 
            $encode[] = array(
                    'deliver_ID'     => intval($row->Deliver_ID),
                    'deli_note'      => $row->ControlNo,
                    'ship_date'      => date('Y-m-d', strtotime($row->ShippedDate)),
                    'receivedDate'   => $row->ReceivedDate,
                    'offloadCount'   => intval($row->OffloadCount),
                    'totalContainer' => intval($row->TotalContainer),
                    'totalScan'      => intval($row->UnloadCount)); 
        endforeach;

        $result = array(
            'apiReturn' => 1,
            'items'     => $encode
        );

        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }

    public function view_post()
    {
        $controlNo = $this->input->post('ctrl_no');
        $locID     = $this->input->post('loc_id');
        $shipDate  = $this->input->post('ship_date');

        $item = $this->m_api->selectedDeliveryInfo($controlNo, $locID, $shipDate);

        if(empty($item)) :

            $deliveryID = 0;
            $total      = 0;
            $count      = 0;
            $rDate      = 0;

        else :

            $deliveryID = $item[0]->Deliver_ID;
            $total      = $item[0]->TotalContainer;
            $count      = $this->m_api->countNoneReceiveItems(intval($deliveryID));
            $rDate      = (is_null($item[0]->ReceivedDate)) ? 0 : 1;

        endif;

        $result = array(
            'apiReturn'        => 1,
            'deliveryID'       => intval($deliveryID),
            'totalItem'        => $total,
            'totalUnscanItem'  => $count,
            'receiveDate'      => $rDate
        );

        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }

    public function modify_post()
    {
        $barcode    = $this->input->post('barcode');
        $deliveryID = $this->input->post('deliveryID');
        $empID      = $this->input->post('employeeID');
        $imei       = $this->input->post('imei');
        $locCode    = $this->input->post('locationCode');
        $qty        = $this->input->post('qty');
	    $scanFrom   = 'App';
        $checkCode  = explode('-', $barcode);
        $isExist    = $this->m_api->checkBarcode($barcode, $deliveryID);

        if((strlen($checkCode[1]) == 5 && $checkCode[2] == $locCode) || ($checkCode[1] == 'DOS' && $checkCode[3] == $locCode))
        {
            $barcodeStatus = $this->m_api->barcodeStatus($barcode, $deliveryID);
            if($barcodeStatus == 1)
            {
                if($checkCode[1] == 'DOS')
                {
                    if($isExist == 1)
                    {
                        $loadQty = $this->loadQuantity($deliveryID, $barcode);
                        if($qty > $loadQty)
                        {
                            $result = array('apiReturn' => -4);
                        }
                        else
                        {
                            $result = $this->update_details($deliveryID, $barcode, $empID, $qty, $scanFrom);
                        }
                    }
                    else
                    {
                        $result = array('apiReturn' => -3);
                    }
                }
                else
                {
                    if($isExist == 1)
                    {
                        $result = $this->update_details($deliveryID, $barcode, $empID, $qty, $scanFrom);
                    }
                    else
                    {
                        $result = array('apiReturn' => -3);
                    }
                }
            }
            else
            {
                $result = array('apiReturn' => -5);
            }
        }
        else
        {
            $result = array('apiReturn' => -1);
        }

        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }

    public function testonly_get()
    {
        $result = array('apiReturn' => 5);

        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }


    public function update_details($deliveryID, $barcode, $empID, $qty, $scanFrom)
    {
        $item = $this->m_api->updateDeliveryDetails($deliveryID, $barcode, $empID, $qty, $scanFrom);
        $res = $item[0]->RETURN;
        $count = $this->m_api->countNoneReceiveItems($deliveryID);

        if($res > 0)
        {
            $result = array('apiReturn' => 1, 'totalItem' => $count);
        }
        else
        {
            $result = array('apiReturn' => -2);
        }

        return $result;
    }

    public function loadQuantity($del_ID, $barCode)
    {
        $result = $this->m_api->getLoadQuantity($del_ID, $barCode);

        return intval($result[0]->Qty);
    }

    public function detailsForEmail($del_ID)
    {  
        $items = $this->m_api->getJSONDeliveryDetails_View($del_ID); 
        $data['batch'] = $this->m_api->getBatchDelivery($del_ID, 0); 
        $data['deliver'] = $this->m_api->getDeliver($del_ID); 
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
    public function receive_post()
    {
        
        
        $del_ID  = $this->input->post('deliveryID');
        $ship    = 0;
        $receive = 1; 
        $item = $this->m_api->modifyDeliveryData($del_ID, $ship, $receive);
        $res = $item[0]->RETURN;

        if($res > 0)
        {
            $dataEmail = $this->detailsForEmail($del_ID); 

            //send notification to warehouse
            $warehouseEmail = $dataEmail['deliver'][0]->DCEmail;
            if($warehouseEmail != null):
                $content   = $this->myemail->content(2,$dataEmail);
                $this->sendEmail($warehouseEmail ,'[MyHub] Container Monitoring : Delivery Received ('.$dataEmail['deliver'][0]->ControlNo.' - ['.
                $dataEmail['deliver'][0]->LocationCode.'] '.$dataEmail['deliver'][0]->Location.')',$content); 
            endif;

            //send notification to store
            $storeEmail = $dataEmail['deliver'][0]->Email;
            if($storeEmail != null):
                $content   = $this->myemail->content(2,$dataEmail);
                $this->sendEmail($storeEmail ,'[MyHub] Container Monitoring : Received Delivery - '.$dataEmail['deliver'][0]->ControlNo,$content); 
            endif;
            $result = array('apiReturn' => 1);
        }
        else
        {
            $result = array('apiReturn' => -1);
        }

        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }

    public function clear_post()
    {
        $del_ID  = $this->input->post('deliveryID');
        $empID   = $this->input->post('employeeID');
        $ids = explode(',', $this->detailIDs($del_ID));

        foreach($ids as $id) :
            $this->m_api->clearDeliveryDetailStatus($id, $empID);
        endforeach;

        $count = $this->m_api->countNoneReceiveItems(intval($del_ID));

        $result = array('totalRemainingUnscanItem' => $count);

        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }

    public function handshake_post()
    {
        $imei = $this->input->post('imei');
        $result = $this->mylibrary->checkPhoneIMEI();

        if(in_array($imei, $result))
        {
            $result = array('apiReturn' => 1);
        }
        else
        {
            $result = array('apiReturn' => 0);
        }

        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }

    /**
     * Display Delivery details Ids as string
     */
    public function detailIDs($del_ID)
    {
        $items = $this->m_api->getJSONDeliveryDetails_View($del_ID);
        $strIDs = '';
        foreach($items->result() as $row) :
            $strIDs .= $row->DeliverDetail_ID.',';
        endforeach;

        return substr($strIDs, 0, -1);
    }

    public function scan_post()
    {
        $barcode    = $this->input->post('barcode');
        $deliveryID = $this->input->post('deliveryID');
        $empID      = $this->input->post('employeeID');
        $imei       = $this->input->post('imei');
        $locCode    = $this->input->post('locationCode');
        $qty        = $this->input->post('qty');
	    $scanFrom   = 'App';
        $checkCode  = explode('-', $barcode);
        $isExist    = $this->m_api->checkBarcode($barcode, $deliveryID);

// if((strlen($checkCode[1]) == 5 && $checkCode[2] == $locCode) || ($checkCode[1] == 'DOS' && $checkCode[3] == $locCode))


	if((strlen($checkCode[1]) == 5) || ($checkCode[1] == 'DOS'))
	 {
            $barcodeStatus = $this->m_api->barcodeStatus($barcode, $deliveryID);
            if($barcodeStatus == 1)
            {
                if($checkCode[1] == 'DOS')
                {
                    if($isExist == 1)
                    {
                        $loadQty = $this->loadQuantity($deliveryID, $barcode);
                       // if($qty > $loadQty)
                        //{
                           // $result = array('apiReturn' => -4);
                        //}
                       // else
                        //{
                            $result = $this->update_details($deliveryID, $barcode, $empID, $qty, $scanFrom);
                        //}
                    }
                    else
                    {
                        $result = array('apiReturn' => -3);
                    }
                }
                else
                {
                    if($isExist == 1)
                    {
                        $result = $this->update_details($deliveryID, $barcode, $empID, $qty, $scanFrom);
                    }
                    else
                    {
                        $result = array('apiReturn' => -3);
                    }
                }
            }
            else
            {
                $result = array('apiReturn' => -5);
            }
        }
        else
        {
            $result = array('apiReturn' => -1);
        }

        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }
    
    /*
    * WAREHOUSE API
    */
    
    public function displayDeliveryList_post()
    {
        $empID = $this->input->post('employeeID'); 
        $imei  = $this->input->post('imei');
        $encode = array();
        $items = $this->m_api->getDeliveryList($empID); 
        foreach($items as $row) :

            $encode[] = array(
                    'deliveryID'        => intval($row->Deliver_ID),
                    'deliveryNote'      => $row->DeliveryNote,
                    'store'             => $row->Store,
                    'totalContainer'    => intval($row->TotalContainer),
                    'totalScan'         => intval($row->TotalScan)
                );

        endforeach;

        $result = array(
            'apiReturn' => 1,
            'items'     => $encode
        );

        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }
    
    public function displayBarcodeList_post()
    {
        $deliveryID = $this->input->post('deliveryID');
        $imei       = $this->input->post('imei');
        $encode = array();
        $items = $this->m_api->getBarcodeList($deliveryID);
          
        foreach($items as $row) :

            $encode[] = array(
		    'deliverDetailID' => intval($row->DeliverDetail_ID),
                    'deliveryID'      => intval($row->Deliver_ID),
                    'barcode'         => $row->Barcode,
		    'loaded'         => $row->Loaded,
                    'total'           => intval($row->Total) 
                );

        endforeach;

        $result = array(
            'apiReturn' =>  1,
            'barcodes'     => $encode
        );

        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }
    
    public function scanForDelivery_post()
    { 
        $deliveryID  = $this->input->post('deliveryID');
        $barcode     = $this->input->post('barcode'); 
	$containerID = $this->setContainerID($barcode)=="" ? 0 : $this->setContainerID($barcode);
        $empID       = $this->input->post('employeeID'); 
        $qty         = $this->input->post('qty');
        $imei        = $this->input->post('imei'); 
         
        $return = $this->m_api->scanForDelivery($deliveryID,$barcode,$containerID,$empID,$qty); 
        
        $result = array('apiReturn' => intval($return));
         
        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }
    
   // public function setContainerID($param)
   // {
      //   $param = substr($param,2,1);
         
      //  $cointerArr = array('M' => 1, 'B' => 2, 'K' => 3, 'D'=>5, 'A'=>6, 'F'=>7, 'N'=>8, 'P'=>9, 'U'=>10, 'Z'=>11); 
        
       // if(array_key_exists($param, $cointerArr))
       // { 
       //     return $cointerArr[$param];
     //   }
      //  return null;
 //   }  
    
   public function setContainerID($param)
   {
         if (strpos($param, 'DOS')) 
         { 
           return 5;
         }
	 $rows = $this->m_api->getContainerList(); 
	 $containerArr = array();
         foreach($rows as $row)
         {
           if($row->ContainerCode !=null)
           {
	    if (strpos($param, str_replace(' ', '',$row->ContainerCode))) 
            { 
              return $row->Container_ID;
            }
           }
         } 
        //Box Container
        return 4;
   }

   public function containers_post()
    {
        $deliveryID = $this->input->post('deliverID'); 
        $dataList = array();
        $items = $this->m_api->getBarcodeList($deliveryID);
          
        foreach($items as $row) : 
            $dataList[] = array(
            'deliverDetailID' => intval($row->DeliverDetail_ID),
            'deliveryID'      => intval($row->Deliver_ID),
            'barcode'         => $row->Barcode,
            'loaded'          => $row->Loaded,
            'offloaded'       => $row->Unloaded,
            'status'          => intval($row->Status),
            'containerID'     => intval($row->Container_ID),
            'containerColor'  => $row->ContainerColor,
            'containerType'   => $row->ContainerType,
	    'offLoadQty'      => intval($row->OffLoadQty),
            'loadQty'         => intval($row->LoadQty),
            'recQty'          => intval($row->RecQty),
            'total'           => intval($row->Total),
            'lsc'             => intval($row->LSC),
            'usc'             => intval($row->USC),
            'osc'             => intval($row->OSC),
	    'remarks'         => $row->Remarks,
            'itemsLoaded'     => intval($row->ItemsLoaded),
	    'itemsReceived'   => intval($row->ItemsReceived),
	    'itemsOffloaded'  => intval($row->ItemsOffloaded),
	    'discrepancy'     => intval($row->Discrepancy),

            
            
             ); 
        endforeach;

        $result = array(
            'apiReturn' =>  1,
            'dataList'     => $dataList
        );

        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }        
      
    public function updateQty_post()
    { 
        $deliverID  = $this->input->post('deliverID');
        $barcode    = $this->input->post('barcode'); 
        $qty        = $this->input->post('qty'); 
        $detStatus  = $this->input->post('detStatus'); 
        $empID      = $this->input->post('employeeID'); 
         
        $rows = $this->m_api->updateQty($deliverID,$barcode,$qty,$detStatus,$empID); 
        
        $result = array('apiReturn' => intval($rows[0]->RETURN));
         
        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }  
    
    public function updateRemarks_post()
    { 
        $deliverID          = $this->input->post('deliverID');
        $deliverDetailID    = $this->input->post('deliverDetailID');  
        $remarks            = $this->input->post('remarks'); 
        $empID              = $this->input->post('employeeID'); 
         
        $rows = $this->m_api->updateRemarks($deliverID,$deliverDetailID,$remarks,$empID);  
        $result = array('apiReturn' => intval($rows[0]->RETURN));  
        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }       
}
