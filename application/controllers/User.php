<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 *
	 */
	function __construct()
    {

        parent::__construct();

        $this->load->helper('url');
		$this->load->model('User_model');
		$this->load->library('session');
		       

    }

	public function index()
	{
		$this->load->view('welcome_message');
	}
	/**
	 * user login
	 */
	
	public function login()
	{

		$json=file_get_contents("php://input");
		if(is_null(json_decode($json)))
			{
				$callback=array(
	        			'code' => '1300',
	        			'message' => 'json data invalid'
	        		);

	        	echo(json_encode($callback));
	        	return;
			}

		$de_json = (array)json_decode($json,TRUE);

	 	if (!array_key_exists('phone', $de_json) || !array_key_exists('password', $de_json)) 
	        {
	        	$callback=array(
		        			'code' => '1400',
		        			'message' => 'invalid params'
		        		);

	        	echo(json_encode($callback));
	        	return;
	        }

        $password=$de_json['password'];
        $cellphone=$de_json['phone'];		

		if ($this->User_model->is_user_exists($cellphone,$password)) {
			# code...

			$account_id=$this->User_model->get_account_id($cellphone);

			$this->session->set_userdata('account_id',$account_id,7*24*60*60);
			$token=md5(uniqid(md5(microtime(true)),true));
			// the token is out of date after 7 days
			$this->session->set_userdata('token',$token,7*24*60*60);
			$callback['status']='ok'; 
			$array['response']=array(
					'account_id' => $account_id,
					'token' => $token
				);
			$callback=array_merge($callback,$array);

			echo json_encode($callback);
		}
		else
		{
			$callback['status']='fail';
			$array['response']=array(
					'code' => '1500',
					'message' => 'login fail'
				);
			$callback=array_merge($callback,$array);
			echo json_encode($callback);

			return;
		}
	}

	/**
	 * user register
	 */

	public function register()
	{
		$json=file_get_contents("php://input");
		if(is_null(json_decode($json)))
			{
				$callback=array(
	        			'code' => '1300',
	        			'message' => 'json data invalid'
	        		);

	        	echo(json_encode($callback));
	        	return;
			}

		$de_json = (array)json_decode($json,TRUE);

	 	if (!array_key_exists('phone', $de_json) || !array_key_exists('password', $de_json) || !array_key_exists('password2', $de_json) || !array_key_exists('nickname', $de_json)) 
	        {
	        	$callback=array(
		        			'code' => '1400',
		        			'message' => 'invalid params'
		        		);

	        	echo(json_encode($callback));
	        	return;
	        }

		
		$cellphone = $de_json['phone'];
		$password = $de_json['password'];
		$password2 = $de_json['password2'];
		$nickname = $de_json['nickname'];

		//valid two password is same or not
		if ($password !== $password2) {

		 	$callback['status']='fail';
			$array['response']=array(
					'code' => '1500',
					'message' => 'The two password are not same'
				);
			$callback=array_merge($callback,$array);
			echo json_encode($callback);

			return;
		 } 

// valid the phone number exists or not
	if ($this->User_model->isPhoneExists($cellphone)) {
			
		    //if exists and has been registed
			if ($this->User_model->is_user_register($cellphone)) {
				$callback['status']='fail';
				$array['response']=array(
					'code' => '1500',
					'message' => 'The cellphone number has been used'
				);
				$callback=array_merge($callback,$array);
				echo json_encode($callback);
				return;
			}
			//if exists and has been not registered  excute update
			if ($this->User_model->is_user_registered($cellphone)) {
				# excute update_user method
				if ($this->User_model->update_user_info($cellphone,$password,$nickname)) {
					$token=md5(uniqid(md5(microtime(true)),true));
					$this->session->set_userdata('token',$token,7*24*60*60);
					$account_id=$this->User_model->get_account_id($cellphone);
					$callback['status']='ok';
					$array['response']=array(
							'account_id' => $account_id,
							'token' => $token
						);
					$callback=array_merge($callback,$array);
					echo json_encode($callback);

					return;

				}
			}
		}
		else
		{
			$account_id=md5(uniqid(md5(microtime(true)),true));

			if($this->User_model->userRegister($account_id,$cellphone,$password,$nickname))
			{
				$token=md5(uniqid(md5(microtime(true)),true));
				$this->session->set_userdata('token',$token,7*24*60*60);
				$callback['status']='ok';
				$array['response']=array(
						'account_id' => $account_id,
						'token' => $token
					);
				$callback=array_merge($callback,$array);
				echo json_encode($callback);

				return;

			}
	    }

	}

	/**
	 * 用户退出接口
	 */
	public function logout()
	{
		$json=file_get_contents("php://input");
		if(is_null(json_decode($json)))
			{
				$callback=array(
	        			'code' => '1300',
	        			'message' => 'json data invalid'
	        		);

	        	echo(json_encode($callback));
	        	return;
			}

		$de_json = (array)json_decode($json,TRUE);

		// if (!array_key_exists('token', $de_json)) 
		// {
		// 	$callback=array(
	 //        			'code' => '1100',
	 //        			'message' => 'token do not exist'
	 //        		);

  //       	echo(json_encode($callback));
  //       	return;
		// }

       
  //       $token=$de_json['token'];

  //       if (isset($_SESSION['token'])) 
  //       {
  //       	if ($token !== $_SESSION['token']) 
	 //        {
	 //        	$callback=array(
		//         			'code' => '1000',
		//         			'message' => ' Authentication error'
		//         		);

	 //        	echo(json_encode($callback));
	 //        	return;
	 //        }
  //       }
  //       else
  //       {
  //       	$callback=array(
		//         			'code' => '1200',
		//         			'message' => 'token is out of date'
		//         		);

	 //        	echo(json_encode($callback));
	 //        	return;
  //       }

		if (isset($_SESSION['account_id'])) {
			# code...
			unset($_SESSION['account_id']);

		}
		if (isset($_SESSION['token'])) {
			# code...
			unset($_SESSION['token']);

		}

		if (!isset($_SESSION['account_id']) && !isset($_SESSION['token'])) {
			# code...
			$callback['status']='ok';
			echo json_encode($callback);
			return;
		}

		$array['response']=array(
					'status' => 'fail',
					'code' => '1500',
					'message' => 'logout fail'
				);
		echo(json_encode($callback));
		return;


	} 

   
   /**
	*	获取用户详细信息接口
	*/
	public function get_user_info()
	{
		$json=file_get_contents("php://input");
		if(is_null(json_decode($json)))
			{
				$callback=array(
	        			'code' => '1300',
	        			'message' => 'json data invalid'
	        		);

	        	echo(json_encode($callback));
	        	return;
			}

		$de_json = (array)json_decode($json,TRUE);

		// if (!array_key_exists('token', $de_json)) 
		// {
		// 	$callback=array(
	 //        			'code' => '1100',
	 //        			'message' => 'token do not exist'
	 //        		);

  //       	echo(json_encode($callback));
  //       	return;
		// }

       
  //       $token=$de_json['token'];

  //       if (isset($_SESSION['token'])) 
  //       {
  //       	if ($token !== $_SESSION['token']) 
	 //        {
	 //        	$callback=array(
		//         			'code' => '1000',
		//         			'message' => ' Authentication error'
		//         		);

	 //        	echo(json_encode($callback));
	 //        	return;
	 //        }
  //       }
  //       else
  //       {
  //       	$callback=array(
		//         			'code' => '1200',
		//         			'message' => 'token is out of date'
		//         		);

	 //        	echo(json_encode($callback));
	 //        	return;
  //       }

	 	if (!array_key_exists('account_id', $de_json)) 
	        {
	        	$callback=array(
		        			'code' => '1400',
		        			'message' => 'invalid params'
		        		);

	        	echo(json_encode($callback));
	        	return;
	        }

		

		$account_id=$de_json['account_id'];
		$user_info=$this->User_model->get_user_info($account_id);
		if (count($user_info) == 0) 
		{
			$callback=array(
				"status" => 'fail',
				"response" => array(
						"code" => '1500',
						"message" => 'the user does not exist'
					)
			);
			echo json_encode($callback);
			return ;
		}

		// $this->session->set_userdata('token',$_SESSION['token'],7*24*60*60);
		$callback=array(
				"status" => 'ok',
				"response" => $user_info
			);
		echo json_encode($callback);
		return;
	}

	/**
	*	上传通信录到服务器
	*
	*/

	public function add_friends()
	{

		$this->load->model('FriendInfo_model');
		$this->load->model('FriendRelation_model');

		$json=file_get_contents("php://input");
		if(is_null(json_decode($json)))
			{
				$callback=array(
	        			'code' => '1300',
	        			'message' => 'json data invalid'
	        		);

	        	echo(json_encode($callback));
	        	return;
			}

		$de_json = (array)json_decode($json,TRUE);

		// if (!array_key_exists('token', $de_json)) 
		// {
		// 	$callback=array(
	 //        			'code' => '1100',
	 //        			'message' => 'token do not exist'
	 //        		);

  //       	echo(json_encode($callback));
  //       	return;
		// }

       
  //       $token=$de_json['token'];

  //       if (isset($_SESSION['token'])) 
  //       {
  //       	if ($token !== $_SESSION['token']) 
	 //        {
	 //        	$callback=array(
		//         			'code' => '1000',
		//         			'message' => ' Authentication error'
		//         		);

	 //        	echo(json_encode($callback));
	 //        	return;
	 //        }
  //       }
  //       else
  //       {
  //       	$callback=array(
		//         			'code' => '1200',
		//         			'message' => 'token is out of date'
		//         		);

	 //        	echo(json_encode($callback));
	 //        	return;
  //       }


	 	if (!array_key_exists('account_id', $de_json) || !array_key_exists('contacts', $de_json)) 
	        {
	        	$callback=array(
		        			'code' => '1400',
		        			'message' => 'invalid params'
		        		);

	        	echo(json_encode($callback));
	        	return;
	        }	

		$account_id=$de_json['account_id'];
		$friends_info=json_encode($de_json['contacts']);
		/**
		 * if the user's friends is not added
		 *
		 */
	    if (!($this->FriendInfo_model->is_friends_added($account_id))) 
	    {

	    	$id=md5(uniqid(md5(microtime(true)),true));
	    	
	    	if($this->FriendInfo_model->add_friends($id,$account_id,$friends_info))
				{	
					$user_info=(array)json_decode($friends_info,TRUE);

					for ($i=0; $i < count($user_info); $i++) { 

							$phone=$user_info[$i]['phone'];
						    $name=$user_info[$i]['name'];
						    $email=$user_info[$i]['email'];

						if (!$this->FriendRelation_model->is_friend_exist($phone,$account_id)) 
						{
							$this->FriendRelation_model->insert_friend_info($phone,$name,$email,$account_id);
						}

						/**
						*
						* judge if the xl_account has the user or not
						* if not insert into the user into the table
						* if exits don't insert
						*
						*/

						if (!($this->User_model->isPhoneExists($user_info[$i]['phone']))) 
						{
						    $id=md5(uniqid(md5(microtime(true)),true));
						  //  $user_info=(array)json_decode($friends_info,TRUE);

							$this->User_model->insert_unregister_user($id,$phone);						    
						}

					}
					//$token=md5(uniqid(md5(microtime(true)),true));
					$this->session->set_userdata('token',$_SESSION['token'],7*24*60*60);
					$callback['status']='ok';
					
					echo json_encode($callback);

					return;
				}
			else
			{
				$callback['status']='fail';

				$callback['response']=array(
							
							'code' => '1500',
							'message' => 'add friends fail'
						);

						echo json_encode($callback);

						return;
			}

	    }

	    else
	    {

		    /**
		     * if the user's friends has been added into the database
		     *
		     */
		    if($this->FriendInfo_model->update_friends($account_id,$friends_info))
				{	
					$user_info=(array)json_decode($friends_info,TRUE);
					// print_r($user_info);
					// die();
					for ($i=0; $i < count($user_info); $i++) { 
						
						 $phone=$user_info[$i]['phone'];
						 $name=$user_info[$i]['name'];
				         $email=$user_info[$i]['email'];

				         if (!$this->FriendRelation_model->is_friend_exist($phone,$account_id)) 
						{
							$this->FriendRelation_model->insert_friend_info($phone,$name,$email,$account_id);
						}
						/**
						*
						* judge if the xl_account has the user or not
						* if not insert into the user into the table
						* if exits don't insert
						*
						*/
						//如果通讯录增加了新的电话号码，上传到服务器插入
						if (!($this->User_model->isPhoneExists($phone))) 
						{
						    $id=md5(uniqid(md5(microtime(true)),true));
	
							$this->User_model->insert_unregister_user($id,$phone);
						}
						else
						{
							if (!$this->FriendRelation_model->is_friend_exist($phone,$account_id)) 
							{
								$this->FriendRelation_model->insert_friend_info($phone,$name,$email,$account_id);
							}
							//如果通信录中好友的姓名，邮箱被更改了，则更新数据库
							if ($this->FriendRelation_model->is_local_update($phone,$name,$email,$account_id))
							{
								$this->FriendRelation_model->update_friend_info($phone,$name,$email,$account_id);
							}
						}

					}
					// $this->session->set_userdata('token',$_SESSION['token'],7*24*60*60);
					$callback['status']='ok';
					echo json_encode($callback);
					return;
				}
			else
			{
				$callback['status']='fail';

				$callback['response']=array(
							
							'code' => '1500',
							'message' => 'update friends fail'
						);

						echo json_encode($callback);

						return;
			}
	    }
	}

	/**
	 *
	 *	获取好友信息接口
	 *
	 */
	public function get_all_friends()
	{

		$this->load->model('FriendInfo_model');
		$json=file_get_contents("php://input");
		if(is_null(json_decode($json)))
			{
				$callback=array(
	        			'code' => '1300',
	        			'message' => 'json data invalid'
	        		);

	        	echo(json_encode($callback));
	        	return;
			}

		$de_json = (array)json_decode($json,TRUE);

		// if (!array_key_exists('token', $de_json)) 
		// {
		// 	$callback=array(
	 //        			'code' => '1100',
	 //        			'message' => 'token do not exist'
	 //        		);

  //       	echo(json_encode($callback));
  //       	return;
		// }

       
  //       $token=$de_json['token'];

  //       if (isset($_SESSION['token'])) 
  //       {
  //       	if ($token !== $_SESSION['token']) 
	 //        {
	 //        	$callback=array(
		//         			'code' => '1000',
		//         			'message' => ' Authentication error'
		//         		);

	 //        	echo(json_encode($callback));
	 //        	return;
	 //        }
  //       }
  //       else
  //       {
  //       	$callback=array(
		//         			'code' => '1200',
		//         			'message' => 'token is out of date'
		//         		);

	 //        	echo(json_encode($callback));
	 //        	return;
  //       }


	 	if (!array_key_exists('account_id', $de_json)) 
	        {
	        	$callback=array(
		        			'code' => '1400',
		        			'message' => 'invalid params'
		        		);

	        	echo(json_encode($callback));
	        	return;
	        }	
	    $account_id=$de_json['account_id'];
		$user_info=$this->FriendInfo_model->get_all_friends($account_id);
		$callback['status']='ok';
		$callback['response']=$user_info;
		echo(json_encode($callback));
        return ;
	}

	/**
	 *
	 *	get all friends num（*暂时不考虑）
	 *
	 */
	public function get_friends_num()
	{
		$this->load->helper('url');
		$this->load->model('User_model');
		$this->load->model('FriendInfo_model');
		$this->load->library('session');
		$de_json =(array)json_decode(file_get_contents("php://input"),TRUE); 
		$account_id=$de_json['account_id'];
		
		echo(json_encode($user_info));
	}

	 /**
     *  更新用户信息
     */
    public function update_user_info()
    {
       

        $json=file_get_contents("php://input");
		if(is_null(json_decode($json)))
			{
				$callback=array(
	        			'code' => '1300',
	        			'message' => 'json data invalid'
	        		);

	        	echo(json_encode($callback));
	        	return;
			}

		$de_json = (array)json_decode($json,TRUE);

		// if (!array_key_exists('token', $de_json)) 
		// {
		// 	$callback=array(
	 //        			'code' => '1100',
	 //        			'message' => 'token do not exist'
	 //        		);

  //       	echo(json_encode($callback));
  //       	return;
		// }

       
  //       $token=$de_json['token'];

  //       if (isset($_SESSION['token'])) 
  //       {
  //       	if ($token !== $_SESSION['token']) 
	 //        {
	 //        	$callback=array(
		//         			'code' => '1000',
		//         			'message' => ' Authentication error'
		//         		);

	 //        	echo(json_encode($callback));
	 //        	return;
	 //        }
  //       }
  //       else
  //       {
  //       	$callback=array(
		//         			'code' => '1200',
		//         			'message' => 'token is out of date'
		//         		);

	 //        	echo(json_encode($callback));
	 //        	return;
  //       }


	 	if (!array_key_exists('account_id', $de_json) || !array_key_exists('nickname', $de_json) || !array_key_exists('sex', $de_json) || !array_key_exists('birthday', $de_json) || !array_key_exists('horoscope', $de_json) || !array_key_exists('allow_notice', $de_json)) 
	        {
	        	$callback=array(
		        			'code' => '1400',
		        			'message' => 'invalid params'
		        		);

	        	echo(json_encode($callback));
	        	return;
	        }
	    $account_id=$de_json['account_id'];	
	    $nickname=$de_json['nickname'];
	    $sex=$de_json['sex'];
	    $birthday=$de_json['birthday'];
	    $horoscope=$de_json['horoscope'];
	    $allow_notice=$de_json['allow_notice'];

        $result = $this->User_model->update_account_info($account_id,$nickname,$sex,$birthday,$horoscope,$allow_notice);

        if ($result) {
        	$callback['status']='ok';
        	echo json_encode($callback);
        	return ;
        }
        else
        {
        	$callback['status']='fail';
        	echo json_encode($callback);
        	return ;
        }

        
    }
    
    /**
     * 设置新密码
     */
    public function update_password()
    {
    	$json=file_get_contents("php://input");
		if(is_null(json_decode($json)))
			{
				$callback=array(
	        			'code' => '1300',
	        			'message' => 'json data invalid'
	        		);

	        	echo(json_encode($callback));
	        	return;
			}

		$de_json = (array)json_decode($json,TRUE);




	 	if (!array_key_exists('phone', $de_json) || !array_key_exists('new_password', $de_json) ||  !array_key_exists('new_password2', $de_json) ||  !array_key_exists('code', $de_json)) 
	        {
	        	$callback=array(
		        			'code' => '1400',
		        			'message' => 'invalid params'
		        		);

	        	echo(json_encode($callback));
	        	return;
	        }

        $phone = $de_json['phone'];
        $code=$de_json['code'];
        $new_password = $de_json['new_password'];
        $new_password2 = $de_json['new_password2'];

        if (!isset($_SESSION['code']) or !isset($_SESSION['phone'])) 
		{
			$callback['status']='fail';
			$callback['response']=array(
					'code' => '1500',
					'message' => 'code is out of date'
				);
			
			echo(json_encode($callback));
			return;
		}
		if ($phone != $_SESSION['phone']) {
			$callback['status']='fail';
			$callback['response']=array(
					'code' => '1500',
					'message' => 'phone error'
				);
		echo(json_encode($callback));
		return;
		}
		if ($code != $_SESSION['code']) {
			$callback['status']='fail';
			$callback['response']=array(
					'code' => '1500',
					'message' => 'code error'
				);
			echo(json_encode($callback));
			return;
		}

         if ($new_password !== $new_password2) {
         		$callback['status']='fail';
         		$callback['response']=array(
         				'code' => '1500',
         				'message' => 'two password are not same'
         			);
         }

        $this->User_model->update_password($phone,$new_password);
        $callback['status'] = 'ok';
        echo json_encode($callback);
        
    }

    public function search_user()
    {
    	$json=file_get_contents("php://input");
		if(is_null(json_decode($json)))
			{
				$callback=array(
	        			'code' => '1300',
	        			'message' => 'json data invalid'
	        		);

	        	echo(json_encode($callback));
	        	return;
			}

		$de_json = (array)json_decode($json,TRUE);
    if (!array_key_exists('operator_id', $de_json) || !array_key_exists('nickname', $de_json)) 
	        {
	        	$callback=array(
		        			'code' => '1400',
		        			'message' => 'invalid params'
		        		);

	        	echo(json_encode($callback));
	        	return;
	        }

	    $operator_id=$de_json['operator_id'];	
	    $nickname=$de_json['nickname'];
        $result = $this->User_model->search_user($operator_id,$nickname);
        if (count($result)>0) 
        {
        	$callback=array(
        		'status' => 'ok',
        		'response' =>$result
        		);
        	echo json_encode($callback);
        	return;
        }
        
		$callback=array(
        		'status' => 'fail'
        		);
        	echo json_encode($callback);
        	return;
       
    }




}
