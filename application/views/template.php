<!-- /.navbar -->
<?php include "template/head_top.php"?>
<!-- Main Sidebar Container -->
<?php include "template/menu_top.php"?>

<?php echo $content; ?>

<?php include "template/footer.php"?>

<?php
    if(isset($jquery)){

        $this->load->view($jquery);
    }
?>
</body>

</html>