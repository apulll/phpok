<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<div class="tips">
	<?php echo P_Lang("您当前的位置：");?><a href="<?php echo phpok_url(array('ctrl'=>'gd'));?>" title="<?php echo P_Lang("图片方案");?>"><?php echo P_Lang("图片方案");?></a>
	&raquo; <?php if($id){ ?><?php echo P_Lang("编辑方案");?><?php } else { ?><?php echo P_Lang("添加方案");?><?php } ?>
	<div class="action"><a href="<?php echo phpok_url(array('ctrl'=>'gd'));?>"><?php echo P_Lang("返回方案列表");?></a></div>
	<div class="clear"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#gdsetting").submit(function(){
		$(this).ajaxSubmit({
			'url':"<?php echo phpok_url(array('ctrl'=>'gd','func'=>'save'));?>",
			'type':'post',
			'dataType':'json',
			'success':function(rs){
				if(rs.status == 'ok'){
					var t = $("#id").val() ? '<?php echo P_Lang("方案编辑成功");?>' : '<?php echo P_Lang("方案创建成功");?>';
					$.dialog.alert(t,function(){
						$.phpok.go('<?php echo phpok_url(array('ctrl'=>'gd'));?>');
					},'succeed');
				}else{
					$.dialog.alert(rs.content);
				}
			}
		});
		return false;
	});
});
</script>
<form method="post" id='gdsetting'>
<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
<div class="table">
	<div class="title">
		<?php echo P_Lang("标识：");?>
		<span class="note"><?php echo P_Lang("标识必须是唯一的，添加后不能修改");?></span>
	</div>
	<div class="content"><input type="text" id="identifier" name="identifier" class="default" value="<?php echo $rs['identifier'];?>"<?php if($id){ ?> disabled<?php } ?> /></div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("宽度：");?>
		<span class="note"><?php echo P_Lang("设置宽度，仅支持数字，不限请设为０");?></span>
	</div>
	<div class="content"><input type="text" id="width" name="width" class="short" value="<?php echo $rs['width'];?>" /> <?php echo P_Lang("px，请只填写数字！");?></div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("高度：");?>
		<span class="note"><?php echo P_Lang("同上");?></span>
	</div>
	<div class="content"><input type="text" id="height" name="height" class="short" value="<?php echo $rs['height'];?>" /> <?php echo P_Lang("px，同上");?></div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("水印：");?>
		<span class="note"><?php echo P_Lang("设置水印图片，这里推荐使用PNG透明水印");?></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="text" id="mark_picture" name="mark_picture" class="default" value="<?php echo $rs['mark_picture'];?>" /></td>
			<td><input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_pic('mark_picture')" class="btn" /></td>
			<td><input type="button" value="<?php echo P_Lang("预览");?>" onclick="phpok_pic_view('mark_picture')" class="btn" /></td>
			<td><input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#mark_picture').val('');" class="btn" /></td>
		</tr>
		</table>
	</div>
</div>

<div class="table" id="gd_position">
	<div class="title">
		<?php echo P_Lang("水印位置：");?>
		<span class="note"><?php echo P_Lang("设置水印图片要放置的位置，推荐");?><span class="red"><?php echo P_Lang("右下角");?></span></span>
	</div>
	<div class="content">
		<table style="border:1px solid #464646;">
		<tr>
			<td height="30px"><label for="mark_position_1"><input type="radio" name="mark_position" id="mark_position_1" value="top-left"<?php if($rs['mark_position'] == "top-left"){ ?> checked<?php } ?> /> <?php echo P_Lang("左上角");?></label></td>
			<td><label for="mark_position_2"><input type="radio" name="mark_position" id="mark_position_2" value="top-middle"<?php if($rs['mark_position'] == "top-middle"){ ?> checked<?php } ?> /> <?php echo P_Lang("中上");?></label></td>
			<td><label for="mark_position_3"><input type="radio" name="mark_position" id="mark_position_3" value="top-right"<?php if($rs['mark_position'] == "top-right"){ ?> checked<?php } ?> /> <?php echo P_Lang("右上角");?></label></td>
		</tr>
		<tr>
			<td height="30px"><label for="mark_position_4"><input type="radio" name="mark_position" id="mark_position_4" value="middle-left"<?php if($rs['mark_position'] == "middle-left"){ ?> checked<?php } ?> /> <?php echo P_Lang("左中");?></label></td>
			<td><label for="mark_position_5"><input type="radio" name="mark_position" id="mark_position_5" value="middle-middle"<?php if($rs['mark_position'] == "middle-middle"){ ?> checked<?php } ?> /> <?php echo P_Lang("中间");?></label></td>
			<td><label for="mark_position_6"><input type="radio" name="mark_position" id="mark_position_6" value="middle-right"<?php if($rs['mark_position'] == "middle-right"){ ?> checked<?php } ?> /> <?php echo P_Lang("右中");?></label></td>
		</tr>
		<tr>
			<td height="30px"><label for="mark_position_7"><input type="radio" name="mark_position" id="mark_position_7" value="bottom-left"<?php if($rs['mark_position'] == "bottom-left"){ ?> checked<?php } ?> /> <?php echo P_Lang("左下角");?></label></td>
			<td><label for="mark_position_8"><input type="radio" name="mark_position" id="mark_position_8" value="bottom-middle"<?php if($rs['mark_position'] == "bottom-middle"){ ?> checked<?php } ?> /> <?php echo P_Lang("中下");?></label></td>
			<td><label for="mark_position_9"><input type="radio" name="mark_position" id="mark_position_9" value="bottom-right"<?php if($rs['mark_position'] == "bottom-right" || !$rs['mark_position']){ ?> checked<?php } ?> /> <?php echo P_Lang("右下角");?></label></td>
		</tr>
		</table>
	</div>
