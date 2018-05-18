<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commodity_model extends CI_Model {
	public function show_OneCommodity($commodityid){
		$sql = "SELECT * FROM commodity where commodity_id = $commodityid";
		$query=$this->db->query($sql);
		return $query->row();
	}
	public function insert_ShoppingCart($commodityid,$buynumber,$nowUserid,$commodityname,$price){
		$arr = array(
			'sc_id'    =>  null,
			'sc_commodityid'  =>  $commodityid,
			'sc_number'   =>  $buynumber,
			'sc_uid'   =>  $nowUserid,
			'sc_commodityname'   =>  $commodityname,
			'sc_price'   =>  $price,

		);
		$sql = $this->db->insert_string('ShoppingCart', $arr);
		$query=$this->db->query($sql);
		return $query;
	}
	public function Shopping_Cart($nowUserid){
		$sql = "SELECT * FROM ShoppingCart where sc_uid = $nowUserid";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function shoppdingcart_Delete($aimid){
		$sql = "DELETE FROM ShoppingCart where sc_id = ?";
		$query = $this->db->query($sql,array($aimid));
		return $query;
	}
	public function selecthaveornot($commodityid,$nowUserid){
		$sql = "SELECT * FROM ShoppingCart where sc_commodityid = $commodityid and sc_uid = $nowUserid";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function updataShoppingCart($commodityid,$buynumber){
		$sql2 = "UPDATE ShoppingCart SET sc_number = sc_number + $buynumber where sc_commodityid = $commodityid";
		$query2 = $this->db->query($sql2);
		return $query2;
	}
	public function submit_order($orderuid,$ordersubmitter,$list,$nowtime,$t){
		$arr = array(
			'order_id'				=>  null,
			'order_num'				=>  $t,
			'order_flag'			=>  0,
			'order_submitter'		=>  $ordersubmitter,
			'order_time'			=>  $nowtime,
			'order_uid'				=>  $orderuid,
			'order_commoditylist'	=>  $list
		);
		$sql = $this->db->insert_string('order', $arr);
		$query=$this->db->query($sql);
		return $query;
	}
	public function submitorderOKdelete($deleteid){
		$sql = "DELETE FROM ShoppingCart where sc_id in ?";
		$query = $this->db->query($sql,array($deleteid));
		return $query;
	}

}