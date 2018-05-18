<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
    public function select_user($username){//检验用户是否存在
      $arr = array(
            'u_name'  => $username
            );
      $query = $this->db->get_where('user', $arr);
      return $query->num_rows();
    }
    public function add_user($username,$password){//add_user向数据库插入新用户
      $arr = array(  'u_id'    =>  null,
						          'u_name'  =>  $username,
						          'u_paw'   =>  $password   );
		  $sql = $this->db->insert_string('user', $arr);
		  $query=$this->db->query($sql);
		  return $query;
    }
    public function username_Testing($username){//用来测试用户名是否存在
      $arr = array(   'u_name' 	=> $username );
      $query = $this->db->get_where('user', $arr);
      return $query->num_rows();
    }

    public function login_test($username,$password){//检验用户账号密码

      $arr = array(
            'u_name'  => $username,
            'u_paw'   => $password
            );
      $query = $this->db->get_where('user', $arr);
      return $query->row();
    }
    
    public function show_information($uid){//在个人主页显示用户名
      $arr = array(
            'u_id'  => $uid
            );
      $query = $this->db->get_where('user', $arr);
      return $query->row();
    }
    public function change_information($uid,$ugender,$uage,$ucatname){
      $data = array('u_gender' => $ugender, 'u_age' => $uage);
      $where = "u_id = $uid";
      $query = $this->db->update('user', $data, $where);
      return $query;  

    }
    
    public function have_Cat_OR_not($catmaster){
      $sql = "select * from cat where cat_master = ?";
      $query = $this->db->query($sql, array($catmaster));
      return $query->result();

    }
    public function update_headimg($uid,$filename){
      $sql = "UPDATE user SET u_img = ? where u_id = ?";
      $this->db->query($sql, array($filename, $uid));
    }
	public function show_Message($nowuserid){
		$sql = "SELECT * FROM newmessage where message_aim = $nowuserid";
		$query=$this->db->query($sql);
		return $query->result();
	}
}
