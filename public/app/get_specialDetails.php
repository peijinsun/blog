<?php
$con=mysql_connect("120.24.217.50","root","7758521");
if(!$con)
  die("Error: Could not connect...".mysql_error());

mysql_select_db("superdog");
mysql_query("set names utf8");

$specId = $_POST['specId'];
//$specId = '20151003018';
$sql="UPDATE specialProduct SET skim_counts = skim_counts + 1 WHERE id_code =".$specId.";";
$result = mysql_query($sql, $con);

$sql="select details from specialProduct where specialProduct.id_code = ".$specId.";";
$result = mysql_query($sql, $con);
$resultArr = array();
$row = mysql_fetch_array($result, MYSQL_ASSOC); // return detail information of the product including desc,details,url,curren_price,original_price,start,end,fav_counts
$resultArr = $row;

$sql = "select img from specialImages where spec_id_code = ".$specId.";";
$result=mysql_query($sql,$con);
$images = array();
$index = 0;
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
	$images[$index++] = $row['img'];
}
$resultArr['images'] = $images; // $images is an array stores the names of the product's images
//var_dump($resultArr);
echo urldecode(json_encode($resultArr));
mysql_close($con);
?>
