<?php  
	$filename =  $_POST["filename"];  
	header('Content-Type: application/vnd.ms-excel');  
	header('Content-disposition: attachment; filename='.$filename.'.xls');  
	echo $_POST["data"];
?> 