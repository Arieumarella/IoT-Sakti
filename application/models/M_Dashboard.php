<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

public function getDevice()
{
	return $this->db->get('device')->num_rows();
}

public function getRicord()
{
	return $this->db->get('record_tap')->num_rows();
}

public function getUser()
{
	return $this->db->get('users')->num_rows();
}

public function getAdmin()
{
	return $this->db->get('admin')->num_rows();
}	

}

/* End of file M_Dashboard.php */
/* Location: ./application/models/M_Dashboard.php */