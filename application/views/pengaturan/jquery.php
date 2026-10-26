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

    var key = $(this).data('key');
    var tipe = $(this).data('tipe');




    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';


    $.ajax({

        url: "<?= site_url()?>pengaturan/form",
        method: "POST",
        dataType: 'html',

        data: {
            [csrfName]: csrfHash,
            key: key,
            tipe: tipe,

        },
        success: function(data) {

            $('#key').val(key);
            $('#form').html(data);




        }
    })
});
  </script>

  <script>
var output1;
var output2;

function AB(d1, d2, gr1, gr2) {

    var y = sin(radians(d1 - d2));
    output1.value = y.toFixed(2)

    var x = cos(radians(d1 + d2)) + (gr1 / gr2);
    output2.value = x.toFixed(2);

    var angle = Math.atan2(y, x);

    if (angle < 0.0) {
        angel += 2.0 * Math.PI;

        return (180 / Math.PI) * angle;
    }


}
  </script>