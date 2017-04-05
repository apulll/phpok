<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = $rs['title'].' - '.$cate_rs['title'].' - '.$page_rs['title'];?>
<?php $title=$title;?><?php $this->assign("title",$title); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>
<div class="content clearfix">
	<div class="right">
		<div class="pfw">
			<div class="news-detail__content">
				<h1 class="news-detail__h1"><?php echo $rs['title'];?></h1>
				<div class="date_hits_tags">
					发布日期：<span class="news-pub__date"><?php echo date('Y年m月d日',$rs['dateline']);?></span>&nbsp;&nbsp;&nbsp;
					浏览次数：<span class="hits news-hits__num"><?php echo $rs['hits'];?></span>
					<?php if($rs['tag']){ ?>
					&nbsp;&nbsp;&nbsp;关键字：
						<?php $rs_tag_id["num"] = 0;$rs['tag']=is_array($rs['tag']) ? $rs['tag'] : array();$rs_tag_id["total"] = count($rs['tag']);$rs_tag_id["index"] = -1;foreach($rs['tag'] AS $key=>$value){ $rs_tag_id["num"]++;$rs_tag_id["index"]++; ?>
						<a href="<?php echo $value['url'];?>" title="<?php echo $value['alt'];?>" target="<?php echo $value['target'];?>" ><?php echo $value['title'];?></a>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="content"><?php echo $rs['content'];?></div>
				<div class="news-con__page">
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
		</div>
	</div>
</div>

<?php $this->output("foot","file"); ?>