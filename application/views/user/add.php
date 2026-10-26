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
                            <?= form_open_multipart('','class="form"')?>

                            <div class="card-header">
                                <h4 class="card-title"><?=$judul?></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Nama</label>
                                                <input type="text" name="nama" id="nama" class="form-control" required>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Username</label>
                                                <input type="text" name="username" id="username" class="form-control"
                                                    required>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Password</label>
                                                <input type="password" name="password" id="password"
                                                    class="form-control" required>
                                                <p class=" text-danger length hide">* Minimal 8 karakter
                                                </p>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Konfirmasi Password</label>
                                                <input type="password" name="konfirmasi" id="konfirmasi"
                                                    class="form-control" required>
                                                <p class=" text-danger konfirmasi hide">* Konfirmasi password tidak sama
                                                </p>
                                            </fieldset>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="<?= site_url('user')?>"> <button type="button"
                                        class="btn btn-outline-danger"><i class="fa fa-times"></i>
                                        Batal</button></a>
                                <button type="submit" class="btn btn-outline-success submit"><i class="ft-save"></i>
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