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
        
        return;
        
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
