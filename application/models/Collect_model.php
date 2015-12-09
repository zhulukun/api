<?php

    class Collect_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }

        /**
         * count collections by account id in the database
         *
         * @return int
         */
        function count_by_account($account_id)
        {
            $query = $this->db->query("SELECT * FROM xl_collect WHERE account_id = '{$account_id}'");

            return $query->num_rows();
        }

        /**
         * count collections by plan id in the database
         *
         * @return int
         */
        function count_by_plan($plan_id)
        {
            $query = $this->db->query("SELECT * FROM xl_collect WHERE plan_id = '{$plan_id}'");

            return $query->num_rows();
        }

        /**
         * collect plan
         *
         * @param $arr
         * @return bool
         */
        function collect_plan($arr)
        {
            $plan_id = $arr['plan_id'];
            $account_id = $arr['account_id'];
            $re = $this->has_user_collected($plan_id,$account_id);
            if($re != 'NEVER')
            {
                $query2 = $this->db->query("DELETE from xl_collect where id='{$re}'");
                return 2;
            }
            else
            {
                $query = $this->db->insert('xl_collect',$arr);
                if($query == TRUE)
                {
                    return 1;
                }
                return 0;
            }
        }
        
        /**
         * judge user has  or not collected this plan
         *
         * @param $arr
         * 
         */
        function has_user_collected($plan_id,$account_id)
        {

            $query=$this->db->query("select * from xl_collect where plan_id='{$plan_id}' and account_id='{$account_id}'");

            if ($query->num_rows()>0) {
                 $arr = array();

             foreach($query->result_array() as $row)
               {
                  array_push($arr,$row);
               }

            return $arr[0]['id'];
                // return $query->row_array()['id'];
              }

              return 'NEVER';  
        }
    }
