
<?=$this->FlashMsg()?>
<div style="text-align:right">
<?php echo UI::showButtonMode($mode, $row[$pk])?>
</div>
<br/>
<table class="table table-form">
<tr>
<td class="td-label">Kode Bahasa</td>
<td class="td-input"><?php echo UI::createTextBox('kode_bahasa',$row['kode_bahasa'],'10','10',$edited,$class='form-control ',"style='width:100px'")?></td>
</tr>

<tr>
<td class="td-label">Bahasa</td>
<td class="td-input"><?php echo UI::createTextBox('bahasa',$row['bahasa'],'50','50',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>
<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>