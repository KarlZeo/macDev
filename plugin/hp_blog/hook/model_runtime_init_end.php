<?php
exit;

/**
 * 补充一些实时运行数据
 */
$runtime['forums'] = forum_count(); //版块总数
$runtime['lastupdate'] = time();    //这里要取最后一个主题的发布时间，暂时先留空吧

cache_set('runtime', $runtime);
