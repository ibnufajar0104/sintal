<script src="<?=base_url()?>template/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?=base_url()?>template/app-assets/js/scripts/forms/select/form-select2.js"></script>

<script>
$(document).ready(function() {
    $('.hide, .ptt-alert-msg').hide();
    enabled();
});

// Helper untuk menampilkan notifikasi alert status
function showAlert(selector) {
    $('.ptt-alert-msg').hide();
    $(selector).css('display', 'flex').show();
}

function hideAlerts() {
    $('.ptt-alert-msg').hide();
}

// Tombol Update Simpeg Diklik
$('#tampilkan').click(function() {
    var nip = $('#nip').val().trim();

    if (nip == '') {
        showAlert('.required');
        disabled();
    } else {
        hideAlerts();
        var spinner = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mencari...';
        $('#tampilkan').html(spinner).prop('disabled', true);
        nip_cek(nip);
    }
});

// Cek apakah NIP bentrok dengan data PTT lain
function nip_cek(nip) {
    var form = $('#form').val() || 'edit';
    var id   = $('#id').val() || '';
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    $.ajax({
        url: "<?= site_url()?>app/nip_cek_ptt",
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
                showAlert('.sudah_ada');
                disabled();
                btn();
            } else {
                hideAlerts();
                get_data(nip);
            }
        },
        error: function() {
            showAlert('.tidak_ada_respon');
            disabled();
            btn();
            $(document).trigger('simpeg-error');
        },
        timeout: 10000
    });
}

// Ambil data pegawai terbaru dari Simpeg API
function get_data(nip) {
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    $.ajax({
        url: "<?= site_url()?>api/get_data",
        method: "POST",
        dataType: 'json',
        data: {
            [csrfName]: csrfHash,
            nip: nip,
        },
        success: function(data) {
            if (data.status && data.data && data.data.length > 0) {
                let row = data.data[0];
                showAlert('.ditemukan');
                $('#nama').val(row.nama);
                $('#jabatan').val(row.jabatan);
                if (row.goldar) {
                    $('#goldar').val(row.goldar);
                }
                alamat(row.instansi);
                id_instansi(row.instansi);
                enabled();
                btn();
                $(document).trigger('simpeg-success');
            } else {
                showAlert('.tidak_ditemukan');
                btn();
                $(document).trigger('simpeg-notfound');
            }
        },
        error: function() {
            showAlert('.tidak_ada_respon');
            btn();
            $(document).trigger('simpeg-error');
        },
        timeout: 12000
    });
}

// Cek realtime saat user mengetik NIP di mode edit
var nipTypingTimer;
$('#nip').on('input keyup', function() {
    clearTimeout(nipTypingTimer);
    var nip = $(this).val().trim();

    // Sembunyikan status simpeg saat NIP diubah
    $('.ditemukan, .tidak_ditemukan, .required, .tidak_ada_respon').hide();

    if (nip === '') {
        $('.sudah_ada').hide();
        disabled();
        return;
    }

    nipTypingTimer = setTimeout(function() {
        var form = $('#form').val() || 'edit';
        var id   = $('#id').val() || '';
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
            csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            url: "<?= site_url()?>app/nip_cek_ptt",
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
                    showAlert('.sudah_ada');
                    disabled();
                } else {
                    $('.sudah_ada').hide();
                    enabled();
                }
            }
        });
    }, 400);
});

// Dropdown instansi change -> ambil alamat
$('#id_skpd').change(function() {
    var id = $(this).val();
    if (!id) return;

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
            if (data && data.alamat) {
                $('#alamat').val(data.alamat);
            }
        }
    });
});

// Ambil alamat berdasarkan nama instansi dari Simpeg
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
            if (data && data.alamat) {
                $('#alamat').val(data.alamat);
            }
        }
    });
}

// Ambil id SKPD berdasarkan nama instansi dari Simpeg
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
                $('#id_skpd').val(data.data).trigger('change');
            }
        }
    });
}

function disabled() {
    $(':input[type="submit"], #btn-submit').prop('disabled', true);
}

function enabled() {
    $(':input[type="submit"], #btn-submit').prop('disabled', false);
}

function btn() {
    var html = '<i class="ft-refresh-cw" style="font-size:13px;"></i> Update Simpeg';
    $('#tampilkan').html(html).prop('disabled', false);
}
</script>
