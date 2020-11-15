<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlDevice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_device');
		if($this->session->userdata('status') != "login"){
		redirect(base_url("CtrlLogin"));
		}
	}

	public function index()
	{
		$tmp['tittle'] = 'Data Device';
		$tmp['content'] = 'Admin/dataDevice';
		$this->load->view('Admin/index.php', $tmp);
	}

	public function getData()
	{
		$data = $this->M_device->getData();
		echo json_encode($data);
	}


	public function tambahData()
	{
		$nameDivace = $this->input->post('nameDivace');
		$device_key = $this->input->post('device_key');
		$status_door = $this->input->post('status_door');
		$device_status = $this->input->post('device_status');
	
		$dataUser = array(
			'name_device' => $nameDivace,
			'device_key' => $device_key,
			'status_door' => $status_door,
			'device_status' => $device_status,
			'created_at' => date('Y-m-d H:i:s')
		);

		$data = $this->M_device->tambahData($dataUser);
		echo json_encode($data);

	}


	public function getID()
	{
		$idx = $this->input->post('id');

		$dataid = array('idx' => $idx);
		
		$data = $this->M_device->getID($dataid);
		echo json_encode($data);
	}

	public function prosesEdite($idx)
	{
		
		$name_device = $this->input->post('nameDivace');
		$device_key = $this->input->post('device_key');
		$status_door = $this->input->post('status_door');
		$device_status = $this->input->post('device_status');
	

		$dataUser = array(
			'name_device' => $name_device,
			'device_key' => $device_key,
			'device_status' => $device_status,
			'status_door' => $status_door
		);

		
		$data = $this->M_device->editData($idx, $dataUser);
		echo json_encode($data);
	}


	public function deletDevice($idx)
	{
		$data = $this->M_device->deletUser($idx);
		echo json_encode($data);
	}

}

/* End of file CtrlDevice.php */
/* Location: ./application/controllers/CtrlDevice.php */