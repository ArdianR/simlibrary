
<?=$this->FlashMsg()?>
<div style="text-align:right">
<?php echo UI::showButtonMode($mode, $row[$pk])?>
</div>
        <br/>
<table class="table table-form">
<tr><td class="td-label">Nama</td><td><?php echo UI::createTextBox('nama',$row['nama'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">Alamat</td><td><?php echo UI::createTextArea('alamat',$row['alamat'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">No. Identitas</td><td><?php echo UI::createTextBox('no_identitas',$row['no_identitas'],17,17,$edited,$class='form-control',"style='width:auto'")?></td></tr>
<tr><td class="td-label">No. Hp</td><td><?php echo UI::createTextBox('no_hp',$row['no_hp'],15,15,$edited,$class='form-control',"style='width:auto'")?></td></tr>
<tr><td class="td-label">Email</td><td><?php echo UI::createTextBox('email',$row['email'],35,35,$edited,$class='form-control',"style='width:auto'")?></td></tr>

<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>