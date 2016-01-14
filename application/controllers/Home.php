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
        $this->load->model('Plantype_model');

    }
    public function index()
    {
        $arr_cat=$this->Plantype_model->select_category();

        $arr_ppt_info = $this->Plantype_model->select_ppt_info();

        if (count($arr_cat) == 0) 
        {
            $arr[0]['category_cn']='暂无分类';
            $data['info']=$arr;
        }
        else
        {
            $data['info']=$arr_cat;
            $data['new']='最新';
        }

        $data['pptinfo']=$arr_ppt_info;


        $this->load->view('home',$data);
    }
    
}
