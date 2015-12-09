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

        function get_all_friends($account_id,$page,$page_size,$sort,$only_register)
        {
            
            $query=$this->db->query("SELECT friend_info FROM xl_friendinfo WHERE account_id='{$account_id}'");
            
            $arr = array();

            foreach($query->result_array() as $row)
              {
                    array_push($arr,$row);
              }
            if (count($arr)>0) {

               $arr_friends=(array)json_decode($arr[0]['friend_info'],TRUE);

            }
            else
            {
              return $arr;
            }
          $users_info=array();
           $index=0;
            for ($i=0; $i <count($arr_friends); $i++) 
            {   
                $cellphone=$arr_friends[$i]['phone'];
                if ($only_register === 0 ) 
                {
                  $query=$this->db->query("SELECT id FROM xl_account WHERE cellphone='{$cellphone}'");
                }
                if ($only_register === 1) 
                {
                  $query=$this->db->query("SELECT id from xl_account where cellphone='{$cellphone}' and register_user=1");
                }

           if ($query->num_rows()>0) 
                {

                $arr = array();

                foreach($query->result_array() as $row)
                  {
                        array_push($arr,$row);
                  }     

                    $account_id=$arr[0]['id'];

                    //$query_avg_score=$this->db->query("SELECT AVG(score) AS score FROM xl_score WHERE target_id='{$account_id}'");

                    $query_avatar_url=$this->db->query("SELECT avatar_url AS avatar_url FROM xl_avatar WHERE account_id='{$account_id}'");

                    $query_account_info=$this->db->query("SELECT id,nickname,cellphone,sex,birthday,horoscope,status,datetime,type FROM xl_account WHERE id='{$account_id}'");

                      $arr = array();

                      foreach($query_account_info->result_array() as $row)
                      {
                            array_push($arr,$row);
                      }

                     $user_info=$arr[0];


                     // if ($query_avg_score->num_rows()>0) {
                        
                     //    $arr_score = array();

                     //    foreach($query_avg_score->result_array() as $row)
                     //    {
                     //          array_push($arr_score,$row);
                     //    }

                     //    $score=number_format($arr_score[0]['score'], 2, '.', '');
                     //    $user_score=array('score' => $score );
                     // }
                     // else
                     // {
                     //    $user_score=array('score' => '无', );
                     // }

                     if ($query_avatar_url->num_rows()>0) 
                     {
                        $arr_avatar = array();

                        foreach($query_avatar->result_array() as $row)
                        {
                              array_push($arr_score,$row);
                        }

                        $user_avatar=$arr_avatar[0];

                     }
                     else
                     {
                        $user_avatar=array('avatar_url' => '', );

                     }

                     $user_info=array_merge($user_info, $user_avatar);
                   //  $user_info=array_merge($user_info,$user_score);

                     $users_info[$index]=$user_info;
                     $index++;
                }
            }
           // echo(count($user_info));
            $total_page=ceil(count($users_info)/$page_size);
              // desc by datetime
              if ($sort == '-id') 
              {
                for ($i=0; $i < count($users_info)-1; $i++) 
                {
                  for ($j=$i; $j < count($users_info); $j++) 
                  { 
                     if (strtotime($users_info[$i]['datetime'])<=strtotime($users_info[$j]['datetime'])) 
                     {
                        $temp=$users_info[$j];
                        $users_info[$j]=$users_info[$i];
                        $users_info[$i]=$temp;
                     }
                   } 

                }
              }

            if ($sort == 'id') 
              {
                for ($i=0; $i < count($users_info)-1; $i++) 
                {
                  for ($j=$i; $j < count($users_info); $j++) 
                  { 
                     if (strtotime($users_info[$i]['datetime'])>=strtotime($users_info[$j]['datetime'])) 
                     {
                        $temp=$users_info[$j];
                        $users_info[$j]=$users_info[$i];
                        $users_info[$i]=$temp;
                     }
                   } 

                }
              }

              if ($sort == '-score') 
              {
                for ($i=0; $i < count($users_info)-1; $i++) 
                {
                  for ($j=$i; $j < count($users_info); $j++) 
                  { 
                     if (strtotime($users_info[$i]['score'])<=strtotime($users_info[$j]['score'])) 
                     {
                        $temp=$users_info[$j];
                        $users_info[$j]=$users_info[$i];
                        $users_info[$i]=$temp;
                     }
                   } 

                }
              }

              if ($sort == 'score') 
              {
                for ($i=0; $i < count($users_info)-1; $i++) 
                {
                  for ($j=$i; $j < count($users_info); $j++) 
                  { 
                     if (strtotime($users_info[$i]['score'])>=strtotime($users_info[$j]['score'])) 
                     {
                        $temp=$users_info[$j];
                        $users_info[$j]=$users_info[$i];
                        $users_info[$i]=$temp;
                     }
                   } 
                }
              }

              //pagedivide 
              $final_index=0; 
              
              $userinfos=array();
              for ($i=($page-1)*$page_size; $i <($page-1)*$page_size+$page_size && $i<count($users_info); $i++) 
              { 
                  $userinfos[$final_index]=$users_info[$i];
                  $final_index++;
              }

              $total= count($userinfos);
              $callback=array();
              $callback['status']='ok';
              $callback['response']=array(
                          "page" => $page,
                          "page_size" => $page_size,
                          "total_page" => $total_page,
                          "friends" =>$userinfos
                      );

                return $callback;        
              


            
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



        
    }

?>
