<?php
$con=mysql_connect("120.24.217.50","root","7758521");
if(!$con)
  die("Error: Could not connect...".mysql_error());

mysql_select_db("superdog");
mysql_query("set names utf8");

$userid = 100001;
$sql="SELECT Date(signin) AS last_sign FROM user WHERE id = ".$userid;
$query = mysql_query($sql, $con);
$result = mysql_fetch_assoc($query);
$now = date('Y-m-d');
//var_dump($result);
if ($now > $result['last_sign']) {
	$points = 1;
	$sql = "UPDATE user SET signin = '".$now."', point = point + '".$points."' WHERE id = ".$userid;
	$query = mysql_query($sql, $con);
	echo "SIGNED";
}
else {
	echo "UNSIGNED";
}
echo urldecode(json_encode($result));
mysql_close($con);
?>
