<?php
//$from_line = file_get_contents('php://input');
include("../../main_include.php");
require_once ('./linebot.php');

echo "Test"; 
$bot = new Linebot();
$text =$_POST['text'];// $bot->getMessageText();
$result =$bot->getUserProfile($_POST['userId']);

$line_profile = json_decode($result,true);
$line_display = $line_profile["displayName"];
$line_picture = $line_profile["pictureUrl"];


if(true){ //$from_line){		// KEEP IN DB
    $linechat = new linechats();
    $linechat->rawmsg       = $from_line;
    $linechat->lastupdate   = time();
    $linechat->userId       = $_POST['userId'];
   // $linechat->userId       = "U9db96fa969ea1a9da8f0350a82a5cf77";
    $linechat->write();

    $lineuser = new lineusers();
    $lineuser->UserId   = $_POST['userId'];
	$foundUser = $lineuser->load();
    if(!$foundUser){
		//echo "LINE USER not found";
		$lineuser->name       = $line_display;
		$lineuser->picture    = $line_picture;
		$lineuser->lastupdate = time();
		$lineuser->route_id = 0;
		$lineuser->groupid = 0;
		$lineuser->per_id = 0;
		$lineuser->lastmessage = $text;
		$lineuser->status   = 99;  // ครั้งแรก
		$lineuser->write();
		// reply
		echo "ลงทะเบียนเรียบร้อย กรุณาแจ้ง ผู้ดูแลระบบ รอรับการอนุมัติ";
		// $bot->reply("คุณได้เป็นสมาชิกแล้ว");
		die();
	}
    	//	echo "LINE USER  found";
    
    // ถ้าเป็นสมาชิกแล้ว แต่ไม่เคยมีรูปภาพให้ Update ข้อมูลรูปภาพ
    if(!$lineuser->picture){
       $lineuser->picture    = $line_picture;
       $lineuser->write();
    //  die();
    }

    // ถ้าเป็นสมาชิกแล้ว แต่ไม่เคยมีชื่อ Update ข้อมูลชื่อ
    if(!$lineuser->name) {
       $lineuser->name       = $line_display;
       $lineuser->write();
    //   die();
    }     
     
    if($line_display != $lineuser->name){
       $lineuser->name       = $line_display;
       $lineuser->write();
    //   die();
    }
    
    if($line_picture != $lineuser->picture) {
       $lineuser->picture    = $line_picture;
       $lineuser->write();
     //  die();
    }
    $lineuser->lastmessage = $text;

}

if($_POST['action']=='login'){
	require_once ('./line_login.php');
	die();
}
//  แสดงวันที่และเวลาล่าสุด
$today      = date("Y-m-d");  // วันที่ปัจจุบัน ที่ขอดูข้อมูล
$time_today = date("h:i:sa"); // เวลาปัจจุบัน ที่ขอดูข้อมูล

/// $text = "3653";  // test
//echo $text ;

function get_kiosk($kioskid){

    $kiosk = new kiosk();
    $kiosk->id = trim($kioskid);
    if($kiosk->load()){
        // แสดงข้อมูลรุ่นของตู้
        //echo "<br>". $kiosk->name;


         return $kiosk;
    }else{
      //echo $kiosk->sql;
    }
    return false;
}

function get_kiosk_model($kioskid){

        $kiosk_model = new kiosk_model();
        $kiosk_model->id = $kioskid;

        if($kiosk_model->load()) return $kiosk_model;
        else return false;
}


