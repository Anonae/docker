<?php 
//CMD GetSlotDetail //////////////////////////////////////////////////
//{"cmd":"getslotdetail","kioskid":1};

if($receive->cmd == 'getslotdetail') :
	//Kiosk Code Reference 
	/*$useKOS = new kiosk(); $useKOS->loadmany(); 
	$useKOS->id = array_combine($useKOS->id,$useKOS->tcpcode);
	$findAllSlot = new slots();
	$findAllSlot->kioskid = $useMOD->id[$receive->kioskid]; //แปลง TCP Code เป็น ID ใน db redbull ของ advws
	*/
	$findAllSlot = new slot();
	$findAllSlot->kioskid = $receive->kioskid; 
	//$findAllSlot->status = 0; // 0 คือเปิดใช้งานอยู่, 1 คือปิดการใช้งาน
	
	//Use Another Table Data 
	$usePRD = new product(); $usePRD->loadmany(); 
	$usePRD->name = array_combine($usePRD->id,$usePRD->product_name);
	$usePRD->SKU = array_combine($usePRD->id,$usePRD->SKU);
	
	//หาข้อมูลเจอ
	$fetchSlots = array();
	if($findAllSlot->loadmany()) :
		for($x=0; $x < $findAllSlot->totalrecords; $x++):
			//สำหรับ ราคาขายหน้าตู้ พิเศษ
			$price = $findAllSlot->price[$x];
			if($findAllSlot->price_retail[$x]) { $price = $findAllSlot->price_retail[$x];}
			array_push($fetchSlots,[
				'id' => $findAllSlot->slotid[$x],
				'productid' => $findAllSlot->productid[$x], 
				'productname' => $usePRD->name[$findAllSlot->productid[$x]], 
				'productsku' => $usePRD->SKU[$findAllSlot->productid[$x]], 
				'price' => $price, 
				'capacity' => $findAllSlot->capacity[$x], 
				'remain' => $findAllSlot->remain[$x],
				'force_remain' => true,
				'status' => $findAllSlot->status[$x]
			]);
		endfor; 
		echo json_encode($fetchSlots,JSON_UNESCAPED_UNICODE);
		
	//หาข้อมูลไม่เจอ
	else : echo 'ERROR'; 
	endif; //if($findAllSlot->loadmany()) :
	
endif; //if($receive->cmd == 'getslotdetail') :