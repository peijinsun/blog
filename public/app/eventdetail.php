<?php
$con=mysql_connect("localhost","root","7758521");
if(!$con)
  die("Error: Could not connect...".mysql_error());

mysql_select_db("superdog");
mysql_query("set names utf8");
//$sql="select * from recommend where id='1'";
$sql="select * from favorable_info where id='$_POST[Id]'";
$result=mysql_query($sql,$con);
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
	$newData = array (); 
	foreach($row as $key => $value ) 
	{ 
		if($key=="event_details" || $key=="dog_comment")
			$newData[$key]=urlencode($value); 
	}
	echo urldecode(json_encode($newData)); 
	echo "\n";
}

mysql_close($con);
?>
