<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = $cate_rs ? $cate_rs['title'].' - '.$page_rs['title'] : $page_rs['title'];?>
<?php $title=$title;?><?php $this->assign("title",$title); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>
 <div class="case-section content clearfix" style='height: 100%'>
    <div class="left">
      <!-- <a href="" class="lnav lnav-1 current"></a>
      <a href="" class="lnav lnav-2"></a> -->
      <?php $this->output("block_catelist_case","file"); ?>
    </div>
    <div class="right">
      <div class="case-list">
        <ul>
          <!-- <li><div class="box" rel='img/case-11.png;img/case-11.png;img/case-11.png;'><span><img src="img/case-11.png" alt=""></span><h3>重庆南川市商业步行街</h3><button>查看详情</button></div></li>
          <li><div class="box" rel='img/case-11.png;img/case-11.png;img/case-11.png;'><span><img src="img/case-11.png" alt=""></span><h3>重庆南川市商业步行街</h3><button>查看详情</button></div></li>
          <li><div class="box" rel='img/case-11.png;img/case-11.png;img/case-11.png;'><span><img src="img/case-11.png" alt=""></span><h3>重庆南川市商业步行街</h3><button>查看详情</button></div></li>
          <li><div class="box" rel='img/case-11.png;img/case-11.png;img/case-11.png;'><span><img src="img/case-11.png" alt=""></span><h3>重庆南川市商业步行街</h3><button>查看详情</button></div></li>
          <li><div class="box" rel='img/case-11.png;img/case-11.png;img/case-11.png;'><span><img src="img/case-11.png" alt=""></span><h3>重庆南川市商业步行街</h3><button>查看详情</button></div></li>
          <li><div class="box" rel='img/case-11.png;img/case-11.png;img/case-11.png;'><span><img src="img/case-11.png" alt=""></span><h3>重庆南川市商业步行街</h3><button>查看详情</button></div></li>
          <li><div class="box" rel='img/case-11.png;img/case-11.png;img/case-11.png;'><span><img src="img/case-11.png" alt=""></span><h3>重庆南川市商业步行街</h3><button>查看详情</button></div></li>
          <li><div class="box" rel='img/case-11.png;img/case-11.png;img/case-11.png;'><span><img src="img/case-11.png" alt=""></span><h3>重庆南川市商业步行街</h3><button>查看详情</button></div></li>
          <li><div class="box" rel='img/case-11.png;img/case-11.png;img/case-11.png;'><span><img src="img/case-11.png" alt=""></span><h3>重庆南川市商业步行街</h3><button>查看详情</button></div></li> -->


          <?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<?php $thumb = current($value['thumb']);?>
			<?php $casetitle = $value['title'];?>
			<li>
				<!-- <div class="img"><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $thumb['gd']['thumb'];?>" border="0" id="product_<?php echo $value['id'];?>" /></a></div> -->
				<?php $caselist = pro_case_list($value['thumb']);?>

				<div class="box" rel='<?php echo $caselist;?>' title='<?php echo $value['title'];?>'><span><img src="<?php echo $thumb['gd']['thumb'];?>" alt=""></span><h3><?php echo $value['title'];?></h3><button>查看详情</button></div>


			</li>
			<?php } ?>
        </ul>
      </div>
    </div>
    <div class="pages">
    	<?php $this->output("block_pagelist","file"); ?>
    </div>
    <!-- <pre><?php echo print_r($rslist,true);?></pre> -->
  </div>
  <div class="show-detail" id="show-detail">
    <span class="close"></span>
    <div class="slide" id="slide">
      <div class="img">
        <div class="nimg" style='background-image: url("img/case-12.png");'></div>
      </div>
      <div class="img">
        <div class="nimg" style='background-image: url("img/case-12.png");'></div>
      </div>
      <div class="img">
        <div class="nimg" style='background-image: url("img/case-12.png");'></div>
      </div>
      <div class="img">
        <div class="nimg" style='background-image: url("img/case-12.png");'></div>
      </div>
    </div>
    <h3 class="tit" id='title'><span><?php echo $casetitle;?></span></h3>

  </div>

<?php $this->output("foot","file"); ?>