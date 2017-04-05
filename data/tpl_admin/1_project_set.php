<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<script type="text/javascript">
function show_module(val)
{
	if(val && val != "0"){
		$("#tmp_orderby_btn").html("");
		$("#module_set").show();
		var url = get_url("project","mfields") + "&id="+val;
		rs = json_ajax(url);
		if(rs.status == "ok"){
			var lst = rs.content;
			var c = '';
			for(var i in lst){
				c += '<li><input type="button" value="'+lst[i].title+'" onclick="phpok_admin_orderby(\'orderby\',\'ext.'+lst[i].identifier+'\')"/></li>';
			}
			$("#tmp_orderby_btn").html(c);
		}else{
			$.dialog.alert(rs.content);
			return false;
		}
	}else{
		$("#module_set").hide();
	}
}

function cate_add(title)
{
	var url = get_url('cate',"add");
	$.dialog.open(url,{
		"title":title,
		"width":"700px",
		"height":"300px",
		"lock":true,
		"win_max":false,
		"win_min":false,
		'move':false
	});
}

function set_biz()
{
	var status = $("#is_biz").attr('checked');
	if(status){
		$("#use_biz_setting").show();
	}else{
		$("#use_biz_setting").hide();
	}
}

function set_post_status()
{
	var status = $("#post_status").attr('checked');
	if(status){
		$("#email_set_post_status").show();
		$("li[name=f_post]").show();
	}else{
		$("#email_set_post_status").hide();
		$("li[name=f_post]").find('input').attr("checked",false);
		$("li[name=f_post]").hide();
	}
}

function set_comment_status()
{
	var status = $("#comment_status").attr('checked');
	if(status){
		$("#email_set_comment_status").show();
		$("li[name=f_reply]").show();
	}else{
		$("#email_set_comment_status").hide();
		$("li[name=f_reply]").find('input').attr("checked",false);
		$("li[name=f_reply]").hide();
	}
}
$(document).ready(function(){
	$("#<?php echo $ext_module;?>").submit(function(){
		$(this).ajaxSubmit({
			'url':"<?php echo phpok_url(array('ctrl'=>'project','func'=>'save'));?>",
			'type':'post',
			'dataType':'json',
			'success':function(rs){
				if(rs.status == 'ok'){
					var tip = $("#id").val() ? '<?php echo P_Lang("项目信息编辑成功");?>' : '<?php echo P_Lang("项目信息创建成功");?>';
					$.dialog.alert(tip,function(){
						$.phpok.go('<?php echo phpok_url(array('ctrl'=>'project'));?>');
					},'succeed');
				}else{
					$.dialog.alert(rs.content);
					return false;
				}
			}
		});
		return false;
	});
});
</script>
<div class="tips">
	<?php echo P_Lang("您当前的位置：");?>
	<a href="<?php echo phpok_url(array('ctrl'=>'project'));?>"><?php echo P_Lang("项目管理");?></a>
	&raquo; <?php if($id){ ?><?php echo P_Lang("编辑项目");?><?php } else { ?><?php echo P_Lang("添加项目");?><?php } ?>
</div>
<ul class="group">
	<li class="on" onclick="$.admin.group(this)" name="main"><?php echo P_Lang("基本");?></li>
	<li onclick="$.admin.group(this)" name="admin"><?php echo P_Lang("扩展");?></li>
	<li onclick="$.admin.group(this)" name="seo"><?php echo P_Lang("SEO优化");?></li>
</ul>

