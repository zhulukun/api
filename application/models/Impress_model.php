<?php

/**
 * Class Impress_model
 *
 * @author    buptzl<193519395@qq.com>
 * @version   1.0
 * @since     1.0
 */
class Impress_model extends CI_Model {

    function __construct()
    {

        parent::__construct();
        $this->load->database();

    }


    /**
     * count user's impress int the database
     *
     * @param target_id
     * @return int
     */
    function count_impresses($target_id)
    {
        $query = $this->db->query("SELECT * FROM xl_impress_keyword WHERE target_id = '{$target_id}'");

        return $query->num_rows();
    }

    /**
     * obtain user's impress
     *
     * @param target_id
     * @return array
     */
    function get_impress($target_id)
    {
        $query1 = $this->db->query("SELECT impress_keyword,impress_num,isview,impresstype FROM xl_impress_keyword WHERE target_id ='{$target_id}' AND isview=1 AND (impresstype=2 OR impresstype=3 OR impresstype=4 ) ORDER BY impress_num DESC LIMIT 0,4");
        $query2 = $this->db->query("SELECT impress_keyword,impress_num,isview,impresstype FROM xl_impress_keyword WHERE target_id ='{$target_id}' AND isview=1 AND impresstype=1 ORDER BY impress_num DESC LIMIT 0,1");
        $arr1 = array();

        foreach($query1->result_array() as $row)
        {
            array_push($arr1,$row);
        }
        $arr2 = array();

        foreach($query2->result_array() as $row)
        {
            array_push($arr2,$row);
        }
        $arr=array_merge($arr2,$arr1);
        return $arr;
    }

    /**
     * obtain user's impress
     *
     * @param target_id
     * @return array
     */
    function get_impress_like($target_id)
    {
        $query = $this->db->query("SELECT impress_keyword,impress_num,isview,impresstype FROM xl_impress_keyword WHERE target_id ='{$target_id}' AND impresstype=3 ORDER BY impress_num DESC");

        $arr = array();

        foreach($query->result_array() as $row)
        {
            array_push($arr,$row);
        }
        return $arr;
    }
    /**
     * obtain user's impress
     *
     * @param target_id
     * @return array
     */
    function get_impress_relation($target_id)
    {
        $query = $this->db->query("SELECT impress_keyword,impress_num,isview,impresstype FROM xl_impress_keyword WHERE target_id ='{$target_id}' AND impresstype=1 ORDER BY impress_num DESC ");

        $arr = array();

        foreach($query->result_array() as $row)
        {
            array_push($arr,$row);
        }
        return $arr;
    }
    /**
     * obtain user's impress
     *
     * @param target_id
     * @return array
     */
    function get_impress_character($target_id)
    {
        $query = $this->db->query("SELECT impress_keyword,impress_num,isview,impresstype FROM xl_impress_keyword WHERE target_id ='{$target_id}' AND impresstype=2 ORDER BY impress_num DESC");

        $arr = array();

        foreach($query->result_array() as $row)
        {
            array_push($arr,$row);
        }
        return $arr;
    }

    function get_impress_useradd($target_id)
    {
        $query = $this->db->query("SELECT impress_keyword,impress_num,isview,impresstype FROM xl_impress_keyword WHERE target_id ='{$target_id}' AND impresstype=4 ORDER BY impress_num DESC");

        $arr = array();

        foreach($query->result_array() as $row)
        {
            array_push($arr,$row);
        }
        return $arr;
    }


    /**
     * add user's impress
     *
     * @param $impress_arr
     * @return bool
     */
    function add_impress($impress_arr)
    {
        $query = $this->db->insert('xl_impress',$impress_arr);
        if($query == TRUE)
        {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * get system preset impress
     *
     * @return array
     */
    function get_preset_impresses()
    {
        $query = $this->db->query("SELECT id,preset_impress FROM xl_presetimpress");

        $arr = array();

        foreach($query->result_array() as $row)
        {
            array_push($arr,$row);
        }
        return $arr;
    }

    /**
     * get system preset keywords
     *
     * @return array
     */
    function get_preset_keywords()
    {
        $query = $this->db->query("SELECT id,keyword FROM xl_systemkeywords");

        $arr = array();

        foreach($query->result_array() as $row)
        {
            array_push($arr,$row);
        }
        return $arr;
    }
    
    //判断操作者是否为当前用户添加过这个印象
    function is_useradd_theimpress($operator_id,$target_id,$impresscontent)
        {
            $query=$this->db->query("SELECT * FROM xl_impress WHERE operator_id='{$operator_id}' AND target_id='{$target_id}' AND impresscontent='{$impresscontent}'");
            if ($query->num_rows()>0) {
                return TRUE;
            }
            return FALSE;
        }

    //判断操作者是否为当前用户添加过亲友印象
    function is_add_relation($operator_id,$target_id)
    {
        $query=$this->db->query("SELECT * FROM xl_impress WHERE operator_id='{$operator_id}' AND target_id='{$target_id}' AND impresstype=1");
        if ($query->num_rows()>0) {
            # code...
            return TRUE;
        }
        return FALSE;
    }

    function get_impress_details($target_id)
    {
        $query=$this->db->query("SELECT distinct operator_id from xl_impress where target_id='{$target_id}'");
        $details_arr=array();
        $arr = array();
        foreach($query->result_array() as $row)
        {
            array_push($arr,$row);
        }
        for ($i=0; $i < count($arr); $i++) { 
            $operator_id=$arr[$i]['operator_id'];
            $query_impress=$this->db->query("SELECT impresscontent,impresstype FROM xl_impress WHERE target_id='{$target_id}' AND operator_id='{$operator_id}'");
            $impress_arr = array();
            foreach($query_impress->result_array() as $row)
            {
                array_push($impress_arr,$row);
            }
            $user_impress['impress']=$impress_arr;

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
          
                $user_info=$arr_info[0];
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

         $user_info=array_merge($user_info, $user_avatar);
         $user_info=array_merge($user_info,$user_impress);
         $details_arr[$i]=$user_info;

        }
        return $details_arr;
    }

    //统计xl_presetimpress表里的预设影响数目
    function count_preset_impresses()
    {
         $query = $this->db->query("SELECT * FROM xl_presetimpress");

        return $query->num_rows();   
    }

    //获取好友关系的预设印象
    function get_preset_impress_relation()
    {
         $query = $this->db->query("SELECT preset_impress FROM xl_presetimpress WHERE impresstype=1");

        $arr = array();

        foreach($query->result_array() as $row)
        {
            array_push($arr,$row);
        }
        return $arr;
    }

    function get_preset_impress_character()
    {
         $query = $this->db->query("SELECT preset_impress FROM xl_presetimpress WHERE impresstype=2");

        $arr = array();

        foreach($query->result_array() as $row)
        {
            array_push($arr,$row);
        }
        return $arr;   
    }

    function get_preset_impress_like()
    {
        $query = $this->db->query("SELECT preset_impress FROM xl_presetimpress WHERE impresstype=3");

        $arr = array();

        foreach($query->result_array() as $row)
        {
            array_push($arr,$row);
        }
        return $arr;
    }

}
