<?php

    class ImpressRelation_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }

        function is_useradd_theimpress($operator_id,$target_id,$impresscontent)
        {
            $query=$this->db->query("SELECT * FROM xl_impress_relation WHERE operator_id='{$operator_id}' AND target_id='{$target_id}' AND impresscontent='{$impresscontent}'");
            if ($query->num_rows()>0) {
                # code...
                return TRUE;
            }
            return FALSE;
        }

        function insert_impress($arr)
        {
             $query = $this->db->insert('xl_impress',$arr);
             
             if($query == TRUE)
                {
                    return TRUE;
                }
                return FALSE;
        }


    }
