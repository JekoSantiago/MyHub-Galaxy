<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
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
     * Get list of deliver info to be shown in the table in the
     * dashboard view in json format
     */
    public function getJSONData_View($data)
    {
        $dcID       = $data['dc_ID'];
        $locID      = $data['loc_ID'];
        $curDate    = $data['currentDate'];
        $truckNo    = $data['truckNo'];
        $controlNum = $data['controlNum'];
        $acID       = $data['AC_ID'];
        $amID       = $data['AM_ID'];

        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_Deliver_Get] 0, '$controlNum', $dcID, '$locID', '$truckNo', '', $this->empID, '$curDate', '', '$acID', '$amID', $this->empID");
        //$this->connDB->close();


        return $query;
    }

    /**
     * Get list of delivery items to be shown in the table in the
     * delivery form view in json format
     */
    public function getJSONDeliveryDetails_View($del_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_DeliverDetails_Get] $del_ID");
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

    /**
     * Update deliver info
     */
    public function updateDeliveryInfo($del_ID, $locID, $truck_ID, $driver_ID, $shipDate)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_Deliver_Update] $del_ID, $locID, $truck_ID, $driver_ID, '$shipDate', $this->empID")->result();
        //$this->connDB->close();

        return $query;
    }

    /**
     * Update batch truck and driver
     */
    public function updateTruckDriver($del_ID, $batchNo, $truck_ID, $driver_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_DetailAssignment_Update] $del_ID, $batchNo, $truck_ID, $driver_ID, $this->empID")->result();
        //$this->connDB->close();

        return $query;
    }

    /**
     * Insert Truck Detail Assignment
     */
    public function insertDetailAssignment($delID, $truck_ID, $driver_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_DetailAssignment_Insert] $delID, $truck_ID, $driver_ID, $this->empID")->result();
        //$this->connDB->close();

        return $query;
    }

    /**
     * Cancel delivery
     */
    public function cancelDelivery($del_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_DeliverCan_Update] $del_ID, $this->empID")->result();
        //$this->connDB->close();

        return $query;
    }

    /**
     * Truck load summary
     */
    public function truckSummary($locID, $shipDate)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_TruckSummary_Get] $locID, '$shipDate'")->result();
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

/* End of file Dashboard_model.php
 * Location: ./application/models/Dashboard_model.php
 *
 * Author: Igor M. Lucmayon
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */
