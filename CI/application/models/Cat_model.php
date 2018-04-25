<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cat_model extends CI_Model {
    public function insert_pet_inf($catName,$varieties,$uid,$catAge){//发表文章
      	$arr = array(  
                    'cat_id' =>  null,
					'cat_name' =>  $catName,
					'cat_varieties' =>  $varieties,
                    'cat_master' =>  $uid,
                    'cat_age' => $catAge
                                                    );
	  	$sql = $this->db->insert_string('cat', $arr);
	  	$query=$this->db->query($sql);
	 	return $query->num_row();
    }
    public function cat_delete($catid){
        $sql = "delete from cat where cat_id = ?";
        $query = $this->db->query($sql, array($catid));
        return $query;
    }

    
}