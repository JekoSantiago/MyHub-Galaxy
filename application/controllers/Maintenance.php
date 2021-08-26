<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller 
{
    public $empID    = null;
    public $roleID   = null;
    public $posID    = null;
    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila'); 
        $this->empID    = $this->mylibrary->decrypted($this->session->userdata('Emp_Id'));
        $this->roleID   = $this->mylibrary->decrypted($this->session->userdata('Role_ID'));
        $this->posID    = $this->mylibrary->decrypted($this->session->userdata('PositionLevel_ID'));
    }
    
	public function index()
    {
    	$data['container'] = $this->m_maintenance->getContainer();
    	$data['cType']     = $this->m_maintenance->getContainerType();
    	$data['cColor']    = $this->m_maintenance->getContainerColor();
    	$data['colorOption'] = $this->m_maintenance->containerColorOption();
    	$data['typeOption']  = $this->m_maintenance->containerTypeOption();
    	
    	$this->template->set('title', TITLE .' | Maintenance Page');
    	$this->template->load('base_template', 'tpl/maintenance/container', $data);
    }

    public function saveContainer()
    {
    	$con_Name  = $this->input->post('contName'); 
    	$con_Type  = $this->input->post('conType');
    	$con_Color = $this->input->post('contColor');

    	$result = $this->m_maintenance->insertContainer($con_Name, $con_Type, $con_Color);
    	$res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Container successfully save.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg));
    }

    public function editContainer()
    {
    	$c_ID = $this->uri->segment(3);

    	$data['info'] = $this->m_maintenance->containerDetails($c_ID);
    	$data['colorOption'] = $this->m_maintenance->containerColorOption();
    	$data['typeOption']  = $this->m_maintenance->containerTypeOption();

    	$this->load->view('tpl/maintenance/modals/edit_container', $data);
    }

    public function updateContainer()
    {
    	$con_Name  = $this->input->post('editContName'); 
    	$con_Type  = $this->input->post('editConType');
    	$con_Color = $this->input->post('editContColor');
    	$c_ID      = $this->input->post('c_ID');

    	$result = $this->m_maintenance->updateContainer($c_ID, $con_Name, $con_Type, $con_Color);
    	$res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Container successfully update.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg));
    }

    public function saveColor()
    {
    	$color = $this->input->post('c_Color');

    	$result = $this->m_maintenance->insertContainerColor($color);
        $res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Container color successfully save.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg));
    }

    public function editColor()
    {
    	$colorID = $this->uri->segment(4);
    	$data['info'] = $this->m_maintenance->containerColorDetails($colorID);

    	$this->load->view('tpl/maintenance/modals/edit_color', $data);
    }

    public function updateColor()
    {
    	$color   = $this->input->post('editColor');
    	$colorID = $this->input->post('colorID');

    	$result = $this->m_maintenance->updateContainerColor($colorID, $color);
        $res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Container color successfully updated.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg));
    }

    public function saveType()
    {
    	$type = $this->input->post('c_Type');

    	$result = $this->m_maintenance->insertContainerType($type);
        $res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Container type successfully save.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg));
    }

    public function editType()
    {
    	$typeID = $this->uri->segment(4);
    	$data['info'] = $this->m_maintenance->containerTypeDetails($typeID);

    	$this->load->view('tpl/maintenance/modals/edit_type', $data);
    }

    public function updateType()
    {
    	$type   = $this->input->post('editType');
    	$typeID = $this->input->post('typeID');

    	$result = $this->m_maintenance->updateContainerType($typeID, $type);
        $res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Container type successfully updated.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg));
    }


    public function doAction()
    {
    	$status = ($this->uri->segment(3) == 'activate') ? 1 : 0;
    	$from   = $this->input->post('f');
    	$id     = $this->input->post('theID');

    	if($from == 'color')
    	{
    		$text = 'Container color ';
    		$url_link = 'container';
    	}
    	elseif($from == 'type')
    	{
    		$text = 'Container type ';
    		$url_link = 'container';
    	}
    	elseif($from == 'operator')
    	{
    		$text = 'Operator ';
    		$url_link = 'truck';
    	}
    	elseif($from == 'truck')
    	{
    		$text = 'Truck ';
    		$url_link = 'truck';
    	}
    	elseif($from == 'driver')
    	{
    		$text = 'Driver ';
    		$url_link = 'drivers';
    	}
    	else
    	{
    		$text = 'Container ';
    		$url_link = 'container';
    	}

    	$result = $this->m_maintenance->doAction($from, $id, $status);
    	$res = $result[0]->RETURN;

    	if($res > 0) :
            $num = 1;
            $msg = $text.'successfully '.$this->uri->segment(3).'.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg, 'link'=>$url_link));
    }


    public function truck()
    {
    	$data['trucks']   = $this->m_maintenance->getTrucks();
    	$data['truckOps'] = $this->m_maintenance->getTruckOps();
    	$data['operatorOption'] = $this->m_maintenance->truckOperatorOption();
    	$data['dcOption'] = $this->m_maintenance->dcOptions();

    	$this->template->set('title', TITLE .' | Maintenance Page');
    	$this->template->load('base_template', 'tpl/maintenance/truck', $data);
    }

    public function saveTruck()
    {
    	$plateNo  = $this->input->post('plateNo'); 
    	$op_ID = $this->input->post('truckOps');
    	$dc_ID    = $this->input->post('dc_ID');

    	$result = $this->m_maintenance->insertTruck($op_ID, $plateNo, $dc_ID);
    	$res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Truck successfully save.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg));
    }

    public function editTruck()
    {
    	$truckID = $this->uri->segment(4);
    	$data['info'] = $this->m_maintenance->truckDetails($truckID);
    	$data['operatorOption'] = $this->m_maintenance->truckOperatorOption();
    	$data['dcOption'] = $this->m_maintenance->dcOptions();

    	$this->load->view('tpl/maintenance/modals/edit_truck', $data);
    }

    public function updateTruck()
    {
    	$plateNo = $this->input->post('editPlateNo'); 
    	$opsID   = $this->input->post('editTruckOps');
    	$dc_ID   = $this->input->post('editDC_ID');
    	$truckID = $this->input->post('truck_ID');

    	$result = $this->m_maintenance->updateTruck($truckID, $opsID, $plateNo, $dc_ID);
    	$res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Truck successfully update.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg));
    }


    public function saveOperator()
    {
    	$opsName = $this->input->post('opsName');

    	$result = $this->m_maintenance->insertOperator($opsName);
        $res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Operator successfully save.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg));
    }

    public function editOperator()
    {
    	$opsID = $this->uri->segment(4);
    	$data['info'] = $this->m_maintenance->operatorDetails($opsID);

    	$this->load->view('tpl/maintenance/modals/edit_operator', $data);
    }

    public function updateOperator()
    {
    	$opsName = $this->input->post('editOpsName');
    	$opsID   = $this->input->post('ops_ID');

    	$result = $this->m_maintenance->updateOperator($opsID, $opsName);
        $res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Operator successfully updated.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg));
    }

    public function drivers()
    {
    	$data['drivers']   = $this->m_maintenance->getDrivers();
    	$data['dcOption'] = $this->m_maintenance->dcOptions();

    	$this->template->set('title', TITLE .' | Maintenance Page');
    	$this->template->load('base_template', 'tpl/maintenance/driver', $data);
    }

    public function saveDriver()
    {
    	$licenseNo  = $this->input->post('licenseNo'); 
    	$driverName = $this->input->post('driverName');
    	$dc_ID      = $this->input->post('dc_ID');

    	$result = $this->m_maintenance->insertDriver($licenseNo, $driverName, $dc_ID);
    	$res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Driver successfully save.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg));
    }

    public function editDriver()
    {
    	$truckID = $this->uri->segment(4);
    	$data['info'] = $this->m_maintenance->driverDetails($truckID);
    	$data['dcOption'] = $this->m_maintenance->dcOptions();

    	$this->load->view('tpl/maintenance/modals/edit_driver', $data);
    }

    public function updateDriver()
    {
    	$licenseNo  = $this->input->post('editLicenseNo'); 
    	$driverName = $this->input->post('editDriverName');
    	$dc_ID      = $this->input->post('editDC_ID');
    	$driverID   = $this->input->post('driver_ID');

    	$result = $this->m_maintenance->updateDriverk($driverID, $licenseNo, $driverName, $dc_ID);
    	$res = $result[0]->RETURN;
        
        if($res > 0) :
            $num = 1;
            $msg = 'Driver successfully update.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg));
    }
}

/* End of file Maintenance.php 
 * Location: ./application/controllers/Maintenance.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */