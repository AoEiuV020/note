<!--***************************************************
	^> File Name: upload.php
	^> Author: AoEiuV020
	^> Mail: 490674483@qq.com
	^> Created Time: 2016/02/10 - 23:26:27
***************************************************-->

<?php
setlocale(LC_ALL, 'zh_CN.UTF-8'); 

$uploaddir = $_POST["path"];

echo '<pre>';
$uploadfile = $uploaddir ."/". basename($_FILES['file']['name']);
if(strlen($_FILES['file']['name'])>0)
{
	mkdir($uploaddir,0775,true);
	if(strlen($uploadfile)>=4&&!strcmp(substr($uploadfile,-4),".php"))
	{
		$uploadfile=substr($uploadfile,0,-4).".txt";
	}
	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
		echo "文件上传成功，\n";
		echo $uploadfile."\n";
	} else {
		echo "文件上传失败，\n";
	}
}
else
{
	echo "没有上传文件，\n";
}
if(strlen($_POST["textarea"])>0)
{
	mkdir($uploaddir,0775,true);
	$uploadnote=$uploaddir."/"."note.txt";
	if(($note=fopen($uploadnote,"w"))!==false)
	{
		$len=fwrite($note,$_POST["textarea"]);
		echo "note记录".$len."字节，";
		fclose($note);
	}
	else
	{
		echo $uploadnote." 不可写，";
	}
}
print "</pre>\n";

echo "<!--\n";
print_r($_FILES);
print_r($_POST);
echo "-->\n"
?>
