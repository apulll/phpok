/*
SQLyog v10.2 
MySQL - 5.5.40 : Database - lxds3
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lxds3` /*!40100 DEFAULT CHARACTER SET gbk */;

USE `lxds3`;

/*Table structure for table `qinggan_adm` */

DROP TABLE IF EXISTS `qinggan_adm`;

CREATE TABLE `qinggan_adm` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID，系统自增',
  `account` varchar(50) NOT NULL COMMENT '管理员账号',
  `pass` varchar(100) NOT NULL COMMENT '管理员密码',
  `email` varchar(50) NOT NULL COMMENT '管理员邮箱',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未审核1正常2管理员锁定',
  `if_system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '系统管理员',
  `vpass` varchar(50) NOT NULL COMMENT '二次验证密码，两次MD5加密',
  `fullname` varchar(100) NOT NULL COMMENT '姓名',
  `close_tip` varchar(255) NOT NULL COMMENT '关闭提示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员信息';

/*Data for the table `qinggan_adm` */

insert  into `qinggan_adm`(`id`,`account`,`pass`,`email`,`status`,`if_system`,`vpass`,`fullname`,`close_tip`) values (1,'admin','a2d848187219a91d15238353c2aa0396:18','qinggan@188.com',1,1,'','','');

/*Table structure for table `qinggan_all` */

DROP TABLE IF EXISTS `qinggan_all`;

CREATE TABLE `qinggan_all` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `identifier` varchar(100) NOT NULL COMMENT '标识串',
  `title` varchar(200) NOT NULL COMMENT '分类名称',
  `ico` varchar(255) NOT NULL COMMENT '图标',
  `is_system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0普通１系统',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1允许0不允许',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COMMENT='分类管理';

/*Data for the table `qinggan_all` */

insert  into `qinggan_all`(`id`,`site_id`,`identifier`,`title`,`ico`,`is_system`,`status`) values (4,1,'ext','扩展','images/ico/about2.png',0,1);

/*Table structure for table `qinggan_cate` */

DROP TABLE IF EXISTS `qinggan_cate`;

CREATE TABLE `qinggan_cate` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID，0为根分类',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0不使用1正常使用',
  `title` varchar(200) NOT NULL COMMENT '分类名称',
  `taxis` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '分类排序，值越小越往前靠',
  `tpl_list` varchar(255) NOT NULL COMMENT '列表模板',
  `tpl_content` varchar(255) NOT NULL COMMENT '内容模板',
  `psize` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '列表每页数量',
  `seo_title` varchar(255) NOT NULL COMMENT 'SEO标题',
  `seo_keywords` varchar(255) NOT NULL COMMENT 'SEO关键字',
  `seo_desc` varchar(255) NOT NULL COMMENT 'SEO描述',
  `identifier` varchar(255) NOT NULL COMMENT '分类标识串',
  `tag` varchar(255) NOT NULL COMMENT '自身Tag设置',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `site_id` (`site_id`,`status`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='分类管理';

/*Data for the table `qinggan_cate` */

insert  into `qinggan_cate`(`id`,`site_id`,`parent_id`,`status`,`title`,`taxis`,`tpl_list`,`tpl_content`,`psize`,`seo_title`,`seo_keywords`,`seo_desc`,`identifier`,`tag`) values (1,1,0,1,'资讯分类',10,'','',0,'','','','infocate',''),(2,1,1,1,'公司新闻',10,'','',0,'','','','company-news',''),(3,1,1,1,'行业新闻',20,'','',0,'','','','industry-news',''),(4,1,0,1,'公司相册',20,'','',0,'','','','company-photo-album',''),(5,1,4,1,'活动图集',10,'','',0,'','','','hdtj',''),(6,1,4,1,'公司环境',20,'','',0,'','','','gshj',''),(7,1,0,1,'产品展示',30,'','',0,'','','','chanpinzhanshi',''),(8,1,7,1,'产品分类一',10,'','',0,'','','','cpfly',''),(9,1,7,1,'产品分类二',20,'','',0,'','','','cpfle',''),(10,1,7,1,'产品分类三',30,'','',0,'','','','cpfls','');

/*Table structure for table `qinggan_email` */

DROP TABLE IF EXISTS `qinggan_email`;

CREATE TABLE `qinggan_email` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `site_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID，0表示全部网站',
  `identifier` varchar(255) NOT NULL COMMENT '发送标识',
  `title` varchar(200) NOT NULL COMMENT '邮件主题',
  `content` text NOT NULL COMMENT '邮件内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='邮件内容';

/*Data for the table `qinggan_email` */

insert  into `qinggan_email`(`id`,`site_id`,`identifier`,`title`,`content`) values (6,1,'project_save','主题添加通知','<p>您好，管理员</p><blockquote><p>您的网站（<a href=\"http://{$sys.url}\" target=\"_self\">{$sys.url}</a>）新增了一篇主题，下述是主题的基本信息：<br/></p><p>主题名称：{$rs.title}</p><p>项目类型：{$page_rs.title}</p><p><br/></p><p>请登录网站查询</p></blockquote>');

/*Table structure for table `qinggan_ext` */

DROP TABLE IF EXISTS `qinggan_ext`;

CREATE TABLE `qinggan_ext` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '字段ID，自增',
  `module` varchar(100) NOT NULL COMMENT '模块',
  `title` varchar(255) NOT NULL COMMENT '字段名称',
  `identifier` varchar(50) NOT NULL COMMENT '字段标识串',
  `field_type` varchar(255) NOT NULL DEFAULT '200' COMMENT '字段存储类型',
  `note` varchar(255) NOT NULL COMMENT '字段内容备注',
  `form_type` varchar(100) NOT NULL COMMENT '表单类型',
  `form_style` varchar(255) NOT NULL COMMENT '表单CSS',
  `format` varchar(100) NOT NULL COMMENT '格式化方式',
  `content` text NOT NULL COMMENT '默认值',
  `taxis` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  `ext` text NOT NULL COMMENT '扩展内容',
  PRIMARY KEY (`id`),
  KEY `module` (`module`)
) ENGINE=MyISAM AUTO_INCREMENT=304 DEFAULT CHARSET=utf8 COMMENT='字段管理器';

/*Data for the table `qinggan_ext` */

insert  into `qinggan_ext`(`id`,`module`,`title`,`identifier`,`field_type`,`note`,`form_type`,`form_style`,`format`,`content`,`taxis`,`ext`) values (35,'all-4','内容','content','longtext','','code_editor','','html_js','',90,'a:2:{s:5:\"width\";s:3:\"700\";s:6:\"height\";s:3:\"200\";}'),(274,'project-166','轮播图片高度','height','200','设置首页轮播图片展示高度，为空使用300，只填写数字','text','','int','',20,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"100\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}'),(276,'project-167','通栏图片','banner','varchar','','upload','','safe','',40,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}'),(296,'project-173','通栏图片','banner','varchar','','upload','','safe','',40,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}'),(295,'project-173','邮箱','email','varchar','','text','','safe','',130,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}'),(285,'project-168','通栏图片','banner','varchar','','upload','','safe','',10,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}'),(287,'project-169','通栏图片','banner','varchar','','upload','','safe','',10,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}'),(288,'list-1456','缩略图','thumb','varchar','','upload','','safe','',30,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}'),(289,'list-1456','摘要','note','longtext','简要文字描述','editor','','html','',20,'a:13:{s:5:\"width\";s:3:\"800\";s:6:\"height\";s:3:\"100\";s:7:\"is_code\";s:0:\"\";s:9:\"btn_image\";s:0:\"\";s:9:\"btn_video\";s:0:\"\";s:8:\"btn_file\";s:0:\"\";s:8:\"btn_page\";s:0:\"\";s:8:\"btn_info\";s:0:\"\";s:7:\"is_read\";s:0:\"\";s:5:\"etype\";s:6:\"simple\";s:7:\"btn_map\";s:0:\"\";s:7:\"inc_tag\";s:0:\"\";s:10:\"paste_text\";s:0:\"\";}'),(290,'project-173','企业名称','company','varchar','','text','','safe','',200,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"500\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}'),(291,'project-173','姓名','fullname','varchar','','text','','safe','',10,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}'),(292,'project-173','联系电话','tel','varchar','','text','','safe','',89,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}'),(293,'project-173','联系地址','address','varchar','','text','','safe','',79,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"500\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}'),(294,'project-173','内容','content','longtext','','editor','','html','',255,'a:13:{s:5:\"width\";s:3:\"950\";s:6:\"height\";s:3:\"360\";s:7:\"is_code\";s:0:\"\";s:9:\"btn_image\";s:1:\"1\";s:9:\"btn_video\";s:0:\"\";s:8:\"btn_file\";s:0:\"\";s:8:\"btn_page\";s:0:\"\";s:8:\"btn_info\";s:0:\"\";s:7:\"is_read\";s:0:\"\";s:5:\"etype\";s:4:\"full\";s:7:\"btn_map\";s:1:\"1\";s:7:\"inc_tag\";s:0:\"\";s:10:\"paste_text\";s:0:\"\";}'),(297,'project-170','通栏图片','banner','varchar','','upload','','safe','',40,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}'),(298,'project-176','通栏图片','banner','varchar','','upload','','safe','',40,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}'),(299,'project-177','内容','content','longtext','','editor','','html','',255,'a:13:{s:5:\"width\";s:3:\"950\";s:6:\"height\";s:3:\"360\";s:7:\"is_code\";s:0:\"\";s:9:\"btn_image\";s:1:\"1\";s:9:\"btn_video\";s:1:\"1\";s:8:\"btn_file\";s:1:\"1\";s:8:\"btn_page\";s:0:\"\";s:8:\"btn_info\";s:0:\"\";s:7:\"is_read\";s:0:\"\";s:5:\"etype\";s:4:\"full\";s:7:\"btn_map\";s:0:\"\";s:7:\"inc_tag\";s:0:\"\";s:10:\"paste_text\";s:0:\"\";}'),(300,'project-178','内容','content','longtext','','editor','','html','',255,'a:13:{s:5:\"width\";s:3:\"950\";s:6:\"height\";s:3:\"360\";s:7:\"is_code\";s:0:\"\";s:9:\"btn_image\";s:1:\"1\";s:9:\"btn_video\";s:1:\"1\";s:8:\"btn_file\";s:1:\"1\";s:8:\"btn_page\";s:0:\"\";s:8:\"btn_info\";s:0:\"\";s:7:\"is_read\";s:0:\"\";s:5:\"etype\";s:4:\"full\";s:7:\"btn_map\";s:0:\"\";s:7:\"inc_tag\";s:0:\"\";s:10:\"paste_text\";s:0:\"\";}'),(301,'project-171','通栏图片','banner','varchar','','upload','','safe','',40,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}'),(302,'project-175','通栏图片','banner','varchar','','upload','','safe','',40,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}'),(303,'project-166','手机版高度','mheight','200','请根据轮播图片宽高比例调整手机轮播图片高度','text','','safe','95',30,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:0:\"\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}');

/*Table structure for table `qinggan_extc` */

DROP TABLE IF EXISTS `qinggan_extc`;

CREATE TABLE `qinggan_extc` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '内容值ID，对应ext表中的id',
  `content` longtext NOT NULL COMMENT '内容文本',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='扩展字段内容维护';

/*Data for the table `qinggan_extc` */

insert  into `qinggan_extc`(`id`,`content`) values (35,'Powered By phpok.com 版权所有 © 2004-2014, All right reserved.'),(274,'300'),(276,'1135'),(296,'1140'),(295,'admin@phpok.com'),(285,'1134'),(287,'1138'),(289,'<p>欢迎使用 <strong>PHPOK4企业站系统</strong>（简称 程序 或 系统 ），程序主要用于快速搭建网站。经过多年开发及建站经验，我们积累了很多宝贵经验，系统亦由最初的名片式网站升级到更为复杂企业需求。</p>'),(288,'1117'),(291,'苏先生'),(293,'广东深圳龙华新区民治民康路口秋瑞大厦513'),(292,'15818533971'),(290,'深圳市锟铻科技有限公司'),(294,'<p><img width=\"530\" height=\"340\" src=\"http://api.map.baidu.com/staticimage?center=114.047795,22.619831&zoom=15&width=530&height=340&markers=114.047795,22.619831\" style=\"float: right;\"/></p><p><strong><span style=\"font-size: 16px;\">深圳市锟铻科技有限公司</span></strong><br/></p><p><br/></p><p>联系人：苏生</p><p>联系电话：15818533971</p><p>联系Email：admin@phpok.com</p><p><br/></p>'),(298,'1132'),(299,'<p>核心理念：让想干事的人有机会，能干事的人有舞台，干成事的人有地位有待遇。唯才是举，真才必用。</p><blockquote><ol class=\" list-paddingleft-2\" style=\"list-style-type: decimal;\"><li><p>德才兼备原则。选拔和使用人才按照全面衡量，德才兼备的要求，坚持有德无才是庸人，有才无德是小人，德才不可偏废。</p></li><li><p>“效果论”原则。在用才上，我们不看学历看能力，不看文凭看水平，无论是什么身份，什么学历，什么年龄，只要干得好，干得比其他人出色，业绩突出，就大胆启用，委以重任。目前，公司技术人员和中层管理人员平均年龄都在35岁左右，车间主任平均年龄在30岁左右。这些人虽然年龄不大，有的学历也不是很高，但有能力、有干劲、有业绩。我们坚持的“效果论”用人机制，使一大批德才兼备的人才脱颖而出，成为企业发展的栋梁。</p></li><li><p>实践第一的原则。“试玉要烧三日满，辨才须待七年期”。历年来，凡到时风集团工作的各类专业人才，我们都先安排到车间生产一线，让其在实践中锻炼提高，然后通过公开考试，择优选拔。</p></li><li><p>优胜劣汰的原则。在选用人才上，我们实现了由“伯乐相马”向“赛场选马”的转变，谁干得最好，我们就作为人才加以重用；否则，只能被淘汰出局。</p></li><li><p>“人人是人才”的原则。在人才使用上，消除模式化和神秘化，做到因人而宜，量才适用。只要在合适的岗位上发挥出最大程度的才智，就是一定意义的人才。我们按照这个原则，根据每个员工的水平、特长、阅历、性格等，将其安排到相对适宜的岗位上，做到了人尽其才，才尽其能，促进了企业持续、快速、高效发展。 </p></li></ol></blockquote><p>用人唯才，人尽其才。</p><p>人才是企业的灵魂，公司视人才为最大财富，始终把人才作为企业发展的创业之本、竞争之本、发展之本。 </p><p>公司为员工提供一个能发挥才能的宽广舞台，展示才华的广阔空间，做到发现人才、培养人才、尊重人才、发展人才。</p><p>注重人才的引进和再培养，配套全方位的技术培训和业务培训，增强各层次员工在工作上的实际操作能力，做到以人为本、任人唯贤、人尽其才。</p><p>我们有一支年轻、高学历的员工队伍、一个和谐、勤勉的工作氛围、一种共同发展的团队精神。</p><p><br/></p>'),(300,'<p>作为教育行业软件领先企业，我们有完善的培训教育体系——为员工完善自我提供可靠的资源保证。我们秉承：“企业的竞争优势来源于你比竞争对手学习得更快”。员工的不断学习与发展是正方成长的动力，也是正方激情创新的的源泉。我们将给员工提供更多的学习和成长的机会，这是公司每位领导与员工共同的责任。</p><p><br/></p><p><strong>职业培训 </strong></p><p>公司高度重视员工培训，新员工从加入公司开始，就接受系统的各类培训，使能够快速融入团队，正常开展工作，并在正方得到良好的职业发展。</p><p>公司开展“送出去，请进来”培训规则。提供优秀员工送出去培训的机会，请进来各类专家、顾问、导师到公司指导培训全体员工。</p><p><br/></p><p><strong>新员工导师制度</strong></p><p>通过导师制帮助新员工尽快融入正方文化氛围、熟悉工作环境、流程、产品、技术和业务，尽快顺利接手工作、进入工作角色。</p><p><br/></p><p><strong>新员工入职培训</strong></p><p>新员工入职培训课程包括公司发展历程、企业文化、公司管理制度体系、公司产品体系、公司业务体系、行业知识、职业素养技能等，快速引导新员工理解公司的价值观和经营理念，认同公司文化，顺利进入工作角色。</p><p><br/></p><p><strong>员工在职培训</strong></p><p>员工在职培训包括专业技能培训和管理培训。根据员工岗位和任职要求，提供相应的专业技能和管理培训，涵盖产品管理、研发、市场、销售、咨询实施、人力资源、行政管理、企业管理等方面，帮助员工有效工作，并为员工在公司平台上不断职业发展提供更有利的支持。</p><p><br/></p>'),(301,'1136'),(297,'1137'),(302,'1139'),(303,'95');

/*Table structure for table `qinggan_fields` */

DROP TABLE IF EXISTS `qinggan_fields`;

CREATE TABLE `qinggan_fields` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '字段ID，自增',
  `title` varchar(255) NOT NULL COMMENT '字段名称',
  `identifier` varchar(50) NOT NULL COMMENT '字段标识串',
  `field_type` varchar(255) NOT NULL DEFAULT '200' COMMENT '字段存储类型',
  `note` varchar(255) NOT NULL COMMENT '字段内容备注',
  `form_type` varchar(100) NOT NULL COMMENT '表单类型',
  `form_style` varchar(255) NOT NULL COMMENT '表单CSS',
  `format` varchar(100) NOT NULL COMMENT '格式化方式',
  `content` varchar(100) NOT NULL COMMENT '默认值',
  `taxis` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  `ext` text NOT NULL COMMENT '扩展内容',
  `area` text NOT NULL COMMENT '使用范围，多个应用范围用英文逗号隔开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8 COMMENT='字段管理器';

/*Data for the table `qinggan_fields` */

insert  into `qinggan_fields`(`id`,`title`,`identifier`,`field_type`,`note`,`form_type`,`form_style`,`format`,`content`,`taxis`,`ext`,`area`) values (6,'内容','content','longtext','','editor','','html','',255,'a:13:{s:5:\"width\";s:3:\"950\";s:6:\"height\";s:3:\"360\";s:7:\"is_code\";s:0:\"\";s:9:\"btn_image\";s:1:\"1\";s:9:\"btn_video\";s:1:\"1\";s:8:\"btn_file\";s:1:\"1\";s:8:\"btn_page\";s:0:\"\";s:8:\"btn_info\";s:0:\"\";s:7:\"is_read\";s:0:\"\";s:5:\"etype\";s:4:\"full\";s:7:\"btn_map\";s:0:\"\";s:7:\"inc_tag\";s:0:\"\";s:10:\"paste_text\";s:0:\"\";}','module,project'),(7,'图片','pictures','varchar','支持多图','upload','','safe','',50,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"1\";s:11:\"upload_auto\";s:1:\"0\";}','all,cate,module,project'),(8,'缩略图','thumb','varchar','','upload','','safe','',30,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}','module'),(127,'单个文件','dfile','varchar','请上传要下载的文件','upload','','int','',255,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}','all,cate,module,project'),(11,'链接','link','longtext','手动指定外部链接时，伪静态链接可以留空','url','','safe','',90,'a:1:{s:5:\"width\";s:3:\"500\";}','all,cate,module,project'),(12,'摘要','note','longtext','简要文字描述','textarea','','safe','',20,'a:2:{s:5:\"width\";s:3:\"600\";s:6:\"height\";s:2:\"80\";}','all,cate,module,project'),(13,'性别','gender','varchar','','radio','','safe','女',120,'a:3:{s:11:\"option_list\";s:0:\"\";s:9:\"put_order\";s:1:\"0\";s:10:\"ext_select\";s:8:\"男\r\n女\";}','all,cate,module,project'),(14,'邮箱','email','varchar','','text','','safe','',130,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}','all,cate,module,project'),(37,'链接方式','target','varchar','设置是否在新窗口打开','radio','','safe','_self',100,'a:1:{s:11:\"option_list\";s:5:\"opt:6\";}','cate,module,project'),(30,'姓名','fullname','varchar','','text','','safe','',10,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}','all,cate,module,project'),(31,'通栏图片','banner','varchar','','upload','','safe','',40,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}','all,cate,module,project'),(34,'附件','files','varchar','仅支持rar和zip的压缩包，支持多附件','upload','','safe','',70,'a:3:{s:11:\"upload_type\";s:3:\"zip\";s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"1\";}','all,cate,module,project'),(36,'视频','video','varchar','支持并推荐您使用FlV格式视频','upload','','int','',110,'a:3:{s:7:\"cate_id\";s:0:\"\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"0\";}','all,cate,module,project'),(60,'客服QQ','qq','varchar','','text','','safe','',150,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}','all,cate,module,project'),(116,'广告内容','ad','longtext','','editor','','html_js','',255,'a:12:{s:5:\"width\";s:3:\"600\";s:6:\"height\";s:3:\"100\";s:7:\"is_code\";i:1;s:9:\"btn_image\";i:1;s:9:\"btn_video\";i:1;s:8:\"btn_file\";b:0;s:8:\"btn_page\";b:0;s:8:\"btn_info\";b:0;s:7:\"is_read\";b:0;s:5:\"etype\";s:6:\"simple\";s:7:\"btn_tpl\";b:0;s:7:\"btn_map\";b:0;}','all,cate,module,project'),(75,'联系地址','address','varchar','','text','','safe','',79,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"500\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}','all,module,project'),(76,'联系电话','tel','varchar','','text','','safe','',89,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}','all,cate,module,project'),(77,'邮编','zipcode','varchar','请填写六位数字的邮编号码','text','','safe','',30,'a:2:{s:8:\"form_btn\";b:0;s:5:\"width\";s:3:\"300\";}','all,module'),(79,'LOGO','logo','varchar','网站LOGO，规格：88x31','text','','safe','',160,'a:2:{s:8:\"form_btn\";s:5:\"image\";s:5:\"width\";s:3:\"500\";}','all,cate,module,project'),(80,'图片','pic','varchar','','text','','safe','',255,'a:4:{s:8:\"form_btn\";s:5:\"image\";s:5:\"width\";s:3:\"500\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}','all,cate,module,project'),(82,'备案号','cert','varchar','','text','','safe','',255,'a:2:{s:8:\"form_btn\";b:0;s:5:\"width\";s:3:\"300\";}','all'),(95,'发货时间','sendtime','varchar','设置发货时间','text','','time','',255,'a:2:{s:8:\"form_btn\";s:4:\"date\";s:5:\"width\";s:3:\"300\";}','module'),(96,'企业名称','company','varchar','','text','','safe','',255,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"500\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}','all,module,project'),(106,'管理员回复','adm_reply','longtext','','editor','','html','',255,'a:12:{s:5:\"width\";s:3:\"800\";s:6:\"height\";s:3:\"180\";s:7:\"is_code\";b:0;s:9:\"btn_image\";i:1;s:9:\"btn_video\";i:1;s:8:\"btn_file\";i:1;s:8:\"btn_page\";b:0;s:8:\"btn_info\";b:0;s:7:\"is_read\";b:0;s:5:\"etype\";s:6:\"simple\";s:7:\"btn_tpl\";b:0;s:7:\"btn_map\";b:0;}','module'),(114,'手机号','mobile','varchar','','text','','safe','',255,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}','all,cate,module,project'),(119,'页脚版权','copyright','longtext','','editor','','html','',255,'a:12:{s:5:\"width\";s:3:\"800\";s:6:\"height\";s:3:\"100\";s:7:\"is_code\";b:0;s:9:\"btn_image\";s:1:\"1\";s:9:\"btn_video\";b:0;s:8:\"btn_file\";b:0;s:8:\"btn_page\";b:0;s:8:\"btn_info\";b:0;s:7:\"is_read\";b:0;s:5:\"etype\";s:6:\"simple\";s:7:\"btn_tpl\";b:0;s:7:\"btn_map\";b:0;}','all,module'),(120,'英文标题','entitle','varchar','设置与主题名称相对应的英文标题','text','','safe','',255,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"500\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}','all,cate,module,project'),(121,'二维码图片','barcode','varchar','请上传相应的二维码图片','upload','','safe','',255,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"0\";}','all,cate,module,project'),(122,'子标题','subtitle','varchar','','text','','safe','',20,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}','all,cate,module,project'),(124,'自定义链接','linkurl','varchar','请填写链接地址，外链请输入http://或https://','text','','safe','',255,'a:4:{s:8:\"form_btn\";s:3:\"url\";s:5:\"width\";s:3:\"500\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}','all,cate,module,project'),(125,'背景颜色','bgcolor','varchar','实现在不支持CSS3的情况与背景融合','text','','safe','FFFFFF',255,'a:4:{s:8:\"form_btn\";s:5:\"color\";s:5:\"width\";s:0:\"\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}','all,cate,module,project');

/*Table structure for table `qinggan_gd` */

DROP TABLE IF EXISTS `qinggan_gd`;

CREATE TABLE `qinggan_gd` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `identifier` varchar(100) NOT NULL COMMENT '标识串',
  `width` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '图片宽度',
  `height` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '图片高度',
  `mark_picture` varchar(255) NOT NULL COMMENT '水印图片位置',
  `mark_position` varchar(100) NOT NULL COMMENT '水印位置',
  `cut_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '图片生成方式，支持缩放法、裁剪法、等宽、等高及自定义五种，默认使用缩放法',
  `quality` tinyint(3) unsigned NOT NULL DEFAULT '100' COMMENT '图片生成质量，默认是100',
  `bgcolor` varchar(10) NOT NULL DEFAULT 'FFFFFF' COMMENT '补白背景色，默认是白色',
  `trans` tinyint(3) unsigned NOT NULL DEFAULT '65' COMMENT '透明度',
  `editor` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0普通1默认插入编辑器',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='上传图片自动生成方案';

/*Data for the table `qinggan_gd` */

insert  into `qinggan_gd`(`id`,`identifier`,`width`,`height`,`mark_picture`,`mark_position`,`cut_type`,`quality`,`bgcolor`,`trans`,`editor`) values (2,'thumb',200,200,'','bottom-right',1,80,'FFFFFF',0,0),(12,'auto',0,0,'res/201502/26/36afa2d3dfe37cbd.png','bottom-right',0,80,'FFFFFF',0,1),(30,'mobile',310,0,'','bottom-right',0,80,'FFFFFF',0,0);

/*Table structure for table `qinggan_list` */

DROP TABLE IF EXISTS `qinggan_list`;

CREATE TABLE `qinggan_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '0为根主题，其他ID对应list表的id字段',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `module_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '模块ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `site_id` mediumint(8) unsigned NOT NULL COMMENT '网站ID',
  `title` varchar(255) NOT NULL COMMENT '主题',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未审核，1已审核',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0显示，1隐藏',
  `hits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '查看次数',
  `tpl` varchar(255) NOT NULL COMMENT '自定义的模板',
  `seo_title` varchar(255) NOT NULL COMMENT 'SEO标题',
  `seo_keywords` varchar(255) NOT NULL COMMENT 'SEO关键字',
  `seo_desc` varchar(255) NOT NULL COMMENT 'SEO描述',
  `tag` varchar(255) NOT NULL COMMENT 'tag标签',
  `attr` varchar(255) NOT NULL COMMENT '主题属性',
  `replydate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后回复时间',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID号，为0表示管理员发布',
  `identifier` varchar(255) NOT NULL COMMENT '内容标识串',
  `title_en` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `site_id` (`site_id`,`identifier`,`status`)
) ENGINE=MyISAM AUTO_INCREMENT=1507 DEFAULT CHARSET=utf8 COMMENT='内容主表';

