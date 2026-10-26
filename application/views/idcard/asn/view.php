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
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= $judul ?></h4>

                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <div class="btn-group">
                                            <a href="<?= site_url() ?>idcard/add/asn" class="btn btn-outline-primary"><i
                                                    class="ft-plus"></i>
                                                Tambah</a>

                                            <a href="" class="btn btn-outline-warning"> <i class="ft-refresh-cw"></i>
                                                Refresh</a>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">

                                <div class="card-body card-dashboard">

                                    <div class="table-responsive">
                                        <table class="table table-borderless table-stripped zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th></th>
                                                    <th>Foto</th>
                                                    <th>NIP</th>
                                                    <th>Nama</th>
                                                    <th>Jabatan</th>
                                                    <!-- <th>Eselon</th> -->
                                                    <th>Instansi</th>
                                                    <th>Golongan Darah</th>
                                                    <th>Tanggal Dikeluarkan</th>
                                                    <!-- <th>Alamat Kantor</th> -->

                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade text-left" id="form-delete" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">Hapus <?= $judul; ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?= form_open(site_url('idcard/delete/asn')) ?>
                            <div class="modal-body">

                                <input type="hidden" name="id" id="id">
                                <p>Yakin Ingin Menghapus Data ?</p>


                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn grey btn-outline-secondary"
                                    data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-outline-danger">Hapus</button>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Zero configuration table -->




        </div>
    </div>
</div>