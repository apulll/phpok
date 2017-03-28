<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><footer class="footer">
  <div class="nav-sec">
    <?php $list = phpok('menu');?>
	<?php $list_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_id["total"] = count($list['rslist']);$list_id["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
		<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>" target="<?php echo $value['target'];?>"><?php echo $value['title'];?></a>
<?php } ?>
  </div>
  <p><?php echo $config['ext']['content'];?></p>
</footer>

<?php echo $app->plugin_html_ap("phpokbody");?></body>
</html>