<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<script type="text/javascript">
function field_form_opt(val,eid)
{
	if(!val || val == "undefined"){
		$("#form_type_ext").html('').hide();
		return false;
	}
	var url = get_url("form","config") + "&id="+$.str.encode(val);
	if(eid && eid != "undefined"){
		url += "&eid="+eid;
	}
	url += "&etype=fields";
	var html = get_ajax(url);
	if(html && html != 'exit'){
		$("#form_type_ext").html(html).show();
	}
}

function save()
{
	var obj = art.dialog.opener;
	$("#form_save").ajaxSubmit({
		'url':get_url('module','field_addok','mid=<?php echo $mid;?>'),
		'type':'post',
		'dataType':'json',
		'success':function(rs){
			if(rs.status == 'ok'){
				$.dialog.alert('<?php echo P_Lang("字段创建成功");?>',function(){
					obj.$.dialog.close();
					obj.$.phpok.reload();
				});
			}else{
				$.dialog.alert(rs.content);
				return false;
			}
		}
	});
}
</script>
<div class="tips clearfix">
	您当前的位置：
	<a href="<?php echo phpok_url(array('ctrl'=>'module'));?>">模块管理</a>
	&raquo; <a href="<?php echo phpok_url(array('ctrl'=>'module','func'=>'fields','id'=>$mid));?>" title="<?php echo $m_rs['title'];?>"><?php echo $m_rs['title'];?></a>
	&raquo; 添加字段
</div>
<form method="post" id="form_save" onsubmit="return false">
<div class="table">
	<div class="title">
		名称/标识：
		<span class="note">名称会在表单中体现，标识限：<span class="darkblue b">字母、数字及下划线，且必须以字母开头</span></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="text" id="title" name="title" value="<?php echo $rs['title'];?>" placeholder="名称" /></td>
			<td>&nbsp;/&nbsp;</td>
			<td><input type="text" id="identifier" name="identifier" value="<?php echo $rs['identifier'];?>" placeholder="标识" /></td>
		</tr>
		</table>
	</div>
</div>

<div class="table">
	<div class="title">
		字段备注：
		<span class="note">填写表单时，指定这个项目的注意事项</span></span>
	</div>
	<div class="content"><input type="text" id="note" name="note" class="long" value="<?php echo $rs['note'];?>" /></div>
</div>

<div class="table">
	<div class="title">
		字段类型 / 表单类型：
		<span class="note">请慎重选项此项，一般创建后不要修改。</span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<select name="field_type" id="field_type">
					<option value="">请选择字段类型…</option>
					<?php $fields_id["num"] = 0;$fields=is_array($fields) ? $fields : array();$fields_id["total"] = count($fields);$fields_id["index"] = -1;foreach($fields AS $key=>$value){ $fields_id["num"]++;$fields_id["index"]++; ?>
					<option value="<?php echo $key;?>"<?php if($rs['field_type'] == $key){ ?> selected<?php } ?>><?php echo $value;?></option>
					<?php } ?>
				</select>
			</td>
			<td>&nbsp;/&nbsp;</td>
			<td>
				<select name="form_type" id="form_type" onchange="field_form_opt(this.value,'<?php echo $id;?>')">
					<option value="">请选择表单类型…</option>
					<?php $forms_id["num"] = 0;$forms=is_array($forms) ? $forms : array();$forms_id["total"] = count($forms);$forms_id["index"] = -1;foreach($forms AS $key=>$value){ $forms_id["num"]++;$forms_id["index"]++; ?>
					<option value="<?php echo $key;?>"<?php if($key == $rs['form_type']){ ?> selected<?php } ?>><?php echo $value;?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		</table>
	</div>
</div>

<div id="form_type_ext" style="display:none;"></div>
<input type="hidden" name="form_style" id="form_style" value="<?php echo $rs['form_style'];?>" />

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
			<?php $format_list_id["num"] = 0;$formats=is_array($formats) ? $formats : array();$format_list_id["total"] = count($formats);$format_list_id["index"] = -1;foreach($formats AS $key=>$value){ $format_list_id["num"]++;$format_list_id["index"]++; ?>
			<option value="<?php echo $key;?>"<?php if($rs['format'] == $key){ ?> selected<?php } ?>><?php echo $value;?></option>			
			<?php } ?>
		</select>
	</div>
</div>

<div class="table">
	<div class="title">
		排序：
		<span class="note">值越小越往前靠，可选范围：1-255</span>
	</div>
	<div class="content">
		<input type="text" name="taxis" id="taxis" value="<?php echo $rs['taxis'] ? $rs['taxis'] : 255;?>" />
	</div>
</div>
<div class="table">
	<div class="title">
		前端处理：
		<span class="note">设置前端是否可用，如果需要前端加载相应属性请在这里操作！</span>
	</div>
	<div class="content">
		<table>
		<tr>
			<td><label><input type="radio" name="is_front" value="0"<?php if(!$rs['is_front']){ ?> checked<?php } ?> />禁用</label></td>
			<td><label><input type="radio" name="is_front" value="1"<?php if($rs['is_front']){ ?> checked<?php } ?> />使用</label></td>
		</tr>
		</table>
	</div>
</div>

</form>
<?php $this->output("foot_open","file"); ?>