/*Data for the table `qinggan_list` */

insert  into `qinggan_list`(`id`,`parent_id`,`cate_id`,`module_id`,`project_id`,`site_id`,`title`,`dateline`,`sort`,`status`,`hidden`,`hits`,`tpl`,`seo_title`,`seo_keywords`,`seo_desc`,`tag`,`attr`,`replydate`,`user_id`,`identifier`,`title_en`) values (1398,0,0,73,165,1,'网站首页',1441460487,10,1,0,0,'','','','','','',0,0,'','Home'),(1399,0,0,73,165,1,'公司简介',1441460497,18,1,0,0,'','','','','','',0,0,'','About'),(1400,0,0,73,165,1,'新闻动态',1441460518,16,1,0,0,'','','','','','',0,0,'','News'),(1401,0,0,73,165,1,'工程案例',1441460539,15,1,0,0,'','','','','','',0,0,'','Project'),(1402,0,0,73,165,1,'资料下载',1441460594,100,0,0,0,'','','','','','',0,0,'',NULL),(1403,0,0,73,165,1,'公司相册',1441460603,60,0,0,0,'','','','','','',0,0,'',NULL),(1404,0,0,73,165,1,'人才招聘',1441460616,70,0,0,0,'','','','','','',0,0,'',NULL),(1405,0,0,73,165,1,'在线留言',1441460658,80,0,0,0,'','','','','','',0,0,'',NULL),(1406,0,0,73,165,1,'联系我们',1441460674,19,1,0,0,'','','','','','',0,0,'','Contact'),(1407,1399,0,73,165,1,'公司简介',1441460738,10,0,0,0,'','','','','','',0,0,'',NULL),(1408,1399,0,73,165,1,'企业文化',1441460769,20,0,0,0,'','','','','','',0,0,'',NULL),(1459,0,5,76,169,1,'华为P7',1445872241,0,1,0,0,'','','','','','',0,0,'',NULL),(1410,1399,0,73,165,1,'发展历程',1441460789,30,0,0,0,'','','','','','',0,0,'',NULL),(1411,0,0,74,166,1,'经典永不止步',1441463159,0,1,0,0,'','','','','','',0,0,'',NULL),(1412,0,0,74,166,1,'梦之起程',1441463198,0,1,0,0,'','','','','','',0,0,'',NULL),(1413,0,0,74,166,1,'专业建站',1441463217,0,1,0,0,'','','','','','',0,0,'',NULL),(1456,0,0,77,168,1,'公司简介',1442473294,1,1,0,111,'','','','','','',0,0,'about-us',NULL),(1457,0,0,77,168,1,'企业文化',1442477302,2,1,0,14,'','','','','','',0,0,'culture',NULL),(1458,0,0,77,168,1,'发展历程',1442477842,3,1,0,17,'','','','','','',0,0,'development',NULL),(1460,0,5,76,169,1,'华为P7-2',1445872645,0,1,0,5,'','','','','','',0,0,'',NULL),(1461,0,6,76,169,1,'苹果手机-1',1445874367,0,1,0,3,'','','','','','',0,0,'',NULL),(1462,0,6,76,169,1,'小米手机',1445904334,0,1,0,2,'','','','','','',0,0,'',NULL),(1463,0,5,76,169,1,'魅族MX4-1',1445904354,0,1,0,6,'','','','','','',0,0,'',NULL),(1464,0,5,76,169,1,'魅族MX4-2',1445904369,0,1,0,4,'','','','','','',0,0,'',NULL),(1467,0,0,79,172,1,'PHPOK企业站',1449990258,0,1,0,1,'','','','','','',0,0,'',NULL),(1468,0,0,79,172,1,'中国站长站',1449990269,0,1,0,1,'','','','','','',0,0,'',NULL),(1469,0,0,79,172,1,'梦幻网络',1449990300,0,1,0,1,'','','','','','',0,0,'',NULL),(1470,0,0,79,172,1,'启邦互动',1449990328,0,1,0,1,'','','','','','',0,0,'',NULL),(1471,0,9,78,171,1,'Apple iPhone 5s (A1530) 16GB 白色 移动联通4G手机+dostyle USB蓝牙耳机 / 便携式移动电源',1450059840,0,1,0,0,'','','','','','',0,0,'',NULL),(1472,0,10,78,171,1,'小米 4c 标准版 全网通 粉色 移动联通电信4G手机 双卡双待',1450065745,0,1,0,0,'','','','','','',0,0,'',NULL),(1473,0,8,78,171,1,'魅族 MX4 16GB 灰色 移动4G手机',1450066294,0,1,0,29,'','','','','','',0,0,'',NULL),(1474,0,8,78,171,1,'华为 Ascend P7 (P7-L05/L07) 白 移动4G手机',1450067007,0,1,0,88,'','','','','','',0,0,'',NULL),(1476,0,0,81,170,1,'魅族图片1',1450143224,0,1,0,0,'','','','','','',0,0,'',NULL),(1477,0,0,81,170,1,'魅族图片2',1450143270,0,1,0,0,'','','','','','',0,0,'',NULL),(1478,0,0,81,170,1,'华为图片1',1450143282,0,1,0,2,'','','','','','',0,0,'',NULL),(1479,0,0,81,170,1,'华为图片2',1450143292,0,1,0,25,'','','','','','',0,0,'',NULL),(1481,0,0,82,175,1,'fasdf',1450148164,0,1,0,0,'','','','','','',0,0,'',NULL),(1482,0,0,82,175,1,'测试留言',1450153800,0,1,0,0,'','','','','','',0,0,'',NULL),(1483,0,0,83,176,1,'PHP开发工程师',1450168112,0,1,0,25,'','','','','','',0,0,'',NULL),(1484,0,0,83,176,1,'销售经理',1450170104,0,1,0,17,'','','','','','',0,0,'',NULL),(1486,0,0,85,180,1,'客服1',1450173751,0,1,0,0,'','','','','','',0,0,'',NULL),(1487,0,0,85,180,1,'客服2',1450173764,0,1,0,0,'','','','','','',0,0,'',NULL),(1488,0,2,75,167,1,'新闻测试新闻测试新闻测试新闻测试新闻测试',1450175243,0,1,0,0,'','','','','','',0,0,'',NULL),(1489,0,2,75,167,1,'新闻测试新闻测试新闻测试新闻测试新闻测试',1450175243,0,1,0,0,'','','','','','',0,0,'',NULL),(1490,0,2,75,167,1,'新闻测试新闻测试新闻测试新闻测试新闻测试',1450175243,0,1,0,0,'','','','','','',0,0,'',NULL),(1491,0,2,75,167,1,'新闻测试新闻测试新闻测试新闻测试新闻测试',1450175243,0,1,0,18,'','','','','','',0,0,'',NULL),(1492,0,3,75,167,1,'新闻测试新闻测试新闻测试新闻测试新闻测试',1450175243,0,1,0,0,'','','','','','',0,0,'',NULL),(1493,0,3,75,167,1,'新闻测试新闻测试新闻测试新闻测试新闻测试',1450175243,0,1,0,0,'','','','','','',0,0,'',NULL),(1494,0,3,75,167,1,'新闻测试新闻测试新闻测试新闻测试新闻测试',1450175243,0,1,0,0,'','','','','','',0,0,'',NULL),(1495,0,2,75,167,1,'新闻测试新闻测试新闻测试新闻测试新闻测试',1450175243,0,1,0,7,'','','','','','',0,0,'',NULL),(1496,0,3,75,167,1,'新闻测试新闻测试新闻测试新闻测试新闻测试',1450175243,0,1,0,5,'','','','','','',0,0,'',NULL),(1497,0,2,75,167,1,'新闻测试新闻测试新闻测试新闻测试新闻测试',1450175243,0,1,0,3,'','','','','','',0,0,'',NULL),(1498,0,3,75,167,1,'新闻测试新闻测试新闻测试新闻测试新闻测试',1450175243,0,1,0,4,'','','','','','',0,0,'',NULL),(1506,0,3,75,167,1,'试管婴儿移植后【胎停】的7种原因',2015,0,1,0,0,'','','试管婴儿移植后','试管婴儿移植后【胎停】的7种原因','','',0,0,'',NULL);

