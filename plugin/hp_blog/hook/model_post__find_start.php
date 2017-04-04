<?php
exit;

/**
 * 为了实现CMS的效果，这里可以支持设置评论的倒序显示
 */
$kv = kv_get('hp_settings');
if($kv['post_desc']) {
    $orderby['pid'] = -1;
}
