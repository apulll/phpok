<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?>
<?php $list=phpok('_catelist',array('pid'=>$page_rs['id']));?>
<?php $tmpid["num"] = 0;$list['sublist']=is_array($list['sublist']) ? $list['sublist'] : array();$tmpid["total"] = count($list['sublist']);$tmpid["index"] = -1;foreach($list['sublist'] AS $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>" class="lnav lnav-<?php echo $tmpid['num'];?> <?php if($cate_rs['id'] == $value['id']){ ?> current <?php } ?>"  ></a>
<?php } ?>