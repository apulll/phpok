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
      <?php $list = phpok('news');?>
        <ul>
          <?php $list_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_id["total"] = count($list['rslist']);$list_id["index"] = -1;foreach($list['rslist'] AS $num=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
            <li><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo phpok_cut($value['title'],'15','…');?></a>
            </li>
            <?php } ?>
            
        </ul>
      </div>
    </div>
    <div class="hgroup">
      <h3>精品案例</h3>
      <hr>
      <p>Boutique case</p>
    </div>

    <div class="index-case-list_content clearfix">
        <span class="case-list__btn__left"></span>
        <?php $list = phpok('product');?>
          <div class="case-list__wrapper">
            <ul class="case-list__ul">
            <?php $tmpid["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$tmpid["total"] = count($list['rslist']);$tmpid["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>

            <?php $thumb = current($value['thumb']);?>

            <?php if($value['competitive_pro']){ ?>
              <li class="case-list__li"><a href="javascript:void(0)" title="<?php echo $value['title'];?>"><img src="<?php echo $thumb['gd']['thumb'];?>" border="0" id="product_<?php echo $value['id'];?>" width="230" height="320" /></a></li>
            <?php } ?>
            <?php } ?>

            </ul>
          </div>
        <span class="case-list__btn__right"></span>
    </div>

    


    <div class="hgroup">
      <h3>工程案例</h3>
      <hr>
      <p>PROJECT CASE</p>
    </div>
    <div class="case-project clearfix">
      <div class="left fl">
        <p><img src="tpl/www/images/case-t1.png" alt=""></p>
        <a href="product/basso_relievo.html" class="more"></a>
      </div>
      <div class="index-case-list__right fl">
        <span class="case-list__btn__left"></span>
        <?php $list = phpok('product');?>
          <div class="case-list__wrapper">
            <ul class="case-list__ul">
            <?php $tmpid["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$tmpid["total"] = count($list['rslist']);$tmpid["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
            <?php $thumb = current($value['thumb']);?>

            <?php if($value['cate_id'] == 11){ ?>
              <li class="case-list__li"><a href="javascript:void(0)" title="<?php echo $value['title'];?>"><img src="<?php echo $thumb['gd']['thumb'];?>" border="0" id="product_<?php echo $value['id'];?>" width="230" height="320" /></a></li>
            <?php } ?>
            <?php } ?>

            </ul>
          </div>
        <span class="case-list__btn__right"></span>
      </div>
    </div>
    <hr class="gline">
    <div class="case-project clearfix">
      <div class="left fl">
        <p><img src="tpl/www/images/case-t2.png" alt=""></p>
        <a href="/product/round_sculpture.html" class="more"></a>
        <?php $list=phpok('_catelist',array('pid'=>$page_rs['id']));?>

        <?php $tmpid["num"] = 0;$list['sublist']=is_array($list['sublist']) ? $list['sublist'] : array();$tmpid["total"] = count($list['sublist']);$tmpid["index"] = -1;foreach($list['sublist'] AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
        <li<?php if($cate_rs['id'] == $value['id']){ ?> class="current"<?php } ?>><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo phpok_cut($value['title'],'15','…');?></a></li>
        <?php } ?>
      </div>
      <div class="index-case-list__right fl">
        <span class="case-list__btn__left"></span>
        <?php $list = phpok('product');?>
          <div class="case-list__wrapper">
            <ul class="case-list__ul">
            <?php $tmpid["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$tmpid["total"] = count($list['rslist']);$tmpid["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
            <?php $thumb = current($value['thumb']);?>

            <?php if($value['cate_id'] == 12){ ?>
              <li class="case-list__li"><a href="javascript:void(0)" title="<?php echo $value['title'];?>"><img src="<?php echo $thumb['gd']['thumb'];?>" border="0" id="product_<?php echo $value['id'];?>" width="230" height="320" /></a></li>
            <?php } ?>
            <?php } ?>

            </ul>
          </div>
        <span class="case-list__btn__right"></span>
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
      <div class="t"><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo phpok_cut($value['title'],'15','…');?></a><hr><p><?php echo $value['note'] ? phpok_cut($value['note'],30,'…') : phpok_cut($value['content'],30,'…');?></p></div>
      </div>
      <?php } ?>
      <?php } ?>
      <div class="right">

        <div class="news-ilist">
          <ul>
            <?php $list_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_id["total"] = count($list['rslist']);$list_id["index"] = -1;foreach($list['rslist'] AS $num=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
            <?php if($list_id['index']<5){ ?>
            <li><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo phpok_cut($value['title'],'15','…');?></a><p><?php echo $value['note'] ? phpok_cut($value['note'],30,'…') : phpok_cut($value['content'],30,'…');?></p>
            </li>
            <?php } ?>
            <?php } ?>
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

        <?php $contact = phpok('contact');?>
        <div class="desc"><?php echo $contact['contact_c_intro'];?></div>
      </div>
      <div class="contact-conn">
        <div class="card card-l">
          <?php echo $contact['content'];?>
        </div>
        <div class="card card-r">
          <?php echo $contact['content_sec'];?>
        </div>
      </div>
    </div>
  </div>

<?php $this->output("foot","file"); ?>