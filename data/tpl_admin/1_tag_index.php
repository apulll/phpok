<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title="标签管理";?><?php $this->assign("title","标签管理"); ?><?php $this->output("head","file"); ?>
<script type="text/javascript">
function save_tag(id)
{
	var url = "<?php echo phpok_url(array('ctrl'=>'tag','func'=>'save'));?>";
	if(id != 'top' && id != 'bottom')
	{
		url += "&id="+id;
	}
	var title = $("#tag_title_"+id).val();
	if(!title)
	{
		$.dialog.alert('<?php echo P_Lang("关键字名称不能为空");?>');
		return false;
	}
	url += "&title="+$.str.encode(title);
	var tag_url = $("#tag_url_"+id).val();
	if(tag_url)
	{
		url += "&url="+$.str.encode(tag_url);
	}
	var target_val = $("#tag_target_"+id).val();
	url += "&target="+target_val;
	var is_global = $("#tag_isg_"+id).val();
	if(is_global)
	{
		url += "&is_global="+is_global;
	}
	var replace_count = $("#tag_replace_"+id).val();
	if(replace_count && parseInt(replace_count,10)>0)
	{
		url += "&replace_count="+replace_count;
	}
	var alt = $("#tag_alt_"+id).val();
	if(alt)
	{
		url += "&alt="+$.str.encode(alt);
	}
	var rs = $.phpok.json(url);
	if(rs.status != 'ok')
	{
		$.dialog.alert(rs.content);
		return false;
	}
	else
	{
		var tip = '<?php echo P_Lang("编辑关键字成功");?>';
		if(id == 'top' || id == 'bottom')
		{
			tip = '<?php echo P_Lang("添加关键字成功");?>';
			$.dialog.alert(tip,function(){
				$.phpok.reload();
			},'succeed');
		}
		else
		{
			$.dialog.tips(tip);
		}
		return false;
	}
}

function delete_it(id)
{
	var title = $("#tag_title_"+id).val();
	$.dialog.confirm('确定要删除关键字：<span class="red">'+title+"</span> 吗？删除后是不能恢复的",function(){
		var url = "<?php echo phpok_url(array('ctrl'=>'tag','func'=>'delete'));?>&id="+id;
		var rs = $.phpok.json(url);
		if(rs.status == 'ok')
		{
			$.dialog.tips('删除成功');
			$("#edit_"+id).remove();
			return true;
		}
		else
		{
			$.dialog.alert(rs.content);
			return false;
		}
	});
}
</script>
<div class="tips">
	<?php echo P_Lang("您当前的位置：");?>
	<a href="<?php echo phpok_url(array('ctrl'=>'tag'));?>"><?php echo P_Lang("标签管理");?></a>
	&raquo; <?php echo P_Lang("标签列表");?>
</div>
<div class="list">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<th class="id">ID</th>
	<th class="lft" width="160">名称</th>
	<th class="lft" width="160">链接提示文字</th>
	<th class="lft">自定义网址</th>
	<th width="95">是否新窗口</th>
	<th width="95">全局性</th>
	<th width="70">替换次数</th>
	<th width="90">主题数</th>
	<th width="90">点击数</th>
	<th class="action">操作</th>
</tr>
<tr id="add_top">
	<form method="post" onsubmit="return save_tag('top')">
	<td class="center">添加</td>
	<td><input type="text" id="tag_title_top" placeholder="填写关键字名称" style="width:150px" /></td>
	<td><input type="text" id="tag_alt_top" placeholder="链接提示文字" style="width:150px" /></td>
	<td><input type="text" id="tag_url_top" placeholder="自定义链接地址，可以为空" style="width:300px" /></td>
	<td class="center">
		<select id="tag_target_top">
			<option value="0">当前窗口</option>
			<option value="1">新窗口</option>
		</select>
	</td>
	<td class="center">
		<select id="tag_isg_top">
			<option value="0">非全局</option>
			<option value="1">全局可用</option>
		</select>
	</td>
	<td class="center"><input type="text" id="tag_replace_top" value="3" class="short center" /></td>
	<td class="center">0</td>
	<td class="center">0</td>
	<td>
		<input type="submit" value="添加" class="btn" />
	</td>
	</form>
</tr>
<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist AS $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
<tr id="edit_<?php echo $value['id'];?>">
	<form method="post" onsubmit="return save_tag('<?php echo $value['id'];?>')">
	<td class="center"><?php echo $value['id'];?></td>
	<td><input type="text" id="tag_title_<?php echo $value['id'];?>" value="<?php echo $value['title'];?>" style="width:150px" /></td>
	<td><input type="text" id="tag_alt_<?php echo $value['id'];?>" value="<?php echo $value['alt'];?>" style="width:150px" /></td>
	<td><input type="text" id="tag_url_<?php echo $value['id'];?>" value="<?php echo $value['url'];?>" style="width:300px" /></td>
	<td class="center">
		<select id="tag_target_<?php echo $value['id'];?>">
			<option value="0">当前窗口</option>
			<option value="1"<?php if($value['target']){ ?> selected<?php } ?>>新窗口</option>
		</select>
	</td>
	<td class="center">
		<select id="tag_isg_<?php echo $value['id'];?>">
			<option value="0">非全局</option>
			<option value="1"<?php if($value['is_global']){ ?> selected<?php } ?>>全局可用</option>
		</select>
	</td>
	<td class="center"><input type="text" id="tag_replace_<?php echo $value['id'];?>" value="<?php echo $value['replace_count'];?>" class="short center" /></td>
	<td class="center"><?php echo $value['count'] ? $value['count'] : 0;?></td>
	<td class="center"><?php echo $value['hits'] ? $value['hits'] : 0;?></td>
	<td>
		<input type="submit" value="修改" class="btn" /> <input type="button" value="删除" onclick="delete_it('<?php echo $value['id'];?>')" class="btn" />
	</td>
	</form>
</tr>
<?php } ?>
<?php if($rslist && count($rslist)>=1){ ?>
<tr id="add_bottom">
	<form method="post" onsubmit="return save_tag('bottom')">
	<td class="center">添加</td>
	<td><input type="text" id="tag_title_bottom" placeholder="填写关键字名称" style="width:150px" /></td>
	<td><input type="text" id="tag_alt_bottom" placeholder="链接提示文字" style="width:150px" /></td>
	<td><input type="text" id="tag_url_bottom" placeholder="自定义链接地址，可以为空" style="width:300px" /></td>
	<td class="center">
		<select id="tag_target_bottom">
			<option value="0">当前窗口</option>
			<option value="1">新窗口</option>
		</select>
	</td>
	<td class="center">
		<select id="tag_isg_bottom">
			<option value="0">非全局</option>
			<option value="1">全局可用</option>
		</select>
	</td>
	<td class="center"><input type="text" id="tag_replace_bottom" value="3" class="short center" /></td>
	<td class="center">0</td>
	<td class="center">0</td>
	<td>
		<input type="submit" value="添加" class="btn" />
	</td>
	</form>
</tr>
<?php } ?>
</table>
</div>
<?php $this->output("pagelist","file"); ?>
<?php $this->output("foot","file"); ?>
