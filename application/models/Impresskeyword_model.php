<?php

    class Impresskeyword_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }

        /**
         *  judge the impress exists or not 
         *
         *  @param $content
         *  @return bool
         */
        
        function is_impress_exist($target_id,$content)
        {
            $query=$this->db->query("SELECT * FROM xl_impress_keyword WHERE impress_keyword='{$content}' AND target_id='{$target_id}'");
            if ($query->num_rows()>0) {
                return TRUE;
            }
            return FALSE;
        }        


            /**
             * update the impress num
             * @return bool
             *
             */

            function update_impress_num($target_id,$content,$num)
            {
                $query=$this->db->query("UPDATE xl_impress_keyword SET impress_num=impress_num+{$num} WHERE impress_keyword='{$content}' AND target_id='{$target_id}'");
                if ($this->db->affected_rows()>0) {
                    return TRUE;
                }
                return FALSE;
            }

            function insert_impress($target_id,$content,$impress_type)
            {
                $query=$this->db->query("INSERT INTO xl_impress_keyword(target_id,impress_keyword,impresstype) values('{$target_id}','{$content}','{$impress_type}')");
                if ($this->db->affected_rows()>0) {
                    return TRUE;
                }
                return FALSE;
            }

            function set_impress_hidden($target_id,$content)
            {   
                $arr=$this->get_isview_status($target_id,$content);
                if (count($arr)>0) {
                    $isview=$arr[0]['isview'];
                }
                //隐藏印象
                if ($isview == '1') {
                    $query=$this->db->query("UPDATE xl_impress_keyword SET isview=0 WHERE target_id='{$target_id}' AND impress_keyword='{$content}'");
                    if ($this->db->affected_rows()>0) {
                        # code..
                        return TRUE;
                    }
                }
                //显示印象
                if ($isview == '0') {
                    $query=$this->db->query("UPDATE xl_impress_keyword SET isview=1 WHERE target_id='{$target_id}' AND impress_keyword='{$content}'");
                    if ($this->db->affected_rows()>0) {
                        # code..
                        return TRUE;
                    }
                }

                return FALSE;
            }

            //获取印象的isview状态
            function get_isview_status($target_id,$content)
            {
                $query=$this->db->query("SELECT isview FROM xl_impress_keyword WHERE target_id='{$target_id}' AND impress_keyword='{$content}'");
                 $arr = array();
                 
                foreach($query->result_array() as $row)
                {
                    array_push($arr,$row);
                }
                // print_r($arr);
                return $arr;   
           }

    }
