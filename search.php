<!--***************************************************
	^> File Name: search.php
	^> Author: AoEiuV020
	^> Mail: 490674483@qq.com
	^> Created Time: 2016/02/13 - 01:34:54
***************************************************-->
<!doctype html>
<head>
	<meta charset="utf-8" />
	<title>search.php</title>
	<meta name="viewport" content="user-scalable=no, width=device-width" />
</head>
<html>
	<body>
		<p>
<?php
$year=$_GET["year"];
$month=$_GET["month"];
$day=$_GET["day"];
for($day=1;$day<=31;++$day)
{
	$dir="./".$year."/".$month."/".$day;
	echo $year.".".$month.".".$day."</br>\n";
	if(is_dir($dir))
	{
		$notesdir=opendir($dir);
		$exclude=array(".","..");
		$notes=null;
		while(($file=readdir($notesdir))!==false)
		{
			if(!in_array($file,$exclude))
			{
				$notes[]=$file;
			}
		}
		closedir($dir);
		asort($notes);
		foreach($notes as $order)
		{
			$notedir=$dir."/".$order;
			echo $order."/";
			echo "<a href=\"delete.php?filename=".$notedir."\"".">"."X"."</a>:";
			$note=opendir($notedir);
			$exclude=array(".","..");
			while(($file=readdir($note))!==false)
			{
				if(!in_array($file,$exclude))
				{
					echo "<a href=\"download.php?filename=".$notedir."/".$file."\"".">".$file."</a>/";
					echo "<a href=\"delete.php?filename=".$notedir."/".$file."\"".">"."X"."</a> ";
				}
			}
			closedir($note);
			$notepath=$notedir."/note.txt";
			if(is_file($notepath)&&is_readable($notepath))
			{
				$date="year=".$year."&month=".$month."&day=".$day;
				echo "<a href=\"add.php?".$date."&order=".$order."&filename=".$notepath."\"".">edit</a> ";
				$notetxt=fopen($notepath,"r");
				echo substr(fgets($notetxt),0,24)." ...";
				fclose($notetxt);
			}
			echo "</br>\n";
		}
	}
}
?>
		</p>
	</body>
</html>