/*Table structure for table `qinggan_list_73` */

DROP TABLE IF EXISTS `qinggan_list_73`;

CREATE TABLE `qinggan_list_73` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主分类ID',
  `target` varchar(255) NOT NULL DEFAULT '_self' COMMENT '链接方式',
  `link` longtext NOT NULL COMMENT '链接',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`,`project_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='导航菜单';

/*Data for the table `qinggan_list_73` */

insert  into `qinggan_list_73`(`id`,`site_id`,`project_id`,`cate_id`,`target`,`link`) values (1398,1,165,0,'_self','a:2:{s:7:\"default\";s:9:\"index.php\";s:7:\"rewrite\";s:9:\"index.php\";}'),(1399,1,165,0,'_self','a:2:{s:7:\"default\";s:21:\"index.php?id=about-us\";s:7:\"rewrite\";s:13:\"about-us.html\";}'),(1400,1,165,0,'_self','a:2:{s:7:\"default\";s:20:\"index.php?id=article\";s:7:\"rewrite\";s:12:\"article.html\";}'),(1401,1,165,0,'_self','a:2:{s:7:\"default\";s:20:\"index.php?id=product\";s:7:\"rewrite\";s:12:\"product.html\";}'),(1402,1,165,0,'_self','a:2:{s:7:\"default\";s:18:\"index.php?id=files\";s:7:\"rewrite\";s:10:\"files.html\";}'),(1403,1,165,0,'_self','a:2:{s:7:\"default\";s:18:\"index.php?id=photo\";s:7:\"rewrite\";s:10:\"photo.html\";}'),(1404,1,165,0,'_self','a:2:{s:7:\"default\";s:19:\"index.php?id=talent\";s:7:\"rewrite\";s:11:\"talent.html\";}'),(1405,1,165,0,'_self','a:2:{s:7:\"default\";s:20:\"index.php?id=message\";s:7:\"rewrite\";s:12:\"message.html\";}'),(1406,1,165,0,'_self','a:2:{s:7:\"default\";s:20:\"index.php?id=contact\";s:7:\"rewrite\";s:12:\"contact.html\";}'),(1407,1,165,0,'_self','a:2:{s:7:\"default\";s:21:\"index.php?id=about-us\";s:7:\"rewrite\";s:13:\"about-us.html\";}'),(1408,1,165,0,'_self','a:2:{s:7:\"default\";s:20:\"index.php?id=culture\";s:7:\"rewrite\";s:12:\"culture.html\";}'),(1410,1,165,0,'_self','a:2:{s:7:\"default\";s:24:\"index.php?id=development\";s:7:\"rewrite\";s:16:\"development.html\";}');

/*Table structure for table `qinggan_list_74` */

DROP TABLE IF EXISTS `qinggan_list_74`;

CREATE TABLE `qinggan_list_74` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主分类ID',
  `banner` varchar(255) NOT NULL DEFAULT '' COMMENT '通栏图片',
  `link` longtext NOT NULL COMMENT '链接',
  `target` varchar(255) NOT NULL DEFAULT '_self' COMMENT '链接方式',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`,`project_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图片播放器';

/*Data for the table `qinggan_list_74` */

insert  into `qinggan_list_74`(`id`,`site_id`,`project_id`,`cate_id`,`banner`,`link`,`target`) values (1411,1,166,0,'965','a:2:{s:7:\"default\";s:9:\"index.php\";s:7:\"rewrite\";s:10:\"index.html\";}','_self'),(1412,1,166,0,'966','a:2:{s:7:\"default\";s:9:\"index.php\";s:7:\"rewrite\";s:10:\"index.html\";}','_self'),(1413,1,166,0,'967','a:2:{s:7:\"default\";s:9:\"index.php\";s:7:\"rewrite\";s:10:\"index.html\";}','_self');

/*Table structure for table `qinggan_list_75` */

DROP TABLE IF EXISTS `qinggan_list_75`;

CREATE TABLE `qinggan_list_75` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主分类ID',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `note` longtext NOT NULL COMMENT '摘要',
  `content` longtext NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`,`project_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='新闻资讯';

/*Data for the table `qinggan_list_75` */

insert  into `qinggan_list_75`(`id`,`site_id`,`project_id`,`cate_id`,`thumb`,`note`,`content`) values (1488,1,167,2,'1121','新闻测试新闻测试新闻测试新闻测试新闻测试','<p>新闻测试新闻测试新闻测试新闻测试</p>'),(1489,1,167,2,'1121','新闻测试新闻测试新闻测试新闻测试新闻测试','<p>新闻测试新闻测试新闻测试新闻测试</p>'),(1490,1,167,2,'1121','新闻测试新闻测试新闻测试新闻测试新闻测试','<p>新闻测试新闻测试新闻测试新闻测试</p>'),(1491,1,167,2,'1121','新闻测试新闻测试新闻测试新闻测试新闻测试','<p>新闻测试新闻测试新闻测试新闻测试</p>'),(1492,1,167,3,'1121','新闻测试新闻测试新闻测试新闻测试新闻测试','<p>新闻测试新闻测试新闻测试新闻测试</p>'),(1493,1,167,3,'1121','新闻测试新闻测试新闻测试新闻测试新闻测试','<p>新闻测试新闻测试新闻测试新闻测试</p>'),(1494,1,167,3,'1121','新闻测试新闻测试新闻测试新闻测试新闻测试','<p>新闻测试新闻测试新闻测试新闻测试</p>'),(1495,1,167,2,'1121','新闻测试新闻测试新闻测试新闻测试新闻测试','<p>新闻测试新闻测试新闻测试新闻测试</p>'),(1496,1,167,3,'1121','新闻测试新闻测试新闻测试新闻测试新闻测试','<p>新闻测试新闻测试新闻测试新闻测试</p>'),(1497,1,167,2,'1121','新闻测试新闻测试新闻测试新闻测试新闻测试','<p>新闻测试新闻测试新闻测试新闻测试</p>'),(1498,1,167,3,'1121','新闻测试新闻测试新闻测试新闻测试新闻测试','<p>新闻测试新闻测试新闻测试新闻测试</p>'),(1506,1,167,3,'1148','','<span style=\"font-family:System;font-size:16px;\">  导读：试管婴儿对大部分女性而言，显然还是一个比较生疏的名词。假如您决定做试管婴儿的手术，就必须了解这个手术前后的注意事项。今天，我们来了解一下试管婴儿移植后胎停是怎么一回事。<br /><br />　　专家表示，胎停是指胚胎发育到一个阶段发生了死亡而停止继续发育。那么，试管婴儿移植后胎停是怎么样一回事呢?引起胎停的原因是什么?下面，让小编告诉你答案吧，进而增加对试管婴儿的认识。</span><p><span style=\"font-family:System;font-size:16px;\"></span></p><p><span style=\"font-family:System;font-size:16px;\">　　1、试管婴儿移植后胎停的原因：染色体异常</span></p><p><span style=\"font-family:System;font-size:16px;\"><br /></span></p><p><span style=\"font-family:System;font-size:16px;\">　　无论是精子还是卵子，只要携带基因遗传物质的染色体发生了异常，那么即使是形成了受精卵，胚胎也不会正常地发育。预防的办法：如果家族内有遗传病史，应在怀孕前先进行医学诊断和孕前体检。</span></p><p><span style=\"font-family:System;font-size:16px;\"></span></p><p><span style=\"font-family:System;font-size:16px;\"></span></p><p style=\"line-height: 19px;\"><span style=\"font-family: System; font-size: 16px;\">  2、试管婴儿移植后胎停的原因：准妈妈感染了病毒</span></p><p style=\"line-height: 19px;\"><span style=\"font-family: System; font-size: 16px;\"><br /></span></p><p style=\"line-height: 19px;\"><span style=\"font-family: System; font-size: 16px;\">　　重视孕前体检，应该在孕前注射风疹疫苗。准备怀孕3个月内尽量不要到人群密集的公共场合。并且适当地进行运动，保证饮食均衡，增加抵抗力。</span></p><p><span style=\"font-family:System;font-size:16px;\"></span></p><p><span style=\"font-family:System;font-size:16px;\"></span></p><p style=\"line-height: 19px;\"><span style=\"font-family: System; font-size: 16px;\">  3、试管婴儿移植后胎停的原因：吸烟或酗酒</span></p><p style=\"line-height: 19px;\"><span style=\"font-family: System; font-size: 16px;\"><br /></span></p><p style=\"line-height: 19px;\"><span style=\"font-family: System; font-size: 16px;\">　　在准备怀孕期间，无论是丈夫还是妻子都应该有计划地戒烟，或者尽量做到减少吸烟和饮酒的量。</span></p><p><span style=\"font-family:System;font-size:16px;\"></span></p><p><span style=\"font-family:System;font-size:16px;\">　　4、试管婴儿移植后胎停的原因：服用了影响胚胎发育的药物</span></p><p><span style=\"font-family:System;font-size:16px;\"><br /></span></p><p><span style=\"font-family:System;font-size:16px;\">　　准备怀孕应该是有计划有准备的。并且应该切记擅自用药。如果确实觉得自己感冒了，又担心药物会对胚胎有不良的影响，不妨先买包试纸，确认一下是否怀孕(因为受精卵结合10天后，通过试纸就可以知道自己是否怀孕了)，然后再到医院请医生针对自己的病情开出药物。</span></p><p><span style=\"font-family:System;font-size:16px;\"></span></p><p></p><p style=\"text-align: center;\"><img src=\"res/201606/16/1466046565_0_873.jpg\" border=\"0\" style=\"font-family: System; font-size: 16px;\" alt=\"胎停的7种原因\" width=\"525\" height=\"308\" /></p><p><span style=\"font-family:System;font-size:16px;\"><br /></span></p><p style=\"line-height: 19px;\"><span style=\"font-family: System; font-size: 16px;\">  5、试管婴儿移植后胎停的原因：到放射线或大量电磁辐射的照射受</span></p><p style=\"line-height: 19px;\"><span style=\"font-family: System; font-size: 16px;\"><br /></span></p><p style=\"line-height: 19px;\"><span style=\"font-family: System; font-size: 16px;\">　　如果在准备怀孕的过程中需要拍摄X光片，一定要过一段时间再怀孕。微波炉在运转的过程中，一定要在距离1米以外的地方。手机最好能够使用耳机，不用的时候尽量放在离身体比较远的地方。</span></p><p><span style=\"font-family:System;font-size:16px;\"><br /></span></p><p><span style=\"font-family:System;font-size:16px;\"></span></p><p style=\"line-height: 19px;\"><span style=\"font-family: System; font-size: 16px;\">  6、试管婴儿移植后胎停的原因：接触了有毒物质</span></p><p style=\"line-height: 19px;\"><span style=\"font-family: System; font-size: 16px;\"><br /></span></p><p style=\"line-height: 19px;\"><span style=\"font-family: System; font-size: 16px;\">　　如果从事的工作会接触到大量化学药剂及有害物质，应该在怀孕前提前申请调换一些相对安全的岗位。如果居家、办公室刚刚装修过，最好通风3个月再搬进去，如果做不到这一点，也应该多在室内放置一些绿色植物，不要马上怀孕，孕前应该进行详细地身体检查。</span></p><p><span style=\"font-family:System;font-size:16px;\"></span></p><p><span style=\"font-family:System;font-size:16px;\">　　7、试管婴儿移植后胎停的原因：准妈妈患有慢性疾病</span></p><p><span style=\"font-family:System;font-size:16px;\"><br /></span></p><p><span style=\"font-family:System;font-size:16px;\">　　患有严重的糖尿病、高血压、心脏病、病毒性肝炎等严重慢性疾病的女性应该在病情稳定的情况下再考虑怀孕。应该遵照医嘱停服药物一段时间后再受孕。</span></p><p><span style=\"font-family:System;font-size:16px;\"><br /></span></p><p><span style=\"font-family:System;font-size:16px;\">  试管婴儿移植后胎停的症状有哪些？怎么预防？</span></p><p><span style=\"font-family:System;font-size:16px;\"><br /></span></p><p></p><p><span style=\"font-family:System;font-size:16px;\">  女性一般胚胎停止发育前都会出现少量的流血，且以褐色偏多.早孕反应，乳房涨痛，恶心呕吐乏力，突然消失或是减弱，肚子不再长大等症状。上述表现因人而异，有的甚至一点迹象都没有，直接出现腹痛，然后流产，或胚胎停育后无症状，通过常规B超检查才发现。因此专家提醒准妈妈们一定要对自己在怀孕期间的各种不适情况引起重视，当身体不适时及时到正规医院就医。</span></p><p><span style=\"font-family:System;font-size:16px;\"><br /></span></p><p><span style=\"font-family:System;font-size:16px;\">  不孕不育患者对是否胎停育不必过分担心，这种现象即使是自然受孕也会出现，并不是说试管婴儿会加大这种风险，一般而言，只要患者多加注意对身体的调理和保护，都会顺利生下宝宝的。</span></p><p><span style=\"font-family:System;font-size:16px;\"> </span></p><p><span style=\"font-family:System;font-size:16px;\"> <span style=\"color:#ff0000;\">》》》》<span style=\"color:#ff0000;\">试管婴儿移植需要注意的10大注意事项</span>《《《《</span></span></p><p><span style=\"font-family:System;font-size:16px;\"><span style=\"color:#ff0000;\"> 》》》》<span style=\"color:#ff0000;\">哪些人适合去泰国做试管婴儿？</span>《《《《</span></span></p><p><span style=\"font-family:System;font-size:16px;\"><br /></span></p><p style=\"line-height: 19px;\"><span style=\"font-family: \'Comic Sans MS\'; font-size: 16px;\"><br /></span></p><br /><br /><br /><p class=\"ys_a fw_b lh_30\">以上内容由恒嘉国际泰国试管婴儿曼谷华人服务机构整理收集，部分内容来源于网络<br />更多去泰国做试管婴儿的详细资料可咨询恒嘉国际在线客服索取。</p>');

/*Table structure for table `qinggan_list_76` */

DROP TABLE IF EXISTS `qinggan_list_76`;

CREATE TABLE `qinggan_list_76` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主分类ID',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `pictures` varchar(255) NOT NULL DEFAULT '' COMMENT '图片',
  `content` longtext NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`,`project_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='相册';

/*Data for the table `qinggan_list_76` */

insert  into `qinggan_list_76`(`id`,`site_id`,`project_id`,`cate_id`,`thumb`,`pictures`,`content`) values (1459,1,169,5,'1125','1125,1126','<p>华为P7</p>'),(1460,1,169,5,'1126','1126,1125','<p>华为P7-2</p>'),(1461,1,169,6,'1120','1119,1120','<p>苹果手机-1</p>'),(1462,1,169,6,'1122','1121,1122','<p>小米手机</p>'),(1463,1,169,5,'1124','1123,1124','<p>魅族MX4-1</p>'),(1464,1,169,5,'1123','1123,1124','<p>魅族MX4-2</p>');

