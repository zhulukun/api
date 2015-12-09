<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

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
	 */
	function __construct()
    {

        parent::__construct();

        $this->load->helper('url');
		$this->load->model('Comment_model');
        $this->load->library('session');
               

    }
	public function index()
	{
		$this->load->view('welcome_message');
	}
	/**
	 * user commit
	 */
	
	public function add_comment()
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

        if (!array_key_exists('token', $de_json)) 
        {
            $callback=array(
                        'code' => '1100',
                        'msg' => 'token do not exist'
                    );

            echo(json_encode($callback));
            return;
        }

       
        $token=$de_json['token'];

        if (isset($_SESSION['token'])) 
        {
            if ($token !== $_SESSION['token']) 
            {
                $callback=array(
                            'code' => '1000',
                            'msg' => ' Authentication error'
                        );

                echo(json_encode($callback));
                return;
            }
        }
        else
        {
            $callback=array(
                            'code' => '1200',
                            'msg' => 'token is out of date'
                        );

                echo(json_encode($callback));
                return;
        }


        if (!array_key_exists('target_id', $de_json) || !array_key_exists('operator_id', $de_json) || !array_key_exists('content', $de_json)) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }   
		
		$target_id=$de_json['target_id'];
		$operator_id=$de_json['operator_id'];
		$content=$de_json['content'];

		$id=md5(uniqid(md5(microtime(true)),true));

		if ($this->Comment_model->add_comment($id,$operator_id,$target_id,$content)) 
		{

			$callback['status']='ok'; 
			

			echo json_encode($callback);
			return ;
		}
		else
		{
			$callback['status']='fail'; 
			$array['response']=array(
				'code' => '1500',
				'message' => 'add comment fail'
				);
			$callback=array_merge($callback,$array);

			echo json_encode($callback);
			return ;
		}
	}

    public function get_comment()
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

        if (!array_key_exists('token', $de_json)) 
        {
            $callback=array(
                        'code' => '1100',
                        'msg' => 'token do not exist'
                    );

            echo(json_encode($callback));
            return;
        }

       
        $token=$de_json['token'];

        if (isset($_SESSION['token'])) 
        {
            if ($token !== $_SESSION['token']) 
            {
                $callback=array(
                            'code' => '1000',
                            'msg' => ' Authentication error'
                        );

                echo(json_encode($callback));
                return;
            }
        }
        else
        {
            $callback=array(
                            'code' => '1200',
                            'msg' => 'token is out of date'
                        );

                echo(json_encode($callback));
                return;
        }


        if (!array_key_exists('target_id', $de_json) || !array_key_exists('page', $de_json)|| !array_key_exists('page_size', $de_json)) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }   
		
		$target_id=$de_json['target_id'];
		$page=$de_json['page'];
		$page_size=$de_json['page_size'];

		$comment_num=$this->Comment_model->get_comment_num($target_id);
		if (count($comment_num)>0) {
			$num=$comment_num[0]['total_num'];
		}

		$total_page=ceil($num/$page_size);

		$comments=$this->Comment_model->get_comment($target_id,$page,$page_size);

		if (count($comments)>0) {
			$callback['status']='ok';
			$response=array(
				'page' => $page,
				'page_size' => $page_size,
				'total_page' => $total_page,
				'comments' =>$comments
			 );
			$callback=array_merge($callback, $response);
			echo json_encode($callback);
			return;
		}
		else
		{
			$callback['status']='fail';
			$response=array(
				'code' => '1500',
				'message' =>'return data fail',
			 );
			$callback=array_merge($callback, $response);
			echo json_encode($callback);
			return;
		}
		
    }


}
