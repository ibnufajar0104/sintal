<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {


	public function __construct()
    {

       
        parent::__construct();
		is_login();
		$this->load->model('M_app','app');
        $this->load->library('form_validation');
    }
	 
	
	public function get_alamat(){
		
		$unitkerja =  $this->input->post('unitkerja', true);
		// $unitkerja =  'DINAS KOMUNIKASI DAN INFORMATIKA';

		// $unitkerja = strtoupper($unitkerja);
		$data = $this->app->view_where('ref_skpd',array('nama_skpd' => $unitkerja))->row_array();

        echo json_encode($data);

	}

	public function get_alamat_by_id(){
		
		$id =  $this->input->post('id', true);
		// $unitkerja =  'DINAS KOMUNIKASI DAN INFORMATIKA';
		$data = $this->app->view_where('ref_skpd',array('id_skpd' => $id))->row_array();

        echo json_encode($data);

	}

	public function nip_cek(){
		
		// untuk pns
		$nip = $this->input->post('nip',true);
		
		$ada = $this->app->view_where('asn',array('nip'=> $nip))->num_rows();

		if ($ada)
		{
	
			echo 1;
		
			
		}
		else
		{
			echo 0;
		}
	}

	public function nip_cek_p3k(){
		
		// untuk p3k
		
		$id = $this->input->post('id',true);
		$nip = $this->input->post('nip',true);
		$form = $this->input->post('form',true);

		if($form == 'add'){
			$ada = $this->app->view_where('p3k',array('nip'=> $nip))->num_rows();

			if ($ada)
			{
		
				echo 1;
			
				
			}
			else
			{
				echo 0;
			}
		}else{
			 $this->db->where('nip',$nip);
			 $this->db->where('id_p3k !=',$id);
			 
			$ada = $this->db->get('p3k')->num_rows();
			if ($ada)
			{
		
				echo 1;
			
				
			}
			else
			{
				echo 0;
			}
		}
		
	}

	public function get_id_instansi(){

		$nama_skpd = $this->input->post('nama_skpd',true);
		$this->db->like('nama_skpd',$nama_skpd, 'both'); 
		$r = $this->db->get('ref_skpd')->row_array();

		if($r){

			$response = array('status' => true , 'msg' =>  'success', 'data' => $r['id_skpd']);
			   
		}else{
			$response = array('status' => false , 'msg' =>  'Terjadi kesalahan');
			   
		}
		echo json_encode($response);
	}
}