<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Invite extends CI_Controller
{

    /**
     *  方案收藏
     */
    function __construct()
    {

        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Invite_model');
        $this->load->library('session');
               
    }

    //每次邀请一人
    public function invite_single()
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

        if (!array_key_exists('account_id', $de_json) || !array_key_exists('target_id', $de_json)) 
            {
                $callback=array(
                            'code' => '1400',
                            'msg' => 'invalid params'
                        );

                echo(json_encode($callback));
                return;
            }   
        
        $account_id = $de_json['account_id'];
        $target_id = $de_json['target_id'];

        $inviter_name=$this->Invite_model->get_name($account_id);
        $invitee_phone=$this->Invite_model->get_phone($target_id);

        $username='youli';
        $password='youli123';
        $apikey='2fd8eb942e6a99f4715986605f7895f7';
        $mobile=$invitee_phone;

        $content='尊敬的用户:您的好友'.$inviter_name.'邀请您加入晓礼,欢迎下载晓礼app.';

        $url='http://m.5c.com.cn/api/send/index.php?username='.$username.'&password='.$password.'&apikey='.$apikey.'&mobile='.$mobile.'&content='.$content.'';  

        $html = file_get_contents($url);  

        $status=explode(":",$html);

        if ($status[0] == 'success') {
            $callback['status']='ok';
            echo json_encode($callback);
           return;
        }

        $callback['status']='fail';
        $callback['response']=array(
                    'code' => '1500',
                    'message' => 'send message fail'
                );
        echo(json_encode($callback));
        return;

    }
    
    
}