/*Table structure for table `qinggan_list_77` */

DROP TABLE IF EXISTS `qinggan_list_77`;

CREATE TABLE `qinggan_list_77` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主分类ID',
  `content` longtext NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`,`project_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='单页面';

/*Data for the table `qinggan_list_77` */

insert  into `qinggan_list_77`(`id`,`site_id`,`project_id`,`cate_id`,`content`) values (1456,1,168,0,'<p>欢迎使用 <strong>PHPOK4企业站系统</strong>（简称 程序 或 系统 ），程序主要用于快速搭建网站。经过多年开发及建站经验，我们积累了很多宝贵经验，系统亦由最初的名片式网站升级到更为复杂企业需求。</p><p>现在先了解一下，程序适合哪些类型的站点</p><p><br/></p><ul class=\" list-paddingleft-2\" style=\"list-style-type: disc;\"><li><p>企业展示站：包括公司简介，新闻资讯，产品展示，联系方式等多种展示模式，并且支持混搭</p></li><li><p>企业电商站：在企业展示站的基础上增加了会员及基础购物功能，程序完全能够胜利，而无需改动程序核心框架</p></li><li><p>个人博客：虽然不建议直接使用程序来做博客，不过常规的博客功能，本程序基本上都包含了。因此也是支持的，如果您以后从事WEB建站服务，建议您从这里开始</p></li><li><p>外贸类企业站：程序支持多语言，也许后台翻译的不完整，不过前台等一切页面都是可以直接用英文模板来套站的。所以也可以说程序极为适合做外贸类网站</p></li><li><p>多语言类网站：程序本身支持多站点模式，也就是说您可以通过多站点模式来实现多语言，多站点内这些资源是通用的：附件，会员及其会员的一些功能（如订单，收藏等）</p></li></ul><p><br/></p><p>程序同时考虑了拥有自己服务器的用户，可以根据实际情况开启的一些服务以提高性能</p><p>Memcache缓存：默认程序使用文件缓存，这当然还是很不错的，不过相比memcache还是不够好，有独立的主机用户（包括现今流行的云服务器），可以尝试开始Memcache，可以有效提升网站效率</p><p><br/></p>'),(1457,1,168,0,'<p>锟铻创业于2014年9月，前身为情感工作室，可追溯到2005年。多年来，我们始终以创造用户价值为目标，打造一流的企业网站系统。</p><p>我们核心价值观是：求实，做事脚踏实地，实事求是。论虚，畅想美好未来，适度放松</p><p><br/></p>'),(1458,1,168,0,'<table interlaced=\"disabled\" width=\"100%\"><tbody><tr class=\"firstRow\"><td colspan=\"1\" rowspan=\"1\" align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2015年6月</span></td><td colspan=\"1\" rowspan=\"1\" align=\"left\" valign=\"middle\" style=\"margin: 0px;\">PHPOK4.3发布</td></tr><tr><td colspan=\"1\" rowspan=\"1\" align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2015年3月</span></td><td colspan=\"1\" rowspan=\"1\" align=\"left\" valign=\"middle\" style=\"margin: 0px;\">PHPOK手册新鲜出炉</td></tr><tr><td colspan=\"1\" rowspan=\"1\" align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2014年10月</span></td><td colspan=\"1\" rowspan=\"1\" style=\"margin: 0px;\">PHPOK4.2发布并成立公司<strong>深圳市锟铻科技有限公司</strong></td></tr><tr><td colspan=\"1\" rowspan=\"1\" align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2014年8月</span></td><td colspan=\"1\" rowspan=\"1\" style=\"margin: 0px;\">PHPOK4.1发布</td></tr><tr><td colspan=\"1\" rowspan=\"1\" align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2014年1月</span></td><td colspan=\"1\" rowspan=\"1\" style=\"margin: 0px;\">PHPOK4.0发布<br/></td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2011年12月</span></td><td style=\"margin: 0px;\">PHPOK3.4版发布（后台更换为桌面式）</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2011年9月</span></td><td style=\"margin: 0px;\">phpok3.3完整版发布</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2010年8月</span></td><td style=\"margin: 0px;\">PHPOK3.0完整版发布</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2008年9月</span></td><td style=\"margin: 0px;\">PHPOK3.0精简版发布</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2008年5月</span></td><td style=\"margin: 0px;\">PHPOK2.2发布（稳定版本）</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2008年3月</span></td><td style=\"margin: 0px;\">PHPOK2.0发布</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2007年5月</span></td><td style=\"margin: 0px;\">qgweb5.2发布，同时更名为：PHPOK1.0.0版！</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2007年1月</span></td><td style=\"margin: 0px;\">qgweb5.0发布（首次实现多语言多风格功能）</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2006年10月</span></td><td style=\"margin: 0px;\">qgweb4.2发布（GBK）</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2006年8月</span></td><td style=\"margin: 0px;\">qgweb4.1发布（UTF）</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2006年8月</span></td><td style=\"margin: 0px;\">团队决定开发进销存管理系统</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2006年6月</span></td><td style=\"margin: 0px;\">qgweb4.0发布</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2005年11月</span></td><td style=\"margin: 0px;\">qgWeb3.0发布（分企业版及个人版）</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2005年8月</span></td><td style=\"margin: 0px;\">工作室论坛开通</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2005年7月</span></td><td style=\"margin: 0px;\">qgWeb1.0发布</td></tr><tr><td align=\"right\" valign=\"middle\" style=\"margin: 0px;\"><span style=\"color: rgb(153, 0, 0); font-weight: bold;\">2005年4月</span></td><td style=\"margin: 0px;\">qgWeb0.54版发布</td></tr></tbody></table><p><br/></p>');

/*Table structure for table `qinggan_list_78` */

DROP TABLE IF EXISTS `qinggan_list_78`;

CREATE TABLE `qinggan_list_78` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主分类ID',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `content` longtext NOT NULL COMMENT '内容',
  `attrs` longtext NOT NULL COMMENT '产品属性',
  `price` varchar(255) NOT NULL DEFAULT '' COMMENT '价格',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`,`project_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品展示';

/*Data for the table `qinggan_list_78` */

insert  into `qinggan_list_78`(`id`,`site_id`,`project_id`,`cate_id`,`thumb`,`content`,`attrs`,`price`) values (1471,1,171,9,'1120,1119','<p>iPhone5是苹果公司（Apple）在2012年9月推出的一款手机，已于2012年9月21日正式上市。</p><p>北京时间2012年9月13日凌晨，苹果公司在美国旧金山芳草地艺术中心举行新品发布会，正式发布其新一代产品 iPhone 5。此次新产品屏幕更大，同时也变得更轻薄。</p><p>iPhone 5采用4英寸视网膜屏，屏幕分辨率由原来iPhone 4S的960x640升级为1136x640，同时主屏幕中的应用图标增加至5排。iPhone 5 预装iOS 6.0.1手机操作系统（现可升级为为IOS9.2）。</p><p>北京时间2013年9月10日，苹果正式发布iPhone 5s和iPhone 5c之后，也已在官网停售iPhone 5。</p><p><br/></p><p>iPhone 5作为苹果的新一代产品，它的屏幕更大，而且也变得更轻薄。iPhone 5采用高清晰度视网膜屏，尺</p><p>iPhone 5</p><p>寸扩大到4英寸，屏幕的比例为16：9，分辨率由原来的960×640升级为1136×640，同屏显示的应用软件的图标也增加了一行。</p><p>iPhone 5的厚度为7.6毫米，比上一代薄了18%。而处理器方面iPhone5采用的是苹果自行研发的A6处理器（内含两个CPU和三个GPU），</p><p>性能是A5处理器的两倍，得益于更先进的制程</p><p>iPhone 5装有iOS6手机操作系统，iOS 能够提供强大而简便的一体化使用体验，堪称绝佳的商务平台。由于硬件与软件珠联璧合，iPhone 的独特功能可以引人入胜的方式生动呈现。而且强大的 iOS 平台可提供安全的基础，随时随地为企业提供支持。iPhone 5配备了全新设计的EarPods耳机，增强了佩戴舒适性和音效，其摄像头优化了拍摄速度和成像质量，可以拍摄240度全景照片，并采用新的Lightning接口取代之前的30-pin接口。</p><p><br/></p>','a:2:{s:5:\"title\";a:4:{i:0;s:6:\"型号\";i:1;s:6:\"大小\";i:2;s:6:\"外观\";i:3;s:6:\"重量\";}s:7:\"content\";a:4:{i:0;s:9:\"iPhone 5s\";i:1;s:24:\"123.8mm * 58.6mm * 7.6mm\";i:2;s:6:\"白色\";i:3;s:4:\"112g\";}}','2866.00'),(1472,1,171,10,'1122,1121','<p class=\"title\" style=\"font-size: 40px; margin: 0px 0px 20px; font-weight: 300; line-height: 1.25; font-family: FZLTXHK, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Heiti SC&#39;, &#39;WenQuanYi Micro Hei&#39;, SimSun, sans-serif; color: rgb(33, 33, 33); white-space: normal; background-color: rgb(249, 249, 249);\">万般体验始于快！<br/>Qualcomm® 骁龙™ 808 旗舰级<br/>64位处理器平台</p><p>每一代小米手机，都代表当今的更高性能，小米4c 亦无例外。流畅的性能始于Qualcomm® 全新旗舰级骁龙™ 808 处理器平台，它采用 64 位构架，配备两个 Cortex-A57 、 四个 Cortex-A53 处理核芯，以及Adreno™ 418 图形处理器，支持多种游戏渲染特效，使小米4c 在进行 3D 游戏、高清视频播放时，呈现细致入微的复杂特效，并将画面细节处理得淋漓尽致。</p><p><br/></p><p class=\"title\" style=\"font-size: 40px; margin: 0px 0px 20px; font-weight: 300; line-height: 1.25; font-family: FZLTXHK, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, &#39;Heiti SC&#39;, &#39;WenQuanYi Micro Hei&#39;, SimSun, sans-serif; color: rgb(33, 33, 33); text-align: right; white-space: normal; background-color: rgb(249, 249, 249);\">众多科技于一屏<br/>5英寸全高清阳光屏</p><p>以往人们无法相信，在手机上也能实现 1080p 电脑级的分辨率。如今，为一块 5 英寸屏幕配备众多科技，已然成为我们的旗舰标准。例如，可以根据光线独立调节每个像素的阳光屏技术，使你在阳光下观看内容也能如同室内一样。夜光屏技术通过更精确的背光调节，使夜晚读书、刷微博，光线变得更为柔和舒适。广受好评的，还有一项称为高色彩饱和度的技术，它使屏幕色域超过普通 sRGB 手机 30% 之多，可以显示的色彩范围更加广泛，无论红色、绿色亦或蓝色，都更生动地呈现在屏幕上。</p><p><br/></p>','a:2:{s:5:\"title\";a:4:{i:0;s:6:\"型号\";i:1;s:6:\"大小\";i:2;s:6:\"外观\";i:3;s:6:\"重量\";}s:7:\"content\";a:4:{i:0;s:14:\"小米手机4C\";i:1;s:14:\"138.1*69.6*7.8\";i:2;s:6:\"粉色\";i:3;s:4:\"132g\";}}','1299.00'),(1473,1,171,8,'1123,1124','<p style=\"margin: 0px; padding: 0px; font-size: 45px; font-weight: 400; line-height: 86px; letter-spacing: 5px; height: 86px; color: rgb(81, 81, 81); white-space: normal; background-color: rgb(255, 255, 255); font-family: SYHT, &#39;Microsoft Yahei&#39;, 微软雅黑, Arial, Helvetica, sans-serif !important;\">更好用的手机</p><p style=\"margin: 0px 0px 30px; padding: 0px; font-size: 24px; font-weight: 400; height: 31px; color: rgb(145, 145, 145); white-space: normal; background-color: rgb(255, 255, 255); font-family: SYHT, &#39;Microsoft Yahei&#39;, 微软雅黑, Arial, Helvetica, sans-serif !important;\">一台好用大屏手机的标准，都在 MX4 上得到体现</p><p>MX4 屏幕更大、性能更强、续航更佳、联网更快、手感更好。</p><p>但又做到厚度更薄，重量更轻。它是如此的精巧，却又如此的强大。</p><p>我们不断突破技术和设计上的可能，只为成就初心 —— 制造一台更好用的手机。</p><p><br/></p><p style=\"margin: 0px; padding: 0px; font-size: 45px; font-weight: 400; height: 95px; line-height: 95px; color: rgb(81, 81, 81); text-align: center; white-space: normal; background-color: rgb(255, 255, 255); font-family: SYHT, &#39;Microsoft Yahei&#39;, 微软雅黑, Arial, Helvetica, sans-serif !important;\">更快 更聪明 更省电</p><p>A17+ A7 的双四核无缝搭配，支持八核心全开，性能提升 87%。主频高达 2.2 GHz 的 A17 核心配合更强大的 PowerVR G6200 GPU，</p><p>保证无论是大型游戏还是日常应用，你都会感觉丝滑顺畅，无比跟手。</p><p>特有的 CorePilot 技术可以根据使用情境动态调整八个大小核的使用情况，在性能和功耗上做了更智能的优化。</p><p>相比 MX3，这块 SoC 综合性能提升了近一倍 ，同等性能功耗却降低了 30%</p><p><br/></p><p style=\"margin: 0px; padding: 0px; font-size: 42px; font-weight: 400; height: 55px; color: rgb(81, 81, 81); text-align: center; white-space: normal; background-color: rgb(248, 248, 248); font-family: SYHT, &#39;Microsoft Yahei&#39;, 微软雅黑, Arial, Helvetica, sans-serif !important;\">2070 万有效像素</p><p style=\"margin: 0px; padding: 0px; font-size: 42px; font-weight: 400; height: 55px; color: rgb(81, 81, 81); text-align: center; white-space: normal; background-color: rgb(248, 248, 248); font-family: SYHT, &#39;Microsoft Yahei&#39;, 微软雅黑, Arial, Helvetica, sans-serif !important;\">索尼 IMX 220 Exmor RS 堆栈式传感器</p><p style=\"margin: 0px; padding: 0px; font-size: 22px; font-weight: 400; height: 70px; line-height: 70px; color: rgb(145, 145, 145); text-align: center; white-space: normal; background-color: rgb(248, 248, 248); font-family: SYHT, &#39;Microsoft Yahei&#39;, 微软雅黑, Arial, Helvetica, sans-serif !important;\">无限可能的高像素怪兽</p><p>微单级别的感光芯片、快至 0.3 秒的对焦马达、性能翻倍的 ISP 芯片，配合令人震撼的 2070 万像素，造就如此强大的相机。</p><p>无论是谁，无论在哪里，你只需轻轻按下拍照键，我们负责将精彩定格成画面，助你记录一切美妙瞬间。</p><p><br/></p>','a:2:{s:5:\"title\";a:4:{i:0;s:6:\"型号\";i:1;s:6:\"大小\";i:2;s:6:\"外观\";i:3;s:6:\"重量\";}s:7:\"content\";a:4:{i:0;s:3:\"MX4\";i:1;s:12:\"144*75.2*8.9\";i:2;s:6:\"灰色\";i:3;s:4:\"147g\";}}','1099.00'),(1474,1,171,8,'1125,1126','<p>2014年5月7日，华为在巴黎发布了2014旗舰机型P7。P7配置5英寸1080P全高清屏幕，采用金属+双玻璃结构，机身厚度仅6.5mm，支持CAT4 LTE网络，五月起在中国大陆等30多个国家及地区开售，全球售价449欧元，中国大陆售价为人民币2888元。</p><p>华为P7正面采用5寸1080p屏，有着6.5mm的极致超薄机身，拍照方面有着前置800万+后置1300万摄像头组合，内置1.8GHz海思Kirin910T四核处理器，有着2GBRAM+16GBROM机身存储，后置不可拆卸的2500mAh电池，支持CAT4LTE4G网络。华为Ascend P7分辨率为1920X1080像素的FHD级别，显示效果非常细腻。核心方面内置一颗主频1.8GHz海思Kirin 910T四核芯处理器，以及2GB RAM+16GB ROM的内存组合，流畅运行基于Android 4.4系统的Emotion UI 2.3用户界面。</p><p>华为P7共有黑色，白色，粉色三种配色可选，已于2014年5月在中国开售。华为商城、京东、天猫华为旗舰店、苏宁易购、国美在线、1号店、亚马逊七大电商平台同步启动预售。</p><p>配置：</p><blockquote><p>华为Emotion系统2.3（兼容Android4.4）</p><p>1.8GHz四核处理器</p><p>5.0英寸Incell屏幕</p><p>2500mAh大容量电池（典型值：2530mAh，最小值：2460mAh）</p><p>MicroSIM+NanoSIM双卡</p><p>16GBROM+2GBRAM</p><p>LTE高速网络，支持CAT4150Mbps</p><p>WLAN802.11b/g/n，支持便携式WLAN热点</p><p>1300万像素主摄像头+800万像素副摄像头，独立专业图像处理芯片</p><p><br/></p><p><br/></p><p>合并图册 (2张)</p><p>DTS音效</p><p><br/></p><p>DLNA</p><p>BT4.0，支持BT4.0BLE</p><p>十级美肤自拍</p><p>全景自拍</p><p>水印照片</p><p>极速抓拍</p><p>简易桌面（SimpleUI）</p><p>杂志锁屏</p><p>语音查找联系人</p><p>极限省电模式</p><p><br/></p></blockquote>','a:2:{s:5:\"title\";a:4:{i:0;s:6:\"型号\";i:1;s:6:\"大小\";i:2;s:6:\"外观\";i:3;s:6:\"重量\";}s:7:\"content\";a:4:{i:0;s:2:\"P7\";i:1;s:51:\"139.8mm（长）×68.8 mm（宽）×6.5 mm（厚）\";i:2;s:6:\"白色\";i:3;s:4:\"124g\";}}','1299.00');

