<?php

/*
 * GingerBBS - 图片验证码
 */

define('DEBUG',1);
define('APP_PATH','../../../');

$conf = @include APP_PATH.'conf/conf.php';
include APP_PATH.'xiunophp/xiunophp.php';
include APP_PATH.'model/plugin.func.php';
include APP_PATH.'model/kv.func.php';
include APP_PATH.'model/session.func.php';
$GG_vcode_setting = kv_get('GG_vcode');

$charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';	//随机因子
$fontsize = 20;														//指定字体大小
$font = '../static/font/type'.$GG_vcode_setting['type'].'.ttf';
$width = intval($GG_vcode_setting['width']);
$height = intval($GG_vcode_setting['height']);
$len = intval($GG_vcode_setting['len']);

//随机生成验证码
$code = '';
$_len = strlen($charset) - 1;
for($i=0;$i<$len;$i++){
	$code .= $charset[mt_rand(0,$_len)];
}
sess_start();
$_SESSION['GG_vcode'] = strtolower($code);

//生成背景
$img = imagecreatetruecolor($width, $height);
$color = imagecolorallocate($img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
imagefilledrectangle($img,0,$height,$width,0,$color);

//生成文字
$_x = $width / $len;
for($i=0;$i<$len;$i++) {
	$fontcolor = imagecolorallocate($img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
	imagettftext($img,$fontsize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),$height / 1.4,$fontcolor,$font,$code[$i]);
}

//生成线条、雪花
for ($i=0;$i<6;$i++) {
	$color = imagecolorallocate($img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
	imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$color);
}
for ($i=0;$i<10;$i++) {
	$color = imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
	imagestring($img,mt_rand(1,5),mt_rand(0,$width),mt_rand(0,$height),'*',$color);
}

//输出
header('Content-type:image/png');
imagepng($img);
imagedestroy($img);
 


?>