	//登录查看
	$html_login = '<p style="padding:3px 5px;margin:10px auto;border:2px dashed #ea413c;">本帖有隐藏内容，请您<a href="'.url('user-login').'" target="_blank" style="font-weight:bold;">登录</a>后查看。</p>';
	$preg_login = preg_match_all('/\[login\](.*?)\[\/login\]/i',$first['message_fmt'],$array);
	if($preg_login){
		for($i=0;$i<count($array[0]);$i++){
			$a = $array[0][$i];
			$b = $array[1][$i];
			if($user){
				$first['message_fmt'] = str_replace($a,$b,$first['message_fmt']);
			}else{
				$first['message_fmt'] = str_replace($a,$html_login,$first['message_fmt']);
			}
		}
	}
	//回复查看
	$preg_reply = preg_match_all('/\[reply\](.*?)\[\/reply\]/i',$first['message_fmt'],$array);
	$html_reply = '<p style="padding:3px 5px;margin:10px auto;border:2px dashed #ea413c;">本帖有隐藏内容，请您<a href="'.url('post-create-'.$tid).'" style="font-weight:bold;">回复</a>后查看。</p>';
	$is_reply = db_find_one('post',array('uid'=>$uid,'tid'=>$tid));
	if($preg_reply){
		for($i=0;$i<count($array[0]);$i++){
			$a = $array[0][$i];
			$b = $array[1][$i];
			if($is_reply){
				$first['message_fmt'] = str_replace($a,$b,$first['message_fmt']);
			}else{
				$first['message_fmt'] = str_replace($a,$html_reply,$first['message_fmt']);
			}
		}
	}