/*Table structure for table `qinggan_list_79` */

DROP TABLE IF EXISTS `qinggan_list_79`;

CREATE TABLE `qinggan_list_79` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主分类ID',
  `linkurl` varchar(255) NOT NULL DEFAULT '' COMMENT '自定义链接',
  `target` varchar(255) NOT NULL DEFAULT '_self' COMMENT '链接方式',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`,`project_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接';

/*Data for the table `qinggan_list_79` */

insert  into `qinggan_list_79`(`id`,`site_id`,`project_id`,`cate_id`,`linkurl`,`target`) values (1467,1,172,0,'http://www.phpok.com','_blank'),(1468,1,172,0,'http://www.chinaz.com','_blank'),(1469,1,172,0,'http://www.7139.com','_blank'),(1470,1,172,0,'http://www.sz-qibang.com','_blank');

/*Table structure for table `qinggan_list_80` */

DROP TABLE IF EXISTS `qinggan_list_80`;

CREATE TABLE `qinggan_list_80` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主分类ID',
  `fullname` varchar(255) NOT NULL DEFAULT '' COMMENT '姓名',
  `mobile` varchar(255) NOT NULL DEFAULT '' COMMENT '手机号',
  `note` longtext NOT NULL COMMENT '咨询内容',
  `furl` varchar(255) NOT NULL DEFAULT '' COMMENT '产品网址',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`,`project_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订购咨询';

/*Data for the table `qinggan_list_80` */

/*Table structure for table `qinggan_list_81` */

DROP TABLE IF EXISTS `qinggan_list_81`;

CREATE TABLE `qinggan_list_81` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主分类ID',
  `dfile` varchar(255) NOT NULL DEFAULT '' COMMENT '单个文件',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`,`project_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文件库';

/*Data for the table `qinggan_list_81` */

insert  into `qinggan_list_81`(`id`,`site_id`,`project_id`,`cate_id`,`dfile`) values (1476,1,170,0,'1124'),(1477,1,170,0,'1123'),(1478,1,170,0,'1125'),(1479,1,170,0,'1126');

/*Table structure for table `qinggan_list_82` */

DROP TABLE IF EXISTS `qinggan_list_82`;

CREATE TABLE `qinggan_list_82` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主分类ID',
  `fullname` varchar(255) NOT NULL DEFAULT '' COMMENT '姓名',
  `mobile` varchar(255) NOT NULL DEFAULT '' COMMENT '手机号',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `content` longtext NOT NULL COMMENT '内容',
  `adm_reply` longtext NOT NULL COMMENT '管理员回复',
  `pictures` varchar(255) NOT NULL DEFAULT '' COMMENT '图片',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`,`project_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='留言';

/*Data for the table `qinggan_list_82` */

insert  into `qinggan_list_82`(`id`,`site_id`,`project_id`,`cate_id`,`fullname`,`mobile`,`email`,`content`,`adm_reply`,`pictures`) values (1481,1,175,0,'faf','fas','dfas','fasdf','<p>谢谢支持</p>',''),(1482,1,175,0,'测试留言','测试留言','测试留言','测试留言测试留言测试留言','','1120,1124');

/*Table structure for table `qinggan_list_83` */

DROP TABLE IF EXISTS `qinggan_list_83`;

CREATE TABLE `qinggan_list_83` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主分类ID',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '工作地点',
  `persons` varchar(255) NOT NULL DEFAULT '' COMMENT '招聘人数',
  `years` varchar(255) NOT NULL DEFAULT '' COMMENT '工作年限',
  `schools` varchar(255) NOT NULL DEFAULT '' COMMENT '学历要求',
  `content` longtext NOT NULL COMMENT '工作描述',
  `price` varchar(255) NOT NULL DEFAULT '面议' COMMENT '薪水范围',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`,`project_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='人才招聘';

/*Data for the table `qinggan_list_83` */

insert  into `qinggan_list_83`(`id`,`site_id`,`project_id`,`cate_id`,`address`,`persons`,`years`,`schools`,`content`,`price`) values (1483,1,176,0,'深圳','3人','1年以上','本科','<p>任职要求：</p><ol class=\" list-paddingleft-2\" style=\"list-style-type: decimal;\"><li><p>大专及以上学历，具有1年以上互联网后端开发工作经历；</p></li><li><p>熟悉php语言及mysql数据库管理，能熟练运用linux做后台管理；</p></li><li><p>精通数据结构及算法，对于大数据有一定的认识；</p></li><li><p>熟悉基本的计算机网络概念，熟悉HTTP协议，了解TCP/IP的基本工作原理，熟悉各种Web标准规范；</p></li><li><p>有良好的团队合作能力，技术视野开阔，有敏捷开发团队实践经验者优先；</p></li><li><p>如果有开源社区贡献和个人技术博客者，请在简历中附上可作为加分项。</p></li></ol><p><br/>岗位职责：</p><ol class=\" list-paddingleft-2\" style=\"list-style-type: decimal;\"><li><p>负责后台代码编写，对接APP及web前端；</p></li><li><p>对数据处理及数据库查询进行优化；</p></li><li><p>处理大规模数据运算；</p></li><li><p>优化系统结构，保证系统运行稳定性。</p></li></ol><p><br/></p>','7500-1万元'),(1484,1,176,0,'深圳','若干','3年以上','大专','<p>岗位职责 ： <br/>1、负责公司《正方数字化校园信息平台》系列产品的销售工作，完成公司分配的销售指标 <br/>2、负责当地市场的开拓，开发潜在客户，维护客户关系，与部门协同完成销售目标 <br/>3、负责按时向部门经理提交书面的工作总结，接受部门经理对业务的指导 <br/>4、负责完成公司交办的其它事宜 <br/>任职资格： <br/>1、大专以上学历，市场营销、计算机、软件等相关专业； <br/>2、三年以上企业应用软件销售或相关工作经验，熟悉软件行业销售流程；对市场营销工作有较深刻认知； <br/>3、能很快熟悉本项目产品信息、客户信息、销售模式； <br/>4、人品诚实稳重、善于沟通、能吃苦；对企业有很强的归宿感，无限的忠诚； <br/>5、高度的工作热情，积极主动，良好的团队合作精神；能在较大的压力下保持良好的工作状态； <br/>6、很强的观察力和应变能力； <br/>7、有良好的市场判断能力和开拓能力，有极强的组织管理能力； <br/>8、有教育行业工作经验优先考虑。</p>','面议');

/*Table structure for table `qinggan_list_84` */

DROP TABLE IF EXISTS `qinggan_list_84`;

CREATE TABLE `qinggan_list_84` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主分类ID',
  `fullname` varchar(255) NOT NULL DEFAULT '' COMMENT '姓名',
  `mobile` varchar(255) NOT NULL DEFAULT '' COMMENT '手机号',
  `dfile` varchar(255) NOT NULL DEFAULT '' COMMENT '简历',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`,`project_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='在线岗位应聘';

/*Data for the table `qinggan_list_84` */

/*Table structure for table `qinggan_list_85` */

DROP TABLE IF EXISTS `qinggan_list_85`;

CREATE TABLE `qinggan_list_85` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '网站ID',
  `project_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '主分类ID',
  `qq` varchar(255) NOT NULL DEFAULT '' COMMENT 'QQ号',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`,`project_id`,`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='在线客服';

/*Data for the table `qinggan_list_85` */

insert  into `qinggan_list_85`(`id`,`site_id`,`project_id`,`cate_id`,`qq`) values (1486,1,180,0,'40782502'),(1487,1,180,0,'150467466');

/*Table structure for table `qinggan_list_cate` */

DROP TABLE IF EXISTS `qinggan_list_cate`;

CREATE TABLE `qinggan_list_cate` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  PRIMARY KEY (`id`,`cate_id`),
  KEY `id` (`id`),
  KEY `cate_id` (`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='主题绑定的分类';

/*Data for the table `qinggan_list_cate` */

insert  into `qinggan_list_cate`(`id`,`cate_id`) values (1392,215),(1392,216),(1393,207),(1394,207),(1395,68),(1415,3),(1417,3),(1459,5),(1460,5),(1461,6),(1462,6),(1463,5),(1464,5),(1471,9),(1472,10),(1473,8),(1474,8),(1488,2),(1489,2),(1490,2),(1491,2),(1492,3),(1493,3),(1494,3),(1495,2),(1496,3),(1497,2),(1498,3),(1506,3);

/*Table structure for table `qinggan_module` */

DROP TABLE IF EXISTS `qinggan_module`;

CREATE TABLE `qinggan_module` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `title` varchar(255) NOT NULL COMMENT '模块名称',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0不使用1使用',
  `taxis` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '模块排序',
  `note` varchar(255) NOT NULL COMMENT '模块说明',
  `layout` text NOT NULL COMMENT '布局',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COMMENT='模块管理，每创建一个模块自动创建一个表';

/*Data for the table `qinggan_module` */

insert  into `qinggan_module`(`id`,`title`,`status`,`taxis`,`note`,`layout`) values (73,'导航',1,10,'','link,target'),(74,'图片播放器',1,20,'','banner,link,target'),(75,'资讯',1,30,'','hits,dateline,thumb'),(76,'相册',1,40,'','hits,dateline,thumb'),(77,'单页面',1,50,'','hits,dateline'),(78,'产品展示',1,60,'','hits,dateline,thumb,price'),(79,'友情链接',1,70,'','hits,linkurl,target'),(80,'订购咨询',1,80,'','dateline,fullname,mobile,furl'),(81,'文件库',1,90,'','hits,dateline,dfile'),(82,'留言',1,100,'','dateline,fullname,mobile,email,pictures'),(83,'人才招聘',1,110,'','hits,dateline,address,persons,years,schools,price'),(84,'在线岗位应聘',1,120,'','dateline,fullname,mobile,email,dfile'),(85,'在线客服',1,130,'','qq');

/*Table structure for table `qinggan_module_fields` */

DROP TABLE IF EXISTS `qinggan_module_fields`;

