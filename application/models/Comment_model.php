<?php


    class Comment_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }

     /**
      * add comment 
      *
      * @param mixed $arg1 account_id content
      * @since 1.0
      * @return bool
      */

     function add_comment($id,$operator_id,$target_id,$content)
     {
     	$query=$this->db->query("INSERT INTO xl_comment(id,operator_id,target_id,content) VALUES('{$id}','{$operator_id}','{$target_id}','{$content}')");

     	if ($this->db->affected_rows()>0) 
     	{
     		return TRUE;
     	}

     	return FALSE;
     }

     /**
      * get the current user relation comment  
      *
      * @param mixed $arg1 account_id content
      * @since 1.0
      * @return bool
      */
     function get_comment($target_id,$page,$page_size)
     {
     	$page=$page-1;
     	$start=$page*$page_size;
     	$query=$this->db->query("SELECT xl_comment.operator_id,xl_account.nickname,xl_comment.content,xl_comment.create_date FROM xl_comment,xl_account WHERE xl_account.id=xl_comment.operator_id AND xl_comment.target_id='{$target_id}' LIMIT {$start},{$page_size}");

     	 $arr = array();

          foreach($query->result_array() as $row)
          {
                array_push($arr,$row);
          }

        return $arr;
     }

     function get_comment_num($target_id)
     {
        $query=$this->db->query("SELECT count(xl_comment.id) as total_num FROM xl_comment,xl_account WHERE xl_account.id=xl_comment.operator_id AND xl_comment.target_id='{$target_id}'");
        $arr = array();

          foreach($query->result_array() as $row)
          {
                array_push($arr,$row);
          }
        return $arr;

     }
        
    }

