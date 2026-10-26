<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">Halaman <?= $judul ?></h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('beranda') ?>">Beranda</a>
                        </li>

                        <li class="breadcrumb-item active"><?= $judul ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Elements start -->
            <section class="basic-elements">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">


                            <div class="card-header">
                                <h4 class="card-title">TAMPILAN DEPAN</h4>
                                <input type="hidden" name="" id="id_asn" value="<?= $data['id_asn'] ?>">
                                <input type="hidden" name="" id="id_card_depan" value="<?= $data['id_card_depan'] ?>">
                                <input type="hidden" name="" id="id_card_belakang" value="<?= $data['id_card_belakang'] ?>">
                                <input type="hidden" name="" id="nip_api" value="<?= $data['nip'] ?>">
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1 text-center">
                                            <div id="depan">

                                                <img class="foto" src="<?= base_url() . $data['foto'] ?>" alt="">




                                                <img class="template_depan" src="<?= base_url() ?>asset/template/depan.png" alt="">

                                                <div class="singkatan">

                                                </div>
                                                <div class="background">
                                                    &nbsp;
                                                </div>



                                                <div class="nama_depan">
                                                    <p><?= $data['nama'] ?></p>
                                                </div>


                                                <div class="nip_depan">
                                                    <p>NIP. <?= nip($data['nip']) ?></p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>


                                <div class="card-footer">


                                    <button class="btn btn-block btn-outline-primary" id="cetak_depan"> <i class="ft-file"></i>
                                        Cetak</button>
                                </div>




                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="row" style="margin-top : 400px">
                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label class="label_singkatan"><i>Ukuran Font Nama Instansi</i> : 55
                                        px</label>
                                    <input type="range" name="" value="55" id="singkatan" min="10" max="100" class="form-control">
                                </fieldset>
                            </div>
                        </div>
                        <div class="row" style="margin-top : 130px">
                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label class="label_foto"><i>Ukuran Foto</i> : 300 px</label>
                                    <input type="range" name="" value="300" id="foto" min="100" max="500" class="form-control">
                                </fieldset>
                            </div>
                        </div>
                        <div class="row" style="margin-top : 0px">
                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label class="label_fotoupdown"><i>Posisi Vertikal Foto</i> :</label>
                                    <input type="range" name="" value="600" id="fotoupdown" min="300" max="900" class="form-control">
                                </fieldset>

                            </div>
                        </div>
                        <div class="row" style="margin-top : 70px">
                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label class="label_nama_depan"><i>Ukuran Font Nama</i> : 40
                                        px</label>
                                    <input type="range" name="" value="40" id="nama_depan" min="10" max="60" class="form-control">
                                </fieldset>
                            </div>
                        </div>
                        <div class="row" style="margin-top : 0px">
                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label class="label_nip_depan"><i>Ukuran Font NIP</i> : 40 px</label>
                                    <input type="range" name="" value="40" id="nip_depan" min="10" max="60" class="form-control">
                                </fieldset>

                            </div>
                        </div>
                        <div class="row hide" style="margin-top : 0px">
                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label>Background</label>
                                    <select name="" id="background" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="#FE8409">Kuning</option>
                                        <option value="#9A9695">Abu - abu</option>
                                    </select>
                                </fieldset>

                            </div>
                        </div>

                        <!-- <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label class="label_foto"><i>Ukuran Foto</i> : 200 px</label>
                                                <input type="range" name="" value="200" id="foto" min="50" max="350"
                                                    class="form-control">
                                            </fieldset>

                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label class="label_fotoupdown"><i>Posisi Foto</i> :</label>
                                                <input type="range" name="" value="410" id="fotoupdown" min="350"
                                                    max="550" class="form-control">
                                            </fieldset>

                                        </div>



                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label class="label_nama_depan"><i>Ukuran Font Nama</i> : 27
                                                    px</label>
                                                <input type="range" name="" value="27" id="nama_depan" min="10"
                                                    max="100" class="form-control">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label class="label_nip_depan"><i>Ukuran Font NIP</i> : 22 px</label>
                                                <input type="range" name="" value="22" id="nip_depan" min="10" max="100"
                                                    class="form-control">
                                            </fieldset>
                                        </div>


                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1 hide">
                                            <fieldset class="form-group">
                                                <label>Background</label>
                                                <select name="" id="background" class="form-control">
                                                    <option value="">Pilih</option>
                                                    <option value="#FE8409">Kuning</option>
                                                    <option value="#9A9695">Abu - abu</option>
                                                </select>
                                            </fieldset>
                                        </div> -->
                        <!-- </div> -->

                    </div>

                    <div class="col-md-6">
                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">TAMPILAN BELAKANG</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <div id="belakang">


                                                <img class="template_belakang" src="<?= base_url() ?>asset/template/kkkkkkk.png" alt="">


                                                <div class="nama_belakang">
                                                    <p><?= $data['nama'] ?></p>
                                                </div>



                                                <div class="nip_belakang">
                                                    <p><?= nip($data['nip']) ?></p>
                                                </div>


                                                <div class="jabatan">
                                                    <p><?= $data['jabatan'] ?></p>
                                                </div>

                                                <div class="alamat">

                                                </div>

                                                <div class="goldar">
                                                    <p><?= $data['goldar'] ?></p>
                                                </div>

                                                <div class="dikeluarkan">
                                                    <p><?= tgl($data['tgl_dikeluarkan']) ?></p>
                                                </div>

                                            
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">


                                    <button class="btn btn-block btn-outline-primary" id="cetak_belakang"> <i class="ft-file"></i>
                                        Cetak</button>
                                </div>



                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="row">

                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1" style="margin-top:150px">
                                <fieldset class="form-group">
                                    <label class="label_nama_belakang"><i>Ukuran Font Nama</i> : 35
                                        px</label>
                                    <input type="range" name="" value="35" id="nama_belakang" min="10" max="50" class="form-control">
                                </fieldset>
                            </div>
                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="basicInput"><i>Posisi Vertikal Nama</i> :</label>
                                    <input type="range" name="" value="66" id="posisi_nama" min="50" max="100" class="form-control">
                                </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label class="label_jabatan"><i>Ukuran Font Jabatan</i> : 30
                                        px</label>
                                    <input type="range" name="" value="30" id="jabatan" min="10" max="50" class="form-control">
                                </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="basicInput"><i>Posisi Vertikal Jabatan </i>:</label>
                                    <input type="range" name="" value="248" id="posisi_jabatan" min="200" max="600" class="form-control">
                                </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label class="label_alamat"><i>Ukuran Font Alamat</i> : 30
                                        px</label>
                                    <input type="range" name="" value="30" id="alamat" min="10" max="50" class="form-control">
                                </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label><i>Posisi Vertikal Alamat</i> : </label>
                                    <input type="range" name="" value="425" id="posisi_alamat" min="300" max="600" class="form-control">
                                </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label><i>Posisi Horizontal Keseluruhan</i> : </label>
                                    <input type="range" name="" value="70" id="posisi_keseluruhan" min="30" max="120" class="form-control">
                                </fieldset>
                            </div>



                        </div>

                    </div>

                    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel1">Preview</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <div class="text-center" id="preview">
                                    </div>



                                </div>
                                <div class="modal-footer download">


                                </div>

                            </div>
                        </div>
                    </div>
            </section>
            <!-- Basic Inputs end -->



        </div>
    </div>
</div>