CREATE TABLE `qinggan_module_fields` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '字段ID，自增',
  `module_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '模块ID',
  `title` varchar(255) NOT NULL COMMENT '字段名称',
  `identifier` varchar(50) NOT NULL COMMENT '字段标识串',
  `field_type` varchar(255) NOT NULL DEFAULT '200' COMMENT '字段存储类型',
  `note` varchar(255) NOT NULL COMMENT '字段内容备注',
  `form_type` varchar(100) NOT NULL COMMENT '表单类型',
  `form_style` varchar(255) NOT NULL COMMENT '表单CSS',
  `format` varchar(100) NOT NULL COMMENT '格式化方式',
  `content` varchar(255) NOT NULL COMMENT '默认值',
  `taxis` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序',
  `ext` text NOT NULL COMMENT '扩展内容',
  `is_front` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0前端不可用1前端可用',
  PRIMARY KEY (`id`),
  KEY `module_id` (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=314 DEFAULT CHARSET=utf8 COMMENT='字段管理器';

/*Data for the table `qinggan_module_fields` */

insert  into `qinggan_module_fields`(`id`,`module_id`,`title`,`identifier`,`field_type`,`note`,`form_type`,`form_style`,`format`,`content`,`taxis`,`ext`,`is_front`) values (274,73,'链接','link','longtext','手动指定外部链接时，伪静态链接可以留空','url','','safe','',10,'a:1:{s:5:\"width\";s:3:\"500\";}',0),(275,74,'通栏图片','banner','varchar','图片限宽高为：980x300','upload','','safe','',10,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}',0),(273,73,'链接方式','target','varchar','设置是否在新窗口打开','radio','','safe','_self',20,'a:1:{s:11:\"option_list\";s:5:\"opt:6\";}',0),(276,74,'链接','link','longtext','手动指定外部链接时，伪静态链接可以留空','url','','safe','',20,'a:1:{s:5:\"width\";s:3:\"500\";}',0),(277,74,'链接方式','target','varchar','设置是否在新窗口打开','radio','','safe','_self',30,'a:1:{s:11:\"option_list\";s:5:\"opt:6\";}',0),(278,75,'缩略图','thumb','varchar','建议上传的图片不要超过200KB','upload','','safe','',10,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}',0),(279,75,'摘要','note','longtext','填写该资讯的一部分摘要信息','textarea','','safe','',20,'a:2:{s:5:\"width\";s:3:\"600\";s:6:\"height\";s:2:\"80\";}',0),(280,75,'内容','content','longtext','','editor','','html','',30,'a:11:{s:5:\"width\";s:3:\"950\";s:6:\"height\";s:3:\"360\";s:7:\"is_code\";s:0:\"\";s:9:\"btn_image\";s:1:\"1\";s:9:\"btn_video\";s:1:\"1\";s:8:\"btn_file\";s:1:\"1\";s:8:\"btn_page\";s:0:\"\";s:8:\"btn_info\";s:0:\"\";s:7:\"is_read\";s:0:\"\";s:5:\"etype\";s:4:\"full\";s:7:\"btn_map\";s:0:\"\";}',0),(281,76,'缩略图','thumb','varchar','要求上传的图片大小不能超过200KB','upload','','safe','',10,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}',0),(282,76,'图片','pictures','varchar','支持多图，每张图片上传不能超过300KB','upload','','safe','',20,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"1\";s:11:\"upload_auto\";s:1:\"1\";}',0),(283,76,'内容','content','longtext','','editor','','html','',30,'a:11:{s:5:\"width\";s:3:\"950\";s:6:\"height\";s:3:\"360\";s:7:\"is_code\";s:0:\"\";s:9:\"btn_image\";s:1:\"1\";s:9:\"btn_video\";s:1:\"1\";s:8:\"btn_file\";s:1:\"1\";s:8:\"btn_page\";s:0:\"\";s:8:\"btn_info\";s:0:\"\";s:7:\"is_read\";s:0:\"\";s:5:\"etype\";s:4:\"full\";s:7:\"btn_map\";s:0:\"\";}',0),(284,77,'内容','content','longtext','','editor','','html','',10,'a:11:{s:5:\"width\";s:3:\"950\";s:6:\"height\";s:3:\"360\";s:7:\"is_code\";s:0:\"\";s:9:\"btn_image\";s:1:\"1\";s:9:\"btn_video\";s:1:\"1\";s:8:\"btn_file\";s:1:\"1\";s:8:\"btn_page\";s:0:\"\";s:8:\"btn_info\";s:0:\"\";s:7:\"is_read\";s:0:\"\";s:5:\"etype\";s:4:\"full\";s:7:\"btn_map\";s:0:\"\";}',0),(286,78,'缩略图','thumb','varchar','支持多个产品图片，建议不超过5个','upload','','safe','',10,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"1\";s:11:\"upload_auto\";s:1:\"1\";}',0),(287,79,'自定义链接','linkurl','varchar','请填写链接地址，外链请输入http://或https://','text','','safe','',10,'a:4:{s:8:\"form_btn\";s:3:\"url\";s:5:\"width\";s:3:\"500\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}',0),(288,79,'链接方式','target','varchar','设置是否在新窗口打开','radio','','safe','_blank',20,'a:3:{s:11:\"option_list\";s:5:\"opt:6\";s:9:\"put_order\";s:1:\"0\";s:10:\"ext_select\";s:0:\"\";}',0),(289,78,'内容','content','longtext','','editor','','html','',20,'a:13:{s:5:\"width\";s:3:\"950\";s:6:\"height\";s:3:\"360\";s:7:\"is_code\";s:0:\"\";s:9:\"btn_image\";s:1:\"1\";s:9:\"btn_video\";s:1:\"1\";s:8:\"btn_file\";s:1:\"1\";s:8:\"btn_page\";s:0:\"\";s:8:\"btn_info\";s:0:\"\";s:7:\"is_read\";s:0:\"\";s:5:\"etype\";s:4:\"full\";s:7:\"btn_map\";s:0:\"\";s:7:\"inc_tag\";s:0:\"\";s:10:\"paste_text\";s:0:\"\";}',0),(290,78,'产品属性','attrs','longtext','','param','','safe','',15,'a:3:{s:6:\"p_name\";s:27:\"型号\n大小\n外观\n重量\";s:6:\"p_type\";s:1:\"0\";s:7:\"p_width\";s:0:\"\";}',0),(291,78,'价格','price','varchar','请设置产品的价格','text','','safe','',30,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:0:\"\";s:15:\"ext_quick_words\";s:13:\"面议\n免费\";s:14:\"ext_quick_type\";s:0:\"\";}',0),(292,80,'姓名','fullname','varchar','','text','','safe','',10,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}',1),(293,80,'手机号','mobile','varchar','','text','','safe','',20,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}',1),(294,80,'咨询内容','note','longtext','请填写要咨询的内容','textarea','','safe','',30,'a:2:{s:5:\"width\";s:3:\"300\";s:6:\"height\";s:2:\"80\";}',1),(295,80,'产品网址','furl','varchar','','text','','safe','',40,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}',1),(296,81,'单个文件','dfile','varchar','请上传要下载的文件','upload','','int','',10,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}',0),(297,82,'姓名','fullname','varchar','','text','','safe','',10,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}',1),(298,82,'手机号','mobile','varchar','','text','','safe','',20,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}',1),(299,82,'邮箱','email','varchar','','text','','safe','',30,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}',1),(300,82,'内容','content','longtext','','textarea','','safe','',40,'a:2:{s:5:\"width\";s:3:\"500\";s:6:\"height\";s:3:\"200\";}',1),(302,82,'图片','pictures','varchar','支持多图','upload','','safe','',35,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"1\";s:11:\"upload_auto\";s:1:\"1\";}',1),(301,82,'管理员回复','adm_reply','longtext','','editor','','html','',50,'a:12:{s:5:\"width\";s:3:\"800\";s:6:\"height\";s:3:\"180\";s:7:\"is_code\";b:0;s:9:\"btn_image\";i:1;s:9:\"btn_video\";i:1;s:8:\"btn_file\";i:1;s:8:\"btn_page\";b:0;s:8:\"btn_info\";b:0;s:7:\"is_read\";b:0;s:5:\"etype\";s:6:\"simple\";s:7:\"btn_tpl\";b:0;s:7:\"btn_map\";b:0;}',0),(303,83,'工作地点','address','varchar','','text','','safe','深圳',10,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"500\";s:15:\"ext_quick_words\";s:22:\"深圳\r\n上海\r\n北京\";s:14:\"ext_quick_type\";s:4:\"none\";}',0),(304,83,'招聘人数','persons','varchar','请填写招聘人数','text','','safe','若干',20,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:14:\"若干\r\n不限\";s:14:\"ext_quick_type\";s:4:\"none\";}',0),(305,83,'工作年限','years','varchar','请填写对应聘人员的工作年限要求，不限制请填写不限，或无要求','text','','safe','不限',30,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"500\";s:15:\"ext_quick_words\";s:41:\"不限\r\n无要求\r\n1年以上\r\n3年以上\";s:14:\"ext_quick_type\";s:4:\"none\";}',0),(306,83,'学历要求','schools','varchar','请填写相应的学历要求','text','','safe','不限',40,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"500\";s:15:\"ext_quick_words\";s:62:\"不限\r\n初中\r\n中专\r\n高中\r\n大专\r\n本科\r\n硕士\r\n博士\";s:14:\"ext_quick_type\";s:4:\"none\";}',0),(307,83,'工作描述','content','longtext','','editor','','html','',50,'a:13:{s:5:\"width\";s:3:\"950\";s:6:\"height\";s:3:\"360\";s:7:\"is_code\";s:0:\"\";s:9:\"btn_image\";s:1:\"1\";s:9:\"btn_video\";s:1:\"1\";s:8:\"btn_file\";s:1:\"1\";s:8:\"btn_page\";s:0:\"\";s:8:\"btn_info\";s:0:\"\";s:7:\"is_read\";s:0:\"\";s:5:\"etype\";s:4:\"full\";s:7:\"btn_map\";s:0:\"\";s:7:\"inc_tag\";s:0:\"\";s:10:\"paste_text\";s:0:\"\";}',0),(308,83,'薪水范围','price','varchar','','text','','safe','面议',45,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"500\";s:15:\"ext_quick_words\";s:63:\"面议\r\n3500-5500元\r\n5600-7500元\r\n7500-1万元\r\n1万元以上\";s:14:\"ext_quick_type\";s:4:\"none\";}',0),(309,84,'姓名','fullname','varchar','','text','','safe','',10,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}',1),(310,84,'手机号','mobile','varchar','','text','','safe','',20,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}',1),(311,84,'简历','dfile','varchar','请上传简历','upload','','int','',40,'a:3:{s:7:\"cate_id\";s:1:\"1\";s:11:\"is_multiple\";s:1:\"0\";s:11:\"upload_auto\";s:1:\"1\";}',1),(312,84,'邮箱','email','varchar','请填写邮件','text','','safe','',30,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}',1),(313,85,'QQ号','qq','varchar','请填写QQ号','text','','safe','',10,'a:4:{s:8:\"form_btn\";s:0:\"\";s:5:\"width\";s:3:\"300\";s:15:\"ext_quick_words\";s:0:\"\";s:14:\"ext_quick_type\";s:0:\"\";}',0);

/*Table structure for table `qinggan_opt` */

DROP TABLE IF EXISTS `qinggan_opt`;

CREATE TABLE `qinggan_opt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '组ID',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
  `title` varchar(255) NOT NULL COMMENT '名称',
  `val` varchar(255) NOT NULL COMMENT '值',
  `taxis` int(10) unsigned NOT NULL DEFAULT '255' COMMENT '排序，值越小越往前靠',
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COMMENT='表单列表选项';

/*Data for the table `qinggan_opt` */

insert  into `qinggan_opt`(`id`,`group_id`,`parent_id`,`title`,`val`,`taxis`) values (1,1,0,'女','',20),(2,1,0,'男','1',10),(17,4,0,'是','1',10),(18,4,0,'否','',20),(21,6,0,'当前窗口','_self',10),(22,6,0,'新窗口','_blank',20);

/*Table structure for table `qinggan_opt_group` */

DROP TABLE IF EXISTS `qinggan_opt_group`;

CREATE TABLE `qinggan_opt_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID ',
  `title` varchar(100) NOT NULL COMMENT '名称，用于后台管理',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='可选菜单管理器';

/*Data for the table `qinggan_opt_group` */

insert  into `qinggan_opt_group`(`id`,`title`) values (1,'性别'),(4,'是与否'),(6,'窗口打开方式');

/*Table structure for table `qinggan_phpok` */

DROP TABLE IF EXISTS `qinggan_phpok`;

CREATE TABLE `qinggan_phpok` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '项目ID',
  `type_id` varchar(255) NOT NULL COMMENT '调用类型',
  `identifier` varchar(100) NOT NULL COMMENT '标识串，同一个站点中只能唯一',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '站点ID',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `cateid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `ext` text NOT NULL COMMENT '扩展属性',
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifier` (`identifier`,`site_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='数据调用中心';

/*Data for the table `qinggan_phpok` */

insert  into `qinggan_phpok`(`id`,`title`,`pid`,`type_id`,`identifier`,`site_id`,`status`,`cateid`,`ext`) values (1,'导航菜单',165,'arclist','menu',1,1,0,'a:13:{s:5:\"psize\";s:3:\"999\";s:6:\"offset\";i:0;s:7:\"is_list\";s:1:\"1\";s:4:\"attr\";s:0:\"\";s:11:\"fields_need\";s:0:\"\";s:3:\"tag\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:7:\"orderby\";s:0:\"\";s:4:\"cate\";s:0:\"\";s:13:\"fields_format\";i:0;s:4:\"user\";s:0:\"\";s:6:\"in_sub\";s:1:\"1\";s:8:\"title_id\";s:0:\"\";}'),(2,'图片播放器',166,'arclist','picplayer',1,1,0,'a:13:{s:5:\"psize\";s:1:\"5\";s:6:\"offset\";i:0;s:7:\"is_list\";s:1:\"1\";s:4:\"attr\";s:0:\"\";s:11:\"fields_need\";s:10:\"ext.banner\";s:3:\"tag\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:7:\"orderby\";s:0:\"\";s:4:\"cate\";s:0:\"\";s:13:\"fields_format\";i:0;s:4:\"user\";s:0:\"\";s:6:\"in_sub\";i:0;s:8:\"title_id\";s:0:\"\";}'),(3,'新闻资讯',167,'arclist','news',1,1,1,'a:13:{s:5:\"psize\";s:2:\"11\";s:6:\"offset\";i:0;s:7:\"is_list\";s:1:\"1\";s:4:\"attr\";s:0:\"\";s:11:\"fields_need\";s:0:\"\";s:3:\"tag\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:7:\"orderby\";s:0:\"\";s:4:\"cate\";s:0:\"\";s:13:\"fields_format\";i:0;s:4:\"user\";s:0:\"\";s:6:\"in_sub\";i:0;s:8:\"title_id\";s:0:\"\";}'),(9,'联系我们',173,'project','contact',1,1,0,'a:13:{s:5:\"psize\";i:0;s:6:\"offset\";i:0;s:7:\"is_list\";s:1:\"1\";s:4:\"attr\";s:0:\"\";s:11:\"fields_need\";s:0:\"\";s:3:\"tag\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:7:\"orderby\";s:0:\"\";s:4:\"cate\";s:0:\"\";s:13:\"fields_format\";i:0;s:4:\"user\";s:0:\"\";s:6:\"in_sub\";i:0;s:8:\"title_id\";s:0:\"\";}'),(5,'公司相册',169,'arclist','photo',1,1,4,'a:13:{s:5:\"psize\";s:1:\"6\";s:6:\"offset\";i:0;s:7:\"is_list\";s:1:\"1\";s:4:\"attr\";s:0:\"\";s:11:\"fields_need\";s:9:\"ext.thumb\";s:3:\"tag\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:7:\"orderby\";s:0:\"\";s:4:\"cate\";s:0:\"\";s:13:\"fields_format\";i:0;s:4:\"user\";s:0:\"\";s:6:\"in_sub\";i:0;s:8:\"title_id\";s:0:\"\";}'),(6,'关于我们',168,'arc','about',1,1,0,'a:13:{s:5:\"psize\";i:0;s:6:\"offset\";i:0;s:7:\"is_list\";s:1:\"1\";s:4:\"attr\";s:0:\"\";s:11:\"fields_need\";s:0:\"\";s:3:\"tag\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:7:\"orderby\";s:0:\"\";s:4:\"cate\";s:0:\"\";s:13:\"fields_format\";i:0;s:4:\"user\";s:0:\"\";s:6:\"in_sub\";i:0;s:8:\"title_id\";s:4:\"1456\";}'),(7,'友情链接',172,'arclist','link',1,1,0,'a:13:{s:5:\"psize\";s:2:\"50\";s:6:\"offset\";i:0;s:7:\"is_list\";s:1:\"1\";s:4:\"attr\";s:0:\"\";s:11:\"fields_need\";s:0:\"\";s:3:\"tag\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:7:\"orderby\";s:0:\"\";s:4:\"cate\";s:0:\"\";s:13:\"fields_format\";i:0;s:4:\"user\";s:0:\"\";s:6:\"in_sub\";i:0;s:8:\"title_id\";s:0:\"\";}'),(8,'产品展示',171,'arclist','product',1,1,7,'a:13:{s:5:\"psize\";s:2:\"10\";s:6:\"offset\";i:0;s:7:\"is_list\";s:1:\"1\";s:4:\"attr\";s:0:\"\";s:11:\"fields_need\";s:9:\"ext.thumb\";s:3:\"tag\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:7:\"orderby\";s:0:\"\";s:4:\"cate\";s:0:\"\";s:13:\"fields_format\";i:0;s:4:\"user\";s:0:\"\";s:6:\"in_sub\";i:0;s:8:\"title_id\";s:0:\"\";}'),(10,'产品咨询服务',174,'fields','zxform',1,1,0,'a:13:{s:5:\"psize\";i:0;s:6:\"offset\";i:0;s:7:\"is_list\";s:1:\"1\";s:4:\"attr\";s:0:\"\";s:11:\"fields_need\";s:0:\"\";s:3:\"tag\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:7:\"orderby\";s:0:\"\";s:4:\"cate\";s:0:\"\";s:13:\"fields_format\";s:1:\"1\";s:4:\"user\";s:0:\"\";s:6:\"in_sub\";i:0;s:8:\"title_id\";s:0:\"\";}'),(11,'在线应聘',179,'fields','applied-online',1,1,0,'a:13:{s:5:\"psize\";i:0;s:6:\"offset\";i:0;s:7:\"is_list\";s:1:\"1\";s:4:\"attr\";s:0:\"\";s:11:\"fields_need\";s:0:\"\";s:3:\"tag\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:7:\"orderby\";s:0:\"\";s:4:\"cate\";s:0:\"\";s:13:\"fields_format\";s:1:\"1\";s:4:\"user\";s:0:\"\";s:6:\"in_sub\";i:0;s:8:\"title_id\";s:0:\"\";}'),(12,'在线客服',180,'arclist','online-service',1,1,0,'a:13:{s:5:\"psize\";s:2:\"10\";s:6:\"offset\";i:0;s:7:\"is_list\";s:1:\"1\";s:4:\"attr\";s:0:\"\";s:11:\"fields_need\";s:0:\"\";s:3:\"tag\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:7:\"orderby\";s:0:\"\";s:4:\"cate\";s:0:\"\";s:13:\"fields_format\";i:0;s:4:\"user\";s:0:\"\";s:6:\"in_sub\";i:0;s:8:\"title_id\";s:0:\"\";}');

/*Table structure for table `qinggan_plugins` */

DROP TABLE IF EXISTS `qinggan_plugins`;

