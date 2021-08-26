<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_model extends CI_Model 
{
    public $connDB  = null;
    public $connDB2  = null;
    private $empID = null;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $this->connDB2 = $this->load->database('dbATPIDeliverLocal',true);
        $this->empID = $this->mylibrary->decrypted($this->session->userdata('Emp_Id'));
    }
    
	/**
     * Saving delivery info
     */
    public function saveDelivery($data)
    {
        $controlNum   = $data['controlNum'];
        $locationID   = $data['shipTo'];
        $numContainer = $data['numContainer'];
        $remarks      = $data['remarks'];

        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Deliver_Insert] '$controlNum', $locationID, NULL, NULL, $numContainer, '$remarks', $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    /**
     * Saving the scanned barcode as item
     */
    public function insertDeliveryItem($data)
    {
        $delID       = $data['delID'];
        $containerID = $data['cType'];
        $barCode     = $data['barCode'];
        $qty         = $data['qty'];
        
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_DeliverDetail_Insert] $delID, '$barCode', $containerID, $this->empID, $qty")->result();
        //$this->connDB->close();
    
        return $query;
        
    }

    /**
     * Update delivery details
     */
    public function updateDelivery($delID, $delnote, $tc, $remarks)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_DeliverRemarks_Update] $delID, '$delnote', $tc, '$remarks', $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function checkBarcodeQty($code, $qty, $del_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_InsertBarcode_Check] '$code', $qty, $del_ID")->result();
        //$this->connDB->close();
        
        return $query;
    }

    public function updateDeliverDetStatus($delID, $barcode, $qty, $status)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_DeliverDetStatus_Update] $delID, '$barcode', $qty, $status, $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function getTaraZone($delID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_TaraZone_get] $delID")->result();
        return $query;
    }

    public function getTaraColor($delID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_TaraColor_get] $delID")->result();
        return $query;
    }

    public function getTaraSign($delID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_TaraSign_get] $delID")->result();
        return $query;
    }

    public function getTaraCont($delID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_DelDet_Container_get] $delID,4,1")->result();
        return $query;
    }

    public function getStoreEmail($delID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_StoreEmail_get] $delID")->result();
        return $query;
    }
    
}

/* End of file Delivery_model.php 
 * Location: ./application/models/Delivery_model.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */