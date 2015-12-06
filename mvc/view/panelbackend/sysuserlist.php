
<?=$this->FlashMsg()?>
<div style="text-align:right">
<?php echo UI::showButtonMode($mode)?>
</div>
  <table class="table table-striped">
    <thead>
    <?=UI::showHeader($header, $filter_arr, $list_sort, $list_order)?>
    </thead>
    <tbody>
    <?php

        $access_mode = array_values($this->access_mode);
    $i = (($page-1)*$limit);
    foreach($list['rows'] as $rows){
    	$i++;
    	echo "<tr>";
        if(in_array('edit', $access_mode)){
        echo "<td><input type='checkbox' name='user[]' class='cuser' value='".$rows['user_id']."'/></td>";
        }else{
        echo "<td>$i</td>";
        }
    	foreach($header as $rows1){
    		$val = $rows[$rows1['name']];
            if($rows1['name']=='nama'){
                echo "<td><a href='".($url=URL::Base($page_ctrl."/detail/$rows[$pk]"))."'>$val</a></td>";   
            }elseif($rows1['name']=='isi'){
                echo "<td>".ReadMore($val,$url)."</td>";
            }else{
                switch ($rows1['type']) {
                    case 'list':
                        echo "<td>".$rows1["value"][$val]."</td>";
                        break;
                    default :
                        echo "<td>$val</td>";
                        break;
                }
            }
    	}
    	echo "<td style='text-align:right'>
    	".UI::getButton('edit', $rows[$pk], 'class="btn btn-xs btn-warning"')."
		".UI::getButton('delete', $rows[$pk], 'class="btn btn-xs btn-danger"')."
    	</td>";
    	echo "</tr>";
    }
    if(!count($list['rows'])){
        echo "<tr><td colspan='".(count($header)+2)."'>Data kosong</td></tr>";
    }elseif(in_array('edit', $access_mode)){

        echo "<tr>
        <td style='background:#fff;vaertical-align:middle' colspan='".(count($header)+1)."'><input type='checkbox' class='call' id='call' name='call'/> <label for='call'>Pilih Semua</label><br/><br/>
        <label for='jenisaksi'>Aksi :</label> <select class='form-control' style='width:auto;display:inline;padding: 0px;height: 25px' name='jenisaksi' id='jenisaksi'><option></option><option value='aktif'>Aktif</option><option value='unaktif'>Tidak Aktif</option></select> 
        <input type='button' class='btn btn-xs btn-warning' value='GO' onclick='return goAksi()'>
        </td>
        </tr>";
    }
    ?>
    </tbody>
  </table>
  <?=UI::showPaging($paging,$page, $limit_arr,$limit,$list)?>
  <script>
  $("#call").click(function(){
    if($(this).is(":checked")){
        $(".cuser").each(function(){
            $(this).prop('checked', true);
        });
    }else{
        $(".cuser").each(function(){
            $(this).removeAttr('checked');
        });
    }
  });
  function goAksi(){
    if($('#jenisaksi').val()==''){
        alert('Silahkan pilih aksi');
        return;
    }

    if(confirm('Apakah Anda yakin dengan keputusan Anda ?')){
        $("#act").val('goaksi');
        $("#main_form").submit();
    }
  }
  </script>