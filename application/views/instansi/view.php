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
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?=$judul?></h4>

                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">

                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">

                                <div class="card-body card-dashboard">

                                    <table class="table table-hover table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th width="20">No.</th>
                                                <th width="60">Aksi</th>
                                                <th width="550">Instansi</th>
                                                <th>Singkatan</th>
                                                <th>Alamat</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no =1?>
                                            <?php foreach($data as $row) :?>
                                            <tr>
                                                <td><?=$no?>.</td>
                                                <td class="text-center">
                                                    <button data-id="<?=$row['id_skpd']?>"
                                                        data-nama-skpd="<?=$row['nama_skpd']?>"
                                                        class="btn btn-sm btn-outline-success modal_edit"
                                                        data-toggle="modal" data-target="#default"><i
                                                            class="ft-edit"></i></button>
                                                </td>
                                                <td><?=$row['nama_skpd']?></td>
                                                <td><?=$row['singkatan']?></td>
                                                <td><?=$row['alamat']?></td>


                                            </tr>
                                            <?php $no++?>
                                            <?php endforeach?>



                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">Edit Data <?=$judul;?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?= form_open(site_url('instansi/update'))?>
                            <div class="modal-body">

                                <input type="hidden" name="id_skpd" id="id_skpd" class="form-control">

                                <fieldset class="form-group">
                                    <label for="basicInput">Instansi</label>


                                    <textarea name="nama_skpd" id="nama_skpd" class="form-control" rows="5"
                                        placeholder="wajib diisi" required></textarea>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="basicInput">Singkatan</label>
                                    <textarea name="singkatan" id="singkatan" class="form-control" rows="5"
                                        placeholder="wajib diisi" required></textarea>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="basicInput">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="5"
                                        placeholder="wajib diisi" required></textarea>
                                </fieldset>


                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn grey btn-outline-danger"
                                    data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-outline-success">Simpan</button>
                            </div>
                            <?= form_close()?>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Zero configuration table -->




        </div>
    </div>
</div>