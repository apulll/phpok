<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $code_editor_info = form_edit('meta',$rs['meta'],'code_editor','width=650&height=200');?>
<?php $this->output("head","file"); ?>
<script type="text/javascript" src="<?php echo include_js('all.js');?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	top.$.desktop.title('<?php echo P_Lang("网站信息");?>');
});
function rand_click()
{
	var $chars = 'ABCDEFGHIJKMNOPQRSTUVWXYZabcdefghijkmnopqrstuwxyz0123456789!@#%-_*';
	var maxPos = $chars.length;
	var pwd = '';
	for (i = 0; i < 16; i++) {
		pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
	}
	$("#api_code").val(pwd);
}
</script>
<div class="tips clearfix">
	<?php echo P_Lang("您当前的位置：");?>
	<a href="<?php echo admin_url('all');?>"><?php echo P_Lang("全局维护");?></a>
	&raquo; <?php echo P_Lang("编辑网站信息");?>
</div>
<div class="body">
<ul class="group">
	<li class="on" onclick="$.admin.group(this)" name="main" title="<?php echo P_Lang("网站基本信息");?>"><?php echo P_Lang("基本设置");?></li>
	<li onclick="$.admin.group(this)" name="admin" title="<?php echo P_Lang("开关网站，设置风格，语言等功能");?>"><?php echo P_Lang("扩展信息");?></li>
	<li onclick="$.admin.group(this)" name="seo" title="<?php echo P_Lang("全站SEO信息设置");?>"><?php echo P_Lang("SEO优化");?></li>
	<li onclick="$.admin.group(this)" name="email" title="<?php echo P_Lang("邮件发送模块设置");?>"><?php echo P_Lang("SMTP设置");?></li>
</ul>

<form method="post" id="cate_post" action="<?php echo admin_url('all','save');?>" onsubmit="return all_setting_check();">
<div id="main_setting">
<div class="table">
	<div class="title">
		<?php echo P_Lang("网站名称：");?>
		<span class="note"><?php echo P_Lang("即在前台使用的名称信息");?></span></span>
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
		<?php echo P_Lang("域名：");?>
		<span class="note"><?php echo P_Lang("网站域名，不用填写http://，也不能填写 / 结束符");?></span></span>
	</div>
	<div class="content"><input type="text" id="domain" name="domain" class="default" value="<?php echo $rs['domain'];?>" /></div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("安装目录");?>
		<span class="note"><?php echo P_Lang("根目录请用 /，其他目录请写目录名且要求以 / 结束，如：/phpok/");?></span></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="text" id="dir" name="dir" class="default" value="<?php echo $rs['dir'];?>" /></td>
			<td><div id="title_note"></div></td>
		</tr>
		</table>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("网站LOGO");?>
		<span class="note"><?php echo P_Lang("绑定网站的LOGO信息");?></span></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="text" id="logo" name="logo" class="default" value="<?php echo $rs['logo'];?>" /></td>
			<td><input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_pic('logo')" class="btn" /></td>
			<td><input type="button" value="<?php echo P_Lang("预览");?>" onclick="phpok_pic_view('logo')" class="btn" /></td>
			<td><input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#logo').val('');" class="btn" /></td>
		</tr>
		</table>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("API验证串：");?>
		<span class="note"><?php echo P_Lang("用于数据加密通迅时使用，建议定期更改");?></span>
	</div>
	<div class="content">
		<input type="text" id="api_code" name="api_code" class="default" value="<?php echo $rs['api_code'];?>" />
		<input type="button" value="<?php echo P_Lang("随机生成");?>" onclick="rand_click()" class="btn" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("网页扩展说明：");?>
		<span class="note"><?php echo P_Lang("添加页头信息，如添加google验证，百度验证等，支持HTML");?></span>
	</div>
	<div class="content">
		<?php echo $code_editor_info;?>
	</div>
