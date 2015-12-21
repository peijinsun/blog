<?php
$con=mysql_connect("localhost","root","7758521");
if(!$con)
  die("Error: Could not connect...".mysql_error());
mysql_select_db("superdog");
mysql_query("set names utf8");
$sql="select class_id, class_name from specialClassify ORDER BY priority;";
$result=mysql_query($sql,$con);
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
  $newData = array ();
  foreach($row as $key => $value )
  {
    $newData[$key]=urlencode($value);
  }
  echo urldecode(json_encode($newData));
  echo "\n";
} 
mysql_close($con);
?>
