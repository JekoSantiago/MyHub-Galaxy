<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorPage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

    public function index()
    {
      $this->load->view('errors/html/error_403');
    }

    public function page403()
    {
      $this->load->view('errors/html/error_403');
    }
}
