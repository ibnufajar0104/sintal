<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {


	public function __construct()
    {


        parent::__construct();
		is_login();
		$this->load->model('M_app','app');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view('cetak');
    }
}
