
<?=$this->FlashMsg()?>
<div style="text-align:right">
<?php echo UI::showButtonMode($mode, $row[$pk])?>
</div>
<br/>
<table class="table table-form">
<tr>
<td class="td-label">Kode Klasifikasi</td>
<td class="td-input"><?php echo UI::createTextBox('kode_klasifikasi',$row['kode_klasifikasi'],'50','50',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label"> Type Subjek</td>
<td class="td-input"><?php echo UI::createSelect('id_type_subjek',$typesubjekarr,$row['id_type_subjek'],$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Daftar Terkendali</td>
<td class="td-input"><?php echo UI::createTextBox('daftar_terkendali',$row['daftar_terkendali'],'50','50',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>
<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>