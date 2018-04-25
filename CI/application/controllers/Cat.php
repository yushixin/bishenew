<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('prc');
header('Access-Control-Allow-Origin:null'); 
header('Access-Control-Allow-Origin:*'); 
header('Access-Control-Allow-Origin:http://localhost:8080'); 
header('Access-Control-Allow-Methods:OPTIONS, GET, POST'); // 允许option，get，post请求
header("Access-Control-Allow-Headers:x-requested-with,content-type");
header('Access-Control-Allow-Credentials:true');
class Cat extends CI_Controller {

	public function CreatePetInf(){
                $catName=$this->input->post("catName");
                $varieties=$this->input->post("varieties");
                $uid=$this->input->post("uid");
                $catAge=$this->input->post("catAge");
		$this->load->model('Cat_model');
		$result=$this->Cat_model->insert_pet_inf($catName,$varieties,$uid,$catAge);//参数顺序会影响结果
		echo $result;
	}
	public function catDelete(){
                $catid=$this->input->post("catid");
                $this->load->model('Cat_model');
                $result=$this->Cat_model->cat_delete($catid);
                if ($result == true) {
                        $jb = 250;
                        echo json_encode($jb);
                }
	}
}
