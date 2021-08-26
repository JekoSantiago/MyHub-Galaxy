<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model 
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
     * Search reports
     * dashboard view
     */
    public function searchDataJSON_View($data)
    {
        $controlNum  = $data['controlNum'];
        $dcID        = $data['dc_ID'];
        $locID       = $data['loc_ID'];
        $truckNo     = $data['truckNo'];
        $driverName  = $data['driverName'];
        $shipDate    = $data['shipDate'];
        $receiveDate = $data['receiveDate'];
        
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_RPT_Deliver_Get] 0, '$controlNum', $dcID, $locID, $truckNo, $driverName, 0, '$shipDate', '$receiveDate'");
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
     * Get report delivery details
     */
    public function viewReportDetails($del_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_RPT_Deliver_Get] $del_ID, '', 0, 0, 0, '', 0")->row();
        //$this->connDB->close();
    
        return $query;
    }

    /**
     * Compliance Reports
     */
    public function complianceReport($date)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $res = $this->connDB->query("EXECUTE [sp_RPT_LoadUnloadDuration_Get] '$date'")->result_array();
        //$this->connDB->close();

        $group = array();
        foreach($res as $key => $value) :
            $group[0][$value['ControlNo']][] = $value;
        endforeach;
        
        return $group;
    }

    public function logsReport($locID, $cDate)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_RPT_ScanLogs_Get] $locID, '$cDate'")->result();
        //$this->connDB->close();
        
        return $query;
    }

    public function overallBranchReport($datefrm, $dateto)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_RPT_OverallBranch_Get] '$datefrm', '$dateto'")->result();
        //$this->connDB->close();
        
        return $query;
    }

    public function overallAMReport($dcid, $bmid, $datefrm, $dateto)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_RPT_OverallAM_Get] $dcid, $bmid, '$datefrm', '$dateto'")->result();
        //$this->connDB->close();
        
        return $query;
    }

    public function overallACReport($amid, $datefrm, $dateto)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_RPT_OverallAC_Get] $amid, '$datefrm', '$dateto', $this->empID")->result();
        //$this->connDB->close();
        
        return $query;
    }

    public function overallStoreReport($acid, $datefrm, $dateto)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_RPT_OverallStore_Get] $acid, '$datefrm', '$dateto', $this->empID")->result();
        //$this->connDB->close();
        
        return $query;
    }

    public function overallDeliverReport($locID, $datefrm, $dateto)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_RPT_OverallDeliver_Get] $locID, '$datefrm', '$dateto', $this->empID")->result();
        //$this->connDB->close();
        
        return $query;
    }

    public function overallBranchReportCount($datefrm, $dateto)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_RPT_OverallBranch_Count] '$datefrm', '$dateto'")->result();
        //$this->connDB->close();
        
        return $query;
    }

    public function overallAMReportCount($dcid, $bmid, $datefrm, $dateto)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_RPT_OverallAM_Count] $dcid, $bmid, '$datefrm', '$dateto'")->result();
        //$this->connDB->close();
        
        return $query;
    }

    public function overallACReportCount($amid, $datefrm, $dateto)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_RPT_OverallAC_Count] $amid, '$datefrm', '$dateto'")->result();
        //$this->connDB->close();
        
        return $query;
    }

    public function overallStoreReportCount($acid, $datefrm, $dateto)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_RPT_OverallStore_Count] $acid, '$datefrm', '$dateto'")->result();
        //$this->connDB->close();
        
        return $query;
    }

    public function overallDeliverReportCount($locID, $datefrm, $dateto)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_RPT_OverallDeliver_Count] $locID, '$datefrm', '$dateto'")->result();
        //$this->connDB->close();
        
        return $query;
    }
    

    /**
     * Get DC ID - params user location ID
     */
    public function getDC_ID($locID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("[sp_DCID_Get] $locID")->result();
        //$this->connDB->close();
        
        return $query[0]->DC_ID;
    }
}

/* End of file Reports_model.php 
 * Location: ./application/models/Reports_model.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */