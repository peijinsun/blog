<?php
require("db_config.php");

$choiceId = $_POST['choiceid'];
//$choiceId = '20151003018';
$sql="UPDATE goods_info SET skim_counts = skim_counts + 1 WHERE code ='".$choiceId."';";
$result = mysql_query($sql, $con);

$sql="select description from goods_info where goods_info.code = '".$choiceId."';";
$result = mysql_query($sql, $con);
$resultArr = array();
$row = mysql_fetch_array($result, MYSQL_ASSOC); // return detail information of the product including details
$resultArr = $row;

$sql = "select image_name from goods_images where goods_code = '".$choiceId."';";
$result=mysql_query($sql,$con);
$images = array();
$index = 0;
while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
	$images[$index++] = $row['image_name'];
}
$resultArr['images'] = $images; // $images is an array stores the names of the product's images

echo urldecode(json_encode($resultArr));
mysql_close($con);
?>
