<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function admin_login($adminname,$adminpaw){

        $sql = "SELECT * FROM goduser WHERE godu_name = ? and godu_paw =?";
        $query = $this->db->query($sql,array($adminname,$adminpaw));
        return $query->row();
    }
}