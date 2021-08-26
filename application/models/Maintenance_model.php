<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance_model extends CI_Model 
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

    public function getContainerColor()
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_ContainerColor_Get]")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function insertContainerColor($color)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_ContainerColor_Insert] '$color', $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function containerColorDetails($colorID)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_ContainerColor_Get] $colorID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function updateContainerColor($id, $color)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_ContainerColor_Update] $id, '$color', $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function getContainerType()
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_ContainerType_Get]")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function insertContainerType($type)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_ContainerType_Insert] '$type', $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function containerTypeDetails($typeID)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_ContainerType_Get] $typeID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function updateContainerType($id, $type)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_ContainerType_Update] $id, '$type', $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function getContainer()
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Container2_Get]")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function insertContainer($con_Name, $con_Type, $ccon_Color)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Container_Insert] '$con_Name',  $con_Type, $ccon_Color, $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function containerDetails($c_ID)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_Container2_Get] $c_ID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function updateContainer($c_ID, $con_Name, $con_Type, $con_Color)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_Container_Update] $c_ID, '$con_Name', $con_Type, $con_Color, $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function doAction($from, $id, $status)
    {	
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
    	if($from == 'color')
    	{
        	$query= $this->connDB->query("EXECUTE [sp_ContainerColor_Update] $id, '', $this->empID, $status")->result();
        }
        elseif($from == 'type')
        {
        	$query= $this->connDB->query("EXECUTE [sp_ContainerType_Update] $id, '', $this->empID, $status")->result();
        }
        elseif($from == 'operator')
        {
        	$query= $this->connDB->query("EXECUTE [sp_Operator_Update] $id, '', $this->empID, $status")->result();
        }
        elseif($from == 'truck')
        {
        	$query= $this->connDB->query("EXECUTE [sp_Truck_Update] $id, 0, '', 0, $this->empID, $status")->result();
        }
        elseif($from == 'driver')
        {
        	$query= $this->connDB->query("EXECUTE [sp_Driver_Update] $id, '', '', 0, $this->empID, $status")->result();
        }
        else
        {
        	$query= $this->connDB->query("EXECUTE [sp_Container_Update] $id, '', 0, 0, $this->empID, $status")->result();
        }

        //$this->connDB->close();
    
        return $query;
    }


    public function containerTypeOption()
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_ContainerType_Get] 0 , '', 1")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function containerColorOption()
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_ContainerColor_Get] 0, '', 1")->result();
        //$this->connDB->close();
    
        return $query;
    }


    public function getTrucks()
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Truck_Get]")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function insertTruck($op_ID, $plateNo, $dc_ID)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Truck_Insert] $op_ID, '$plateNo', $dc_ID, $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function updateTruck($truckID, $opsID, $plateNo, $dc_ID)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Truck_Update] $truckID, $opsID, '$plateNo', $dc_ID, $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function truckDetails($truck_ID)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Truck_Get] 0, null, $truck_ID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function getTruckOps()
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Operator_Get]")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function insertOperator($ops_Name)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Operator_Insert] '$ops_Name', $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function operatorDetails($ops_ID)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Operator_Get] $ops_ID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function updateOperator($opsID, $opsName)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_Operator_Update] $opsID, '$opsName', $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }


    public function truckOperatorOption()
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Operator_Get] 0, '', 1")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function dcOptions()
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_DC_Get]")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function getDrivers()
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Driver_Get]")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function insertDriver($licenseNo, $driverName, $dc_ID)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Driver_Insert] '$licenseNo', '$driverName', $dc_ID, $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function driverDetails($driver_ID)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Driver_Get] $driver_ID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function updateDriverk($driverID, $licenseNo, $driverName, $dc_ID)
    {
    	sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Driver_Update] $driverID, '$licenseNo', '$driverName', $dc_ID, $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }
}

/* End of file Maintenance_model.php 
 * Location: ./application/models/Maintenance_model.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */