<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model {
    public function send_out($articletitle,$articletext,$uid,$nowtime){//发表文章
      	$arr = array(  
                    'a_id'      =>  null,
					'a_title'   =>  $articletitle,
					'a_article' =>  $articletext,
                    'u_id'      =>  $uid,
                    'a_time'    =>  $nowtime
                                                    );
	  	$sql = $this->db->insert_string('article', $arr);
	  	$query=$this->db->query($sql);
	 	 return $query->num_row();
    }
    public function show_container(){
    	$sql = "SELECT * FROM article";
		$query=$this->db->query($sql);
		return $query->result();

    }
    public function show_ArticleDetails($aid){
    	$arr = array(
            'a_id'  => $aid
    	);
      	$query = $this->db->get_where('article', $arr);
      	return $query->row();
    }

    
}