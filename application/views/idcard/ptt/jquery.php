<script src="<?=base_url()?>template/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?=base_url()?>template/app-assets/js/scripts/forms/select/form-select2.js"></script>

<script>
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
</script>