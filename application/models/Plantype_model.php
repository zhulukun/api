<?php

    class Plantype_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }

        //插入分类
        function insert_category($category_cn,$category_en,$description)
        {
            $query=$this->db->query("INSERT INTO xl_plantype(category_cn,category_en,description) values('{$category_cn}','{$category_en}','{$description}')");
            if ($this->db->affected_rows()>0) 
            {
               return TRUE;
            }
            return FALSE;
        }

        //修改分类
        function update_category($id,$category_cn,$category_en,$description)
        {
            $query=$this->db->query("UPDATE xl_plantype SET category_cn='{$category_cn}',category_en='{$category_en}',description='{$description}' WHERE id={$id}");
            if ($this->db->affected_rows()>0) {
                # code...
                return TRUE;
            }
            return FALSE;
        }

        //删除分类
        function delete_category($id)
        {
            $query=$this->db->query("DELETE FROM xl_plantype WHERE id={$id}");
            if ($this->db->affected_rows()>0) {
                # code...
                return TRUE;
            }
            return FALSE;
        }
        
        //查找所有分类
        function select_category()
        {
            $query=$this->db->query("SELECT * FROM xl_plantype");
            $arr = array();
            foreach($query->result_array() as $row)
            {
                array_push($arr,$row);
            }

            return $arr;
        }

        //分类名中文名是否存在
        function is_exist_cn($category_cn)
        {
            $query=$this->db->query("SELECT * FROM xl_plantype WHERE category_cn='{$category_cn}'");
            if ($query->num_rows()>0) 
            {
                return TRUE;
            }
            return FALSE;
        }

        //分类名英文名是否存在
        function is_exist_en($category_en)
        {
            $query=$this->db->query("SELECT * FROM xl_plantype WHERE category_en='{$category_en}'");
            if ($query->num_rows()>0) 
            {
                return TRUE;
            }
            return FALSE;
        }

    }
