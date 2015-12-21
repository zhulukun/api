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
        $this->load->model('Impresskeyword_model');
        $this->load->library('session');
               

    }    
    /**
     * 获取用户按印象数排名前五的印象 第一个是好友关系的印象
     */
    public function get_topfive_impresses()
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
            $temp = array();
            $arr1 = $this->Impress_model->get_impress($target_id);
            for ($i=0; $i < count($arr1); $i++)  
            {
                $temp[$i]['content'] = $arr1[$i]['impress_keyword'];
                $temp[$i]['count'] = $arr1[$i]['impress_num'];
                // $temp[$i]['isview'] = $arr1[$i]['isview'];
                // $temp[$i]['impresstype'] = $arr1[$i]['impresstype'];
            }

            $arr2['impresses'] = $temp;
            $callback['status'] = 'ok';
            $callback['response'] = $arr2;
            echo json_encode($callback);
            return;
        }
    }

        /**
     * 获取用户按印象数排名前五的印象
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
            $temp1 = array();
            $temp2 = array();
            $temp3 = array();
            $temp4 = array();
            $arr1 = $this->Impress_model->get_impress_relation($target_id);
            $arr2 = $this->Impress_model->get_impress_character($target_id);
            $arr3 = $this->Impress_model->get_impress_like($target_id);
            $arr4 = $this->Impress_model->get_impress_useradd($target_id);

            for ($i=0; $i < count($arr1); $i++)  
            {
                $temp1[$i]['content'] = $arr1[$i]['impress_keyword'];
                $temp1[$i]['count'] = $arr1[$i]['impress_num'];
                $temp1[$i]['isview'] = $arr1[$i]['isview'];
            }

            for ($i=0; $i < count($arr2); $i++)  
            {
                $temp2[$i]['content'] = $arr2[$i]['impress_keyword'];
                $temp2[$i]['count'] = $arr2[$i]['impress_num'];
                $temp2[$i]['isview'] = $arr2[$i]['isview'];
            }
            for ($i=0; $i < count($arr3); $i++)  
            {
                $temp3[$i]['content'] = $arr3[$i]['impress_keyword'];
                $temp3[$i]['count'] = $arr3[$i]['impress_num'];
                $temp3[$i]['isview'] = $arr3[$i]['isview'];
            }
            for ($i=0; $i < count($arr4); $i++)  
            {
                $temp4[$i]['content'] = $arr4[$i]['impress_keyword'];
                $temp4[$i]['count'] = $arr4[$i]['impress_num'];
                $temp4[$i]['isview'] = $arr4[$i]['isview'];
            }

            $callback['status'] = 'ok';
            $callback['response'] = array(
                            'relation' => $temp1,
                            'character' =>$temp2,
                            'like' => $temp3,
                            'useradd' => $temp4
                );
            echo json_encode($callback);
            return;
        }
    }
    //获取用户关系相关的印象
    public function get_impresses_relation()
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
            $temp = array();
            $arr1 = $this->Impress_model->get_impress($target_id);

            for ($i=0; $i < count($arr1); $i++)  
            {
                $temp[$i]['content'] = $arr1[$i]['impress_keyword'];
                $temp[$i]['count'] = $arr1[$i]['impress_num'];
            }

            $arr2['impresses'] = $temp;
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

        

        if (!array_key_exists('account_id', $de_json) ) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }   
        


        $target_id = $de_json['account_id'];
     
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
            $arr=$this->Impress_model->get_impress_details($target_id);
            $arr_user['friendinfo']=$arr;
            $callback['status'] = 'ok';
            $callback['response'] =$arr_user;
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

    
        if (!array_key_exists('target_id', $de_json) ||!array_key_exists('operator_id', $de_json) ||!array_key_exists('content', $de_json) ||!array_key_exists('impress_type', $de_json) ||!array_key_exists('is_hidden_user', $de_json)) 
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
        $impress_type=$de_json['impress_type'];
        $is_hidden_user=$de_json['is_hidden_user'];

        $content_len=count($content);

        if ($content_len>4) 
        {
            $callback['status'] = 'fail';
            $callback['response'] = array('code'=>'1500','message'=>'impress can not be added more than 4 ');
            echo(json_encode($callback));
            return;
        }

        //判断操作者是否为当前用户添加过亲友的印象
        if ($impress_type == '1') 
        {
            # code...
            if ($this->Impress_model->is_add_relation($operator_id,$target_id)) 
            {
                # code...
                $callback['status'] = 'fail';
                $callback['response'] = array('code'=>'1500','message'=>'you have added relation impress for this user');
                echo(json_encode($callback));
                return;
             }

        }
        $result=TRUE;
        for ($i=0; $i < $content_len; $i++) 
        { 
            if($this->Impress_model->is_useradd_theimpress($operator_id,$target_id,$content[$i]['content']))
            {
                continue;
            }

            if ($this->Impresskeyword_model->is_impress_exist($target_id,$content[$i]['content'])) {
                $this->Impresskeyword_model->update_impress_num($target_id,$content[$i]['content'],1);
            }
            else
            {
                $this->Impresskeyword_model->insert_impress($target_id,$content[$i]['content'],$impress_type);
            }

            $arr = array();

            $arr['id'] = md5(uniqid(md5(microtime(true)),true));

            $arr['target_id'] = $target_id;
            $arr['operator_id'] = $operator_id;
            $arr['impresscontent'] = $content[$i]['content'];
            $arr['impresstype'] = $impress_type;
            $arr['is_hidden_user']=$is_hidden_user;
            $result = $this->Impress_model->add_impress($arr);
            $result=$result&&$result;

        } 
        if ($result) 
        {
             $callback['status'] = 'ok';
              echo json_encode($callback);
             return;
        }
        else
        {
            $callback['status'] = 'fail';
            $callback['response'] = array('code'=>'1500','message'=>'fail to add impress');
            echo(json_encode($callback));
            return;
        }
           

        
       
    }

    /**
     * 获取系统预设印象
     */
    
    public function get_preset_impress()
    {
        

        $count = $this->Impress_model->count_preset_impresses();
        if($count == 0)  //查询不到任何印象
        {
            //错误处理
            $callback['status'] = 'fail';
            $callback['response'] = array('code'=>'1500','message'=>'no preset impress');
            echo json_encode($callback);
            return;
        }
        else
        {
            $temp1 = array();
            $temp2 = array();
            $temp3 = array();
            $arr1 = $this->Impress_model->get_preset_impress_relation();
            $arr2 = $this->Impress_model->get_preset_impress_character();
            $arr3 = $this->Impress_model->get_preset_impress_like();

            for ($i=0; $i < count($arr1); $i++)  
            {
                $temp1[$i]['content'] = $arr1[$i]['preset_impress'];

            }

            for ($i=0; $i < count($arr2); $i++)  
            {
                $temp2[$i]['content'] = $arr2[$i]['preset_impress'];
               
            }
            for ($i=0; $i < count($arr3); $i++)  
            {
                $temp3[$i]['content'] = $arr3[$i]['preset_impress'];
                
            }

            $callback['status'] = 'ok';
            $callback['response'] = array(
                            'relation' => $temp1,
                            'character' =>$temp2,
                            'like' => $temp3
                );
            echo json_encode($callback);
            return;
        }
        
    }

    /**
     * 获取系统预设关键字
     */
    public function get_system_keywords()
    {
        $json=file_get_contents("php://input");

        $de_json = (array)json_decode($json,TRUE);

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

    //设置印象内容不可见

    public function set_impress_hidden()
    {
        $json=file_get_contents("php://input");
        if(is_null(json_decode($json)))
            {
                $callback=array(
                        'code' => '1300',
                        'message' => 'json data invalid'
                    );

                echo(json_encode($callback));
                return;
            }

        $de_json = (array)json_decode($json,TRUE);

    
        if (!array_key_exists('account_id', $de_json) ||!array_key_exists('impresscontent', $de_json)) 
            {
                $callback['status']='fail';
                $callback['response']=array(
                            'code' => '1400',
                            'message' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }   
        $account_id=$de_json['account_id'];
        $content=$de_json['impresscontent'];

        if ($this->Impresskeyword_model->set_impress_hidden($account_id,$content)) {
             $callback['status'] = 'ok';
            echo json_encode($callback);
            return;
        }

         $callback['status'] = 'fail';
         $callback['response'] = array(
                            'code' => '1500',
                            'message' => 'set hidden fail'
                );
        echo json_encode($callback);
        return;




    }





}
