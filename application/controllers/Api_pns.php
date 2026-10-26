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

        $client = new Client();
        $url = $this->config->item('bkpsdm_api_url');

        $response = $client->request('POST',$url,[
            'auth' => [$this->config->item('bkpsdm_api_user'), $this->config->item('bkpsdm_api_pass')],

            'headers' => [
                'BKPSDM-API-KEY' => $this->config->item('bkpsdm_api_key')
            ],
            'form_params' => [
                'nip' => $nip
            ],

        ]);

        $result = $response->getBody()->getContents();
        echo $result;
       
        
    }
}