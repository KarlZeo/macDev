<?php

/*
	Xiuno BBS 4.0 插件实例：搜索
*/

!defined('DEBUG') AND exit('Forbidden');

$search_conf = kv_get('SX_tieba_conf');
if((empty($search_conf['sx_version']))||(($search_conf['sx_version'])!='132')) {
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



?>