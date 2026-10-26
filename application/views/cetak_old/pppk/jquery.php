<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"> </script>

<script>
$('#singkatan').change(function() {

    var val = $(this).val();
    $('.singkatan').css(
        'font-size', val + 'px'
    );

    var html = '<i>Ukuran Font Nama Instansi</i> : ' + val + ' px';
    $('.label_singkatan').html(html);


});

$('#foto').change(function() {

    var val = $(this).val();
    $('.foto').css(
        'width', val + 'px'
    );


    var html = '<i>Ukuran Foto</i> : ' + val + ' px';
    $('.label_foto').html(html);
});

$('#fotoupdown').change(function() {

    var val = $(this).val();
    $('.foto').css(
        'top', val + 'px'
    );


});

$('#nama_depan').change(function() {

    var val = $(this).val();
    $('.nama_depan').css(
        'font-size', val + 'px'
    );

    var html = '<i>Ukuran Font Nama</i> : ' + val + ' px';
    $('.label_nama_depan').html(html);
});

$('#nip_depan').change(function() {

    var val = $(this).val();
    $('.nip_depan').css(
        'font-size', val + 'px'
    );

    var html = '<i>Ukuran Font NIP</i> : ' + val + ' px';
    $('.label_nip_depan').html(html);
});

$('#nama_belakang').change(function() {

    var val = $(this).val();
    $('.nama_belakang').css(
        'font-size', val + 'px'
    );

    var html = '<i>Ukuran Font Nama</i> : ' + val + ' px';
    $('.label_nama_belakang').html(html);
});


$('#posisi_nama').change(function() {

    var val = $(this).val();
    $('.nama_belakang').css(
        'top', val + 'px'
    );
});


$('#nip_belakang').change(function() {

    var val = $(this).val();
    $('.nip_belakang').css(
        'font-size', val + 'px'
    );
});



$('#jabatan').change(function() {

    var val = $(this).val();
    $('.jabatan').css(
        'font-size', val + 'px'
    );

    var html = '<i>Ukuran Font Jabatan</i> : ' + val + ' px';
    $('.label_jabatan').html(html);
});


$('#posisi_jabatan').change(function() {

    var val = $(this).val();
    $('.jabatan').css(
        'top', val + 'px'
    );
});


$('#alamat').change(function() {

    var val = $(this).val();
    $('.alamat').css(
        'font-size', val + 'px'
    );

    var html = '<i>Ukuran Alamat</i> : ' + val + ' px';
    $('.label_alamat').html(html);
});


$('#posisi_alamat').change(function() {

    var val = $(this).val();
    $('.alamat').css(
        'top', val + 'px'
    );
});

$('#goldar').change(function() {

    var val = $(this).val();
    $('.goldar').css(
        'font-size', val + 'px'
    );
});

$('#dikeluarkan').change(function() {

    var val = $(this).val();
    $('.dikeluarkan').css(
        'font-size', val + 'px'
    );
});

$('#posisi_keseluruhan').change(function() {

    var val = $(this).val();

    $('.nama_belakang').css(
        'left', val + '%'
    );

    $('.nip_belakang').css(
        'left', val + '%'
    );

    $('.jabatan').css(
        'left', val + '%'
    );


    $('.alamat').css(
        'left', val + '%'
    );


    $('.goldar').css(
        'left', val + '%'
    );


    $('.dikeluarkan').css(
        'left', val + '%'
    );
});

$(document).ready(function() {

    get_data();
    $('.hide').hide();
})

function get_data() {


    var nip = $('#nip_api').val();
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    $.ajax({

        url: "<?= site_url()?>api_pns/get_by_nip",
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



            if (data.length === 0) {} else {


                console.log(data);
                $('.jabatan').html('<p>' + data[0].jabatan + '</p>');
                alamat(data[0].unitkerja);
                background(data[0].eselon);
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

            console.log(data);
            $('.alamat').html(' <p>' + data.alamat + '</p>');
            $('.singkatan').html(' <p>' + data.singkatan + '</p>');


        }




    })
}

function background(str) {
    str = str.slice(0, -3);
    if (str == 'II') {

        $('.background').css(
            'background-color', '#940000'
        );
    } else if (str == 'III') {
        $('.background').css(
            'background-color', '#0901A2'
        );
    } else if (str == 'IV') {
        $('.background').css(
            'background-color', '#197603'
        );
    } else {

        $('.hide').show();
    }
}

$('#background').change(function() {

    var val = $(this).val();
    $('.background').css(
        'background-color', val
    );

});

$('#cetak_depan').click(function() {

    var id = $('#id_asn').val();
    var file_name = $('#id_card_depan').val();

    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    var url = '<?=site_url()?>' + 'cetak/idcard/pppk/depan/' + id;

    window.scrollTo(0, 0);
    html2canvas(document.getElementById('depan')).then(function(canvas) {
        var base64URL = canvas.toDataURL('image/jpeg').replace('image/jpeg', 'image/octet-stream');

        // AJAX request
        $.ajax({
            url: "<?= site_url()?>cetak/save_image",
            type: 'post',
            data: {
                [csrfName]: csrfHash,

                image: base64URL,
                file_name: file_name
            },
            success: function(data) {
                preview(canvas, file_name, 'depan');

            }
        });
    });
})

$('#cetak_belakang').click(function() {
    var id = $('#id_asn').val();

    var file_name = $('#id_card_belakang').val();
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    var url = '<?=site_url()?>' + 'cetak/idcard/pppk/belakang/' + id;

    window.scrollTo(0, 0);
    html2canvas(document.getElementById('belakang')).then(function(canvas) {
        // Get base64URL
        var base64URL = canvas.toDataURL('image/jpeg').replace('image/jpeg', 'image/octet-stream');

        // AJAX request
        $.ajax({
            url: "<?= site_url()?>cetak/save_image",
            type: 'post',
            data: {
                [csrfName]: csrfHash,
                image: base64URL,
                file_name: file_name
            },
            success: function(data) {
                preview(canvas, file_name, 'belakang')
            }
        });
    });


});


function preview(canvas, file_name, bagian) {


    // alert(file_name);
    // return false;
    url = '<?=base_url()?>' + file_name;
    url2 = '<?=site_url('cetak/idcard/pppk/')?>' + bagian + '/' + '<?= $this->uri->segment(3)?>';
    html =
        '  <button type="button" class="btn grey btn-outline-danger" data-dismiss="modal">Tutup</button> <a href="' +
        url2 +
        '" target="_blank" class="btn btn-outline-success"><i class="ft-printer"></i> Print</a>' +
        '<a href="' +
        url +
        '" class="btn btn-outline-success" download><i class="ft-download"></i> Download</a>';

    $('.download').html(html);
    $('#preview').html(canvas);
    $('#default').modal('show');


    // window.open(url);
}
</script>