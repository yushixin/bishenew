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
	public function showAllArticleData(){
		$this->load->model('Admin_model');
		$result = $this->Admin_model->show_AllArticleData();
		echo json_encode($result);
	}	
	public function showAllUserData(){
		$this->load->model('Admin_model');
		$result = $this->Admin_model->show_AllUserData();
		echo json_encode($result);
	}
	public function showAllCommodity(){
		$this->load->model('Admin_model');
		$result = $this->Admin_model->show_AllCommodity();
		echo json_encode($result);
	}
	public function showquehuo(){
		$this->load->model('Admin_model');
		$result = $this->Admin_model->show_quehuo();
		echo json_encode($result);
	}
	public function deleteuser(){
		$data=$this->input->get("deleteid");
		$deleteid = explode(",", $data);
		$this->load->model('Admin_model');
		$result = $this->Admin_model->delete_user($deleteid);
		echo json_encode($result);
	}
	public function deleteArticle(){
		$data=$this->input->get("deleteid");
		$deleteid = explode(",", $data);
		$this->load->model('Admin_model');
		$result = $this->Admin_model->delete_Article($deleteid);
		echo json_encode($result);
	}
	public function deleteCommodity(){
		$commodityid=$this->input->get("commodityid");
		$this->load->model('Admin_model');
		$result = $this->Admin_model->delete_Commodity($commodityid);
		echo json_encode($result);
	}
	public function updataRecommend(){
		$data = $this->input->get("updataid");
		$updataid = explode(",", $data);
		$this->load->model('Admin_model');
		$result = $this->Admin_model->updata_Recommend($updataid);
		echo json_encode($result);
	}
	public function insertCommodity(){
		$ccname = $this->input->post("ccname");
		$ccnum = $this->input->post("ccnum");
		$ccprice = $this->input->post("ccprice");
		$cccategory = $this->input->post("cccategory");
		$stock = $this->input->post("stock");

		$this->load->model('Admin_model');
		$result = $this->Admin_model->insert_Commodity($ccname,$ccnum,$ccprice,$cccategory,$stock);
		echo json_encode($result);
	}
}
