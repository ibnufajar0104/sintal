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
                    <div class="col-md-6">
                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">TAMPILAN DEPAN</h4>
                                <input type="hidden" name="" id="id" value="<?=$data['id_ptt']?>">
                                <input type="hidden" name="" id="id_card_depan" value="<?=$data['id_card_depan']?>">
                                <input type="hidden" name="" id="id_card_belakang"
                                    value="<?=$data['id_card_belakang']?>">
                                <!-- <input type="hidden" name="" id="nip_api" value="<?=$data['nip']?>"> -->
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1 text-center">
                                            <div id="depan">
                                                <div class="foto">
                                                    <img src="<?=base_url().$data['foto']?>" alt="">
                                                </div>


                                                <div class="template_depan">
                                                    <img src="<?=base_url()?>asset/template/depan.png" alt=""
                                                        width="400">
                                                </div>
                                                <div class="singkatan">
                                                    <p><?=$data['singkatan']?></p>
                                                </div>
                                                <div class="background">
                                                    &nbsp;
                                                </div>



                                                <div class="nama_depan">
                                                    <p><?=$data['nama']?></p>
                                                </div>


                                                <!-- <div class="nip_depan">
                                                    <p>NIP. <?=nip($data['nip'])?></p>
                                                </div> -->
                                            </div>


                                        </div>
                                    </div>
                                </div>


                                <div class="card-footer">


                                    <button class="btn btn-block btn-outline-primary" id="cetak_depan"> <i
                                            class="ft-file"></i>
                                        Cetak</button>
                                </div>




                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">KONFIGURASI TAMPILAN DEPAN</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label class="label_singkatan"><i>Ukuran Font Nama Instansi</i> : 45
                                                    px</label>
                                                <input type="range" name="" value="45" id="singkatan" min="10" max="100"
                                                    class="form-control">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
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

                                        <!-- <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label class="label_nip_depan"><i>Ukuran Font NIP</i> : 22 px</label>
                                                <input type="range" name="" value="22" id="nip_depan" min="10" max="100"
                                                    class="form-control">
                                            </fieldset>
                                        </div> -->


                                    </div>
                                </div>



                            </div>
                        </div>

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

                                                <div class="template_belakang">
                                                    <img src="<?=base_url()?>asset/template/belakang-2.png" alt=""
                                                        width="400">
                                                </div>

                                                <div class="nama_belakang">
                                                    <p><?=$data['nama']?></p>
                                                </div>



                                                <!-- <div class="nip_belakang">
                                                    <p><?=nip($data['nip'])?></p>
                                                </div> -->


                                                <div class="jabatan">
                                                    <p><?=$data['jabatan']?></p>
                                                </div>

                                                <div class="alamat">
                                                    <p><?=$data['alamat']?></p>
                                                </div>

                                                <div class="goldar">
                                                    <p><?=$data['goldar']?></p>
                                                </div>

                                                <div class="dikeluarkan">
                                                    <p><?=tgl($data['tgl_dikeluarkan'])?></p>
                                                </div>

                                                <div class="ttd">
                                                    <img src="<?=base_url().$pengaturan['scan-ttd']['value']?>" alt="">
                                                </div>

                                                <div class="nama_bupati">
                                                    <p><?=$pengaturan['nama-bupati']['value']?></p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">


                                    <button class="btn btn-block btn-outline-primary" id="cetak_belakang"> <i
                                            class="ft-file"></i>
                                        Cetak</button>
                                </div>



                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">KONFIGURASI TAMPILAN BELAKANG</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label class="label_nama_belakang"><i>Ukuran Font Nama</i> : 18
                                                    px</label>
                                                <input type="range" name="" value="18" id="nama_belakang" min="10"
                                                    max="100" class="form-control">
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput"><i>Posisi Nama</i> :</label>
                                                <input type="range" name="" value="90" id="posisi_nama" min="80"
                                                    max="100" class="form-control">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label class="label_jabatan"><i>Ukuran Font Jabatan</i> : 15 px</label>
                                                <input type="range" name="" value="15" id="jabatan" min="10" max="100"
                                                    class="form-control">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput"><i>Posisi Jabatan </i>:</label>
                                                <input type="range" name="" value="148" id="posisi_jabatan" min="100"
                                                    max="210" class="form-control">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label class="label_alamat"><i>Ukuran Font Alamat</i> : 15 px</label>
                                                <input type="range" name="" value="15" id="alamat" min="10" max="100"
                                                    class="form-control">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label><i>Posisi Alamat</i> : </label>
                                                <input type="range" name="" value="202" id="posisi_alamat" min="180"
                                                    max="300" class="form-control">
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label><i>Posisi Keseluruhan</i> : </label>
                                                <input type="range" name="" value="70" id="posisi_keseluruhan" min="40"
                                                    max="90" class="form-control">
                                            </fieldset>
                                        </div>



                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>

                    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel1" aria-hidden="true">
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
                                <div class="modal-footer justify-content-between download">


                                </div>

                            </div>
                        </div>
                    </div>
            </section>
            <!-- Basic Inputs end -->



        </div>
    </div>
</div>