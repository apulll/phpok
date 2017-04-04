<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $menutitle="网站首页";?><?php $this->assign("menutitle","网站首页"); ?><?php $this->output("head","file"); ?>

<?php $list = phpok('picplayer');?>
<?php if($list['total']){ ?>
<div class="banner" id="banner">
    <?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
    <a href="<?php echo $value['link'];?>" target="<?php echo $value['target'];?>" title="<?php echo $value['title'];?>" style='background-image: url("<?php echo $value['banner']['filename'];?>");' class="banner-a">
      
    </a>
    <?php } ?>
</div>

<?php } ?>
  <div class="content">
    <div class="notice">
      <span></span>
      <div class="notice-list" id="notice-list">
        <ul>
          <li><a href="">1重庆南川市商业步行街,主题建筑于2015年盛大开幕。</a></li>
          <li><a href="">2重庆南川市商业步行街,主题建筑于2015年盛大开幕。</a></li>
          <li><a href="">3重庆南川市商业步行街,主题建筑于2015年盛大开幕。</a></li>
          <li><a href="">4重庆南川市商业步行街,主题建筑于2015年盛大开幕。</a></li>
          <li><a href="">5重庆南川市商业步行街,主题建筑于2015年盛大开幕。</a></li>
          <li><a href="">6重庆南川市商业步行街,主题建筑于2015年盛大开幕。</a></li>
        </ul>
      </div>
    </div>
    <div class="hgroup">
      <h3>精品案例</h3>
      <hr>
      <p>Boutique case</p>
    </div>
    <div class="case-slide slide-ic" id="case-slide-1">
      <span class="arrow-left"></span>
      <div class="index-case-content">
        <?php $list = phpok('product');?>
        <div class="index-case-list">
          <ul>
            <?php $tmpid["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$tmpid["total"] = count($list['rslist']);$tmpid["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
            <?php $thumb = current($value['thumb']);?>
            
            <?php if($value['competitive_pro']){ ?>
              <li><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $thumb['gd']['thumb'];?>" border="0" id="product_<?php echo $value['id'];?>" width="230" height="320" /></a></li>
            <?php } ?>
            <?php } ?>
          </ul>
        </div>
      </div>
      <span class="arrow-right"></span>
    </div>
    <div class="hgroup">
      <h3>工程案例</h3>
      <hr>
      <p>PROJECT CASE</p>
    </div>
    <div class="case-project">
      <div class="left">
        <p><img src="tpl/www/images/case-t1.png" alt=""></p>
        <a href="" class="more"></a>
      </div>
      <div class="right slide-c" id="case-slide-2">
        <span class="arrow-left"></span>
        <div class="index-case-content">
          <div class="index-case-list">
            <ul>
              <li><a href=""><img src="img/img-1.png" alt=""></a></li>
              <li><a href=""><img src="img/img-2.png" alt=""></a></li>
              <li><a href=""><img src="img/img-3.png" alt=""></a></li>
              <li><a href=""><img src="img/img-4.png" alt=""></a></li>
              <li><a href=""><img src="img/img-5.png" alt=""></a></li>
              <li><a href=""><img src="img/img-6.png" alt=""></a></li>
            </ul>
          </div>
        </div>
        <span class="arrow-right"></span>
      </div>
    </div>
    <hr class="gline">
    <div class="case-project">
      <div class="left">
        <p><img src="tpl/www/images/case-t2.png" alt=""></p>
        <a href="" class="more"></a>
      </div>
      <div class="right slide-c" id="case-slide-3">
        <span class="arrow-left"></span>
        <div class="index-case-content">
          <div class="index-case-list">
            <ul>
              <li><a href=""><img src="img/img-1.png" alt=""></a></li>
              <li><a href=""><img src="img/img-2.png" alt=""></a></li>
              <li><a href=""><img src="img/img-3.png" alt=""></a></li>
              <li><a href=""><img src="img/img-4.png" alt=""></a></li>
              <li><a href=""><img src="img/img-5.png" alt=""></a></li>
              <li><a href=""><img src="img/img-6.png" alt=""></a></li>
            </ul>
          </div>
        </div>
        <span class="arrow-right"></span>
      </div>
    </div>
    

    <div class="hgroup">
      <h3>新闻动态</h3>
      <hr>
      <p>News information</p>
    </div>
    <div class="news-group">
    <?php $list = phpok('news');?>
      <div class="left">
      <?php $list_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_id["total"] = count($list['rslist']);$list_id["index"] = -1;foreach($list['rslist'] AS $num=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
      <?php if($list_id['index']<1){ ?>

      <a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>" class="img"><img src=<?php echo $value['thumb']['filename'];?> alt=""></a>
      <div class="t"><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo phpok_cut($value['title'],'15','…');?></a><hr><p><?php echo $value['note'];?></p></div>
      </div>
      <?php } ?>
      <?php } ?>
      <div class="right">
        
        <div class="news-ilist">
          <ul>
            <?php $list_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_id["total"] = count($list['rslist']);$list_id["index"] = -1;foreach($list['rslist'] AS $num=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
            <?php if($list_id['index']<5){ ?>
            <li><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo phpok_cut($value['title'],'15','…');?></a><p><?php echo $value['note'];?></p>
            </li>
            <?php } ?>
            <?php } ?>

            <!-- <li><a href="">重庆南川市商业步行街</a><p>重庆南川市商业步行街,主题建筑于2015年盛大开幕。为庆祝此举，我们</p></li>
            <li><a href="">重庆南川市商业步行街</a><p>重庆南川市商业步行街,主题建筑于2015年盛大开幕。为庆祝此举，我们</p></li>
            <li><a href="">重庆南川市商业步行街</a><p>重庆南川市商业步行街,主题建筑于2015年盛大开幕。为庆祝此举，我们</p></li>
            <li><a href="">重庆南川市商业步行街</a><p>重庆南川市商业步行街,主题建筑于2015年盛大开幕。为庆祝此举，我们</p></li> -->
          </ul>
        </div>
        <div class="news-more">
          <a class="more" href="<?php echo $list['project']['url'];?>"></a>
        </div>
      </div>
    </div>






  </div>
  <div class="contact-us">
    <div class="content">
      <div class="contact-itit">
        <span class="t">联系我们</span>
        <span class="et">CONTACT <br>US</span>
        <div class="desc"> 路尚雕塑艺术（北京）有限公司位于北京市通州区宋庄艺术园区, <br>本公司是集城市现代景观雕塑、建筑构件、建筑装饰与艺术品、销售等为一体的专业性服务机构.</div>
      </div>
      <div class="contact-conn">
        <div class="card card-l">
          <p class="t">北京</p>
          <p class="t2">BEIJING</p>
          <a href="" class="map"></a>
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
          <a href="" class="map"></a>
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
  
<?php $this->output("foot","file"); ?>