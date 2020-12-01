<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use GuzzleHttp\Client;

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

    public function taping_post()
    {
       $device_key = $this->input->post('device_key');
       $idSidikJari = $this->input->post('idSidikJari');
       $statusDoor = $this->input->post('satus_door');

       if ($device_key != null && $idSidikJari != null)
       {

            $getDataDevice     = $this->M_Api->getDataDevice($device_key);
            $getDataUser       = $this->M_Api->getDataUser($idSidikJari);
            

            if ($getDataDevice != null && $getDataUser != null)
            {

                $dataInput = array(
                    'id_device'            => $getDataDevice->idx,
                    'id_user'              => $getDataUser->idx,
                    'setatus_door_taping'  => $statusDoor,
                    'tap_time'             => date('Y-m-d H:i:s')
                );

                $dataSetatusDoor = array(
                    'status_door' => $statusDoor
                );

                $hasil = $this->M_Api->inputTaping($dataInput, $dataSetatusDoor, $device_key);


                $getDataDevice2     = $this->M_Api->getDataDevice($device_key);
                $getDataUser2       = $this->M_Api->getDataUser($idSidikJari);

                $Massage = $getDataUser2->name.' baru saja melakukan akses pintu pada jam '.date('Y-m-d H:i:s').' dan status pintu sekarang adalah '.$getDataDevice2->status_door;

                $this->sendTele($Massage);
                

                $this->response( [
                    'status' => true,
                    'massage' => "Berhasil Melakukan Tapping",
                    'data'    => $getDataDevice2,
                    'code'  => 200
                ], 200 );

            }else{

                $this->response( [
                    'status' => false,
                    'massage' => 'device atau user tidak ditemukan',
                    'code'  => 401
                ], 401 );

            }

                

       }else{
        
        $this->response( [
            'status' => false,
            'massage' => 'device key kosong atau id sidik jari kosong',
            'code'  => 401
        ], 401 );

       }
    }

    public function sendTele($Massage)
    {
        $tokeBot = '1411736572:AAEgZ6xY5lPVpvYq_PZ4LwGcKJ50QUDRSkQ';
        $idTeleOwner = '1403132646';

        $client = new Client();

        $respon = $client->request('POST', 'https://api.telegram.org/bot1411736572:AAEgZ6xY5lPVpvYq_PZ4LwGcKJ50QUDRSkQ/sendMessage', [
            'form_params' => [
                'chat_id' => $idTeleOwner,
                'text'    => $Massage
            ]
        ]);

        return TRUE;
    }
}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */