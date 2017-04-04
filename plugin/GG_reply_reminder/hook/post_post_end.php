
	//Gingerbbs 回复提醒 开始
	if($quotepid==0){
		$GG_reply_thread = db_find_one('thread',array('tid'=>$tid));
		$GG_reply_user = $GG_reply_thread['uid'];
	}else{
		$GG_reply_post = db_find_one('post',array('pid'=>$quotepid));
		$GG_reply_user = $GG_reply_post['uid'];
	}
	$GG_reply_post = db_update('post',array('pid'=>$pid),array('GG_reply_user'=>$GG_reply_user));
	//Gingerbbs 回复提醒 结束