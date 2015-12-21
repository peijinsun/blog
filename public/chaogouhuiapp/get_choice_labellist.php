<?php
require("db_config.php");

$sql="select label_id, label_name from choice_label ORDER BY priority;";
$result=mysql_query($sql,$con);
while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
  echo urldecode(json_encode($row));
  echo "\n";
} 
mysql_close($con);
?>
