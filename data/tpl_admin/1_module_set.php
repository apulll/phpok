<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head","file"); ?>
<script type="text/javascript" src="<?php echo add_js('module.js');?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#title").blur(function(){check_title(false)});
});
</script>

<div class="tips">
	您当前的位置：
	<a href="<?php echo admin_url('module');?>">模块管理</a>
	&raquo; <?php if($id){ ?>编辑模块<?php } else { ?>创建模块<?php } ?>
</div>

<form method="post" id="module_add" action="<?php echo admin_url('module','save');?>" onsubmit="return module_check();">
<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
<div class="table">
	<div class="title">
		名称：
		<span class="note">设置一个名称，该名称将在应用中读取，不受站点影响</span></span>
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
		备注：
		<span class="note">仅限后台管理使用，用于查看该模块主要做什么</span></span>
	</div>
	<div class="content"><input type="text" id="note" name="note" class="long" value="<?php echo $rs['note'];?>" /></div>
</div>




<div class="table">
	<div class="title">
		排序：
		<span class="note">值越小越往前靠，最小值为0，最大值为255</span>
	</div>
	<div class="content"><input type="text" id="taxis" name="taxis" class="short" value="<?php echo $rs['taxis'] ? $rs['taxis'] : 255;?>" /></div>
</div>

<div class="table">
	<div class="content">
		<br />
		<input type="submit" value="提 交" class="submit" />
		<br />
	</div>
</div>
</form>

<?php if($rs['is_biz']){ ?>
<script type="text/javascript">
$(document).ready(function(){
	phpok_biz(1);
});
</script>
<?php } ?>

<?php $this->output("foot","file"); ?>