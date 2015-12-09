<?php

    class Accountplanvote_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }

        /**
         * count vote for plans
         *
         * @param $plan_id
         * @return int
         */
        function count_plan_votes($plan_id)
        {
            $query = $this->db->query("SELECT * FROM xl_accountplanvote WHERE plan_id = '{$plan_id}'");

            return $query->num_rows();
        }

        /**
         * vote for plan
         *
         * @param $arr
         * @return bool
		 */
        function add_plan_vote($arr)
        {
        	$plan_id = $arr['plan_id'];
        	$operator_id = $arr['operator_id'];
        	if($this->has_user_voted($plan_id,$operator_id))
        	{
        		return FALSE;
        	}
        	$query = $this->db->insert('xl_accountplanvote',$arr);
	        if($query == TRUE)
	        {
	            return TRUE;
	        }
	        return FALSE;
        }


        /**
         * judge user has or not voted for this plan
         *
         * @param $arr
         * @return bool
		 */
        function has_user_voted($plan_id,$operator_id)
	    {

	        $query=$this->db->query("select * from xl_accountplanvote where plan_id='{$plan_id}' and operator_id='{$operator_id}'");

	        if ($query->num_rows()>0) {
	            return TRUE;
	          }

	          return FALSE;  
	    }
    }
