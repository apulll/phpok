<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><input type="hidden" name="ext_form_id" id="ext_form_id" value="width,height" />
<div class="table">
	<div class="title">
		表单宽度：
		<span class="note">设置表单的宽度，这是只需要<span class="red">填写数字</span></span>
	</div>
	<div class="content">
		<input type="text" name="width" id="width" value="<?php echo $rs['width'];?>" /> px
	</div>
</div>
<div class="table">
	<div class="title">
		表单高度：
		<span class="note">设置表单的高度，这是只需要<span class="red">填写数字</span>，单位是px</span>
	</div>
	<div class="content">
		<input type="text" name="height" id="height" value="<?php echo $rs['height'];?>" /> px
	</div>
</div>
