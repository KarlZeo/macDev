<?php

/*
	Xiuno BBS 4.0 邀请码安装
	查鸽信息网 http://cha.sgahz.net
*/

!defined('DEBUG') AND exit('Forbidden');

$tablepre = $db->tablepre;
$sql = "CREATE TABLE IF NOT EXISTS {$tablepre}sg_invite (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '邀请码ID',
  `inv` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '邀请码',
  `ctime` int(15) unsigned DEFAULT NULL COMMENT '生成时间',
  `stime` int(15) unsigned DEFAULT NULL COMMENT '使用时间',
  `user` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '使用人',
  PRIMARY KEY (`ID`,`inv`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
";

$r = db_exec($sql);
$r === FALSE AND message(-1, '创建邀请码表结构失败');

?>