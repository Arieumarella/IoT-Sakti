<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlRecord extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_record');
		if($this->session->userdata('status') != "login"){
		redirect(base_url("CtrlLogin"));
		}
	}

	public function index()
	{
		$tmp['tittle'] = 'Data Ricord';
		$tmp['content'] = 'Admin/dataRicord';
		$this->load->view('Admin/index.php', $tmp);
	}

	public function getData()
	{
		$data = $this->M_record->getData();
		echo json_encode($data);
	}

}

/* End of file CtrlRecord.php */
/* Location: ./application/controllers/CtrlRecord.php */