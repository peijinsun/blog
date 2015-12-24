<?php
$fileName = date('Y-m-d_H:i:s').'.txt';

$file = fopen($fileName, 'w') or die ('could not create file: '.$fileName);
foreach($_POST as $key => $value){
	$reportLine = $key." = ".$value."\n";
		fwrite($file, $reportLine) or die ('could not write to report file '. $reportLine);
}

fclose($file);

?>
