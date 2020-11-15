<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_record extends CI_Model {

	public function getData()
	{
		$this->db->select('*');
		$this->db->from('record_tap');
		$this->db->join('device', 'device.idx = record_tap.id_device', 'left');
		$this->db->join('users', 'users.idx = record_tap.id_user', 'left');
		$this->db->order_by('tap_time', 'DESC');
		return $query = $this->db->get()->result();
	}

}

/* End of file M_record.php */
/* Location: ./application/models/M_record.php */