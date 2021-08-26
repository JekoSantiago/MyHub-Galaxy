<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring_model extends CI_Model 
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
    public function getMonitoring($dateFrom, $dateTo, $mode)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_Deliver_Monitor] '$dateFrom', '$dateTo', $mode")->result();
        //$this->connDB->close();
        
    
        return $query;
    }

    public function getActivities()
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_Activity_Get]");
        //$this->connDB->close();
        
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