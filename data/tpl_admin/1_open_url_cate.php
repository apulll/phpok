<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_open","file"); ?>
<script type="text/javascript">
function select_input(val,val2,title)
{
	var obj = $.dialog.opener;
	if(val == "index"){
		obj.$("#<?php echo $id;?>,#<?php echo $id;?>_default").val("index.php");
		obj.$("#<?php echo $id;?>_rewrite").val("index.html");
	}else{
		var old = obj.$("#title").val();
		if(!old && old != 'undefined'){
			obj.$("#title").val(title)
		}
		obj.$("#<?php echo $id;?>,#<?php echo $id;?>_default").val("index.php?id="+val+"&cate="+val2);
		obj.$("#<?php echo $id;?>_rewrite").val(val+"/"+val2+".html");
	}
	$.dialog.close();
}
function go_back()
{
	$.phpok.go('<?php echo phpok_url(array('ctrl'=>'open','func'=>'url','id'=>$id));?>');
}
</script>
<div class="list">
<table width="100%" cellpadding="0" cellspacing="0" class="list">
<tr>
	<th class="id">ID</th>
	<th class="title">分类名称</th>
	<th style='width:80px;'>操作</th>
</tr>
<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist AS $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
<tr>
	<td class="center" height="25px"><?php echo $value['id'];?></td>
	<td style="text-align: left;padding-left:10px;">
		<table cellpadding="0" cellspacing="0" class="bdnone">
		<tr>
			<?php for($i=1;$i<$value['_layer'];$i++){ ?>
			<td class="cate_line">&nbsp;</td>
			<?php } ?>
			<?php if($value['_layer']>0){ ?>
				<td class="cate_middle">&nbsp;</td>
			<?php } ?>
			<td><label for="id_<?php echo $value['id'];?>"><?php echo $value['title'];?><span class="gray i">（<?php echo $value['identifier'];?>）</span></label></td>
			<?php if(!$value['status']){ ?>
			<td><span class="red i">未审核</span></td>			
			<?php } ?>
			<?php if($value['note']){ ?>
			<td class="cate_note">（<?php echo $value['note'];?>）</td>
			<?php } ?>
		</tr>
		</table>
	</td>
	<td>
		<a href="javascript:select_input('<?php echo $p_rs['identifier'];?>','<?php echo $value['identifier'];?>','<?php echo $value['title'];?>');void(0)">提交</a>
	</td>
</tr>
<?php } ?>
</table>
</div>
<div align="center" style="margin:10px;"><input type="button" value="返回" class="btn" onclick="go_back()" /></div>
<?php $this->output("foot_open","file"); ?>
