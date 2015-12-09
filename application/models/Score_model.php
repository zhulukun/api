<?php

    class Score_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }

        /**
         * calculate avg score for user
         *
         * @param $target_id
         * @return int
         */
        function user_avg_score($target_id)
        {
            $query = $this->db->query("SELECT target_id,AVG(score) AS avg_score FROM xl_score GROUP BY target_id HAVING target_id = '{$target_id}'");

            return $query->row_array()['avg_score'];
        }

        /**
         * someone score others
         *
         * @param $arr
         * @return bool
		 */
        function user_score_target($arr)
        {
        	$target_id = $arr['target_id'];
        	$operator_id = $arr['operator_id'];
        	$score = $arr['score'];
        	if($this->has_user_scored($target_id,$operator_id))
        	{
                //update score
        		$query=$this->db->query("UPDATE xl_score SET score = '{$score}' WHERE target_id='{$target_id}' AND operator_id='{$operator_id}'");

                if($query == TRUE)
                {
                    return TRUE;
                }
                return FALSE;
        	}
        	$query = $this->db->insert('xl_score',$arr);
	        if($query == TRUE)
	        {
	            return TRUE;
	        }
	        return FALSE;
        }


        /**
         * judge user has or not scored for target_account
         *
         * @param $arr
         * @return bool
		 */
        function has_user_scored($target_id,$operator_id)
	    {

	        $query=$this->db->query("SELECT * FROM xl_score WHERE target_id='{$target_id}' AND operator_id='{$operator_id}'");

	        if ($query->num_rows()>0) {
	            return TRUE;
	          }

	          return FALSE;  
	    }
    }
