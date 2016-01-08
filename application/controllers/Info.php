<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class mysql_info() extends CI_Controller
{

    /**
     *  首页
     */
    function __construct()
    {

        parent::__construct();

        $this->load->helper('url');
               

    }
    public function index()
    {
        $this->load->view('info');
    }
    
}
