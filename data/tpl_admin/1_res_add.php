<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<script type="text/javascript">
var obj_upload = {};
var obj = art.dialog.opener;
$(document).ready(function(){
	cate_change();
});
function cate_change()
{
	val = $("#cate_id").val();
	if(!val){
		$.dialog.alert('请选择要存储的目标分类');
		return false;
	}
	var data = $("#cate_id option[value="+val+"]").attr('data');
	var catename = $("#cate_id option[value="+val+"]").attr('catename');
	obj_upload = new $.admin_upload({
		"multiple"	: 'true',
		"id" : "upload",
		'pick':{'id':'#upload_picker','multiple':true},
		'resize':false,
		"swf" : "js/webuploader/uploader.swf",
		"server": "<?php echo phpok_url(array('ctrl'=>'upload','func'=>'save'));?>",
		"filetypes" : "<?php echo $rs['ext'];?>",
		'accept' : {'title':catename,'extensions':data},
		"formData" :{'<?php echo session_name();?>':'<?php echo session_id();?>','cateid':val},
		'fileVal':'upfile',
		'auto':false,
		"success":function(){
			return true;
		}
	});
	obj_upload.uploader.on('uploadFinished',function(){
		$.dialog.alert('附件上传成功',function(){
			obj.$.phpok.reload();
		});
	});
}
function save()
{
	
	var f = $("#upload_progress .phpok-upfile-list").length;
	if(f<1){
		$.dialog.alert('请选择要上传的文件');
		return false;
	}
	obj_upload.uploader.upload();
	return false;
}
function cancel()
{
	return obj_upload.uploader.stop();
}
</script>

<div class="table">
	<div class="title">
		<?php echo P_Lang("附件分类：");?>
		<span class="note"><?php echo P_Lang("请选择要上传的附件分类");?></span>
	</div>
	<div class="content">
		<select id="cate_id" name="cate_id" onchange="cate_change()">
			<?php $catelist_id["num"] = 0;$catelist=is_array($catelist) ? $catelist : array();$catelist_id["total"] = count($catelist);$catelist_id["index"] = -1;foreach($catelist AS $key=>$value){ $catelist_id["num"]++;$catelist_id["index"]++; ?>
			<option value="<?php echo $value['id'];?>"<?php if($value['is_default']){ ?> selected<?php } ?> data="<?php echo $value['filetypes'];?>" catename="<?php echo $value['title'];?>">
			<?php echo $value['title'];?><?php if($value['typeinfos']){ ?> / <?php echo P_Lang("支持上传格式：");?><?php echo $value['typeinfos'];?><?php } ?></option>
			<?php } ?>
		</select>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("选择要上传的文件：");?>
		<span class="note"><?php echo P_Lang("单个文件上传不能超过：");?><span class="red"><?php echo get_cfg_var('upload_max_filesize');?></span></span>
	</div>
	<div class="content"><div id="upload_picker" class=""></div></div>
</div>

<div class="table">
	<div class="content" id="upload_progress"></div>
</div>

<?php $this->output("foot_open","file"); ?>