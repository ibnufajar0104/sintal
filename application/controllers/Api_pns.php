<?php
use GuzzleHttp\Client;
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_pns extends CI_Controller {

    public function __construct()
    {

       
        parent::__construct();
		is_login();
        $this->config->load('sintal');

    }


    public function get_by_nip(){

        $nip = preg_replace('/[^0-9]/', '', (string) $this->input->post('nip',true));

        header('Content-Type: application/json');

        $client = new Client();
        $url = $this->config->item('bkpsdm_api_url');

        // API BKPSDM sering error (HTTP 500); jangan sampai jadi halaman error PHP,
        // kirim array kosong supaya halaman cetak tetap memakai data lokal
        try {
            $response = $client->request('POST',$url,[
                'auth' => [$this->config->item('bkpsdm_api_user'), $this->config->item('bkpsdm_api_pass')],

                'headers' => [
                    'BKPSDM-API-KEY' => $this->config->item('bkpsdm_api_key')
                ],
                'form_params' => [
                    'nip' => $nip
                ],
                'timeout' => 15,

            ]);
        } catch (\Exception $e) {
            log_message('error', 'API BKPSDM GetPerNIP gagal: ' . $e->getMessage());
            echo json_encode(array());
            return;
        }

        $result = $response->getBody()->getContents();
        echo $result;
       
        
    }
}