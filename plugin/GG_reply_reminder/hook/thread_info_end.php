
	//Gingerbbs 回复提醒 开始
	$GG_reply_read = db_update('post',array('tid'=>$tid,'GG_reply_user'=>$uid,'GG_reply_read'=>0),array('GG_reply_read'=>1));
	//Gingerbbs 回复提醒 结束