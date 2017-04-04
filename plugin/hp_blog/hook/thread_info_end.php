<?php
exit;

/**
 * 根据后台设置来确定是否要重新计算楼层
 */
$kv = kv_get('hp_settings');
if ($kv['post_desc']) {
    $total = $thread['posts'];
    foreach ($postlist as &$post) {
        $post['floor'] = $total - $post['floor'];
    }
}