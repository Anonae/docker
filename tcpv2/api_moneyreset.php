<?php 
//CMD Kiosk Reset //////////////////////////////////////////////////
//{"cmd":"moneyreset","kioskid":1,"reset":"2018-12-05 12:34:56","desc":""};

if($receive->cmd == 'moneyreset') :
	$insertKioskCheckin = new kiosk_reset();
	//Insert
	$insertKioskCheckin->id = NULL;
	$insertKioskCheckin->kiosk_id = $receive->kioskid;
		//ใช้เวลาปัจจุบันของ Server
		$insertKioskCheckin->time_update = time(date('Y-m-d H:i:s')); 
		//ใช้เวลาที่ Kiosk ส่งมา
		//$insertKioskCheckin->lastupdate = $receive->reset;
	$insertKioskCheckin->description = $receive->desc;
	$insertedID = $insertKioskCheckin->write();
	
	//Return Massage
	if($insertedID) :
		$return = array();
		array_push($return,[
			'result' => true,
			'cmd' => 'open'
		]);
		echo json_encode($return);
		
	else : die('ERROR'); 
	endif; //if($inserted) :
	
endif; //if($receive->cmd == 'moneyreset') :