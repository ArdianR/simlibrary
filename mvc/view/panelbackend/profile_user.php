
<?=$this->FlashMsg()?>
        <br/>
<table class="table table-form">
<tr><td class="td-label">Nama</td><td><?php echo UI::createTextBox('nama',$row['nama'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">Alamat</td><td><?php echo UI::createTextArea('alamat',$row['alamat'],'','',$edited,'form-control')?></td></tr>
<tr><td class="td-label">Telephone</td><td><?php echo UI::createTextBox('telp',$row['telp'],'','',$edited,'form-control')?></td></tr>
<tr><td class="td-label">Username</td><td><?php echo UI::createTextBox('username',$row['username'],'','',$edited,$class='form-control')?></td></tr>
<?php if($edited){ ?>
<tr><td></td><td>Kosongkan password apabila Anda tidak ingin merubahnya</td></tr>
<tr><td class="td-label">Password</td><td><?php echo UI::createTextPassword('password','','','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">Confirm Password</td><td><?php echo UI::createTextPassword('confirmpassword','','','',$edited,$class='form-control')?></td></tr>
<?php } ?>
<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>