function check_main_command($textcheck){

    global $lineuser,$bot;
    $array = array('เช็คตารางงาน','ข้อมูลตู้น้ำหยอดเหรียญ','เก็บเงินในตู้กดน้ำ','เช็คสินค้าในตู้กดน้ำหยอดเหรียญ','ซ่อมบำรุง');
    $reply = array("ต้องการ เช็คตารางงาน \n คุณ $lineuser->name \n วันนี้คุณมีงานเก็บเงินเส้นทาง ชลบุรี (วิ่งไปกลับกรุงเทพฯ - ชลบุรี) \n\n หากมีข้อสงสัย กรุณาติดต่อหัวหน้างานของคุณ ",
        "ต้องการดูข้อมูลตู้น้ำหยอดเหรียญ \n กรุณากรอกรหัสตู้ เช่น 123456",
        "ต้องการเก็บเงินในตู้กดน้ำ \n กรุณากรอกหมายเลขรหัสตู้ เช่น 123456",
        "ต้องการเช็คสินค้าในตู้กดน้ำ \n กรุณากรอกรหัสตู้ เช่น 123456",
        "ต้องการซ่อมบำรุงตู้กดน้ำ \n กรุณากรอกรหัสตู้ เช่น 123456",
        
       );
     /* "คุณต้องการให้ช่วยเหลือด้านใด เช่น ตู้น้ำไม่เย็น หรือ แบงค์ติด" */
       /* ต้องการช่วยเหลือด้านใด ปล่อยสินค้า หรือ Restart เครื่อง \n กรุณาพิมพ์ข้อความ เช่น ปล่อยสินค้า หรือ Restart */

    if(in_array($textcheck ,$array,TRUE)){
       $lineuser->lastcommand = $textcheck;
       $lineuser->write();

       $id = array_search($textcheck , $array);  // หา Key ใน array
	   echo $reply[$id];
//       $bot->reply($reply[$id]);        // Bot ตอบกลับ
       die();
    }
}

//echo "No main command";

//echo "No Log-in";

if($_POST['action']=='servicemode'){ // if($lineuser->lastcommand =='ซ่อมบำรุง'){
    global $lineuser,$bot,$text;
	  $kioskid = $_POST['kioskid'];
      if($text > 0 ){
            $kioskobj =  get_kiosk($text);  // get kiosk id
            if($kioskobj) {
              $allproduct = new slot();
              $allproduct->kioskid = $kioskobj->id;
              $allproduct->status =0;

              $allproduct->loadmany();
              echo "จำนวนช่อง = $allproduct->totalitems";
              $msg_stock='';
              for($x = 0; $x < $allproduct->totalitems; $x++){
                /*
                 if($allproduct->productid[$x] != $eachoproduct->id){
                 $eachoproduct = new product();
                 $eachoproduct->id = $allproduct->productid[$x];
                 $eachoproduct->load();
                  }
                 $msg_stock .= "\n#".$allproduct->slotid[$x].":$eachoproduct->product_name เติม".$allproduct->remain[$x]."/".$allproduct->capacity[$x];
                 */
                 $msg_stock .= "\n#".$allproduct->slotid[$x]." amt:".$allproduct->remain[$x]."/".$allproduct->capacity[$x];
                 $remain = $allproduct->capacity[$x] - $allproduct->remain[$x];
                 if($remain > 0 ){
                   $msg_stock .= "  เติม[$remain]";
                 }
              }

              echo $msg_stock;


              $replymsg = "ID: $kioskobj->id \n"
                      . "TCP Code : $kioskobj->tcpcode \n"
                      . "Name : $kioskobj->name \n"

                      . "Description : $kioskobj->description \n\n"
                      . "ขณะนี้กำลังเข้าสู่โหมดซ่อมบำรุงตู้ กรุณาไปที่หน้าจอของตู้ที่ทำรายการภายใน 15 นาที ";

              // Input To // // DB
              $service = new service_mode();
              $service->kioskid = $kioskobj->id;
              $service->staffid = $lineuser->id;
              $service->load(" and status =1 ");
              if($service->id > 0 && $service->lastupdate > (time() - 15*60) ){    // Already Asigned
                $replymsg = "เปิดระบบซ่อมบำรุงแล้ว \n กรุณาทำรายการภายใน 15 นาที \n\n";
              }else{
                $service->id = null;
                $service->requesttime = time();
                $service->allowtime = time();
                $service->lastupdate = time();
                $service->status =1;
                $service->write();
              }
              
              $replymsg .=$msg_stock;
              $bot->reply($replymsg);

            }else{
                $lineuser->lastcommand = '';
                $lineuser->write();
                echo "ไม่พบข้อมูลรหัสตู้ นี้ กรุณาทำรายการใหม่อีกครั้ง \r\n(กดที่เมนูเลือกบริการก่อน)";
               // $bot->reply("ไม่พบข้อมูลรหัสตู้ นี้ กรุณาทำรายการใหม่อีกครั้ง");
            }
            die();
      }
}

$lineuser->lastcommand = $text;
$lineuser->write();
die('Error do not understand ');
