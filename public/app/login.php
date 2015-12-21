<?php
$con=mysql_connect("localhost","root","7758521");
if(!$con)
  die("Error: Could not connect...".mysql_error());

mysql_select_db("superdog");
mysql_query("set names utf8");

$action = $_POST['action']; // action: 0 -> sign up, 1 -> login via username or phone, 2 -> login via third-party
if ($action == 0) {
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM `user` WHERE phone = '".$phone."'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_assoc($result);
	if (!$row) {
		$sql = "INSERT INTO `user` (phone, password) VALUES (".$phone.",".$password.")";
		mysql_query($sql);
		echo urldecode(json_encode(login_phone($phone, $password, $con)));
	}
	else
		echo "-1";
}
else if ($action == 1) {
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$user = login_phone($phone, $password, $con);
	//var_dump($user);
	echo urldecode(json_encode($user));
}
else {
	$uid = $_POST['uid'];
	$app = $_POST['app']; // 0 -> qq, 1 -> weibo, 2 -> weixin
	if (login_other($uid, $app, $con) == -1) {
		new_user($uid, $app, $con);
	}
	echo urldecode(json_encode(login_other($uid, $app, $con)));
}

function login_phone($phone, $password, $con) {
	//echo $phone."+".$password."\n";
	$sql = "SELECT * FROM user WHERE phone = '".$phone."'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_assoc($result);
	$psw = $row['password'];
	if ($psw == $password)
		return $row;
	return -1;
}
function login_other($uid, $app, $con) {
	$str = set_str($app);
	$sql = "SELECT * FROM user WHERE ".$str." = '".$uid."'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_assoc($result);
	return $row?$row:-1;
}

function new_user($uid, $app, $con) {
	$str = set_str($app);
	$sql = "INSERT INTO `user` (".$str.") VALUES ('".$uid."')";
	mysql_query($sql, $con);
}

function set_str($app) {
	$str = "";
	switch ($app) {
		case 0:
			$str = "qquid";
			break;
		case 1:
			$str = "weibouid";
			break;
		case 2:
			$str = "weixinuid";
			break;
	}
	return $str;
}
#var_dump($resultArr);
#echo urldecode(json_encode($resultArr));
mysql_close($con);
?>
