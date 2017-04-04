<?php
//文件大小

function format_bytes($size) { 
$units = array(' B', ' KB', ' MB', ' GB', ' TB'); 
for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024; 
return round($size, 2).$units[$i]; 
} 

function pagination_tpl_ajax($url, $text, $active = '') {
    global $g_pagination_tpl;
    empty($g_pagination_tpl) AND $g_pagination_tpl = '<li class="page-item{active}"><a data-title="{url}" class="page-link">{text}</a></li>';
    return str_replace(array('{url}', '{text}', '{active}'), array($url, $text, $active), $g_pagination_tpl);
}

// bootstrap 翻页，命名与 bootstrap 保持一致
function pagination_ajax($url, $totalnum, $page, $pagesize = 20) {
    $totalpage = ceil($totalnum / $pagesize);
    if($totalpage < 2) return '';
    $page = min($totalpage, $page);
    $shownum = 5;   // 显示多少个页 * 2

    $start = max(1, $page - $shownum);
    $end = min($totalpage, $page + $shownum);

    // 不足 $shownum，补全左右两侧
    $right = $page + $shownum - $totalpage;
    $right > 0 && $start = max(1, $start -= $right);
    $left = $page - $shownum;
    $left < 0 && $end = min($totalpage, $end -= $left);

    $s = '';
    $page != 1 && $s .= pagination_tpl_ajax(str_replace('{page}', $page-1, $url), '«', '');
    if($start > 1) $s .= pagination_tpl_ajax(str_replace('{page}', 1, $url),'1 '.($start > 2 ? '... ' : ''));
    for($i=$start; $i<=$end; $i++) {
        $s .= pagination_tpl_ajax(str_replace('{page}', $i, $url), $i, $i == $page ? ' active' : '');
    }
    if($end != $totalpage) $s .= pagination_tpl_ajax(str_replace('{page}', $totalpage, $url), ($totalpage - $end > 1 ? '... ' : '').$totalpage);
    $page != $totalpage && $s .= pagination_tpl_ajax(str_replace('{page}', $page+1, $url), '»');
    return $s;
}




?>