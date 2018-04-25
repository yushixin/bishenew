<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('prc');
header('Access-Control-Allow-Origin:null'); 
// header('Access-Control-Allow-Origin:*'); 
header('Access-Control-Allow-Origin:http://localhost:8080'); 
header('Access-Control-Allow-Methods:OPTIONS, GET, POST'); // 允许option，get，post请求
header("Access-Control-Allow-Headers:x-requested-with,content-type"); // 允许x-requested-with请求头
header('Access-Control-Max-Age:86400'); // 允许访问的有效期
header('Access-Control-Allow-Credentials:true');
// header('Content-Type:text/plain');
// session_start(); 
class Upload extends CI_Controller {
	public function uploadFile(){
		 
$multi_info=$_FILES;  //接收$_FILES的全部上传信息
 // var_dump($multi_info["image"]["name"]);
 $style = $_POST['style'];
 var_dump($style);
die();  
 
foreach($multi_info["image"]["name"] as $name=>$index){      //foreach 遍历$multi_info 
 	// var_dump( $name);
 	// $filename = "uploads/".substr($_FILES["image"]["name"][$name], strrpos($_FILES["image"]["name"][$name],'.'));
 	$filename = "uploads/".$_FILES["image"]["name"][$name];
	 $response = array();
	 if(move_uploaded_file($_FILES['image']['tmp_name'][$name], $filename)){
 		  $response['isSuccess'] = true; 
		  $response['photo'] = $filename;
}
echo json_encode($response);
		 // $filename1 = "uploads/".time().substr($_FILES["1"]["name"], strrpos($_FILES["1"]["name"],'.'));
		 // $filename2 = "uploads/".time().substr($_FILES["2"]["name"], strrpos($_FILES["2"]["name"],'.'));
		
		 // echo $filename1.$filename2;
		 // if(move_uploaded_file($_FILES['pic1']['tmp_name'], $filename)){
		  // $response['isSuccess'] = true; 
		  // $response['photo'] = $filename; 
		 // }else{
		 	 // $response['isSuccess'] = false; 
		 // } 
		 // echo json_encode($response);

}
}
	
}
