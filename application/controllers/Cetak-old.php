<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		is_login();
		$this->load->model('M_app','app');
        $this->load->library('form_validation');
        $this->load->helper('aplikasi_helper');
    }

    public function qrcodegenerate($datacetak){
        $this->load->library('ciqrcode');

        $tempdir = "./asset/foto/qrcode/"; //Nama folder tempat menyimpan file qrcode
        if (!file_exists($tempdir)) //Jika tidak ada folder, maka buat folder bernama sesuai $tempdir
        mkdir($tempdir);

        //ambil logo
        $logopath="./asset/logo_tanahlaut.png";

        // // encrypt ktp ke qrcode
        // $this->load->library('encrypt');
        // $key = 'uukpbjkabupatentanahlaut04022020'; //Key 32 character 

        //isi qrcode jika di scan
        // $no_ktp = $this->no_ktp; //call data no_ktp
        // $hasil_enkripsi = $this->encrypt->encode($no_ktp, $key);  
        // $link = base_url().'permohonan/cek_berkas/';
        // $codeContents = $link.$datacetak['id_berkas'];
        $codeContents = encrypt($datacetak);

        //simpan file qrcode
        $id_berkas = $datacetak; //call data id_user

        QRcode::png($codeContents, $tempdir.$id_berkas.'.png', QR_ECLEVEL_H, 10,4);

        // ambil file qrcode
        $QR = imagecreatefrompng($tempdir.$id_berkas.'.png');

        // memulai menggambar logo dalam file qrcode
        $logo = imagecreatefromstring(file_get_contents($logopath));
         
        imagecolortransparent($logo , imagecolorallocatealpha($logo , 0, 0, 0, 127));
        imagealphablending($logo , false);
        imagesavealpha($logo , true);

        $QR_width = imagesx($QR);
        $QR_height = imagesy($QR);

        $logo_width = imagesx($logo);
        $logo_height = imagesy($logo);

        // Scale logo to fit in the QR Code
        $logo_qr_width = $QR_width/5;
        $scale = $logo_width/$logo_qr_width;
        $logo_qr_height = $logo_height/$scale;

        imagecopyresampled($QR, $logo, $QR_width/2.5, $QR_height/2.5, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

        // Simpan kode QR lagi, dengan logo di atasnya
        imagepng($QR,$tempdir.$datacetak.'.png');
    }

    public function asn($id){
        $data_person = $this->app->view_where('asn',array('id_asn' => $id))->row_array();
        $this->qrcodegenerate($data_person['nip']);

        $data = array(
            'judul' => 'Cetak ID Card PNS',
            'mn_idcard_asn' => true,
            'jquery' => 'cetak/asn/jquery',
            'css' => 'cetak/asn/css',
            'pengaturan' => $this->json(),
            'data' => $data_person
        );
   
        $this->template->display('cetak/asn/view', $data);
    }


    public function pppk($id){
        $data_person = $this->app->view_join_where('p3k','ref_skpd','id_skpd',array('id_p3k' => $id),'id_p3k','DESC')->row_array();
        $this->qrcodegenerate($data_person['nip']);

        $data = array(
            'judul' => 'Cetak ID Card PPPK',
            'mn_idcard_p3k' => true,
            'jquery' => 'cetak/pppk/jquery',
            'css' => 'cetak/pppk/css',
            'pengaturan' => $this->json(),
            'data' => $data_person,
        );

        $this->template->display('cetak/pppk/view', $data);
    }

    public function ptt($id){
        $data_person = $this->app->view_join_where('ptt','ref_skpd','id_skpd',array('id_ptt' => $id),'id_ptt','DESC')->row_array();
        // $this->qrcodegenerate($data_person['id_ptt']);

        $data = array(
            'judul' => 'Cetak ID Card PTT',
            'mn_idcard_ptt' => true,
            'jquery' => 'cetak/ptt/jquery',
            'css' => 'cetak/ptt/css',
            'pengaturan' => $this->json(),
            'data' => $data_person,
        );

        $this->template->display('cetak/ptt/view', $data);
    }

         
    private function json(){
        $json =  $this->app->view('ref_pengaturan')->row_array();
        $json = json_decode($json['json'], true);

        return $json;
    }


   public function save_image(){

    $image = $this->input->post('image',false);
    $file = $this->input->post('file_name',true);
    
    $image_parts = explode(";base64,", $image);
    $image_base64 = base64_decode($image_parts[1]);
  
    var_dump($image_parts);
    file_put_contents($file, $image_base64);


    
   }

   public function idcard($jenis,$bagian,$id){


        if($jenis == 'asn'){
            $str = $this->app->view_where('asn',array('id_asn'=> $id))->row_array();
          
        }elseif($jenis == 'pppk'){
            $str = $this->app->view_where('p3k',array('id_p3k'=> $id))->row_array();
        }else{
            $str = $this->app->view_where('ptt',array('id_ptt'=> $id))->row_array();
       
        }

    
        if($bagian == 'depan'){
            $str = $str['id_card_depan'];
        }else{
            $str = $str['id_card_belakang'];
        }



    

        $data['src'] = base_url().$str;
        $this->load->view('cetak',$data);
       
}








}