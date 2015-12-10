<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller
{
    /**
     * 获取系统通知条数
     */
    function __construct()
    {

        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Notice_model');
        $this->load->library('session');
               

    }
    public function count_system_notices()
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


        if (!array_key_exists('account_id', $de_json) ) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }

        $account_id = $de_json['account_id'];
        $result = $this->Notice_model->count_notices($account_id);

        $arr['count'] = $result;

        $callback['status'] = 'ok';
        $callback['response'] = $arr;
        echo json_encode($callback);

    }

    /**
     * 获取系统通知
     */

    public function get_system_notice()
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


        if (!array_key_exists('account_id', $de_json)||!array_key_exists('page', $de_json) ||!array_key_exists('page_size', $de_json)  ) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }
        $account_id = $de_json['account_id'];
        $page = $de_json['page'];
        $page_size = $de_json['page_size'];

        $total = $this->Notice_model->count_notices($account_id);

        if($total == 0)  //查询不到任何系统通知
        {
            //错误处理
            $callback['status'] = 'fail';
            $callback['response'] = array('code'=>'1500','message'=>'no system notice');
            echo json_encode($callback);
        }
        else
        {
            $notices = array();
            
            $result = $this->Notice_model->get_notices($account_id,$page,$page_size);
            $arr1['page'] = $page;
            $arr1['page_size'] = $page_size;
            $arr1['total'] = $total;
            foreach($result as $row)
            {
                $temp['id'] = $row['id'];
                $temp['content'] = $row['content'];
                if($row['content'] == 0)
                {
                	$temp['is_read'] = FALSE;
                }
                else
                {
                	$temp['is_read'] = TRUE;
                }
                array_push($notices, $temp);
            }

            $arr1['notices'] = $notices;
            $callback['status'] = 'ok';
            $callback['response'] = $arr1;
            echo json_encode($callback);
        }
    }

}
