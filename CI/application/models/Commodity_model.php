<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commodity_model extends CI_Model {
	public function show_OneCommodity($commodityid){
		$sql = "SELECT * FROM commodity where commodity_id = $commodityid";
		$query=$this->db->query($sql);
		return $query->row();
	}
	public function insert_ShoppingCart($commodityid,$buynumber,$nowUserid){
		$arr = array(
			'sc_id'    =>  null,
			'sc_commodityid'  =>  $commodityid,
			'sc_number'   =>  $buynumber,
			'sc_uid'   =>  $nowUserid
		);
		$sql = $this->db->insert_string('ShoppingCart', $arr);
		$query=$this->db->query($sql);
		return $query;
	}

}