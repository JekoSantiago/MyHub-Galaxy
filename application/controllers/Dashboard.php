<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public $userID   = null;
    public $empID    = null;
    public $empName  = null;
    public $roleID   = null;
    public $posCode  = null;
    public $posID    = null;
    public $divID    = null;
    public $divCode  = null;
    public $compID   = null;
    public $deptID   = null;
    public $deptCode = null;
    public $locID    = null;
    public $locCode  = null;
    public $location = null;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->userID   = $this->mylibrary->decrypted($this->session->userdata('Usr_ID'));
        $this->empID    = $this->mylibrary->decrypted($this->session->userdata('Emp_Id'));
        $this->roleID   = $this->mylibrary->decrypted($this->session->userdata('Role_ID'));
        $this->posCode  = $this->mylibrary->decrypted($this->session->userdata('PositionLevelCode'));
        $this->posID    = $this->mylibrary->decrypted($this->session->userdata('PositionLevel_ID'));
        $this->divID    = $this->mylibrary->decrypted($this->session->userdata('Division_ID'));
        $this->divCode  = $this->mylibrary->decrypted($this->session->userdata('DivisionCode'));
        $this->compID   = $this->mylibrary->decrypted($this->session->userdata('Company_ID'));
        $this->deptID   = $this->mylibrary->decrypted($this->session->userdata('Department_ID'));
        $this->depCode  = $this->mylibrary->decrypted($this->session->userdata('DepartmentCode'));
        $this->locID    = $this->mylibrary->decrypted($this->session->userdata('Location_ID'));
        $this->locCode  = $this->mylibrary->decrypted($this->session->userdata('LocationCode'));
        $this->location = $this->mylibrary->decrypted($this->session->userdata('Location'));
        if($this->mylibrary->decrypted($this->session->userdata('Emp_Id')) == "")
        {
          redirect('denied', "location");
        }
    }

	public function index()
	{
        $acID       = 0;
        $amID       = 0;
        if($this->deptID == STORE_OPS_DEPT_ID) :
            $view = 'store';
            if($this->input->post('btnFilterSearch') == 'search') :
                $controlNum = $this->input->post('controlNum');
                $shipDate   = $this->input->post('shipDate');
                $truckNo    = ($this->input->post('truckNo') == "") ? 0 : $this->input->post('truckNo');
                $acID    = ($this->input->post('acID') == "") ? 0 : $this->input->post('acID');
                $amID    = ($this->input->post('amID') == "") ? 0 : $this->input->post('amID');
            else :
                $controlNum = "";
                $shipDate   = "";
                $truckNo    = 0;
            endif;

            if ($this->posID == 5) :
                $locID = $this->locID;
            else :
                $locID = 0;
            endif;

            $dcID = 0;

        else :
            $view = 'wh';
            if($this->input->post('btnFilterSearch') == 'search') :
                $controlNum = $this->input->post('controlNum');
                $shipTo     = ($this->input->post('shipTo') == "") ? 0 : $this->input->post('shipTo');
                $shipDate   = $this->input->post('shipDate');
                $truckNo    = ($this->input->post('truckNo') == "") ? 0 : $this->input->post('truckNo');
            else :
                $controlNum = "";
                $shipTo     = 0;
                $shipDate   = "";
                $truckNo    = 0;
            endif;

            $dcID = $this->locID;
            $locID = $shipTo;
        endif;

        $param = array(
            'dc_ID'       => $dcID,
            'loc_ID'      => $locID,
            'currentDate' => $shipDate,
            'controlNum'  => $controlNum,
            'truckNo'     => $truckNo,
            'AC_ID'       => $acID,
            'AM_ID'       => $amID
        );


        $items = $this->m_dashboard->getJSONData_View($param);
        $data['items']       = $items->result();
        $data['rowLocation'] = $this->m_global->getLocation($this->locID);
        $data['rowTruck']    = $this->m_global->getTruck();
        $data['del_Date']    = $shipDate;
        $data['rowAC']       = $this->m_global->getOperationHead($this->empID);
        $data['rowAM']       = $this->m_global->getOperationHead($this->empID);

        $this->template->set('title', TITLE .' | Dashboard Page');
    	$this->template->load('base_template', 'tpl/dashboard/'.$view, $data);
    }

    public function details()
    {
        $del_ID = base64_decode($this->uri->segment(3));
        $items = $this->m_dashboard->getJSONDeliveryDetails_View($del_ID);
        $data['trucks']  = $this->m_global->getTruck($this->locID);
        $data['drivers'] = $this->m_global->getDrivers($this->locID);
        $data['batch'] = $this->m_dashboard->getBatchDelivery($del_ID, 0);
        $data['dc_ID'] = $this->locID;
        $data['items'] = $items->result();
        $data['total'] = $items->num_rows();
        $data['cancelDate'] = $this->uri->segment(4);
        $data['deliver_ID'] = $this->uri->segment(3);
        $data['shipDate']   = $this->uri->segment(5);
        $data['recDate']    = $this->uri->segment(6);

        $this->load->view('tpl/modals/delivery_details', $data);
    }

    /**
     * Assign truck and driver form
     */
    public function assignTruckDriverForm()
    {
        $data['trucks']   = $this->m_global->getTruck($this->locID);
        $data['drivers'] = $this->m_global->getDrivers($this->locID);

        $this->load->view('tpl/modals/assign_truck_form', $data);
    }

    public function detailsForEmail($del_ID)
    {
        $items = $this->m_dashboard->getJSONDeliveryDetails_View($del_ID);
        $data['batch'] = $this->m_dashboard->getBatchDelivery($del_ID, 0);
        $data['deliver'] = $this->m_dashboard->getDeliver($del_ID);
        $data['items'] = $items->result();
        $data['total'] = $items->num_rows();
        return $data;
    }

    /**
     * Sending Email
     */
    public function sendEmail($to,$subject,$content)
    {
        $this->email->from(EMAIL_FROM, 'MyHub');
        $content = $this->myemail->headerTemplate().$content.$this->myemail->footerTemplate();
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($content);
        if ($this->email->send())
		{
            return 1;
		}
		return -1;
    }

    /**
     * Save assign truck and driver
     */

    public function assign()
    {

        $truck_ID  = $this->input->post('truck_ID');
        $driver_ID = $this->input->post('driverName');
        $del_ID    = base64_decode($this->input->post('del_ID'));
        $total     = $this->input->post('totalContainer');
        $totalScan = $this->input->post('totalScan');
        if($total != $totalScan) :
            $num = -1001;
            $msg = $this->mylibrary->errorMessages($num);
        else :
            $result = $this->m_dashboard->insertDetailAssignment($del_ID, $truck_ID, $driver_ID);
            $res = $result[0]->RETURN;
            if($res > 0) :

                //send notification to store
                $dataEmail = $this->detailsForEmail($del_ID);
                $storeEmail = $dataEmail['deliver'][0]->Email;
                if($storeEmail != null) :
                    $content   = $this->myemail->content(1,$dataEmail);
                     $this->sendEmail($storeEmail ,'[MyHub] Container Monitoring : For Receiving - '.$dataEmail['deliver'][0]->ControlNo,$content);
                endif;

                //send notification to warehouse
                $dcEmail = $dataEmail['deliver'][0]->DCEmail;
                if($dcEmail != null):
                    $content   = $this->myemail->content(1,$dataEmail);
                    $this->sendEmail($dcEmail ,'[MyHub] Container Monitoring : Delivery Details ('.$dataEmail['deliver'][0]->ControlNo.' - ['.$dataEmail['deliver'][0]->LocationCode.'] '.$dataEmail['deliver'][0]->Location.') ',$content);
                endif;

                $num = 1;
                $msg = 'Truck and driver successfully assigned.';
            else :
                $num = $res;
                $msg = $this->mylibrary->errorMessages($num);
            endif;
        endif;

        echo json_encode(array('num'=>$num, 'message'=>$msg));
    }

    public function test()
    {

        $dataEmail = $this->detailsForEmail('267');
        $content   = $this->myemail->content(1,$dataEmail);
        echo $this->myemail->headerTemplate();
        echo $content;
        echo $this->myemail->footerTemplate();
    }
    /**
     * Update assigned truck and driver
     */
    public function updateAssigned()
    {
        $del_ID    = base64_decode($this->input->post('id'));
        $batchNo   = $this->input->post('b');
        $truck_ID  = $this->input->post('t');
        $driver_ID = $this->input->post('d');

        $result = $this->m_dashboard->updateTruckDriver($del_ID, $batchNo, $truck_ID, $driver_ID);
        $res = $result[0]->RETURN;

        if($res > 0) :
            $num = 1;
            $msg = 'Truck and driver successfully updated.';
            $dataEmail = $this->detailsForEmail($del_ID);

            //send notification to store
            $storeEmail = $dataEmail['deliver'][0]->Email;
            if($storeEmail != null):
                $this->load->library('myemail');
                $content   = $this->myemail->content(1,$dataEmail);
                $this->sendEmail($storeEmail ,'[MyHub] Container Monitoring : For Receiving - '.$dataEmail['deliver'][0]->ControlNo.' with updated Truck/Driver',$content);
            endif;

            //send notification to warehouse
            $dcEmail = $dataEmail['deliver'][0]->DCEmail;
            if($dcEmail != null):
                $this->load->library('myemail');
                $content   = $this->myemail->content(1,$dataEmail);
                $this->sendEmail($dcEmail ,'[MyHub] Container Monitoring : Delivery Details ('.$dataEmail['deliver'][0]->ControlNo.' - ['.$dataEmail['deliver'][0]->LocationCode.'] '.$dataEmail['deliver'][0]->Location.') with updated Truck/Driver',$content);
             endif;

        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('num'=>$num, 'message'=>$msg));
    }
    // public function assign()
    // {
    //     $truck_ID  = $this->input->post('truck_ID');
    //     $driver_ID = $this->input->post('driverName');
    //     $loc_ID    = $this->input->post('location_ID');
    //     $del_ID    = base64_decode($this->input->post('del_ID'));
    //     $shipDate  = date('Y-m-d H:i:s');
    //     $total     = $this->input->post('totalContainer');
    //     $totalScan = $this->input->post('totalScan');

    //     if($total != $totalScan) :
    //         $num = -1001;
    //         $msg = $this->mylibrary->errorMessages($num);
    //     else :
    //         $result = $this->m_dashboard->updateDeliveryInfo($del_ID, $loc_ID, $truck_ID, $driver_ID, $shipDate);
    //         $res = $result[0]->RETURN;

    //         if($res > 0) :
    //             $num = 1;
    //             $msg = 'Truck and driver successfully assigned.';
    //         else :
    //             $num = $res;
    //             $msg = $this->mylibrary->errorMessages($num);
    //         endif;
    //     endif;

    //     echo json_encode(array('num'=>$num, 'message'=>$msg));
    // }

    /**
     * Cancellation of delivery
     */

    public function cancel()
    {
        $del_ID = $this->input->post('id');

        $result = $this->m_dashboard->cancelDelivery($del_ID);
        $res = $result[0]->RETURN;

        if($res > 0) :
            $num = 1;
            $msg = 'Delivery successfully cancelled.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('num'=>$num, 'message'=>$msg));
    }

    public function doAction()
    {
    	$status    = $this->input->post('s');
    	$qty       = $this->input->post('q');
        $detail_ID = $this->input->post('dd_ID');
        $action    = $this->input->post('a');

    	$result = $this->m_global->insertDelivertStatus($detail_ID, $qty, $status);
    	$res = $result[0]->RETURN;

    	if($res > 0) :
            $num = 1;
            $msg = 'Container successfully '.$action.'.';
        else :
            $num = $res;
            $msg = $this->mylibrary->errorMessages($num);
        endif;

        echo json_encode(array('res'=>$num, 'message'=>$msg));
    }

    /**
     * Load quantity form
     */
    public function quantity()
    {
        $this->load->view('tpl/modals/qty_off_on_load');
    }

    /**
     * Truck load summary
     */
    public function truckLoadSummary()
    {
        $ship_Date = $this->uri->segment(4);
        $data['items'] = $this->m_dashboard->truckSummary($this->locID, $ship_Date);

        $this->load->view('tpl/modals/truckload_summary', $data);
    }

}

/* End of file Dashboard.php
 * Location: ./application/controllers/Dashboard.php
 *
 * Author: Igor M. Lucmayon
 * Created Date: Nov. 15, 2019
 * Project Name: Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */
