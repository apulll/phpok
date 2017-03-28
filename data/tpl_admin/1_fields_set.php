<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<script type="text/javascript" src="<?php echo add_js('fields.js');?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	// 检测名称
	$("#title").blur(function(){check_title(false)});
	$("#form_style").blur(function(){load_style();});
});
</script>
<?php if(!$id){ ?>
<script type="text/javascript">
$(document).ready(function(){
	// 检查验证码是否正确
	$("#identifier").blur(function(){check_identifier(false)});
});
</script>
<?php } else { ?>
<script type="text/javascript">
$(document).ready(function(){
	var form_type = "<?php echo $rs['form_type'];?>";
	show_form_opt(form_type);
	load_style();
});
</script>
<?php } ?>

<div class="tips">
	您当前的位置：
	<a href="<?php echo admin_url('fields');?>">字段属性管理</a>
	<?php if($id){ ?>
	&raquo; 编辑字段
	<?php } else { ?>
	&raquo; 添加新字段
	<?php } ?>
</div>

<form method="post" id="field_add" action="<?php echo admin_url('fields','save');?>" onsubmit="return field_add_check('<?php echo $app->db->prefix;?>','<?php echo $id;?>');">
<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
<div class="table">
	<div class="title">
		字段名称：
		<span class="note">设置一个名称，该名称在表单的头部信息显示</span></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="text" id="title" name="title" class="default" value="<?php echo $rs['title'];?>" /></td>
			<td><div id="title_note"></div></td>
		</tr>
		</table>
	</div>
</div>

<div class="table">
	<div class="title">
		字段备注：
		<span class="note">仅限后台管理使用，用于查看这个字段主要做什么</span></span>
	</div>
	<div class="content"><input type="text" id="note" name="note" class="long" value="<?php echo $rs['note'];?>" /></div>
</div>

<div class="table">
	<div class="title">
		字段标识：
		<span class="note">仅限 <span class="darkblue b">字母、数字及下划线，且必须以字母开头</span></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="text" id="identifier" name="identifier" class="default"<?php if($id){ ?> value="<?php echo $rs['identifier'];?>" disabled<?php } ?> /></td>
			<td><div id="identifier_note"></div></td>
		</tr>
		</table>
	</div>
</div>

<div class="table">
	<div class="title">
		字段类型：
		<span class="note">设置存储的类型，一经创建不允许修改</span>
	</div>
	<div class="content">
		<table>
		<tr>
			<td><label><input type="radio" name="field_type" value="varchar"<?php if($rs['field_type'] == 'varchar' || !$id){ ?> checked<?php } ?> /> 字符串（最长255个字符）</label></td>
			<td><label><input type="radio" name="field_type" value="longtext"<?php if($rs['field_type'] == 'longtext'){ ?> checked<?php } ?> /> 长文本</label></td>
			<td><label><input type="radio" name="field_type" value="longblob"<?php if($rs['field_type'] == 'longblob'){ ?> checked<?php } ?> /> 二进制数据</label></td>
		</tr>
		</table>
	</div>
</div>

<div class="table">
	<div class="title">
		表单类型：
		<span class="note">请选择字段要使用的表单</span>
	</div>
	<div class="content">
		<ul class="layout">
			<?php $form_list_id["num"] = 0;$form_list=is_array($form_list) ? $form_list : array();$form_list_id["total"] = count($form_list);$form_list_id["index"] = -1;foreach($form_list AS $key=>$value){ $form_list_id["num"]++;$form_list_id["index"]++; ?>
			<li><label><input type="radio" name="form_type" value="<?php echo $key;?>"<?php if($key == $rs['form_type']){ ?> checked<?php } ?> onclick="_phpok_form_opt(this.value,'form_type_ext','<?php echo $id;?>','fields')" /><?php echo $value;?></label></li>
			<?php } ?>
		</ul>
		<div class="clear"></div>
	</div>
</div>

<div id="form_type_ext" style="display:none;"></div>

<div class="table">
	<div class="title">
		CSS：
		<span class="note">长度不能超过250个字符，建议您不要在这里设置宽高</span>
	</div>
	<div class="content"><input type="text" id="form_style" name="form_style" class="long" value="<?php echo $rs['form_style'];?>" /></div>
</div>

<div class="table">
	<div class="title">
		表单默认值：
		<span class="note">设置表单默认值，如果表单中有多个值，请用英文逗号隔开</span>
	</div>
	<div class="content"><input type="text" id="content" name="content" class="long" value="<?php echo $rs['content'];?>" /></div>
</div>


<div class="table">
	<div class="title">
		接收数据格式化：
		<span class="note">设置文本常见格式，如HTML，整型，浮点型等</span>
	</div>
	<div class="content">
		<select name="format" id="format">
			<?php if(!$id){ ?><option value="">请选择…</option><?php } ?>
			<?php $format_list_id["num"] = 0;$format_list=is_array($format_list) ? $format_list : array();$format_list_id["total"] = count($format_list);$format_list_id["index"] = -1;foreach($format_list AS $key=>$value){ $format_list_id["num"]++;$format_list_id["index"]++; ?>
			<option value="<?php echo $key;?>"<?php if($rs['format'] == $key){ ?> selected<?php } ?>><?php echo $value;?></option>			
			<?php } ?>
		</select>
	</div>
</div>

<div class="table">
	<div class="title">
		使用范围：
		<span class="note">设置该字段的使用范围，<a href="javascript:$.input.checkbox_all('mylayout');void(0);">全选</a> <a href="javascript:$.input.checkbox_none('mylayout');void(0);">全不选</a> <a href="javascript:$.input.checkbox_anti('mylayout');void(0);">反选</a></span>
	</div>
	<div class="content">
		<ul class="layout" id="mylayout">
			<?php $arealist_id["num"] = 0;$arealist=is_array($arealist) ? $arealist : array();$arealist_id["total"] = count($arealist);$arealist_id["index"] = -1;foreach($arealist AS $key=>$value){ $arealist_id["num"]++;$arealist_id["index"]++; ?>
			<li><label for="area_<?php echo $key;?>"><input type="checkbox" name="area[]" id="area_<?php echo $key;?>" value="<?php echo $key;?>"<?php if(in_array($key,$area)){ ?> checked<?php } ?> /><?php echo $value;?></label></li>
			<?php } ?>
		</ul>
		<div class="clear"></div>
	</div>
</div>
<input type="hidden" name="taxis" id="taxis" value="<?php echo $rs['taxis'] ? $rs['taxis'] : 255;?>" />

<div class="table">
	<div class="content">
		<br />
		<input type="submit" value="提 交" class="submit" />
		<br />
	</div>
</div>
</form>

<?php if($id){ ?>
<script type="text/javascript">
$(document).ready(function(){
	_phpok_form_opt("<?php echo $rs['form_type'];?>","form_type_ext","<?php echo $id;?>","fields");
});
</script>
<?php } ?>

<?php $this->output("foot","file"); ?>