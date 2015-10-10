
<?=$this->FlashMsg()?>
<div style="text-align:right">
<?php echo UI::showButtonMode($mode, $row[$pk])?>
</div>
        <br/>
<table class="table table-form">
<tr><td class="td-label">Nama</td><td><?php echo UI::createAutoComplate('id_member',$row['member'],'panelbackend/ajax/member','','',$edited,'form-control')?></td></tr>
<tr><td class="td-label">Tgl. Pinjam</td><td><?php echo UI::createTextDate('tgl_pinjam',$row['tgl_pinjam'],7,7,$edited,'form-control datepicker',"style='width:auto'")?></td></tr>
<tr><td class="td-label">Tgl. Kembali</td><td><?php echo UI::createTextDate('tgl_kembali',$row['tgl_kembali'],7,7,$edited,'form-control datepicker',"style='width:auto'")?></td></tr>
<tr><td class="td-label">Jaminan</td><td><?php echo UI::createTextBox('jaminan',$row['jaminan'],15,15,$edited,'form-control',"style='width:auto'")?></td></tr>
<tr><td class="td-label">Kode Jaminan</td><td><?php echo UI::createTextBox('kode_jaminan',$row['kode_jaminan'],15,15,$edited,'form-control',"style='width:auto'")?></td></tr>
<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>