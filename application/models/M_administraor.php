<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_administraor extends CI_Model {

	public function getData()
	{
		return $this->db->get('admin')->result();
	}

public function tambahData($data)
	{
		return $this->db->insert('admin', $data);
	}	


public function getID($data)
{
	return $query = $this->db->get_where('admin', $data)->result();
}

public function editData($idx, $data)
{
	$this->db->where('idx', $idx);
   return $this->db->update('admin', $data);
}

public function deletUser($idx)
{
	$this->db->where('idx', $idx);
	return $this->db->delete('admin');
}

}

/* End of file M_administraor.php */
/* Location: ./application/models/M_administraor.php */