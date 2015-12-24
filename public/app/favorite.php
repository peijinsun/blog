<?php
$con=mysql_connect("120.24.217.50","root","7758521");
if(!$con)
  die("Error: Could not connect...".mysql_error());

mysql_select_db("superdog");
mysql_query("set names utf8");

$specId = $_POST['specId'];
$userId = $_POST['userId'];
$action = $_POST['action']; // 0->add favorite, 1->undo favorate

if ($action == 0) {
	if (!isFav($specId, $userId, $con)) {
		doFav($specId, $userId, $con);
	    echo "3";	
	}
	else{ 
	    undoFav($specId, $userId, $con);
		echo "4";		 
	}
}
else {
	if(!isFav($specId, $userId, $con))
		echo "0";
	else
		echo "1";
}

//check if the user add it or not
function isFav($specId, $userId, $con) {
	$sql = "select id from user_favProducts where user_id = '".$userId."' and spec_id = '".$specId."'";
	$query = mysql_query($sql, $con);
	if ($result = mysql_fetch_assoc($query))
		return true;
	return false;
}
//add the special product to user's favorite list
function doFav($specId, $userId, $con) {
	$sql = "insert into user_favProducts (user_id, spec_id) values (".$userId.", ".$specId.")";
	mysql_query($sql, $con);
	addFavCounts($specId, $con);
}
//increse the product's fav_counts by 1
function addFavCounts($specId, $con) {
	$sql = "update specialProduct set want_counts = want_counts+1 where id_code = '".$specId."'";
	mysql_query($sql, $con);
}

function minusFavCounts($specId, $con){
	$sql = "update specialProduct set want_counts = want_counts-1 where id_code = '".$specId."'";
	mysql_query($sql, $con);
}

//delete the product from user's favorite list
function undoFav($specId, $userId, $con) {
	$sql = "delete from user_favProducts where user_id = '".$userId."' and spec_id = '".$specId."'";
	mysql_query($sql, $con);
	minusFavCounts($specId, $con);
}

mysql_close($con);
?>
