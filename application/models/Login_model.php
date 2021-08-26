<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model 
{
    public $connUserMgt = null;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->connUserMgt = $this->load->database('dbUserMgt',true);
    }
	
	public function doLogin($data)
	{
		$user = $data['username'];
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $result = $this->connUserMgt->query("EXECUTE[sp_User_Get] null, '$user'")->result();
        //$this->connUserMgt->close();

        $flag = 0;
        if($result) :
            $auth = array(
                'username' => $result[0]->EmployeeNo,
                'password' => $result[0]->Password
            );

            $encrypted = array();
            if(strtotime($result[0]->LastUpdate) <  strtotime(NEW_ENCRYPT_DATE)) :
                $encrypted =  $this->mylibrary->passwordEncrypt($data);
            else :
                $encrypted =  $this->mylibrary->passwordEncryptNew($data);
            endif;  

            if($encrypted['username'] == $auth['username'] && ($encrypted['password'] == $result[0]->Password || $result[0]->Password == DEFAULT_PASSWORD)) :
                $flag = 1;
            endif;
            
            if($flag == 1) :
                $userRole = $this->userRole($result[0]->Usr_ID);

                if(!empty($userRole)) :
                    $session_data = array (
                        'isLogin'           => true,
                        'Usr_ID'            => $this->mylibrary->encrypt($result[0]->Usr_ID),
                        'Emp_Id'            => $this->mylibrary->encrypt($result[0]->Emp_ID),
                        'EmployeeNo'        => $this->mylibrary->encrypt($result[0]->EmployeeNo),
                        'empl_name'         => $this->mylibrary->encrypt($result[0]->empl_name),
                        'PositionLevel_ID'  => $this->mylibrary->encrypt($result[0]->PositionLevel_ID),
                        'Department_ID'     => $this->mylibrary->encrypt($result[0]->Department_ID),
                        'Department'        => $this->mylibrary->encrypt($result[0]->Department),
                        'Location_ID'       => $this->mylibrary->encrypt($result[0]->Location_ID),
                        'LocationCode'      => $this->mylibrary->encrypt($result[0]->LocationCode),
                        'Location'          => $this->mylibrary->encrypt($result[0]->Location),
                        'Role_ID'           => $this->mylibrary->encrypt($userRole[0]->Role_ID),
                        'PositionLevelCode' => $this->mylibrary->encrypt($userRole[0]->PositionLevelCode),
                        'DivisionCode'      => $this->mylibrary->encrypt($userRole[0]->DivisionCode),
                        'Division_ID'       => $this->mylibrary->encrypt($userRole[0]->Division_ID),
                        'Company_ID'        => $this->mylibrary->encrypt($userRole[0]->Company_ID),
                        'DepartmentCode'    => $this->mylibrary->encrypt($userRole[0]->DepartmentCode),
                    );
                    
                    $this->session->set_userdata($session_data);


                    $status = 200;
                else :
                    $status = 101;
                endif;
            else :
                $status = 100;
            endif;
        else :
            $status = 100;
        endif;

        return $status;
    }
    
    public function userRole($user_ID)
    {
        sqlsrv_configure('WarningsReturnAsErrors', 0);
        $connUserMgt = $this->load->database('dbUserMgt',true);
        $result =  $this->connUserMgt->query("EXECUTE[sp_User_UserRole_Get] 0, 0, $user_ID")->result();
        //$this->connUserMgt->close(); 
        
        return $result; 
    }
}

/* End of file Login_model.php 
 * Location: ./application/models/Login_model.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */