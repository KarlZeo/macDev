<?php

/**
 * Gingerbbs 收藏帖子插件 鞋卸载程序
 */

!defined('DEBUG') AND exit('Forbidden');

$tablepre = $db->tablepre;
$sql = "DROP TABLE IF EXISTS {$tablepre}gg_favorite_thread";
$r = db_exec($sql);


?>