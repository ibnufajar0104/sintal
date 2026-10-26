<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		is_login();
        $this->load->model('M_app','app');
        $this->load->library('form_validation');
    	
    }
	
	 public function index(){
        
        
		
		$data = array(
			'judul' => 'User',
			'mn_user' => true,
			'jquery' => 'user/jquery',
			'data' => $this->app->view_ordering('user','id_user','ASC')
		);

        $this->template->display('user/view', $data);
		
		

       
    }


    public function add(){
        $this->form_validation->set_rules('nama', '', 'required|trim');
	
	
		if ($this->form_validation->run() == FALSE) {
			
			$data = array(
				'judul' => 'Tambah Data User',
				'mn_user' => true,
				'jquery' => 'user/jquery',
			
			);

			
	
			$this->template->display('user/add', $data);
		}else{

			$data = array(

				
				'nama' => $this->input->post('nama',true),
				'username' => $this->input->post('username',true),
				'password' => password_hash($this->input->post('password',true),PASSWORD_DEFAULT),
			
			);

			

		    $this->app->insert('user',$data);

			$this->session->set_flashdata('success', 'Berhasil Ditambahkan');
			redirect('user', 'refresh');
        }

    }

	
	public function update(){

		$id = $this->input->post('id_user',true);
		$data['nama'] = $this->input->post('nama',true);
		$data['username'] = $this->input->post('username',true);

		$this->app->update('user',$data,array('id_user' => $id));
		
		$this->session->set_flashdata('success', 'Berhasil Diedit');
		
		redirect('user', 'refresh');

	}

	
	public function get_by_id(){
		
		$id =  $this->input->post('id_user', true);
        $data = $this->app->view_where('user',array('id_user' => $id))->row_array();

        echo json_encode($data);
	}


	public function delete(){

		$id = $this->input->post('id');
		$this->app->delete('user',array('id_user' => $id));

		$this->session->set_flashdata('success', 'Berhasil Dihapus');
		
	    redirect('user', 'refresh');
	}

	public function logout()
    {
        session_destroy();
        redirect('login');
    }

}