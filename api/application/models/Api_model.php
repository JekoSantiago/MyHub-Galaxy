<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model
{
    public function __construct()
    {
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
    }

    public function checkUser($data)
    {
        $username = $data['user'];
        $userVersion = $data['userVersion'];
        $id       = null;

        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $connUserMgt = $this->load->database('dbUserMgt',true);
        $result   = $connUserMgt->query("sp_User_Get 0,'$username',0,0,'$userVersion'")->result();
        
        //$connUserMgt->close();

        return $result;
    }

    public function getDeliveryInfo($locID)
    {
        $curDate = date('Y-m-d');

        sqlsrv_configure('WarningsReturnAsErrors', 0);
                $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_Deliver_Get] 0, '', 0, $locID, 0, '', 0, '$curDate'")->result();
        //$this->connDB->close();

        return $query;
    }

   /**
     * Update scanned barcode
     */
    public function updateDeliveryDetails($delID, $bCode, $empID, $qty, $scanFrom)
    {
		sqlsrv_configure('WarningsReturnAsErrors', 0);
		$this->connDB = $this->load->database('dbATPIDeliver',true);
        $query= $this->connDB->query("EXECUTE [sp_DeliverDetUnload_Insert] $delID, '$bCode', $empID, $qty, '$scanFrom'")->result();
        //$this->connDB->close();

        return $query;
	}

	/**
     * Update column ship date and receive date
     */
    public function modifyDeliveryData($delID, $shipDate, $receiveDate)
    {
		sqlsrv_configure('WarningsReturnAsErrors', 0);
		$this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DeliverShipRec_Update] $delID, $shipDate, $receiveDate")->result();
        //$this->connDB->close();

        return $query;
	}

	public function countNoneReceiveItems($id)
	{
		sqlsrv_configure('WarningsReturnAsErrors', 0);
		$this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DeliverDetails_Get] $id");
        //$this->connDB->close();

		$count = 0;
		foreach($query->result() as $row)
		{
			if($row->Unloaded == null)
			{
				$count += 1;
			}
		}

        return $count;
    }

    /**
     * Get list of delivery items to be shown in the table in the
     * delivery form view in json format
     */
    public function getJSONDeliveryDetails_View($id)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DeliverDetails_Get] $id");
        //$this->connDB->close();

        return $query;
    }

    /**
     * Clear column receive
     */
    public function clearDeliveryDetailStatus($id, $empID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DeliverDetailsClear_Update] $id, $empID")->result();
        //$this->connDB->close();

        return $query;
    }

    /**
     * Check barcode if exists
     */
    public function checkBarcode($code, $del_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("[sp_BarcodeCheck_Get] '$code', $del_ID")->result();
        //$this->connDB->close();

        $res = $query[0]->RETURN;

        return $res;
    }

    /**
     * Get load quantity
     */
    public function getLoadQuantity($del_ID, $barCode)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
		$query = $this->connDB->query("EXECUTE [sp_DeliverDetailsLoadQty_Get] $del_ID, '$barCode'")->result();
        //$this->connDB->close();

        return $query;
    }

    /**
     * Get delivery notes
     */
    public function getDeliveryNotes($locID, $empID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_Deliver_Get] 0, '', 0, $locID, 0, '', $empID, null, null, 0, 0, null")->result();
        //$this->connDB->close();

        return $query;
    }

    /**
     * Get selected delivery details
     */
    public function selectedDeliveryInfo($controlNo, $locID, $date)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_Deliver_Get] 0, '$controlNo', 0, $locID, 0, '', 0, '$date'")->result();
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

        $res = $query[0]->RETURN;

        return $res;
    }
    
    
    /*
    * WAREHOUSE API MODEL
    */
    
    public function getDeliveryList($empID)
    { 
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
       
        $query = $this->connDB->query("EXECUTE [ATPI_Deliver].dbo.[sp_API_Deliver_Get] 0,'','$empID'")->result();
        //$this->connDB->close(); 
        return $query;
    }
    
    public function scanForDelivery($deliveryID,$barcode,$containerID,$empID,$qty)
    { 
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [ATPI_Deliver].dbo.[sp_DeliverDetail_Insert] $deliveryID,'$barcode',$containerID,$empID,$qty")->result(); 
        $res = $query[0]->RETURN; 
        //$this->connDB->close(); 
        return $res;
    }
    public function getBarcodeList($deliveryID)
    { 
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
       
        $query = $this->connDB->query("EXECUTE [ATPI_Deliver].dbo.[sp_DeliverDetails_Get] $deliveryID")->result();
        //$this->connDB->close(); 
        return $query;
    }

    public function updateQty($deliverID,$barcode,$qty,$detStatus,$empID)
    { 
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
       
        $query = $this->connDB->query("EXECUTE [ATPI_Deliver].dbo.[sp_DeliverDetStatus_Update] $deliverID,'$barcode',$qty,$detStatus,$empID")->result();
        //$this->connDB->close(); 
        return $query;
    }

    public function updateRemarks($deliverID,$deliverDetailID,$remarks,$empID)
    { 
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
       
        $query = $this->connDB->query("EXECUTE [ATPI_Deliver].dbo.[sp_DeliverDetails_Rmk_Update] $deliverID,$deliverDetailID,'$remarks',$empID")->result();
        //$this->connDB->close(); 
        return $query;
    }

    public function getContainerList()
    { 
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
       
        $query = $this->connDB->query("EXECUTE [ATPI_Deliver].dbo.[sp_Container_Get]")->result();
        //$this->connDB->close(); 
        return $query;
    }

     /**
     * Get list of batches per delivery
     */
    public function getBatchDelivery($del_ID, $bn)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_Batch_Get] $del_ID, $bn")->result();
        //$this->connDB->close();
        
        return $query;
    }

    public function getDeliver($deliverID)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_Deliver_Get] $deliverID")->result();
        return $query;
    }
}
