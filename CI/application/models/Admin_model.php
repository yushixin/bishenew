<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function admin_login($adminname,$adminpaw){
		$sql = "SELECT * FROM goduser WHERE godu_name = ? and godu_paw =?";
		$query = $this->db->query($sql,array($adminname,$adminpaw));
		return $query->row();
	}
	public function show_AllArticleData(){
		$sql = "SELECT * FROM article";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function show_AllUserData(){
		$sql = "SELECT * FROM user";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function show_AllCommodity(){
		$sql = "SELECT * FROM commodity";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function show_quehuo(){
		$sql = "SELECT * FROM commodity where commodity_stock = 0";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function delete_user($deleteid){
		$sql = "DELETE FROM user where u_id in ?";
		$query = $this->db->query($sql,array($deleteid));
		return $query;
	}
    
	public function delete_Article($deleteid){
		$sql = "DELETE FROM article where a_id in ?";
		$query = $this->db->query($sql,array($deleteid));
		return $query;
	}
	public function delete_Commodity($commodityid){
		$sql = "DELETE FROM commodity where commodity_id = ?";
		$query = $this->db->query($sql,array($commodityid));
		return $query;
	}
    
    public function updata_Recommend($updataid){
    	$sql1 = "UPDATE article SET a_articlepush = 1 where a_articlepush = 0";
		$query1 = $this->db->query($sql1);
		$sql2 = "UPDATE article SET a_articlepush = 0 where a_id in ?";
		$query2 = $this->db->query($sql2,array($updataid));
		return $query2;
	}
	public function insert_Commodity($ccname,$ccnum,$ccprice,$cccategory,$stock){
				$arr = array(
					'commodity_id'    =>  null,
					'commodity_name'  =>  $ccname,
					'commodity_num'   =>  $ccnum,
					'commodity_price'   =>  $ccprice,
					'commodity_category'   =>  $cccategory,
					'commodity_stock'   =>  $stock,
				);
				$sql = $this->db->insert_string('commodity', $arr);
				$query=$this->db->query($sql);
				return $query;
	}

}