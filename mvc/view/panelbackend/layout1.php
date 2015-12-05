
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
<?php  if(count($_SESSION[SESSION_APP]['loginas'])){ ?>
        <br/>
<div class="alert alert-warning">
Anda sedang mengakses user lain. <a href="<?=URL::Base("panelbackend/home/loginasback")?>" class="alert-link">Kembali</a>.
</div>
<?php }?>
            <h1 class="page-header"><?=$page_title?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row main-content">
        <?php echo $content1;?>
    </div>
</div>
        <!-- /#page-wrapper -->