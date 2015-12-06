
<?=$this->FlashMsg()?>
<div style="text-align:right">
<?php echo UI::showButtonMode($mode, $row[$pk])?>
</div>
<br/>
<table class="table table-form">

<tr>
<td class="td-label">Judul</td>
<td class="td-input"><?php echo UI::createTextBox('nama',$row['nama'],'200','100',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Isi</td>
<td class="td-input"><?php echo UI::createTextArea('isi',$row['isi'],'','',$edited,$class='form-control contents',"")?></td>
</tr>

<tr>
<td class="td-label">Untuk Umum ?</td>
<td class="td-input"><?php echo UI::createCheckBox('jenis_pesan',1,$row['jenis_pesan'],$edited,$class='form-control ',"style='width:10px'")?></td>
</tr>

<tr id="listsiswa" <?php if($row['jenis_pesan']==1){echo 'style="display:none"';}?>>
<td class="td-label"> Siswa</td>
<td class="td-input"><?php echo UI::createSelectMultiple('id_siswa[]',$elearningsiswaarr,$row['id_siswa'],$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>
<script type="text/javascript">
	
  $("#jenis_pesan").click(function(){
    if($(this).is(":checked")){
        $("#listsiswa").hide();
        $("#listsiswa select option").each(function(){
            $(this).prop('selected', false);
        });
        $('#listsiswa select').val('').trigger('chosen:updated');
    }else{
        $("#listsiswa").show();
    }
  });
</script>