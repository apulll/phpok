<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = $rs['title'].' - '.$cate_rs['title'].' - '.$page_rs['title'];?>
<?php $title=$title;?><?php $this->assign("title",$title); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>

<!-- <div class="banner"<?php if($page_rs['banner']){ ?> style="background-image:url('<?php echo $page_rs['banner']['gd']['auto'];?>')"<?php } ?>></div> -->

<div class="case-section content clearfix" style='height: 100%'>
	<div class="left">
      <?php $this->output("block_catelist_case","file"); ?>
    </div>
	<div class="right">
		<div class="pfw">
			<div class="title">
				<!-- <h3><?php echo $cate_rs ? $cate_rs['title'] : $page_rs['title'];?></h3> -->
				<span class="breadcrumbs">
					您现在的位置：
					<a href="<?php echo $sys['url'];?>" title="<?php echo $config['title'];?>">首页</a>
					<span class="arrow">&gt;</span> <a href="<?php echo $page_rs['url'];?>" title="<?php echo $page_rs['title'];?>"><?php echo $page_rs['title'];?></a>
					<?php if($cate_rs){ ?>
					<span class="arrow">&gt;</span> <a href="<?php echo $cate_rs['url'];?>" title="<?php echo $cate_rs['title'];?>"><?php echo $cate_rs['title'];?></a>
					<?php } ?>
				</span>
			</div>
			<div class="product clearfix">
				<div class="img" id="product_img">
					<ul class="list product-img-tmb-list clearfix">
						<?php $rs_thumb_id["num"] = 0;$rs['thumb']=is_array($rs['thumb']) ? $rs['thumb'] : array();$rs_thumb_id["total"] = count($rs['thumb']);$rs_thumb_id["index"] = -1;foreach($rs['thumb'] AS $key=>$value){ $rs_thumb_id["num"]++;$rs_thumb_id["index"]++; ?>
						<?php $caselist = pro_case_list($rs['thumb']);?>
						<!-- <pre><?php echo print_r($caselist,true);?></pre> -->
						<li class="product-img-tmb-list-li"><img src="<?php echo $value['gd']['thumb'];?>" _src="<?php echo $caselist;?>" border="0" alt="<?php echo $rs['title'];?>" class="product-img-tmb" /></li>
						<?php } ?>
					</ul>

				</div>



			</div>

			<div class="detail product_info">
				<div class="content"><?php echo $rs['content'];?></div>
				<div class="np">
					<p>上一主题：
						<?php $prev = phpok_prev($rs);?>
						<?php if($prev){ ?>
						<a href="<?php echo $prev['url'];?>" title="<?php echo $prev['title'];?>"><?php echo $prev['title'];?></a>
						<?php } else { ?>
						没有了
						<?php } ?>
					</p>
					<p>下一主题：
						<?php $next = phpok_next($rs);?>
						<?php if($next){ ?>
						<a href="<?php echo $next['url'];?>" title="<?php echo $next['title'];?>"><?php echo $next['title'];?></a>
						<?php } else { ?>
						没有了
						<?php } ?>
					</p>
				</div>
			</div>

			<div class="show-detail" id="show-detail">
    <span class="close"></span>
    <div class="slide" id="slide">

    </div>

  </div>
		</div>
	</div>
</div>

<!-- include tpl=foot