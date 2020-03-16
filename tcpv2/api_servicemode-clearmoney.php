<?php
		$kiosk_balance = new kiosk_balance();
		$kiosk_balance->kiosk_id = $receive->kioskid;
		if(!$kiosk_balance->load()){
			$return = [
				'result' => true,
				'response' => "Error"
	  		];
			echo json_encode($return);
			die();
		}

		$reset = new kiosk_balance_reset();
				
		$reset->kiosk_id = $kiosk_balance->kiosk_id;
		$reset->coin1b = $kiosk_balance->coin1b;
		$reset->coin2b = $kiosk_balance->coin2b;
		$reset->coin5b = $kiosk_balance->coin5b;
		$reset->coin10b = $kiosk_balance->coin10b;
		$reset->note20b = $kiosk_balance->note20b;	
		$reset->note50b = $kiosk_balance->note50b;	
		$reset->note100b = $kiosk_balance->note100b;	
		$reset->note500b = $kiosk_balance->note500b;														
		$reset->note1000b = $kiosk_balance->note1000b;	
		$reset->total_amount = $kiosk_balance->total_amount;																		
		$reset->total_change = $kiosk_balance->total_change;
		$reset->lastupdate = $kiosk_balance->lastupdate;		
		$reset->description = "Reset by staff at KIOSK";																						
		$reset->resetdate = time();
		$reset->write();
		
		$kiosk_balance->lastupdate =time();
		$kiosk_balance->coin1b=0;
		$kiosk_balance->coin2b=0;
		$kiosk_balance->coin5b=0;
		$kiosk_balance->coin10b=0;
		$kiosk_balance->note20b=0;	
		$kiosk_balance->note50b=0;	
		$kiosk_balance->note100b=0;	
		$kiosk_balance->note500b=0;														
		$kiosk_balance->note1000b=0;	
		$kiosk_balance->total_amount=0;																		
		$kiosk_balance->total_change=0;
		$kiosk_balance->description="last reset ".date("D/M/Y hh:ii:ss");		
		$kiosk_balance->write();
		$return = [
				'result' => true,
				'response' => "0"
	  	];
		echo json_encode($return);		
		die();