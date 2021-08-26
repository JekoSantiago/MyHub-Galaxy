<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receive_model extends CI_Model 
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
     * Update scanned barcode
     */
    public function receiveDeliveryItem($bcode, $id, $qty, $scanFrom)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_DeliverDetUnload_Insert] $id, '$bcode', $this->empID, $qty, '$scanFrom'")->result();
        //$this->connDB->close();
    
        return $query;
    }
    
	/**
     * Count receive items
     */
    public function countReceiveItems($id)
    {
	    sqlsrv_configure('WarningsReturnAsErrors', 0);
	    $query = $this->connDB->query("EXECUTE [sp_DeliverDetails_Get] $id");
        //$this->connDB->close();
    		
    	$count = 0;
    	foreach($query->result() as $row)
    	{
    		if($row->Unloaded != null) // && $row->Total == $row->RecQty)
    		{
    			$count += 1;
    		}
    	}

        return $count;
    }

    /**
     * Count receive items
     */
    public function countItemWithOutOffload($id)
    {
	    sqlsrv_configure('WarningsReturnAsErrors', 0);
	    $query = $this->connDB->query("EXECUTE [sp_DeliverDetails_Get] $id");
        //$this->connDB->close();
		
		$count = 0;
		foreach($query->result() as $row)
		{
			if($row->OffLoadQty == 0)
			{
				$count += 1;
			}
		}

        return $count;
    }

    /**
     * Count receive items
     */
    public function countItemWithOffload($id)
	{
		sqlsrv_configure('WarningsReturnAsErrors', 0);
		$query = $this->connDB->query("EXECUTE [sp_DeliverDetails_Get] $id");
        //$this->connDB->close();
		
		$count = 0;
		foreach($query->result() as $row)
		{
			if($row->OffLoadQty != 0)
			{
				$count += 1;
			}
		}

        return $count;
    }

    /**
     * Count container quantity
     */
    public function caseQty($del_ID, $barCode)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
		$query = $this->connDB->query("EXECUTE [sp_DeliverDetailsLoadQty_Get] $del_ID, '$barCode'")->result();
        //$this->connDB->close();
		
        return $query;
    }

    /**
     * Checking barcode existence
     */
    public function checkBarcode($code, $del_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_BarcodeCheck_Get] '$code', $del_ID")->result();
        //$this->connDB->close();
        
        return $query;
    }

    /**
     * Clear column receive
     */
    public function clearDeliveryDetailStatus($id)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_DeliverDetailsClear_Update] $id, $this->empID")->result();
        //$this->connDB->close();
        
        return $query;
    }

    /**
     * Update column ship date and receive date
     */
    public function modifyDeliveryData($delID, $shipDate, $receiveDate)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_DeliverShipRec_Update] $delID, $shipDate, $receiveDate")->result();
        //$this->connDB->close();
        
        return $query;
    }

    /**
     * Check Barcode status
     */
    public function barcodeStatus($barCode, $del_ID)
    {   
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_BarcodeStatus_Check] '$barCode', $del_ID")->result();
        //$this->connDB->close();
        
        return $query;
    }


    public function countScannedItems($id)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_DeliverDetails_Get] $id");
        //$this->connDB->close();

        // $count = 0;
        // foreach($query->result() as $k) :
        //     $c = 0;
        //     if($k->Unloaded != NULL) :
        //         if($k->OSC == 0) :
        //             $c = 1;
        //         else :
        //             if($k->Container_ID != 5) :
        //                 $c = 1;
        //             else : 
        //                 if($k->USC > 1) :
        //                     $c = 1;
        //                 else :
        //                     $c = 0;
        //                 endif;
        //             endif;
        //         endif;  
        //     endif;

        //     $count += $c;
        // endforeach;

        // return $count;

        $count = 0;
        $countUL = 0;
        $countOL = 0;
        foreach($query->result() as $k) :
            $c = 0;
            if($k->Unloaded != NULL) :
                if($k->ItemsReceived >= $k->Total) :
                    $c = 1;
                else :
                    $c = 0;
                endif;  
            endif;

            $count += $c;
            $countUL += $k->ItemsReceived;
            $countOL += $k->ItemsOffloaded;
        endforeach;

        return array('count'=>$count, 'countUL'=>$countUL, 'countOL' => $countOL);
        // return $count;
    }

    public function getJSONDD_Remarks($del_ID, $dd_ID, $isEmpty) 
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_DeliverDetails_Rmk_Get] $del_ID, $dd_ID, $isEmpty");
        //$this->connDB->close();
        
        return $query;
    }

    public function modifyDD_Remarks($delID, $dd_ID, $remarks)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_DeliverDetails_Rmk_Update] $delID, $dd_ID, '$remarks', $this->empID")->result();
        //$this->connDB->close();
        
        return $query;
    }

    public function updateDelTap($deliverID, $ddID, $qty, $status, $remarks)
    { 
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE sp_DeliveryDet_Status_update $deliverID, $ddID, $qty, $status, '$remarks', $this->empID")->result();
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
}

/* End of file Receive_model.php 
 * Location: ./application/models/Receive_model.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */