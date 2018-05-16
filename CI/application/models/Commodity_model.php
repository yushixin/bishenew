<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commodity_model extends CI_Model {
	public function show_OneCommodity($commodityid){
		$sql = "SELECT * FROM commodity where commodity_id = $commodityid";
		$query=$this->db->query($sql);
		return $query->row();
	}

}