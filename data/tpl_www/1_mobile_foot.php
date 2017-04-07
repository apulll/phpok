<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?>	</div>
<div data-role="popup" id="popupkf">
	<?php $list = phpok('online-service');?>
	<ul class="kfonline" data-role="listview" data-inset="true">
		<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
		<li data-icon="user"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $value['qq'];?>&site=qq&menu=yes" target="_blank"><?php echo $value['title'];?>（<?php echo $value['qq'];?>）</a></li>
		<?php } ?>
		<?php $list = phpok('contact');?>
		<?php if($list && $list['tel']){ ?>
		<li data-icon="phone"><a href="tel:<?php echo $list['tel'];?>" target="_blank">客服电话：<?php echo $list['tel'];?></a></li>
		<?php } ?>
	</ul>
</div>
<div data-role="footer" data-position="fixed" style="padding-bottom:0;">
	<div data-role="navbar" class="ui-body-b">
	<ul>
		<li><a href="<?php echo $sys['url'];?>" data-icon="home">网站首页</a></li>
		<li><a href="<?php echo phpok_url(array('id'=>'about-us'));?>" data-icon="info">关于我们</a></li>
		<li><a href="<?php echo phpok_url(array('ctrl'=>'post','id'=>'message'));?>" data-icon="edit">反馈留言</a></li>
		<li><a href="#popupkf" data-icon="phone" data-transition="pop" data-rel="popup">在线客服</a></li>
	</ul>
	</div>
</div>
</div>
<?php echo $app->plugin_html_ap("phpokbody");?></body>
</html>