<form method="post" id="<?php echo $ext_module;?>">
<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
<div id="main_setting">
<div class="table">
	<div class="title">
		<?php echo P_Lang("名称：");?>
		<span class="note"><?php echo P_Lang("设置名称，该名称将在网站前台导航中使用");?></span>
	</div>
	<div class="content"><input type="text" id="title" name="title" class="default" value="<?php echo $rs['title'];?>" /></div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("项目别名：");?>
		<span class="note"><?php echo P_Lang("此别名功能仅限在后台使用，用于显示在按钮上，一般不要超过6个汉字");?></span>
	</div>
	<div class="content">
		<input type="text" id="nick_title" name="nick_title" class="default" value="<?php echo $rs['nick_title'];?>" />
	</div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("排序：");?>
		<span class="note"><?php echo P_Lang("自定义排序，值越小越往前靠");?></span>
	</div>
	<div class="content"><input type="text" id="taxis" name="taxis" class="short" value="<?php echo $rs['taxis'] ? $rs['taxis'] : '255';?>" /></div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("项目属性：");?>
		<span class="note"><?php echo P_Lang("设置项目的一些功能，如停用，隐藏，打勾表示启用这个功能");?></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><label><input type="checkbox" name="lock"<?php if(!$rs['status']){ ?> checked<?php } ?> />锁定<span class="gray i">（勾选此项后，前台将停用）</span></label></td>
			<td><label><input type="checkbox" name="hidden"<?php if($rs['hidden']){ ?> checked<?php } ?> />隐藏</label></td>
		</tr>
		</table>
	</div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("父栏目：");?>
		<span class="note"><?php echo P_Lang("实现父子栏目可以实现数据交叉使用");?></span>
	</div>
	<div class="content">
		<select id="parent_id" name="parent_id">
		<option value="0"><?php echo P_Lang("设为父栏目");?></option>
		<?php $parent_list_id["num"] = 0;$parent_list=is_array($parent_list) ? $parent_list : array();$parent_list_id["total"] = count($parent_list);$parent_list_id["index"] = -1;foreach($parent_list AS $key=>$value){ $parent_list_id["num"]++;$parent_list_id["index"]++; ?>
		<?php if($rs['id'] != $value['id']){ ?>
		<option value="<?php echo $value['id'];?>"<?php if($rs['parent_id'] == $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
		<?php } ?>
		<?php } ?>
		</select>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("标识：");?>
		<span class="note"><?php echo P_Lang("限");?><span class="red"><?php echo P_Lang("字母、数字、下划线或中划线且必须是字母开头，");?></span><?php echo P_Lang("首页专用请设置为");?><span class="red">index</span></span>
	</div>
	<div class="content">
		<input type="text" id="identifier" name="identifier" class="default" value="<?php echo $rs['identifier'];?>" />
	</div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("绑定模块：");?>
		<span class="note"><?php echo P_Lang("实现类似新闻，产品等多条项目信息，绑定成功后建议不要修改，以防止数据混乱！");?></span>
	</div>
	<div class="content">
		<select id="module" name="module" onchange="show_module(this.value)">
		<option value="0"><?php echo P_Lang("不关联模块");?></option>
		<?php $module_list_id["num"] = 0;$module_list=is_array($module_list) ? $module_list : array();$module_list_id["total"] = count($module_list);$module_list_id["index"] = -1;foreach($module_list AS $key=>$value){ $module_list_id["num"]++;$module_list_id["index"]++; ?>
		<option value="<?php echo $value['id'];?>"<?php if($value['id'] == $rs['module']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
		<?php } ?>
		</select>
	</div>
</div>

<div id="module_set" class="hidden">
	<div class="table">
		<div class="title">
			<?php echo P_Lang("主题别名：");?>
			<span class="note"><?php echo P_Lang("在使用模块时，会有一个必填选项，即主题，您可在这里设置别名");?></span>
		</div>
		<div class="content">
			<input type="text" id="alias_title" name="alias_title" class="default" value="<?php echo $rs['alias_title'];?>" />
		</div>
	</div>

	<div class="table">
		<div class="title">
			<?php echo P_Lang("主题备注：");?>
			<span class="note"><?php echo P_Lang("同上");?></span>
		</div>
		<div class="content">
			<input type="text" id="alias_note" name="alias_note" class="long" value="<?php echo $rs['alias_note'];?>" />
		</div>
	</div>

	<div class="table">
		<div class="title">
			<?php echo P_Lang("扩展项：");?>
			<span class="note"><?php echo P_Lang("请根据实际情况设置相应的扩展项，勾选表示启用");?></span>
		</div>
		<div class="content">
		<table class="list" cellspacing="0" style="padding:1px;border:1px solid #ccc;">
		<tr>
			<td><input type="checkbox" name="is_attr" id="is_attr"<?php if($rs['is_attr']){ ?> checked<?php } ?> /></td>
			<td><label for="is_attr"><?php echo P_Lang("主题属性");?></label></td>
			<td class="gray i"><?php echo P_Lang("相当于给主题增加标签，如精华，推荐，热荐等");?></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="is_search" id="is_search"<?php if($rs['is_search']){ ?> checked<?php } ?> /></td>
			<td><label for="is_search"><?php echo P_Lang("搜索");?></label></td>
			<td class="gray i"><?php echo P_Lang("勾选此项后，该项目在前台将支持搜索");?></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="is_tag" id="is_tag"<?php if($rs['is_tag']){ ?> checked<?php } ?> /></td>
			<td><label for="is_tag"><?php echo P_Lang("标签");?></label></td>
			<td class="gray i"><?php echo P_Lang("允许用户自定义标签内容，以方便网站优化");?></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="subtopics" id="subtopics"<?php if($rs['subtopics']){ ?> checked<?php } ?> /></td>
			<td><label for="subtopics"><?php echo P_Lang("下级主题");?></label></td>
			<td class="gray i"><?php echo P_Lang("启用此项，主题将支持二级，多用于二级导航");?></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="post_status" id="post_status"<?php if($rs['post_status']){ ?> checked<?php } ?> onclick="set_post_status()" /></td>
			<td><label for="post_status"><?php echo P_Lang("发布");?></label></td>
			<td class="gray i"><?php echo P_Lang("勾选此项，被授权的用户可以在前台有发布权限");?></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="is_tpl_content" id="is_tpl_content"<?php if($rs['is_tpl_content']){ ?> checked<?php } ?> /></td>
			<td><label for="is_tpl_content"><?php echo P_Lang("自定义模板");?></label></td>
			<td class="gray i"><?php echo P_Lang("后台添加主题后允许绑定模板，此项仅限后台管理员操作");?></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="is_seo" id="is_seo"<?php if($rs['is_seo']){ ?> checked<?php } ?> /></td>
			<td><label for="is_seo"><?php echo P_Lang("自定义SEO");?></label></td>
			<td class="gray i"><?php echo P_Lang("允许管理员针对主题自定义相关的SEO信息");?></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="is_identifier" id="is_identifier"<?php if($rs['is_identifier']){ ?> checked<?php } ?> /></td>
			<td><label for="is_identifier"><?php echo P_Lang("自定义标识");?></label></td>
			<td class="gray i"><?php echo P_Lang("启用此项后，允许管理员针对添加的主题设定一个标识，更便于用户记住及SEO优化");?></td>
		</tr>
		</table>
		</div>
	</div>

	<div id="email_set_post_status"<?php if(!$rs['post_status']){ ?> style="display:none"<?php } ?>>
	<div class="table">
		<div class="title">
			<?php echo P_Lang("发布通知管理员邮件模板：");?>
			<span class="note"><?php echo P_Lang("仅限启用：前台发布 后有效");?></span>
		</div>
		<div class="content">
			<select name="etpl_admin">
				<option value=""><?php echo P_Lang("不通知管理员");?></option>
				<?php $emailtpl_id["num"] = 0;$emailtpl=is_array($emailtpl) ? $emailtpl : array();$emailtpl_id["total"] = count($emailtpl);$emailtpl_id["index"] = -1;foreach($emailtpl AS $key=>$value){ $emailtpl_id["num"]++;$emailtpl_id["index"]++; ?>
				<option value="<?php echo $value['identifier'];?>"<?php if($rs['etpl_admin'] == $value['identifier']){ ?> selected<?php } ?>><?php echo P_Lang("通知管理员模板：");?><?php echo $value['title'];?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	</div>

	<div class="table">
		<div class="title">
			<?php echo P_Lang("默认主题数：");?>
			<span class="note"><?php echo P_Lang("设置每页默认的主题数量");?></span>
		</div>
		<div class="content">
			<input type="text" id="psize" name="psize" value="<?php echo $rs['psize'] ? $rs['psize'] : 30;?>" class="short" />
		</div>
	</div>

	<div class="table">
		<div class="title">
			<?php echo P_Lang("数据排序：");?>
			<span class="note"><?php echo P_Lang("设置好默认排序，有利于网站的管理（前后台一致）");?></span>
		</div>
		<div class="content">
			<input type="text" id="orderby" name="orderby" class="long" value="<?php echo $rs['orderby'] ? $rs['orderby'] : 'l.sort ASC,l.dateline DESC,l.id DESC';?>" />
			<input type="button" value="<?php echo P_Lang("清空");?>" class="btn" onclick="$('#orderby').val('')" />
			<ul class="btnlist">
				<li><input type="button" value="<?php echo P_Lang("点击");?>" onclick="phpok_admin_orderby('orderby','l.hits')" /></li>
				<li><input type="button" value="<?php echo P_Lang("时间");?>" onclick="phpok_admin_orderby('orderby','l.dateline')" /></li>
				<li><input type="button" value="<?php echo P_Lang("回复时间");?>" onclick="phpok_admin_orderby('orderby','l.replydate')" /></li>
				<li><input type="button" value="ID" onclick="phpok_admin_orderby('orderby','l.id')" /></li>
				<li><input type="button" value="<?php echo P_Lang("人工");?>" onclick="phpok_admin_orderby('orderby','l.sort')" /></li>
				<span id="tmp_orderby_btn">
				</span>
			</ul>
		</div>
	</div>
	<script type="text/javascript">
	function refresh_catelist()
	{
		var url = get_url("project","rootcate");
		url = url.replace(/&amp;/g,"&");
		$.ajax({
			url:url
			,cache:false
			,async:true
			,dataType:"json"
			,success:function(rs){
				if(rs.status == "ok")
				{
					var info = '<option value="0"><?php echo P_Lang("不关联分类");?></option>';
					var lst = rs.content;
					for(var i in lst)
					{
						info += '<option value="'+lst[i]['id']+'">'+lst[i]['title']+'</option>';
					}
					$("#cate").html(info);
				}
			}
		});
	}
	function update_show_select(val)
	{
		if(val && val != 'undefined' && val != '0'){
			$("#cate_multiple_set").show();
		}else{
			$("#cate_multiple_set").hide();
		}
	}
	</script>
	<div class="table">
		<div class="title">
			<?php echo P_Lang("关联根分类：");?>
			<span class="note"><?php echo P_Lang("启用此项后，添加内容时，需要选对相对应的分类，且不能为空");?></span>
		</div>
		<div class="content">
			<select id="cate" name="cate" onchange="update_show_select(this.value)">
			<option value="0"><?php echo P_Lang("不关联分类");?></option>
			<?php $catelist_id["num"] = 0;$catelist=is_array($catelist) ? $catelist : array();$catelist_id["total"] = count($catelist);$catelist_id["index"] = -1;foreach($catelist AS $key=>$value){ $catelist_id["num"]++;$catelist_id["index"]++; ?>
			<option value="<?php echo $value['id'];?>"<?php if($value['id'] == $rs['cate']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
			<?php } ?>
			</select>
			<input type="button" value="<?php echo P_Lang("添加根分类");?>" onclick="cate_add(this.value)" />
		</div>
	</div>
	<div class="table" id="cate_multiple_set"<?php if(!$rs['cate']){ ?> style="display:none"<?php } ?>>
		<div class="title">
			<?php echo P_Lang("分类选项：");?>
			<span class="note">请设置分类是否支持多选</span>
		</div>
		<div class="content">
			<table>
			<tr>
				<td><label><input type="radio" name="cate_multiple" value="0"<?php if(!$rs['cate_multiple']){ ?> checked<?php } ?> />单选</label></td>
				<td><label><input type="radio" name="cate_multiple" value="1"<?php if($rs['cate_multiple']){ ?> checked<?php } ?> />多选</label></td>
			</tr>
			</table>
		</div>
	</div>
</div>

</div>
<div id="admin_setting" class="hide">

<div class="table">
	<div class="title">
		<?php echo P_Lang("封面模板：");?>
		<span class="note"><?php echo P_Lang("设定此模板将启用封面功能，不启用留空，不绑定模块时，此项不能为空");?></span>
	</div>
	<div class="content">
		<input type="text" id="tpl_index" name="tpl_index" class="default" value="<?php echo $rs['tpl_index'];?>" />
		<input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_tpl_open('tpl_index')" class="btn" />
		<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#tpl_index').val('');" class="btn" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("列表模板：");?>
		<span class="note"><?php echo P_Lang("仅限于绑定模块后才能生效");?></span>
	</div>
	<div class="content">
		<input type="text" id="tpl_list" name="tpl_list" class="default" value="<?php echo $rs['tpl_list'];?>" />
		<input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_tpl_open('tpl_list')" class="btn" />
		<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#tpl_list').val('');" class="btn" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("内容模板：");?>
		<span class="note"><?php echo P_Lang("仅限于绑定模块后才能生效");?></span>
	</div>
	<div class="content">
		<input type="text" id="tpl_content" name="tpl_content" class="default" value="<?php echo $rs['tpl_content'];?>" />
		<input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_tpl_open('tpl_content')" class="btn" />
		<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#tpl_content').val('');" class="btn" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("发布模板：");?>
		<span class="note"><?php echo P_Lang("仅限于绑定模块且启用发布功能后有效");?></span>
	</div>
	<div class="content">
		<input type="text" id="post_tpl" name="post_tpl" class="default" value="<?php echo $rs['post_tpl'];?>" />
		<input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_tpl_open('post_tpl')" class="btn" />
		<input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#post_tpl').val('');" class="btn" />
	</div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("图标：");?>
		<span class="note"><?php echo P_Lang("请选择一个直观的图标，大小为：48x48，建议使用PNG格式");?></span>
	</div>
	<div class="content">
		<ul class="layout">
			<?php $icolist_id["num"] = 0;$icolist=is_array($icolist) ? $icolist : array();$icolist_id["total"] = count($icolist);$icolist_id["index"] = -1;foreach($icolist AS $key=>$value){ $icolist_id["num"]++;$icolist_id["index"]++; ?>
			<li><label title="<?php echo basename($value);?>">
				<table>
				<tr>
					<td><input type="radio" name="ico" value="<?php echo $value;?>"<?php if($rs['ico'] == $value){ ?> checked<?php } ?> /></td>
					<td><img src="<?php echo $value;?>" alt="<?php echo basename($value);?>" /></td>
				</tr>
				</table>
			</label></li>
			<?php } ?>
			<div class="clear"></div>
		</ul>
	</div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("后台备注说明：");?>
		<span class="note"><?php echo P_Lang("将显示在内容管理布局区那里，用于提示编辑人员注意事项");?></span>
	</div>
	<div class="content"><?php echo $note_content;?></div>
</div>

</div>
<div id="seo_setting" class="hide">
<div class="table">
	<div class="title">
		<?php echo P_Lang("SEO标题：");?>
		<span class="note"><?php echo P_Lang("设置此标题后，网站Title将会替代默认定义的，不能超过85个汉字");?></span>
	</div>
	<div class="content">
		<input type="text" id="seo_title" name="seo_title" class="long" value="<?php echo $rs['seo_title'];?>" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("SEO关键字：");?>
		<span class="note"><?php echo P_Lang("多个关键字用英文逗号或英文竖线隔开");?></span>
	</div>
	<div class="content">
		<input type="text" id="seo_keywords" name="seo_keywords" class="long" value="<?php echo $rs['seo_keywords'];?>" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("SEO描述：");?>
		<span class="note"><?php echo P_Lang("简单描述该主题信息，用于搜索引挈，不支持HTML，不能超过85个汉字");?></span>
	</div>
	<div class="content">
		<textarea name="seo_desc" id="seo_desc" class="long"><?php echo $rs['seo_desc'];?></textarea>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("Tag标签：");?>
		<span class="note"><?php echo P_Lang("多个标签用英文空格隔开，最多不能超过10个词");?></span>
	</div>
	<div class="content">
		<input type="text" id="tag" name="tag" class="long" value="<?php echo $rs['tag'];?>" />
	</div>
</div>
</div>
<div class="clear"></div>
<div class="table">
	<div class="content">
		<br />
		<input type="submit" value="<?php echo P_Lang("提 交");?>" class="submit2" />
		<br />
	</div>
</div>
</form>


<script type="text/javascript">
$(document).ready(function(){
	var mid = $("#module").val();
	show_module(mid);
});
</script>
<?php $this->output("foot","file"); ?>