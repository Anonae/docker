<?php
if($text > 1000) {
	
	session_start();
	
	if($lineuser->status !=1 ){ 
		if( $lineuser->status == 0 ){ die('คุณได้รับการอนุมัติแล้ว แต่ถูก ระงับสิทธิ จาก ผู้ดูแลระบบ'); }
		elseif( $lineuser->status == 98 ){ die('คุณลงทะเบียนแล้ว แต่ไม่ได้รับการอนุมัติ จาก ผู้ดูแลระบบ'); }
		elseif( $lineuser->status == 99 ){ die('คุณลงทะเบียนแล้ว กำลังรอการอนุมัติ จาก ผู้ดูแลระบบ'); }
		else{ die('Error Code : Status Un-Defined'); }
	}
	
	$loginsession = new loginsession();
	$loginsession->mappagenumber = $text;
	
	if($loginsession->load()){
		// echo "LOADED";
		if($loginsession->lastupdate > time()-60*5 ){   // with in  5
			$loginsession->allowuserid = $lineuser->id;
			$loginsession->lastupdate = time();
			$loginsession->write();
			// echo "allow user $lineuser->UserId to log-in";
			// echo $loginsession->sql;
			// $bot->reply("loged in");
			die("เข้าสู่ระบบเรียบร้อย");
		}
	}
	
}else{
	echo "การเชื่อมต่อไม่เสถียร กรุณาลองใหม่อีกครั้ง";
}
