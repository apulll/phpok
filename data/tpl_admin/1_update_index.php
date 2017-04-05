<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title="程序升级";?><?php $this->assign("title","程序升级"); ?><?php $this->output("head","file"); ?>
<div class="tips">欢迎您使用在线升级功能，本工具支持用户配置升级服务器</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#project li").each(function(i){
		$(this).click(function(){
			var tips = $(this).attr('tips');
			var url = $(this).attr('href');
			if(tips){
				$.dialog.confirm(tips,function(){
					$.phpok.go(url);
				})
			}else{
				$.phpok.go(url);
			}
		});
	});
});
</script>
<ul class="project" id="project">
	<?php if($update['online']){ ?>
	<li title="升级PHPOK核心程序" href="<?php echo phpok_url(array('ctrl'=>'update','func'=>'main'));?>" tips="在线升级会连接远程服务器，响应较慢，请耐心等候！<br>不使用在线升级，请点“取消”">
		<div class="img"><img src="images/ico/update.png" /></div>
		<div class="txt">在线升级</div>
	</li>
	<?php } ?>
	<?php if($update['zip']){ ?>
	<li title="ZIP压缩包升级" href="<?php echo phpok_url(array('ctrl'=>'update','func'=>'zip'));?>">
		<div class="img"><img src="images/ico/zip.png" /></div>
		<div class="txt">压缩包升级</div>
	</li>
	<?php } ?>
	<li title="配置升级服务器环境" href="<?php echo phpok_url(array('ctrl'=>'update','func'=>'set'));?>">
		<div class="img"><img src="images/ico/setting.png" /></div>
		<div class="txt">升级配置</div>
	</li>
</ul>
<div class="clear"></div>
<?php $this->output("foot","file"); ?>