<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }
    
	public function index()
	{
		$this->load->view('login');
    }
    
    public function verify()
    {
        if($this->validateUserInput() == false) :

            $this->session->set_flashdata('error', 'Username and password are required.');
            redirect('', 'location');

        else :
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );

            $logStatus = $this->m_login->doLogin($data);

            if($logStatus == 100) :

                $this->session->set_flashdata('error', $this->mylibrary->errorMessages(100));
                redirect('', 'location');
            
            elseif($logStatus == 101) :

                $this->session->set_flashdata('error', $this->mylibrary->errorMessages(101));
                redirect('', 'location');

            else :
            
                redirect('dashboard', 'location');

            endif;
        endif;
    }

    public function validateUserInput()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
    
        return $this->form_validation->run();
    }

    public function logout()
    {
        $this->session->sess_destroy();

        //redirect('', 'location');
    
        redirect(MYHUB_URL, 'location');
    }
}

/* End of file Login.php 
 * Location: ./application/controllers/Login.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */