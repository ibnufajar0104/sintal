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

        url: "<?= site_url()?>app/nip_cek",
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

        url: "<?= site_url()?>api/get_by_nip",
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



            if (data.length === 0) {

                $('.tidak_ditemukan').show();
                disabled();
                btn();

            } else {
                $('.hide').hide();
                $('#nama').val(data[0].nama);
                $('#instansi').val(data[0].instansi);
                $('#jabatan').val(data[0].jabatan);
                $('#eselon').val(data[0].eselon);
                alamat(data[0].instansi);
                enabled();



            }



        },


    });
}

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

function btn() {

    var html = '<i class="ft-list"></i> Tampilkan';
    $('#tampilkan').html(html);
}

function disabled() {
    $(':input[type="submit"]').prop('disabled', true);

}

function enabled() {
    $(':input[type="submit"]').prop('disabled', false);
}
</script>