<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Avatar_model');

        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('upload_form', array('error' => ' ' ));
    }

    public function avatar()
    {
        if (!isset($_SESSION['account_id'])) {
            $callback['status']='fail';
            $callback['response']=array(

                        'code' => '1500',
                        'message' => '登录信息过期，请重新登录'

                );   
            echo(json_encode($callback));
            return;
        }
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'gif|jpeg|png|jpg';
        $config['max_size']     = 1024;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;
        $config['file_name'] =time().'_'.rand(0,1000);
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('avatar'))
        {
            $error = array('error' => $this->upload->display_errors());
           // print_r($error);
            //$this->load->view('upload_form', $error);

            $callback['status']='fail';
            $callback['response']=array(
                    'code' => '1500',
                    'message' => $error                
                    );
            echo(json_encode($callback));
            return;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $arr=explode('/', $_FILES['avatar']['type']);
            $id=md5(uniqid(md5(microtime(true)),true));

            if (isset($_SESSION['account_id'])) {
                $account_id=$_SESSION['account_id'];
            }

            $avatar_url= base_url().'uploads'.'/'.$config['file_name'].'.'.$arr[1];

            $format=$arr[1];
            $avatar_arr=array(
                    'id' => $id,
                    'account_id' => $account_id,
                    'avatar_url' => $avatar_url,
                    'format' => $format
                );
            if(!$this->Avatar_model->is_exist_avatar($account_id))
            {
                if($this->Avatar_model->insert_user_avatar($avatar_arr))
                {
                    //echo($path);
                     $callback['status']='ok';
                     echo(json_encode($callback));
                     return;
                }
            }
            else
            {
                if($this->Avatar_model->update_user_avatar($account_id,$avatar_url,$format))
                {
                    //echo($path);
                     $callback['status']='ok';
                     echo(json_encode($callback));
                     return;
                }

                $callback['status']='fail';
                $callback['response']=array(
                        'code' => '1500',
                        'message' => "update avatar error"
                    );
                echo(json_encode($callback));
                return;
            }
            
            $callback['status']='fail';
            $callback['response']=array(
                    'code' => '1500',
                    'message' => "upload avatar error"
                );
            echo(json_encode($callback));
            return;
            
        }
    }
}
?>