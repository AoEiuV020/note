<!--***************************************************
	^> File Name: delete.php
	^> Author: AoEiuV020
	^> Mail: 490674483@qq.com
	^> Created Time: 2016/02/13 - 00:45:58
***************************************************-->
<!doctype html>
<head>
	<meta charset="utf-8" />
	<title>delete.php</title>
	<meta name="viewport" content="user-scalable=no, width=device-width" />
</head>
<html>
	<body>
		<p>
<?php
setlocale(LC_ALL, 'zh_CN.UTF-8'); 
function filedeletable($filename)
{
	$name=basename($filename);
	$order=basename(dirname($filename));
	$day=basename(dirname(dirname($filename)));
	$month=basename(dirname(dirname(dirname($filename))));
	$year=basename(dirname(dirname(dirname(dirname($filename)))));
	echo $year."/".$month."/".$day."/".$order."/".$name."</br>\n";
	if(!($day>=1&&$day<=31))
	{
		return false;
	}
	if(!($month>=1&&$month<=12))
	{
		return false;
	}
	if(!($year>=2000&&$year<=3333))
	{
		return false;
	}
	return true;
}
function dirdeletable($filename)
{
	$order=basename(($filename));
	$day=basename(dirname(($filename)));
	$month=basename(dirname(dirname(($filename))));
	$year=basename(dirname(dirname(dirname(($filename)))));
	echo $year."/".$month."/".$day."/".$order."/".$name."</br>\n";
	if(!($day>=1&&$day<=31))
	{
		return false;
	}
	if(!($month>=1&&$month<=12))
	{
		return false;
	}
	if(!($year>=2000&&$year<=3333))
	{
		return false;
	}
	return true;
}
$filename=$_GET["filename"];
if(is_file($filename)&&filedeletable($filename))
{
	echo "delete ".$filename." ";
	echo unlink($filename)?"true":"false";
	echo "</br>\n";
	$parent=dirname($filename);
	if(count(scandir($parent))==2)
	{
		echo "rmdir ".$parent." ";
		echo rmdir($parent)?"true":"false";
		echo "</br>\n";
	}
}
elseif(is_dir($filename)&&dirdeletable($filename))
{
	if(count(scandir($filename))==2)
	{
		echo "rmdir ".$filename." ";
		echo rmdir($filename)?"true":"false";
		echo "</br>\n";
	}
	else
	{
		echo $filename." not empty,";
		echo "</br>\n";
	}
}
else
{
	echo $filename." can not be deleted,";
}
?>
		</p>
	</body>
</html>
