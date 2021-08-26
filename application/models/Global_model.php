<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Global_model extends CI_Model 
{
    public $connDB  = null;
    private $empID = null;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $this->empID = $this->mylibrary->decrypted($this->session->userdata('Emp_Id'));
    }

    /**
     * Get list of DC's to be integrate in the listbox form
     */
    public function dcOptions()
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_DC_Get]")->result();
        //$this->connDB->close();
    
        return $query;
    }

    /**
     * Get list of ac to be integrate in the listbox form
     */
    public function getOperationHead($empID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_OperationHeads_Get] $empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    /**
     * Get list of ac to be integrate in the listbox form
     */
    public function getOperationHeadAM($empID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_OperationHeadsAM_Get] $empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

	/**
     * Get list of stores to be integrate in the listbox form
     */
    public function getLocation($dcID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Location_Get] $dcID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    /**
     * Get list of truck number to be integrate in the listbox form
     */
    public function getTruck()
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Truck_Get] 0, null, 0, $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    /**
     * Get list of drivers to be integrate in the listbox form
     */
    public function getDrivers($locID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Driver_Get] 0, '', '', $locID")->result();
        //$this->connDB->close();
    
        return $query;
    }

      /**
     * Get batch details
     */
    public function getBatchDetail($del_ID, $batchNo)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_BatchDetail_Get] $del_ID, $batchNo")->result();
        //$this->connDB->close();
    
        return $query;
    }

    /**
     * Get list of container type to be integrate in the listbox form
     */
    public function getContainerType()
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Container_Get]")->result();
        //$this->connDB->close();
    
        return $query;
    }

    /**
     * Saving invalid scanned barcode
     */
    public function saveInvalidBarcode($data)
    {
        $delID       = $data['delID'];
        $containerID = $data['cType'];
        $barCode     = $data['barCode'];
        $qty         = $data['qty'];
        
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_InvalidBarcodes_Insert] $delID, '$barCode', $containerID, $this->empID, $qty")->result();
        //$this->connDB->close();
    
        return $query;
        
    }

    /**
     * Get delivery details
     */
    public function viewDetails($del_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_Deliver_Get] $del_ID, '', 0, 0, 0, '', 0, '', '', 0, 0, $this->empID")->row();
        //$this->connDB->close();
    
        return $query;
    }

    /**
     * Count total delivery details
     */
    public function countDeliveryDetails($id)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_DeliverDetails_Count] $id")->result();
        //$this->connDB->close();
        
        return $query;
    }

    /**
     * Get list of delivery items to be shown in the table in the
     * delivery form view in json format
     */
    public function getJSONDeliveryDetails_View($id)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_DeliverDetails_Get] $id");
        //$this->connDB->close();
        
        return $query;
    }

    /**
     * Get Location ID
     */
    public function getLocationID($locCode)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_LocationID_Get] '$locCode'")->result();
        //$this->connDB->close();
        
        return $query[0]->Location_ID;
    }

    /**
     * Insert delivery details status
     */
    public function insertDelivertStatus($detail_ID, $qty, $status)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_DeliverDetStatus_Insert] $detail_ID, $status, '', $this->empID, $qty, 'Web'")->result();
        //$this->connDB->close();
        
        return $query;
    }

    /**
     * Saving invalid scanned barcode
     */
    public function insertInvalidBarcode($data)
    {
        $delID       = $data['delID'];
        $containerID = $data['cType'];
        $barCode     = $data['barCode'];
        $qty         = $data['qty'];
        
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_InvalidBarcodes_Insert] $delID, '$barCode', $containerID, $this->empID, $qty")->result();
        //$this->connDB->close();
    
        return $query;
        
    }
}

/* End of file Global_model.php 
 * Location: ./application/models/Global_model.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */