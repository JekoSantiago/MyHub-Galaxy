<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_model extends CI_Model 
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

    public function getSchedules($dc_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Schedule_Get] 0, '', 0, $dc_ID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function insertSchedule($sched_Date, $loc_ID, $dc_ID, $dt_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Schedule_Insert] '$sched_Date', $loc_ID, $dc_ID, $dt_ID, $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function updateSchedule($sched_ID, $sched_Date, $loc_ID, $dt_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Schedule_Update] $sched_ID, '$sched_Date', $loc_ID, $dt_ID, $this->empID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    public function scheduleDetails($sched_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Schedule_Get] $sched_ID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    /**
     * View calendar details
     */
    public function viewCalendar($dc_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query = $this->connDB->query("EXECUTE [sp_CalendarSchedule_Get] $dc_ID")->result();
        //$this->connDB->close();
        
        $x = '';
        foreach($query as $i) :
            $sched_1 = $this->mylibrary->formatDate($i->ScheduleDate);
            $x .= "{
                title: 'No. of Delivery : $i->LocCount',
                start: '$sched_1',
                textColor: '#000'
            },"; 
        endforeach; 

        $y = '';
        foreach($query as $j) :
            $sched_2 = $this->mylibrary->formatDate($j->ScheduleDate);
            $y .= "{
                title: 'Total Ship : $j->ShippedCount',
                start: '$sched_2',
                color: '#FFFF00',
                textColor: '#000'
            },"; 
        endforeach; 

        $z = '';
        foreach($query as $k) :
            $sched_3 = $this->mylibrary->formatDate($k->ScheduleDate);
            $z .= "{
                title: 'Total Receive : $k->ReceivedCount',
                start: '$sched_3',
                color: '#26A69A',
                textColor: '#000'
            },"; 
        endforeach; 

        $data_1 = substr($x, 0, -1);
        $data_2 = substr($y, 0, -1);
        $data_3 = substr($z, 0, -1);

        return $data_1.','.$data_2.','.$data_3;
    }

    /**
     * View Calendar list
     */
    public function calendarSchedulesList($sched_Date, $dc_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_Schedule_Get] 0, '$sched_Date', 0, $dc_ID")->result();
        //$this->connDB->close();
    
        return $query;
    }

    /**
     * Get list of delivery type to be integrate in the listbox form
     */
	public function getDeliveryType()
	{
		sqlsrv_configure('WarningsReturnAsErrors', 0);
        $query= $this->connDB->query("EXECUTE [sp_DeliveryType_Get]")->result();
        //$this->connDB->close();
    
        return $query;
	}
}

/* End of file Schedule_model.php 
 * Location: ./application/models/Schedule_model.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */