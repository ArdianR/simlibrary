
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
<td class="td-label">Tahun Lahir</td>
<td class="td-input"><?php echo UI::createTextBox('tahun_lahir',$row['tahun_lahir'],'','',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label"> Kepengarangan</td>
<td class="td-input"><?php echo UI::createSelect('id_kepengarangan',$kepengaranganarr,$row['id_kepengarangan'],$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Daftar Terkendali</td>
<td class="td-input"><?php echo UI::createTextBox('daftar_terkendali',$row['daftar_terkendali'],'','',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>
<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>