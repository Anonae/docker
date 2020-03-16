<?php
//CMD Kiosk Check-in //////////////////////////////////////////////////
//{"cmd":"kioskcheckin","kioskid":1,"checkin":"2018-12-05 12:34:56","desc":""};

if($receive->cmd == 'kioskcheckin') :
	$insertKioskCheckin = new kiosk_checkin();
	//Insert
	$insertKioskCheckin->id = NULL;
	$insertKioskCheckin->kiosk_id = $receive->kioskid;
		
		$insertKioskCheckin->time_update = time(date('Y-m-d H:i:s')); //ใช้เวลาปัจจุบันของ Server
		//$insertKioskCheckin->time_update = $receive->checkin; //ใช้เวลาที่ Kiosk ส่งมา
		
	$insertKioskCheckin->description = $receive->desc;
	//$insertKioskCheckin->description = '@'.date('Y-m-d(H:i:s)').'/ '.$receive->desc;
	
		//Temperature
		$insertKioskCheckin->temp_com1 = $receive->temperature->comtemp1;
		$insertKioskCheckin->temp_com2 = $receive->temperature->comtemp2;
		$insertKioskCheckin->temp_com3 = $receive->temperature->comtemp3;
		$insertKioskCheckin->temp_fan1 = $receive->temperature->fantemp1;
		$insertKioskCheckin->temp_fan2 = $receive->temperature->fantemp2;
		$insertKioskCheckin->temp_fan3 = $receive->temperature->fantemp3;
		/*$insertKioskCheckin->temp_fan1 = 7;
		$insertKioskCheckin->temp_fan2 = 3;
		$insertKioskCheckin->temp_fan3 = 5;
		$insertKioskCheckin->temp_com1 = 15;
		$insertKioskCheckin->temp_com2 = 14;
		$insertKioskCheckin->temp_com3 = 13;*/
	
	$insertedID = $insertKioskCheckin->write();
	
	//Return Massage
	if($insertedID) :
		// check todo list
		$findTDL = new kiosk_todolist();
		$findTDL->kioskid = $receive->kioskid;
		$findTDL->status = 1;
		$findTDL->loadmany();

		for($x=0; $x<$findTDL->totalrecords; $x++){
			
			$loadTDL = new kiosk_todolist();
			$loadTDL->id = $findTDL->id[$x];
			
			if($loadTDL->load()){
				$return = [
					'result' => true,
					'cmd' => $loadTDL->cmd,
					'refid'=>$loadTDL->id
				];
				$loadTDL->lastupdate = time();
				$loadTDL->status = 2;
				$loadTDL->write();
				echo json_encode($return);
			}else{
				$return = [
					'result' => true,
					'cmd' => 'open'
				];
				echo json_encode($return);
			} //end if
		} //end for

	else : die('ERROR');
	endif; //if($inserted) :

endif; //if($receive->cmd == 'kioskcheckin') :
