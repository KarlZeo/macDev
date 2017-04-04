<?php

/**
 * Gingerbbs 回复提醒插件 安装程序
 */

!defined('DEBUG') AND exit('Forbidden');

$tablepre = $db->tablepre;
$r = db_exec("alter table {$tablepre}post drop GG_reply_user");
$r = db_exec("alter table {$tablepre}post drop GG_reply_read");


?>