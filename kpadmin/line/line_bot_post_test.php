<?php
$from_line = file_get_contents('php://input');
include("../../main_include.php");

require_once ('./linebot.php');

$bot = new Linebot();
$text = $bot->getMessageText();   
if($from_line){		// KEEP IN DB
    $linechat = new linechats();
    $linechat->rawmsg       = $from_line;
    $linechat->lastupdate   = time();
    $linechat->userId       = $bot->getUserId();
    $linechat->write();

    $lineuser = new lineusers();
    $lineuser->UserId   = $bot->getUserId();
    if(!$lineuser->load()){
        $lineuser->lastupdate = time();
        $lineuser->groupid = 0;
        $lineuser->per_id = 0;
        $lineuser->lastmessage = $bot->getUserProfile();
        $lineuser->status   = 99;  // ครั้งแรก
        $lineuser->write(); 
        // reply
        die();
    }
  
   // $lineuser->lastmessage = $text;
             
}

// $result = $bot->getUserProfile($userId);    
// result จะประมาณนี้
//{"userId":"Ub11851038609f394401ba3ea9a69b815","displayName":"Monai advws.com","pictureUrl":"https://profile.line-scdn.net/0hVpkesoIQCV9WHCWNaAV2CGpZBzIhMg8XLi5FOHofU2Z8fxsKbi4VbnpOUDx8KE1dOX1DOXpLUz8v
//https://profile.line-scdn.net/0hVpkesoIQCV9WHCWNaAV2CGpZBzIhMg8XLi5FOHofU2Z8fxsKbi4VbnpOUDx8KE1dOX1DOXpLUz8v
//","statusMessage":"www.advws.com"}
// $bot->reply("I got it $text $lineusers->id   $lineusers->status");


//  แสดงวันที่และเวลาล่าสุด
$today      = date("Y-m-d");  //  แสดงวันที่ปัจจุบัน ที่ขอดูข้อมูล
$time_today = date("h:i:sa"); //  แสดงเวลาปัจจุบัน ที่ขอดูข้อมูล

//$text = "Chk3653";
echo $text;

$text_edit = strtolower($text);  // strtolower  พิมพ์อะไรมาให้เป็นตัวพิมพ์เล็กให้หมด


//  ค้นหาคำที่ต้องการ 
$find_menu1     = strpos(strtolower($text),"id");   // ค้นหาคำว่า id
$find_menu2     = strpos(strtolower($text),"id");   // ค้นหาคำว่า id
$find_menu3     = strpos(strtolower($text),"chk");   // ค้นหาคำว่า Chk
$find_menu4     = strpos(strtolower($text),"check");  // ค้นหาคำว่า check



$kiosk = new kiosk(); 

if($find_menu2 !== FALSE) {
   $find_model2  = str_replace("id", "", "$text_edit");
   $find_model2  = trim($find_model2);
   $kiosk->tcpcode  = $find_model2;    
  // $bot->reply("$find_model2");
}

//if($find_menu3 !== FALSE){  
  //  $find_model3     = str_replace("chk", "", "$text_edit"); //trim(substr($text,3));
    $find_model3     = trim($find_model3);
    $kiosk->tcpcode  = $text; //$find_model3;
   // $bot->reply("$find_model3");
//} 


if($find_menu4 !== FALSE){
    $find_model4     = str_replace("check", "", "$text_edit"); // trim(substr($text,5));
    $find_model4     = trim($find_model4);
    $kiosk->tcpcode  = $find_model4;    
}
   
if($kiosk->load()){
    // แสดงข้อมูลรุ่นของตู้
    $kiosk_model = new kiosk_model(); 
    $kiosk_model->id = $kiosk->id;
    $kiosk_model->load();      
}

    
   
    
// เมนูที่ 2 ข้อมูลตู้น้ำหยอดเหรียญ
if($text =="ข้อมูลตู้น้ำหยอดเหรียญ"){     
     
     $lineuser->lastcommand = $text;
     $lineuser->write();  
      
     $bot->reply("ต้องการดูข้อมูลตู้น้ำหยอดเหรียญ \n กรุณากรอกรหัสตู้ ตัวอย่าง id รหัสตู้ เช่น id3653");  
     die("ต้องการดูข้อมูลตู้น้ำหยอดเหรียญ \n กรุณากรอกรหัสตู้ เช่น '3653'");
} 




