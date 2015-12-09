<?php
/**
 * Created by PhpStorm.
 * User: Easy
 * Date: 15/11/4
 * Time: 10:51
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Impress extends CI_Controller
{

    function __construct()
    {

        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Impress_model');
        $this->load->library('session');
               

    }
    /**
     * 获取用户印象
     */
    public function get_impresses()
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


        if (!array_key_exists('account_id', $de_json)) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }   
        
        //$target_id = $_SESSION['account_id'];
        $target_id = $de_json['account_id'];

        $count = $this->Impress_model->count_impresses($target_id);
        if($count == 0)  //查询不到任何印象
        {
            //错误处理
            $callback['status'] = 'fail';
            $callback['response'] = array('code'=>'1500','message'=>'user no impress');
            echo json_encode($callback);
            return;
        }
        else
        {
            $impresses = array();
            $arr1 = $this->Impress_model->get_impress($target_id);
            foreach($arr1 as $row)
            {
                $temp['content'] = $row['impresscontent'];
                $temp['count'] = $count;
                array_push($impresses, $temp);
            }

            $arr2['impresses'] = $impresses;
            $callback['status'] = 'ok';
            $callback['response'] = $arr2;
            echo json_encode($callback);
            return;
        }
    }

    /**
     * 获取用户印象详情
     */
    public function get_impress_details()
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


        if (!array_key_exists('account_id', $de_json) ||!array_key_exists('page', $de_json) ||!array_key_exists('page_size', $de_json)) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }   
        


        $target_id = $de_json['account_id'];
        $page = $de_json['page'];
        $page_size = $de_json['page_size'];

        $count = $this->Impress_model->count_impresses($target_id);
        if($count == 0)  
        {
            $callback['status'] = 'fail';
            $callback['response'] = array('code'=>'1500','message'=>'user no impress');
            echo json_encode($callback);
            return;
        }
        else
        {
            $result = $this->Impress_model->get_impress_details($target_id,$page,$page_size);

            $arr1['page'] = $page;
            $arr1['page_size'] = $page_size;
            $arr1['total_page'] = ceil($count/$page_size);

            $id = '';
            $arr2 = array();  //account
            $arr3 = array();  //impress
            $arr4 = array();  //contents
            $arr5 = array();  //impress_details
            foreach ($result as $row) 
            {
                $temp = array();

                if($id == '')
                {
                    $id = $row['id'];
                    $arr2['id'] = $row['id'];
                    $arr2['nickname'] = $row['nickname'];
                    $arr2['cellphone'] = $row['cellphone'];
                    $arr2['email'] = $row['email'];
                    $arr2['sex'] = $row['sex'];
                    $arr2['birthday'] = $row['birthday'];
                    $arr2['horoscope'] = $row['horoscope'];
                    $arr2['status'] = $row['status'];
                    $arr2['type'] = $row['type'];
                    // $arr2['score'] = $row['score'];
                    $arr2['avatar_url'] = $row['avatar_url'];
                    $arr2['allow_notice'] = $row['allow_notice'];
                 //   $arr2['allow_score'] = $row['allow_score'];

                    $temp['id'] = $row['impress_id'];
                    $temp['content'] = $row['impresscontent'];
                    array_push($arr3,$temp);
                }
                else
                {
                    if($row['id'] != $id)  //有了新的account_id
                    {
                        //将之前的数据封装
                        $arr4['account'] = $arr2;
                        $arr4['contents'] = $arr3;
                        array_push($arr5,$arr4);

                        //unset($arr2);
                        $arr3 = array();
                        //unset($arr4);
                        $id = $row['id'];
                        $arr2['id'] = $row['id'];
                        $arr2['nickname'] = $row['nickname'];
                        $arr2['cellphone'] = $row['cellphone'];
                        $arr2['email'] = $row['email'];
                        $arr2['sex'] = $row['sex'];
                        $arr2['birthday'] = $row['birthday'];
                        $arr2['horoscope'] = $row['horoscope'];
                        $arr2['status'] = $row['status'];
                        $arr2['type'] = $row['type'];
                        // $arr2['score'] = $row['score'];
                        $arr2['avatar_url'] = $row['avatar_url'];
                        $arr2['allow_notice'] = $row['allow_notice'];
                     //   $arr2['allow_score'] = $row['allow_score'];

                        $temp['id'] = $row['impress_id'];
                        $temp['content'] = $row['impresscontent'];
                        array_push($arr3,$temp);
                    }
                    else
                    {
                        $temp['id'] = $row['impress_id'];
                        $temp['content'] = $row['impresscontent'];
                        array_push($arr3, $temp);
                    }
                }
            }
            $arr4['account'] = $arr2;
            $arr4['contents'] = $arr3;
            array_push($arr5,$arr4);

            $arr1['impress_details'] = $arr5;
            $callback['status'] = 'ok';
            $callback['response'] = $arr1;
            echo json_encode($callback);
            return;
        }
    }


    /**
     * 添加用户印象
     */
    public function add_users_impress()
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


        if (!array_key_exists('target_id', $de_json) ||!array_key_exists('operator_id', $de_json) ||!array_key_exists('content', $de_json)) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }   
        
        $target_id = $de_json['target_id'];
        $operator_id = $de_json['operator_id'];
        $content = $de_json['content'];

        $fail_flag = FALSE;
        $fail_content = '';
            $arr = array();

            $arr['id'] = md5(uniqid(md5(microtime(true)),true));

            $arr['target_id'] = $target_id;
            $arr['operator_id'] = $operator_id;
            $arr['impresscontent'] = $content;
            $arr['impresstype'] = 'useradded';

            $result = $this->Impress_model->add_impress($arr);
            if(!$result)
            {
                $fail_flag = TRUE;
                $fail_content = $fail_content.' and '.$impress_content;
            }

        if($fail_flag)
        {
            $callback['status'] = 'fail';
            $callback['response'] = array('code'=>'1500','message'=>'impress content '.$fail_content.' insert failed');
            echo(json_encode($callback));
            return;
        }
        else
        {
            $callback['status'] = 'ok';
             echo json_encode($callback);
             return;
        }
       
    }

    /**
     * 获取系统预设印象
     */
    
    public function get_preset_impress()
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


        $result = $this->Impress_model->get_preset_impresses();

        $arr1 = array();
        foreach($result as $row)
        {
            $temp['id'] = $row['id'];
            $temp['content'] = $row['preset_impress'];
            array_push($arr1,$temp);
        }
        $callback['status'] = 'ok';

        $arr2['preset_impresses'] = $arr1;
        $callback['response'] = $arr2;
        echo json_encode($callback);
    }

    /**
     * 获取系统预设关键字
     */
    public function get_system_keywords()
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

        $result = $this->Impress_model->get_preset_keywords();

        $arr1 = array();
        foreach($result as $row)
        {
            $temp['id'] = $row['id'];
            $temp['content'] = $row['keyword'];
            array_push($arr1,$temp);
        }
        $callback['status'] = 'ok';

        $arr2['preset_keywords'] = $arr1;
        $callback['response'] = $arr2;
        echo json_encode($callback);
    }
}
