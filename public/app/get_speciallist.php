<?php

$con=mysql_connect("localhost","root","7758521");
if(!$con)
  die("Error: Could not connect...".mysql_error());

mysql_select_db("superdog");
mysql_query("set names utf8");
$classid = $_POST['Class'];
$banner = $_POST['Banner'];
if($banner == 0){
  $sql = "SELECT specialProduct.id_code, title, url, img, current_price, original_price, want_counts, skim_counts, start_time, end_time, source FROM specialProduct, special_class_product WHERE banner = 0 and specialProduct.id_code = special_class_product.special_id ";
  if ($classid == 1) 
    $sql .= "order by want_counts desc limit 30";
  else if ($classid == 2)
    $sql .= "order by start_time desc limit 30";
  else
    $sql .= "and special_class_product.special_class_id = ".$classid.";";

	$result=mysql_query($sql,$con);
  //var_dump($result);
	$index = 0;
	while($row=mysql_fetch_array($result,MYSQL_ASSOC))
	{
  		echo urldecode(json_encode($row));
  		echo "\n";
	}

}
else if($banner ==1){
	$sql="SELECT specialProduct.id_code, title, url, img, current_price, original_price, want_counts, skim_counts, start_time, end_time, source FROM specialProduct WHERE banner = 1;";
	$result=mysql_query($sql,$con);
    $index = 0;
    while($row=mysql_fetch_array($result,MYSQL_ASSOC))
    {
        echo urldecode(json_encode($row));
        echo "\n";
    }

}

mysql_close($con);
?>
