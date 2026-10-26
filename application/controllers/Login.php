<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct(){

        parent::__construct();
      
        $this->load->model('M_app','app');
        $this->load->library('form_validation');

    }


    public function index(){
        
        $this->form_validation->set_rules('username', 'Username', 'required|trim', array('required' => 'Username Harus Diisi'));
        $this->form_validation->set_rules('password', 'Username', 'required|trim', array('required' => 'Password Harus Diisi'));
        if ($this->form_validation->run() == FALSE)
        {

            $data['judul'] = 'Login';
            $this->load->view('login',$data);
        }else{

            $username = $this->input->post('username',true);
            $password = $this->input->post('password',true);

            $user = $this->app->view_where('user',array('username' => $username))->row_array();
            
            if($user){

                // var_dump($password);


                // var_dump($user['password']);

                // die();
                if(password_verify($password, $user['password'])){

                        // ganti session id setelah login (cegah session fixation)
                        $this->session->sess_regenerate(TRUE);

                        $data = array(

                            'id_user' => $user['id_user'],
                            'nama' => $user['nama'],
                            'username' => $user['username'],
                            'login' => true
                        
                        );

                        $this->session->set_userdata($data);
                        redirect('beranda','refresh');

                }else{
                    $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">Password salah </div>');
                    redirect('login','refresh');
                }
            }else{
                $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">Username salah </div>');
                redirect('login','refresh');
            }
        }
        
       
    }
}