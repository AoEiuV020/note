<!--***************************************************
	^> File Name: add.php
	^> Author: AoEiuV020
	^> Mail: 490674483@qq.com
	^> Created Time: 2016/02/10 - 23:16:20
***************************************************-->
<!doctype html>
<head>
	<meta charset="utf-8" />
	<title>add note</title>
</head>
<html>
	<body>
		<p>
<?php
$year=$_GET["year"];
$month=$_GET["month"];
$day=$_GET["day"];
$dir="./".$year."/".$month."/".$day;
if($_GET["order"]===null)
{
	$order=0;
	while(file_exists($dir."/".$order))
	{
		++$order;
	}
}
else
{
	$order=$_GET["order"];
}
$path=$dir."/".$order;
echo $path."</br>\n";
?>
		</p>
		<p>
		<form action="upload.php" method="post"
								 enctype="multipart/form-data">
			<input type="file" name="file" id="file"><br>
			<input type="hidden" name="path" value="<?php echo $path;?>">
			<input type="submit" name="submit" value="Submit"></br>
			<textarea type="textarea" name="textarea" style="width:100%" rows=24 value=""><?php
setlocale(LC_ALL, 'zh_CN.UTF-8'); 
$filename=$_GET["filename"];
if(is_file($filename)&&is_readable($filename))
{
	echo file_get_contents($filename);
}
?></textarea>
		</form>
		</p>
	</body>
</html>
