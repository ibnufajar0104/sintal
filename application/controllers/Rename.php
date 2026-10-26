<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rename extends CI_Controller {


        public function __construct()
        {

        
            parent::__construct();

            // skrip migrasi sekali jalan: hanya boleh dari CLI (php index.php rename)
            if (!is_cli()) {
                show_404();
            }

            $this->load->model('M_app','app');
         
        }
	 

        public function index(){
        
                $data = $this->app->view('asn')->result_array();

                foreach($data as $row){


                    $old = $row['foto'];
                    
                    $path = 'asset/foto/asn/';

                    $new = $path.$row['nip'].'.png';


                    $id = $row['id_asn'];

                    

                    $action = $this->app->update('asn', array('foto' => $new) , array('id_asn' => $id));

                    if($action){
                        if(file_exists($old)){

                            rename($old,$new);
                            
                        }
                    }
             
                    
                    
                }

                
        }
}