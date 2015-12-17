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
             * 
             * @return bool
             *
             *
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


    }
