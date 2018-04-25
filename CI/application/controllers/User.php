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
class User extends CI_Controller {
	public function loginSuc()
		{
			echo hash("sha256",'edison'."111");
		}
	public function reg(){
		$username=$this->input->get("username");
        $password=$this->input->get("password");
		$this->load->model('User_model');
		$result=$this->User_model->select_user($username);
		// echo $result;
		$flag1 = 7777;
		if($result == 1){
			echo $flag1;
		}else if($result == 0){
			$result=$this->User_model->add_user($username,$password);
			$flag2 = 1;
			if($result == true){
				echo $flag2;
			}
		}

		// $result=$this->User_model->add_user($username,$password);
		// $flag = 1;
		// if($result == true){
		// 	echo $flag;
		// }
	}
	public function usernameTesting(){
		$username=$this->input->get("username");
		$this->load->model('User_model');
		$result=$this->User_model->username_Testing($username);
		echo $result;
	}
	public function loginTest(){
		$username=$this->input->get("username");
        $password=$this->input->get("password");

		$this->load->model('User_model');
		$result=$this->User_model->login_test($username,$password);
		// var_dump($result);
        echo json_encode($result);
	}

	public function showUsername(){
        $uid=$this->input->get("uid");
		$this->load->model('User_model');
		$result=$this->User_model->show_username($uid);
        echo json_encode($result);
	}

	public function showInformation(){
        $uid=$this->input->get("uid");
		$this->load->model('User_model');
		$result=$this->User_model->show_information($uid);
        echo json_encode($result);
	}
	public function changeInformation(){
		header('Access-Control-Allow-Origin:*');//允许所有来源访问
        header('Access-Control-Allow-Method:POST,GET');//允许访问的方式
        $uid=$this->input->post("uid");
        $ugender=$this->input->post("ugender");
        $uage=$this->input->post("uage");
        $ucatname=$this->input->post("ucatname");
		$this->load->model('User_model');
		$result=$this->User_model->change_information($uid,$ugender,$uage,$ucatname);
		echo $result;
	}
	public function test(){
		echo "这是user里的test";
	}
	public function haveCatORnot(){
        $catmaster=$this->input->get("catmaster");
		$this->load->model('User_model');
		$result=$this->User_model->have_Cat_OR_not($catmaster);
        echo json_encode($result);
        // echo $result;

	}
	public function changeHeadimg(){
		$uid = isset($_POST['uid'])? $_POST['uid'] : '';
		$localurl = '../../img/TX/';
		$filename = time().substr($_FILES['photo']['name'], strrpos($_FILES['photo']['name'],'.'));
		$imgurl = $localurl.$filename;
		$this->load->model('User_model');
		$result=$this->User_model->update_headimg($uid,$filename);

		$response = array();
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $imgurl)){
			$response['isSuccess'] = true;
			$response['photo'] = $filename;
		}else{  
			$response['isSuccess'] = false;  
		}  
		echo json_encode($response);
	}
}