</div>
</div>
<div id="seo_setting" class="hide">
<div class="table">
	<div class="title">
		网址优化：
		<span class="note">本系统全面支持网址优化，您可以根据自身条件进行设置</span>
	</div>
	<div class="content">
		<table>
		<tr>
			<td><label><input type="radio" name="url_type" value="default"<?php if($rs['url_type'] == "default" || !$rs['url_type']){ ?> checked<?php } ?> /> <?php echo P_Lang("默认，动态网址");?></label></td>
			<td class="gray"><?php echo P_Lang("示例：");?>http://www.domain.com/index.php?id=<?php echo P_Lang("标识或数字ID");?></td>
		</tr>
		<tr>
			<td><label><input type="radio" name="url_type" value="rewrite"<?php if($rs['url_type'] == "rewrite"){ ?> checked<?php } ?> /> <?php echo P_Lang("伪静态页");?></label></td>
			<td class="gray"><?php echo P_Lang("示例：");?>http://www.domain.com/<?php echo P_Lang("标识或数字ID");?>.html</td>
		</tr>
		</table>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("SEO标题：");?>
		<span class="note"><?php echo P_Lang("针对HTML里的Title属性进行优化，建议使用英文竖线分割开来，不超过80字");?></span></span>
	</div>
	<div class="content">
		<input type="text" id="seo_title" name="seo_title" class="long" value="<?php echo $rs['seo_title'];?>" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("SEO关键字：");?>
		<span class="note"><?php echo P_Lang("简单明了用几个词来描述您的网站，多个词用英文逗号隔开");?></span></span>
	</div>
	<div class="content">
		<input type="text" id="seo_keywords" name="seo_keywords" class="long" value="<?php echo $rs['seo_keywords'];?>" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("SEO摘要：");?>
		<span class="note"><?php echo P_Lang("针对您的网站，简单描述其作用，目标群体，未来方向等信息，建议不超过100字");?></span>
	</div>
	<div class="content"><textarea id="seo_desc" name="seo_desc" class="long"><?php echo $rs['seo_desc'];?></textarea></div>
</div>
</div>
<input type="hidden" name="api" id="" value="0" />

