<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<div class="tips">
	<?php echo P_Lang("您当前的位置：");?><a href="<?php echo phpok_url(array('ctrl'=>'gd'));?>" title="<?php echo P_Lang("图片方案");?>"><?php echo P_Lang("图片方案");?></a>
	&raquo; <?php echo P_Lang("列表");?>
	<div class="action"><a href="<?php echo phpok_url(array('ctrl'=>'gd','func'=>'set'));?>"><?php echo P_Lang("添加方案");?></a></div>
	<div class="clear"></div>
</div>
<script type="text/javascript">
function gd_editor(id)
{
	var url = get_url("gd","editor") + "&id="+id;
	$.phpok.json(url,function(rs){
		if(rs.status == 'ok'){
			$.phpok.reload();
		}else{
			$.dialog.alert(rs.content);
		}
	});
}
function gd_delete(id,identifier)
{
	$.dialog.confirm('<?php echo P_Lang("确定要删除这个图片方案吗？");?><span class="red">'+identifier+'</span>',function(){
		var url = '<?php echo phpok_url(array('ctrl'=>'gd','func'=>'delete'));?>&id='+id;
		$.phpok.json(url,function(rs){
			if(rs.status == 'ok'){
				$.dialog.alert('<?php echo P_Lang("图片方案删除成功");?>',function(){
					$.phpok.reload();
				});
			}else{
				$.dialog.alert(rs.content);
			}
		})
	});
}
</script>
<div class="list">
<table width="100%" cellpadding="0" cellspacing="0" class="list">
<tr>
	<th class="id">ID</th>
	<th><?php echo P_Lang("标识串");?></th>
	<th><?php echo P_Lang("宽");?> &#215; <?php echo P_Lang("高");?></th>
	<th><?php echo P_Lang("生成方式");?></th>
	<th><?php echo P_Lang("编辑器支持");?></th>
	<th class="status"><?php echo P_Lang("水印");?></th>
	<th class="action"><?php echo P_Lang("操作");?></th>
</tr>
<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist AS $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
<tr>
	<td class="center"><?php echo $value['id'];?></td>
	<td class="center"><?php echo $value['identifier'];?></td>
	<td class="center"><?php echo $value['width'];?> x <?php echo $value['height'];?></td>
	<td class="center"><?php echo $value['cut_type'] ? P_Lang('裁剪法') : P_Lang('缩放法');?></td>
	<td class="center">
		<?php if($value['editor']){ ?>
		<span class="red"><?php echo P_Lang("默认");?></span>
		<?php } else { ?>
		<input type="button" value="<?php echo P_Lang("设为默认");?>" class="btn" onclick="gd_editor('<?php echo $value['id'];?>')" />
		<?php } ?>
	</td>
	<td class="center"><?php if($value['mark_picture']){ ?><span class="darkblue"><?php echo P_Lang("有");?></span><?php } else { ?><?php echo P_Lang("无");?><?php } ?></td>
	<td>
		<div class="button-group">
		<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'gd','func'=>'set','id'=>$value['id']));?>')" class="phpok-btn" />
		<input type="button" value="<?php echo P_Lang("删除");?>" onclick="gd_delete('<?php echo $value['id'];?>','<?php echo $value['identifier'];?>')" class="phpok-btn" />
		</div>
	</td>
</tr>
<?php } ?>
</table>
</div>
<?php $this->output("foot","file"); ?>