CREATE TABLE `qinggan_plugins` (
  `id` varchar(100) NOT NULL COMMENT '插件ID，仅限字母，数字及下划线',
  `title` varchar(255) NOT NULL COMMENT '插件名称',
  `author` varchar(255) NOT NULL COMMENT '开发者',
  `version` varchar(50) NOT NULL COMMENT '插件版本号',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0禁用1使用',
  `taxis` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '值越小越往前靠',
  `note` varchar(255) NOT NULL COMMENT '摘要说明',
  `param` text NOT NULL COMMENT '参数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件管理器';

/*Data for the table `qinggan_plugins` */

insert  into `qinggan_plugins`(`id`,`title`,`author`,`version`,`status`,`taxis`,`note`,`param`) values ('identifier','标识串自动生成工具','phpok.com','1.0',1,20,'实现将“title”字段的表单数据翻译符合系统要求的标识串','a:3:{s:9:\"is_youdao\";s:0:\"\";s:10:\"is_pingyin\";s:1:\"1\";s:5:\"is_py\";s:1:\"1\";}'),('collection','采集器','phpok.com','1.0',1,30,'实现网站基本信息采集，适用于网站迁移','a:5:{s:7:\"root_id\";s:1:\"5\";s:10:\"sysmenu_id\";i:75;s:7:\"rescate\";s:1:\"1\";s:7:\"keyfrom\";s:0:\"\";s:5:\"keyid\";s:0:\"\";}');

/*Table structure for table `qinggan_project` */

DROP TABLE IF EXISTS `qinggan_project`;

CREATE TABLE `qinggan_project` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID，也是应用ID',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '上一级ID',
  `site_id` mediumint(8) unsigned NOT NULL COMMENT '网站ID',
  `module` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '指定模型ID，为0表页面空白',
  `cate` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '绑定根分类ID',
  `title` varchar(255) NOT NULL COMMENT '名称',
  `nick_title` varchar(255) NOT NULL COMMENT '后台别称',
  `taxis` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序，值越小越往前靠',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0不使用1使用',
  `tpl_index` varchar(255) NOT NULL COMMENT '封面页',
  `tpl_list` varchar(255) NOT NULL COMMENT '列表页',
  `tpl_content` varchar(255) NOT NULL COMMENT '详细页',
  `is_identifier` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否自定义标识',
  `ico` varchar(255) NOT NULL COMMENT '图标',
  `orderby` text NOT NULL COMMENT '排序',
  `alias_title` varchar(255) NOT NULL COMMENT '主题别名',
  `alias_note` varchar(255) NOT NULL COMMENT '主题备注',
  `psize` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '0表示不限制，每页显示数量',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID号，为0表示管理员维护',
  `identifier` varchar(255) NOT NULL COMMENT '标识',
  `seo_title` varchar(255) NOT NULL COMMENT 'SEO标题',
  `seo_keywords` varchar(255) NOT NULL COMMENT 'SEO关键字',
  `seo_desc` varchar(255) NOT NULL COMMENT 'SEO描述',
  `subtopics` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否启用子主题功能',
  `is_search` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否支持搜索',
  `is_tag` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '必填Tag',
  `is_biz` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0不启用电商，1启用电商',
  `is_userid` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否绑定会员',
  `is_tpl_content` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否自定义内容模板',
  `is_seo` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否默认使用seo',
  `currency_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '默认货币ID',
  `admin_note` text NOT NULL COMMENT '管理员备注，给编辑人员使用的',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0显示1隐藏',
  `post_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '发布模式，0不启用1启用',
  `comment_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '启用评论功能',
  `post_tpl` varchar(255) NOT NULL COMMENT '发布页模板',
  `etpl_admin` varchar(255) NOT NULL COMMENT '通知管理员邮件模板',
  `etpl_user` varchar(255) NOT NULL COMMENT '发布邮件通知会员模板',
  `etpl_comment_admin` varchar(255) NOT NULL COMMENT '评论邮件通知管理员模板',
  `etpl_comment_user` varchar(255) NOT NULL COMMENT '评论邮件通知会员',
  `is_attr` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1启用主题属性0不启用',
  `tag` varchar(255) NOT NULL COMMENT '自身Tag设置',
  `is_appoint` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '指定维护',
  `cate_multiple` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0分类单选1分类支持多选',
  `biz_attr` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '产品属性，0不使用1使用',
  `freight` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '运费模板ID',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `site_id` (`site_id`,`status`)
) ENGINE=MyISAM AUTO_INCREMENT=182 DEFAULT CHARSET=utf8 COMMENT='项目管理器';

/*Data for the table `qinggan_project` */

insert  into `qinggan_project`(`id`,`parent_id`,`site_id`,`module`,`cate`,`title`,`nick_title`,`taxis`,`status`,`tpl_index`,`tpl_list`,`tpl_content`,`is_identifier`,`ico`,`orderby`,`alias_title`,`alias_note`,`psize`,`uid`,`identifier`,`seo_title`,`seo_keywords`,`seo_desc`,`subtopics`,`is_search`,`is_tag`,`is_biz`,`is_userid`,`is_tpl_content`,`is_seo`,`currency_id`,`admin_note`,`hidden`,`post_status`,`comment_status`,`post_tpl`,`etpl_admin`,`etpl_user`,`etpl_comment_admin`,`etpl_comment_user`,`is_attr`,`tag`,`is_appoint`,`cate_multiple`,`biz_attr`,`freight`) values (165,0,1,73,0,'导航菜单','',10,1,'','','',0,'images/ico/menu.png','l.sort ASC,l.dateline DESC,l.id DESC','导航名称','',30,0,'menu','','','',1,0,0,0,0,0,0,0,'',0,0,0,'','','','','',0,'',0,0,0,0),(166,0,1,74,0,'图片播放器','',20,1,'','','',0,'images/ico/picplayer.png','l.sort ASC,l.dateline DESC,l.id DESC','','',30,0,'picplayer','','','',0,0,0,0,0,0,0,0,'',0,0,0,'','','','','',0,'',0,0,0,0),(167,0,1,75,1,'新闻资讯','',30,1,'','','',0,'images/ico/article.png','l.sort ASC,l.dateline DESC,l.id DESC','','',8,0,'article','','','',0,1,0,0,0,0,0,0,'',0,0,0,'','','','','',0,'',0,0,0,0),(168,0,1,77,0,'关于我们','',40,1,'','','',1,'images/ico/company.png','l.sort ASC,l.dateline DESC,l.id DESC','','',30,0,'about','','','',0,0,0,0,0,0,0,0,'',0,0,0,'','','','','',0,'',0,0,0,0),(169,0,1,76,4,'公司相册','',50,1,'','','',0,'images/ico/photo.png','l.sort ASC,l.dateline DESC,l.id DESC','','',12,0,'photo','','','',0,0,0,0,0,0,0,0,'',0,0,0,'','','','','',0,'',0,0,0,0),(170,0,1,81,0,'资料下载','',60,1,'','','',0,'images/ico/download3.png','l.sort ASC,l.dateline DESC,l.id DESC','','',30,0,'files','','','',0,0,0,0,0,0,0,0,'',0,0,0,'','','','','',0,'',0,0,0,0),(171,0,1,78,7,'产品展示','',70,1,'','','',0,'images/ico/product.png','l.sort ASC,l.dateline DESC,l.id DESC','','',12,0,'product','','','',0,1,0,0,0,0,0,0,'',0,0,0,'','','','','',0,'',0,0,0,0),(172,0,1,79,0,'友情链接','',80,1,'','','',0,'images/ico/link.png','l.sort ASC,l.dateline DESC,l.id DESC','网站名称','',30,0,'link','','','',0,0,0,0,0,0,0,0,'',0,0,0,'','','','','',0,'',0,0,0,0),(173,0,1,0,0,'联系我们','',90,1,'','','',0,'images/ico/email2.png','l.sort ASC,l.dateline DESC,l.id DESC','','',30,0,'contact','','','',0,0,0,0,0,0,0,0,'',0,0,0,'','','','','',0,'',0,0,0,0),(174,0,1,80,0,'产品咨询服务','',100,1,'','','',0,'images/ico/activities.png','l.sort ASC,l.dateline DESC,l.id DESC','产品名称','',30,0,'zxservice','','','',0,0,0,0,0,0,0,0,'',0,1,0,'','','','','',0,'',0,0,0,0),(175,0,1,82,0,'在线留言','',110,1,'','','',0,'images/ico/paper.png','l.sort ASC,l.dateline DESC,l.id DESC','留言主题','',15,0,'message','','','',0,0,0,0,0,0,0,0,'',0,1,0,'','','','','',0,'',0,0,0,0),(176,0,1,83,0,'人才招聘','',120,1,'','','',0,'images/ico/user.png','l.sort ASC,l.dateline DESC,l.id DESC','职位','',30,0,'job','','','',0,0,0,0,0,0,0,0,'',0,0,0,'','','','','',0,'',0,0,0,0),(177,176,1,0,0,'人才理念','',10,1,'job_page','','',0,'images/ico/manage.png','l.sort ASC,l.dateline DESC,l.id DESC','','',30,0,'talent','','','',0,0,0,0,0,0,0,0,'',0,0,0,'','','','','',0,'',0,0,0,0),(178,176,1,0,0,'培训发展','',20,1,'job_page','','',0,'images/ico/manage.png','l.sort ASC,l.dateline DESC,l.id DESC','','',30,0,'training','','','',0,0,0,0,0,0,0,0,'',0,0,0,'','','','','',0,'',0,0,0,0),(179,0,1,84,0,'在线应聘','',130,1,'','','',0,'images/ico/activities.png','l.sort ASC,l.dateline DESC,l.id DESC','应聘岗位','',30,0,'apply','','','',0,0,0,0,0,0,0,0,'',0,1,0,'','','','','',0,'',0,0,0,0),(180,0,1,85,0,'在线客服','',140,1,'','','',0,'images/ico/qq.png','l.sort ASC,l.dateline DESC,l.id DESC','客服昵称','',30,0,'online-service','','','',0,0,0,0,0,0,0,0,'',0,0,0,'','','','','',0,'',0,0,0,0);

/*Table structure for table `qinggan_res` */

DROP TABLE IF EXISTS `qinggan_res`;

CREATE TABLE `qinggan_res` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '资源ID',
  `cate_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `folder` varchar(255) NOT NULL COMMENT '存储目录',
  `name` varchar(255) NOT NULL COMMENT '资源文件名',
  `ext` varchar(30) NOT NULL COMMENT '资源后缀，如jpg等',
  `filename` varchar(255) NOT NULL COMMENT '文件名带路径',
  `ico` varchar(255) NOT NULL COMMENT 'ICO图标文件',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `title` varchar(255) NOT NULL COMMENT '内容',
  `attr` text NOT NULL COMMENT '附件属性',
  `note` text NOT NULL COMMENT '备注',
  `session_id` varchar(100) NOT NULL COMMENT '操作者 ID，即会员ID用于检测是否有权限删除 ',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员ID，当该ID为时检则sesson_id，如不相同则不能删除 ',
  `download` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '管理员ID',
  PRIMARY KEY (`id`),
  KEY `ext` (`ext`)
) ENGINE=MyISAM AUTO_INCREMENT=1151 DEFAULT CHARSET=utf8 COMMENT='资源ID';

/*Data for the table `qinggan_res` */

insert  into `qinggan_res`(`id`,`cate_id`,`folder`,`name`,`ext`,`filename`,`ico`,`addtime`,`title`,`attr`,`note`,`session_id`,`user_id`,`download`,`admin_id`) values (964,1,'res/201509/05/','128631859541c31c.png','png','res/201509/05/128631859541c31c.png','res/201509/05/_964.png',1441446392,'phpok4simple','a:2:{s:5:\"width\";i:213;s:6:\"height\";i:60;}','','',0,0,1),(965,1,'res/201509/05/','664c88fb68dfba8a.jpg','jpg','res/201509/05/664c88fb68dfba8a.jpg','res/201509/05/_965.jpg',1441463193,'001','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:300;}','','',0,0,1),(966,1,'res/201509/05/','8a9cbeff1c2e38db.jpg','jpg','res/201509/05/8a9cbeff1c2e38db.jpg','res/201509/05/_966.jpg',1441463201,'002','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:300;}','','',0,0,1),(967,1,'res/201509/05/','aa86c1b6b3686292.jpg','jpg','res/201509/05/aa86c1b6b3686292.jpg','res/201509/05/_967.jpg',1441463220,'003','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:300;}','','',0,0,1),(1135,1,'res/201512/17/','93db3b8d84820e6c.jpg','jpg','res/201512/17/93db3b8d84820e6c.jpg','res/201512/17/_1135.jpg',1450341048,'新闻','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:180;}','','',0,0,1),(1042,1,'res/201509/06/','01ef8ecd64ec452b.jpg','jpg','res/201509/06/01ef8ecd64ec452b.jpg','res/201509/06/_1042.jpg',1441508820,'PHPOK4，经典在继续','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:180;}','','',0,0,1),(1043,1,'res/201509/06/','3202d207ef467cda.jpg','jpg','res/201509/06/3202d207ef467cda.jpg','res/201509/06/_1043.jpg',1441508820,'PHPOK4，经典企业建站系统','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:180;}','','',0,0,1),(1117,1,'res/201510/27/','095175723d9b74cf.jpg','jpg','res/201510/27/095175723d9b74cf.jpg','res/201510/27/_1117.jpg',1445930390,'100x100','a:2:{s:5:\"width\";i:100;s:6:\"height\";i:100;}','','',0,0,1),(1120,1,'res/201512/14/','68a520e799122aba.jpg','jpg','res/201512/14/68a520e799122aba.jpg','res/201512/14/_1120.jpg',1450063499,'002','a:2:{s:5:\"width\";i:500;s:6:\"height\";i:500;}','','',0,0,1),(1119,1,'res/201512/14/','18826ad78276a076.jpg','jpg','res/201512/14/18826ad78276a076.jpg','res/201512/14/_1119.jpg',1450060530,'001','a:2:{s:5:\"width\";i:500;s:6:\"height\";i:500;}','','',0,0,1),(1121,1,'res/201512/14/','8bcd24d491784ad4.jpg','jpg','res/201512/14/8bcd24d491784ad4.jpg','res/201512/14/_1121.jpg',1450066100,'001','a:2:{s:5:\"width\";i:750;s:6:\"height\";i:750;}','','',0,0,1),(1122,1,'res/201512/14/','8422d8f0debab240.jpg','jpg','res/201512/14/8422d8f0debab240.jpg','res/201512/14/_1122.jpg',1450066101,'002','a:2:{s:5:\"width\";i:750;s:6:\"height\";i:750;}','','',0,0,1),(1123,1,'res/201512/14/','6770cbd0a8a8393f.jpg','jpg','res/201512/14/6770cbd0a8a8393f.jpg','res/201512/14/_1123.jpg',1450066557,'001','a:2:{s:5:\"width\";i:600;s:6:\"height\";i:600;}','','',0,0,1),(1124,1,'res/201512/14/','8059eb07544f97de.jpg','jpg','res/201512/14/8059eb07544f97de.jpg','res/201512/14/_1124.jpg',1450066558,'002','a:2:{s:5:\"width\";i:500;s:6:\"height\";i:500;}','','',0,0,1),(1125,1,'res/201512/14/','1d5a32c753050d2e.jpg','jpg','res/201512/14/1d5a32c753050d2e.jpg','res/201512/14/_1125.jpg',1450067141,'001','a:2:{s:5:\"width\";i:600;s:6:\"height\";i:600;}','','',0,1,1),(1126,1,'res/201512/14/','6a8bc10eefcb3618.jpg','jpg','res/201512/14/6a8bc10eefcb3618.jpg','res/201512/14/_1126.jpg',1450067142,'002','a:2:{s:5:\"width\";i:500;s:6:\"height\";i:500;}','','',0,5,1),(1133,1,'res/201512/15/','e8c4e65ddb1e3084.jpg','jpg','res/201512/15/e8c4e65ddb1e3084.jpg','res/201512/15/_1133.jpg',1450173247,'产品展示','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:180;}','','p5h3d865lr5kn35v0f0plkm9u3',0,0,0),(1132,1,'res/201512/15/','3eaa1b66078b877b.jpg','jpg','res/201512/15/3eaa1b66078b877b.jpg','res/201512/15/_1132.jpg',1450171796,'人才招聘','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:180;}','','',0,0,1),(1134,1,'res/201512/17/','753077bdbfb8419f.jpg','jpg','res/201512/17/753077bdbfb8419f.jpg','res/201512/17/_1134.jpg',1450340951,'关于我们','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:180;}','','',0,0,1),(1136,1,'res/201512/17/','82c1df0cc9195c0a.jpg','jpg','res/201512/17/82c1df0cc9195c0a.jpg','res/201512/17/_1136.jpg',1450341088,'产品展示','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:180;}','','',0,0,1),(1137,1,'res/201512/17/','ebe95b50f8a5a5d3.jpg','jpg','res/201512/17/ebe95b50f8a5a5d3.jpg','res/201512/17/_1137.jpg',1450341114,'资料下载','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:180;}','','',0,0,1),(1138,1,'res/201512/17/','3fb43517555c4eab.jpg','jpg','res/201512/17/3fb43517555c4eab.jpg','res/201512/17/_1138.jpg',1450341164,'公司相册','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:180;}','','',0,0,1),(1139,1,'res/201512/17/','6a0d30bd5fac255d.jpg','jpg','res/201512/17/6a0d30bd5fac255d.jpg','res/201512/17/_1139.jpg',1450341195,'在线留言','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:180;}','','',0,0,1),(1140,1,'res/201512/17/','59e72786a79babd0.jpg','jpg','res/201512/17/59e72786a79babd0.jpg','res/201512/17/_1140.jpg',1450341225,'联系我们','a:2:{s:5:\"width\";i:980;s:6:\"height\";i:180;}','','',0,0,1),(1147,1,'res/201512/31/','9e520aae7eba822f.jpg','jpg','res/201512/31/9e520aae7eba822f.jpg','res/201512/31/_1147.jpg',1451536445,'100x100','a:2:{s:5:\"width\";i:100;s:6:\"height\";i:100;}','','9oft5nkk6bg7e8rodmhe4i9101',0,0,0),(1148,1,'res/201606/16/','1466046565_0_280.png','png','res/201606/16/1466046565_0_280.png','res/201606/16/_1148.png',1466046606,'1466046565_0_280.png','a:2:{s:5:\"width\";i:150;s:6:\"height\";i:150;}','','',0,0,1),(1149,1,'res/201606/16/','1466046565_0_873.jpg','jpg','res/201606/16/1466046565_0_873.jpg','res/201606/16/_1149.jpg',1466046606,'1466046565_0_873.jpg','a:2:{s:5:\"width\";i:525;s:6:\"height\";i:308;}','','',0,0,1),(1150,1,'res/201703/29/','4c65ebd7e99af786.png','png','res/201703/29/4c65ebd7e99af786.png','res/201703/29/_1150.png',1490799736,'logo','a:2:{s:5:\"width\";i:194;s:6:\"height\";i:46;}','','',0,0,1);

/*Table structure for table `qinggan_res_cate` */

DROP TABLE IF EXISTS `qinggan_res_cate`;

