<?php
$con=mysql_connect("120.24.217.50","root","7758521");
if(!$con)
  die("Error: Could not connect...".mysql_error());

mysql_select_db("superdog");
mysql_query("set names utf8");

//echo brief introduction and download url of the ceitain platform
$platformId = 402; // change it! $_GET['****']
$sql="UPDATE platform_info SET skim_count = skim_count + 1 WHERE id_code =".$specId.";";
$result = mysql_query($sql, $con);
$sql="select details,download from platform_info where platform_id = ".$platformId.";";
$query = mysql_query($sql, $con);
$result = mysql_fetch_assoc($query);

//var_dump($result);
echo urldecode(json_encode($result));
mysql_close($con);
?>
