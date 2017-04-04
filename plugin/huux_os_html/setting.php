<?php

/*
	Xiuno BBS 4.0 大白_自定义HTML+CSS+JS插件设置
	20170111 由kv_set转换为setting_set
	合并到 setting 进行存储，持久存储，并且通过 cache 加速（如果开启 cache）
*/

!defined('DEBUG') AND exit('Access Denied.');

$setting = setting_get('huux_os_html');


if($method == 'GET') {
	

	
	$input = array();

	$input['index-html-1'] = form_textarea('index-html-1', $setting['index-html-1'], '100%', 100);
	$input['index-html-2'] = form_textarea('index-html-2', $setting['index-html-2'], '100%', 100);
	$input['index-html-3'] = form_textarea('index-html-3', $setting['index-html-3'], '100%', 100);
	$input['index-hidden'] = form_textarea('index-hidden', $setting['index-hidden'], '100%', 100);

	$input['forum-html-1'] = form_textarea('forum-html-1', $setting['forum-html-1'], '100%', 100);
	$input['forum-html-2'] = form_textarea('forum-html-2', $setting['forum-html-2'], '100%', 100);
	$input['forum-html-3'] = form_textarea('forum-html-3', $setting['forum-html-3'], '100%', 100);
	$input['forum-hidden'] = form_textarea('forum-hidden', $setting['forum-hidden'], '100%', 100);

	$input['thread-html-1'] = form_textarea('thread-html-1', $setting['thread-html-1'], '100%', 100);
	$input['thread-html-2'] = form_textarea('thread-html-2', $setting['thread-html-2'], '100%', 100);
	$input['thread-html-3'] = form_textarea('thread-html-3', $setting['thread-html-3'], '100%', 100);
	$input['thread-html-4'] = form_textarea('thread-html-4', $setting['thread-html-4'], '100%', 100);
	$input['thread-hidden'] = form_textarea('thread-hidden', $setting['thread-hidden'], '100%', 100);


	$input['site-css'] = form_textarea('site-css', $setting['site-css'], '100%', 300);
	$input['site-js'] = form_textarea('site-js', $setting['site-js'], '100%', 300);	
	$input['site-hidden'] = form_textarea('site-hidden', $setting['site-hidden'], '100%', 100);
	$input['site-head'] = form_textarea('site-head', $setting['site-head'], '100%', 100);

	$input['site-js-1'] = form_textarea('site-js-1', $setting['site-js-1'], '100%', 100);	
	$input['site-js-2'] = form_textarea('site-js-2', $setting['site-js-2'], '100%', 100);	
	$input['site-js-3'] = form_textarea('site-js-3', $setting['site-js-3'], '100%', 100);	
	$input['site-js-4'] = form_textarea('site-js-4', $setting['site-js-4'], '100%', 100);	

	$input['site-html-h'] = form_textarea('site-html-h', $setting['site-html-h'], '100%', 100);
	$input['site-html-f'] = form_textarea('site-html-f', $setting['site-html-f'], '100%', 100);

	//201701116 postpage
	$input['post-html-1'] = form_textarea('post-html-1', $setting['post-html-1'], '100%', 100);
	$input['post-html-2'] = form_textarea('post-html-2', $setting['post-html-2'], '100%', 100);
	$input['post-html-3'] = form_textarea('post-html-3', $setting['post-html-3'], '100%', 100);

	//2017-01-30 v1.5版本友好升级
	$input['footer_footer_left_start'] = form_textarea('footer_footer_left_start', (empty($setting['footer_footer_left_start'])?'':$setting['footer_footer_left_start']), '100%', 100);
	$input['footer_footer_left_end'] = form_textarea('footer_footer_left_end', (empty($setting['footer_footer_left_end'])?'':$setting['footer_footer_left_end']), '100%', 100);
	$input['footer_nav_before'] = form_textarea('footer_nav_before', (empty($setting['footer_nav_before'])?'':$setting['footer_nav_before']), '100%', 100);
	$input['footer_nav_after'] = form_textarea('footer_nav_after', (empty($setting['footer_nav_after'])?'':$setting['footer_nav_after']), '100%', 100);
	$input['header_body_start'] = form_textarea('header_body_start', (empty($setting['header_body_start'])?'':$setting['header_body_start']), '100%', 100);
	$input['header_wrapper_start'] = form_textarea('header_wrapper_start', (empty($setting['header_wrapper_start'])?'':$setting['header_wrapper_start']), '100%', 100);

	


	include _include(APP_PATH.'plugin/huux_os_html/setting.htm');
	
} else {

	//$setting = array();
	$setting['index-html-1'] = param('index-html-1', '', FALSE);   //首页-左侧顶部
	$setting['index-html-2'] = param('index-html-2', '', FALSE);   //首页-右侧发帖按钮下
	$setting['index-html-3'] = param('index-html-3', '', FALSE);   //首页-右侧底部
	$setting['index-hidden'] = param('index-hidden', '', FALSE);   //首页-隐藏区域
	$setting['forum-html-1'] = param('forum-html-1', '', FALSE);   //分类页-左侧面包屑导航上
	$setting['forum-html-2'] = param('forum-html-2', '', FALSE);   //分类页-左侧面包屑导航下
	$setting['forum-html-3'] = param('forum-html-3', '', FALSE);   //分类页-右侧底部
	$setting['forum-hidden'] = param('forum-hidden', '', FALSE);   //分类页-隐藏区域
	$setting['thread-html-1'] = param('thread-html-1', '', FALSE);   //主题页-左侧面包屑导航上
	$setting['thread-html-2'] = param('thread-html-2', '', FALSE);   //主题页-左侧面包屑导航下
	$setting['thread-html-3'] = param('thread-html-3', '', FALSE);   //主题页-左侧最新回复上面
	$setting['thread-html-4'] = param('thread-html-4', '', FALSE);   //主题页-右侧底部
	$setting['thread-hidden'] = param('thread-hidden', '', FALSE);   //主题页-隐藏区域
	$setting['site-css'] = param('site-css', '', FALSE);   //站点全局CSS
	$setting['site-js'] = param('site-js', '', FALSE);   //站点全局JS
	$setting['site-hidden'] = param('site-hidden', '', FALSE);   //站点隐藏区域
	$setting['site-head'] = param('site-head', '', FALSE);   //站点head区域

	$setting['site-js-1'] = param('site-js-1', '', FALSE);   //首页自定义JS
	$setting['site-js-2'] = param('site-js-2', '', FALSE);   //分类页自定义JS
	$setting['site-js-3'] = param('site-js-3', '', FALSE);   //主题页自定义JS
	$setting['site-js-4'] = param('site-js-4', '', FALSE);   //发表主题页自定义JS

	$setting['site-html-h'] = param('site-html-h', '', FALSE);   //20170111新加所有页头部通栏
	$setting['site-html-f'] = param('site-html-f', '', FALSE);   //20170111新加所有页尾部通栏
    //20170116 postpage
    $setting['post-html-1'] = param('post-html-1', '', FALSE);   //发表主题页-顶部(不在container内)
	$setting['post-html-2'] = param('post-html-2', '', FALSE);   //发表主题页-添加附件和发表主题行的下一行
	$setting['post-html-3'] = param('post-html-3', '', FALSE);   //发表主题页-底部(不在container内)
    //20170130 power by xiuno
	$setting['footer_footer_left_start'] = param('footer_footer_left_start', '', FALSE);   //页脚版权左侧
	$setting['footer_footer_left_end'] = param('footer_footer_left_end', '', FALSE);   //页脚版权右侧
	$setting['footer_nav_after'] = param('footer_nav_after', '', FALSE);   //页脚上
	$setting['footer_nav_before'] = param('footer_nav_before', '', FALSE);   //页脚下
	$setting['header_body_start'] = param('header_body_start', '', FALSE);   //body最上
	$setting['header_wrapper_start'] = param('header_wrapper_start', '', FALSE);   //wrapper最上，也是头部导航上

	setting_set('huux_os_html', $setting);
	
	message(0, '修改成功');
}
	
?>