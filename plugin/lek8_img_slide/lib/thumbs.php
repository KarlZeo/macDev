<?php
//大图片动态生成缩略图显示，内存中生成，不生成真实文件
//乐客吧www.lek8.com制作 QQ:804772778
//http://127.0.0.1/thumbs.php?filename=http://127.0.0.1/upload/attach/20161019/1_jyseu0btsejoco6.jpg&width=100&height=100&is=0
$filename= $_GET['filename'];//必须是 完整的图片文件路径
$width = $_GET['width']?$_GET['width']:200;//缩略图 宽
$height = $_GET['height']?$_GET['height']:200;//缩略图 高
$is = $_GET['is']?$_GET['is']:0;// is=0 按参数缩略，is=1 锁定比例缩略

//获取图片文件的类型 $type
//查找最后一个‘.’字符的位置 并 返回之后的字符串
//substr() 函数用于从字符串中获取其中的一部分，返回一个字符串。
$type = substr(strtolower(substr(strrchr($filename,"."),1)),0,3);

// Content type 内容类型
header('Content-type: image/jpeg');
// Get new dimensions 获取新的维（锁定比例缩略）
list($width_orig, $height_orig) = getimagesize($filename);
if($is == 1){
	if ($width && ($width_orig < $height_orig)) {
	  $width = ($height / $height_orig) * $width_orig;
	} else {
	  $height = ($width / $width_orig) * $height_orig;
	}
}
// Resample
$image_p = imagecreatetruecolor($width, $height);
//按类型 初始化 图像
if($type=="jpg") {
	$image = imagecreatefromjpeg($filename);
}else if($type=="gif") {
	$image = imagecreatefromgif($filename);
}else if($type=="png") {
	$image = imagecreatefrompng($filename);
}else{
	$image = imagecreatefromjpeg($filename);
}
//缩略图
imagecopyresampled($image_p,$image,0,0,0,0,$width,$height,$width_orig,$height_orig);
// Output 输出图像
imagejpeg($image_p, null, 100);
// Imagedestroy 释放图像
imagedestroy ($image_p);
?>
