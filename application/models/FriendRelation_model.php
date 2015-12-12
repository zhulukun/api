<?php

    /**
    *process the user message
    *
    * 
    * @author      zlk<17888835130@163.com>
    * @version     1.0
    * @since        1.0
    */
    class FriendRelation_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }
        
        function is_friend_exist($cellphone,$parent_id)
        {
          $query=$this->db->query("SELECT * FROM xl_friendrelation WHERE cellphone='{$cellphone}'  AND parent_id='{$parent_id}'");
          if($query->num_rows()==0)
          {
            return FALSE;
          }
          return TRUE;

        }

        function insert_friend_info($cellphone,$name,$email,$parent_id)
        {
            $query=$this->db->query("INSERT INTO xl_friendrelation(cellphone,name,email,parent_id) VALUES('{$cellphone}','{$name}','{$email}','{$parent_id}')");
            if ($this->db->affected_rows()>0) 
            {
                return TRUE;  
            }
            return FALSE;
        }
      
       function is_local_update($cellphone,$name,$email,$parent_id)
        {
          $query=$this->db->query("SELECT * FROM xl_friendrelation WHERE cellphone='{$cellphone}' AND name='{$name}' AND email='{$email}' AND parent_id='{$parent_id}'");
          if ($query->num_rows()==0) {
            return TRUE;
          }
          return FALSE;
        }


        function update_friend_info($cellphone,$name,$email,$parent_id)
        {
          $query=$this->db->query("UPDATE xl_friendrelation SET name='{$name}',email='{$email}' WHERE cellphone = '{$cellphone}' AND parent_id='{$parent_id}'");
          if($this->db->affected_rows()==0)
          {
            return FALSE;
          }
          return TRUE;

        }
    }

?>
