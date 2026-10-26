  <!-- BEGIN: Page Vendor JS-->
  <script src="<?=base_url()?>template/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
  <!-- END: Page Vendor JS-->

  <script src="<?=base_url()?>template/app-assets/vendors/js/extensions/toastr.min.js"></script>
  <script src="<?=base_url()?>template/app-assets/js/scripts/extensions/toastr.js"></script>

  <?php $this->load->view('template/toast') ?>

  <script>
$(function() {
    $(".zero-configuration").DataTable({
        "responsive": true,
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
$('.modal_edit').click(function() {

    var id_skpd = $(this).data('id');


    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';


    $.ajax({

        url: "<?= site_url()?>instansi/get_by_id",
        method: "POST",
        dataType: 'json',

        data: {
            [csrfName]: csrfHash,
            id_skpd: id_skpd,

        },
        success: function(data) {


            console.log(data);
            $('#id_skpd').val(data.id_skpd);
            $('#nama_skpd').val(data.nama_skpd);
            $('#alamat').val(data.alamat);
            $('#singkatan').val(data.singkatan);


        }
    })
});

// $("#singkatan").on({
//     keydown: function(e) {
//         if (e.which === 32)
//             return false;
//     },
//     keyup: function() {
//         this.value = this.value.toUpperCase();
//     },
//     change: function() {
//         this.value = this.value.replace(/\s/g, "");

//     }
// });
  </script>