<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = $rs['title'].' - '.$page_rs['title'];?>
<?php $title=$title;?><?php $this->assign("title",$title); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>
<div class="content">
    <div class="hgroup">
      <h3>公司简介</h3>
      <hr>
      <p>Company profile</p>
    </div>
    <div class="about-group clearfix">
      <span class="img"><img src="img/index-about.png" alt=""></span>
      <div class="text-group ">
        <p>路尚雕塑艺术（北京）有限公司位于北京市通州区宋庄艺术园区；本公司是集城市现代景观雕塑（包括主题雕塑、标志雕塑、铸铜、石材、不锈钢等多种材质雕塑）、GRC、GRG、GRFC等建筑构件，建筑装饰与艺术品、销售等为一体的专业性服务机构，主要业务为城市景观雕塑，兼艺术品的销售展览策划，致力于艺术品推广与服务；设计施工团队均系专业院校相关专业毕业，具有很强的设计创作能力及实践经验；艺术总监系中国著名雕塑艺术家马辉先生、现任职于陕西省雕塑研究院教授，西安美术学院副教授，持有全国城市雕塑创作资格证书。</p>
        <p>作品享誉海内外，也是全国教育先进个人，国务院特殊津贴获得者。本公司依托于较强的专业性特点以市场为导向，已成功承接完成数起具有代表性的大型城市雕塑工程，如：陕北子长县《工农红军会师群雕》（合作）、汉中市城固县《张骞通西域群雕》（合作）、西安市灞桥区《雄风》、甘肃省庆阳《博物馆景观雕塑工程》等，在贵州省内完成遵义市毕节市、铜仁地区、都匀市、贵阳市、安顺市等项目数十起的优质的艺术作品。路尚雕塑的独特创意、创作理念和艺术表现，得到社会诸多方面的普遍认可；在二十一世纪改革新浪潮中，我们将乘风破浪百尺竿头不断创造；路尚雕塑诚信待人，格物致知，拿行动说话 让作品代言，凭信誉求发展，用独特的创意加超前的意识为您服务。</p>
      </div>
    </div>
  </div>
<div class="contact-us-group">
  <div class="content">
    <div class="hgroup">
      <h3>联系我们</h3>
      <hr>
      <p>contact us</p>
    </div>
    <div class="contact-group clearfix">
      <span class="img"><img src="tpl/www/images/index-contact.png" alt=""></span>
      <div class="contact-card ">
        <div class="card card-l">
          <p class="t">北京</p>
          <p class="t2">BEIJING</p>
          <hr>
          <div class="list">
            <dl>
              <dt>Mobile：</dt>
              <dd>(+86)18611282048</dd>
            </dl>
            <dl>
              <dt>Mobile：</dt>
              <dd>(+86)18600462531</dd>
            </dl>
            <dl>
              <dt>Email： </dt>
              <dd>1290070804@qq.com</dd>
            </dl>
            <dl>
              <dt>地址：  </dt>
              <dd>北京市通州区宋庄小宝艺术区（总部）</dd>
            </dl>
          </div>
        </div>
        <div class="card card-r">
          <p class="t">贵阳</p>
          <p class="t2">GUIYANG</p>
          <hr>
          <div class="list">
            <dl>
              <dt>Tel:</dt>
              <dd>(+86)0851-3995646</dd>
            </dl>
            <dl>
              <dt>Mobile：</dt>
              <dd>(+86)18611282048</dd>
            </dl>
            <dl>
              <dt>Email： </dt>
              <dd>1290070804@qq.com</dd>
            </dl>
            <dl>
              <dt>地址：  </dt>
              <dd>贵阳市小河区黄河南路小河建材市场（分部）</dd>
            </dl>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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