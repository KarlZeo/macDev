<?php
exit;

/**
 * 保存摘要信息
 */

$summary = param('summary', '', FALSE);
empty($summary) AND $summary = xn_substr(strip_tags($message), 0, 300);
$data =  array(
    'tid'=>$tid,
    'summary'=>$summary
);
db_replace('thread_summary', $data);
?>