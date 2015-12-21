<?php
$con = mysql_connect("120.24.217.50","root","7758521");
if(!$con)
	die("Error: could not connect ...".mysql_error());

mysql_select_db("superdog");
mysql_query("set names utf8");

$userId = $_POST['userId'];



$sql = "SELECT specialProduct.id_code, title, url, img, current_price, original_price, want_counts, skim_counts, start_time, end_time, source
 FROM specialProduct, user_favProducts WHERE specialProduct.id_code = user_favProducts.spec_id and user_favProducts.user_id= ".$userId.";";

$result = mysql_query($sql, $con);



while($row=mysql_fetch_array($result, MYSQL_ASSOC))
{
  	echo urldecode(json_encode($row));
  	echo "\n";
}

mysql_close($con);

?>
