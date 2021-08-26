<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require_once APPPATH . '/libraries/REST_Controller.php';
// use namespace
use Restserver\Libraries\REST_Controller;

class ApiNew extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index_get()
     {
	    $result = array('apiReturn' => 1); 
        $this->response($result, REST_Controller::HTTP_OK);
     }

    public function index_post()
    {
        $result = array('apiReturn' => 1); 
        $this->response($result, REST_Controller::HTTP_OK);
    }
  

    public function app_settings_store_post()
    {
        $result = array('apiReturn' => 1,
        'signatureUrl' => SIGNATURE_URL,
        'storeVersion' => GALAXY_STORE_VERSION); 
        $this->response($result, REST_Controller::HTTP_OK);
    }

    public function app_settings_warehouse_post()
    {
        $result = array('apiReturn' => 1,
        'signatureUrl' => SIGNATURE_URL, 
        'warehouseVersion' => GALAXY_WAREHOUSE_VERSION); 
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get user info / Login
     */
    public function login_post()
    { 
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data['user'] = $username;
        $data['pass'] = $password;
        $encrypted = $this->mylibrary->passwordEncryptNew($data); 

        $rows = $this->m_api->getUser($username);
        $num = 1;
        $msg = 'successfully logged in.';
        $user = $rows;
        
        if(count($rows) > 0) :
            if($password == DEFAULT_PASSWORD) :
                if($password != $rows[0]->password ) :
                    $num = -1;
                    $msg = 'Incorrect password.';
                    $user = [];
                endif;
            else:
                if($encrypted['password'] != $rows[0]->password ) :
                    $num = -1;
                    $msg = 'Incorrect password.';
                    $user = [];
                endif;
            endif;
        else :
            $num = -2;
            $msg = 'Username does not exist.';
        endif;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'user' => $user);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }       

    /**
     * Get list of deliveries
     */
    public function delivery_post()
    { 
        $pickDate = $this->input->post('pickingDate');
        $locID    = $this->input->post('locID');
        $empID    = $this->input->post('empID');

        $rows = $this->m_api->getDeliver($pickDate, $locID, $empID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }      
    
    /**
     * Get deliver details
     */
    public function delivery_details_post()
    { 
        $deliverID = $this->input->post('deliverID');
        $empID     = $this->input->post('empID');

        $rows = $this->m_api->getWHDeliverDetails($deliverID, $empID);
        $num = 1;
        $msg = 'Success.';
        $this->pdfEmail($deliverID);
        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get warehouse deliver details zone
     */
    public function delivery_details_zone_post()
    { 
        $pickDate = $this->input->post('pickingDate');
        $locID    = $this->input->post('locID');
        $barcode  = $this->input->post('barcode');
        $empID    = $this->input->post('empID');


        $rows = $this->m_api->getWHDeliverDetailsZone($pickDate, $locID, $barcode, $empID);
        $num = 1;
        $msg = 'Success.';

        if($rows[0]->return < 0) :
            $num = $rows[0]->return;
            $msg = $rows[0]->message;
        endif;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Update warehouse container type
     */
    public function update_cont_post()
    { 
        $deliverID = $this->input->post('deliverID');        
        $barcode   = $this->input->post('barcode');
        $typeID    = $this->input->post('typeID');
        $qty       = $this->input->post('qty');
        $remarks   = $this->input->post('remarks');
        $empID     = $this->input->post('empID');

        $update = $this->m_api->updateWHContainer($deliverID, $barcode, $typeID, $qty, $remarks, $empID);
        $num = $update[0]->return;
        $msg = $update[0]->message;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    // public function dd_loaded_post()
    // { 
    //     $empID = $this->input->post('empID');
    //     $isLoaded = $this->input->post('isloaded') == '' ? 0 : $this->input->post('isloaded');
    //     $controlNo = $this->input->post('controlno');
    //     $loc = $this->input->post('loc');

    //     $rows = $this->m_api->getDeliverDetailsLoad($empID, $isLoaded, $controlNo, $loc);
    //     $num = 1;
    //     $msg = 'Success.';

    //     $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
    //     $this->response($result, REST_Controller::HTTP_OK);
    // }

    /**
     * Get list of deliveries loaded/unloaded
     */
    public function d_loaded_post()
    { 
        $empID     = $this->input->post('empID');
        $isLoaded  = $this->input->post('isloaded') == '' ? 0 : $this->input->post('isloaded');
        $controlNo = $this->input->post('controlno');
        $loc       = $this->input->post('loc');

        $rows = $this->m_api->getDeliverLoad($empID, $isLoaded, $controlNo, $loc);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get list of delivery details by zone
     */
    public function dd_zone_post()
    { 
        $deliverID = $this->input->post('deliverID');
        $empID     = $this->input->post('empID');

        $rows = $this->m_api->getDeliverDetailsZone($deliverID, $empID);
        $num = 1;
        $msg = 'Success.';
        
        $this->pdfEmail($deliverID);

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get list of delivery details container by zone
     */
    public function dd_cont_zone_post()
    { 
        $deliverID = $this->input->post('deliverID');
        $empID     = $this->input->post('empID');

        $rows = $this->m_api->getDeliverDetailsZoneCont($deliverID, $empID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get list of delivery details by container
     */
    public function dd_cont_post()
    { 
        $deliverID = $this->input->post('deliverID');
        $empID     = $this->input->post('empID');

        $rows = $this->m_api->getDeliverDetailsCont($deliverID, $empID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

     /**
     * Get list of store locations
     */
    public function location_post()
    { 
        $locID    = $this->input->post('locID');
        $locCode  = $this->input->post('locCode');
        $location = $this->input->post('location');

        $rows = $this->m_api->getStoreLocation($locID, $locCode, $location);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Update deliver status
     */
    public function update_status_post()
    { 
        $deliverID = $this->input->post('deliverID');        
        $barcode   = $this->input->post('barcode');    
        $qty       = $this->input->post('qty');
        $status    = $this->input->post('status');
        $empID     = $this->input->post('empID');

        $update = $this->m_api->updateDeliverDetailStatus($deliverID, $barcode, $qty, $status, $empID);
        $num = $update[0]->return;
        $msg = $update[0]->message;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get list of trucks or get truck record
     */
    public function truck_post()
    { 
        $truckID = ($this->input->post('truckID') == '' ? 0 : $this->input->post('truckID'));
        $truckNo = $this->input->post('truckNo');

        $rows = $this->m_api->getTruck($truckID, $truckNo);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get list of drivers or get driver record
     */
    public function driver_post()
    { 
        $driverID = ($this->input->post('driverID') == '' ? 0 : $this->input->post('driverID'));
        $name     = $this->input->post('driverName');

        $rows = $this->m_api->getDriver($driverID, $name);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Insert detail assignment
     */
    public function insert_da_post()
    { 
        $deliverID = $this->input->post('deliverID');        
        $truckID   = $this->input->post('truckID');    
        $driverID  = $this->input->post('driverID');
        $empID     = $this->input->post('empID');

        $update = $this->m_api->insertDetailAssignment($deliverID, $truckID, $driverID, $empID);
        $num = $update[0]->return;
        $msg = $update[0]->message;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Update detail assignment
     */
    public function update_da_post()
    { 
        $deliverID = $this->input->post('deliverID');        
        $batch     = $this->input->post('batch');    
        $truckID   = $this->input->post('truckID');    
        $driverID  = $this->input->post('driverID');
        $empID     = $this->input->post('empID');

        $update = $this->m_api->updateDetailAssignment($deliverID, $batch, $truckID, $driverID, $empID);
        $num = $update[0]->return;
        $msg = $update[0]->message;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Update deliver shipping/cancel
     */
    public function update_deliver_post()
    { 
        $deliverID  = $this->input->post('deliverID');        
        $scannedBy  = ($this->input->post('scannedBy') == '' ? 0 : $this->input->post('scannedBy'));  
        $shipBy     = ($this->input->post('shipBy') == '' ? 0 : $this->input->post('shipBy'));    
        $cancelBy   = ($this->input->post('cancelBy') == '' ? 0 : $this->input->post('cancelBy'));   
        $isComplete = ($this->input->post('isComplete') == '' ? 0 : $this->input->post('isComplete'));
        $empID      = $this->input->post('empID');

        $update = $this->m_api->updateDeliver($deliverID, $scannedBy, $shipBy, $cancelBy, $isComplete, $empID);
        $num = $update[0]->return;
        $msg = $update[0]->message;

        if($shipBy > 0 && $num > 0) 
        {
            $this->pdfEmail($deliverID);
        }

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get deliver barcodes
     */
    public function d_barcode_post()
    { 
        $deliverID = $this->input->post('deliverID');        
        $status    = $this->input->post('status');    
        $zone      = $this->input->post('zone');    
        $empID     = $this->input->post('empID');

        $rows = $this->m_api->getDeliverBarcode($deliverID, $status, $zone, $empID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get deliver details grouped by cotainer
     */
    public function dd_contype_post()
    { 
        $deliverID = $this->input->post('deliverID');        
        $empID     = $this->input->post('empID');
	    $batchNo     = $this->input->post('batchNo');
        $rows = $this->m_api->getDeliverDetailsContType($deliverID, $empID,$batchNo);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }
    
    /**
     * Get deliver batches
     */
    public function d_batches_post()
    { 
        $deliverID = $this->input->post('deliverID');        
        $empID     = $this->input->post('empID');

        $rows = $this->m_api->getDeliverBatches($deliverID, $empID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Upload driver signature
     */
    public function upload_sign_post()
    { 
        if (!file_exists(UPLOAD_SIGNATURE)):  
            $result = array('apiReturn' => -1, 'apiMsg' => "Upload directory does not exist!.");
            $this->response($result, REST_Controller::HTTP_OK);
            return false;
        endif;

        $deliverID = $this->input->post('deliverID');
        $locCode = $this->input->post('locCode');

        if($locCode != '') :
            $upload_path = UPLOAD_SIGNATURE . $deliverID . '/' . $locCode;
        else:
            $upload_path = UPLOAD_SIGNATURE . $deliverID;
        endif;
        
        $filename = $_FILES['signature']['name'];
        $filetype = pathinfo($_FILES['signature']['name'], PATHINFO_EXTENSION);
        $sourcePath = $_FILES['signature']['tmp_name'];
        $allowed_ext = array("jpg", "jpeg", "png");
        $num = 1;
        $msg = 'Success.';

        if (!is_dir($upload_path)) :
            mkdir($upload_path, 0755, true);
        endif;
        
        if ($_FILES['signature']['name'] != '') :
            if(in_array(strtolower($filetype), $allowed_ext)) :
                $targetPath = $upload_path . '/' . $filename;
                move_uploaded_file($sourcePath, $targetPath);
            else : 
                $num = -100;
                $msg = 'Invalid file type. Allowed file types are jpg, jpeg, or png.';
            endif;
        else :
            $num = -101;
            $msg = 'No files selected';
        endif;

        // $rows = $this->m_api->getDeliverBatches($deliverID, $empID);

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
        $this->response($result, REST_Controller::HTTP_OK);
        //$this->response($result, REST_Controller::HTTP_OK);
    }

    public function uploadDocs()
    {
        $foldertype = $this->input->post('fType');
        $foldername = $this->input->post('fasrsNo');
        $upload_path = '/var/www/html/alfamart/public_html/MyHub/mass/scan_docs/' . $foldertype . '/' . $foldername;

        $count = count($_FILES);
        $false = 0;
        $message = '';

        if (!is_dir($upload_path)) :
            mkdir($upload_path, 0755, true);
        endif;

        if ($count != 0) :
            if (is_array($_FILES['doc_files']) && !empty($_FILES['doc_files'])) :

                foreach ($_FILES['doc_files']['name'] as $name => $value) :
                    $item = pathinfo($_FILES['doc_files']['name'][0]);
                    $file_name = $item['filename'];
                    $allowed_ext = array("jpg", "jpeg", "png", "gif", "pdf", "xls", "xlsx", "doc", "docx");
                    $filext = pathinfo($value, PATHINFO_EXTENSION);
                    if (in_array(strtolower($filext), $allowed_ext) && $_FILES['doc_files']['size'][$name] <= 2000000 && $_FILES['doc_files']['size'][$name] > 0) :
                        $newName = $_FILES['doc_files']['name'][$name];
                        $sourcePath = $_FILES['doc_files']['tmp_name'][$name];
                        $targetPath = $upload_path . '/' . $newName;
                    //move_uploaded_file($sourcePath, $targetPath);
                    // if(move_uploaded_file($sourcePath, $targetPath)):
                    //
                    // endif;
                    else :
                        $false = $false + 1;
                    endif;
                endforeach;
            endif;
        else :
            $message = 'No files selected';
        endif;

        if ($false == 0 && $count != 0) :

            foreach ($_FILES['doc_files']['name'] as $name => $value) :
                $newName = $_FILES['doc_files']['name'][$name];
                $sourcePath = $_FILES['doc_files']['tmp_name'][$name];
                $targetPath = $upload_path . '/' . $newName;

                move_uploaded_file($sourcePath, $targetPath);

            endforeach;

            $message = 'Files successfully uploaded';
        endif;

        echo $message;
    }

    /**
     * Get deliver witness
     */
    public function d_witness_post()
    { 
        $deliverID = $this->input->post('deliverID');
        $batchNo   = $this->input->post('batchNo');    
        $empID     = $this->input->post('empID');

        $rows = $this->m_api->getDeliverDetailWitness($deliverID, $batchNo, $empID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Update deliver witness
     */
    public function update_witness_post()
    { 
        $deliverID = $this->input->post('deliverID');
        $batchNo   = $this->input->post('batchNo');
        $isnowit   = $this->input->post('isNoWitness');
        $witness   = $this->input->post('witness'); 
        $empID     = $this->input->post('empID');

        $update = $this->m_api->updateDeliverDetailWitness($deliverID, $batchNo, $isnowit, $witness, $empID);
        $num = $update[0]->return;
        $msg = $update[0]->message;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get list of containers with ischeck
     */
    public function dd_cont_check_post()
    { 
        $deliverID = $this->input->post('deliverID');
        $status   = $this->input->post('status');    
        $empID     = $this->input->post('empID');

        $rows = $this->m_api->getDelDetContainer($deliverID, $status, $empID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Update container using deliver detail id
     */
    public function update_dd_wh_cont_post()
    { 
        $deliverID = $this->input->post('deliverID');
        $ddID      = $this->input->post('ddID');
        $typeID    = $this->input->post('typeID'); 
        $qty       = $this->input->post('qty'); 
        $remarks   = $this->input->post('remarks'); 
        $empID     = $this->input->post('empID');

        $update = $this->m_api->updateDelDetWHContainer($deliverID, $ddID, $typeID, $qty, $remarks, $empID);
        $num = $update[0]->return;
        $msg = $update[0]->message;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Update deliver status using deliver detail id
     */
    public function update_dd_status_post()
    { 
        $deliverID = $this->input->post('deliverID');
        $ddID      = $this->input->post('ddID');
        $qty       = $this->input->post('qty'); 
        $status    = $this->input->post('status'); 
        $remarks   = $this->input->post('remarks'); 
        $empID     = $this->input->post('empID');

        $update = $this->m_api->updateDelDetStatus($deliverID, $ddID, $qty, $status, $remarks, $empID);
        $num = $update[0]->return;
        $msg = $update[0]->message;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Update detail assignment as shipped
     */
    public function update_del_ship_post()
    { 
        $deliverID = $this->input->post('deliverID');
        $batchNo   = $this->input->post('batchNo');
        $empID     = $this->input->post('empID');

        $update = $this->m_api->updateDetailAssignmentShip($deliverID, $batchNo, $empID);
        $num = $update[0]->return;
        $msg = $update[0]->message;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get deliver count
     */
    public function d_count_post()
    { 
        $deliverID = $this->input->post('deliverID');

        $rows = $this->m_api->getDeliverCount($deliverID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }


    /************
     * STORE SIDE
     ************/

    /**
     * Get store user info / Login
     */
    public function store_login_post()
    { 
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $version  = $this->input->post('version');
        $data['user'] = $username;
        $data['pass'] = $password;
        $encrypted = $this->mylibrary->passwordEncryptNew($data); 

        $rows = $this->m_api->getStoreUser($username, $version);
        $num = 1;
        $msg = 'successfully logged in.';
        $user = $rows;
        
        if(count($rows) > 0) :
            if($password == DEFAULT_PASSWORD) :
                if($password != $rows[0]->Password ) :
                    $num = -1;
                    $msg = 'Incorrect password.';
                    $user = [];
                endif;
            else:
                if($encrypted['password'] != $rows[0]->Password ) :
                    $num = -1;
                    $msg = 'Incorrect password.';
                    $user = [];
                endif;
            endif;
        else :
            $num = -2;
            $msg = 'Username does not exist.';
        endif;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'user' => $user);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }
    
    /**
     * Get list of unloading delivery
     */
    public function store_d_ul_post()
    { 
        $empID      = $this->input->post('empID');
        $locID      = $this->input->post('locID');
        $isUnloaded = $this->input->post('isUnloaded');
        $controlNo  = $this->input->post('controlNo');

        $rows = $this->m_api->getDeliverUnloading($empID, $locID, $isUnloaded, $controlNo);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Update deliver status using DeliverDetail_ID
     */
    public function store_update_del_status_post()
    { 
        $deliverID = $this->input->post('deliverID');
        $ddID      = $this->input->post('ddID');
        $qty       = $this->input->post('qty');
        $status    = $this->input->post('status');
        $remarks   = $this->input->post('remarks');
        $empID     = $this->input->post('empID');

        $update = $this->m_api->updateDeliverDetStatus($deliverID, $ddID, $qty, $status, $remarks, $empID);
        $num = $update[0]->return;
        $msg = $update[0]->message;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get list of container with check
     */
    public function store_d_cont_checked_post()
    { 
        $deliverID  = $this->input->post('deliverID');
        $status     = $this->input->post('status');
        $empID      = $this->input->post('empID');

        $rows = $this->m_api->getDeliverContChecked($deliverID, $status, $empID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Update delivery witness and received details
     */
    public function store_update_witness_post()
    { 
        $deliverID = $this->input->post('deliverID');
        $batchNo   = $this->input->post('batchNo');
        $witness   = $this->input->post('witness');
        $empID     = $this->input->post('empID');

        $update = $this->m_api->updateDeliverWitness($deliverID, $batchNo, $witness, $empID);
        $num = $update[0]->return;
        $msg = $update[0]->message;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Update delivery witness and received details
     */
    public function store_update_d_info_post()
    { 
        $deliverID  = $this->input->post('deliverID');
        $receivedBy = $this->input->post('receivedBy');
        $isReceived = $this->input->post('isReceived');

        $update = $this->m_api->updateDeliverInfo($deliverID, $receivedBy, $isReceived);
        $num = $update[0]->return;
        $msg = $update[0]->message;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get list of Batches
     */
    public function store_dd_batch_post()
    { 
        $deliverID  = $this->input->post('deliverID');
        $empID      = $this->input->post('empID');

        $rows = $this->m_api->getStoreDeliverBatches($deliverID, $empID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get list of unloaded delivery details group by container
     */
    public function store_dd_cont_post()
    { 
        $deliverID  = $this->input->post('deliverID');
        $empID      = $this->input->post('empID');
        $batchNo    = $this->input->post('batchNo');

        $rows = $this->m_api->getUnloadedDDByCont($deliverID, $empID, $batchNo);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get delivery witness
     */
    public function store_del_witness_post()
    { 
        $deliverID  = $this->input->post('deliverID');
        $batchNo    = $this->input->post('batchNo');
        $empID      = $this->input->post('empID');

        $rows = $this->m_api->getDeliverWitness($deliverID, $batchNo, $empID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Receiving of details per batch
     */
    public function store_del_ass_rec_post()
    { 
        $deliverID  = $this->input->post('deliverID');
        $batchNo    = $this->input->post('batchNo');
        $empID      = $this->input->post('empID');

        $update = $this->m_api->updateDetAssignmentReceive($deliverID, $batchNo, $empID);
        $num = $update[0]->return;
        $msg = $update[0]->message;

        $result = array('apiReturn' => $num, 'apiMsg' => $msg);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get deliver count
     */
    public function store_del_count_post()
    { 
        $deliverID  = $this->input->post('deliverID');

        $rows = $this->m_api->getStoreDeliverCount($deliverID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

     /**
     * Get WAREHOSUE/ISSUING DOS Content
     */
    public function dos_content_post()
    { 
        $deliverDetailID  = $this->input->post('deliverDetailID');
        $userEmpID  = $this->input->post('userEmpID');

        $rows = $this->m_api->getDOSContent($deliverDetailID,$userEmpID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }
    
    /**
     * Get STORE DOS Content
     */
    public function store_dos_content_post()
    { 
        $deliverDetailID  = $this->input->post('deliverDetailID');
        $userEmpID  = $this->input->post('userEmpID');

        $rows = $this->m_api->getStoreDOSContent($deliverDetailID,$userEmpID);
        $num = 1;
        $msg = 'Success.';

        $result = array('apiReturn' => $num, 'apiMsg' => $msg, 'items' => $rows);
      
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Get Guard Device Info
     */
    public function getGuardDevice_post()
    {
        $deviceID = $this->input->post('deviceID');
        $result = $this->m_api->getGuardDevice($deviceID); 
        $this->response($result, REST_Controller::HTTP_OK);
    }

    /**
     * Insert Guard Deliver Log
     */
    public function insertDeliverLog_post()
    {
        
        $truckID    = $this->input->post('truckID');
        $logByID    = $this->input->post('logByID');
        $locationID = $this->input->post('locationID');
        $longitude  = $this->input->post('longitude');
        $latitude   = $this->input->post('latitude');
        $os         = $this->input->post('os'); 

        $rows = $this->m_api->insertDeliverLog($truckID,$logByID,$locationID,$longitude,$latitude,$os); 
        $result =  array('apiReturn' => -1,'apiMessage'=> 'Failed to Save Scanned QR Code');
        if(count($rows) > 0):
           if($rows[0]->RETURN >= 0):
             $result = array('apiReturn' => 1,'apiMessage'=> 'Successfully Scanned QR Code');
           endif;
        endif;
        $this->response($result, REST_Controller::HTTP_OK);
    } 

    public function pdfEmail($del)
    {   
        
        $email = $this->m_api->getStoreEmail($del);

        $emailto = $email[0]->Email;

        if (is_null($emailto))
        {
            return false;
        }

        else
        {
            $tarazone = $this->m_api->getTaraZone($del);
            $taracolor = $this->m_api->getTaraColor($del);
            $taracont = $this->m_api->getTaraCont($del);
            $data['zone'] = json_decode(json_encode($tarazone), true);
            $data['color'] = json_decode(json_encode($taracolor), true);
            $data['sign'] = $this->m_api->getTaraSign($del);
            $data['conts'] = json_decode(json_encode($taracont), true);
            $filename = $tarazone['0']->LocationCode . ' - ' . $tarazone['0']->ControlNo . '.pdf';
            
            $output = $this->mylibrary->generate_pdf("pdf-email/tara.php", $data);
            $subject = '[MyHub] Container Monitoring : Delivery ('.$tarazone['0']->ControlNo.' - ['.$tarazone['0']->LocationCode.'] '.$tarazone['0']->Location.')';
            $content = '<!DOCTYPE html>
            <html>
            <head> 
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <meta name="viewport" content="width=device-width, initial-scale=1"> 
            <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500&display=swap" rel="stylesheet">
            <style>
                body
                {
                    max-width:100%;
                    font-family: \'Noto Sans JP\', sans-serif;
                    padding: 20px;
                    font-size: 12px; 
                }
                label
                {
                    font-weight: bold;
                }
                table
                {
                    border-collapse: collapse;
                    width: 100%;
                    text-align:left;
                    font-size: 12px;
                }
                table th, table td
                {
                    padding: 5px;
                    border:solid 1px grey; 
                }
                .Header-content
                {
                    width:100%;
                }
                .right
                {
                    text-align:right;
                }
                </style>
            </head>
            <body> 
            <a href="'.MYHUB_URL.'"> <img src="https://myhub.atp.ph/resource/style1/img/myhublogo.png" width="280"/> </a>
            <br><br><br>
            Hi, [' . $tarazone['0']->LocationCode .'] ['. $tarazone['0']->Location . '] <br><br><br> You delivery with DO# [ '.$tarazone['0']->ControlNo.' ] is already shipped and on its way to your store. Please see attached for the copy of the logsheet.';
    
    
            $this->email->from(EMAIL_FROM, 'MyHub');
            $this->email->to($emailto);
            $this->email->subject($subject);
            $this->email->message($content);
            $this->email->attach($output,'application/pdf',$filename,false);
         
    
            if ($this->email->send()) 
            {
              return true;
            
            }
        }
        
    }
}
