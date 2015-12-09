<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
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
        $this->load->view('home');
    }
    
}
