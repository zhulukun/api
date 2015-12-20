<?php

    class Avatar_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }

        function insert_user_avatar($arr)
        {
        	$query = $this->db->insert('xl_avatar',$arr);
		    if($query == TRUE)
		    {
		        return TRUE;
		    }
		    
		    return FALSE; 	
        }

        function is_exist_avatar($account_id)
        {
        	$query=$this->db->query("SELECT * FROM xl_avatar WHERE account_id='{$account_id}'");
        	if ($query->num_rows()>0) {
        		return TRUE;
        	}
        	else
        	{
        		return FALSE;
        	}
        }

        function update_user_avatar($account_id,$avatar_url,$format)
        {
        	$query=$this->db->query("UPDATE xl_avatar SET avatar_url='{$avatar_url}',format='{$format}' WHERE account_id='{$account_id}'");
        	if ($this->db->affected_rows()>0) {
        		# code...
        		return TRUE;
        	}
        	return FALSE;
        }
    }

?>
