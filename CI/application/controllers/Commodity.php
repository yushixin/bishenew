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
class Commodity extends CI_Controller {
	public function showOneCommodity(){
		$commodityid=$this->input->post("commodityid");
		$this->load->model('Commodity_model');
		$result=$this->Commodity_model->show_OneCommodity($commodityid);
		echo json_encode($result);
	}
	public function insertShoppingCart(){
		$commodityid=$this->input->post("commodityid");
		$buynumber=$this->input->post("buynumber");
		$nowUserid=$this->input->post("nowUserid");
		$this->load->model('Commodity_model');
		$result=$this->Commodity_model->insert_ShoppingCart($commodityid,$buynumber,$nowUserid);
		echo json_encode($result);
	}	
}
