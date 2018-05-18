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
		$commodityname=$this->input->post("commodityname");
		$price=$this->input->post("price");
		$this->load->model('Commodity_model');
		$result=$this->Commodity_model->insert_ShoppingCart($commodityid,$buynumber,$nowUserid,$commodityname,$price);
		echo json_encode($result);
	}	
	public function  ShoppingCart(){
		$nowUserid=$this->input->post("nowUserid");
		$this->load->model('Commodity_model');
		$result=$this->Commodity_model->Shopping_Cart($nowUserid);
		echo json_encode($result);
	}
	public function  shoppdingcartDelete(){
		$aimid=$this->input->post("aimid");
		$this->load->model('Commodity_model');
		$result=$this->Commodity_model->shoppdingcart_Delete($aimid);
		echo json_encode($result);
	}
	public function  selecthaveornot(){
		$commodityid=$this->input->post("commodityid");
		$nowUserid=$this->input->post("nowUserid");

		$this->load->model('Commodity_model');
		$result=$this->Commodity_model->selecthaveornot($commodityid,$nowUserid);
		echo json_encode($result);
	}
	public function updataShoppingCart(){
		$commodityid=$this->input->post("commodityid");
		$buynumber=$this->input->post("buynumber");

		$this->load->model('Commodity_model');
		$result=$this->Commodity_model->updataShoppingCart($commodityid,$buynumber);
		echo json_encode($result);
	}
	public function submitorder(){
		$orderuid=$this->input->post("orderuid");
		$ordersubmitter=$this->input->post("ordersubmitter");
		$list=$this->input->post("list");
		$t=time();
		$nowtime = date("Y-m-d h:i:sa",$t);
		$this->load->model('Commodity_model');
		$result=$this->Commodity_model->submit_order($orderuid,$ordersubmitter,$list,$nowtime,$t);
		echo json_encode($result);
	}
	public function submitorderOKdelete(){
		$aimidarr=$this->input->get("aimidarr");
		$deleteid = explode(",", $aimidarr);
		$this->load->model('Commodity_model');
		$result = $this->Commodity_model->submitorderOKdelete($deleteid);
		echo json_encode($result);
	}
}
