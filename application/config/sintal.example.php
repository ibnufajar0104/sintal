<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| Salin file ini menjadi sintal.php lalu isi nilainya.
| sintal.php berisi rahasia dan TIDAK boleh di-commit ke git.
*/

// API nametag & foto SIMPEG (controllers/Api.php)
$config['nametag_api_url']     = 'https://simpeg.bkpsdm.tanahlautkab.go.id/apiv2/nametag';
$config['simpeg_foto_api_url'] = 'https://simpeg.bkpsdm.tanahlautkab.go.id/api/fotopegawai/';
$config['nametag_api_key']     = '';

// host yang boleh dipakai untuk mengunduh foto SIMPEG (controllers/Cetak.php::simpan_foto_darisimpeg)
$config['simpeg_photo_hosts']  = array('simpeg.bkpsdm.tanahlautkab.go.id', '103.165.243.35');

// API BKPSDM GetPerNIP (controllers/Api_pns.php)
$config['bkpsdm_api_url']  = '103.165.243.202:8000/GetPerNIP';
$config['bkpsdm_api_user'] = '';
$config['bkpsdm_api_pass'] = '';
$config['bkpsdm_api_key']  = '';

// kunci enkripsi isi QR code (helpers/aplikasi_helper.php::encrypt)
$config['key_bkpsdm'] = '';
