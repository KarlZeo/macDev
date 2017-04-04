		$invite = param('invite');
		empty($invite) AND message('invite', '请填写邀请码');
		$invdata = db_find_one('sg_invite', array('inv'=>$invite));
		if(!empty($invdata['inv'])){
			if(isset($invdata['user']) && isset($invdata['stime'])){
				message('invite', '邀请码已被使用！');
			}
		}else{
			message('invite', '邀请码不存在！');
		}