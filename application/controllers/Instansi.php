<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		is_login();
        $this->load->model('M_app','app');

    	
    }
	
	 public function index(){
        
        
		
		$data = array(
			'judul' => 'Instansi',
			'mn_instansi' => true,
			'jquery' => 'instansi/jquery',
			'data' => $this->app->view_ordering('ref_skpd','id_skpd','ASC')
		);

        $this->template->display('instansi/view', $data);
		
		

       
    }


	public function get_by_id(){
		
		$id =  $this->input->post('id_skpd', true);
        $data = $this->app->view_where('ref_skpd',array('id_skpd' => $id))->row_array();

        echo json_encode($data);
	}




	public function update(){

		$id = $this->input->post('id_skpd',true);
		$data['nama_skpd'] = $this->input->post('nama_skpd',true);
		$data['singkatan'] = $this->input->post('singkatan',true);
		$data['alamat'] = $this->input->post('alamat',true);
		$this->app->update('ref_skpd',$data,array('id_skpd' => $id));
		$this->session->set_flashdata('success', 'Berhasil Diedit');
		redirect('instansi', 'refresh');

		
	}
}