<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('prc');
header('Access-Control-Allow-Origin:null'); 
header('Access-Control-Allow-Origin:*'); 
header('Access-Control-Allow-Origin:http://localhost:8080'); 
header('Access-Control-Allow-Methods:OPTIONS, GET, POST'); // 允许option，get，post请求
header("Access-Control-Allow-Headers:x-requested-with,content-type");
// 允许x-requested-with请求头
// header('Access-Control-Max-Age:86400'); // 允许访问的有效期
header('Access-Control-Allow-Credentials:true');
// session_start(); 
class Article extends CI_Controller {

	public function sendOut(){
        $articletitle=$this->input->post("articletitle");
        $articletext=$this->input->post("articletext");
        $uid=$this->input->post("uid");
        $t=time();
		$nowtime = date("Y-m-d h:i:sa",$t);
		$this->load->model('Article_model');
		$result=$this->Article_model->send_out($articletitle,$articletext,$uid,$nowtime);// 参数顺序会影响结果
		echo $result;
	}
	public function showcontainer(){
		$this->load->model('Article_model');
		$result = $this->Article_model->show_container();
		echo json_encode($result);
	}
	public function showArticleData(){
		$aid = $this->input->get("aid");
		$this->load->model('Article_model');
		$result = $this->Article_model->show_ArticleDetails($aid);
		echo json_encode($result);
	}
	public function commentsend(){
        $comment=$this->input->post("value");
        $nowuserid=$this->input->post("nowuserid");
        $articleid=$this->input->post("articleid");
        $sendername=$this->input->post("sendername");
        $t=time();
		$nowtime = date("Y-m-d h:i:sa",$t);
		$this->load->model('Article_model');
		$result=$this->Article_model->comment_send($comment,$nowuserid,$articleid,$nowtime,$sendername);// 参数顺序会影响结果
		echo json_encode($result);
	}
	public function showCommentdata(){
		$aid = $this->input->post("aid");
		$this->load->model('Article_model');
		$result=$this->Article_model->showCommentdata($aid);// 参数顺序会影响结果
		echo json_encode($result);
	}
}
