<?php

/**
 * Gingerbbs 回复提醒插件 安装程序
 */

!defined('DEBUG') AND exit('Forbidden');

$tablepre = $db->tablepre;
$r = db_exec("alter table {$tablepre}post add GG_reply_read int(1) default '0'");
$r = db_exec("alter table {$tablepre}post add GG_reply_user int(11) default '0'");
$r === FALSE AND message(-1, '创建表结构失败'); // 中断，安装失败。

?>