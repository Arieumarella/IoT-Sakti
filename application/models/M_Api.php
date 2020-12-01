<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Api extends CI_Model {

	public function getDevice($device_key)
	{
		$data = $this->db->get_where('device', array('device_key' => $device_key))->result();

		if ($data) {
		 
		 $response['status']=200;
    	 $response['error']=false;
    	 $response['massage']=$data;
    	 return $response;
		}else{
		 $response['status']=404;
    	 $response['error']=True;
    	 $response['massage']='Device key tidak terdaftar.!';

    	 return $response;
		}
	}


	public function risetDevice($device_key, $Xdata)
	{

		$data2 = $this->db->get_where('device', array('device_key' => $device_key))->result();

		
   		if ($data2) {

   		 $this->db->where('device_key', $device_key);
   		 $data = $this->db->update('device', $Xdata);	
		 
		 if ($data) {

		  $response['status']=200;
    	  $response['error']=false;
    	  $response['massage']='Data device berhasil di riset.!';
    	  return $response;

		 }else{

		 $response['status']=404;
    	 $response['error']=True;
    	 $response['massage']='Ada yang erorr nih borr cek codingnya di model M_api.!';
    	 return $response;

		 }
		
    	 
		}else{

		 $response['status']=404;
    	 $response['error']=True;
    	 $response['massage']='Device key tidak terdaftar.!';
    	 return $response;
		
		}
	}


	public function respondDevice1($device_key, $Xdata)
	{
		$data2 = $this->db->get_where('device', array('device_key' => $device_key))->result();

		
   		if ($data2) {

   		 $this->db->where('device_key', $device_key);
   		 $data = $this->db->update('device', $Xdata);	
		 
		 if ($data) {

		  $response['status']=200;
    	  $response['error']=false;
    	  $response['massage']='data respond 1 berhasil disimpan.!';
    	  return $response;

		 }else{

		 $response['status']=404;
    	 $response['error']=True;
    	 $response['massage']='Ada yang erorr nih borr cek codingnya di model M_api.!';
    	 return $response;

		 }
		
    	 
		}else{

		 $response['status']=404;
    	 $response['error']=True;
    	 $response['massage']='Device key tidak terdaftar.!';
    	 return $response;
		
		}

	}


	public function respondDevice2($device_key, $Xdata)
	{
		$data2 = $this->db->get_where('device', array('device_key' => $device_key))->result();

		
   		if ($data2) {

   		 $this->db->where('device_key', $device_key);
   		 $data = $this->db->update('device', $Xdata);	
		 
		 if ($data) {

		  $response['status']=200;
    	  $response['error']=false;
    	  $response['massage']='data respond 2 berhasil disimpan.!';
    	  return $response;

		 }else{

		 $response['status']=404;
    	 $response['error']=True;
    	 $response['massage']='Ada yang erorr nih borr cek codingnya di model M_api.!';
    	 return $response;

		 }
		
    	 
		}else{

		 $response['status']=404;
    	 $response['error']=True;
    	 $response['massage']='Device key tidak terdaftar.!';
    	 return $response;
		
		}

	}

	public function getDataDevice($device_key)
	{
		return $this->db->get_where('device', array('device_key' => $device_key))->row();
	}

	public function getDataUser($idSidikJari)
	{
		return $this->db->get_where('users', array('data_sidik_jari' => $idSidikJari))->row();
	}

	public function inputTaping($data, $dataSetatusDoor, $device_key)
	{
		$this->db->where('device_key', $device_key);
   		$this->db->update('device', $dataSetatusDoor);

		return $this->db->insert('record_tap', $data);
	}

}

/* End of file M_Api.php */
/* Location: ./application/models/M_Api.php */