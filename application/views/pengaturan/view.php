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
                                                <th>Pengaturan</th>
                                                <th>Value</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no =1?>
                                            <?php foreach($data as $key => $row) :?>
                                            <tr>
                                                <td><?=$no?>.</td>
                                                <td class="text-center">
                                                    <button data-key="<?=$key?>" data-tipe='<?=$row['multitype']?>'
                                                        class="btn btn-sm btn-outline-success modal_edit"
                                                        data-toggle="modal" data-target="#default"><i
                                                            class="ft-edit"></i></button>
                                                </td>
                                                <td><?=$row['title']?></td>
                                                <td>
                                                    <?php if($row['multitype'] == 'file'):?>
                                                    <img width="200" src="<?=$row['value']?>" alt="">
                                                    <?php else :?>
                                                    <?= $row['value']?>
                                                    <?php endif?>
                                                </td>


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
                                <h4 class="modal-title" id="myModalLabel1">Edit <?=$judul;?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?= form_open_multipart(site_url('pengaturan/update'))?>
                            <div class="modal-body">

                                <input type="hidden" name="key" id="key" class="form-control">
                                <div id="form"></div>






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