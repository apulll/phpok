<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<div class="tips clearfix">
	<?php echo P_Lang("您当前的位置：");?><a href="<?php echo phpok_url(array('ctrl'=>'sql'));?>" title="<?php echo P_Lang("数据库管理");?>"><?php echo P_Lang("数据库管理");?></a>
	<div class="action"><a href="<?php echo phpok_url(array('ctrl'=>'sql','func'=>'backlist'));?>"><?php echo P_Lang("已备份列表");?></a></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	top.$.desktop.title('<?php echo P_Lang("数据库管理");?>');
});
function select_free()
{
	$.input.checkbox_none();
	$("input[sign=free]").attr("checked",true);
	return true;
}
function optimize_sql()
{
	var id = $.input.checkbox_join();
	if(!id)
	{
		$.dialog.alert("<?php echo P_Lang("请选择数据表");?>");
		return false;
	}
	var url = "<?php echo phpok_url(array('ctrl'=>'sql','func'=>'optimize'));?>&id="+$.str.encode(id);
	$.phpok.go(url);
}

function repair_sql()
{
	var id = $.input.checkbox_join();
	if(!id)
	{
		$.dialog.alert("<?php echo P_Lang("请选择数据表");?>");
		return false;
	}
	var url = "<?php echo phpok_url(array('ctrl'=>'sql','func'=>'repair'));?>&id="+$.str.encode(id);
	$.phpok.go(url);
}

function backup_sql()
{
	$.dialog.confirm("<?php echo P_Lang("确定要执行备份操作吗？未选定表将备份全部！");?>",function(){
		var id = $.input.checkbox_join();
		if(!id)
		{
			id = 'all';
		}
		var url = "<?php echo phpok_url(array('ctrl'=>'sql','func'=>'backup'));?>&id="+$.str.encode(id);
		$.phpok.go(url);
	});
}
</script>

<table width="100%" cellpadding="0" cellspacing="0" class="list">
<tr>
	<th class="id"><?php echo P_Lang("选项");?></th>
	<th><?php echo P_Lang("表名");?></th>
	<th><?php echo P_Lang("引挈");?></th>
	<th><?php echo P_Lang("字符集");?></th>
	<th class="lft">&nbsp;<?php echo P_Lang("记录数");?></th>
	<th class="lft">&nbsp;<?php echo P_Lang("大小");?></th>
	<th><?php echo P_Lang("更新时间");?></th>
	<th class="lft">&nbsp;<?php echo P_Lang("碎片");?></th>
</tr>
<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist AS $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
<tr>
	<td align="center"><input type="checkbox" id="tbl_<?php echo $value['Name'];?>" name="tbl[]" <?php if($value['free']){ ?> sign="free"<?php } ?> value="<?php echo $value['Name'];?>" /></td>
	<td><label for="tbl_<?php echo $value['Name'];?>"><?php echo $value['Name'];?><?php if($value['Comment']){ ?><span class="gray i">（<?php echo $value['Comment'];?>）</span><?php } ?></label></td>
	<td align="center"><?php echo $value['Engine'];?></td>
	<td align="center"><?php echo $value['Collation'];?></td>
	<td><?php echo $value['Rows'];?></td>
	<td><?php echo $value['length'];?></td>
	<td align="center"><?php echo $value['Update_time'] ? $value['Update_time'] : $value['Create_time'];?></td>
	<td<?php if($value['free']){ ?> style="background:red;"<?php } ?>><?php echo $value['free'];?></td>
</tr>
<?php } ?>
<tr>
	<td colspan="8">
		<input type="button" value="<?php echo P_Lang("全选");?>" onclick="$.input.checkbox_all()" class="btn" />
		<input type="button" value="<?php echo P_Lang("全不选");?>" onclick="$.input.checkbox_none()" class="btn" />
		<input type="button" value="<?php echo P_Lang("反选");?>" onclick="$.input.checkbox_anti()" class="btn" />
		<input type="button" value="<?php echo P_Lang("只选择有碎片");?>" onclick="select_free()" class="btn" />
		<input type="button" value="<?php echo P_Lang("优化");?>" onclick="optimize_sql()" class="submit" />
		<input type="button" value="<?php echo P_Lang("修复");?>" onclick="repair_sql()" class="submit" />
		<input type="button" value="<?php echo P_Lang("备份");?>" onclick="backup_sql()" class="submit" />
	</td>
</tr>
</table>
<?php $this->output("foot","file"); ?>