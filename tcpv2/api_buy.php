<?php // Script on PAGE
//CMD Buy //////////////////////////////////////////////////
//{"cmd":"buy","transaction":{"id":1,"kioskid":7,"slot_id":5,"coin1B":0,"coin5B":2,"coin10B":1,"note20B":0,"note50B":0,"note100B":0,"note500B":0,"coinCashOut":0,"coinCashTube":0,"refill":0,"date_time":1543997399},"slot":{"id":5,"productid":"1","productsku":"20325002","price":"20","status":0,"remain":19},"kioskid":7}

if($receive->cmd != 'buy') die(" should not happend");
if($receive->kioskid < 1) die(" should not happend");
// 1st TEST if already has transaction ID or not

	//Insert
	$insert_TRNBuy = new transaction_buy();
	//Kiosk
	$insert_TRNBuy->iot_id = $receive->transaction->id;
	$insert_TRNBuy->kiosk_id = $receive->kioskid;

	//Check Repeat ID
	if($insert_TRNBuy->load()){
		$return = ['result' => 'OK']; echo json_encode($return);
		exit();
	}
// Now , it's New record

	//Coin & Note
	$insert_TRNBuy->coin1B = $receive->transaction->coin1B;
	$insert_TRNBuy->coin2B = $receive->transaction->coin2B;
	$insert_TRNBuy->coin5B = $receive->transaction->coin5B;
	$insert_TRNBuy->coin10B = $receive->transaction->coin10B;
	$insert_TRNBuy->note20B = $receive->transaction->note20B;
	$insert_TRNBuy->note50B = $receive->transaction->note50B;
	$insert_TRNBuy->note100B = $receive->transaction->note100B;
	$insert_TRNBuy->note500B = $receive->transaction->note500B;
	$insert_TRNBuy->coinCashOut = $receive->transaction->change_amount;		// Change AMOUNT
	if($receive->tube){		// Kiosk has TUBE coin for change
			$cointube = new cointube();
			$cointube->kiosk_id = $receive->kioskid;
			$cointube->coin1b_1 = $receive->tube->tube1;
			$cointube->coin1b_2 = $receive->tube->tube2;
			$cointube->coin5b_1 = $receive->tube->tube3;
			$cointube->coin5b_2 = $receive->tube->tube4;
			$cointube->coin10b_1 = $receive->tube->tube5;
			$cointube->total_amount = $cointube->coin1b_1 + $cointube->coin1b_2 + $cointube->coin5b_1 * 5 + $cointube->coin5b_2 * 5 + $cointube->coin10b_1 *10;
			$cointube->lastupdate = time();
			$insert_TRNBuy->coinCashTube = $cointube->total_amount;
	}else{
		 $insert_TRNBuy->coinCashTube = $receive->transaction->coinCashTube;
	}
	$insert_TRNBuy->slot_id =$receive->transaction->slot_id;

	if(!$insert_TRNBuy->coinCashOut ) 	$insert_TRNBuy->coinCashOut  =0;
	if(!$insert_TRNBuy->coinCashTube) $insert_TRNBuy->coinCashTube = 0;
	//DateTime


	if($receive->slot->id > 0){		// //Slot & Product Comming ปกติ
		$insert_TRNBuy->slot_id = $receive->slot->id;
		$insert_TRNBuy->prd_id = $receive->slot->productid;
		$insert_TRNBuy->prd_sku = $receive->slot->productsku;
		$insert_TRNBuy->prd_price = $receive->slot->price;
		$insert_TRNBuy->prd_remain = $receive->slot->remain;
		$insert_TRNBuy->status = $receive->slot->status;
		$updateSlot = new slot();
		$updateSlot->kioskid = $receive->kioskid;
		$updateSlot->slotid = $receive->slot->id;
		if($updateSlot->load()) {
			 $updateSlot->remain =  $receive->slot->remain;	// Use Kiosk Remain ?
			 $updateSlot->time_update = time();
			 $updateSlotOK = $updateSlot->write();
			 //Update Slot Log
			if($updateSlotOK){
				$log = new slot_log();
				$log->slot_refid = $updateSlot->id;
				$log->kiosk_id = $receive->kioskid;
				$log->slot_id = $receive->slot->id;
				$log->prd_id = $receive->slot->productid;
				$log->capacity = $updateSlot->capacity;
				$log->remain = $receive->slot->remain;
				$log->action = 'buy';
				$log->quantity = 1;
				$log->status = 0;
				$log->bywho = 'Online-Sell on Kiosk '.$receive->kioskid;
				$log->lastupdate = time();
				$log->write();
			}
		}
	} else {		// ส่งตามมาทีหลัง
		if($insert_TRNBuy->slot_id > 0 ){			// Slot information comming, maybe late comming..
			$updateSlot = new slot();
			$updateSlot->kioskid = $receive->kioskid;
			$updateSlot->slotid = $receive->slot->id;
			//$updateSlot->status = $receive->slot->status;
			if($updateSlot->load()) {
				$insert_TRNBuy->prd_id = $updateSlot->productid;
				$insert_TRNBuy->prd_sku = $updateSlot->productsku;
				$insert_TRNBuy->prd_price = $updateSlot->price;
				$insert_TRNBuy->prd_remain = $updateSlot->remain - 1;
				$updateSlot->remain = $updateSlot->remain  - 1; // Calculate Remain , not use Kiosk Remain
				$updateSlot->time_update = time();
				$updateSlotOK = $updateSlot->write();
				//Update Slot Log
				if($updateSlotOK){
					$log = new slot_log();
					$log->slot_refid = $updateSlot->id;
					$log->kiosk_id = $receive->kioskid;
					$log->slot_id = $receive->slot->id;
					$log->prd_id = $receive->slot->productid;
					$log->capacity = $updateSlot->capacity;
					$log->remain = $receive->slot->remain;
					$log->action = 'buy';
					$log->quantity = 1;
					$log->status = 0;
					$log->bywho = 'Offline-Sell on Kiosk '.$receive->kioskid;
					$log->lastupdate = time();
					$log->write();
				}
			}
		}
	}

				// Case no activity user, write off
			if(!$insert_TRNBuy->slot_id ) $insert_TRNBuy->slot_id = 0;
			if(!$insert_TRNBuy->prd_id) $insert_TRNBuy->prd_id = 0;
			if(!$insert_TRNBuy->prd_sku ) $insert_TRNBuy->prd_sku = 0;
			if(!$insert_TRNBuy->prd_price) $insert_TRNBuy->prd_price = 0;
			if(!$insert_TRNBuy->prd_remain) $insert_TRNBuy->prd_remain = 0;
			if(!$insert_TRNBuy->status )  $insert_TRNBuy->status =0;
		


	$insert_TRNBuy->time_create = $receive->transaction->date_time;
	$insert_TRNBuy->time_update = $receive->transaction->lastupdate;
	if(!$insert_TRNBuy->time_create) $insert_TRNBuy->time_create = time();
	if(!$insert_TRNBuy->time_update) $insert_TRNBuy->time_update =time();
	$insertedID = $insert_TRNBuy->write();

	//Return Massage
	if($insertedID) {
		if($cointube->lastupdate){
			$cointube->ref_buyid = $insertedID;
			$cointube->write();
		}
		// now update balance
		$balance = new kiosk_balance();
		$balance->kiosk_id =  $receive->kioskid;
		$balance->load();
		$balance->lastupdate = time();
		$balance->coin1b += $receive->transaction->coin1B;
		$balance->coin2b += $receive->transaction->coin2B;
		$balance->coin5b += $receive->transaction->coin5B;
		$balance->coin10b += $receive->transaction->coin10B;
		$balance->note20b += $receive->transaction->note20B;
		$balance->note50b += $receive->transaction->note50B;
		$balance->note100b += $receive->transaction->note100B;
		$balance->note500b += $receive->transaction->note500B;
		$balance->total_amount	 +=  $receive->transaction->totalamount;
		$balance->total_change += $receive->transaction->change_amount ;
		$balance->write();
	//	$balance->note1000b += $receive->transaction->coin2B;


		$return = [
			'result' => 'OK'
		];
		echo json_encode($return);

	}else{
		die('ERROR');
	}

