<?php
$mysql_server='localhost'; 
$mysql_username='root'; 
$mysql_password='7758521'; 
$mysql_database='life';
$con_host=mysql_connect($mysql_server, $mysql_username, $mysql_password);
if(!$con_host)
  die("Error: Could not connect...".mysql_error());
mysql_select_db($mysql_database);
mysql_query("set names utf8");
?>
