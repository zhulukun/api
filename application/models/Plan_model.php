<?php

    class Plan_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }

        //添加方案
        function add_plan($id,$title,$content,$status,$author_id,$imagepath,$category_id)
        {
            $query=$this->db->query("INSERT INTO xl_plan(id,title,content,status,author_id,imagepath,category_id) VALUES('{$id}','{$title}','{$content}','{$status}','{$author_id}','{$imagepath}',{$category_id})");
            if ($this->db->affected_rows()>0) 
            {
                return TRUE;
            }
            return  FALSE;
        }

        //关联标签与方案

        function add_artical_label($id,$plan_id,$label)
        {
            $query=$this->db->query("INSERT INTO xl_planreflabel(id,plan_id,label) VALUES('{$id}','{$plan_id}','{$label}')");
            if ($this->db->affected_rows()>0) {
                return TRUE;
            }
            return FALSE;
        }

        //删除方案
        function delete_plan($id)
        {
            $query=$this->db->query("DELETE FROM xl_plan WHERE id='{$id}'");
            if ($this->db->affected_rows()>0) 
            {
                return TRUE;
            }
            return  FALSE;
        }

        //修改方案
        function update_plan($id,$title,$content,$status,$author_id,$cover_image_id,$category_id)
        {
            $query=$this->db->query("UPDATE xl_plan SET title='{$title}',content='{$content}',status='{$status}',author_id='{$author_id}',cover_image_id='{$cover_image_id}',category_id={$category_id} WHERE id='{$id}'");
            if ($this->db->affected_rows()>0) 
            {
                return TRUE;
            }
            return FALSE;
        }

        //获取某个分类下的所有方案

        function get_cat_plans($cat_id)
        {
            $query_cat=$this->db->query("SELECT * FROM xl_plan WHERE category_id='{$cat_id}'");
            $plan_arr=array();
            foreach($query_cat->result_array() as $row)
            {
                array_push($plan_arr,$row);
            }

            if (count($plan_arr)==0) 
            {
                return NULL;
            }

            for ($i=0; $i <count($plan_arr); $i++) 
            { 
                $plan_id=$plan_arr[$i]['id'];
                $plankeyword_arr=array();
                foreach($query_plankeyword->result_array() as $row)
                {
                    array_push($plankeyword_arr,$row);
                }
                $keyword['lables']=$plankeyword_arr;
                array_merge($plan_arr[$i],$keyword);
            }
            return $plan_arr;
        }

        //获取所有方案
        function get_all_plan($cat_id)
        {
            $query_cat=$this->db->query("SELECT * FROM xl_plan");
            $plan_arr=array();
            foreach($query_cat->result_array() as $row)
            {
                array_push($plan_arr,$row);
            }

            if (count($plan_arr)==0) 
            {
                return NULL;
            }

            for ($i=0; $i <count($plan_arr); $i++) 
            { 
                $plan_id=$plan_arr[$i]['id'];
                $query_plankeyword=$this->db->query("SELECT label FROM xl_planlabel WHERE plan_id='{$plan_id}'");
                $plankeyword_arr=array();
                foreach($query_plankeyword->result_array() as $row)
                {
                    array_push($plankeyword_arr,$row);
                }
                $keyword['lables']=$plankeyword_arr;
                array_merge($plan_arr[$i],$keyword);
            }
            return $plan_arr;
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

        //获取所有方案分类
        function get_all_cat()
        {
            $query=$this->db->query("SELECT id,category_cn FROM xl_plantype");

            $arr=array();

            foreach($query->result_array() as $row)
            {
                array_push($arr,$row);
            }

            return $arr;

        }

        //获取方案详情
        function get_plan_info($plan_id)
        {
            $query=$this->db->query("SELECT xl_plan.title,xl_plan.content,xl_plan.publish_date,xl_plan.imagepath,xl_account.nickname,xl_plan.comment_count,xl_plan.vote_count FROM xl_plan,xl_account WHERE xl_plan.id='{$plan_id}' AND xl_account.id=xl_plan.author_id");
            $arr=array();

            foreach($query->result_array() as $row)
            {
                array_push($arr,$row);
            }

            return $arr;

        }

        //获取方案下的标签
        function get_plan_label($plan_id)
        {
            $query=$this->db->query("SELECT label FROM xl_planreflabel WHERE plan_id='{$plan_id}'");
            $arr=array();

            foreach($query->result_array() as $row)
            {
                array_push($arr,$row);
            }

            return $arr;

        }

        //获取分类下的方案
        function get_cat_plan($cat_id)
        {
            $query=$this->db->query("SELECT id,title,imagepath,comment_count,vote_count FROM xl_plan WHERE category_id='{$cat_id}'");

            $arr=array();

            foreach($query->result_array() as $row)
            {
                array_push($arr,$row);
            }

            return $arr;
        }

        //获取最新方案
        function get_newest_plan()
        {
            $query=$this->db->query("SELECT id,title,imagepath,publish_date,comment_count,vote_count FROM xl_plan ORDER BY publish_date DESC");
            $arr=array();

            foreach($query->result_array() as $row)
            {
                array_push($arr,$row);
            }

            return $arr;
        }

        
        //评论方案
        function comment_plan($arr)
        {
            return $this->db->insert('xl_plancomment',$arr);
        }

        //点赞方案
        function vote_plan($arr)
        {
            return $this->db->insert('xl_planvote',$arr);
        }

        //评论数加一
        function add_comment_count($plan_id)
        {
            $query=$this->db->query("UPDATE xl_plan SET comment_count = comment_count+1 WHERE id='{$plan_id}'");
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            }
            return FALSE;
        }

        //点赞数加一
        function add_vote_count($plan_id)
        {
            $query=$this->db->query("UPDATE xl_plan SET vote_count = vote_count+1 WHERE id='{$plan_id}'");
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            }
            return FALSE;
        }

        //获取方案评论
        function get_plan_comments($plan_id)
        {
            $query=$this->db->query("SELECT xl_plancomment.content,xl_account.nickname,xl_account.id FROM xl_plancomment,xl_account WHERE xl_plancomment.account_id=xl_account.id AND xl_plancomment.plan_id='{$plan_id}'");
            

            $arr=array();

            foreach($query->result_array() as $row)
            {
                array_push($arr,$row);
            }

            if (count($arr) == 0) {
                return $arr;
            }
            for($i=0;$i<count($arr);$i++)
            {
                $account_id=$arr[$i]['id'];
                $query_avatar_url=$this->db->query("SELECT avatar_url AS avatar_url FROM xl_avatar WHERE account_id='{$account_id}'");

                if ($query_avatar_url->num_rows()>0) 
                  {
                            $arr_avatar = array();

                            foreach($query_avatar_url->result_array() as $row)
                            {
                                  array_push($arr_avatar,$row);
                            }

                            $user_avatar=$arr_avatar[0];

                  }
                 else
                    {
                        $user_avatar=array('avatar_url' => '', );

                    }

                $arr[$i]['avatar_url']=$user_avatar['avatar_url'];

            }
            
            return $arr;
        }



    }
