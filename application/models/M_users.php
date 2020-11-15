<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

public function getData()
	{

		$this->db->select('users.*, device.name_device, device.device_status, device.id_sidikJari, device.status_door');
		$this->db->from('users');
		$this->db->join('device', 'device.idx = users.id_device', 'left');
		return $query = $this->db->get()->result();
		
	}

public function tambahData($data)
	{
		return $this->db->insert('users', $data);
	}	


public function cekFinger($idFinger)
{
	return $this->db->get_where('users', array('data_sidik_jari' => $idFinger))->row();
}


public function getID($data)
{
	return $query = $this->db->get_where('users', $data)->result();
	
}

public function getById($data)
{
		$this->db->select('users.*, device.name_device, device.device_status, device.id_sidikJari,device.status_door, device.device_key');
		$this->db->from('users');
		$this->db->join('device', 'device.idx = users.id_device', 'left');
		$this->db->where('users.idx', $data);
		return $query = $this->db->get()->result();
}

public function editData($idx, $data)
{
	$this->db->where('idx', $idx);
   return $this->db->update('users', $data);
}

public function UpdateSidikjari($device_key, $data, $idx, $data2)
{

	$this->db->where('idx', $idx);
    $this->db->update('users', $data2);

	$this->db->where('device_key', $device_key);
   return $this->db->update('device', $data);
}

public function getDevice($data)
{
	return $query = $this->db->get_where('device', array('device_key' => $data))->result();;
}

public function deletUser($idx)
{
	$this->db->where('idx', $idx);
	return $this->db->delete('users');
}

}

/* End of file M_users.php */
/* Location: ./application/models/M_users.php */