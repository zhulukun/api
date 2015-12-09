<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Score extends CI_Controller
{
    /**
     *  打分
     */
    public function user_score()
    {
        $this->load->helper('url');
        $this->load->model('Score_model');

        $de_json = (array)json_decode(file_get_contents("php://input"),TRUE);
        $target_id = $de_json['target_id'];
        $operator_id = $de_json['operator_id'];
        //$operator_id = $_SESSION['account_id'];
        $score = $de_json['score'];

        $arr['id'] = md5(uniqid(md5(microtime(true)),true));

        $arr['target_id'] = $target_id;
        $arr['operator_id'] = $operator_id;
        $arr['score'] = $score;

        $result = $this->Score_model->user_score_target($arr);
        if($result)
        {
            $callback['status'] = 'ok';
            $callback['response'] = array('status'=>'ok');
            echo json_encode($callback);
        }
        else
        {
            $callback['status'] = 'fail';
            $callback['response'] = array('status'=>'fail','code'=>'2008','message'=>'score failed');
            echo json_encode($callback);
        }
    }
}
