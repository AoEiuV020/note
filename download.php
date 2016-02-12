<?php
setlocale(LC_ALL, 'zh_CN.UTF-8'); 

$filename = $_GET['filename'];

if(!is_file($filename)||(strlen($uploadfile)>=4&&!strcmp(substr($uploadfile,-4),".php")))
{
	echo "无法下载，";
}
header("Content-Type:text/plain");
header('Content-Disposition:attachment;filename='.basename($filename));
header('Content-Transfer-Encodeing: binary');
readfile($filename);

?>
