		
		$GG_vcode_setting = kv_get('GG_vcode');
		if($GG_vcode_setting['post']==1){
			$vcode = strtolower(param('vcode',''));
			$vcode_sess = sess_read('GG_vcode');
			if(!isset($_SESSION['GG_vcode']) || $_SESSION['GG_vcode']!=$vcode) message('vcode','验证码错误');
			$_SESSION['GG_vcode'] = NULL;
		}