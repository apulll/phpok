<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = $rs['title'].' - '.$page_rs['title'];?>
<?php $title=$title;?><?php $this->assign("title",$title); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>
<div class="content">
    <div class="hgroup">
      <h3><?php echo $rs['title'];?></h3>
      <hr>
      <p><?php echo $rs['title_en'];?></p>
    </div>
    <div class="about-group clearfix">
      <span class="img"><img src="<?php echo $rs['thumb']['filename'];?>" alt=""></span>
      <div class="text-group ">
        <?php echo $rs['content'];?>
      </div>

    </div>
  </div>
<?php $this->output("block_contact","file"); ?>
<div class="feedback-group">
  <div class="content">
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
      <button>提  交</button>
    </div>
  </div>
</div>

<?php $this->output("foot","file"); ?>