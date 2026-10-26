<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">Halaman <?=$judul?></h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=site_url('beranda')?>">Beranda</a>
                        </li>

                        <li class="breadcrumb-item active"><?=$judul?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Elements start -->
            <section class="basic-elements">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <?= form_open_multipart('', 'class="form"'); ?>

                            <div class="card-header">
                                <h4 class="card-title"><?=$judul?></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <?= $this->session->flashdata('message') ?>
                                            <fieldset class="form-group">
                                                <label for="basicInput">NIP</label>
                                                <div class="input-group">

                                                    <input type="number" name="nip" id="nip" class="form-control"
                                                        required>
                                                    <div class="input-group-append" id="button-addon2">
                                                        <button class="btn btn-outline-primary" type="button"
                                                            id="tampilkan"><i class="ft-list"></i> Tampilkan</button>
                                                    </div>

                                                </div>

                                                <p class=" text-danger required hide">* wajib diisi</p>
                                                <p class=" text-danger sudah_ada hide">* data sudah ada</p>
                                                <p class=" text-danger tidak_ditemukan hide">* data tidak ditemukan</p>
                                                <p class=" text-danger tidak_ada_respon hide">* tidak ada respon</p>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Nama</label>
                                                <input type="text" name="nama" id="nama" class="form-control" required
                                                    readonly>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Instansi</label>


                                                <textarea name="instansi" id="instansi" class="form-control" rows="5"
                                                    readonly required></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Jabatan</label>
                                                <input type="text" name="jabatan" id="jabatan" class="form-control"
                                                    required readonly>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Eselon</label>
                                                <input type="text" name="eselon" id="eselon" class="form-control"
                                                    required readonly>
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Golongan Darah</label>
                                                <select name="goldar" id="goldar" class="form-control" required>
                                                    <option value="">Pilih</option>
                                                    <option value="-">-</option>
                                                    <option value="O">O</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="AB">AB</option>
                                                </select>

                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tanggal Dikeluarkan</label>
                                                <input type="date" value="<?= date('Y-m-d')?>" name="tgl_dikeluarkan"
                                                    id="tgl_dikeluarkan" class="form-control" required>
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Alamat Kantor</label>
                                                <textarea name="alamat_kantor" id="alamat" class="form-control" rows="5"
                                                    placeholder="wajib diisi" required></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Foto</label>
                                                <input type="file" name="foto" id="foto" class="form-control" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="<?= site_url('idcard/page/asn')?>"> <button type="button"
                                        class="btn btn-outline-danger"><i class="fa fa-times"></i>
                                        Batal</button></a>
                                <button type="submit" class="btn btn-outline-success"><i class="ft-save"></i>
                                    Simpan</button>

                            </div>
                            <?= form_close()?>
                        </div>
                    </div>

                </div>
            </section>
            <!-- Basic Inputs end -->



        </div>
    </div>
</div>