<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct()
     {

       
        parent::__construct();
		is_login();
		$this->load->model('M_app','app');
     }
	
	 public function index(){
        
        
		$pns = $this->app->view('asn')->num_rows();
		$p3k = $this->app->view('p3k')->num_rows();
		$ptt = $this->app->view('ptt')->num_rows();
		$data = array(
			'judul' => 'Beranda',
			'mn_beranda' => true,
			'pns' => $pns,
			'p3k' => $p3k,
			'ptt' => $ptt,
			
		);

        $this->template->display('beranda/view', $data);
       

       
    }
}