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
class Admin extends CI_Controller {
	
	public function adminlogin(){
        $adminname=$this->input->post("adminname");
        $adminpaw=$this->input->post("adminpaw");
		$this->load->model('Admin_model');
		$result=$this->Admin_model->admin_login($adminname,$adminpaw);
		echo json_encode($result);
	}

}
