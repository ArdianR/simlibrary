
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
<td class="td-label"> Bahasa</td>
<td class="td-input"><?php echo UI::createSelect('id_bahasa',$bahasaarr,$row['id_bahasa'],$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Selang Waktu</td>
<td class="td-input"><?php echo UI::createTextBox('selang_waktu',$row['selang_waktu'],'','',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label"> Satuan</td>
<td class="td-input"><?php echo UI::createSelect('id_satuan',$satuanarr,$row['id_satuan'],$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>
<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>