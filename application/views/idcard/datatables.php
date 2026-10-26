  <!-- BEGIN: Page Vendor JS-->
  <script src="<?=base_url()?>template/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
  <!-- END: Page Vendor JS-->

  <script src="<?=base_url()?>template/app-assets/vendors/js/extensions/toastr.min.js"></script>
  <script src="<?=base_url()?>template/app-assets/js/scripts/extensions/toastr.js"></script>

  <?php $this->load->view('template/toast') ?>

  <script>
$(function() {
    $(".zero-configuration").DataTable({
        "responsive": false,
        "autoWidth": false,
        "searching": true,
        "info": false,
        'language': {
            "lengthMenu": "_MENU_  data per halaman",
            "zeroRecords": "Data tidak tersedia",
            "search": "Pencarian ",
            "infoEmpty": "Data tidak tersedia",

            'paginate': {
                "previous": "<",
                "next": ">",
            }
        }
    });

});
  </script>

  <script>
$('.hapus').click(function() {

    var id = $(this).data('id')
    $('#id').val(id);
});
  </script>