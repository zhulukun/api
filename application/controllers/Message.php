<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	function __construct()
    {

        parent::__construct();

        $this->load->helper('url');
		$this->load->model('User_model');
		$this->load->library('session');
		       

    }

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('welcome_message');
	}

	public function send_message()
	{
		$json=file_get_contents("php://input");
		if(is_null(json_decode($json)))
			{
				$callback=array(
	        			'code' => '1300',
	        			'msg' => 'json data invalid'
	        		);

	        	echo(json_encode($callback));
	        	return;
			}

		$de_json = (array)json_decode($json,TRUE);

	 	if (!array_key_exists('phone', $de_json)) 
	        {
	        	$callback=array(
		        			'code' => '1400',
		        			'msg' => 'invalid params'
		        		);

	        	echo(json_encode($callback));
	        	return;
	        }

		$cellphone=$de_json['phone'];

		#judge the cellphone exists or not
		if ($this->User_model->isPhoneExists($cellphone)) {
			# code...

			$callback['status']='fail';
			$array['response']=array(
					'code' => '1500',
					'message' => 'cellphone has been used'
				);
			$callback=array_merge($callback,$array);
			echo json_encode($callback);

			return;
		}

		$username='youli';
      	$password='youli123';
      	$apikey='2fd8eb942e6a99f4715986605f7895f7';
      	$mobile=$cellphone;

      	$random=rand(100000,999999);
      	$this->session->set_tempdata('code',$random, 120);

      	$content='您的有礼验证码:'.$random.',如果不是本人操作,请忽略.';

      	$url='http://m.5c.com.cn/api/send/index.php?username='.$username.'&password='.$password.'&apikey='.$apikey.'&mobile='.$mobile.'&content='.$content.'';  

      	$html = file_get_contents($url);  

	    $status=explode(":",$html);

	    $callback['status']='ok';

	    echo json_encode($callback);

	    return;

	}

	public function code_check()
	{
		$this->load->helper('url');
		$this->load->library('session');
		$de_json = (array)json_decode(file_get_contents("php://input"),TRUE);

		$code=$de_json['code'];

		if ($code === $_SESSION['code']) {
			# code...
			$callback['status']='ok';
			echo(json_encode($callback));
			return;
		}
		$callback['status']='fail';
		echo(json_encode($callback));
		return;

	}



}
