<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Expert extends CI_Controller
{

    /**
     *  方案收藏
     */
    function __construct()
    {

        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Collect_model');
        $this->load->library('session');
               

    }
    
    //send gift
    public function send_gift()
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

        // if (!array_key_exists('token', $de_json)) 
        // {
        //     $callback=array(
        //                 'code' => '1100',
        //                 'msg' => 'token do not exist'
        //             );

        //     echo(json_encode($callback));
        //     return;
        // }

       
        // $token=$de_json['token'];

        // if (isset($_SESSION['token'])) 
        // {
        //     if ($token !== $_SESSION['token']) 
        //     {
        //         $callback=array(
        //                     'code' => '1000',
        //                     'msg' => ' Authentication error'
        //                 );

        //         echo(json_encode($callback));
        //         return;
        //     }
        // }
        // else
        // {
        //     $callback=array(
        //                     'code' => '1200',
        //                     'msg' => 'token is out of date'
        //                 );

        //         echo(json_encode($callback));
        //         return;
        // }


        if (!array_key_exists('account_id', $de_json) || !array_key_exists('page', $de_json) ||!array_key_exists('page_size', $de_json) ) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }   
        $account_id = $de_json['account_id'];
        
            $callback['status'] = 'fail';
            $callback['response'] = array('code'=>'1500','message'=>'collect failed');
            echo json_encode($callback);
            return;
        
    }
}
