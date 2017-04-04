<?php

/**
 * Gingerbbs 收藏帖子 函数文件
 */

function GG_check_favorite(){
	global $uid,$tid;
	$r = db_find('gg_favorite_thread',array('uid'=>$uid,'tid'=>$tid));
	return empty($r) ? false : true;
}


function GG_favorite(){
	global $tid;
	return db_find('gg_favorite_thread',array('tid'=>$tid),array(),1,4);
}


function GG_favorite_my(){
	global $uid;
	return db_find('gg_favorite_thread',array('uid'=>$uid));
}

?>
