<?php
$con=mysql_connect("localhost","root","7758521");
if(!$con)
  die("Error: Could not connect...".mysql_error());

mysql_select_db("superdog");
mysql_query("set names utf8");

$seq=$_POST[Seq];
$count=0;
if($_POST[Type]==0)
	$sql="select favorable_info.*, platform_info.platform_name from favorable_info, platform_info where favorable_id in (select favorable_id from favorable_area where area_id='$_POST[Area]') and favorable_info.platform_id = platform_info.platform_id order by rec desc, participants_count desc";
else
	$sql="select favorable_info.*, platform_info.platform_name from favorable_info, platform_info where favorable_id in (select favorable_id from favorable_area where area_id='$_POST[Area]') and favorable_info.platform_id = platform_info.platform_id and favorable_info.class_id = '$_POST[Type]' order by rec desc, participants_count desc";
	
$result=mysql_query($sql,$con);
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
	$newData = array (); 
	foreach($row as $key => $value ) 
	{ 
		if($key=="favorable_id" || $key=="platform_name" || $key=="favorable_desc" ||
			$key=="url" || $key=="image_logo" || $key=="image_back" ||
			$key=="start_time" || $key=="end_time" || $key=='rec' || $key=='participants_count' || $key=="class_id")
			$newData[$key]=urlencode($value); 
	}
 
//	$count++;
//	if($count > $seq && $count < $seq+11)
//	{
			echo urldecode(json_encode($newData)); 
			echo "\n";
//	}

}

/*while($row2=mysql_fetch_array($result2,MYSQL_ASSOC))
	echo json_encode($row2);
iconv('utf8','gb2312',$row["name"]);
mb_convert_encoding($row["id"], 'gb2312', 'utf8');
*/

mysql_close($con);
?>
