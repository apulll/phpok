<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#<?php echo $ext_module;?>").submit(function(){
		$(this).ajaxSubmit({
			'url':"<?php echo phpok_url(array('ctrl'=>'project','func'=>'content_save'));?>",
			'type':'post',
			'dataType':'json',
			'success':function(rs){
				if(rs.status == 'ok'){
					$.dialog.alert("<?php echo P_Lang("数据保存成功");?>",function(){$.phpok.reload();},'succeed');
				}else{
					$.dialog.alert(rs.content);
				}
			}
		});
		return false;
	});
});
</script>
<div class="tips">
	<?php echo P_Lang("您当前的位置：");?>
	<a href="<?php echo admin_url('project');?>"><?php echo P_Lang("项目管理");?></a>
	&raquo; <?php echo P_Lang("项目内容编辑及字段扩展");?>
</div>

<form method="post" id="<?php echo $ext_module;?>">
<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
<div class="table">
	<div class="title">
		<?php echo P_Lang("名称：");?>
		<span class="note"><?php echo P_Lang("设置名称，该名称将在网站前台导航中使用");?></span>
	</div>
	<div class="content"><input type="text" id="title" name="title" class="long" value="<?php echo $rs['title'];?>" /></div>
</div>

<?php $extlist_id["num"] = 0;$extlist=is_array($extlist) ? $extlist : array();$extlist_id["total"] = count($extlist);$extlist_id["index"] = -1;foreach($extlist AS $key=>$value){ $extlist_id["num"]++;$extlist_id["index"]++; ?>
<div class="table">
	<div class="title">
		<table cellspacing="0" cellpadding="0">
		<tr>
			<td height="25"><?php echo $value['title'];?><span class="darkblue">[<?php echo $value['identifier'];?>]</span>：</td>
			<td><span class="note"><?php echo $value['note'];?></span></td>
			<td><a class="icon edit" onclick="ext_edit('<?php echo $value['identifier'];?>','<?php echo $ext_module;?>')"></a></td>
			<td><a class="icon delete" onclick="ext_delete('<?php echo $value['identifier'];?>','<?php echo $ext_module;?>','<?php echo $value['title'];?>')"></a></td>
		</tr>
		</table>
	</div>
	<div class="content"><?php echo $value['html'];?></div>
</div>
<?php } ?>


<div class="table">
	<div class="content">
		<span id="_quick_insert"></span>
		<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				'url':"<?php echo phpok_url(array('ctrl'=>'ext','func'=>'select','type'=>'project','module'=>$ext_module));?>",
				'dataType':'html',
				'cache':false,
				'async':true,
				'beforeSend': function (XMLHttpRequest){
					XMLHttpRequest.setRequestHeader("request_type","html");
				},
				'success':function(rs){
					$("#_quick_insert").html(rs);
				}
			});
		});
		</script>
		<input type="button" value="<?php echo P_Lang("标准创建扩展字段");?>" onclick="ext_add('<?php echo $ext_module;?>')" class="button2" />
	</div>
</div>



<div class="table">
	<div class="content">
		<br />
		<input type="submit" value="<?php echo P_Lang("提交");?>" class="submit2" />
		<br />
	</div>
</div>
</form>
<?php $this->output("foot","file"); ?>