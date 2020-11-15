<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_Api');
    }

    public function device_post()
    {
        $device_key = $this->input->post('device_key');

        if ($device_key != null) {
            
            $data = $this->M_Api->getDevice($device_key);
            $this->response($data,$data['status']);

        }else{

            $this->response( [
                'status' => false,
                'massage' => 'Device key kososng',
                'code'  => 404
            ], 404 );

        }
    }


    public function risetDevice_post()
    {
        $device_key = $this->input->post('device_key');

        $dataX = array(
            'id_sidikJari' => '0',
            'respon_mikrokonroler1' => '0',
            'respon_mikrokonroler2' => '0',
            'respon_mikrokonroler3' => '0'
        );

        if ($device_key != null) {
            
        $data = $this->M_Api->risetDevice($device_key, $dataX);
        $this->response($data,$data['status']);

        }else{

         $this->response( [
                'status' => false,
                'massage' => 'device key kosong.!',
                'code'  => 401
            ], 401 );

        }


    }


    public function respondDevice1_post()
    {
        $device_key = $this->input->post('device_key');

        $dataX = array(
            'respon_mikrokonroler1' => '1'
        );

        if ($device_key != null) {
            
        $data = $this->M_Api->respondDevice1($device_key, $dataX);

        $this->response($data,$data['status']);

        }else{

         $this->response( [
                'status' => false,
                'massage' => 'device key kosong.!',
                'code'  => 401
            ], 401 );

        }


    }

    public function respondDevice2_post()
    {
        $device_key = $this->input->post('device_key');

        $dataX = array(
            'respon_mikrokonroler2' => '1'
        );

        if ($device_key != null) {
            
        $data = $this->M_Api->respondDevice2($device_key, $dataX);

        $this->response($data,$data['status']);

        }else{

         $this->response( [
                'status' => false,
                'massage' => 'device key kosong.!',
                'code'  => 401
            ], 401 );

        }


    }
}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */