<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = $cate_rs ? $cate_rs['title'].' - '.$page_rs['title'] : $page_rs['title'];?>
<?php $title=$title;?><?php $this->assign("title",$title); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>
<div <?php if($page_rs['banner']){ ?> style="background-image:url('<?php echo $page_rs['banner']['gd']['auto'];?>')"<?php } ?>></div>
<div class="content clearfix">

<div class="xwdtl">
   <ul>
   <?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist AS $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
    <li class="clearfix">
    	<?php if($value['thumb']){ ?>
       <div class="xwdtll"><span><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><img src="<?php echo $value['thumb']['gd']['thumb'];?>" alt="<?php echo $value['title'];?>" /></a></span></div>
       <?php } ?>
       <div class="xwdtlr">

           <h1 class="tit-te"><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></h1>

        <p class="tj jianjie"><?php echo $value['note'] ? phpok_cut($value['note'],90,'…') : phpok_cut($value['content'],90,'…');?>

        </p>
        <span class="more">[<a href="<?php echo $value['url'];?>" title="查看<?php echo $value['title'];?>详细信息">查看更多</a>]</span>
       </div>
       <div class="cb"></div>
      </li>
     <?php } ?>
   </ul>

  </div>
<?php $this->output("block_pagelist","file"); ?>

</div>


<?php $this->output("foot","file"); ?>