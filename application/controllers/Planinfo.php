<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Planinfo extends CI_Controller
{

    /**
     *  首页
     */
    function __construct()
    {

        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Plan_model');

    }
    public function index()
    {
        $plan_id=$this->uri->segment(4,0);

        $data=$this->Plan_model->get_plan_info($plan_id);
        if (count($data) == 0) 
        {
            $this->load->view('page404.php');
        }
        $arr_label=$this->Plan_model->get_plan_label($plan_id);

        for ($i=0; $i <count($arr_label) ; $i++) 
        { 
            $label[$i]=$arr_label[$i]['label'];
        }

        $warning[0]='暂无标签';

        if (count($arr_label)>0) 
        {
           $data[0]['label']=$label;
        }
        else
        {
            $data[0]['label']=$warning;
        }


        $this->load->view('info',$data[0]);
    }
    
}
