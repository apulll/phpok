<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<script type="text/javascript" src="<?php echo add_js('fields.js');?>"></script>
<script type="text/javascript">
function cate_set(type)
{
	var ids = $.input.checkbox_join();
	if(!ids){
		$.dialog.alert('未指定字段');
		return false;
	}
	var cateid = $("#list_action_val").val();
	if(!cateid){
		$.dialog.alert('未选择要操作分类');
		return false;
	}
	var url = get_url('fields','cateset','pl_act='+type+'&ids='+$.str.encode(ids)+"&cateid="+cateid);
	var rs = $.phpok.json(url);
	if(rs.status == 'ok'){
		var tip = type == 'add' ? '<?php echo P_Lang("所选字段已绑定到指定分类上");?>' : '<?php echo P_Lang("所选字段已移除分类");?>';
		$.dialog.alert(tip,function(){
			$.phpok.reload();
		},'succeed');
	}else{
		$.dialog.alert(rs.content);
		return false;
	}
}
</script>
<div class="tips">
	<div class="action"><a href="<?php echo admin_url('fields','set');?>">添加新字段</a></div>
	您当前的位置：
	<a href="<?php echo admin_url('fields');?>">字段属性管理</a>
	&raquo; 字段列表
	&nbsp; 筛选：
	<select onchange="fields_goto(this.value)">
	<option value="">全部</option>
	<?php $arealist_id["num"] = 0;$arealist=is_array($arealist) ? $arealist : array();$arealist_id["total"] = count($arealist);$arealist_id["index"] = -1;foreach($arealist AS $key=>$value){ $arealist_id["num"]++;$arealist_id["index"]++; ?>
	<option value="<?php echo $key;?>"<?php if($key == $type){ ?> selected<?php } ?>><?php echo $value;?></option>
	<?php } ?>
	</select>
</div>
<div class="list">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
	<th width="30">&nbsp;</th>
	<th class="lft" style="text-indent:12px;">名称</th>
	<th>字段名</th>
	<th>字段类型</th>
	<th>表单类型</th>
	<th class="action">操作</th>
</tr>
<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist AS $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
<tr title="<?php echo $value['note'];?>">
	<td class="center"><input type="checkbox" value="<?php echo $value['id'];?>" /></td>
	<td style="text-indent:12px;height:22px;">
		<?php echo $value['title'];?>
		<?php $t = $value['area'] ? explode(",",$value['area']) : array();?>
		<?php if($value['area']){ ?>
		<span class="gray size10">&raquo;
			<?php $t = explode(",",$value['area']);?>
			<?php $t_id["num"] = 0;$t=is_array($t) ? $t : array();$t_id["total"] = count($t);$t_id["index"] = -1;foreach($t AS $k=>$v){ $t_id["num"]++;$t_id["index"]++; ?>
				<?php if($t_id['num']>1){ ?>/<?php } ?>
				<?php echo $arealist[$v];?>
			<?php } ?>
		</span>
		<?php } ?>
	</td>
	<td class="center"><?php echo $value['identifier'];?></td>
	<td class="center"><?php echo $value['field_type_name'];?></td>
	<td class="center"><?php echo $value['form_type_name'];?></td>
	<td>
		<a class="icon edit" href="<?php echo admin_url('fields','set');?>&id=<?php echo $value['id'];?>" title="修改"></a>
		<a class="icon delete end" onclick="field_del('<?php echo $value['id'];?>','<?php echo $value['title'];?>')" title="删除"></a>
	</td>
</tr>
<?php } ?>
</table>
<ul class="layout">
	<li><input type="button" value="<?php echo P_Lang("全选");?>" class="btn" onclick="$.input.checkbox_all()" /></li>
	<li><input type="button" value="<?php echo P_Lang("全不选");?>" class="btn" onclick="$.input.checkbox_none()" /></li>
	<li><input type="button" value="<?php echo P_Lang("反选");?>" class="btn" onclick="$.input.checkbox_anti()" /></li>
	<li>
		<select id="list_action_val" style="width:200px;margin-top:0px;">
			<option value=""><?php echo P_Lang("选择要操作分类…");?></option>
			<?php $tmpid["num"] = 0;$arealist=is_array($arealist) ? $arealist : array();$tmpid["total"] = count($arealist);$tmpid["index"] = -1;foreach($arealist AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<option value="<?php echo $key;?>"><?php echo $value;?></option>
			<?php } ?>
		</select>
	</li>
	<li id="plugin_button"><input type="button" value="添加分类" onclick="cate_set('add')" class="submit" /></li>
	<li id="plugin_button"><input type="button" value="移除分类" onclick="cate_set('remove')" class="submit" /></li>
</ul>
<div class="clear"></div>
</div>
<?php $this->output("foot","file"); ?>
