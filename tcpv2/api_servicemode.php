<?php
//CMD Kiosk Check-in //////////////////////////////////////////////////
//{"cmd":"kioskcheckin","kioskid":1,"checkin":"2018-12-05 12:34:56","desc":""};

if($receive->cmd == 'service_mode'){

	if($receive->subcmd =='clearmoney'){		// Clear amount
		
		include("api_servicemode_clearmoney.php");
		
	}
	/// Now Request Service MODE
	
	
	$kiosk_servicemode = new service_mode();
	//Insert
	$kiosk_servicemode->id = NULL;
	$kiosk_servicemode->kioskid = $receive->kioskid;
  $kiosk_servicemode->status =1;
  if($kiosk_servicemode->load(" order by id desc limit 1")){
		
    if($kiosk_servicemode->lastupdate > time() - 15*60){
		//Get Balance
		
		$kiosk_balance = new kiosk_balance();
		$kiosk_balance->kiosk_id = $receive->kioskid;
		$kiosk_balance->load();
		$moneyBalance = $kiosk_balance->total_amount - $kiosk_balance->total_change;
      	$return = [
  			'result' => true,
  			'allow' => "OK",
			'totalmoney' => $moneyBalance
  		];
        $kiosk_servicemode->status =2;
        $kiosk_servicemode->comments ="staffAtkiosk";
        $kiosk_servicemode->allowtime = time();
        $kiosk_servicemode->lastupdate = time();
        $kiosk_servicemode->write();
      	echo json_encode($return);
        die();
    }else{
      $kiosk_servicemode->status =99;
      $kiosk_servicemode->comments = "Timeout";
      $kiosk_servicemode->lastupdate = time();
      $kiosk_servicemode->write();
    }
  }
die('ERROR');
}
