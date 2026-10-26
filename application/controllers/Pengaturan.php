<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct()
    {

       
        parent::__construct();
        is_login();
		$this->load->model('M_app','app');
    }

    public function index(){
        
        $json = $this->json();
      
        
        $data = array(
            'judul' => 'Pengaturan',
            'data' => $json,
            'mn_pengaturan' => true,
            'jquery' => 'pengaturan/jquery'
        );
        
        $this->template->display('pengaturan/view', $data);

        

        
    }


    public function form(){

        
        $json = $this->json();
        $key = $this->input->post('key',true);
        $tipe = $this->input->post('tipe',true);

        // cegah path traversal pada nama view
        if (!in_array($tipe, array('text', 'file'), true) || !isset($json[$key])) {
            show_404();
            return;
        }

        $data = array(
            'key' => $key,
            'json_title' => $json[$key]['title'] ?? '',
            'tipe' => $json[$key]['multitype'] ?? '',
            'value' => $json[$key]['value'] ?? '',
        );

        $this->load->view('pengaturan/form/'.$tipe,$data);
    }

    public function update(){

        $tipe = $this->input->post('tipe',true);

        $json = $this->json();
        $key = $this->input->post('key',true);

        if (!isset($json[$key])) {
            show_404();
            return;
        }

        if($tipe == 'text'){

            
           
            $value = $this->input->post('value',true);
            $json[$key]['value'] = $value;
            $json = json_encode($json,true);

            $this->json_update($json);
          
            
            
        }else{
      
            $url = 'pengaturan';
            $value = $this->upload($url);
            $json[$key]['value'] = $value;
            $json = json_encode($json,true);

            
            
            $this->json_update($json);


        }
    }

    private function json_update($json){
        $this->db->update('ref_pengaturan',array('json' => $json));
        $this->session->set_flashdata('success', 'Berhasil Diedit');
        redirect('pengaturan', 'refresh');
    }
     
    
       
    private function json(){
        $json =  $this->app->view('ref_pengaturan')->row_array();
        $json = json_decode($json['json'], true);

        return $json;
    }

    private function upload($url){
		
			
		$extensi_valid = ['jpg','png','jpeg'];
		$nama_file = $_FILES['value']['name'];
		$ukuran_file = $_FILES['value']['size'];
		$error_file = $_FILES['value']['error'];
		$tmp_file = $_FILES['value']['tmp_name'];
		$extensi_file = explode('.', $nama_file);
		$extensi_file = strtolower(end($extensi_file));

		if ($error_file === 4) {
			// tidak boleh kosong
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">File harap di upload </div>');

			redirect($url, 'refresh');
			return false;
		}

		if (!in_array($extensi_file, $extensi_valid)) {
			// cek ekstensi 
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"> Extensi File tidak valid </div>');

			redirect($url, 'refresh');
			return false;
		}

		if ($ukuran_file > 2000000) {
			// cek ukuran
			$this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">Ukuran File minimal 2 mb </div>');

			redirect($url, 'refresh');
			return false;
		}

		if (!is_uploaded_file($tmp_file) || @getimagesize($tmp_file) === false) {
			// cek isi file benar-benar gambar
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"> File bukan gambar yang valid </div>');

			redirect($url, 'refresh');
			return false;
		}

		$rndm =  strtotime("now");
		$value= 'asset/template/'.$rndm.'.png';
		move_uploaded_file($tmp_file,$value);

		return $value;
		
	}
}

?>