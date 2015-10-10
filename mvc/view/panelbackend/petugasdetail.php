
<?=$this->FlashMsg()?>
<div style="text-align:right">
<?php echo UI::showButtonMode($mode, $row[$pk])?>
</div>
<br/>
<table class="table table-form">
<tr><td class="td-label">Nama</td><td><?php echo UI::createTextBox('nama',$row['nama'],'','',$edited,'form-control')?></td></tr>
<tr><td class="td-label">Tgl. Lahir</td><td><?php echo UI::createTextDate('tgl_lahir',$row['tgl_lahir'],'','',$edited,'form-control')?></td></tr>
<tr><td class="td-label">Jenis Kelamin</td><td><?php echo UI::createSelect('jk',$jkarr,$row['jk'],$edited,'form-control')?></td></tr>
<tr><td class="td-label">Alamat</td><td><?php echo UI::createTextArea('alamat',$row['alamat'],'','',$edited,'form-control')?></td></tr>
<tr><td class="td-label">Telephone</td><td><?php echo UI::createTextBox('telp',$row['telp'],'','',$edited,'form-control')?></td></tr>

<?php if($edited){?>

<tr><td class="td-label">Username</td><td><?php echo UI::createTextBox('username',$row['username'],'','',$edited,$class='form-control')?></td></tr>

<?php if($row['id_petugas']){ ?>
<tr><td colspan="2">Kosongkan password apabila Anda tidak ingin merubahnya.</td></tr>
<?php } ?>

<tr><td class="td-label">Password</td><td><?php echo UI::createTextPassword('password','','','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">Confirm Password</td><td><?php echo UI::createTextPassword('confirmpassword','','','',$edited,$class='form-control')?></td></tr>

<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>