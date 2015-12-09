<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Accountplanvote extends CI_Controller
{
    /**
     *  方案点赞
     */
      function __construct()
    {

        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Accountplanvote_model');

    }

    public function vote_for_plan()
    {

        $json=file_get_contents("php://input");
        if(is_null(json_decode($json)))
            {
                $callback=array(
                        'code' => '1300',
                        'msg' => 'json data invalid'
                    );

                echo(json_encode($callback));
                return;
            }

        $de_json = (array)json_decode($json,TRUE);

        if (!array_key_exists('token', $de_json)) 
        {
            $callback=array(
                        'code' => '1100',
                        'msg' => 'token do not exist'
                    );

            echo(json_encode($callback));
            return;
        }

       
        $token=$de_json['token'];

        if (isset($_SESSION['token'])) 
        {
            if ($token !== $_SESSION['token']) 
            {
                $callback=array(
                            'code' => '1000',
                            'msg' => ' Authentication error'
                        );

                echo(json_encode($callback));
                return;
            }
        }
        else
        {
            $callback=array(
                            'code' => '1200',
                            'msg' => 'token is out of date'
                        );

                echo(json_encode($callback));
                return;
        }


        if (!array_key_exists('operator_id', $de_json) || !array_key_exists('plan_id', $de_json)) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }   

        $operator_id = $de_json['operator_id'];
        $plan_id = $de_json['plan_id'];

        $arr['id'] = md5(uniqid(md5(microtime(true)),true));

        $arr['operator_id'] = $operator_id;
        $arr['plan_id'] = $plan_id;

        $result = $this->Accountplanvote_model->add_plan_vote($arr);
        if($result)
        {
            $callback['status'] = 'ok';
            echo json_encode($callback);
        }
        else
        {
            $callback['status'] = 'fail';
            $callback['response'] = array('code'=>'1500','message'=>'vote failed or vote repeatedly');
            echo json_encode($callback);
        }
    }
}
