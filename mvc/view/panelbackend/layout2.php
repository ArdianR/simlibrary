            <div>
                <div class="pageone-panel panel panel-default">
                    <div class="panel-heading">
<?php  if(count($_SESSION[SESSION_APP]['loginas'])){ ?>
        <br/>
<div class="alert alert-warning">
Anda sedang mengakses user lain. <a href="<?=URL::Base("panelbackend/home/loginasback")?>" class="alert-link">Kembali</a>.
</div>
<?php }?>
                        <h3 style="text-align:center"><?=$page_title?></h3>
                    </div>
                    <div class="panel-body main-content">
                        <?php echo $content1;?>
                    </div>
                </div>
            </div>