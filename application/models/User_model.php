<?php

    /**
    *process the user message
    *
    * 
    * @author      zlk<17888835130@163.com>
    * @version     1.0
    * @since        1.0
    */
    class User_model extends CI_Model {  
                              
        function __construct()  
        {  

            parent::__construct();
            $this->load->database(); 
        
        }
        
    /**
      * isExits 
      * judge some users exists or not in the database
      *
      * @param mixed $arg1 cellphone
      * @param mixed $arg2 password
      * @since 1.0
      * @return bool
      */
      function is_user_exists($cellphone,$password)
      {

        $query=$this->db->query("SELECT * FROM xl_account WHERE cellphone='{$cellphone}' AND password='{$password}' AND register_user=1");

        if ($query->num_rows()>0) {
            #if exist return true
            return TRUE;
          }

          return FALSE;  
      }


      /**
      * register 
      * insert users message in the xl_account table
      *
      * @param mixed $arg1 cellphone
      * @param mixed $arg2 password
      * @since 1.0
      * @return bool
      */
      function userRegister($account_id,$cellphone,$password,$nickname)
      {
          $query=$this->db->query("insert into xl_account(id,cellphone,password,register_user,nickname) values('{$account_id}','{$cellphone}','{$password}',1,'{$nickname}')");
          if ($this->db->affected_rows() > 0) {
            # if register success, return true
              return TRUE;
          }

          return FALSE;
      }

     /**
      * judge the phoneNo is used or not
      * select phoneNo in the xl_account
      *
      * @param mixed $arg1 cellphone
      * @since 1.0
      * @return bool
      */
      function is_user_register($cellphone)
      {
           
        $query=$this->db->query("SELECT * FROM xl_account WHERE cellphone='{$cellphone}' AND register_user=1");

        if ($query->num_rows()>0) {
            #if exist return true
            return TRUE;
          }

          return FALSE;  
      }

      /**
      * judge the user is registered or not
      * select phoneNo in the xl_account
      *
      * @param mixed $arg1 cellphone
      * @since 1.0
      * @return bool
      */
      function is_user_registered($cellphone)
      {
           
        $query=$this->db->query("SELECT * FROM xl_account WHERE cellphone='{$cellphone}' AND register_user=0");

        if ($query->num_rows()>0) {
            #if exist return true
            return TRUE;
          }

          return FALSE;  
      }

     /**
      * judge the user is registered or not
      * select phoneNo in the xl_account
      *
      * @param mixed $arg1 cellphone
      * @since 1.0
      * @return bool
      */

      function update_user_info($cellphone,$password)
      {
        $query=$this->db->query("UPDATE xl_account SET password='{$password}',register_user=1,nickname='{$nickname}' WHERE cellphone='{$cellphone}' AND register_user=0");

        if ($this->db->affected_rows()>0) {
            #if exist return true
            return TRUE;
          }

          return FALSE;  
      }

    /**
      * judge the phoneNo is used or not
      * select phoneNo in the xl_account
      *
      * @param mixed $arg1 cellphone
      * @since 1.0
      * @return bool
      */
    
      function isPhoneExists($cellphone)
      {
           
        $query=$this->db->query("SELECT * FROM xl_account WHERE cellphone='{$cellphone}'");

        if ($query->num_rows()>0) {
            #if exist return true
            return TRUE;
          }

          return FALSE;  
      }

      /**
       * insert unregister user into xl_account
       * @param mixed $arg1 id cellphone nickname email
       * @return bool
       */

      function insert_unregister_user($id,$cellphone)
      {
          $query=$this->db->query("INSERT INTO xl_account(id,cellphone,register_user) VALUES ('{$id}','{$cellphone}',0)");
         
          if ($this->db->affected_rows()>0) 
          {
            return TRUE;
          }
          
          return FALSE;

      }

      /**
      * select id in the xl_account by the cellphone
      *
      * @param mixed $arg1 cellphone
      * @since 1.0
      * @return account_id
      */

      function get_account_id($cellphone)
      {
          $query=$this->db->query("select id from xl_account where cellphone='{$cellphone}'");
           
           $arr = array();

          foreach($query->result_array() as $row)
          {
                array_push($arr,$row);
          }

            return $arr[0]['id'];
      }

      /**
      * get user info by the account_id
      *
      * @param mixed $arg1 account_id
      * @since 1.0
      * @return array
      */

      function get_user_info($account_id)
      {
       // $query_avg_score=$this->db->query("SELECT AVG(score) AS score FROM xl_score WHERE target_id='{$account_id}'");

        $query_avatar_url=$this->db->query("SELECT avatar_url AS avatar_url FROM xl_avatar WHERE account_id='{$account_id}'");

        $query_account_info=$this->db->query("SELECT id,nickname,cellphone,sex,birthday,horoscope,status,register_user,type FROM xl_account WHERE id='{$account_id}'");

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

         return $user_info;
          

      }

      function update_account_info($account_id,$sex,$birthday,$horoscope,$allow_notice)        
      {
            $query=$this->db->query("UPDATE xl_account SET sex='{$sex}',birthday='{$birthday}',horoscope='{$horoscope}',allow_notice='{$allow_notice}' WHERE id='{$account_id}'");
            if ($this->db->affected_rows()>0) {
               return TRUE;
            }
            return FALSE;
      }

        function update_password($phone,$new_password)
        {
            $query = $this->db->query("SELECT id FROM xl_account WHERE cellphone='{$phone}'");
            if($this->db->affected_rows() == 0)
            {
                return FALSE;
            }
            $query = $this->db->query("UPDATE xl_account SET password='{$new_password}' WHERE cellphone='{$phone}'");
            return TRUE;
        }


       
      
    }

?>
