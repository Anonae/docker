<?php
//CMD Kiosk Check-in //////////////////////////////////////////////////
//{"cmd":"kioskcheckin","kioskid":1,"checkin":"2018-12-05 12:34:56","desc":""};

if($receive->cmd != 'todo') die('should not happen');

$kiosk_todolist = new kiosk_todolist();
$kiosk_todolist->kioskid = $receive->kioskid;
$kiosk_todolist->id = $receive->refid;


if($kiosk_todolist->load()){
	$kiosk_todolist->description = json_encode($receive->result);
	if(!$kiosk_todolist->description){
		$kiosk_todolist->description =  $receive->result;
	}
	$kiosk_todolist->status = 3;
	$kiosk_todolist->lastupdate = time();
	
	if($kiosk_todolist->write()){
		echo "OK";
	}else{
		echo "ERROR ";
		echo $kiosk_todolist->sql;
	}

}
