<?php

    class Notice_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }

        /**
         * count notices int the database
         *
         * @return int
         */
        function count_notices($target_id)
        {
            $query = $this->db->query("SELECT * FROM xl_notice WHERE receiver_id = '{$target_id}'");

            return $query->num_rows();
        }

        /**
         * obtain notices
         *
         * @param $target_id,$page,$page_size
         * @return array
         */
        function get_notices($target_id,$page,$page_size)
        {
            if($page == 0)
	        {
	            $query = $this->db->query("SELECT * FROM xl_notice WHERE receiver_id = '{$target_id}'");
	        }
	        else
	        {
	            $m = ($page - 1) * $page_size;
	            $n = $page_size;
	            $query = $this->db->query("SELECT * FROM xl_notice WHERE receiver_id = '{$target_id}' LIMIT {$m},{$n}");
	        }
	        
	        $arr = array();

	        foreach($query->result_array() as $row)
	        {
	            array_push($arr,$row);
	        }
	        return $arr;
        }
    }

?>
