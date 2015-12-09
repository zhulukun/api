<?php

    class Plan_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }

        /**
         * count plans int the database
         *
         * @return int
         */
        function count_plans()
        {
            $query = $this->db->query("SELECT * FROM xl_plan");

            return $query->num_rows();
        }


        /**
         * obtain plans
         *
         * @param $page,$page_size
         * @return array
         */
        function get_plan($arr)
        {
            $page = $arr['page'];
            $page_size = $arr['page_size'];
            $m = ($page - 1) * $page_size;
            $n = $page_size;

            if(array_key_exists('search_key', $arr))
            {
                $search_key = $arr['search_key'];
            
                $query = $this->db->query("SELECT xl_plan.id,title,view_count,share_count,publish_date,plankeyword 
                                           FROM xl_plan 
                                           LIKE '%{$search_key}%'
                                           LIMIT {$m},{$n}");
            }
            else
            {
                $query = $this->db->query("SELECT xl_plan.id,title,view_count,share_count,publish_date,plankeyword 
                                           FROM xl_plan 
                                           LIMIT {$m},{$n}");
            }
            
            $arr = array();

            foreach($query->result_array() as $row)
            {
                array_push($arr,$row);
            }

            $query1 = $this->db->query("SELECT id,IFNULL(cover_image_id,'') AS cover_image_id from xl_plan");

            $arr1 = array();

            foreach($query1->result_array() as $row)
            {
                array_push($arr1,$row);
            }

            //获得路径数组
            $cover_id = array_column($arr1,'cover_image_id');   //cover_image_id
            $this->db->select('id,path');
            $this->db->where_in('id',$cover_id);
            $query2 = $this->db->get('xl_imageresource');

            $arr2 = array();

            foreach($query2->result_array() as $row)
            {
                array_push($arr2,$row);
            }
            
            //将两组结果arr1和arr2按id合并
            foreach ($arr1 as &$row) 
            {
                foreach ($arr2 as $row1) {
                    if($row['cover_image_id'] == $row1['id'])
                    {
                        $row['cover_image_url'] = $row1['path'];
                        break;
                    }
                    if($row['cover_image_id'] == '')
                    {
                        $row['cover_image_url'] = '';
                        break;
                    }
                }
            }
            unset($row);

            //将两组结果arr和arr1按id合并
            foreach ($arr as &$row) 
            {
                foreach ($arr1 as $row1) {
                    if($row['id'] == $row1['id'])
                    {
                        $row['cover_image_url'] = $row1['cover_image_id'];
                        break;
                    }
                }
            }
            unset($row);

            return $arr;
        }

        function is_plan_exist($plan_id)
        {
            $query=$this->db->query("SELECT id FROM xl_plan WHERE xl_plan.id = '{$plan_id}'");

            if ($query->num_rows()>0) {
                #if exist return true
                return TRUE;
              }

              return FALSE; 
        }
        
        /**
         * obtain plan details
         *
         * @param $plan_id
         * @return array
         */
        function get_plan_details($plan_id)
        {

            $query = $this->db->query("SELECT xl_plan.id,title,content,view_count,share_count,publish_date,plankeyword
                                       FROM xl_plan
                                       WHERE xl_plan.id = '{$plan_id}'");

            $arr = $query->row_array();

            //查询封面图片路径
            $query1 = $this->db->query("SELECT cover_image_id,path 
                                        FROM xl_plan,xl_imageresource 
                                        WHERE xl_plan.id = '{$plan_id}' AND cover_image_id = xl_imageresource.id");
            $re = $query1->row_array();

            if(isset($re))
            {
                $arr['cover_image_url'] = $re['path'];                
            }
            else
            {
                $arr['cover_image_url'] = '';                
            }
            
            return $arr;
        }
    }
