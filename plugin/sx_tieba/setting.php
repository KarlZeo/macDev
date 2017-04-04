<?php

/*
	Xiuno BBS 4.0 插件实例：搜索设置
	admin/plugin-setting-xn_search.htm
*/

!defined('DEBUG') AND exit('Access Denied.');

$action = param(3);
empty($action) AND $action = 'set';

$search_conf = kv_get('SX_tieba_conf');
if((empty($search_conf['sx_version']))) {
	$search_conf = array(
		'sx_version' => '132',
        'show_enable' => false,
        'show_upimgonly' => false,		
		'type'=>'fulltext', // like|fulltext|sphinx|site
		'range'=>0, // 0: all, 1: uponly, 2: none
		'method'=>2, // 0: no 1: isw, 2: ish, 3: zoom, 4:cut
		'avatar_height' => '90',
		'avatar_width' => '120',
		'avatar_quality' => '70',
		'cutword_url' => '', // 切词服务
		'nav_fontsize' => '0.95',
		'nav_fontcolor' => '000',
		'nav_bgcolor' => 'fff',
		'nav_height' => '0.5',
		'body_top' => '4',
		'nav_logo_url' => $conf['view_url'].'img/logo.png',
	);
	kv_set('SX_tieba_conf', $search_conf);
}

if($action == 'set') {
	
	if($method == 'GET') {
		
		// 站内搜索：https://www.baidu.com/s?wd=site%3Abbs.xiuno.com%20%E6%96%B0%E7%89%88%E6%9C%AC
		
		$input = array();
		$input['type'] = form_radio('type', array( 'fulltext'=>lang('sx_type_avatar'), ), $search_conf['type']);  //,'like'=>lang('search_type_like'), 'site_url'=>lang('search_type_site_url')
		$input['range'] = form_radio('range', array(0=>lang('sx_range_all'), 1=>lang('sx_range_uponly'), 2=>lang('sx_range_none'), ), $search_conf['range']);
		$input['method'] = form_radio('method', array(0=>lang('sx_method_no'), 1=>lang('sx_method_isw'), 2=>lang('sx_method_ish'), 3=>lang('sx_method_zoom'), 4=>lang('sx_method_cut'), ), $search_conf['method']);
		$input['avatar_height'] = form_text('avatar_height', $search_conf['avatar_height'], '30%');
		$input['avatar_width'] = form_text('avatar_width', $search_conf['avatar_width'], '30%');
		$input['avatar_quality'] = form_text('avatar_quality', $search_conf['avatar_quality'], '30%');
		$input['cutword_url'] = form_text('cutword_url', $search_conf['cutword_url'], '100%');
		$input['nav_fontsize'] = form_text('nav_fontsize', $search_conf['nav_fontsize'], '50%');
		$input['nav_fontcolor'] = form_text('nav_fontcolor', $search_conf['nav_fontcolor'], '50%');
		$input['nav_bgcolor'] = form_text('nav_bgcolor', $search_conf['nav_bgcolor'], '30%');
		$input['nav_height'] = form_text('nav_height', $search_conf['nav_height'], '30%');
		$input['body_top'] = form_text('body_top', $search_conf['body_top'], '30%');
		$input['nav_logo_url'] = form_text('nav_logo_url', $search_conf['nav_logo_url'], '100%');
		include _include(APP_PATH.'plugin/sx_tieba/setting.htm');
		
	} else {
	
		$search_conf['type'] = param('type');
		$search_conf['range'] = param('range');
		$search_conf['method'] = param('method');
		$search_conf['avatar_height'] = param('avatar_height');
		$search_conf['avatar_width'] = param('avatar_width');
		$search_conf['avatar_quality'] = param('avatar_quality');
		$search_conf['cutword_url'] = param('cutword_url');
		$search_conf['nav_fontsize'] = param('nav_fontsize');
		$search_conf['nav_fontcolor'] = param('nav_fontcolor');
		$search_conf['nav_bgcolor'] = param('nav_bgcolor');
		$search_conf['nav_height'] = param('nav_height');
		$search_conf['body_top'] = param('body_top');
		$search_conf['nav_logo_url'] = param('nav_logo_url');
		kv_set('SX_tieba_conf', $search_conf);
		
		message(0, '修改成功');
	}
	
} else {
		message(0, '修改失败');
}

function thread_firstpid_message($firstpid) {
	$post = post__read($firstpid);
	return array_value($post, 'message');
}



?>