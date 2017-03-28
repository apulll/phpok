<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_open","file"); ?>
<script type="text/javascript">
function phpok_input(val)
{
	var obj = $.dialog.opener;
	obj.$("#<?php echo $id;?>").val(val);
	$.dialog.close();
}
</script>
<div class="tips">
	站点：<span class="red"><?php echo $site_rs['title'];?></span>，
	风格：<span class="red"><?php echo $rs['title'];?></span>，
	当前路径：<span class="red"><?php echo $folder;?></span>
	<?php if($folder != "/"){ ?>
	，<a href="<?php echo admin_url('tpl','open');?>&id=<?php echo $id;?>" title="返回根目录">点此返回根目录</a>
	<?php } ?>
</div>
<div class="list">
<table class="list" width="100%">
<tr>
	<th width="40px">类型</th>
	<th>名称</th>
	<th width="150px">时间</th>
</tr>
<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist AS $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
	<?php if($value['tplid']){ ?>
	<tr class="hand" onclick="phpok_input('<?php echo $value['tplid'];?>')">
		<td><img src="images/filetype/html.gif" border="0" alt="文件：<?php echo $value['title'];?>"></td>
		<td class="lft"><?php echo $value['title'];?></td>
		<td><?php echo $value['date'];?></td>
	</tr>
	<?php } else { ?>
		<?php if($value['type'] == "dir" && $value['url']){ ?>
		<tr class="hand" onclick="direct('<?php echo $value['url'];?>')">
			<td><img src="images/filetype/dir.gif" border="0" alt="文件夹：<?php echo $value['title'];?>"></td>
			<td class="lft"><?php echo $value['title'];?></td>
			<td><?php echo $value['date'];?></td>
		</tr>
		<?php } else { ?>
		<tr class="hand" onclick="$.dialog.alert('名称：<?php echo $value['title'];?><br />路径：<?php echo $value['filename'];?><br />日期：<?php echo $value['date'];?>')">
			<td><img src="images/filetype/<?php echo $value['type'];?>.gif" border="0" alt="文件夹：<?php echo $value['title'];?>"></td>
			<td class="lft"><?php echo $value['title'];?></td>
			<td><?php echo $value['date'];?></td>
		</tr>
		<?php } ?>
	<?php } ?>
<?php } ?>
</table>
</div>

<?php $this->output("foot_open","file"); ?>