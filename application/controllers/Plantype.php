<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Plantype extends CI_Controller
{

    /**
     *  方案收藏
     */
    function __construct()
    {

        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Plantype_model');
        $this->load->library('session');
    }

    //添加分类
    public function add_category()
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

        if (!array_key_exists('category_cn', $de_json) || !array_key_exists('category_en', $de_json) || !array_key_exists('description', $de_json)) 
            {
                $callback['status']='fail';
                $callback['response']=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }

        $category_cn=$de_json['category_cn'];
        $category_en=$de_json['category_en'];  
        $description=$de_json['description'];

        if ($this->Plantype_model->is_exist_cn($category_cn)) {
            $callback['status']='fail';
            $callback['response']=array(
                    'code' => '1500',
                    'message' => '中文分类名已经存在'
                );
            echo(json_encode($callback));
            return;
        }

        if ($this->Plantype_model->is_exist_en($category_en)) {
            $callback['status']='fail';
            $callback['response']=array(
                    'code' => '1500',
                    'message' => '英文分类名已经存在'
                );
            echo(json_encode($callback));
            return;
        }
        if($this->Plantype_model->insert_category($category_cn,$category_en,$description))
        {
            $callback['status']='ok';
            echo(json_encode($callback));
            return;
        }   
        $callback['status']='fail';
        echo(json_encode($callback));
        return;

    }

    //删除分类
    public function delete_category()
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

        if (!array_key_exists('id', $de_json)) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }
        $id=$de_json['id'];

        if($this->Plantype_model->delete_category($id))
        {
            $callback['status']='ok';
            echo(json_encode($callback));
            return;
        }   
        $callback['status']='fail';
        echo(json_encode($callback));
        return;
    }

    //更新分类信息
    function update_category()
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

        if (!array_key_exists('id', $de_json) || !array_key_exists('category_cn', $de_json) || !array_key_exists('category_en', $de_json) || !array_key_exists('description', $de_json)) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }
        $id=$de_json['id'];
        $category_cn=$de_json['category_cn'];
        $category_en=$de_json['category_en'];
        $description=$de_json['description'];

        // if ($this->Plantype_model->is_exist_cn($category_cn)) {
        //     $callback['status']='fail';
        //     $callback['response']=array(
        //             'code' => '1500',
        //             'message' => '中文分类名已经存在'
        //         );
        //     echo(json_encode($callback));
        //     return;
        // }

        // if ($this->Plantype_model->is_exist_en($category_en)) {
        //     $callback['status']='fail';
        //     $callback['response']=array(
        //             'code' => '1500',
        //             'message' => '英文分类名已经存在'
        //         );
        //     echo(json_encode($callback));
        //     return;
        // }
        if($this->Plantype_model->update_category($id,$category_cn,$category_en,$description))
        {
            $callback['status']='ok';
            echo(json_encode($callback));
            return;
        }   
        $callback['status']='fail';
        echo(json_encode($callback));
        return;
    }

    //查找全部分类
    public function select_category()
    {
        $arr=$this->Plantype_model->select_category();
        echo(json_encode($arr));
        return;
    }

    //查找某个分类下的所有方案
    public function select_unique_category()
    {
        $id=$this->uri->segment(4,0);
        $arr=$this->Plantype_model->select_unique_category($id);
        echo(json_encode($arr));
        return;
    }

}
