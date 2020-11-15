<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlAdministrator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_administraor');
		if($this->session->userdata('status') != "login"){
		redirect(base_url("CtrlLogin"));
		}
	}

	public function index()
	{
		$tmp['tittle'] = 'Data Admin';
		$tmp['content'] = 'Admin/dataAdmin';
		$this->load->view('Admin/index.php', $tmp);
	}

	public function getData()
	{
		$data = $this->M_administraor->getData();
		echo json_encode($data);
	}


	public function tambahData()
	{
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
	
		$dataUser = array(
			'name' => $name,
			'username' => $username,
			'password' => md5($password),
			'created_at' => date('Y-m-d H:i:s')
		);

		$data = $this->M_administraor->tambahData($dataUser);
		echo json_encode($data);

	}


	public function getID()
	{
		$idx = $this->input->post('id');

		$dataid = array('idx' => $idx);
		
		$data = $this->M_administraor->getID($dataid);
		echo json_encode($data);
	}

	public function prosesEdite($idx)
	{
		
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
	
		if ($password != null) {
		
		$dataUser = array(
			'name' => $name,
			'username' => $username,
			'password' => md5($password)
		);

		}else{

		$dataUser = array(
			'name' => $name,
			'username' => $username

		);

		}

		
		$data = $this->M_administraor->editData($idx, $dataUser);
		echo json_encode($data);
	}


	public function deletDevice($idx)
	{
		$data = $this->M_administraor->deletUser($idx);
		echo json_encode($data);
	}

}

/* End of file CtrlAdministrator.php */
/* Location: ./application/controllers/CtrlAdministrator.php */