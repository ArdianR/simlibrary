
<?=$this->FlashMsg()?>
<div style="text-align:right">
<?php echo UI::showButtonMode($mode, $row[$pk])?>
</div>
<br/>
<table class="table table-form">
<tr><td class="td-label">Judul</td><td><?php echo UI::createTextBox('nama',$row['nama'],'','',$edited,'form-control')?></td></tr>
<tr><td class="td-label">Penulis</td><td><?php echo UI::createTextBox('penulis',$row['penulis'],'','',$edited,'form-control')?></td></tr>
<tr><td class="td-label">Penerbit</td><td><?php echo UI::createTextBox('penerbit',$row['penerbit'],'','',$edited,'form-control')?></td></tr>
<tr><td class="td-label">ISBN</td><td><?php echo UI::createTextBox('isbn',$row['isbn'],20,20,$edited,'form-control',"style='width:auto'")?></td></tr>
<tr><td class="td-label">Deskripsi</td><td><?php echo UI::createTextArea('deskripsi',$row['deskripsi'],'','',$edited,'form-control')?></td></tr>
<tr><td class="td-label">Lokasi</td><td><?php echo UI::createSelect('id_lokasi',$lokasiarr,$row['id_lokasi'],$edited,'form-control',"style='width:auto'")?></td></tr>
<tr><td class="td-label">Jumlah</td><td><?php echo UI::createTextBox('jumlah',$row['jumlah'],3,3,$edited,'form-control',"style='width:auto'")?></td></tr>
<tr><td class="td-label">File</td><td><?php echo UI::createInputFile('file',$row['nama_file'], URL::Base("panelbackend/buku/preview_file/$row[id_buku]"), URL::Base("panelbackend/buku/delete_file/$row[id_buku]"), $edited, true, 'form-control')?></td></tr>
<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>