if($lineuser->lastcommand == 'ข้อมูลตู้น้ำหยอดเหรียญ'){
    
    if($kiosk->totalitems) {
              
       $message_data = "เมนู ข้อมูลตู้น้ำหยอดเหรียญ \n\n"
            . "ค้นหารหัสตู้ (Kiosk ID) : '$text'  ผลการค้นหา \n\n"            
            . "ID: $kiosk->id \n"
            . "TCP Code : $kiosk->tcpcode \n"
            . "Name : $kiosk->name \n"
            . "Serial : $kiosk->serial \n"
            . "Description : $kiosk->description \n\n"
            . "ตู้กดน้ำรุ่น  : $kiosk_model->model_name \n"            
            . "หน้าตู้วางสินค้า : $kiosk_model->placement ตำแหน่ง \n"
            . "ช่องเก็บสินค้า : $kiosk_model->slot_amount ช่อง / $kiosk_model->placement ข้อมูล  \n\n"
            . "สถานที่ตั้งตู้  : $kiosk->location   \n"
            . "พิกัด	: $kiosk->latitude, $kiosk->longitude \n"
            . "แผนที่ : https://www.google.co.th/maps/search/$kiosk->latitude,$kiosk->longitude \n\n" 

            . "จำนวนสินค้าในตู้ขณะนี้ : http://advvending.advws.com/tcp/kiosk_view.php?kioskid=$kiosk_model->id  \n\n"
            . "* กรุณา Login ก่อนการใช้งาน *";
       
       
         $bot->reply("$message_data");
       
    }else{
      $lineuser->lastcommand = '';
      $lineuser->write();    
      $bot->reply("คุณพิมพ์ข้อมูลไม่ถูกต้อง กรุณาเลือกทำรายการใหม่");  
    }
    die();
}



//  เมนูที่ 3 เก็บเงินในตู้กดน้ำ  
if($text == "เก็บเงินในตู้กดน้ำ"){ 
   $lineuser->lastcommand = $text;
   $lineuser->write();  
   $bot->reply("กรุณากรอกหมายเลขรหัสตู้น้ำ ตัวอย่าง Chk รหัสตู้ เช่น Chk3653"); 
   die("กรุณากรอกหมายเลขรหัสตู้น้ำ กรุณากรอกรหัสตู้ เช่น '3653'");
} 

if($lineuser->lastcommand == 'เก็บเงินในตู้กดน้ำ'){
    
    if($kiosk->totalitems) {
         $message_data = "เมนู เก็บเงินในตู้กดน้ำ \n\n"
                 . "ค้นหา คำว่า '$text' ผลการค้นหา \n\n"
                . "ID: $kiosk->id \n"
                . "TCP Code : $kiosk->tcpcode \n"
                . "Name : $kiosk->name \n"                    
                . "Description : $kiosk->description \n\n"
                . "ยอดเงินคงเหลือภายในตู้ : ????  บาท \n"
                . "จำนวนรายการ หลังจากเปิดตู้ ถึง ปัจจุบัน : ??? \n"
                . "เปิดตู้กดน้ำ เก็บเงิน/เติมสินค้า ล่าสุด : วันที่ $today ณ เวลา $time_today \n\n\n"
                . "สถานที่ตั้งตู้  : \n $kiosk->location   \n"
                . "พิกัด	: $kiosk->latitude, $kiosk->longitude \n"
                . "แผนที่     : https://www.google.co.th/maps/search/$kiosk->latitude,$kiosk->longitude \n\n" ;            

        $bot->reply("$message_data"); 
        
    } else { 
        $lineuser->lastcommand = '';
        $lineuser->write();    
        $bot->reply("คุณพิมพ์ข้อมูลไม่ถูกต้อง กรุณาเลือกทำรายการใหม่");  
    }
    
    die();
}


// เมนูที่ 4 เช็คสินค้าในตู้กดน้ำหยอดเหรียญ 

if($text =="เช็คสินค้าในตู้กดน้ำหยอดเหรียญ"){  
    $lineuser->lastcommand = $text;
    $lineuser->write();  
    $bot->reply("ต้องการเช็คสินค้าในตู้กดน้ำ \n กรุณากรอกรหัสตู้ ตัวอย่าง Check รหัสตู้  เช่น Check3653");  
    die("ต้องการเช็คสินค้าในตู้กดน้ำ \n กรุณากรอกรหัสตู้ กรุณากรอกรหัสตู้ เช่น '3653'");  
} 

if($lineuser->lastcommand == 'เช็คสินค้าในตู้กดน้ำหยอดเหรียญ'){
    if($kiosk->totalitems) {
        $message_data = " \n"
                . "ค้นหา คำว่า '$text' \n\n"
                    . "ID: $kiosk->id \n"
                    . "TCP Code : $kiosk->tcpcode \n"
                    . "Name : $kiosk->name \n"                    
                    . "Description : $kiosk->description \n\n"
                    . "จำนวนรายการ หลังจากเปิดตู้ ถึง ปัจจุบัน : ????  รายการ \n\n\n"
                    . "ตรวจสอบข้อมูลล่าสุด : วันที่ $today ณ เวลา $time_today \n"; 
       
       $bot->reply("$message_data");
       
    } else { 
        $lineuser->lastcommand = '';
        $lineuser->write();    
        $bot->reply("คุณพิมพ์ข้อมูลไม่ถูกต้อง กรุณาเลือกทำรายการใหม่");
    }
    die();
}




 