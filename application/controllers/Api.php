<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_login();
    $this->config->load('sintal');
  }

  public function get_photo_simpeg()
  {
    $response = $this->request($this->config->item('simpeg_foto_api_url') . rawurlencode($this->nip()));

    $data = json_decode((string) $response, true);

    echo json_encode($data['data'] ?? null, true);
  }


  public function get_by_nip()
  {
    $response = $this->request($this->config->item('nametag_api_url') . '?nip=' . urlencode($this->nip()));

    $data = json_decode((string) $response, true);

    echo json_encode($data['data'] ?? null, true);
  }


  public function get_data()
  {
    echo $this->request($this->config->item('nametag_api_url') . '?nip=' . urlencode($this->nip()));
  }

  // NIP hanya angka, cegah injeksi path/parameter ke URL API
  private function nip()
  {
    return preg_replace('/[^0-9]/', '', (string) $this->input->post('nip', true));
  }

  private function request($url)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 3,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_FOLLOWLOCATION => false,
      CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'x-api-key: ' . $this->config->item('nametag_api_key')
      ),
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_SSL_VERIFYHOST => false
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return $response === false ? '' : $response;
  }
}
