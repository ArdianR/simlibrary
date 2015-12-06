
<?=$this->FlashMsg()?>
<div style="text-align:right">
<?php echo UI::showButtonMode($mode, $row[$pk])?>
</div>
<br/>
<table class="table table-form">
<tr>
<td class="td-label">Username</td>
<td class="td-input"><?php echo UI::createTextBox('username',$row['username'],'100','100',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Group </td>
<td class="td-input"><?php echo UI::createSelect('group_id',$publicsysgrouparr,$row['group_id'],$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Name</td>
<td class="td-input"><?php echo UI::createTextBox('name',$row['name'],'200','100',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Last Ip</td>
<td class="td-input"><?php echo UI::createTextBox('last_ip',$row['last_ip'],'30','30',$edited,$class='form-control ',"style='width:100%'")?></td>
</tr>

<tr>
<td class="td-label">Last Login</td>
<td class="td-input"><?php echo UI::createTextBox('last_login',$row['last_login'],'20','20',$edited,$class='form-control datetimepicker',"style='width:200px'")?></td>
</tr>

<tr>
<td class="td-label">Active ?</td>
<td class="td-input"><?php echo UI::createCheckBox('is_active',1,$row['is_active'],$edited,$class='form-control ',"style='width:10px'")?></td>
</tr>

<?php if($edited){?>
<?php if($row['password']){ ?>
<tr><td colspan="2">Kosongkan password apabila Anda tidak ingin merubahnya.</td></tr>
<?php } ?>
<tr>
<td class="td-label">Password</td>
<td class="td-input"><?php echo UI::createTextPassword('password','','','',$edited,$class='form-control ')?></td>
</tr>
<tr>
<td class="td-label">Confirm Password</td>
<td><?php echo UI::createTextPassword('confirmpassword','','','',$edited,$class='form-control')?></td>
</tr>
<?php }?>
<?php if($edited){?>
<tr><td></td><td><?php echo UI::showButtonMode('save', null, $edited)?></td></tr>
<?php }?>
</table>