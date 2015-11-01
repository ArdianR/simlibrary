
<?=$this->FlashMsg()?>
<div style="text-align:right">
<?php echo UI::showButtonMode($mode, $row[$pk])?>
</div>
        <br/>
<table class="table table-form">
<tr><td class="td-label">ID Member</td><td><?php echo UI::createTextBox('id_member',$row['id_member'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">Nama</td><td><?php echo UI::createTextBox('nama',$row['nama'],'','',$edited,$class='form-control')?></td></tr><tr><td class="td-label">Nama</td><td><?php echo UI::createTextBox('nama',$row['nama'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">Tgl Lahir</td><td><?php echo UI::createTextBox('tgl_lahir',$row['tgl_lahir'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">Anggota Sejak</td><td><?php echo UI::createTextBox('anggota_sejak',$row['anggota_sejak'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">Tgl Registrasi</td><td><?php echo UI::createTextBox('tgl_registrasi',$row['tgl_registrasi'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">Berlaku Sampai</td><td><?php echo UI::createTextBox('Berlaku',$row['berlaku_sampai'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">Jenis Kelamin</td><td><?php echo UI::createTextBox('jenis_kelamin',$row['jenis_kelamin'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">Alamat</td><td><?php echo UI::createTextArea('alamat',$row['alamat'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">Kode Pos</td><td><?php echo UI::createTextBox('kode_pos',$row['kode_pos'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">Alamat Surat</td><td><?php echo UI::createTextBox('alamat_surat',$row['alamat_surat'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">No Hp</td><td><?php echo UI::createTextBox('no_hp',$row['no_hp'],'','',$edited,$class='form-control')?></td></tr>
<tr><td class="td-label">No. Identitas</td><td><?php echo UI::createTextBox('no_identitas',$row['no_identitas'],17,17,$edited,$class='form-control',"style='width:auto'")?></td></tr>
<tr><td class="td-label">Catatan</td><td><?php echo UI::createTextBox('catatan',$row['catatan'],15,15,$edited,$class='form-control',"style='width:auto'")?></td></tr>
<tr><td class="td-label">Email</td><td><?php echo UI::createTextBox('email',$row['email'],35,35,$edited,$class='form-control',"style='width:auto'")?></td></tr>
<tr><td class="td-label">Password</td><td><?php echo UI::createTextBox('password',$row['password'],'','',$edited,$class='form-control')?></td></tr>

<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>