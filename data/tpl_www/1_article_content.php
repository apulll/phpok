<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = $rs['title'].' - '.$cate_rs['title'].' - '.$page_rs['title'];?>
<?php $title=$title;?><?php $this->assign("title",$title); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>
<div class="banner"<?php if($page_rs['banner']){ ?> style="background-image:url('<?php echo $page_rs['banner']['gd']['auto'];?>')"<?php } ?>></div>
<div class="main clearfix">
	<div class="left">
		<?php $this->output("block_catelist","file"); ?>
		<?php $this->output("block_contact","file"); ?>
	</div>
	<div class="right">
		<div class="pfw">
			<div class="title">
				<h3><?php echo $cate_rs ? $cate_rs['title'] : $page_rs['title'];?></h3>
				<span class="breadcrumbs">
					您现在的位置：
					<a href="<?php echo $sys['url'];?>" title="<?php echo $config['title'];?>">首页</a>
					<span class="arrow">&gt;</span> <a href="<?php echo $page_rs['url'];?>" title="<?php echo $page_rs['title'];?>"><?php echo $page_rs['title'];?></a>
					<?php if($cate_rs){ ?>
					<span class="arrow">&gt;</span> <a href="<?php echo $cate_rs['url'];?>" title="<?php echo $cate_rs['title'];?>"><?php echo $cate_rs['title'];?></a>
					<?php } ?>
				</span>
			</div>
			<div class="detail">
				<h1><?php echo $rs['title'];?></h1>
				<div class="date_hits_tags">
					发布日期：<span><?php echo date('Y年m月d日',$rs['dateline']);?></span>&nbsp;&nbsp;&nbsp;
					浏览次数：<span class="hits"><?php echo $rs['hits'];?></span>
					<?php if($rs['tag']){ ?>
					&nbsp;&nbsp;&nbsp;关键字：
						<?php $rs_tag_id["num"] = 0;$rs['tag']=is_array($rs['tag']) ? $rs['tag'] : array();$rs_tag_id["total"] = count($rs['tag']);$rs_tag_id["index"] = -1;foreach($rs['tag'] AS $key=>$value){ $rs_tag_id["num"]++;$rs_tag_id["index"]++; ?>
						<a href="<?php echo $value['url'];?>" title="<?php echo $value['alt'];?>" target="<?php echo $value['target'];?>"><?php echo $value['title'];?></a>
						<?php } ?>
					<?php } ?>
				</div>
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

<?php $this->output("foot","file"); ?>