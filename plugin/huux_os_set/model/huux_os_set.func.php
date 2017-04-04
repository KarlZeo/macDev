<?php
//用于日后开发的插件都在头部导航下拉处显示
function plugin_item() {
    $kv = kv_get('dabai_plugin');
    if($kv){
		foreach ($kv as $key){
			$key = xn_json_decode($key);
			$url = url('plugin-read-'.$key['id']);
			$url2 = url('plugin-setting-'.$key['id']);
            $plugin_item_a = '<li><a role="button" href="'.$url.'" class="dropdown-item" type="button"><em>['.$key['type'].']</em>'.$key['name'].'</a>
            <a href="'.$url2.'" class="abs">[设置]</a></li>';
            echo $plugin_item_a;
        }
    } 
 }



?>