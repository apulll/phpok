<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php if($_ptype){ ?>
<script type="text/javascript">
function add_line_<?php echo $_rs['identifier'];?>()
{
	var td_count = ($("#<?php echo $_rs['identifier'];?>_tbl tr:eq(0) th")).length - 1;
	var html = '<tr>';
	html += '<td><input type="button" value="删除" onclick="$(this).parent().parent().remove()" class="btn" /></td>'
	for(var i=0;i<td_count;i++)
	{
		html += '<td><input type="text" name="<?php echo $_rs['identifier'];?>_body[]" class="short" style="width:<?php echo $_rs['p_width'];?>px;" /></td>';
	}
	html += '</tr>';
	$("#<?php echo $_rs['identifier'];?>_tbl").append(html);
}
function delete_one(obj)
{
	var idx = $('th').index($(obj).parent());
	$(obj).parent().remove();
	$("#<?php echo $_rs['identifier'];?>_tbl tr").each(function(){
		$(this).find('td:eq('+idx+')').remove();
	});
}
function add_ele_<?php echo $_rs['identifier'];?>()
{
	var val = $("#ele_<?php echo $_rs['identifier'];?>").val();
	var th = '<th>';
	th += '<input type="text" name="<?php echo $_rs['identifier'];?>_title[]" class="short" style="width:<?php echo $_rs['p_width'];?>px;" value="'+val+'" />';
	th += '<input type="button" value="删除" onclick="delete_one(this)"/>';
	th += '</th>';
	$("#<?php echo $_rs['identifier'];?>_tbl tr:eq(0)").append(th);
	//定制列
	$("#<?php echo $_rs['identifier'];?>_tbl tr").each(function(i){
		if(i>0){
			var td = '<td><input type="text" name="<?php echo $_rs['identifier'];?>_body[]" class="short" style="width:<?php echo $_rs['p_width'];?>px;" value="" /></td>';
			$(this).append(td);
		}
	});
}
</script>
<div class="param">
	<div style="float:left;margin-right:10px;">
		<?php if($_pname){ ?>
		<div style="margin-bottom:5px;">
		<select name="ele_<?php echo $_rs['identifier'];?>" id="ele_<?php echo $_rs['identifier'];?>">
			<option value="">请选择…</option>
			<?php $_pname_id["num"] = 0;$_pname=is_array($_pname) ? $_pname : array();$_pname_id["total"] = count($_pname);$_pname_id["index"] = -1;foreach($_pname AS $key=>$value){ $_pname_id["num"]++;$_pname_id["index"]++; ?>
			<option value="<?php echo $value;?>"><?php echo $value;?></option>
			<?php } ?>
		</select></div>
		<?php } else { ?>
		<input type="hidden" name="ele_<?php echo $_rs['identifier'];?>" id="ele_<?php echo $_rs['identifier'];?>" value="" />
		<?php } ?>
		<div style="margin-bottom:5px;"><input type="button" value="添加一列" class="button" onclick="add_ele_<?php echo $_rs['identifier'];?>()" /></div>
		<input type="button" value="添加一行" class="btn" onclick="add_line_<?php echo $_rs['identifier'];?>()" />
	</div>
	<div id="list_<?php echo $_rs['identifier'];?>" style="float:left;">
		<table class="list" style="border:1px solid #ccc;margin:0;" cellpadding="0" cellspacing="1" id="<?php echo $_rs['identifier'];?>_tbl">
		<tr>
			<th width="50">操作</th>
			<?php $_rslist_title_id["num"] = 0;$_rslist['title']=is_array($_rslist['title']) ? $_rslist['title'] : array();$_rslist_title_id["total"] = count($_rslist['title']);$_rslist_title_id["index"] = -1;foreach($_rslist['title'] AS $key=>$value){ $_rslist_title_id["num"]++;$_rslist_title_id["index"]++; ?>
			<th>
				<input type="text" name="<?php echo $_rs['identifier'];?>_title[]" style="width:<?php echo $_rs['p_width'];?>px;" value="<?php echo $value;?>" />
				<input type="button" value="删除" onclick="delete_one(this)"/>
			</th>
			<?php } ?>
		</tr>
		<?php $_rslist_content_id["num"] = 0;$_rslist['content']=is_array($_rslist['content']) ? $_rslist['content'] : array();$_rslist_content_id["total"] = count($_rslist['content']);$_rslist_content_id["index"] = -1;foreach($_rslist['content'] AS $key=>$value){ $_rslist_content_id["num"]++;$_rslist_content_id["index"]++; ?>
		<tr>
			<td><input type="button" value="删除" onclick="$(this).parent().parent().remove()" class="btn" /></td>
			<?php $value_id["num"] = 0;$value=is_array($value) ? $value : array();$value_id["total"] = count($value);$value_id["index"] = -1;foreach($value AS $k=>$v){ $value_id["num"]++;$value_id["index"]++; ?>
			<td><input type="text" name="<?php echo $_rs['identifier'];?>_body[]" style="width:<?php echo $_rs['p_width'];?>px;" value="<?php echo $v;?>" /></td>
			<?php } ?>
		</tr>
		<?php } ?>
		</table>
	</div>
	<div class="clear"></div>
</div>
<?php } else { ?>
<script type="text/javascript">
function add_ele_<?php echo $_rs['identifier'];?>()
{
	var val = $("#ele_<?php echo $_rs['identifier'];?>").val();
	var html = '<div style="margin-bottom:10px;"><ul class="layout">';
	html += '<li><input type="text" name="<?php echo $_rs['identifier'];?>_title[]" value="'+val+'"/></li>';
	html += '<li><input type="text" name="<?php echo $_rs['identifier'];?>_body[]"/></li>';
	html += '<li><input type="button" value="删除" class="button" onclick="$(this).parent().parent().parent().remove()" /></li>';
	html += '</ul><div class="clear"></div></div>';
	$("#list_<?php echo $_rs['identifier'];?>").append(html);
}
</script>
<div class="param">
	<div style="margin-bottom:10px;">
	<?php if($_pname){ ?>
	<select name="ele_<?php echo $_rs['identifier'];?>" id="ele_<?php echo $_rs['identifier'];?>">
		<option value="">请选择…</option>
		<?php $_pname_id["num"] = 0;$_pname=is_array($_pname) ? $_pname : array();$_pname_id["total"] = count($_pname);$_pname_id["index"] = -1;foreach($_pname AS $key=>$value){ $_pname_id["num"]++;$_pname_id["index"]++; ?>
		<option value="<?php echo $value;?>"><?php echo $value;?></option>
		<?php } ?>
	</select>
	<?php } else { ?>
	<input type="hidden" name="ele_<?php echo $_rs['identifier'];?>" id="ele_<?php echo $_rs['identifier'];?>" value="" />
	<?php } ?>
	<input type="button" value="添加属性" class="button" onclick="add_ele_<?php echo $_rs['identifier'];?>()" />
	</div>
	<div id="list_<?php echo $_rs['identifier'];?>">
		<?php $_rslist_title_id["num"] = 0;$_rslist['title']=is_array($_rslist['title']) ? $_rslist['title'] : array();$_rslist_title_id["total"] = count($_rslist['title']);$_rslist_title_id["index"] = -1;foreach($_rslist['title'] AS $key=>$value){ $_rslist_title_id["num"]++;$_rslist_title_id["index"]++; ?>
		<div style="margin-bottom:10px;">
			<ul class="layout">
				<li><input type="text" name="<?php echo $_rs['identifier'];?>_title[]" value="<?php echo $value;?>"/></li>
				<li><input type="text" name="<?php echo $_rs['identifier'];?>_body[]" value="<?php echo $_rslist['content'][$key];?>"/></li>
				<li><input type="button" value="删除" class="button" onclick="$(this).parent().parent().parent().remove()" /></li>
			</ul>
			<div class="clear"></div>
		</div>
		<?php } ?>
	</div>
	<div class="clear"></div>
</div>
<?php } ?>