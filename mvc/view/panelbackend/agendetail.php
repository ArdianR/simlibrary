
<?=$this->FlashMsg()?>
<div style="text-align:right">
<?php echo UI::showButtonMode($mode, $row[$pk])?>
</div>
<br/>
<table class="table table-form">
<tr>
<td class="td-label">Nama</td>
<td class="td-input"><?php echo UI::createTextBox('nama',$row['nama'],'50','50',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Alamat</td>
<td class="td-input"><?php echo UI::createTextBox('alamat',$row['alamat'],'100','100',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Kontak</td>
<td class="td-input"><?php echo UI::createTextBox('kontak',$row['kontak'],'100','100',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Tlp</td>
<td class="td-input"><?php echo UI::createTextBox('tlp',$row['tlp'],'100','100',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Faks</td>
<td class="td-input"><?php echo UI::createTextBox('faks',$row['faks'],'100','100',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">No Akun</td>
<td class="td-input"><?php echo UI::createTextBox('no_akun',$row['no_akun'],'100','100',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>
<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>