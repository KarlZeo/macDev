<?php

/*
	Gingerbbs 插件：验证码
*/

!defined('DEBUG') AND exit('Access Denied.');

$setting = kv_get('GG_vcode');

if($method == 'GET') {
	
	include '../plugin/GG_vcode/setting.htm';
	
} else {

	$array = array();
	$array['register'] = param('register',0);
	$array['login'] = param('login',0);
	$array['thread'] = param('thread',0);
	$array['post'] = param('post',0);
	$array['len'] = param('len',4);
	$array['type'] = param('type',1);
	$array['width'] = param('width',90);
	$array['height'] = param('height',35);

	kv_set('GG_vcode',$array);

	message(0,'修改成功！');
}
	
?>