<?php
//大图片动态生成缩略图显示，生成真实文件
$filename= $_GET['filename'];//必须是 完整的图片文件路径
$w = $_GET['width']?$_GET['width']:0;//缩略图 宽
$h = $_GET['height']?$_GET['height']:0;//缩略图 高
$mode = $_GET['mode']?$_GET['mode']:0;// =0 不缩放(不建议)，=1按宽度缩放， =2按高度缩放，=3按宽高拉伸，=4按宽高从中间缩放裁剪
$quality = $_GET['q']?$_GET['q']:70;
//获取图片文件的类型 $type
$dst_img = strtolower(substr($filename,strrpos($filename,"/")+1,strrpos($filename,".")+3));
$type = substr($dst_img,-3,3);
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
$dst_img = '../avatar/thumb_'.$dst_img;
// Get new dimensions 获取新的维（锁定比例缩略）
list($width_orig, $height_orig) = getimagesize($filename);
$src_x=0;
$src_y=0;
$width = $w;
$height = $h; //默认模式
// Content type 内容类型
header('Content-type: image/jpeg');
if($mode==0){	
			$width = $width_orig;
			$height = $height_orig; //默认模式
		}
elseif ($mode==1) {
			$width = $w;
			$height = ($width / $width_orig) * $height_orig;
		}		
elseif ($mode==2) {
			$height = $h;
			$width = ($height * $width_orig / $height_orig);
		}
elseif($mode==4){		//裁剪模式
	$width2 = $width;
	$height2 = $height;
	if(($width_orig/$width)>($height_orig/$height))
	{
		$width = ($height * $width_orig) / $height_orig;
		$src_x = ($width - $width2)/2;
		$src_y=0;
	}else{
		$height = ($width / $width_orig) * $height_orig;
		$src_y = ($height-$height2)/2;
		$src_x=0;
	}

}else{					//缩放模式

}

// Resample
$image_p = imagecreatetruecolor($width, $height);
$bgcolor=imagecolorallocate($image_p,255,255,255);	//白色背景
imagefill($image_p,0,0,$bgcolor);

//缩略图
//imagecopyresampled($image_p,$image,$src_x,$src_y,0,0,$width,$height,$width,$height);
imagecopyresampled($image_p,$image,0,0,0,0,$width,$height,$width_orig,$height_orig);
if($mode==4){
	$image_p2 = imagecreatetruecolor($width2, $height2);	
	imagecopyresampled($image_p2,$image_p,0-$src_x,0-$src_y,0,0,$width,$height,$width,$height);
	//保存图像
	imagejpeg($image_p2, $dst_img, $quality);
	// Output 输出图像
	imagejpeg($image_p2, null, $quality);
	imagedestroy ($image_p2);
}
else 
{
	//保存图像
	if($mode!=0)
		imagejpeg($image_p, $dst_img, $quality);
	// Output 输出图像
	imagejpeg($image_p, null, $quality);

}

// Imagedestroy 释放图像
imagedestroy ($image_p);
imagedestroy ($image);
?>

