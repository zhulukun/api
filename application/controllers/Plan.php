<?php
/**
 * Created by PhpStorm.
 * User: Easy
 * Date: 15/11/4
 * Time: 15:54
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller
{
    
    function __construct()
    {

        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Plan_model');
        $this->load->library('session');
               
    }

    public function add_plan()
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
        if (!array_key_exists('title', $de_json) || !array_key_exists('content', $de_json) || !array_key_exists('status', $de_json) || !array_key_exists('author_id', $de_json) || !array_key_exists('imagepath', $de_json) || !array_key_exists('category_id', $de_json) || !array_key_exists('labels', $de_json) ) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }
        $plan_id=md5(uniqid(md5(microtime(true)),true));
        $title=$de_json['title'];
        $content=$de_json['content'];
        $status=$de_json['status'];
        $author_id=$de_json['author_id'];
        $imagepath=$de_json['imagepath'];
        $category_id=$de_json['category_id'];

        $labels=$de_json['labels'];

        $arr_label=explode(",", $labels);

        

        if ($this->Plan_model->add_plan($plan_id,$title,$content,$status,$author_id,$imagepath,$category_id)) 
        {
            for ($i=0; $i < count($arr_label); $i++) 
            { 
                if ($arr_label[$i] == '') 
                {
                       continue;
                }
               $plan_label_id=md5(uniqid(md5(microtime(true)),true));
               $this->Plan_model->add_artical_label($plan_label_id,$plan_id,$arr_label[$i]);
            }
        
            $callback['status']='ok';
            echo(json_encode($callback));
            return;
        }
        $callback['status']='fail';
        $callback['response']=array(
                'code' => '1500',
                'message' => 'add plan fail'
            );
        echo(json_encode($callback));
        return;
    }
    public function delete_plans()
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
        if ($this->Plan_model->delete_plan($id)) 
        {
            $callback['status']='ok';
            echo(json_encode($callback));
            return;
        }

        $callback['status']='fail';
        $callback['response']=array(
                'code' => '1500',
                'message' => 'delete plan fail'
            );
        echo(json_encode($callback));
        return;
    }

    //获取某个分类下的所有方案
    public function get_cat_plans()
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
        if (!array_key_exists('cat_id', $de_json)) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }
        $cat_id=$de_json['cat_id'];
        
        $arr=$this->Plan_model->get_cat_plans($cat_id);

        if (count($arr)==0)
        {
            $callback['status']='fail';
            $callback['response']=array(
                    'code' => '1500',
                    'message' => 'delete plan fail'
                );
            echo(json_encode($callback));
            return;
        }
        $callback['status']='ok';
        $callback['response']=array(
                'plan' => $arr
            );
        echo(json_encode($callback));
        return;

    }

    public function count_plans()
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


    

        
        $result = $this->Plan_model->count_plans();

        $arr['count'] = $result;

        $callback['status'] = 'ok';
        $callback['response'] = $arr;
        echo json_encode($callback);
    }

    /**
     * 获取礼物方案
     */
    public function get_plans()
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


        if (!array_key_exists('page', $de_json) || !array_key_exists('page_size', $de_json) ) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }
        $page = $de_json['page'];
        $page_size = $de_json['page_size'];
        $count = $this->Plan_model->count_plans();
        $total_page=ceil($count/$page_size);
        
        if($count == 0)  
        {
            $callback['status'] = 'fail';
            $callback['response'] = array('status'=>'fail','code'=>'2003','message'=>'no plan in the database');
            echo json_encode($callback);
        }
        else
        {
            $result = $this->Plan_model->get_plan($de_json);

            $arr1['page'] = $page;
            $arr1['page_size'] = $page_size;
            $arr1['total_page'] = $total_page;
            $arr2 = array();
            foreach($result as $row)
            {
                $temp['id'] = $row['id'];
                $temp['title'] = $row['title'];
                $temp['cover_image_url'] = $row['cover_image_url'];
                $temp['view_count'] = $row['view_count'];
                $temp['share_count'] = $row['share_count'];
                $temp['keywords'] = $row['plankeyword'];
                $temp['publish_date'] = $row['publish_date'];
                array_push($arr2,$temp);
            }
            $arr1['plans'] = $arr2;

            $callback['status'] = 'ok';
            $callback['response'] = $arr1;
            echo json_encode($callback);
        }
        
    }

    /**
     * 获取礼物方案详情
     */
    public function get_plans_details()
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
 

        if (!array_key_exists('plan_id', $de_json) ) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }

        $plan_id = $de_json['plan_id'];

        $query = $this->Plan_model->is_plan_exist($plan_id);
        if(!$query)  
        {
            $callback['status'] = 'fail';
            $callback['response'] = array('code'=>'1500','message'=>'this plan has no details');
            echo json_encode($callback);
        }
        else
        {
            $result = $this->Plan_model->get_plan_details($plan_id);

            $temp['id'] = $result['id'];
            $temp['title'] = $result['title'];
            $temp['content'] = $result['content'];
            $temp['cover_image_url'] = $result['cover_image_url'];
            $temp['view_count'] = $result['view_count'];
            $temp['share_count'] = $result['share_count'];
            $temp['keywords'] = $result['plankeyword'];
            $temp['publish_date'] = $result['publish_date'];
            $arr['plan'] = $temp;

            $callback['status'] = 'ok';
            $callback['response'] = $arr;

            echo json_encode($callback);
            return;
        }
        
    }

    //获取所有分类
    function get_all_cat()
    {
        $arr_plantype=$this->Plan_model->get_all_cat();
        echo json_encode($arr_plantype);
        return;
    }

    //方案评论接口
    function comment_plan()
    {

    }





    
}
