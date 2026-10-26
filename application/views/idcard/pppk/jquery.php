<script src="<?=base_url()?>template/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?=base_url()?>template/app-assets/js/scripts/forms/select/form-select2.js"></script>

<script>
$(document).ready(function() {
    $('.hide').hide();

});

$('#tampilkan').click(function() {

    if ($('#nip').val() == '') {
        $('.required').show();
    } else {
        $('.hide').hide();

        var nip = $('#nip').val();
        nip_cek(nip);

    }


});

function nip_cek(nip) {

    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    var data;

    $.ajax({

        url: "<?= site_url()?>app/nip_cek_p3k",
        method: "POST",
        dataType: 'json',
        data: {
            [csrfName]: csrfHash,

            nip: nip,

        },

        success: function(data) {
            $('.tidak_ada_respon').hide();

            if (data == 1) {
                $('.sudah_ada').show();
                disabled();
            } else {
                $('.hide').hide();
                enabled();
                get_data(nip);
            }

        },
        error: function() {
            $('.tidak_ada_respon').show();
            disabled();
        },
        timeout: 10000

    });

    return data;
}


function get_data(nip) {

    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    $.ajax({

        url: "<?= site_url()?>api/get_data",
        method: "POST",
        dataType: 'json',
        beforeSend: function() {
            var spinner =
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            $('#tampilkan').html(spinner);
        },
        data: {
            [csrfName]: csrfHash,
            nip: nip,

        },
        success: function(data) {


            if (data.status) {

                let row = data.data;
                $('.hide').hide();
                $('#nama').val(row[0].nama);
                $('#jabatan').val(row[0].jabatan);
                alamat(row[0].instansi);
                id_instansi(row[0].instansi);
                enabled();
            } else {
                $('.tidak_ditemukan').show();
                disabled();
                btn();
            }




        },


    });
}


$('#nip').keyup(function() {

    var form = $('#form').val();
    var id = $('#id').val();
    var nip = $(this).val();


    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    $.ajax({

        url: "<?= site_url()?>app/nip_cek_p3k",
        method: "POST",
        dataType: 'json',
        data: {
            [csrfName]: csrfHash,


            form: form,
            id: id,
            nip: nip,

        },

        success: function(data) {


            if (data == 1) {
                $('.sudah_ada').show();
                disabled();
            } else {
                $('.hide').hide();
                enabled();

            }

        },


    })





});

$('#id_skpd').change(function() {

    var id = $(this).val();

    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';



    $.ajax({

        url: "<?= site_url()?>app/get_alamat_by_id",
        method: "POST",
        dataType: 'json',
        data: {
            [csrfName]: csrfHash,


            id: id,

        },

        success: function(data) {

            $('#alamat').val(data.alamat);

        }




    })

});

function alamat(unitkerja) {

    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    $.ajax({

        url: "<?= site_url()?>app/get_alamat",
        method: "POST",
        dataType: 'json',
        data: {
            [csrfName]: csrfHash,


            unitkerja: unitkerja,

        },

        success: function(data) {

            $('#alamat').val(data.alamat);
            enabled();
            btn();

        }




    })
}

function id_instansi(str) {

    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    $.ajax({

        url: "<?= site_url()?>app/get_id_instansi",
        method: "POST",
        dataType: 'json',
        data: {
            [csrfName]: csrfHash,

            nama_skpd: str,
        },

        success: function(data) {


            if (data.status) {
                $('#id_skpd').val(data.data);
              
            }

        }




    })
}





function disabled() {
    $(':input[type="submit"]').prop('disabled', true);

}

function btn() {

    var html = '<i class="ft-list"></i> Tampilkan';
    $('#tampilkan').html(html);
}


function enabled() {
    $(':input[type="submit"]').prop('disabled', false);
}
</script>