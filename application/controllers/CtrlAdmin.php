<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlAdmin extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('M_Dashboard');
	if($this->session->userdata('status') != "login"){
		redirect(base_url("CtrlLogin"));
		}
}

	public function index()
	{
		$tmp['tittle'] = 'Dashboard';
		$tmp['user']   = $this->M_Dashboard->getUser();
		$tmp['device'] = $this->M_Dashboard->getDevice();
		$tmp['admin'] = $this->M_Dashboard->getAdmin();
		$tmp['record'] = $this->M_Dashboard->getRicord();
		$tmp['content'] = 'Admin/dashboard';
		$this->load->view('Admin/index.php', $tmp);
	}
}
