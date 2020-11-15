<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_device extends CI_Model {

public function getData()
	{
		return $this->db->get('device')->result();
	}

public function tambahData($data)
	{
		return $this->db->insert('device', $data);
	}	


public function getID($data)
{
	return $query = $this->db->get_where('device', $data)->result();
}

public function editData($idx, $data)
{
	$this->db->where('idx', $idx);
   return $this->db->update('device', $data);
}

public function deletUser($idx)
{
	$this->db->where('idx', $idx);
	return $this->db->delete('device');
}

}

/* End of file M_device.php */
/* Location: ./application/models/M_device.php */