
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
<td class="td-label">Lampiran Berkas</td>
<td class="td-input"><?php echo UI::createTextBox('lampiran_berkas',$row['lampiran_berkas'],'100','100',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Deskripsi Label</td>
<td class="td-input"><?php echo UI::createTextBox('deskripsi_label',$row['deskripsi_label'],'50','50',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>
<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>