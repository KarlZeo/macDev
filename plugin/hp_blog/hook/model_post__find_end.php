<?php
exit;
//有分页的话，倒序排列就取不取第一个贴子了。
global $route, $thread;
$kv = kv_get('hp_settings');
if($kv['post_desc'] && $route=='thread' && $page == 1) {
    $firstpid = $thread['firstpid'];
    if(!isset($postlist[$firstpid])) {
        $postlist[$firstpid] = post_read($firstpid);
    }
}