<?php
$con = mysql_connect("120.24.217.50","root","7758521");
if(!$con)
	die("Error: could not connect ...".mysql_error());

mysql_select_db("superdog");
mysql_query("set names utf8");

$userId = $_POST['userId'];
$sql = "select spec_id from user_favProducts where user_id = ".$userId.";";

$result = mysql_query($sql,$con);
$favs = array();
$index = 0;
while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
	$favs[$index++] = $row['spec_id'];
}

$resultArr = array();
$resultArr['favs'] = $favs;
echo urldecode(json_encode($resultArr));
mysql_close($con);
?>
