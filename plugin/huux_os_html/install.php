<?php

/*
	Xiuno BBS 4.0 大白_自定义HTML+CSS+JS插件
*/

!defined('DEBUG') AND exit('Forbidden');


// 初始化

$setting = setting_get('huux_os_html');

if(empty($setting)) {
	$setting = array('index-html-1'=>'', 'index-html-2'=>'','index-html-3'=>'','index-hidden'=>'', 'forum-html-1'=>'', 'forum-html-2'=>'', 'forum-html-3'=>'', 'forum-hidden'=>'','thread-html-1'=>'', 'thread-html-2'=>'','thread-html-3'=>'','thread-html-4'=>'', 'thread-hidden'=>'','site-css'=>'','site-js'=>'','site-hidden'=>'','site-head'=>'','site-js-1'=>'','site-js-2'=>'','site-js-3'=>'','site-js-4'=>'','site-html-h'=>'','site-html-f'=>'', 'post-html-1'=>'', 'post-html-2'=>'','post-html-3'=>'','footer_footer_left_start'=>'','footer_footer_left_end'=>'','footer_nav_before'=>'','footer_nav_after'=>'','header_body_start'=>'','header_wrapper_start'=>'');
	setting_set('huux_os_html', $setting);
}


//加入大白插件导航
$kv = kv_get('dabai_plugin');
if(!$kv) {
	$kv = array('huux_os_html' =>'{"id":"huux_os_html","name":"自定义HTML+CSS+JS","type":"插件","set":1}' );
	kv_set('dabai_plugin', $kv);
}else{
	if (!in_array("huux_os_html", $kv)){
		$kv = $kv+array('huux_os_html' =>'{"id":"huux_os_html","name":"自定义HTML+CSS+JS","type":"插件","set":1}' );
	}
	kv_set('dabai_plugin', $kv);
}



?>