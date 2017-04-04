<?php

/*
	Xiuno BBS 4.0 大白_系统增强设置
*/

!defined('DEBUG') AND exit('Access Denied.');
include _include(APP_PATH.'plugin/huux_os_set/model/pagination_ajax.php');//加载进来
$setting = setting_get('huux_os_set');
//$action = _POST('action');
$action = param(3);

$pagesize = (!empty($setting['attach_pagesize'])?$setting['attach_pagesize']:20);//系统设置--附件列表单页显示数量

if(empty($action)){
		
	if($method == 'GET') {

		$input = array();
	    //原设置移植过来
	    $input['sitename'] = form_text('sitename', $conf['sitename']);  //系统设置--站点名称
	    $input['sitebrief'] = form_textarea('sitebrief', $conf['sitebrief'], '100%', 100);//系统设置--站点简介
		$input['runlevel'] = form_radio('runlevel', array(0=>lang('runlevel_0'), 1=>lang('runlevel_1'), 2=>lang('runlevel_2'), 3=>lang('runlevel_3'), 4=>lang('runlevel_4'), 5=>lang('runlevel_5')), $conf['runlevel']);
		$input['user_create_email_on'] = form_radio_yes_no('user_create_email_on', $conf['user_create_email_on']);
		$input['user_resetpw_on'] = form_radio_yes_no('user_resetpw_on', $conf['user_resetpw_on']);
		//新增conf设置项，不考虑安全问题
		$input['pagesize'] = form_text('pagesize', $conf['pagesize']);	//系统设置--主题列表每页主题数
		$input['postlist_pagesize'] = form_text('postlist_pagesize', $conf['postlist_pagesize']);	//系统设置--帖子每页回复数
		$input['url_rewrite_on'] = form_radio_yes_no('url_rewrite_on', $conf['url_rewrite_on']);//系统设置--伪静态开关
		$input['cdn_on'] = form_radio_yes_no('cdn_on', $conf['cdn_on']);//系统设置--CDN
	    $input['runlevel_reason'] = form_textarea('runlevel_reason', $conf['runlevel_reason'], '100%', 100);//系统设置--关闭站点说明
	    $input['admin_bind_ip'] = form_radio_yes_no('admin_bind_ip',$conf['admin_bind_ip']);//系统设置--后台是否绑定 IP
	    $input['view_url'] = form_text('view_url', $conf['view_url']);	//系统设置--前端view目录  
	    $input['upload_url'] = form_text('upload_url', $conf['upload_url']);	//系统设置--上传文件目录
	    // $input['tmp_path'] = form_text('tmp_path', $conf['tmp_path']);	//系统设置--临时文件目录
	    // $input['log_path'] = form_text('log_path', $conf['log_path']);	//系统设置--日志目录
	    $input['online_update_span'] = form_text('online_update_span', $conf['online_update_span']);	//系统设置--在线更新频度
	    $input['online_hold_time'] = form_text('online_hold_time', $conf['online_hold_time']);	//系统设置--在线更新频度order_default
	    $input['order_default'] = form_select('order_default', array('lastpid'=>'有最新回复的主题在前（lastpid）', 'firstpid'=>'最新发表的主题在前（firstpid）'), $conf['order_default']);
	    $input['upload_image_width'] = form_text('upload_image_width', $conf['upload_image_width']);	//系统设置--上传图片自动缩略的最大宽度
	    $input['site_keywords'] = form_text('site_keywords', $setting['site_keywords']);	//系统设置--站点keywords，SEO-使用setting存储
	    $input['attach_pagesize'] = form_text('attach_pagesize', $setting['attach_pagesize']);	//系统设置--附件列表单页显示数量 
	    $input['logoimg_width'] = form_text('logoimg_width', $setting['logoimg_width']);	//默认图片设置--logo宽度
	    $input['logoimg_height'] = form_text('logoimg_height', $setting['logoimg_height']);	//默认图片设置--logo高度 
	    $input['avatarimg_width'] = form_text('avatarimg_width', $setting['avatarimg_width']);	//默认头像图片设置--头像宽度
	    $input['avatarimg_height'] = form_text('avatarimg_height', $setting['avatarimg_height']);	//默认头像图片设置--头像高度 
		 // 附件列表
	     $page = 1; //起始页
	     $ajax_list ='';//用于列表回调
	     $num = db_count('attach'); 
	     $arrlist = db_find('attach', $cond = array(), $orderby = array('aid'=>1, 'create_date'=>-1), $page, $pagesize, $key ='', $col = array('aid','filesize','width','height','filename','orgfilename','filetype','create_date'), $d = NULL);
	     foreach ($arrlist as $key){  
	     	$ajax_list .= '<tr><td>'.$key['aid'].'</td><td><i class="icon-folder-open"></i>'.$key['filename'].'</td><td><a href="//'.$_SERVER['HTTP_HOST'].'/'.$conf['upload_url'].'attach/'.$key['filename'].'" target="_blank" data-toggle="tooltip" data-placement="top" title="'.($key['filetype']=='image'?'('.$key['width'].'px * '.$key['height'].'px)':'').'">'.$key['orgfilename'].'</td><td>'.$key['filetype'].'</td><td>'.format_bytes($key['filesize']).'</td><td>'.date('Y-n-j', $key['create_date']).'</td></tr>';
		 }
		 $pagination = pagination_ajax("{page}", $num, $page, $pagesize);
		 include _include(APP_PATH.'plugin/huux_os_set/setting.htm');
		
	} else {

		$x_setting =array();//更新系统conf/conf.php用

		//原设置移植过来
		$x_setting['sitename'] = param('sitename', '', FALSE);
		$x_setting['sitebrief'] = param('sitebrief', '', FALSE);
		$x_setting['runlevel'] = param('runlevel', 0);
		$x_setting['user_create_email_on'] = param('user_create_email_on', 0);
		$x_setting['user_resetpw_on'] = param('user_resetpw_on', 0);
		//新增conf设置,不考虑安全问题
		$x_setting['pagesize'] = param('pagesize', 0);//系统设置--主题列表每页主题数
		$x_setting['postlist_pagesize'] = param('postlist_pagesize', 0);//系统设置--帖子每页回复数
		$x_setting['url_rewrite_on'] = param('url_rewrite_on', 0);//系统设置--伪静态开关
		$x_setting['cdn_on'] = param('cdn_on', 0);//系统设置--CDN
		$x_setting['runlevel_reason'] = param('runlevel_reason', '', FALSE);//系统设置--关闭站点说明
		$x_setting['admin_bind_ip'] = param('admin_bind_ip', 0);//系统设置--后台是否绑定 IP
		$x_setting['view_url'] = param('view_url', '', FALSE);//系统设置--前端view目录
		$x_setting['upload_url'] = param('upload_url', '', FALSE);//系统设置--上传文件目录
		// $x_setting['tmp_path'] = param('tmp_path', '', FALSE);//系统设置--临时文件目录
		// $x_setting['log_path'] = param('log_path', '', FALSE);//系统设置--日志目录
		$x_setting['online_update_span'] = param('online_update_span', 0);//系统设置--在线更新频度
		$x_setting['online_hold_time'] = param('online_hold_time', 0);//系统设置--在线时间
		$x_setting['order_default'] = param('order_default', '', FALSE);//系统设置--主题排序依据
		$x_setting['upload_image_width'] = param('upload_image_width', 0);//上传图片自动缩略的最大宽度
	    file_replace_var(APP_PATH.'conf/conf.php', $x_setting);//更新所有设置包括原设置和新增的设置

	    $setting['site_keywords'] = param('site_keywords', '', FALSE); //系统设置--站点keywords，SEO-使用setting存储
	    $setting['attach_pagesize'] = param('attach_pagesize', 0);//系统设置--在线时间
	    $setting['logoimg_width'] = param('logoimg_width', 0);//默认图片设置--logo宽度
	    $setting['logoimg_height'] = param('logoimg_height', 0);//默认图片设置--logo高度
	    $setting['avatarimg_width'] = param('avatarimg_width', 0);//默认头像图片设置--头像宽度
	    $setting['avatarimg_height'] = param('avatarimg_height', 0);//默认头像图片设置--头像高度
	    setting_set('huux_os_set', $setting); //系统设置--附件列表单页显示数量

		message(0, array('a'=>'修改成功','b'=>'系统设置成功','c'=>'失败'));

	}
}
elseif($action == 'clearii') {
    //执行清除命令
	$todo = param('clear');
	if($todo =="cache"){
		cache_truncate();
		$runtime = NULL; // 清空
		message(0, array('a' =>'缓存已清理' ,'b'=>'失败' ));
	}
	rmdir_recusive($conf['tmp_path'], 1);
	message(0, array('a' =>'临时目录已清理' ,'b'=>'失败' ));
}
elseif($action == 'page'){
	//附件列表
    $page = param('l');
    $ajax_list =''; //用于列表回调
    $num = db_count('attach'); 
    $arrlist = db_find('attach', $cond = array(), $orderby = array('aid'=>-1, 'create_date'=>-1), $page, $pagesize, $key ='', $col = array('aid','filesize','width','height','filename','orgfilename','filetype','create_date'), $d = NULL);
    foreach ($arrlist as $key){  
     	$ajax_list .= '<tr><td>'.$key['aid'].'</td><td><i class="icon-folder-open"></i>'.$key['filename'].'</td><td><a href="//'.$_SERVER['HTTP_HOST'].'/'.$conf['upload_url'].'attach/'.$key['filename'].'" target="_blank" data-toggle="tooltip" data-placement="top" title="'.($key['filetype']=='image'?'('.$key['width'].'px * '.$key['height'].'px)':'').'">'.$key['orgfilename'].'</td><td>'.$key['filetype'].'</td><td>'.format_bytes($key['filesize']).'</td><td>'.date('Y-n-j', $key['create_date']).'</td></tr>';
	}
	$pagination = pagination_ajax("{page}", $num, $page, $pagesize);//用于分页回调
	message(0, array('a' => $ajax_list ,'b'=> $pagination,'c'=> $page));
}
elseif($action == 'clip'){
	    $todo = param('item');
	    if($todo =="logo"){
	        //站点logo
		    $width = param('width');
			$height = param('height');
			$data = param('data', '', FALSE);
			
			empty($data) AND message(-1, lang('data_is_empty'));
			$data = base64_decode_file_data($data);
			$size = strlen($data);
			$size > 2048000 AND message(-1, lang('filesize_too_large', array('maxsize'=>'2M', 'size'=>$size)));
			
			$filename = "logo.png";
			$path = '../'.$conf['view_url'].'img/';
			$url = '../'.$conf['view_url'].'img/'.$filename;
			!is_dir($path) AND (mkdir($path, 0777, TRUE) OR message(-2, lang('directory_create_failed')));
			file_put_contents($path.$filename, $data) OR message(-1, lang('write_to_file_failed'));

	        //同名不更新，所以换个类目，上传了两次非常不好，但是没办法。
	        $cankut = mt_rand();
			$path2 = '../tmp/';
			$url2 = '../tmp/'.$cankut.$filename;
			file_put_contents($path2.$cankut.$filename, $data) OR message(-1, lang('write_to_file_failed'));		

			message(0, array('a' =>'logo更换成功','b'=>'失败','c'=>$url2 ));
		}else{
			//站点头像
		    $width = param('width');
			$height = param('height');
			$data = param('data', '', FALSE);
			empty($data) AND message(-1, lang('data_is_empty'));
			$data = base64_decode_file_data($data);
			$size = strlen($data);
			$size > 2048000 AND message(-1, lang('filesize_too_large', array('maxsize'=>'2M', 'size'=>$size)));
			$filename = "avatar.png";
			$path = '../'.$conf['view_url'].'img/';
			$url = '../'.$conf['view_url'].'img/'.$filename;
			!is_dir($path) AND (mkdir($path, 0777, TRUE) OR message(-2, lang('directory_create_failed')));
			file_put_contents($path.$filename, $data) OR message(-1, lang('write_to_file_failed'));
	        //同名不更新，所以换个类目，上传了两次非常不好，但是没办法。
	        $cankut = mt_rand();
			$path2 = '../tmp/';
			$url2 = '../tmp/'.$cankut.$filename;
			file_put_contents($path2.$cankut.$filename, $data) OR message(-1, lang('write_to_file_failed'));
			message(0, array('a' =>'头像更换成功','b'=>'失败','c'=>$url2 ));
		}

}
	
?>