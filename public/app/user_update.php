<?php
$con=mysql_connect("120.24.217.50","root","7758521");
if(!$con)
  die("Error: Could not connect...".mysql_error());

mysql_select_db("superdog");
mysql_query("set names utf8");

$id = $_GET['id'];
$userInfo = get_userInfo($id);
if (isset($_POST['username']) && $_POST['username'] != "") {
	$userInfo['username'] = $_POST['username'];
}
if (isset($_POST['password']) && $_POST['password'] != "") {
	$userInfo['password'] = $_POST['password'];
}

$sql = "UPDATE user SET `username` = '".$userInfo['username']."',`password` = '".$userInfo['password']."',";
mysql_query($sql);

function get_userInfo($id) {
	$sql = "SELECT * FROM `user` WHERE id = '".$id."'";
	$query = mysql_query($sql, $con);
	$result = mysql_fetch_assoc($query);
	return $result;
}

mysql_close($con);
?>
