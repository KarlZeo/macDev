<?php

/*
	Xiuno BBS 4.0 大白系统增强设置插件
*/

!defined('DEBUG') AND exit('Forbidden');

setting_delete('huux_os_set');//删除数据就没有了


// 从菜单中移除
$kv = kv_get('dabai_plugin');
if ($kv){
	unset($kv['huux_os_set']);
	kv_set('dabai_plugin', $kv);
}else{
	message(-1, '安装时出错,已经删除。');
}

?>