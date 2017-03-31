<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><input type="hidden" name="ext_form_id" id="ext_form_id" value="cate_id,is_multiple,upload_auto" />
<div class="table">
	<div class="title">
		<?php echo P_Lang("默认存储到：");?>
		<span class="note"><?php echo P_Lang("设置该图片默认存到哪个文件夹下，不设置使用默认");?></span>
	</div>
	<div class="content">
	<ul style="list-style:none;margin:0;padding:0;">
		<?php $catelist_id["num"] = 0;$catelist=is_array($catelist) ? $catelist : array();$catelist_id["total"] = count($catelist);$catelist_id["index"] = -1;foreach($catelist AS $key=>$value){ $catelist_id["num"]++;$catelist_id["index"]++; ?>
		<li style="line-height:200%;"><label><input type="radio" name="cate_id" value="<?php echo $value['id'];?>"<?php if($rs['cate_id'] == $value['id'] || (!$rs['cate_id'] && $rs['is_default'])){ ?> checked<?php } ?> /><?php echo $value['title'];?> &nbsp; <span class="gray i"><?php echo P_Lang("附件类型：");?><?php echo $value['filetypes'];?></span></label></li>
		<?php } ?>
	</ul>
	<div class="clear"></div>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("表单附件属性：");?>
		<span class="note"></span>
	</div>
	<div class="content">
	<ul class="layout">
		<li><label><input type="radio" name="is_multiple" value="0"<?php if(!$rs['is_multiple']){ ?> checked<?php } ?> /><?php echo P_Lang("单个附件");?></label></li>
		<li><label><input type="radio" name="is_multiple" value="1"<?php if($rs['is_multiple']){ ?> checked<?php } ?> /><?php echo P_Lang("多附件");?></label></li>
	</ul>
	<div class="clear"></div>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("选择后即刻上传：");?>
		<span class="note"></span>
	</div>
	<div class="content">
	<ul class="layout">
		<li><label><input type="radio" name="upload_auto" value="0"<?php if(!$rs['upload_auto']){ ?> checked<?php } ?> /><?php echo P_Lang("否");?></label></li>
		<li><label><input type="radio" name="upload_auto" value="1"<?php if($rs['upload_auto']){ ?> checked<?php } ?> /><?php echo P_Lang("是");?></label></li>
	</ul>
	<div class="clear"></div>
	</div>
</div>