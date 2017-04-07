<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title=$page_rs['title'];?><?php $this->assign("title",$page_rs['title']); ?><?php $this->output("head","file"); ?>
<script type="text/javascript" src="js/jquery.artdialog.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#postsave").submit(function(){
		if(!$("#title").val()){
			layer.open({
			    content: '<?php echo $page_rs['alias_title'] ? $page_rs['alias_title'] : "主题";?>不能为空',
			    btn: ['确定']
			});
			return false;
		}
		$(this).ajaxSubmit({
			'url':api_url('post','save'),
			'type':'post',
			'dataType':'json',
			'success':function(rs){
				if(rs.status == 'ok'){
					layer.open({
					    content: '感觉您提交的信息<br />我们客服会尽快处理',
					    btn: ['确定'],
					    shadeClose:false,
					    yes:function(){
						    var backurl = '<?php echo $_back;?>';
							$.phpok.go(backurl);
					    }
					});
				}else{
					layer.open({
					    content: rs.content,
					    btn: ['确定']
					});
					return false;
				}
			}
		});
		return false;
	});
});
</script>

<div role="main" class="ui-content">
	<form method="post" id="postsave" onsubmit="return false">
		<input type="hidden" name="id" value="<?php echo $page_rs['identifier'];?>" />
		<label><?php echo $page_rs['alias_title'] ? $page_rs['alias_title'] : '主题';?>：<input type="text" name="title" id="title" value=""></label>
		<?php $tmpid["num"] = 0;$extlist=is_array($extlist) ? $extlist : array();$tmpid["total"] = count($extlist);$tmpid["index"] = -1;foreach($extlist AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<label><?php echo $value['title'];?>：<?php echo $value['html'];?></label>
		<?php } ?>
		<?php if($sys['is_vcode'] && function_exists('imagecreate')){ ?>
		<label>验证码：
			<input class="vcode"  type="text" name="_chkcode" id="_chkcode" />
			<img src="" border="0" align="absmiddle" id="vcode" />
		</label>
		<script type="text/javascript">
		$(document).ready(function(){
			$("#vcode").phpok_vcode();
			$("#vcode").click(function(){
				$(this).phpok_vcode();
			});
		});
		</script>
		<?php } ?>
		<input type="submit" value="提交" data-theme="b" />
	</form>
</div>
<?php $this->output("foot","file"); ?>