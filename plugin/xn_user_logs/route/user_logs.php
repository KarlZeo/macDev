<?php
!defined('DEBUG') AND exit('Forbidden');

$action = param(1);

$pagesize = 100;

//if(empty($action) || $action == 'list') {

	$header['title'] = lang('user_admin');
	$header['mobile_title'] = lang('user_admin');
	
	$cond = array();
	
	if($action == 'uid'){
		$uid = param(2, 0);
		if($uid > 0){
			$cond = array('uid'=>$uid);
		}
	}
	
	$list = db_find('user_logs', $cond, array(), 1, $pagesize);
	if($list){
		foreach($list as &$_log){
			$user = user_read_cache($_log['uid']);
			$_log['username'] = $user['username'];
			$_log['date'] = date('Y-m-d H:i:s',$_log['login_date']);
			$_log['ip'] = long2ip($_log['login_ip']);
		}
	}
//}

include _include(APP_PATH.'plugin/xn_user_logs/htm/user_logs.htm');