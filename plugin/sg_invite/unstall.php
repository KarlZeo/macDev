<?php

/*
	Xiuno BBS 4.0 邀请码卸载
	查鸽信息网 http://cha.sgahz.net
*/

!defined('DEBUG') AND exit('Forbidden');

$tablepre = $db->tablepre;
$sql = "DROP TABLE IF EXISTS {$tablepre}sg_invite;";

$r = db_exec($sql);
$r === FALSE AND message(-1, '卸载邀请码表失败');

?>