<div id="admin_setting" class="hide">
<div class="table">
	<div class="title">
		<?php echo P_Lang("网站状态：");?>
		<span class="note"><?php echo P_Lang("要停止此网站运行，请在这里关闭");?></span>
	</div>
	<div class="content">
		<table>
		<tr>
			<td><label id="status_0"><input type="radio" id="status_0" name="status" value="0" <?php if(!$rs['status']){ ?> checked<?php } ?> /> <?php echo P_Lang("关闭");?></label></td>
			<td><label id="status_1"><input type="radio" id="status_1" name="status" value="1" <?php if($rs['status']){ ?> checked<?php } ?> /> <?php echo P_Lang("开启");?></label></td>
		</tr>
		</table>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("网站关闭说明：");?>
		<span class="note"><?php echo P_Lang("简单说明关闭网站的通知信息");?></span>
	</div>
	<div class="content"><textarea id="content" name="content" class="long"><?php echo $rs['content'];?></textarea></div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("默认风格：");?>
		<span class="note"><?php echo P_Lang("指定网站要使用的默认风格，注意，风格不区分语言和站点，请仔细选择");?></span>
	</div>
	<div class="content">
		<select id="tpl_id" name="tpl_id">
			<?php if($tpl_list){ ?>
				<?php $tpl_list_id["num"] = 0;$tpl_list=is_array($tpl_list) ? $tpl_list : array();$tpl_list_id["total"] = count($tpl_list);$tpl_list_id["index"] = -1;foreach($tpl_list AS $key=>$value){ $tpl_list_id["num"]++;$tpl_list_id["index"]++; ?>
				<option value="<?php echo $value['id'];?>"<?php if($rs['tpl_id'] == $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
				<?php } ?>
			<?php } else { ?>
			<option value=""><?php echo P_Lang("未安装风格包，请先安装");?></option>
			<?php } ?>
		</select>
	</div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("游客上传权限：");?>
		<span class="note"><?php echo P_Lang("启用上传权限后，游客仅可以上传JPG，GIF，PNG，JPEG，ZIP，RAR这几种类型的附件");?></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><label><input type="radio" name="upload_guest" value="0" <?php if(!$rs['upload_guest']){ ?> checked<?php } ?> /><?php echo P_Lang("禁用");?></label></td>
			<td><label><input type="radio" name="upload_guest" value="1" <?php if($rs['upload_guest']){ ?> checked<?php } ?> /><?php echo P_Lang("启用");?></label></td>
		</tr>
		</table>
	</div>
</div>

<div class="table">
	<div class="title">
		<?php echo P_Lang("后台LOGO");?>
		<span class="note"><?php echo P_Lang("显示在后台管理左上方的LOGO，高度限制在45px");?></span></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="text" id="adm_logo29" name="adm_logo29" class="default" value="<?php echo $rs['adm_logo29'];?>" /></td>
			<td><input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_pic('adm_logo29')" class="btn" /></td>
			<td><input type="button" value="<?php echo P_Lang("预览");?>" onclick="phpok_pic_view('adm_logo29')" class="btn" /></td>
			<td><input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#adm_logo29').val('');" class="btn" /></td>
		</tr>
		</table>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("后台登录LOGO");?>
		<span class="note"><?php echo P_Lang("显示在居中登录框上，建议使用PNG透明图片，高度限制在180px");?></span></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><input type="text" id="adm_logo180" name="adm_logo180" class="default" value="<?php echo $rs['adm_logo180'];?>" /></td>
			<td><input type="button" value="<?php echo P_Lang("选择");?>" onclick="phpok_pic('adm_logo180')" class="btn" /></td>
			<td><input type="button" value="<?php echo P_Lang("预览");?>" onclick="phpok_pic_view('adm_logo180')" class="btn" /></td>
			<td><input type="button" value="<?php echo P_Lang("清空");?>" onclick="$('#adm_logo180').val('');" class="btn" /></td>
		</tr>
		</table>
	</div>
</div>
</div>

<div id="email_setting" class="hide">
<div class="table">
	<div class="title">
		<?php echo P_Lang("SMTP服务器：");?>
		<span class="note"><?php echo P_Lang("个人推荐国内用户使用：QQ或网易的邮箱");?></span>
	</div>
	<div class="content">
		<input type="text" name="email_server" value="<?php echo $rs['email_server'];?>" class="long" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("邮件服务器端口：");?>
		<span class="note"><?php echo P_Lang("未设置使用25为端口");?></span>
	</div>
	<div class="content">
		<input type="text" name="email_port" class="short" value="<?php echo $rs['email_port'] ? $rs['email_port'] : 25;?>" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("是否启用SSL功能：");?>
		<span class="note"><?php echo P_Lang("如果您使用Gmail邮箱，请选择“是”");?></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><label><input type="radio" name="email_ssl" value="1"<?php if($rs['email_ssl']){ ?> checked<?php } ?> /> <?php echo P_Lang("是");?></label></td>
			<td>&nbsp; &nbsp;</td>
			<td><label><input type="radio" name="email_ssl" value="0"<?php if(!$rs['email_ssl']){ ?> checked<?php } ?> /> <?php echo P_Lang("否");?></label></td>
		</tr>
		</table>
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("SMTP账号：");?>
		<span class="note"><?php echo P_Lang("用于认证发送邮件");?></span>
	</div>
	<div class="content">
		<input type="text" id="email_account" name="email_account" class="long" value="<?php echo $rs['email_account'];?>" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("SMTP密码：");?>
		<span class="note"><?php echo P_Lang("同上");?></span>
	</div>
	<div class="content">
		<input type="password" id="email_pass" name="email_pass" class="long" value="<?php echo $rs['email_pass'];?>" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("发件人姓名：");?>
		<span class="note"><?php echo P_Lang("设置发件人姓名，未设置将使用邮箱@之前的信息作为发件人姓名");?></span>
	</div>
	<div class="content">
		<input type="text" id="email_name" name="email_name" class="long" value="<?php echo $rs['email_name'];?>" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("邮箱：");?>
		<span class="note"><?php echo P_Lang("设置发件人的邮箱，即你的邮箱，该邮箱也用于接收邮件");?></span>
	</div>
	<div class="content">
		<input type="text" id="email" name="email" class="long" value="<?php echo $rs['email'];?>" />
	</div>
</div>
<div class="table">
	<div class="title">
		<?php echo P_Lang("邮件编码：");?>
		<span class="note"><?php echo P_Lang("设置你的邮件标题和内容的编码，国内用户推荐使用GBK，Gmail邮箱使用UTF-8");?></span>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><label><input type="radio" name="email_charset" value="gbk"<?php if($rs['email_charset'] == 'gbk'){ ?> checked<?php } ?> /> GBK</label></td>
			<td>&nbsp; &nbsp;</td>
			<td><label><input type="radio" name="email_charset" value="utf-8"<?php if($rs['email_charset'] == 'utf-8' || !$rs['email_charset']){ ?> checked<?php } ?> /> UTF-8</label></td>
		</tr>
		</table>
	</div>
</div>
</div>

<div class="table">
	<div class="content">
		<br />
		<input type="submit" value="<?php echo P_Lang("提交");?>" class="submit2" />
		<br />
	</div>
</div>
</form>
</div>

<?php $this->output("foot","file"); ?>