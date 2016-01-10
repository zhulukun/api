<?php

    class FriendInfo_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }

    /**
    	* add user's friends info into the database
     	*
     	* @param id account_id friends_info
    	* @return bool
     	*/

        function add_friends($id,$account_id,$friend_info)
        {
        	$query=$this->db->query("INSERT INTO xl_friendinfo(id,account_id,friend_info) VALUES ('{$id}','{$account_id}','{$friend_info}')");

        	if ($this->db->affected_rows()>0) 
        	{
        		return TRUE;
        	}

        	return FALSE;
        }

        /**
        * add user's friends info into the database
        *
        * @param id account_id friends_info
        * @return bool
        */

        function update_friends($account_id,$friends_info)
        {
            $query=$this->db->query("UPDATE xl_friendinfo SET friend_info='{$friends_info}' WHERE account_id='{$account_id}'");

            if ($this->db->affected_rows()>0) 
            {
                return TRUE;
            }

            return FALSE;
        }

        /**
        * get all friends info by account_id
        *
        * @param account_id
        * @return jsonArray
        */

        function get_all_friends($target_id)
        {
            
              $query=$this->db->query("SELECT cellphone FROM xl_friendrelation WHERE parent_id='{$target_id}'");
              $arr1=array();
              $user_array=array();
              if ($query->num_rows()>0) {
                foreach($query->result_array() as $row)
                 {
                    array_push($arr1,$row);
                 }
              }
              if (count($arr1)>0) {
                for ($i=0; $i < count($arr1); $i++) {
                          $account_id=$this->get_account_id($arr1[$i]['cellphone']); 
                          if (!isset($account_id)) {
                            break;
                          }
                          $query_avatar_url=$this->db->query("SELECT avatar_url AS avatar_url FROM xl_avatar WHERE account_id='{$account_id}'");

                          $query_account_info=$this->db->query("SELECT xl_account.id,xl_account.nickname,xl_account.cellphone,xl_account.sex,xl_account.birthday,xl_account.horoscope,xl_account.status,xl_account.register_user,xl_account.type,xl_friendrelation.name,xl_friendrelation.email FROM xl_account,xl_friendrelation WHERE xl_account.id='{$account_id}' AND xl_account.cellphone=xl_friendrelation.cellphone");

                          $arr = array();

                          foreach($query_account_info->result_array() as $row)
                          {
                                array_push($arr,$row);
                          }
                         $user_info=array();

                         if (count($arr)==0) 
                         {
                          
                           return $user_info;
                         }

                        $user_info=$arr[0];

                         // if ($query_avatar_url->num_rows()>0) 
                         // {
                         //    $arr_avatar = array();

                         //    foreach($query_avatar->result_array() as $row)
                         //    {
                         //          array_push($arr_score,$row);
                         //    }

                         //    $user_avatar=$arr_avatar[0];

                         // }
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
                      $impress['impress']=$this->get_impress($account_id);

                      $user_info=array_merge($user_info, $user_avatar);
                      $user_info=array_merge($user_info,$impress);
                      $user_array[$i]=$user_info;

                }

              }

                $cnt=count($user_array);
               for ($i = 0; $i < $cnt; $i++) 
                  {
                      for ($j = 0; $j < $cnt - $i - 1; $j++)
                       {
                          $start=$this->_getFirstCharter($user_array[$j]['name']);
                          $end=$this->_getFirstCharter($user_array[$j+1]['name']);
                      
                          if ($start >= $end) 
                          {
                              $temp=$user_array[$j];
                              $user_array[$j]=$user_array[$j+1];
                              $user_array[$j+1]=$temp;
                          }
                      }
                  }

              // for ($i=0; $i <count($user_array)-1; $i++) 
              // { 
              //     $start=$this->_getFirstCharter($user_array[$i]['name']);


              //     for ($j=$i+1; $j < count($user_array); $j++) { 
              //      $end=$this->_getFirstCharter($user_array[$j]['name']);
              //      if ($start >= $end) {
              //         $temp=$user_array[$i];
              //         $user_array[$i]=$user_array[$j];
              //         $user_array[$j]=$temp;
              //      }


              //     }
              // }

              return $user_array;

              // $callback=array();
              // $callback['status']='ok';
              // $callback['response']=array(
              //             "page" => $page,
              //             "page_size" => $page_size,
              //             "total_page" => $total_page,
              //             "friends" =>$userinfos
              //         );

              //   return $callback;        
              


            
        }

        /**
        * get  friends number by account_id
        *
        * @param account_id
        * @return int
        */

        function get_friends_num($account_id)
        {
            $query=$this->db->query("SELECT friend_info FROM xl_friendinfo WHERE account_id='{$account_id}'");
            
            $arr = array();

            foreach($query->result_array() as $row)
              {
                    array_push($arr,$row);
              }

            return count((array)json_decode($arr[0]['friend_info'],TRUE));
        }

       /**
    	* judge the user's friends is added or not.
     	*
     	* @param account_id
    	* @return bool
     	*/

        function is_friends_added($account_id)
        {
        	$query=$this->db->query("SELECT * FROM xl_friendinfo WHERE account_id='{$account_id}'");

        	if ($query->num_rows()>0) 
        	{
        		return TRUE;
        	}

        	return FALSE;
        }

        function get_account_id($phone)
        {

          $query=$this->db->query("SELECT id FROM xl_account WHERE cellphone='{$phone}'");
          $arr = array();
          if ($query->num_rows()>0) {

                  foreach($query->result_array() as $row)
                     {
                         array_push($arr,$row);
                     }
          }
          if (count($arr)>0) {
               return $arr[0]['id'];
          }
          return;
        }


    /**
     * obtain user's impress
     *
     * @param target_id
     * @return array
     */
    function get_impress($target_id)
    {
        $query = $this->db->query("SELECT impress_keyword,impress_num FROM xl_impress_keyword WHERE target_id ='{$target_id}' AND isview=1 ORDER BY impress_num DESC LIMIT 0,5");

        $arr = array();

        foreach($query->result_array() as $row)
        {
            array_push($arr,$row);
        }
        return $arr;
    }

    //获取汉字的第一个字母
    function _getFirstCharter($str){  
      $encode = mb_detect_encoding($str, array("ASCII","UTF-8","GB2312","GBK","BIG5")); 
      // echo $str.'     '.$encode;
if(empty($str)){return 'ZZZ';}  
$fchar=ord($str{0});  
if($fchar>=ord('A')&&$fchar<=ord('z')) return strtoupper($str{0});  
$s1=iconv('UTF-8','gb2312',$str);  
$s2=iconv('gb2312','UTF-8',$s1);
$s=$s2==$str?$s1:$str;  
$asc=ord($s{0})*256+ord($s{1})-65536;  
if($asc>=-20319&&$asc<=-20284) return 'A';  
if($asc>=-20283&&$asc<=-19776) return 'B';  
if($asc>=-19775&&$asc<=-19219) return 'C';  
if($asc>=-19218&&$asc<=-18711) return 'D';  
if($asc>=-18710&&$asc<=-18527) return 'E';  
if($asc>=-18526&&$asc<=-18240) return 'F';  
if($asc>=-18239&&$asc<=-17923) return 'G';  
if($asc>=-17922&&$asc<=-17418) return 'H';  
if($asc>=-17417&&$asc<=-16475) return 'J';  
if($asc>=-16474&&$asc<=-16213) return 'K';  
if($asc>=-16212&&$asc<=-15641) return 'L';  
if($asc>=-15640&&$asc<=-15166) return 'M';  
if($asc>=-15165&&$asc<=-14923) return 'N';  
if($asc>=-14922&&$asc<=-14915) return 'O';  
if($asc>=-14914&&$asc<=-14631) return 'P';  
if($asc>=-14630&&$asc<=-14150) return 'Q';  
if($asc>=-14149&&$asc<=-14091) return 'R';  
if($asc>=-14090&&$asc<=-13319) return 'S';  
if($asc>=-13318&&$asc<=-12839) return 'T';  
if($asc>=-12838&&$asc<=-12557) return 'W';  
if($asc>=-12556&&$asc<=-11848) return 'X';  
if($asc>=-11847&&$asc<=-11056) return 'Y';  
if($asc>=-11055&&$asc<=-10247) return 'Z';  
return 'ZZZ';  
   }  
        
    }

?>
