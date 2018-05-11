<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model {
    public function send_out($articletitle,$articletext,$uname,$uid,$nowtime){//发表文章
      	$arr = array(  
                    'a_id'      =>  null,
					'a_title'   =>  $articletitle,
					'a_article' =>  $articletext,
                    'u_name' =>  $uname,
                    'u_id'      =>  $uid,
                    'a_time'    =>  $nowtime
                                                    );
	  	$sql = $this->db->insert_string('article', $arr);
	  	$query=$this->db->query($sql);
	 	 return $query->num_row();
    }
    public function show_container(){
        $sql = "SELECT * FROM article order by a_id desc";
    	// $sql = "SELECT * FROM article";
		$query=$this->db->query($sql);
		return $query->result();
    }
    public function show_containertop(){
        $sql = "SELECT * FROM article order by a_hot desc";
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
    
    public function comment_send($comment,$nowuserid,$articleid,$nowtime,$sendername){
        $arr = array(  
                    'c_id'          =>  null,
                    'c_sender'      =>  $nowuserid,
                    'c_articleid'   =>  $articleid,
                    'c_time'        =>  $nowtime,
                    'c_comment'     =>  $comment,
                    'c_sendername'  =>  $sendername

                                                    );
        $sql = $this->db->insert_string('comment', $arr);
        $query=$this->db->query($sql);
        return $query;
    }
    public function showCommentdata($aid){

        $sql = "SELECT * FROM comment where c_articleid = ?";
        $query = $this->db->query($sql,array($aid));
        return $query->result();
    }
    public function hot_add1($aid){

        $sql = "UPDATE article SET a_hot = a_hot + 1 WHERE a_id = ?";
        $query = $this->db->query($sql,array($aid));
        return $query->num_row();
    }
}