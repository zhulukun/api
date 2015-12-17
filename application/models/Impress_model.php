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
        $query = $this->db->query("SELECT impress_keyword,impress_num,isview,impresstype FROM xl_impress_keyword WHERE target_id ='{$target_id}' AND isview=1 ORDER BY impress_num DESC LIMIT 0,5");

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


    /**
     * obtain user's impress details
     *
     * @param $target_id ,$page,$page_size
     * @return array
     */
    function get_impress_details($target_id,$page,$page_size)
    {        
        
        $m = ($page - 1) * $page_size;
        $n = $page_size;

        $query = $this->db->query("SELECT xl_account.id as id, nickname, cellphone,IFNULL(email,'') AS email, IFNULL(sex,'') AS sex, IFNULL(horoscope,'') AS horoscope, IFNULL(birthday,'') AS birthday,status,type, allow_notice, allow_score, xl_impress.id as impress_id, impresscontent 
                                   FROM xl_account, xl_impress
                                   WHERE xl_impress.operator_id = xl_account.id AND xl_impress.target_id = '{$target_id}' 
                                   LIMIT {$m},{$n}");

        $arr = array();

        foreach($query->result_array() as $row)
        {
            array_push($arr,$row);
        }

        $query_id = array_column($arr,'id');   //获取所有account_id
        $query_id = array_unique($query_id);   //account_id去重
        
        $arr2 = array();
        foreach ($query_id as $key => $value) 
        {
            $temp['id'] = $value;
            //查询分数score
            $query1 = $this->db->query("SELECT AVG(score) as score from xl_score GROUP BY target_id HAVING target_id='{$value}'");
            $re = $query1->row_array();

            if(!isset($re))
            {
                $temp['score'] = 0;                           
            }
            else
            {
                $score_arr=row_array();
                $temp['score'] = $query1->$score_arr['score'];
            }

            //查询头像路径avatar
            $query2 = $this->db->query("SELECT avatar_url from xl_avatar WHERE account_id='{$value}'");
            $re = $query2->row_array();

            if(!isset($re))
            {
                $temp['avatar_url'] = '';                
            }
            else
            {
                $temp['avatar_url'] = $re['avatar_url'];
            }
            array_push($arr2, $temp);
        }

        //将两组结果arr和arr1按id合并
        foreach ($arr as &$row) 
        {
            foreach ($arr2 as $row1) {
                if($row1['id'] == $row['id'])
                {
                    $row['avatar_url'] = $row1['avatar_url'];
                    $row['score'] = $row1['score'];
                    break;
                }
            }
        }
        unset($row);
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
    


}
