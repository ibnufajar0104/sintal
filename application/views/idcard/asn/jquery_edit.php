<script>
$(document).ready(function() {
    get_data();
});





function get_data() {

    var nip = $('#nip').val();
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    $.ajax({

        url: "<?= site_url()?>api/get_by_nip",
        method: "POST",
        dataType: 'json',
        // beforeSend: function() {
        //     var spinner =
        //         '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        //     $('#tampilkan').html(spinner);
        // },
        data: {
            [csrfName]: csrfHash,
            nip: nip,

        },
        success: function(data) {



            if (data.length === 0) {



            } else {
                $('#nama').val(data[0].nama);
                $('#instansi').val(data[0].instansi);
                $('#jabatan').val(data[0].jabatan);
                $('#eselon').val(data[0].eselon);
                alamat(data[0].instansi);
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


        }




    })
}
</script>