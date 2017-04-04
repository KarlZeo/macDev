<?php

/**
 * Gingerbbs 收藏帖子插件 安装程序
 */

!defined('DEBUG') AND exit('Forbidden');

$tablepre = $db->tablepre;
$sql = "create table {$tablepre}gg_favorite_thread
(
   tid INT(11) NOT NULL,
   uid INT(11) NOT NULL
)";
$r = db_exec($sql);
$r === FALSE AND message(-1, '创建表结构失败'); // 中断，安装失败。

?>