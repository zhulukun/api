<?php

    class Invite_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }

        //通过account_id获取nickname
        function get_name($account_id)
        {
            $query=$this->db->query("SELECT nickname FROM xl_account WHERE id = '{$account_id}'");
            if ($query->num_rows() == 0) {
                return;
            }

            $arr = array();

            foreach($query->result_array() as $row)
            {
                array_push($arr,$row);
            }
            return $arr[0]['nickname'];
        }

        //通过account_id获取cellphone
        function get_phone($account_id)
        {
            $query=$this->db->query("SELECT cellphone FROM xl_account WHERE id = '{$account_id}'");
            if ($query->num_rows() == 0) {
                return;
            }

            $arr = array();

            foreach($query->result_array() as $row)
            {
                array_push($arr,$row);
            }
            return $arr[0]['cellphone'];
        }
        
    }
