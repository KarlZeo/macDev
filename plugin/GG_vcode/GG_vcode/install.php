<?php

/*
	GingerBBS - 验证码
*/

!defined('DEBUG') AND exit('Forbidden');

$setting = kv_get('GG_vcode');
if(empty($setting)) {
	$setting = array(
		'register' => "1",
		'login' => "1",
		'thread' => "1",
		'post' => "1",
		'len' => "4",
		'type' => "1",
		'width' => "90",
		'height' => "35"
	);
	kv_set('GG_vcode', $setting);
}

?>