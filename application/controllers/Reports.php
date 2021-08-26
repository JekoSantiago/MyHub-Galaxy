<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller 
{
    public $empID = null;
    public $locID = null;
    public $deptID = null;
    public $posID  = null;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->empID    = $this->mylibrary->decrypted($this->session->userdata('Emp_Id'));
        $this->locID    = $this->mylibrary->decrypted($this->session->userdata('Location_ID'), true);
        $this->deptID   = $this->mylibrary->decrypted($this->session->userdata('Department_ID'), true);
 	    $this->posID    = $this->mylibrary->decrypted($this->session->userdata('PositionLevel_ID'), true);
    }
    
	public function index()
	{
        if($this->deptID == 17) :
        
            if($this->input->post('btnFilterSearch') == "search") :

                $controlNum  = $this->input->post('controlNum');
                $shipDate    = $this->input->post('shipDate');
                $receiveDate = $this->input->post('receiveDate');
                $truckNo     = ($this->input->post('truckNo') == "") ? 0 : $this->input->post('truckNo');
                $driverName  = ($this->input->post('driverName') == "") ? 0 : $this->input->post('driverName');

            elseif($this->input->post('btnFilterSearch') == "export") :
                
                $controlNum  = $this->input->post('controlNum');
                $shipDate    = ($this->input->post('shipDate') == "") ? date('Y-m-d') : $this->input->post('shipDate');
                $receiveDate = $this->input->post('receiveDate');
                $truckNo     = ($this->input->post('truckNo') == "") ? 0 : $this->input->post('truckNo');
                $driverName  = ($this->input->post('driverName') == "") ? 0 : $this->input->post('driverName');
                $dcID = $this->m_content->getDC_ID($this->locID);
                $locID = $this->locID;

                $rowData = array (
                    'dc_ID'       => $dcID, 
                    'loc_ID'      => $locID, 
                    'shipDate'    => $shipDate,
                    'receiveDate' => $receiveDate, 
                    'controlNum'  => $controlNum,
                    'truckNo'     => $truckNo,
                    'driverName'  => $driverName
                );

                $this->exportExcelAll($rowData, 'store');
            
            else :
                
                $controlNum  = '';
                $shipDate    = date('Y-m-d');
                $receiveDate = '';
                $truckNo     = 0;
                $driverName  = 0;
            
            endif;

            $dcID = $this->m_reports->getDC_ID($this->locID);
            $locID = $this->locID;
            $view = 'store';

        else :

            if($this->input->post('btnFilterSearch') == "search") :
                
                $controlNum  = $this->input->post('controlNum');
                $dc          = ($this->input->post('dcID') == "") ? 0 : $this->input->post('dcID');
                $location    = ($this->input->post('shipTo') == "") ? 0 : $this->input->post('shipTo');
                $shipDate    = $this->input->post('shipDate');
                $receiveDate = $this->input->post('receiveDate');
                $truckNo     = ($this->input->post('truckNo') == "") ? 0 : $this->input->post('truckNo');
                $driverName  = ($this->input->post('driverName') == "") ? 0 : $this->input->post('driverName');
		        $locID       = $location;
            
            elseif($this->input->post('btnFilterSearch') == "export") :
                
                $controlNum  = $this->input->post('controlNum');
                $dc          = ($this->input->post('dcID') == "") ? 0 : $this->input->post('dcID');
                $location    = ($this->input->post('shipTo') == "") ? 0 : $this->input->post('shipTo');
                $shipDate    = ($this->input->post('shipDate') == "") ? date('Y-m-d') : $this->input->post('shipDate');
                $receiveDate = $this->input->post('receiveDate');
                $truckNo     = ($this->input->post('truckNo') == "") ? 0 : $this->input->post('truckNo');
                $driverName  = ($this->input->post('driverName') == "") ? 0 : $this->input->post('driverName');
                $dcID = $this->locID;
                $locID = $location;

                $rowData = array (
                    'dc_ID'       => $dcID, 
                    'loc_ID'      => $locID, 
                    'shipDate'    => $shipDate,
                    'receiveDate' => $receiveDate, 
                    'controlNum'  => $controlNum,
                    'truckNo'     => $truckNo,
                    'driverName'  => $driverName
                );

                $this->exportExcelAll($rowData, 'wh');
            
            else :
                
                $controlNum  = '';
                $dc          = 0;
                $location    = 0;
                $shipDate    = date('Y-m-d');
                $receiveDate = '';
                $truckNo     = 0;
                $driverName  = 0;
            
            endif;

            if($this->deptID == 8) :                
                $dcID = $dc;    
            else :
                $dcID = $this->locID;
            endif;

            $locID = $location;            
            $view = 'index';
            
        endif;

        $param = array(
            'dc_ID'       => $dcID, 
            'loc_ID'      => $locID, 
            'shipDate'    => $shipDate,
            'receiveDate' => $receiveDate, 
            'controlNum'  => $controlNum,
            'truckNo'     => $truckNo,
            'driverName'  => $driverName
        );
	
        $data['rowLocation'] = $this->m_global->getLocation($dcID);
        $data['rowTruck']    = $this->m_global->getTruck($dcID);
        $data['driverName']  = $this->m_global->getDrivers($dcID);
        $data['dcOptions']   = $this->m_global->dcOptions();
        $items = $this->m_reports->searchDataJSON_View($param);
        $data['rowItems'] = $items->result();
        $data['dcID'] = $dcID;
        $data['deptID'] = $this->deptID;
	
        $this->template->set('title', TITLE .' | Reports Page');
    	$this->template->load('base_template', 'tpl/reports/'.$view, $data);
    }
    
    /**
     * View Report details
     */
    public function viewReportDetails()
    {
        $id = $this->uri->segment(3);
        $items = $this->m_reports->getJSONDeliveryDetails_View($id);
        $data['batch'] = $this->m_dashboard->getBatchDelivery($id, 0);
        $data['info'] = $this->m_reports->viewReportDetails($id);
        $data['items'] = $items->result();
        $data['total'] = $items->num_rows();
        
        $this->load->view('tpl/reports/modals/report_details', $data);
    }

    /**
     * View Batch report detail
     */
    public function viewBatchDetails()
    {
        $id = $this->uri->segment(3);
        $bn = $this->uri->segment(4);
        $data['batch'] = $this->m_dashboard->getBatchDelivery($id, $bn);
        $data['items'] = $this->m_global->getBatchDetail($id, $bn);
        
        $this->load->view('tpl/reports/modals/batch_details', $data);
    }

    /**
     * Export excel - params per store
     */
    public function exportExcelPerStoreDetails()
    {
        $id = $this->uri->segment(3);
        $items = $this->m_reports->getJSONDeliveryDetails_View($id);
        $data['info'] = $this->m_global->viewDetails($id);
        $data['items'] = $items->result();
        $data['total'] = $items->num_rows();
        $filename = "TS_".date('YmdHis');

        create_xls_report($data, $filename);
    }

    /**
     * Export excel - params all
     */
    public function exportExcelAll($param, $from)
    {
        $items = $this->m_reports->searchDataJSON_View($param);
        $data['rowItems'] = $items->result();
        $filename = "TS_All_".date('YmdHis');

        if($from == 'wh') :
            create_xls_report_all_wh($data, $filename);
        else :
            create_xls_report($data, $filename);
        endif;
    }

    /**
     * Compliance Reports
     */
    public function compliance()
    {
        if($this->input->post('btnFilterSearch') == "search") :
            $date = $this->input->post('dateSelected');
        else :
            $date = date('Y-m-d');
        endif;

        $data['result'] = $this->m_reports->complianceReport($date);

        $this->template->set('title', TITLE.' | Reports Page');
        $this->template->load('base_template', 'tpl/reports/compliance', $data);
    }

    /**
     * Daily Monitoring Report
     */
    public function daily()
    {
        $this->template->set('title', TITLE.' | Reports Page');
        $this->template->load('base_template', 'tpl/reports/daily');
    }

    /**
     * Logs Reports
     */

    public function logs()
    {
        if($this->input->post('btnFilterSearch') == "search") :
            if($this->deptID == 17) :
                $loc_ID =  $this->locID;
            else :
                $loc_ID = ($this->input->post('location_ID') == "") ? 0 : $this->input->post('location_ID');
            endif;

            $date   = $this->input->post('curDate');
        else :
            if($this->deptID == 17) :
                $loc_ID = $this->locID;
            else :
                $loc_ID = 0;
            endif;
            
            $date = date('Y-m-d');
        endif;

        $data['location'] = $this->m_global->getLocation($this->locID);
        $data['locID']    = $loc_ID;
        $data['sDate']    = $date;
        $data['result']   = $this->m_reports->logsReport($loc_ID, $date);
        $data['deptID']   = $this->deptID;

        $this->template->set('title', TITLE .' | Reports Page');
        $this->template->load('base_template', 'tpl/reports/logs', $data);
    }

    public function downloadLogs()
    {
        $loc_ID  = $this->uri->segment(4);
        $curDate = $this->uri->segment(5);

        $data['result'] = $this->m_reports->logsReport($loc_ID, $curDate);
        $filename = "LogReports_".date('Ymd', strtotime($curDate));

        create_xls_report_logs($data, $filename);
    }

    public function getPanel()
    {        
        $dateFrom  = $this->input->post('df');
        $dateTo    = $this->input->post('dt');

        if ( ($dateFrom == '' && $dateTo == '') || $dateFrom == '' || $dateTo == '' ) :
            $dateFrom  = date('Y-m-d');
            $dateTo    = date('Y-m-d');
        else :
            $dateFrom  = $this->input->post('df');
            $dateTo    = $this->input->post('dt');
        endif;

        if ($this->deptID == STORE_OPS_DEPT_ID) :
            if ($this->posID == 2) :

                $data['oa'] = $this->m_reports->overallAMReportCount(0, $this->empID, $dateFrom, $dateTo);

                $this->load->view('tpl/reports/tables/overall', $data);
            elseif ($this->posID == 3) :

                $data['oa'] = $this->m_reports->overallACReportCount($this->empID, $dateFrom, $dateTo);

                $this->load->view('tpl/reports/tables/overall', $data);
            elseif ($this->posID == 4) :

                $data['oa'] = $this->m_reports->overallStoreReportCount($this->empID, $dateFrom, $dateTo);

                $this->load->view('tpl/reports/tables/overall', $data);
            elseif ($this->posID == 5) :

                $data['oa'] = $this->m_reports->overallDeliverReportCount($this->locID, $dateFrom, $dateTo);

                $this->load->view('tpl/reports/tables/overall', $data);
            else :
                
                $data['oa'] = $this->m_reports->overallBranchReportCount($dateFrom, $dateTo);

                $this->load->view('tpl/reports/tables/overall', $data);
            endif;
        else :
            if ($this->posID <= 2 || $this->empID == IC_USER || $this->deptID == IT_DEPT_ID):
            
                $data['oa'] = $this->m_reports->overallBranchReportCount($dateFrom, $dateTo);

                $this->load->view('tpl/reports/tables/overall', $data);
            endif;
        endif;
    }

    public function getFirstTbl()
    {
        $dateFrom  = $this->input->post('df');
        $dateTo    = $this->input->post('dt');

        if ( ($dateFrom == '' && $dateTo == '') || $dateFrom == '' || $dateTo == '' ) :
            $dateFrom  = date('Y-m-d');
            $dateTo    = date('Y-m-d');
        else :
            $dateFrom  = $this->input->post('df');
            $dateTo    = $this->input->post('dt');
        endif;

        if ($this->deptID == STORE_OPS_DEPT_ID) :
            if ($this->posID == 2) :

                $data['am'] = $this->m_reports->overallAMReport(0, $this->empID, $dateFrom, $dateTo);
                $this->load->view('tpl/reports/tables/oa_am', $data);
            elseif ($this->posID == 3) :

                $data['ac'] = $this->m_reports->overallACReport($this->empID, $dateFrom, $dateTo);
                $this->load->view('tpl/reports/tables/oa_ac', $data);
            elseif ($this->posID == 4) :

                $data['store'] = $this->m_reports->overallStoreReport($this->empID, $dateFrom, $dateTo);
                $this->load->view('tpl/reports/tables/oa_store', $data);                
            elseif ($this->posID == 5) :
                
                $data['deliver'] = $this->m_reports->overallDeliverReport($this->locID, $dateFrom, $dateTo);
                $this->load->view('tpl/reports/tables/oa_deliver', $data);
            else :

                $data['branch'] = $this->m_reports->overallBranchReport($dateFrom, $dateTo);
                $this->load->view('tpl/reports/tables/oa_branch', $data);
            endif;
        else :
            if ($this->posID <= 2 || $this->empID == IC_USER || $this->deptID == IT_DEPT_ID):
                
                $data['branch'] = $this->m_reports->overallBranchReport($dateFrom, $dateTo);
                $this->load->view('tpl/reports/tables/oa_branch', $data);
            endif;
        endif;
    }

    public function getAMTbl($dcID)
    {
        $dateFrom  = $this->input->post('df');
        $dateTo    = $this->input->post('dt');

        if ( ($dateFrom == '' && $dateTo == '') || $dateFrom == '' || $dateTo == '' ) :
            $dateFrom  = date('Y-m-d');
            $dateTo    = date('Y-m-d');
        else :
            $dateFrom  = $this->input->post('df');
            $dateTo    = $this->input->post('dt');
        endif;

        $data['am'] = $this->m_reports->overallAMReport($dcID, 0, $dateFrom, $dateTo);
                
        $this->load->view('tpl/reports/tables/oa_am', $data);
    }

    public function getACTbl($amID)
    {
        $dateFrom  = $this->input->post('df');
        $dateTo    = $this->input->post('dt');

        if ( ($dateFrom == '' && $dateTo == '') || $dateFrom == '' || $dateTo == '' ) :
            $dateFrom  = date('Y-m-d');
            $dateTo    = date('Y-m-d');
        else :
            $dateFrom  = $this->input->post('df');
            $dateTo    = $this->input->post('dt');
        endif;

        $data['ac'] = $this->m_reports->overallACReport($amID, $dateFrom, $dateTo);

        $this->load->view('tpl/reports/tables/oa_ac', $data);
    }

    public function getStoreTbl($acID)
    {
        $dateFrom  = $this->input->post('df');
        $dateTo    = $this->input->post('dt');

        if ( ($dateFrom == '' && $dateTo == '') || $dateFrom == '' || $dateTo == '' ) :
            $dateFrom  = date('Y-m-d');
            $dateTo    = date('Y-m-d');
        else :
            $dateFrom  = $this->input->post('df');
            $dateTo    = $this->input->post('dt');
        endif;

        $data['store'] = $this->m_reports->overallStoreReport($acID, $dateFrom, $dateTo);
         
        $this->load->view('tpl/reports/tables/oa_store', $data);
    }

    public function getDeliverTbl($locID)
    {
        $dateFrom  = $this->input->post('df');
        $dateTo    = $this->input->post('dt');

        if ( ($dateFrom == '' && $dateTo == '') || $dateFrom == '' || $dateTo == '' ) :
            $dateFrom  = date('Y-m-d');
            $dateTo    = date('Y-m-d');
        else :
            $dateFrom  = $this->input->post('df');
            $dateTo    = $this->input->post('dt');
        endif;

        $data['deliver'] = $this->m_reports->overallDeliverReport($locID, $dateFrom, $dateTo);
        
        $this->load->view('tpl/reports/tables/oa_deliver', $data);
    }

}

/* End of file Reports.php 
 * Location: ./application/controllers/Reports.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */