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

    // private: hanya dipanggil dari halaman cetak, tidak boleh diakses lewat URL
    private function qrcodegenerate($datacetak){
        // NIP dipakai sebagai nama file: hanya huruf/angka (cegah path traversal)
        $datacetak = preg_replace('/[^0-9A-Za-z_-]/', '', (string) $datacetak);
        if ($datacetak === '') {
            return;
        }

        $this->load->library('ciqrcode');

        $tempdir = "./asset/foto/qrcode/"; //Nama folder tempat menyimpan file qrcode
        if (!file_exists($tempdir)) //Jika tidak ada folder, maka buat folder bernama sesuai $tempdir
        mkdir($tempdir, 0755, true);

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
        $QR = @imagecreatefrompng($tempdir.$id_berkas.'.png');

        // memulai menggambar logo dalam file qrcode (dilewati jika QR/logo tidak ada, agar halaman cetak tidak error)
        $logo = is_file($logopath) ? @imagecreatefromstring(file_get_contents($logopath)) : false;
        if (!$QR || !$logo) {
            return;
        }

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
        if (!$data_person) {
            show_404();
            return;
        }
        $this->qrcodegenerate($data_person['nip']);

        // nama dinas dari data lokal, supaya tetap tampil walau API nametag tidak bisa diakses
        $skpd = $this->app->view_where('ref_skpd',array('nama_skpd' => $data_person['instansi']))->row_array();

        $data = array(
            'judul' => 'Cetak ID Card PNS',
            'mn_idcard_asn' => true,
            'jquery' => 'cetak/asn/jquery',
            'css' => 'cetak/asn/css',
            'pengaturan' => $this->json(),
            'data' => $data_person,
            'skpd' => $skpd
        );
   
        $this->template->display('cetak/asn/view', $data);
    }


    public function pppk($id){
        $data_person = $this->app->view_join_where('p3k','ref_skpd','id_skpd',array('id_p3k' => $id),'id_p3k','DESC')->row_array();
        if (!$data_person) {
            show_404();
            return;
        }
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


//   public function save_image(){

//     $image = $this->input->post('image',false);
//     $file = $this->input->post('file_name',true);
    
//     $image_parts = explode(";base64,", $image);
//     $image_base64 = base64_decode($image_parts[1]);
  
//     var_dump($image_parts);
//     file_put_contents($file, $image_base64);
//   }

public function save_image()
{
    $image = (string) $this->input->post('image', false);
    $file  = (string) $this->input->post('file_name', true);

    // Validasi dasar
    if (empty($image) || empty($file)) {
        echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap']);
        return;
    }

    // hanya boleh menulis file id card yang dibuat oleh id_card_name()
    if (!preg_match('#^asset/idcard/[0-9]+_(depan|belakang)\.png$#', $file)) {
        echo json_encode(['status' => 'error', 'message' => 'Nama file tidak valid']);
        return;
    }

    // Pastikan format base64 benar
    if (strpos($image, ';base64,') === false) {
        echo json_encode(['status' => 'error', 'message' => 'Format gambar tidak valid']);
        return;
    }

    // Pecah base64
    $image_parts  = explode(";base64,", $image, 2);
    $image_base64 = base64_decode($image_parts[1], true);

    // pastikan isinya benar-benar gambar (html2canvas mengirim JPEG, PNG juga diterima)
    $info = $image_base64 === false ? false : @getimagesizefromstring($image_base64);
    if ($info === false || !in_array($info[2], array(IMAGETYPE_PNG, IMAGETYPE_JPEG), true)) {
        echo json_encode(['status' => 'error', 'message' => 'Gagal decode gambar']);
        return;
    }

    // SIMPAN FILE (tetap dipertahankan)
    file_put_contents($file, $image_base64);

    // Response bersih (penting untuk AJAX)
    // echo json_encode([
    //     'status' => 'success',
    //     'message' => 'Gambar berhasil disimpan'
    // ]);
}

    public function simpan_foto_darisimpeg(){
        $this->config->load('sintal');

        $url = (string) $this->input->post('url', false);
        // NIP hanya angka (dipakai sebagai nama file)
        $nip = preg_replace('/[^0-9]/', '', (string) $this->input->post('nip', false));

        // cegah SSRF: hanya http/https ke host SIMPEG yang diizinkan (bukan file://, localhost, dll)
        $scheme = strtolower((string) parse_url($url, PHP_URL_SCHEME));
        $host   = strtolower((string) parse_url($url, PHP_URL_HOST));
        $allowed_hosts = (array) $this->config->item('simpeg_photo_hosts');

        if ($nip === '' || !in_array($scheme, array('http', 'https'), true) || !in_array($host, $allowed_hosts, true)) {
            echo json_encode(['status' => false, 'message' => 'URL foto tidak diizinkan']);
            return;
        }

        $namaFile = $nip . '.jpg';
        $lokasiSimpan = 'asset/foto/temp-simpeg/' . $namaFile;
        $lokasiTmp = $lokasiSimpan . '.tmp';

        // Inisialisasi cURL
        $ch = curl_init($url);
        $fp = fopen($lokasiTmp, 'wb'); // Simpan sebagai binary

        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false); // redirect bisa diarahkan ke host lain
        curl_setopt($ch, CURLOPT_PROTOCOLS, CURLPROTO_HTTP | CURLPROTO_HTTPS);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // jika SSL error
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0'); // untuk menghindari blokir

        curl_exec($ch);

        if (curl_errno($ch)) {
            log_message('error', 'CURL Error saat download foto: ' . curl_error($ch));
        }

        curl_close($ch);
        fclose($fp);

        // hanya simpan kalau hasil unduhan benar-benar gambar
        if (is_file($lokasiTmp) && filesize($lokasiTmp) > 0 && @getimagesize($lokasiTmp) !== false) {
            rename($lokasiTmp, $lokasiSimpan);
        } else {
            @unlink($lokasiTmp);
        }

        // Validasi hasil
        if (file_exists($lokasiSimpan) && filesize($lokasiSimpan) > 0) {
            echo json_encode(['status' => true, 'message' => 'Foto berhasil disimpan']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menyimpan foto']);
        }
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