CREATE TABLE `qinggan_res_cate` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '资源分类ID',
  `title` varchar(255) NOT NULL COMMENT '分类名称',
  `root` varchar(255) NOT NULL DEFAULT '/' COMMENT '存储目录',
  `folder` varchar(255) NOT NULL DEFAULT 'Ym/d/' COMMENT '存储目录格式',
  `is_default` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1默认0非默认',
  `filetypes` varchar(255) NOT NULL COMMENT '附件类型',
  `typeinfo` varchar(200) NOT NULL COMMENT '类型说明',
  `gdtypes` varchar(255) NOT NULL COMMENT '支持的GD方案，多个GD方案用英文ID分开',
  `gdall` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1支持全部GD方案0仅支持指定的GD方案',
  `ico` tinyint(1) NOT NULL DEFAULT '0' COMMENT '后台缩略图',
  `filemax` int(10) unsigned NOT NULL DEFAULT '2' COMMENT '上传文件大小限制',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='资源分类存储';

/*Data for the table `qinggan_res_cate` */

insert  into `qinggan_res_cate`(`id`,`title`,`root`,`folder`,`is_default`,`filetypes`,`typeinfo`,`gdtypes`,`gdall`,`ico`,`filemax`) values (1,'默认分类','res/','Ym/d/',1,'png,jpg,gif,rar,zip','文件','',1,1,20480);

/*Table structure for table `qinggan_res_ext` */

DROP TABLE IF EXISTS `qinggan_res_ext`;

CREATE TABLE `qinggan_res_ext` (
  `res_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '附件ID',
  `gd_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT 'GD库方案ID',
  `filename` varchar(255) NOT NULL COMMENT '文件地址（含路径）',
  `filetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后',
  PRIMARY KEY (`res_id`,`gd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='生成扩展图片';

/*Data for the table `qinggan_res_ext` */

insert  into `qinggan_res_ext`(`res_id`,`gd_id`,`filename`,`filetime`) values (964,30,'res/201509/05/mobile_964.png',1451191865),(965,30,'res/201509/05/mobile_965.jpg',1451191864),(966,30,'res/201509/05/mobile_966.jpg',1451191862),(967,30,'res/201509/05/mobile_967.jpg',1451191861),(1135,30,'res/201512/17/mobile_1135.jpg',1451191841),(1042,30,'res/201509/06/mobile_1042.jpg',1451191860),(1043,30,'res/201509/06/mobile_1043.jpg',1451191858),(1117,30,'res/201510/27/mobile_1117.jpg',1451191857),(1120,30,'res/201512/14/mobile_1120.jpg',1451191855),(1119,30,'res/201512/14/mobile_1119.jpg',1451191856),(1121,30,'res/201512/14/mobile_1121.jpg',1451191853),(1122,30,'res/201512/14/mobile_1122.jpg',1451191852),(1123,30,'res/201512/14/mobile_1123.jpg',1451191850),(1124,30,'res/201512/14/mobile_1124.jpg',1451191849),(1125,30,'res/201512/14/mobile_1125.jpg',1451191848),(1126,30,'res/201512/14/mobile_1126.jpg',1451191846),(1133,30,'res/201512/15/mobile_1133.jpg',1451191844),(1132,30,'res/201512/15/mobile_1132.jpg',1451191845),(1134,30,'res/201512/17/mobile_1134.jpg',1451191843),(1136,30,'res/201512/17/mobile_1136.jpg',1451191840),(1137,30,'res/201512/17/mobile_1137.jpg',1451191839),(1138,30,'res/201512/17/mobile_1138.jpg',1451191838),(1139,30,'res/201512/17/mobile_1139.jpg',1451191837),(1140,30,'res/201512/17/mobile_1140.jpg',1451191835),(1140,12,'res/201512/17/auto_1140.jpg',1451191835),(1140,2,'res/201512/17/thumb_1140.jpg',1451191835),(1139,12,'res/201512/17/auto_1139.jpg',1451191837),(1139,2,'res/201512/17/thumb_1139.jpg',1451191837),(1138,12,'res/201512/17/auto_1138.jpg',1451191838),(1138,2,'res/201512/17/thumb_1138.jpg',1451191838),(1137,12,'res/201512/17/auto_1137.jpg',1451191839),(1137,2,'res/201512/17/thumb_1137.jpg',1451191839),(1136,12,'res/201512/17/auto_1136.jpg',1451191840),(1136,2,'res/201512/17/thumb_1136.jpg',1451191840),(1135,12,'res/201512/17/auto_1135.jpg',1451191841),(1135,2,'res/201512/17/thumb_1135.jpg',1451191841),(1134,12,'res/201512/17/auto_1134.jpg',1451191843),(1134,2,'res/201512/17/thumb_1134.jpg',1451191843),(1133,12,'res/201512/15/auto_1133.jpg',1451191844),(1133,2,'res/201512/15/thumb_1133.jpg',1451191844),(1132,12,'res/201512/15/auto_1132.jpg',1451191845),(1132,2,'res/201512/15/thumb_1132.jpg',1451191845),(1126,12,'res/201512/14/auto_1126.jpg',1451191846),(1126,2,'res/201512/14/thumb_1126.jpg',1451191846),(1125,12,'res/201512/14/auto_1125.jpg',1451191848),(1125,2,'res/201512/14/thumb_1125.jpg',1451191848),(1124,12,'res/201512/14/auto_1124.jpg',1451191849),(1124,2,'res/201512/14/thumb_1124.jpg',1451191849),(1123,12,'res/201512/14/auto_1123.jpg',1451191850),(1123,2,'res/201512/14/thumb_1123.jpg',1451191850),(1122,12,'res/201512/14/auto_1122.jpg',1451191852),(1122,2,'res/201512/14/thumb_1122.jpg',1451191852),(1121,12,'res/201512/14/auto_1121.jpg',1451191853),(1121,2,'res/201512/14/thumb_1121.jpg',1451191853),(1120,12,'res/201512/14/auto_1120.jpg',1451191855),(1120,2,'res/201512/14/thumb_1120.jpg',1451191855),(1119,12,'res/201512/14/auto_1119.jpg',1451191856),(1119,2,'res/201512/14/thumb_1119.jpg',1451191856),(1117,12,'res/201510/27/auto_1117.jpg',1451191857),(1117,2,'res/201510/27/thumb_1117.jpg',1451191857),(1043,12,'res/201509/06/auto_1043.jpg',1451191858),(1043,2,'res/201509/06/thumb_1043.jpg',1451191858),(1042,12,'res/201509/06/auto_1042.jpg',1451191860),(1042,2,'res/201509/06/thumb_1042.jpg',1451191860),(967,12,'res/201509/05/auto_967.jpg',1451191861),(967,2,'res/201509/05/thumb_967.jpg',1451191861),(966,12,'res/201509/05/auto_966.jpg',1451191862),(966,2,'res/201509/05/thumb_966.jpg',1451191862),(965,12,'res/201509/05/auto_965.jpg',1451191864),(965,2,'res/201509/05/thumb_965.jpg',1451191864),(964,12,'res/201509/05/auto_964.png',1451191865),(964,2,'res/201509/05/thumb_964.png',1451191865),(1147,30,'res/201512/31/mobile_1147.jpg',1451536445),(1147,12,'res/201512/31/auto_1147.jpg',1451536445),(1147,2,'res/201512/31/thumb_1147.jpg',1451536445),(1148,30,'res/201606/16/mobile_1148.png',1466046606),(1148,12,'res/201606/16/auto_1148.png',1466046606),(1148,2,'res/201606/16/thumb_1148.png',1466046606),(1149,30,'res/201606/16/mobile_1149.jpg',1466046606),(1149,12,'res/201606/16/auto_1149.jpg',1466046606),(1149,2,'res/201606/16/thumb_1149.jpg',1466046606),(1150,30,'res/201703/29/mobile_1150.png',1490799736),(1150,12,'res/201703/29/auto_1150.png',1490799736),(1150,2,'res/201703/29/thumb_1150.png',1490799736);

/*Table structure for table `qinggan_site` */

DROP TABLE IF EXISTS `qinggan_site`;

CREATE TABLE `qinggan_site` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '应用ID',
  `domain_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '默认域名ID',
  `title` varchar(255) NOT NULL COMMENT '网站名称',
  `dir` varchar(255) NOT NULL DEFAULT '/' COMMENT '安装目录，以/结尾',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `content` text NOT NULL COMMENT '网站关闭原因',
  `is_default` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1默认站点',
  `tpl_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '模板ID',
  `url_type` enum('default','rewrite','html') NOT NULL DEFAULT 'default' COMMENT '默认，即带?等能数，rewrite是伪静态页，html为生成的静态页',
  `logo` varchar(255) NOT NULL COMMENT '网站 LOGO ',
  `meta` text NOT NULL COMMENT '扩展配置',
  `adm_logo29` varchar(255) NOT NULL COMMENT '在后台左侧LOGO地址',
  `adm_logo180` varchar(255) NOT NULL COMMENT '登录LOGO地址',
  `lang` varchar(255) NOT NULL COMMENT '语言包',
  `api` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '0不走接口',
  `api_code` varchar(255) NOT NULL COMMENT 'API验证串',
  `email_charset` enum('gbk','utf-8') NOT NULL DEFAULT 'utf-8' COMMENT '邮箱模式',
  `email_server` varchar(100) NOT NULL COMMENT '邮件服务器',
  `email_port` varchar(10) NOT NULL COMMENT '端口',
  `email_ssl` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'SSL模式',
  `email_account` varchar(100) NOT NULL COMMENT '邮箱账号',
  `email_pass` varchar(100) NOT NULL COMMENT '邮箱密码',
  `email_name` varchar(100) NOT NULL COMMENT '发件人名称',
  `email` varchar(100) NOT NULL COMMENT '邮箱',
  `seo_title` varchar(255) NOT NULL COMMENT 'SEO主题',
  `seo_keywords` varchar(255) NOT NULL COMMENT 'SEO关键字',
  `seo_desc` text NOT NULL COMMENT 'SEO摘要',
  `upload_guest` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0禁止游客上传1允许游客上传',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='网站管理';

/*Data for the table `qinggan_site` */

insert  into `qinggan_site`(`id`,`domain_id`,`title`,`dir`,`status`,`content`,`is_default`,`tpl_id`,`url_type`,`logo`,`meta`,`adm_logo29`,`adm_logo180`,`lang`,`api`,`api_code`,`email_charset`,`email_server`,`email_port`,`email_ssl`,`email_account`,`email_pass`,`email_name`,`email`,`seo_title`,`seo_keywords`,`seo_desc`,`upload_guest`) values (1,1,'露尚雕塑','/phpok4simple/',1,'网站正在建设中！',1,1,'rewrite','res/201703/29/4c65ebd7e99af786.png','','','','',0,'UggmXVJHurIGe#9U','utf-8','smtp.qq.com','25',0,'admin@phpok.com','123','网站管理员','admin@phpok.com','网站建设|企业网站建设|PHPOK网站建设|PHPOK企业网站建设','网站建设,企业网站建设,PHPOK网站建设,PHPOK企业网站建设','高效的企业网站建设系统，可实现高定制化的企业网站电商系统，实现企业网站到电子商务企业网站。定制功能更高，操作更简单！',1);

/*Table structure for table `qinggan_site_domain` */

DROP TABLE IF EXISTS `qinggan_site_domain`;

CREATE TABLE `qinggan_site_domain` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `site_id` mediumint(8) unsigned NOT NULL COMMENT '网站ID',
  `domain` varchar(255) NOT NULL COMMENT '域名信息',
  `is_mobile` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1此域名强制为手机版',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='网站指定的域名';

/*Data for the table `qinggan_site_domain` */

insert  into `qinggan_site_domain`(`id`,`site_id`,`domain`,`is_mobile`) values (1,1,'localhost',0);

/*Table structure for table `qinggan_sysmenu` */

DROP TABLE IF EXISTS `qinggan_sysmenu`;

CREATE TABLE `qinggan_sysmenu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID号',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID，0为根菜单',
  `title` varchar(100) NOT NULL COMMENT '分类名称',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态0禁用1正常',
  `appfile` varchar(100) NOT NULL COMMENT '应用文件名，放在phpok/admin/目录下，记录不带.php',
  `taxis` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序，值越小越往前靠，可选0-255',
  `func` varchar(100) NOT NULL COMMENT '应用函数，为空使用index',
  `identifier` varchar(100) NOT NULL COMMENT '标识串，用于区分同一应用文件的不同内容',
  `ext` varchar(255) NOT NULL COMMENT '表单扩展',
  `if_system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0常规项目，1系统项目',
  `site_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '0表示全局网站',
  `icon` varchar(255) NOT NULL COMMENT '图标路径',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COMMENT='PHPOK后台系统菜单';

/*Data for the table `qinggan_sysmenu` */

insert  into `qinggan_sysmenu`(`id`,`parent_id`,`title`,`status`,`appfile`,`taxis`,`func`,`identifier`,`ext`,`if_system`,`site_id`,`icon`) values (1,0,'设置',1,'setting',30,'','','',1,0,''),(5,0,'内容',1,'index',10,'','','',0,0,''),(6,1,'表单选项',1,'opt',30,'','','',0,0,''),(7,4,'字段维护',1,'fields',20,'','','',0,0,''),(8,1,'模块管理',1,'module',20,'','','',0,0,'settings'),(9,1,'核心配置',1,'system',50,'','','',1,0,''),(16,4,'插件中心',1,'plugin',30,'','','',0,0,''),(18,5,'分类管理',1,'cate',30,'','','',0,0,'stack'),(19,5,'全局内容',1,'all',10,'','','',0,0,''),(20,5,'内容管理',1,'list',20,'','','',0,0,'office'),(22,5,'资源管理',1,'res',60,'','','',0,0,'download'),(23,5,'数据调用',1,'call',40,'','','',0,0,'rocket'),(27,1,'项目管理',1,'project',10,'','','',0,0,'finder'),(28,1,'邮件模板',1,'email',40,'','','',0,0,''),(30,1,'风格管理',1,'tpl',60,'','','',0,0,''),(4,0,'工具',1,'tool',50,'','','',0,0,''),(57,4,'数据库管理',1,'sql',100,'','','',0,1,'shield'),(58,5,'标签管理',1,'tag',70,'','','',0,1,''),(62,4,'附件分类管理',1,'rescate',120,'','','',0,1,''),(63,4,'GD图片方案',1,'gd',130,'','','',0,1,'image'),(74,4,'伪静态页设置',1,'rewrite',50,'','','',0,1,''),(75,5,'采集器',1,'plugin',30,'exec','','id=collection&exec=manage',0,1,''),(76,1,'在线升级',1,'update',70,'','','',0,1,'earth');

/*Table structure for table `qinggan_tag` */

DROP TABLE IF EXISTS `qinggan_tag`;

CREATE TABLE `qinggan_tag` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `site_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '站点ID',
  `title` varchar(255) NOT NULL COMMENT '名称',
  `url` varchar(255) NOT NULL COMMENT '关键字网址',
  `target` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0原窗口打开，1新窗口打开',
  `hits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `alt` varchar(255) NOT NULL COMMENT '链接里的提示',
  `is_global` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否全局状态1是0否',
  `replace_count` tinyint(4) NOT NULL DEFAULT '3' COMMENT '替换次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='关键字管理器';

/*Data for the table `qinggan_tag` */

/*Table structure for table `qinggan_tag_stat` */

DROP TABLE IF EXISTS `qinggan_tag_stat`;

CREATE TABLE `qinggan_tag_stat` (
  `title_id` varchar(200) NOT NULL COMMENT '主题ID，以p开头的表示项目ID，以c开头的表示分类ID',
  `tag_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'TAG标签ID',
  PRIMARY KEY (`title_id`,`tag_id`),
  KEY `title_id` (`title_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tag主题统计';

/*Data for the table `qinggan_tag_stat` */

/*Table structure for table `qinggan_tpl` */

DROP TABLE IF EXISTS `qinggan_tpl`;

CREATE TABLE `qinggan_tpl` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `title` varchar(100) NOT NULL COMMENT '模板名称',
  `author` varchar(100) NOT NULL COMMENT '开发者名称',
  `folder` varchar(100) NOT NULL DEFAULT 'www' COMMENT '模板目录',
  `refresh_auto` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1自动判断更新刷新0不刷新',
  `refresh` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1强制刷新0普通刷新',
  `ext` varchar(20) NOT NULL DEFAULT 'html' COMMENT '后缀',
  `folder_change` varchar(255) NOT NULL COMMENT '更改目录',
  `phpfolder` varchar(200) NOT NULL COMMENT 'PHP执行文件目录',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='模板管理';

/*Data for the table `qinggan_tpl` */

insert  into `qinggan_tpl`(`id`,`title`,`author`,`folder`,`refresh_auto`,`refresh`,`ext`,`folder_change`,`phpfolder`) values (1,'默认风格','phpok.com','www',1,0,'html','css,images,js','phpinc');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
