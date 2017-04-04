<?php
exit;

/**
 * 读取一下摘要信息
 */
if ($thread) {
    $_tmp = db_find_one('thread_summary', array('tid' => $tid));
    $thread['summary'] = $_tmp['summary'];
}
?>