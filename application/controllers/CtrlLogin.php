<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlLogin extends CI_Controller {

	 public function index() {
    $data = array(
        'title' => 'Login Page',
        
    );
    $this->load->view('admin/login.php', $data);
}

public function login() {
    $this->load->model('M_Login');
    $login = $this->M_Login->login($this->input->post('username'), md5($this->input->post('password')));
    if ($login == 1) {
//          ambil detail data
        $row = $this->M_Login->data_login($this->input->post('username'), md5($this->input->post('password')));

//          daftarkan session
        $data = array(
            'logged' => TRUE,
            'name' => $row->name,
            'idx'   =>$row->idx,
            'status' => 'login'
        );
        $this->session->set_userdata($data);
        redirect('CtrlAdmin');
            // $datalog = $this->session->userdata('idx');
            //var_dump($datalog);
            //redirect(site_url('CtrGames/index'));         
        
    } else {
//        
        $this->session->set_flashdata('data', 'usernam or password is invalid');
        redirect('CtrlLogin');
        
    }
}
function logout() {
    	//        destroy session
    $this->session->sess_destroy();

    $this->session->set_flashdata('data', 'you have logged out.!');
    redirect('CtrlLogin');

}  

}

/* End of file CtrlLogin.php */
/* Location: ./application/controllers/CtrlLogin.php */