<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<script type="text/javascript" src="<?php echo include_js('list.js');?>"></script>
<script type="text/javascript">
function set_ext_cateid(val)
{
	var main_cateid = $("input[name=cate_id]:checked").val();
	if(!main_cateid || main_cateid == 'undefined'){
		$("input[name=cate_id][value="+val+"]").attr('checked',true);
		return true;
	}
	if(main_cateid == val){
		$("#ext_cate_id_"+val).attr('checked',true);
		$.dialog.alert('<?php echo P_Lang("当前分类已设置为主分类，扩展分类不支持取消");?>');
	}
}
function set_main_cateid(val)
{
	$("input[name=cate_id][value="+val+"]").attr('checked',true);
	$("#ext_cate_id_"+val).attr('checked',true);
}

$(document).keypress(function(e){
	if(e.ctrlKey && e.which == 13 || e.which == 10) {
		$('#phpok_submit_<?php echo $pid;?>').click();
	}
});
$(document).ready(function(){
	$("#_listedit").submit(function(){
		var id = $("#id").val();
		var pcate = parseInt("<?php echo $p_rs['cate'];?>");
		var pcate_multiple = '<?php echo $p_rs['cate_multiple'];?>';
		$(this).ajaxSubmit({
			'url':'<?php echo phpok_url(array('ctrl'=>'list','func'=>'ok'));?>',
			'type':'post',
			'dataType':'json',
			'success':function(rs){
				if(rs.status == 'ok'){
					var url = "<?php echo phpok_url(array('ctrl'=>'list','func'=>'','id'=>$pid));?>";
					if(pcate>0){
						if(pcate_multiple > 0){
							var cateid = $("input[name=cate_id]:checked").val();
						}else{
							var cateid = $("#cate_id").val();
						}
						url += "&cateid="+cateid;
					}
					if(id){
						$.dialog.alert('<?php echo P_Lang("内容信息修改成功");?>',function(){
							$.phpok.go(url);
						},'succeed');
					}else{
						$.dialog({
							'icon':'succeed',
							'content':'<?php echo P_Lang("内容添加操作成功，请选择继续添加或返回列表");?>',
							'ok':function(){$.phpok.reload();},
							'okVal':'<?php echo P_Lang("继续添加");?>',
							'cancel':function(){$.phpok.go(url);},
							'cancelVal':'<?php echo P_Lang("返回列表");?>',
							'lock':true
						});
					}
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
	<?php echo P_Lang("您当前的位置：");?><?php echo P_Lang("内容管理");?>
	<?php if($pid){ ?>
		<?php $plist_id["num"] = 0;$plist=is_array($plist) ? $plist : array();$plist_id["total"] = count($plist);$plist_id["index"] = -1;foreach($plist AS $key=>$value){ $plist_id["num"]++;$plist_id["index"]++; ?>
		&raquo; <a href="<?php echo admin_url('list','action');?>&id=<?php echo $value['id'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a>
		<?php } ?>
	<?php } ?>	
	<?php if($parent_id){ ?>
	&raquo; <?php echo P_Lang("父主题：");?><a href="<?php echo admin_url('list','edit');?>&id=<?php echo $parent_id;?>" title=""><span class="red"><?php echo $parent_rs['title'];?></span></a>
	<?php } ?>
	&raquo; <?php if($id){ ?><?php echo P_Lang("编辑内容");?><?php } else { ?><?php echo P_Lang("添加内容");?><?php } ?>
</div>
<form method="post" id="_listedit">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>" />
<input type="hidden" name="parent_id" id="parent_id" value="<?php echo $parent_id;?>" />
<div class="main1">
	<div class="table">
	<div class="content">
		<input type="text" name="title" id="title" value="<?php echo $rs['title'];?>" class="title" placeholder="请在此输入<?php echo $p_rs['alias_title'] ? $p_rs['alias_title'] : '主题';?><?php if($p_rs['alias_note']){ ?>，<?php echo $p_rs['alias_note'];?><?php } ?>" />
		<input type="text" name="title_en" id="title_en" value="<?php echo $rs['title_en'];?>" class="title_en" placeholder="" />
	</div>
	</div>
	<?php if($attrlist && $p_rs['is_attr']){ ?>
	<div class="table"><div class="content">
	<ul class="layout">
		<li><?php echo P_Lang("属性：");?></li>
		<?php $attr = $rs['attr'] ? explode(",",$rs['attr']) : array();?>
		<?php $attrlist_id["num"] = 0;$attrlist=is_array($attrlist) ? $attrlist : array();$attrlist_id["total"] = count($attrlist);$attrlist_id["index"] = -1;foreach($attrlist AS $key=>$value){ $attrlist_id["num"]++;$attrlist_id["index"]++; ?>
		<li><label><input type="checkbox" name="attr[]" id="_attr_<?php echo $key;?>" value="<?php echo $key;?>"<?php if(in_array($key,$attr)){ ?> checked<?php } ?> /><?php echo $value;?></label></li>
		<?php } ?>
	</ul>
	</div></div>
	<?php } ?>
	<?php if($p_rs['cate'] && !$p_rs['cate_multiple']){ ?>
	<div class="table"><div class="content">
	<select name="cate_id" id="cate_id" style="width:99%;padding:3px;">
		<option value="">请选择分类…</option>
		<?php $tmpid["num"] = 0;$catelist=is_array($catelist) ? $catelist : array();$tmpid["total"] = count($catelist);$tmpid["index"] = -1;foreach($catelist AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<option value="<?php echo $value['id'];?>"<?php if($value['id'] == $rs['cate_id']){ ?> selected<?php } ?>><?php echo $value['_space'];?><?php echo $value['title'];?></option>
		<?php } ?>
	</select>
	</div></div>
	<?php } ?>
	<?php $extlist_id["num"] = 0;$extlist=is_array($extlist) ? $extlist : array();$extlist_id["total"] = count($extlist);$extlist_id["index"] = -1;foreach($extlist AS $key=>$value){ $extlist_id["num"]++;$extlist_id["index"]++; ?>
	<div class="table clearfix">
		<div class="title">
			<?php echo $value['title'];?>：
			<span class="note"><?php echo $value['note'];?>
				<?php if($value['is_edit']){ ?>
				<?php if($ext_module != 'add-list'){ ?>
				<a class="icon edit" onclick="ext_edit('<?php echo $value['identifier'];?>','<?php echo $ext_module;?>')"></a>
				<?php } ?>
				<a class="icon delete" onclick="ext_delete('<?php echo $value['identifier'];?>','<?php echo $ext_module;?>','<?php echo $value['title'];?>')"></a>
				<?php } ?>
			</span>
		</div>
		<div class="content"><?php echo $value['html'];?></div>
	</div>
	<?php } ?>
	<?php if($p_rs['is_tag']){ ?>
	<div class="table">
		<div class="title">
			Tag标签
			<span class="note">多个Tag用英文空格分开，最多不能超过10个</span>
		</div>
		<div class="content"><input type="text" id="tag" name="tag" class='title' value='<?php echo $rs['tag'];?>' /></div>
	</div>
	<?php } ?>
</div>
<div class="main2">
	<?php if($p_rs['is_identifier']){ ?>
	<div class="pfw mb10">
		<h3><?php echo P_Lang("自定义网址标识");?></h3>
		<div style="padding:5px">
			<div class="gray"><?php echo P_Lang("限");?><span class="red"><?php echo P_Lang("字母、数字、下划线或中划线且必须是字母开头，");?></span></div>
			<div style="padding:5px 0;"><input type="text" id="identifier" name="identifier" value="<?php echo $rs['identifier'];?>" style="width:99%;margin-bottom:5px;" /></div>
		</div>
	</div>
	<?php } ?>
	<?php if($p_rs['cate'] && $p_rs['cate_multiple']){ ?>
	<div class="pfw mb10">
		<h3>所属分类</h3>
		<div class="cate_list clearfix" style="margin:0;max-height:250px;overflow-y:scroll;">
			<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<th width="30px">主</th>
				<th>扩展分类</th>
			</tr>
			<?php $tmpid["num"] = 0;$catelist=is_array($catelist) ? $catelist : array();$tmpid["total"] = count($catelist);$tmpid["index"] = -1;foreach($catelist AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<tr<?php if($tmpid['num']%2){ ?> class="list"<?php } ?>>
				<td align="center"><input type="radio" name="cate_id" value="<?php echo $value['id'];?>"<?php if($rs['cate_id'] == $value['id']){ ?> checked<?php } ?> onclick="set_main_cateid('<?php echo $value['id'];?>')" /></td>
				<td>
					<table cellpadding="0" cellspacing="0">
					<tr>
						<?php for($i=1;$i<$value['_layer'];$i++){ ?>
						<td class="cate_line">&nbsp;</td>
						<?php } ?>
						<?php if($value['_layer']){ ?>
						<td class="cate_middle">&nbsp;</td>
						<?php } ?>
						<td><input type="checkbox" name="ext_cate_id[]" value="<?php echo $value['id'];?>" id="ext_cate_id_<?php echo $value['id'];?>" onclick="set_ext_cateid('<?php echo $value['id'];?>')"<?php if(in_array($value['id'],$extcate)){ ?> checked<?php } ?> /></td>
						<td><label for="ext_cate_id_<?php echo $value['id'];?>"><?php echo $value['title'];?></label></td>
					</tr>
					</table>
				</td>
			</tr>
			<?php } ?>
			</table>
		</div>
	</div>
	<?php } ?>
	<script type="text/javascript">
	function show_dateline()
	{
		laydate({
			elem:"#dateline",
			istime: true,
			format: 'YYYY-MM-DD hh:mm:ss',
			fixed:true
		});
	}
	</script>
	<div class="pfw mb10">
		<h3><?php echo P_Lang("其他属性");?></h3>
		<table width="100%">
		<tr>
			<td align="right"><?php echo P_Lang("状态：");?></td>
			<td>
				<ul class="layout">
					<li><label><input type="radio" name="status" id="status_0" value="0"<?php if($id && !$rs['status']){ ?> checked<?php } ?> /><?php echo P_Lang("未审核");?></label></li>
					<li><label><input type="radio" name="status" id="status_1" value="1"<?php if(!$id || $rs['status']){ ?> checked<?php } ?> /><?php echo P_Lang("已审核");?></label></li>
				</ul>
			</td>
		</tr>
		<tr>
			<td align="right"><?php echo P_Lang("是否隐藏：");?></td>
			<td>
				<ul class="layout">
					<li><label><input type="radio" name="hidden" id="hidden_0" value="0"<?php if(!$rs['hidden']){ ?> checked<?php } ?> /><?php echo P_Lang("显示");?></label></li>
					<li><label><input type="radio" name="hidden" id="hidden_1" value="1"<?php if($rs['hidden']){ ?> checked<?php } ?> /><?php echo P_Lang("隐藏");?></label></li>
				</ul>
			</td>
		</tr>
		<tr>
			<td align="right"><?php echo P_Lang("发布时间：");?></td>
			<td><input type="text" id="dateline" name="dateline" class="default" value="<?php if($rs['dateline']){ ?><?php echo date('Y-m-d H:i:s',$rs['dateline']);?><?php } else { ?><?php echo date('Y-m-d H:i:s',$sys['time']);?><?php } ?>" onfocus="show_dateline()" /></td>
		</tr>
		<tr>
			<td align="right"><?php echo P_Lang("阅读量：");?></td>
			<td><input type="text" id="hits" name="hits" class="short" value="<?php echo $rs['hits'];?>" /></td>
		</tr>
		<tr>
			<td align="right"><?php echo P_Lang("排序：");?></td>
			<td><input type="text" id="sort" name="sort" class="short" value="<?php echo $rs['sort'];?>" /></td>
		</tr>
		</table>
	</div>
	<?php if($p_rs['is_tpl_content']){ ?>
	<div class="pfw mb10">
		<h3><?php echo P_Lang("自定义内容模板");?></h3>
		<table width="100%">
		<tr>
			<td><input type="text" id="tpl" name="tpl" class="default" value="<?php echo $rs['tpl'];?>" /></td>
			<td><input type="button" value="选择" onclick="phpok_tpl_open('tpl')" class="btn" /></td>
			<td><input type="button" value="清空" onclick="$('#tpl').val('');" class="btn" /></td>
		</tr>
		<tr>
			<td colspan="3">
				<div class="gray"><?php echo P_Lang("为空将使用");?> <span class="red"><?php echo $p_rs['tpl_content'] ? $p_rs['tpl_content'] : $p_rs['identifier'].'_content';?></span></div>
			</td>
		</tr>
		</table>
	</div>
	<?php } ?>
	<?php if($p_rs['is_seo']){ ?>
	<div class="pfw mb10">
		<h3><?php echo P_Lang("SEO优化");?></h3>
		<div class="table">
			<div class="title">
				<?php echo P_Lang("SEO标题：");?>
				<span class="note"><?php echo P_Lang("设置此标题后，网站Title将会替代默认定义的，不能超过50个汉字");?></span>
			</div>
			<div class="content">
				<input type="text" id="seo_title" name="seo_title" class="long" value="<?php echo $rs['seo_title'];?>" />
			</div>
		</div>
		<div class="table">
			<div class="title">
				<?php echo P_Lang("SEO关键字：");?>
				<span class="note"><?php echo P_Lang("多个关键字用英文逗号隔开，为空将使用默认");?></span>
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
	</div>
	<?php } ?>
	<div class="pfw mb10">
		<h3><?php echo P_Lang("扩展主题字段");?></h3>
		<div class="table">
			<div class="content">
				<select id="_tmp_select_add" style="padding:3px">
					<option value="">请选择扩展字段…</option>
					<?php $extfields_id["num"] = 0;$extfields=is_array($extfields) ? $extfields : array();$extfields_id["total"] = count($extfields);$extfields_id["index"] = -1;foreach($extfields AS $key=>$value){ $extfields_id["num"]++;$extfields_id["index"]++; ?>
					<option value="<?php echo $value['id'];?>"><?php echo $value['title'];?> - <?php echo $value['identifier'];?></option>
					<?php } ?>
				</select>
			</div>
			<div class="content">
				<div class="button-group">
					<input type="button" value="<?php echo P_Lang("快速添加");?>" onclick="_update_select_add()" class="phpok-btn" />
					<input type="button" value="<?php echo P_Lang("手动创建字段");?>" onclick="ext_add('<?php echo $ext_module;?>')" class="phpok-btn" />
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	function _update_select_add()
	{
		var val = $("#_tmp_select_add").val();
		if(!val){
			$.dialog.alert('请选择要添加的扩展');
			return false;
		}
		ext_add2(val,'<?php echo $ext_module;?>');
	}
	</script>
</div>
<div class="clear"></div>
<div class="table">
	<div class="content">
		<input type="submit" value="<?php echo P_Lang("提 交");?>" class="submit2" id="phpok_submit_<?php echo $pid;?>" />
	</div>
</div>
</form>
<script type="text/javascript">
function win_resize()
{
	var width = $('.main .tips').width();
	if(width>=1000){
		var main1_width = width - 320;
		$(".main1").css('width',main1_width+"px").css('float','left');
		$(".main2").css('width','300px').css('float','right');
		var h = $(".main2").height();
		var d_h = $(window).height() - 30;
		if(h < d_h){
			$('.main2').css('position','fixed').css('top','30px').css('right','0px');
		}
	}else{
		$(".main1,.main2").css('width',width+"px").css("float",'none');
	}
}
$(document).ready(function(){
	win_resize();
	$(window).resize(win_resize);
});
</script>

<?php $this->output("foot","file"); ?>