else if($action=='favorite'){

	if($method=='POST'){

		$action = param('action','add');
		$tid = param('tid');
		if(!$user) message(0,'请先登录');
		$thread = thread_read($tid);
		empty($thread) AND message(0, lang('thread_not_exists'));
		if($action=='add'){
			db_insert('gg_favorite_thread',array('tid'=>$tid,'uid'=>$user['uid']));
			message(1,'添加成功！');
		}else if($action=='del'){
			db_delete('gg_favorite_thread',array('tid'=>$tid,'uid'=>$user['uid']));
			message(1,'删除成功！');
		}

	}else{
		
		include _include(APP_PATH.'plugin/GG_thread_favorite/model/func.php');
		$page = 1;
		$threads = GG_favorite_my();
		$threadlist = array();
		if(!empty($threads)){
			foreach($threads as $thread){
				$threadlist[] = thread_read($thread['tid']);
			}
		}
		include _include(APP_PATH.'plugin/GG_thread_favorite/model/my_favorite.htm');
	
	}

}