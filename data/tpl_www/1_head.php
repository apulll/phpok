<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php echo tpl_head(array('title'=>$title,'css'=>"tpl/www/css/reset.css,tpl/www/css/css.css",'js'=>"tpl/www/js/jquery-3.1.1.min.js,tpl/www/js/main.js,tpl/www/js/jquery.slides.min.js,tpl/www/js/index.js",'html5'=>"true"));?>
<body>


<header class="header">
    <div class="content">
      <h1><a href="<?php echo $sys['url'];?>" title="<?php echo $config['title'];?>"><img src="<?php echo $config['logo'];?>" alt="<?php echo $config['title'];?>" /></a></h1>
      <nav class="nav">
        <?php $list = phpok('menu');?>
      	<?php $list_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_id["total"] = count($list['rslist']);$list_id["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
      	<li<?php if($menutitle == $value['title']){ ?> class="current"<?php } ?><?php if(!$list_id['index']){ ?> style="margin-left:4px;"<?php } ?>>
      		<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>" target="<?php echo $value['target'];?>"><span><?php echo $value['title'];?></span><p><?php echo $value['title_en'];?></p></a>

      	</li>
      	<?php } ?>
      </nav>
    </div>
  </header>