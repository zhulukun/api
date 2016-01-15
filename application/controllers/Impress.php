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
        $this->load->model('Impresscomment_model');

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
        

            return;
        }
    }
    //获取用户关系相关的印象
    public function get_impresses_relation()
    {
        
            return;
        }
    }


    /**
     * 获取用户印象详情
     */
    public function get_impress_details()
    {
        
            return;
    }


    /**
     * 添加用户印象
     */
    public function add_users_impress()
    {

            return;
        
       
    }

    /**
     * 获取系统预设印象
     */
    
    public function get_preset_impress()
    {
        
       
            return;
        
    }


    /**
     * 获取系统预设关键字
     */
    public function get_system_keywords()
    {
          return;
    }

    //设置印象内容不可见

    public function set_impress_hidden()
    {
        
        return;


    }

    function get_impress_items()
    {
            return;
    }

    //对印象条目点赞
    public function like_impress_item()
    {
        return;
    }

    public function add_comment_for_impress()
    {
       return;
    }

    //获取当前印象下的评论
    public function get_impress_comments()
    {
        return;      
    }

    

}
