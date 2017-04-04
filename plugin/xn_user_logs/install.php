<?php

/*
	安装
*/

!defined('DEBUG') AND exit('Forbidden');

$sql = "CREATE TABLE IF NOT EXISTS bbs_user_logs (
  id int(11) unsigned NOT NULL AUTO_INCREMENT ,
  uid int(11) unsigned NOT NULL DEFAULT '0',
  login_ip int(11) unsigned NOT NULL DEFAULT '0' ,
  login_date int(11) unsigned NOT NULL DEFAULT '0' ,
  ua varchar(255) NOT NULL DEFAULT '' ,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
db_exec($sql);