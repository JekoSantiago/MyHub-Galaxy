<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require_once APPPATH . '/libraries/REST_Controller.php';
// use namespace
use Restserver\Libraries\REST_Controller;

class ApiRequest extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index_get()
    {
        $result = array('ResponseCode' => 403,'ResponseMessage' => '403 Forbidden','Data'=>array());  
        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }

    public function index_post()
    {
        $result = array('ResponseCode' => 403,'ResponseMessage' => '403 Forbidden','Data'=>array()); 
        $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
    }
    
    public function login_post()
    {
        $userID         = $this->input->post('UserId');
        $pass           = $this->input->post('Pass');
        $imei           = '';
        $userVersion    = '';
        
        $data = array(
            'user'          => $userID,
            'pass'          => $pass,
            'imei'          => $imei,
            'userVersion'   => $userVersion
        );

        $rows = $this->m_api->checkUser($data); 
        if($rows == false)
        { 
            $result = array('apiReturn' => -2); 
            $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
        }
        else
        { 
            $encrypted =  $this->mylibrary->passwordEncryptNew($data);  
            if($encrypted['username'] == $rows[0]->EmployeeNo && ($encrypted['password'] == $rows[0]->Password || DEFAULT_PASSWORD == $rows[0]->Password))
            { 
                $result = array(
                'apiReturn'    => 1,
                'userEmpID'    => $rows[0]->Emp_ID,
                'userEmpNum'   => $rows[0]->EmployeeNo,
                'UserName'     => $rows[0]->empl_name, 
                'StoreLoc'     => $rows[0]->LocationCode,
                'StoreName'    => $rows[0]->Location);

                $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
            }
            else
            { 
                $result = array('apiReturn' => -2); 
                $this->response($result, REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function isValidRequest_post()
    {
       $apiKey  = $this->input->post('ApiKey');
       $result = $this->mylibrary->apiRequestDecrypt($apiKey); 

       return $result == API_KEY ? true : false; 
    }
    



}