</div>

<div class="table" id="gd_trans">
	<div class="title">
		<?php echo P_Lang("透明度：");?>
		<span class="note"><?php echo P_Lang("仅JPG水印有效，建议设为65");?></span>
	</div>
	<div class="content">
		<select name="trans" id="trans">
			<option value="0"<?php if(!$rs['trans']){ ?> selected<?php } ?>><?php echo P_Lang("完全透明");?></option>
			<option value="10"<?php if($rs['trans'] == "10"){ ?> selected<?php } ?>>10</option>
			<option value="20"<?php if($rs['trans'] == "20"){ ?> selected<?php } ?>>20</option>
			<option value="30"<?php if($rs['trans'] == "30"){ ?> selected<?php } ?>>30</option>
			<option value="40"<?php if($rs['trans'] == "40"){ ?> selected<?php } ?>>40</option>
			<option value="50"<?php if($rs['trans'] == "50"){ ?> selected<?php } ?>>50<?php echo P_Lang("（半透明）");?></option>
			<option value="60"<?php if($rs['trans'] == "60"){ ?> selected<?php } ?>>60</option>
			<option value="70"<?php if($rs['trans'] == "70"){ ?> selected<?php } ?>>70</option>
			<option value="80"<?php if($rs['trans'] == "80"){ ?> selected<?php } ?>>80</option>
			<option value="90"<?php if($rs['trans'] == "90"){ ?> selected<?php } ?>>90</option>
			<option value="100"<?php if($rs['trans'] == "100"){ ?> selected<?php } ?>><?php echo P_Lang("不透明");?></option>
		</select>
	</div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("图片质量：");?>
		<span class="note"><?php echo P_Lang("一般来说，设置为：");?><span class="red"><?php echo P_Lang("高质量");?></span> <?php echo P_Lang("即可，仅JPG图片有效");?></span>
	</div>
	<div class="content">
		<select id="quality" name="quality">
			<option value="60"<?php if($rs['quality'] == "60"){ ?> selected<?php } ?>><?php echo P_Lang("较小文件");?></option>
			<option value="80"<?php if($rs['quality'] == "80" || !$rs['quality']){ ?> selected<?php } ?>><?php echo P_Lang("高质量");?></option>
			<option value="100"<?php if($rs['quality'] == "100"){ ?> selected<?php } ?>><?php echo P_Lang("百分百精度");?></option>
		</select>
	</div>
</div>


<div class="table">
	<div class="title">
		<?php echo P_Lang("图片生成方式：");?>
		<span class="note"><?php echo P_Lang("建议大图用缩放法，小图用裁剪法");?></span>
	</div>
	<div class="content">
		<select id="cut_type" name="cut_type">
			<option value="0"><?php echo P_Lang("缩放法");?></option>
			<option value="1"<?php if($rs['cut_type']){ ?> selected<?php } ?>><?php echo P_Lang("裁剪法");?></option>
		</select>
	</div>
</div>

<script type="text/javascript" src="js/jscolor/jscolor.js"></script>

<div class="table">
	<div class="title">
		<?php echo P_Lang("背景颜色：");?>
		<span class="note"><?php echo P_Lang("即填充色，默认为白色");?></span>
	</div>
	<div class="content"><input type="text" id="bgcolor" name="bgcolor" value="<?php echo $rs['bgcolor'];?>" class="color {pickerClosable:true}" /></div>
</div>
<br />
<div class="table">
	<div class="content">
		<input type="submit" value="<?php echo P_Lang("提 交");?>" class="submit2" />
	</div>
</div>
</form>

<?php $this->output("foot","file"); ?>