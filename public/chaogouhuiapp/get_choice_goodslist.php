<?php
require("db_config.php");

$class = $_POST['class'];
$banner = $_POST['banner'];

if($banner == 0){
  $sql = "SELECT goods_info.code, title, url, image, current_price, original_price, want_counts, start_time, end_time, source FROM goods_info WHERE isbanner = 0 ";
  if($class == "最热"){
    $sql .= "order by want_counts desc limit 30;";
  }
  else if($class == "最新"){
    $sql .= "order by start_time desc limit 30;";
  }
  else{
    $sql .= "and label LIKE '%".$class."%';";
  }
  $result=mysql_query($sql,$con);
  while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
    echo urldecode(json_encode($row));
  	echo "\n";
  }
}

else if($banner == 1){
  $sql="SELECT goods_info.`code`, title, url, image, current_price, original_price, want_counts, start_time, end_time, source FROM goods_info WHERE isbanner = 1;";
  $result=mysql_query($sql,$con);
  while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
    echo urldecode(json_encode($row));
    echo "\n";
  }
}

mysql_close($con);
?>
