<?php

/*
	Xiuno BBS 4.0 邀请码设置
	查鸽信息网 http://cha.sgahz.net
*/

!defined('DEBUG') AND exit('Access Denied.');
function invite_create($inv ,$ctime){
	$arr = array(
		'inv'	=> $inv,
		'ctime'	=> $ctime
	);
	$r = db_insert('sg_invite', $arr);
	return $r;
}
$action = param(3);
if(empty($action)) {
	
	$invitelist = db_find('sg_invite', array(), array(), 1, 1000, 'id');
	
	if($method == 'GET') {
		
		include _include(APP_PATH.'plugin/sg_invite/setting.htm');
		
	} else {
		$creatNum = param('creatNum');
		empty($creatNum) AND $message = '请输入生成数量';
		$id = param('rowid');
		if($creatNum  > 0) {
			$date = time();
			for($i = 0;$i < $creatNum;$i++) {
				invite_create(strtoupper(md5(uniqid(rand(), TRUE))) ,$date);
			}
			$message = '邀请码生成成功!~本次共生成 '.$creatNum.' 个。';
		}
		// 删除
		if($id) {
			if($method != 'POST') message(-1, 'Method Error.');

				

			$r = db_delete('sg_invite', array('id'=>$id));
			$r === FALSE AND message(-1, '删除失败');
			$message = '删除成功';
		}

		
		message(0, $message);
	}
}
?>