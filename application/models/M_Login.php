<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {

function login($username,$password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query =  $this->db->get('admin');
        return $query->num_rows();
    }
//    untuk mengambil data hasil login
    function data_login($username,$password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('admin')->row();
    }	

}

/* End of file M_Login.php */
/* Location: ./application/models/M_Login.php */