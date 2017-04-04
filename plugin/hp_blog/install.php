<?php
!defined('DEBUG') AND exit('Forbidden');

# 文章摘要，bbs_thread 的扩展表
$tablepre = $db->tablepre;
$sql = "CREATE TABLE IF NOT EXISTS {$tablepre}thread_summary (
    `tid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
    `summary` varchar(300) NOT NULL COMMENT '摘要',
	PRIMARY KEY (tid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
db_exec($sql);
?>