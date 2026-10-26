<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Idcard extends CI_Controller
{

	public function __construct()
	{


		parent::__construct();
		is_login();
		$this->load->model('M_app', 'app');
		$this->load->model('M_asn', 'asn');
		$this->load->model('M_ptt', 'ptt');
		$this->load->model('M_pppk', 'pppk');
		$this->load->library('form_validation');
	}



	public function page($page)
	{

		switch ($page) {
			case 'asn':
				$this->page_asn();
				break;
			case 'ptt':
				$this->page_ptt();
				break;
			case 'pppk':
				$this->page_p3k();
				break;
			default:
				echo 'shit';
		}
	}

	public function add($page)
	{

		switch ($page) {
			case 'asn':
				$this->add_asn();
				break;
			case 'ptt':
				$this->add_ptt();
				break;
			case 'pppk':
				$this->add_p3k();
				break;
			default:
				echo 'shit';
		}
	}


	public function edit($page, $id)
	{

		switch ($page) {
			case 'asn':
				$this->edit_asn($id);
				break;
			case 'ptt':
				$this->edit_ptt($id);
				break;
			case 'pppk':
				$this->edit_p3k($id);
				break;
			default:
				echo '';
		}
	}


	public function delete($page)
	{

		$id = $this->input->post('id');


		switch ($page) {
			case 'asn':

				$file = $this->app->view_where('asn', array('id_asn' => $id))->row_array();

				$this->app->delete('asn', array('id_asn' => $id));
				break;
			case 'ptt':
				$file = $this->app->view_where('ptt', array('id_ptt' => $id))->row_array();

				$this->app->delete('ptt', array('id_ptt' => $id));
				break;
			case 'pppk':
				$file = $this->app->view_where('p3k', array('id_p3k' => $id))->row_array();

				$this->app->delete('p3k', array('id_p3k' => $id));
				break;
			default:
				echo 'shit';
		}

		$this->session->set_flashdata('success', 'Berhasil Dihapus');

		redirect('idcard/page/' . $page, 'refresh');
	}




	private function page_asn()
	{



		$data = array(
			'judul' => 'Data PNS',
			'mn_idcard_asn' => true,
			'data' => $this->app->view_ordering('asn', 'id_asn', 'DESC'),
			'jquery' => 'idcard/asn/js',
		);


		$this->template->display('idcard/asn/view', $data);
	}

	private function add_asn()
	{


		$this->form_validation->set_rules('nip', '', 'required|trim');
		$this->form_validation->set_rules('goldar', '', 'required|trim');
		$this->form_validation->set_rules('alamat_kantor', '', 'required|trim');




		if ($this->form_validation->run() == FALSE) {

			$data = array(
				'judul' => 'Tambah Data PNS',
				'mn_idcard_asn' => true,
				'jquery' => 'idcard/asn/jquery_add',

			);

			$this->template->display('idcard/asn/add', $data);
		} else {




			$foto = $this->app->upload('idcard/add/asn', 'asn', $this->input->post('nip', true));

			$data = array(
				'nip' => $this->input->post('nip', true),
				'nama' => $this->input->post('nama', true),
				'instansi' => $this->input->post('instansi', true),
				'jabatan' => $this->input->post('jabatan', true),
				'eselon' => $this->input->post('eselon', true),
				'goldar' => $this->input->post('goldar', true),
				'tgl_dikeluarkan' => $this->input->post('tgl_dikeluarkan', true),
				'alamat_kantor' => $this->input->post('alamat_kantor', true),
				'foto' => $foto,
				'id_card_depan' => $this->app->id_card_name('depan'),
				'id_card_belakang' => $this->app->id_card_name('belakang'),
			);

			$this->app->insert('asn', $data);

			$this->session->set_flashdata('success', 'Berhasil Ditambahkan');

			redirect('idcard/page/asn', 'refresh');
		}
	}

	private function edit_asn($id)
	{

		$this->form_validation->set_rules('nip', '', 'required|trim');
		$this->form_validation->set_rules('goldar', '', 'required|trim');
		$this->form_validation->set_rules('alamat_kantor', '', 'required|trim');




		if ($this->form_validation->run() == FALSE) {

			$data = array(
				'judul' => 'Edit Data PNS',
				'mn_idcard_asn' => true,
				'jquery' => 'idcard/asn/jquery_edit',
				'data' => $this->app->view_where('asn', array('id_asn' => $id))->row_array()

			);



			$this->template->display('idcard/asn/edit', $data);
		} else {




			$foto_lama = $this->input->post('foto_lama', true);
			$error_file = $_FILES['foto']['error'] ?? UPLOAD_ERR_NO_FILE;

			if ($error_file === 4) {
				$foto =  $foto_lama;
			} else {


				$foto = $this->app->upload('idcard/edit/asn/' . $id, 'asn', $this->input->post('nip', true));
			}



			$data = array(
                'nama' => $this->input->post('nama', true),
				'goldar' => $this->input->post('goldar', true),
				'tgl_dikeluarkan' => $this->input->post('tgl_dikeluarkan', true),
				'alamat_kantor' => $this->input->post('alamat_kantor', true),
				'foto' => $foto,
			);


			$this->app->update('asn', $data, array('id_asn' => $id));

			$this->session->set_flashdata('success', 'Berhasil Diedit');

			redirect('idcard/page/asn', 'refresh');
		}
	}

	private function page_ptt()
	{



		$data = array(
			'judul' => 'Data PTT',
			'mn_idcard_ptt' => true,
			'jquery' => 'idcard/ptt/js',
		);




		$this->template->display('idcard/ptt/view', $data);
	}

	private function add_ptt()
	{



		$this->form_validation->set_rules('goldar', '', 'required|trim');
		$this->form_validation->set_rules('alamat_kantor', '', 'required|trim');




		if ($this->form_validation->run() == FALSE) {

			$data = array(
				'judul' => 'Tambah Data PTT',
				'mn_idcard_ptt' => true,
				'instansi' => $this->app->view_ordering('ref_skpd', 'id_skpd', 'DESC'),
				'jquery' => 'idcard/ptt/jquery',

			);



			$this->template->display('idcard/ptt/add', $data);
		} else {




			$foto = $this->app->upload('idcard/add/ptt', 'ptt');

			$data = array(

				'nama' => $this->input->post('nama', true),
				'id_skpd' => $this->input->post('id_skpd', true),
				'jabatan' => $this->input->post('jabatan', true),
				'goldar' => $this->input->post('goldar', true),
				'tgl_dikeluarkan' => $this->input->post('tgl_dikeluarkan', true),
				'alamat_kantor' => $this->input->post('alamat_kantor', true),
				'foto' => $foto,
				'id_card_depan' => $this->app->id_card_name('depan'),
				'id_card_belakang' => $this->app->id_card_name('belakang'),
			);



			$this->app->insert('ptt', $data);

			$this->session->set_flashdata('success', 'Berhasil Ditambahkan');

			redirect('idcard/page/ptt', 'refresh');
		}
	}

	private function edit_ptt($id)
	{

		$this->form_validation->set_rules('goldar', '', 'required|trim');
		$this->form_validation->set_rules('alamat_kantor', '', 'required|trim');




		if ($this->form_validation->run() == FALSE) {


			$data = array(
				'judul' => 'Edit Data PTT',
				'mn_idcard_asn' => true,
				'jquery' => 'idcard/ptt/jquery',
				'instansi' => $this->app->view_ordering('ref_skpd', 'id_skpd', 'DESC'),
				'data' => $this->app->view_join_where('ptt', 'ref_skpd', 'id_skpd', array('id_ptt' => $id), 'id_ptt', 'DESC')->row_array(),

			);




			$this->template->display('idcard/ptt/edit', $data);
		} else {


			$foto_lama = $this->input->post('foto_lama', true);
			$error_file = $_FILES['foto']['error'] ?? UPLOAD_ERR_NO_FILE;

			if ($error_file === 4) {
				$foto =  $foto_lama;
			} else {


				$foto = $this->app->upload('idcard/edit/ptt/' . $id, 'ptt');
			}



			$data = array(

				'id_skpd' => $this->input->post('id_skpd', true),
				'nama' => $this->input->post('nama', true),
				'jabatan' => $this->input->post('jabatan', true),
				'goldar' => $this->input->post('goldar', true),
				'tgl_dikeluarkan' => $this->input->post('tgl_dikeluarkan', true),
				'alamat_kantor' => $this->input->post('alamat_kantor', true),
				'foto' => $foto,
			);




			$this->app->update('ptt', $data, array('id_ptt' => $id));

			$this->session->set_flashdata('success', 'Berhasil Diedit');

			redirect('idcard/page/ptt', 'refresh');
		}
	}


	private function page_p3k()
	{



		$data = array(
			'judul' => 'Data PPPK',
			'mn_idcard_p3k' => true,
			'jquery' => 'idcard/pppk/js',
		);


		$this->template->display('idcard/pppk/view', $data);
	}





	private function add_p3k()
	{



		$this->form_validation->set_rules('goldar', '', 'required|trim');
		$this->form_validation->set_rules('alamat_kantor', '', 'required|trim');




		if ($this->form_validation->run() == FALSE) {

			$data = array(
				'judul' => 'Tambah Data PPPK',
				'mn_idcard_p3k' => true,
				'instansi' => $this->app->view_ordering('ref_skpd', 'id_skpd', 'DESC'),
				'jquery' => 'idcard/pppk/jquery',

			);



			$this->template->display('idcard/pppk/add', $data);
		} else {




			$foto = $this->app->upload('idcard/add/pppk', 'pppk', $this->input->post('nip', true));

			$data = array(

				'nip' => $this->input->post('nip', true),
				'nama' => $this->input->post('nama', true),
				'id_skpd' => $this->input->post('id_skpd', true),
				'jabatan' => $this->input->post('jabatan', true),
				'goldar' => $this->input->post('goldar', true),
				'tgl_dikeluarkan' => $this->input->post('tgl_dikeluarkan', true),
				'alamat_kantor' => $this->input->post('alamat_kantor', true),
				'foto' => $foto,
				'id_card_depan' => $this->app->id_card_name('depan'),
				'id_card_belakang' => $this->app->id_card_name('belakang'),
			);

			$this->app->insert('p3k', $data);

			$this->session->set_flashdata('success', 'Berhasil Ditambahkan');
			redirect('idcard/page/pppk', 'refresh');
		}
	}

	private function edit_p3k($id)
	{

		$this->form_validation->set_rules('goldar', '', 'required|trim');
		$this->form_validation->set_rules('alamat_kantor', '', 'required|trim');




		if ($this->form_validation->run() == FALSE) {


			$data = array(
				'judul' => 'Edit Data PPPK',
				'mn_idcard_p3k' => true,
				'jquery' => 'idcard/pppk/jquery',
				'instansi' => $this->app->view_ordering('ref_skpd', 'id_skpd', 'DESC'),
				'data' => $this->app->view_join_where('p3k', 'ref_skpd', 'id_skpd', array('id_p3k' => $id), 'id_p3k', 'DESC')->row_array(),

			);




			$this->template->display('idcard/pppk/edit', $data);
		} else {


			$foto_lama = $this->input->post('foto_lama', true);
			$error_file = $_FILES['foto']['error'] ?? UPLOAD_ERR_NO_FILE;

			if ($error_file === 4) {
				$foto =  $foto_lama;
			} else {


				$foto = $this->app->upload('idcard/edit/pppk/' . $id, 'pppk', $this->input->post('nip', true));
			}



			$data = array(

				'nip' => $this->input->post('nip', true),
				'nama' => $this->input->post('nama', true),
				'id_skpd' => $this->input->post('id_skpd', true),

				'jabatan' => $this->input->post('jabatan', true),
				'goldar' => $this->input->post('goldar', true),
				'tgl_dikeluarkan' => $this->input->post('tgl_dikeluarkan', true),
				'alamat_kantor' => $this->input->post('alamat_kantor', true),
				'foto' => $foto,
			);




			$this->app->update('p3k', $data, array('id_p3k' => $id));
			$this->session->set_flashdata('success', 'Berhasil Diedit');
			redirect('idcard/page/pppk', 'refresh');
		}
	}


	public function get_data()
	{


		$list = $this->asn->get_data();

		$data = array();
		$no = (int) $this->input->post('start');

		foreach ($list as $row) {

			$no++;
			$rows = array();
			$rows[] = $no . '.';
			$opsi = '<div class="btn-group mr-1 mb-1">
            <button type="button" class="btn  btn-outline-primary  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Opsi</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="' . site_url('cetak/asn/' . $row['id_asn']) . '">Cetak</a>
				<a class="dropdown-item" href="' . site_url('idcard/edit/asn/' . $row['id_asn']) . '">Edit</a>
                <div class="dropdown-divider"></div>
				<a class="dropdown-item" onclick="hapus(\'' . (int) $row['id_asn'] . '\')" href="#">Hapus</a>
            </div>
            </div>';

			$rows[] = $opsi;
			$rows[] = '<img src="' . html_escape(foto_url($row['foto'])) . '" alt="" width="100">';
			$rows[] = html_escape($row['nip']);
			$rows[] = html_escape($row['nama']);
			$rows[] = html_escape($row['jabatan']);
			$rows[] = html_escape($row['instansi']);
			$rows[] = html_escape($row['goldar']);
			$rows[] = tgl($row['tgl_dikeluarkan']);
			$data[] = $rows;
		}

		$output = array(
			"draw" => (int) $this->input->post('draw'),
			"recordsTotal" => $this->asn->count_all(),
			"recordsFiltered" => $this->asn->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function get_data_ptt()
	{
		$list = $this->ptt->get_data();

		$data = array();
		$no = (int) $this->input->post('start');

		foreach ($list as $row) {
			$no++;
			$rows = array();
			$rows[] = $no . '.';
			$opsi = '<div class="btn-group mr-1 mb-1">
            <button type="button" class="btn  btn-outline-primary  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Opsi</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="' . site_url('cetak/ptt/' . $row['id_ptt']) . '">Cetak</a>
				<a class="dropdown-item" href="' . site_url('idcard/edit/ptt/' . $row['id_ptt']) . '">Edit</a>
                <div class="dropdown-divider"></div>
				<a class="dropdown-item" onclick="hapus(\'' . (int) $row['id_ptt'] . '\')" href="#">Hapus</a>
            </div>
            </div>';

			$rows[] = $opsi;
			$rows[] = '<img src="' . html_escape(foto_url($row['foto'])) . '" alt="" width="100">';
			$rows[] = html_escape($row['nama']);
			$rows[] = html_escape($row['jabatan']);
			$rows[] = html_escape($row['nama_skpd']);
			$rows[] = html_escape($row['goldar']);
			$rows[] = tgl($row['tgl_dikeluarkan']);
			$rows[] = html_escape($row['alamat_kantor']);
			$data[] = $rows;
		}

		$output = array(
			"draw" => (int) $this->input->post('draw'),
			"recordsTotal" => $this->ptt->count_all(),
			"recordsFiltered" => $this->ptt->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function get_data_pppk()
	{
		$list = $this->pppk->get_data();

		$data = array();
		$no = (int) $this->input->post('start');

		foreach ($list as $row) {
			$no++;
			$rows = array();
			$rows[] = $no . '.';
			$opsi = '<div class="btn-group mr-1 mb-1">
            <button type="button" class="btn  btn-outline-primary  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Opsi</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="' . site_url('cetak/pppk/' . $row['id_p3k']) . '">Cetak</a>
				<a class="dropdown-item" href="' . site_url('idcard/edit/pppk/' . $row['id_p3k']) . '">Edit</a>
                <div class="dropdown-divider"></div>
				<a class="dropdown-item" onclick="hapus(\'' . (int) $row['id_p3k'] . '\')" href="#">Hapus</a>
            </div>
            </div>';

			$rows[] = $opsi;
			$rows[] = '<img src="' . html_escape(foto_url($row['foto'])) . '" alt="" width="100">';
			$rows[] = html_escape($row['nip']);
			$rows[] = html_escape($row['nama']);
			$rows[] = html_escape($row['jabatan']);
			$rows[] = html_escape($row['nama_skpd']);
			$rows[] = html_escape($row['goldar']);
			$rows[] = tgl($row['tgl_dikeluarkan']);
			$rows[] = html_escape($row['alamat_kantor']);
			$data[] = $rows;
		}

		$output = array(
			"draw" => (int) $this->input->post('draw'),
			"recordsTotal" => $this->pppk->count_all(),
			"recordsFiltered" => $this->pppk->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}
}