<?php
exit;

/**
 * 将附加的信息添加到主题列表中
 */
if($threadlist) {
    $_ids = array_keys($threadlist);
    $_tmp = db_find('thread_summary', array('tid'=>$_ids), '', 1, $pagesize, 'tid');
    foreach($threadlist as $k=>&$row) {
        if(isset($_tmp[$k]['summary'])) {
            $row['summary'] = $_tmp[$k]['summary'];
        } else {
            $row['summary'] = '';
        }
    }
    global $db, $conf;
    $tablepre = $db->tablepre;
    $sql = 'SELECT * FROM '.$tablepre.'attach WHERE tid IN('.implode(',', $_ids).') GROUP BY tid ORDER BY aid ASC';
    $_tmp = db_sql_find($sql);
    if($_tmp) {
        foreach($_tmp as $tmp) {
            $threadlist[$tmp['tid']]['cover'] = $conf['upload_url'].'attach/'.$tmp['filename'];
        }
    }
}
