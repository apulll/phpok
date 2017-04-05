<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = $rs['title'].' - '.$page_rs['title'];?>
<?php $title=$title;?><?php $this->assign("title",$title); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>
<div class="banner"<?php if($page_rs['banner']){ ?> style="background-image:url('<?php echo $page_rs['banner']['gd']['auto'];?>')"<?php } ?>></div>
<?php $this->output("block_contact","file"); ?>
<div class="feedback-group">
  <div class="content">

	<?php $list = phpok('com_cooperation');?>

    <div class="hgroup">
      <h3>商务合作</h3>
      <hr>
      <p>Business cooperation</p>
    </div>
    <div class="feedback-list clearfix">
      <dl>
        <dt>姓名：</dt>
        <dd><input type="text"></dd>
        <dt>公司：</dt>
        <dd><input type="text"></dd>
      </dl>
      <dl>
        <dt>邮箱：</dt>
        <dd><input type="text"></dd>
        <dt>电话：</dt>
        <dd><input type="text"></dd>
      </dl>
      <dl>
        <dt>城市：</dt>
        <dd><input type="text"></dd>
        <dt></dt>
        <dd></dd>
      </dl>
      <dl class="c2">
        <dt>需求：</dt>
        <dd><textarea placeholder="详细产品描述／数量等"></textarea></dd>
      </dl>
    </div>
    <div class="btn">
      <button class="submit">提  交</button>
    </div>
  </div>
</div>
<script>

</script>
<?php $this->output("foot","file"); ?>