<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model
{
    public function __construct()
    {
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
    }

    /**
     * Get user details
     */
    public function getUser($username)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_API_User_get] '$username'")->result();
        return $query;
    }

    /**
     * Get delivery list
     */
    public function getDeliver($date, $locID, $empID)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_Delivery_get] '$date', $locID, $empID")->result();
        return $query;
    }

    /**
     * Get delivery details WH
     */
    public function getWHDeliverDetails($deliverID, $empID)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DeliveryDetails_WH_get] $deliverID, $empID")->result();
        return $query;
    }

    /**
     * Get delivery details zone WH
     */
    public function getWHDeliverDetailsZone($date, $locID, $barcode, $empID)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DeliveryDetails_WH_Zone_get] '$date', $locID, '$barcode', $empID")->result();
        return $query;
    }

    /**
     * Update barcode's container type
     */
    public function updateWHContainer($deliverID, $barcode, $typeID, $qty, $remarks, $empID)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DeliveryDetails_WH_Cont_update] $deliverID, '$barcode', $typeID, $qty, '$remarks', $empID")->result();
        return $query;
    }

    // /**
    //  * Get delivery details loaded
    //  */
    // public function getDeliverDetailsLoad($empID, $isLoaded, $controlNo, $loc)
    // {     
    //     sqlsrv_configure('WarningsReturnAsErrors', 0);
    //     $this->connDB = $this->load->database('dbATPIDeliver',true);
    //     $query = $this->connDB->query("EXECUTE [sp_DeliveryDetails_LD_get] $empID, $isLoaded, '$controlNo', '$loc'")->result();
    //     return $query;
    // }

    /**
     * Get deliveries loaded
     */
    public function getDeliverLoad($empID, $isLoaded, $controlNo, $loc)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_Delivery_LD_get] $empID, $isLoaded, '$controlNo', '$loc'")->result();
        return $query;
    }

    /**
     * Get deliveries details by zone
     */
    public function getDeliverDetailsZone($deliverID, $empID)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DeliveryDetails_Zone_get] $deliverID, $empID")->result();
        return $query;
    }

    /**
     * Get deliveries details container by zone
     */
    public function getDeliverDetailsZoneCont($deliverID, $empID)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DeliveryDetails_ZoneCont_get] $deliverID, $empID")->result();
        return $query;
    }

     /**
     * Get deliveries details by container
     */
    public function getDeliverDetailsCont($deliverID, $empID)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DeliveryDetails_Container_get] $deliverID, $empID")->result();
        return $query;
    }
    
    /**
     * Get list of store locations
     */
    public function getStoreLocation($locID, $code, $location)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_Location_get] $locID, '$code', '$location'")->result();
        return $query;
    }

    /**
     * Update delivery status
     */
    public function updateDeliverDetailStatus($deliverID, $barcode, $qty, $status, $empID)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DeliveryDetails_Status_Update] $deliverID, '$barcode',  $qty, $status, $empID")->result();
        return $query;
    }

    /**
     * Get trucks
     */
    public function getTruck($truckID, $truckNo)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_Truck_get] $truckID, '$truckNo'")->result();
        return $query;
    }

    /**
     * Get drivers
     */
    public function getDriver($driverID, $name)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_Driver_get] $driverID, '$name'")->result();
        return $query;
    }

    /**
     * Insert detail assignment
     */
    public function insertDetailAssignment($deliverID, $truckID, $driverID, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DetailAssignment_insert] $deliverID, $truckID, $driverID, $empID")->result();
        return $query;
    }

    /**
     * Insert detail assignment
     */
    public function updateDetailAssignment($deliverID, $batch, $truckID, $driverID, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DetailAssignment_update] $deliverID, $batch, $truckID, $driverID, $empID")->result();
        return $query;
    }

    /**
     * Update deliver shipping/cancel
     */
    public function updateDeliver($deliverID, $scannedBy, $shipBy, $cancelBy, $isComplete, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_Deliver_update] $deliverID, $scannedBy, $shipBy, $cancelBy, $isComplete, $empID")->result();
        return $query;
    }

    /**
     * Get deliver barcode
     */
    public function getDeliverBarcode($deliverID, $status, $zone, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DeliverBarcode_get] $deliverID, $status, '$zone', $empID")->result();
        return $query;
    }

    /**
     * Get deliver details grouped by container type
     */
    public function getDeliverDetailsContType($deliverID, $empID, $batchNo)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE [sp_DeliveryDetails_ContType_get] $deliverID, $empID, $batchNo")->result();
        return $query;
    }

    /**
     * Get deliver batches
     */
    public function getDeliverBatches($deliverID, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE sp_DeliveryDetails_Batch_get $deliverID, $empID")->result();
        return $query;
    }

    /**
     * Get deliver witness
     */
    public function getDeliverDetailWitness($deliverID, $batchNo, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE sp_DetailWitness_get $deliverID, $batchNo, $empID")->result();
        return $query;
    }

    /**
     * Update deliver witness
     */
    public function updateDeliverDetailWitness($deliverID, $batchNo, $isnowit, $witness, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE sp_DetailWitness_update $deliverID, $batchNo, $isnowit, '$witness', $empID")->result();
        return $query;
    }

    /**
     * Get list of containers with ischeck
     */
    public function getDelDetContainer($deliverID, $status, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE sp_DelDet_Container_get $deliverID, $status, $empID")->result();
        return $query;
    }

    /**
     * Update container using deliver detail id
     */
    public function updateDelDetWHContainer($deliverID, $ddID, $typeID, $qty, $remarks, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE sp_DeliveryDet_WH_Cont_update $deliverID, $ddID, $typeID, $qty, '$remarks', $empID")->result();
        return $query;
    }

    /**
     * Update deliver status using deliver detail id
     */
    public function updateDelDetStatus($deliverID, $ddID, $qty, $status, $remarks, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE sp_DeliveryDet_Status_update $deliverID, $ddID, $qty, $status, '$remarks', $empID")->result();
        return $query;
    }

    /**
     * Update detailAssignment shipped
     */
    public function updateDetailAssignmentShip($deliverID, $batchNo, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE sp_DetailAssignment_ship $deliverID, $batchNo, $empID")->result();
        return $query;
    }

    /**
     * Get count per deliver
     */
    public function getDeliverCount($deliverID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE sp_Deliver_Count_get $deliverID")->result();
        return $query;
    }

    /************
     * STORE SIDE
     ************/

     /**
     * Get user details
     */
    public function getStoreUser($username, $version)
    {     
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbUserMgt',true);
        $query = $this->connDB->query("EXECUTE [sp_User_Get] 0, '$username', 1, 0, '$version'")->result();
        return $query;
    }

     /**
     * Get list of unloading delivery
     */
    public function getDeliverUnloading($empID, $locID, $isUnloaded, $controlNo)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliverStore',true);
        $query = $this->connDB->query("EXECUTE sp_Delivery_UL_get $empID, $locID, $isUnloaded, '$controlNo'")->result();
        return $query;
    }

    /**
     * Update deliver status using DeliverDetail_ID
     */
    public function updateDeliverDetStatus($deliverID, $dd_ID, $qty, $detStatusID, $remarks, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliverStore',true);
        $query = $this->connDB->query("EXECUTE sp_DeliveryDet_Status_update $deliverID, $dd_ID, $qty, $detStatusID, '$remarks', $empID")->result();
        return $query;
    }

    /**
     * Get list of container with check
     */
    public function getDeliverContChecked($deliverID, $status, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliverStore',true);
        $query = $this->connDB->query("EXECUTE sp_DelDet_Container_get $deliverID, $status, $empID")->result();
        return $query;
    }

    /**
     * Update delivery witness and received details
     */
    public function updateDeliverWitness($deliverID, $batchNo, $witness, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliverStore',true);
        $query = $this->connDB->query("EXECUTE sp_DetailWitness_update $deliverID, $batchNo, '$witness', $empID")->result();
        return $query;
    }

    /**
     * Update delivery info
     */
    public function updateDeliverInfo($deliverID, $receivedBy, $isReceived)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliverStore',true);
        $query = $this->connDB->query("EXECUTE sp_Deliver_Update $deliverID, $receivedBy, $isReceived")->result();
        return $query;
    }

    /**
     * Get list of Batches
     */
    public function getStoreDeliverBatches($deliverID, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliverStore',true);
        $query = $this->connDB->query("EXECUTE sp_DeliveryDetails_Batch_get $deliverID, $empID")->result();
        return $query;
    }

    /**
     * Get list of unloaded delivery details group by container
     */
    public function getUnloadedDDByCont($deliverID, $empID, $batchNo)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliverStore',true);
        $query = $this->connDB->query("EXECUTE sp_DeliveryDetails_ContType_get $deliverID, $empID, $batchNo")->result();
        return $query;
    }

    /**
     * Get delivery witness
     */
    public function getDeliverWitness($deliverID, $batchNo, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliverStore',true);
        $query = $this->connDB->query("EXECUTE sp_DetailWitness_get $deliverID, $batchNo, $empID")->result();
        return $query;
    }

    /**
     * Receiving of details per batch
     */
    public function updateDetAssignmentReceive($deliverID, $batchNo, $empID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliverStore',true);
        $query = $this->connDB->query("EXECUTE sp_DetailAssignment_receive $deliverID, $batchNo, $empID")->result();
        return $query;
    }

    /**
     * Get deliver count
     */
    public function getStoreDeliverCount($deliverID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliverStore',true);
        $query = $this->connDB->query("EXECUTE sp_Deliver_Count_get $deliverID")->result();
        return $query;
    }

    /**
     * Get WAREHOUSE/ISSUING DOS Details
     */
    public function getDOSContent($deliverDetailID,$userEmpID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliver',true);
        $query = $this->connDB->query("EXECUTE sp_DeliveryDetContent_get  $deliverDetailID,$userEmpID")->result();
        return $query;
    }

    /**
     * Get STORE DOS Details
     */
    public function getStoreDOSContent($deliverDetailID,$userEmpID)
    {    
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliverStore',true);
        $query = $this->connDB->query("EXECUTE sp_DeliveryDetContent_get  $deliverDetailID,$userEmpID")->result();
        return $query;
    }

    /**
     * Get Guard Device Info
     */
    public function getGuardDevice($deviceID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliverStore',true);
        $query = $this->connDB->query("EXECUTE [ATPI_Truck].dbo.[sp_PR_GuardDevice_Get] '$deviceID'")->result();
        return $query;
    }

    /**
     * Insert Guard Deliver Log
     */
    public function insertDeliverLog($truckID,$logByID,$locationID,$longitude,$latitude,$os)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $this->connDB = $this->load->database('dbATPIDeliverStore',true);
        $query = $this->connDB->query("EXECUTE [ATPI_Truck].dbo.[sp_DeliverLog_insert] $truckID,$logByID,$locationID,'$longitude','$latitude','$os',1")->result();
        return $query;
    }

    public function getTaraZone($deliverID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_TaraZone_get] $deliverID")->result();
        return $query;
    }

    public function getTaraColor($deliverID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_TaraColor_get] $deliverID")->result();
        return $query;
    }

    public function getStoreEmail($delID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_StoreEmail_get] $delID")->result();
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
