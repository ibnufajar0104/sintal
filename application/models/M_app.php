<?php
class M_app extends CI_model{
    
    
    public function view($table){
        return $this->db->get($table);
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }

    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where);
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }

    public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_join_one($table1,$table2,$field,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1,$table2,$field,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get();
    }

    public function view_join_where_select($table1,$table2,$field,$where,$order,$ordering,$select){
        $this->db->select($select);
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    
    public function upload($url,$jenis,$str = ''){
		
			
		$extensi_valid = ['jpg','png','jpeg'];
		$nama_file = $_FILES['foto']['name'];
		$ukuran_file = $_FILES['foto']['size'];
		$error_file = $_FILES['foto']['error'];
		$tmp_file = $_FILES['foto']['tmp_name'];
		$extensi_file = explode('.', $nama_file);
		$extensi_file = strtolower(end($extensi_file));

		if ($error_file === 4) {
			// tidak boleh kosong
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">Foto harap di upload </div>');

			redirect($url, 'refresh');
			return false;
		}

		if (!in_array($extensi_file, $extensi_valid)) {
			// cek ekstensi 
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"> Extensi file tidak valid </div>');

			redirect($url, 'refresh');
			return false;
		}

		if ($ukuran_file > 2000000) {
			// cek ukuran
			$this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">Ukuran foto minimal 2 mb </div>');

			redirect($url, 'refresh');
			return false;
		}

		if (!is_uploaded_file($tmp_file) || @getimagesize($tmp_file) === false) {
			// cek isi file benar-benar gambar
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"> File bukan gambar yang valid </div>');

			redirect($url, 'refresh');
			return false;
		}

        // nama file dari NIP: buang karakter selain huruf/angka agar tidak bisa path traversal
        $str = preg_replace('/[^0-9A-Za-z_-]/', '', (string) $str);
        if($str == ''){
            $str=  strtotime("now");
        }
	
		$value= 'asset/foto/'.$jenis.'/'.$str.'.png';
		if (file_exists($value)) {
            unlink($value);
        } 
		move_uploaded_file($tmp_file,$value);

		return $value;
		
	}

    // id card name file
    public function id_card_name($str){


        if($str == 'depan'){

            $rndm =  strtotime("now");
            $file= 'asset/idcard/'.$rndm.'_depan.png';
        }else{
            $rndm =  strtotime("now");
            $file= 'asset/idcard/'.$rndm.'_belakang.png';
        }


        return $file;
    }

   



  

}