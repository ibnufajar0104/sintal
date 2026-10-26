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
$(document).ready(function() {

    $('.hide').hide();
});


$("#username").on({
    keydown: function(e) {
        if (e.which === 32)
            return false;
    },
    keyup: function() {
        this.value = this.value.toLowerCase();
    },
    change: function() {
        this.value = this.value.replace(/\s/g, "");

    }
});

$('.form').submit(function(en) {

    var pw = $('#password').val();
    var konfir = $('#konfirmasi').val();

    if (pw.length >= 8) {
        $('.hide').hide();
        if (pw == konfir) {

            $('.hide').hide();

        } else {
            $('.konfirmasi').show();
            en.preventDefault();
            return false;

        }
    } else {


        $('.length').show();
        en.preventDefault();
        return false;
    }

})


$('.modal_edit').click(function() {

    var id_user = $(this).data('id');


    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';


    $.ajax({

        url: "<?= site_url()?>user/get_by_id",
        method: "POST",
        dataType: 'json',

        data: {
            [csrfName]: csrfHash,
            id_user: id_user,

        },
        success: function(data) {


            console.log(data);
            $('#id_user').val(data.id_user);
            $('#nama').val(data.nama);
            $('#username').val(data.username);



        }
    })
});


$('.hapus').click(function() {

    var id = $(this).data('id')
    $('#id').val(id);
});
  </script>