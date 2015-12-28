<?php

/**
 * Class Impress_model
 *
 * @author    buptzl<193519395@qq.com>
 * @version   1.0
 * @since     1.0
 */
class Impresscomment_model extends CI_Model {

    function __construct()
    {

        parent::__construct();
        $this->load->database();

    }


    //为对象添加评论
    function add_comment_for_impress($arr)
    {
    	return $this->db->insert('xl_impresscomment',$arr);
    }

    //当前印象的评论数目加1
	function add_comment_num($impress_id)
	{
		$query=$this->db->query("UPDATE xl_impressitem SET commentnum=commentnum+1 WHERE id='{$impress_id}'");
        if ($this->db->affected_rows()>0) 
        {
            return TRUE;
        }

        return FALSE;	
	}   
	//当前印象的评论数名减1
	function sub_comment_num($impress_id)
    {
        $query=$this->db->query("UPDATE xl_impressitem SET commentnum=commentnum-1 WHERE id='{$impress_id}'");
        if ($this->db->affected_rows()>0) 
        {
            return TRUE;
        }

        return FALSE;
    }

    //获取当前印象的评论数
    function count_comment($impress_id)
    {
        $query=$this->db->query("SELECT id FROM xl_impresscomment WHERE impress_id='{$impress_id}'");
        return $query->num_rows();
    }

    function get_impress_comments($impress_id)
    {
        $query=$this->db->query("SELECT * FROM xl_impresscomment WHERE impress_id='{$impress_id}' ORDER BY updatetime DESC");
        $arr = array();

        foreach ($query -> result_array() as $row) 
        {
            array_push($arr, $row);
        }

          for ($i=0; $i < count($arr); $i++) { 
            $operator_id=$arr[$i]['operator_id'];
            
            $query_avatar_url=$this->db->query("SELECT avatar_url AS avatar_url FROM xl_avatar WHERE account_id='{$operator_id}'");

            $query_account_info=$this->db->query("SELECT id,nickname,cellphone,sex,birthday,horoscope,status,register_user,type FROM xl_account WHERE id='{$operator_id}'");

            $arr_info = array();

            foreach($query_account_info->result_array() as $row)
            {
                    array_push($arr_info,$row);
            }

            $user_info=array();

           if (count($arr_info)>0) 
             {
                $user_info['account_id']=$arr_info[0]['id'];
                $user_info['nickname']=$arr_info[0]['nickname'];
             }

            
         
            if ($query_avatar_url->num_rows()>0) 
            {
                $arr_avatar = array();

                foreach($query_avatar_url->result_array() as $row)
                {
                      array_push($arr_avatar,$row);
                }

                $user_avatar=$arr_avatar[0];

           }

            else
             {
                $user_avatar=array('avatar_url' => '', );

             }
         $impress_comments['impress_id']=$arr[$i]['impress_id'];
         $impress_comments['content']=$arr[$i]['content'];
         $impress_comments['updatetime']=$arr[$i]['updatetime'];
         $user_info=array_merge($user_info, $user_avatar);
         $user_info=array_merge($user_info,$impress_comments);
         $details_arr[$i]=$user_info;

        }
        return $details_arr;

    }



}