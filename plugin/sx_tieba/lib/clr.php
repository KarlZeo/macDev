<?php
//清空avatar目录下的缓存文件
function clrdir($dir) {
  //先删除目录下的文件：
  $dh=opendir($dir);
  while ($file=readdir($dh)) {
    if($file!="." && $file!="..") {
      $fullpath=$dir."/".$file;
      if(!is_dir($fullpath)) {
          unlink($fullpath);
      } else {
          deldir($fullpath);
      }
    }
  }  
  closedir($dh);
  echo '<head></head><body><script language="JavaScript"> alert("清除完毕..."); location.href="javascript:history.back();"; </script>清除完毕...</body>';
}

clrdir('../avatar/');	
?>