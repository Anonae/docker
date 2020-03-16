<?php
session_start();
ob_start(); //เอาไว้ ล้าง บรรทัดเปล่า 3 บรรทัดจาก file main_include.php
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");
ob_get_clean();

//Get Data
$cmd = $_GET["cmd"];
$staffid = $_GET["staffid"];
$permission = $_GET["permisid"];

$updateStaff = new lineusers();
$updateStaff->id = $staffid;

//DB Command
if($cmd == "accept"){
	if($updateStaff->load()){
		$updateStaff->per_id = $permission;
		$updateStaff->route_id = 0;
		$updateStaff->status = 1;
		$updateStaff->write();
		echo "OK";
	} else { echo "ERROR, can't update db"; }
}
if($cmd == "denied"){
	if($updateStaff->load()){
		$updateStaff->per_id = 0;
		$updateStaff->route_id = 0;
		$updateStaff->status = 98;
		$updateStaff->write();
		echo "OK";
	} else { echo "ERROR, can't update db"; }
}
