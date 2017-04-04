<?php
exit;
global $thread;
$only_host = param('onlyhost', 0);
if ($only_host) {
    if (! isset($cond['uid']) && isset($cond['tid'])) {
        if ($thread && $thread['tid'] == $tid) {
            $cond['uid'] = $thread['uid'];
        } else {
            $result = db_find_one('thread', array(
                'tid' => $cond['tid']
            ), array(), array(
                'uid'
            ));
            if ($result && isset($result['uid'])) {
                $cond['uid'] = $result['uid'];
            }
        }
    }
}