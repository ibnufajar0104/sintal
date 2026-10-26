  <!-- BEGIN: Page Vendor JS-->
  <script src="<?= base_url() ?>template/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
  <!-- END: Page Vendor JS-->

  <script src="<?= base_url() ?>template/app-assets/vendors/js/extensions/toastr.min.js"></script>
  <script src="<?= base_url() ?>template/app-assets/js/scripts/extensions/toastr.js"></script>

  <?php $this->load->view('template/toast') ?>

  <script>
$(function() {
    datatable();

});


function datatable() {


    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    $('.zero-configuration').DataTable({
        responsive: false,
        autoWidth: false,
        searching: true,
        info: false,
        paginate: true,
        bDestroy: true,
        ordering: false,
        bPaginate: true,
        language: {
            lengthMenu: "_MENU_  data per halaman",
            zeroRecords: "Data tidak tersedia",
            search: "Pencarian ",
            infoEmpty: "Data tidak tersedia",
            paginate: {
                "previous": "<",
                "next": ">",
            }
        },

        stateSave: true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        order: [], //Initial no order.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: "<?= site_url('idcard/get_data') ?>",
            type: "POST",
            data: {
                [csrfName]: csrfHash

            },

        },
        //Set column definition initialisation properties.
        columnDefs: [{
            targets: [0], //first column / numbering column
            orderable: false, //set not orderable
        }, ],
    });

}

function hapus(id) {

    $('#form-delete').modal('show');
    $('#id').val(id);
}
  </script>