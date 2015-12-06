
<?=$this->FlashMsg()?>
<div style="text-align:right">
<?php echo UI::showButtonMode($mode, $row[$pk])?>
</div>
<br/>
<table class="table table-form">
<tr>
<td class="td-label">Nama</td>
<td class="td-input" colspan="5"><?php echo UI::createTextBox('nama',$row['nama'],'100','100',$edited,$class='form-control ',"style='width:50%'")?></td>
</tr>

<tr>
<td class="td-label"> Pengarang</td>
<td class="td-input" colspan="5"><?php echo UI::createSelect('id_pengarang',$pengarangarr,$row['id_pengarang'],$edited,$class='form-control ',"style='width:15%'")?></td>
</tr>

<tr>
<td class="td-label">Pernyataan</td>
<td class="td-input" colspan="5"><?php echo UI::createTextBox('pernyataan',$row['pernyataan'],'50','50',$edited,$class='form-control ',"style='width:75%'")?></td>
</tr>

<tr>
<td class="td-label">Edisi</td>
<td class="td-input" colspan="5"><?php echo UI::createTextBox('edisi',$row['edisi'],'50','50',$edited,$class='form-control ',"style='width:15%'")?></td>
</tr>

<tr>
<td class="td-label">Info Detail</td>
<td class="td-input" colspan="5"><?php echo UI::createTextBox('info_detail',$row['info_detail'],'50','50',$edited,$class='form-control ',"style='width:75%'")?></td>
</tr>

<tr>
<td class="td-label">Pola</td>
<td class="td-input"><?php echo UI::createTextBox('pola',$row['pola'],'','',$edited,$class='form-control ',"style='width:100%'")?></td>

<td class="td-label">Dari</td>
<td class="td-input"><?php echo UI::createTextBox('dari',$row['dari'],'','',$edited,$class='form-control ',"style='width:100%'")?></td>

<td class="td-label">Ke</td>
<td class="td-input"><?php echo UI::createTextBox('ke',$row['ke'],'','',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label"> Tipekoleksi</td>
<td class="td-input" colspan="5"><?php echo UI::createSelect('id_tipekoleksi',$tipekoleksiarr,$row['id_tipekoleksi'],$edited,$class='form-control ',"style='width:25%'")?></td>
</tr>

<tr>
<td class="td-label">ISBN / ISSN</td>
<td class="td-input" colspan="5"><?php echo UI::createTextBox('isbn_issn',$row['isbn_issn'],'100','100',$edited,$class='form-control ',"style='width:25%'")?></td>
</tr>

<tr>
<td class="td-label"> Penerbit</td>
<td class="td-input" colspan="5"><?php echo UI::createSelect('id_penerbit',$penerbitarr,$row['id_penerbit'],$edited,$class='form-control ',"style='width:25%'")?></td>
</tr>

<tr>
<td class="td-label"> Lokasibuku</td>
<td class="td-input" colspan="5"><?php echo UI::createSelect('id_lokasibuku',$lokasibukuarr,$row['id_lokasibuku'],$edited,$class='form-control ',"style='width:25%'")?></td>
</tr>

<tr>
<td class="td-label">Deskripsi</td>
<td class="td-input" colspan="5"><?php echo UI::createTextArea('deskripsi',$row['deskripsi'],'','',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Judul Seri</td>
<td class="td-input" colspan="5"><?php echo UI::createTextBox('judul_seri',$row['judul_seri'],'','',$edited,$class='form-control ',"style='width:25%'")?></td>
</tr>

<tr>
<td class="td-label">No Panggil</td>
<td class="td-input" colspan="5"><?php echo UI::createTextBox('no_panggil',$row['no_panggil'],'50','50',$edited,$class='form-control ',"style='width:25%'")?></td>
</tr>

<tr>
<td class="td-label"> Subjek</td>
<td class="td-input" colspan="5"><?php echo UI::createSelect('id_subjek',$subjekarr,$row['id_subjek'],$edited,$class='form-control ',"style='width:25%'")?></td>
</tr>

<tr>
<td class="td-label"> Bahasa</td>
<td class="td-input" colspan="5"><?php echo UI::createSelect('id_bahasa',$bahasaarr,$row['id_bahasa'],$edited,$class='form-control ',"style='width:25%'")?></td>
</tr>

<tr>
<td class="td-label">Abstrak</td>
<td class="td-input" colspan="5"><?php echo UI::createTextArea('abstrak',$row['abstrak'],'','',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label"> Kategori</td>
<td class="td-input" colspan="5"><?php echo UI::createSelect('id_kategori',$kategoriarr,$row['id_kategori'],$edited,$class='form-control ',"style='width:25%'")?></td>
</tr>

<tr>
<td class="td-label">File</td>
<td colspan="5"><?php echo UI::createInputFile('file',$row['nama_file'], URL::Base("panelbackend/buku/preview_file/$row[id_buku]"), URL::Base("panelbackend/buku/delete_file/$row[id_buku]"), $edited, true, 'form-control')?></td>
</tr>


<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>