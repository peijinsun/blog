<?php
$con=mysql_connect("localhost","root","7758521");
if(!$con)
  die("Error: Could not connect...".mysql_error());

mysql_select_db("superdog");
mysql_query("set names utf8");

$sql="select platform_id, platform_name, platform_desc, web_url, download_url, image_logo, image_back, rec from platform_info where platform_id in (select platform_id from platform_area where area_id='$_POST[Area]') and class_id='$_POST[Type]' order by rec desc";

$result=mysql_query($sql,$con);
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
	$newData = array (); 
	foreach($row as $key => $value ) 
	{ 
		if($key=="platform_id" || $key=="platform_name" || $key=="platform_desc" ||
			$key=="web_url" || $key=="image_logo" || $key=="rec" || $key=="image_back" || $key=="download_url")
			$newData[$key]=urlencode($value); 
	}
	echo urldecode(json_encode($newData)); 
	echo "\n";
}

mysql_close($con);
?>
