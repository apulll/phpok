<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = $rs['title'].' - '.$cate_rs['title'].' - '.$page_rs['title'];?>
<?php $title=$title;?><?php $this->assign("title",$title); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>

<div class="banner"<?php if($page_rs['banner']){ ?> style="background-image:url('<?php echo $page_rs['banner']['gd']['auto'];?>')"<?php } ?>></div>

<div class="main clearfix">
	<div class="left">
		<?php $this->output("block_catelist","file"); ?>
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
					<ul class="list">
						<?php $rs_thumb_id["num"] = 0;$rs['thumb']=is_array($rs['thumb']) ? $rs['thumb'] : array();$rs_thumb_id["total"] = count($rs['thumb']);$rs_thumb_id["index"] = -1;foreach($rs['thumb'] AS $key=>$value){ $rs_thumb_id["num"]++;$rs_thumb_id["index"]++; ?>
						<li><img src="images/blank.gif" _src="<?php echo $value['gd']['auto'];?>" border="0" alt="<?php echo $rs['title'];?>" /></li>
						<?php } ?>
					</ul>
					<ul class="thumb_list">
						<?php $rs_thumb_id["num"] = 0;$rs['thumb']=is_array($rs['thumb']) ? $rs['thumb'] : array();$rs_thumb_id["total"] = count($rs['thumb']);$rs_thumb_id["index"] = -1;foreach($rs['thumb'] AS $key=>$value){ $rs_thumb_id["num"]++;$rs_thumb_id["index"]++; ?>
						<li><img src="<?php echo $value['gd']['auto'];?>" border="0" alt="<?php echo $value['title'];?>" /></li>
						<?php } ?>
					</ul>
				</div>
				<?php $caselist = pro_case_list($rs['thumb']);?>
				<pre><?php echo print_r($caselist,true);?></pre>

				<div class="info">
					<h1><?php echo $rs['title'];?></h1>
					<p>查看：<?php echo $rs['hits'];?></p>
					<p>时间：<?php echo date('Y-m-d',$rs['dateline']);?></p>
					<?php $tmpid["num"] = 0;$rs['attrs']=is_array($rs['attrs']) ? $rs['attrs'] : array();$tmpid["total"] = count($rs['attrs']);$tmpid["index"] = -1;foreach($rs['attrs'] AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
					<p><?php echo $key;?>：<?php echo $value;?></p>
					<?php } ?>
					<?php if($rs['price'] && is_numeric($rs['price'])){ ?>
					<p><span>价格：</span><span class="price"><?php echo $rs['price'];?> 元</span></p>
					<?php }elseif($rs['price']){ ?>
					<p><span>价格：</span><span class="price"><?php echo $rs['price'];?></span></p>
					<?php } ?>
					<p style="padding-top:10px;">
						<input type="button" value="立即咨询" onclick="order_create()" class="large red button" />
					</p>
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
				<div class="comment">
					<!--高速版-->
					<div id="SOHUCS"></div>
					<script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js" ></script>
					<script type="text/javascript">
					    window.changyan.api.config({
					        appid: 'cyrhNRjRy',
					        conf: 'prod_24b1653f7f39bec7ca20d5ea1fe9ad1f'
					    });
					</script>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- include tpl=foot