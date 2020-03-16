<?php
session_start();
//include ("../main_include.php");
if(!$_SESSION['username']){ 
	ROOT::redirect("login.php"); 
	exit();
} 

//Global Variable
$siteTitle = 'TCP Monitor System';

?> 

