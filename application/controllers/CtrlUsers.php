<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlUsers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_users');
		if($this->session->userdata('status') != "login"){
		redirect(base_url("CtrlLogin"));
		}
	}

	public function index()
	{
		$tmp['tittle'] = 'Data Users';
		$tmp['content'] = 'Admin/dataUser';
		$this->load->view('Admin/index.php', $tmp);
	}

	public function getData()
	{
		$data = $this->M_users->getData();
		echo json_encode($data);
	}


	public function tambahData()
	{
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id_device = $this->input->post('id_device');
	
		$dataUser = array(
			'name' => $name,
			'username' => $username,
			'password' => md5($password),
			'id_device' => $id_device,
			'created_at' => date('Y-m-d H:i:s')
		);

		$data = $this->M_users->tambahData($dataUser);
		echo json_encode($data);

	}


	public function getID()
	{
		$idx = $this->input->post('id');

		$dataid = array('idx' => $idx);
		
		$data = $this->M_users->getID($dataid);

		echo json_encode($data);
	}

	public function getById()
	{
		$idx = $this->input->post('id');

		$dataid = $idx;
		
		$data = $this->M_users->getById($dataid);

		echo json_encode($data);
	}

	public function prosesEdite($idx)
	{
		
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id_device = $this->input->post('id_device');
	
		if ($password != 0) {

		$dataUser = array(
			'name' => $name,
			'username' => $username,
			'password' => md5($password),
			'id_device' =>$id_device
		);

		}else{

		$dataUser = array(
			'name' => $name,
			'username' => $username,
			'id_device' => $id_device
		);

		}

		$data = $this->M_users->editData($idx, $dataUser);
		echo json_encode($data);
	}

	public function prosesDaftar()
	{
		$idx = $this->input->post('idx');
		$id_finger = $this->input->post('id_finger');
		$device_key = $this->input->post('id_device');
		
		$cek = $this->M_users->cekFinger($id_finger);

		if ($cek != null) {

		$data = array(
				'status' => '0',
				'massage' => 'Id sidik jari sudah digunakan mohon masukan id lain.'
			);
			echo json_encode($data);
			
		}else{

		$data = array(
				'id_sidikJari' => $id_finger
			);

		$data2 = array(
			'data_sidik_jari' => $id_finger
		);

		$proses = $this->M_users->UpdateSidikjari($device_key, $data, $idx, $data2);

		$data1 = array(
				'status' => '1',
				'massage' => 'Menunggu balasan dari mikrokontroler.'
			);
		echo json_encode($data1);
			
		}
	}


	public function cekBalas()
	{
		$id_sidikJari = $this->input->post('id_sidikJari');

		$data = $this->M_users->getDevice($id_sidikJari);

		if ($data[0]->respon_mikrokonroler1 == 1) {

		$data1 = array(
				'status' => '1',
				'massage' => 'Silahkan tap sensor sidik jari untuk mendaftarkan sidik jari anda.!'
			);
		echo json_encode($data1);
		
		}else{

		$data1 = array(
				'status' => '0',
				'massage' => 'Mikrokontroler Belum Merespon Boor.!'
			);
		echo json_encode($data1);

		}
		
	}

	public function cekBalas2()
	{
		$id_sidikJari = $this->input->post('id_sidikJari');

		$data = $this->M_users->getDevice($id_sidikJari);

		if ($data[0]->respon_mikrokonroler2 == 1) {

		$data1 = array(
				'status' => '1',
				'massage' => 'Pendaftaran Sidik Jari Berhasil.'
			);
		echo json_encode($data1);
		
		}else{

		$data1 = array(
				'status' => '0',
				'massage' => 'Mikrokontroler Belum Merespon Boor.!'
			);
		echo json_encode($data1);

		}
		
	}


	public function deletUser($idx)
	{
		$data = $this->M_users->deletUser($idx);
		echo json_encode($data);
	}


	

}

/* End of file CtrlUsers.php */
/* Location: ./application/controllers/CtrlUsers.php */