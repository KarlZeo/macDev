<?php

/*
	Xiuno BBS 4.0 大白增强设置插件
*/

!defined('DEBUG') AND exit('Forbidden');


// 初始化

$setting = setting_get('huux_os_set');

if(empty($setting)) {
	$setting = array('site_keywords'=>'','attach_pagesize'=>20,'logoimg_width'=>64,'logoimg_height'=>64,'avatarimg_width'=>64,'avatarimg_height'=>64);
	setting_set('huux_os_set', $setting);
}


// 初始化KV方案
$kv = kv_get('dabai_plugin');
if(!$kv) {
	$kv = array('huux_os_set' =>'{"id":"huux_os_set","name":"系统增强设置","type":"插件","set":1}' );
	kv_set('dabai_plugin', $kv);
}else{
	if (!in_array("huux_os_set", $kv)){
		$kv = $kv+array('huux_os_set' =>'{"id":"huux_os_set","name":"系统增强设置","type":"插件","set":1}' );
	}
	kv_set('dabai_plugin', $kv);
}




?>