<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<script type="text/javascript">
function sql_recover(id)
{
	$.dialog.confirm('<?php echo P_Lang("确定要恢复到这个备份");?>',function(){
		var url = get_url('sql','recover','id='+id);
		$.phpok.go(url);
	});
}
function sql_delete(id)
{
	$.dialog.confirm('<?php echo P_Lang("确定要删除这个备份吗？删除后就不能恢复了");?>',function(){
		var url = get_url('sql','delete','id='+id);
		$.phpok.go(url);
	});
}
</script>
<div class="tips clearfix">
	<?php echo P_Lang("您当前的位置：");?><a href="<?php echo phpok_url(array('ctrl'=>'sql'));?>" title="<?php echo P_Lang("数据库管理");?>"><?php echo P_Lang("数据库管理");?></a>
	&raquo; <?php echo P_Lang("已备份列表");?>
</div>
<table width="100%" cellpadding="0" cellspacing="0" class="list">
<tr>
	<th class="lft">&nbsp;<?php echo P_Lang("备份文件");?></th>
	<th class="lft">&nbsp;<?php echo P_Lang("大小");?></th>
	<th><?php echo P_Lang("备份时间");?></th>
	<th class="lft">&nbsp; <?php echo P_Lang("操作");?></th>
</tr>
<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist AS $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
<tr>
	<td><?php echo $value['filename'];?></td>
	<td><?php echo $value['size_str'];?></td>
	<td align="center"><?php echo $value['time'];?></td>
	<td><input type="button" value="恢复这个备份" onclick="sql_recover('<?php echo $value['id'];?>')" class="btn" />
		<input type="button" value="删除" onclick="sql_delete('<?php echo $value['id'];?>')" class="btn" />
	</td>
</tr>
<?php } ?>
</table>

<?php $this->output("foot","file"); ?>