<?php if($this->session->flashdata('success')) :?>
<script>
toastr.success('<?=$this->session->flashdata('success')?>');
</script>
<?php endif?>