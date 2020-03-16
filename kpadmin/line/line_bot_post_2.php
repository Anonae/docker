<?php
$from_line = file_get_contents('php://input');
include("../../main_include.php");

require_once ('./linebot.php');

$bot = new Linebot();
$text = $bot->getMessageText();   
$result = $bot->getUserProfile($bot->getUserId()); 

$line_profile = json_decode($result,true);
$line_display = $line_profile["displayName"];
$line_picture = $line_profile["pictureUrl"];


if($from_line){		// KEEP IN DB
    $linechat = new linechats();
    $linechat->rawmsg       = $from_line;
    $linechat->lastupdate   = time();
    $linechat->userId       = $bot->getUserId();
    $linechat->write();

    $lineuser = new lineusers();
    $lineuser->UserId   = $bot->getUserId();
    if(!$lineuser->load()){
        
        $lineuser->name       = $line_display; 
        $lineuser->picture    = $line_picture;
        $lineuser->lastupdate = time();
        $lineuser->route_id = 0;
        $lineuser->groupid = 0;
        $lineuser->per_id = 0;
        $lineuser->lastmessage = $bot->getUserProfile();
        $lineuser->status   = 99;  // ครั้งแรก
        $lineuser->write();                
       
        // reply
        $bot->reply("คุณได้เป็นสมาชิกแล้ว");
        die();
    }
  
    
    // ถ้าเป็นสมาชิกแล้ว แต่ไม่เคยมีรูปภาพให้ Update ข้อมูลรูปภาพ
    if(!$lineuser->picture){
       $lineuser->picture    = $line_picture;
       $lineuser->write(); 
       die();
    }
    
    // ถ้าเป็นสมาชิกแล้ว แต่ไม่เคยมีชื่อ Update ข้อมูลชื่อ
    if(!$lineuser->name) {
       $lineuser->name       = $line_display;   
       $lineuser->write(); 
       die();
    }
    
    $lineuser->lastmessage = $text;
             
}


//  แสดงวันที่และเวลาล่าสุด
$today      = date("Y-m-d");  // วันที่ปัจจุบัน ที่ขอดูข้อมูล
$time_today = date("h:i:sa"); // เวลาปัจจุบัน ที่ขอดูข้อมูล

function get_kiosk($kioskid){
   $kiosk = new kiosk(); 
    $kiosk->tcpcode = trim($kioskid);    
    if($kiosk->load()){
    // แสดงข้อมูลรุ่นของตู้
    $kiosk_model = new kiosk_model(); 
    $kiosk_model->id = $kiosk->id;
    return $kiosk_model->load();      
    }
    return false;
}


function check_main_command($textcheck){
    global $lineuser,$bot;
    $array = array('เช็คตารางงาน','ข้อมูลตู้น้ำหยอดเหรียญ','เก็บเงินในตู้กดน้ำ','เช็คสินค้าในตู้กดน้ำหยอดเหรียญ','ซ่อมบำรุง','ช่วยเหลือ'); 
    $reply = array("ต้องการ เช็คตารางงาน \n กรุณากรอกรหัสพนักงาน เช่น '1234'",
        "ต้องการดูข้อมูลตู้น้ำหยอดเหรียญ \n กรุณากรอกรหัสตู้ เช่น '3653'",
        "ต้องการเก็บเงินในตู้กดน้ำ \n กรุณากรอกหมายเลขรหัสตู้ เช่น '3653'",
        "ต้องการเช็คสินค้าในตู้กดน้ำ \n กรุณากรอกรหัสตู้ เช่น '3653'",
        "ต้องการซ่อมบำรุงตู้กดน้ำ \n กรุณากรอกรหัสตู้ เช่น '3653'",
        "ต้องการช่วยเหลือด้านใด ปล่อยสินค้า หรือ Restart เครื่อง \n กรุณาพิมพ์ข้อความ เช่น 'ปล่อยสินค้า' หรือ 'Restart'" );
    
    if(in_array($textcheck ,$array,TRUE)){
         
       $lineuser->lastcommand = $textcheck;
       $lineuser->write();  
       
       $id = in_array( $textcheck , $array , TRUE); 
     
       $bot->reply($reply[$id]);
        
       die();
    } 
}

check_main_command($text);


if($lineuser->lastcommand ==''){
          $bot->reply('sorry don under stand');
       die(); 
}


if($lineuser->lastcommand =='เช็คตารางงาน'){
    if(is_numeric(trim($text))){
        $bot->reply("checking " . $text);
        die();
    }
}


$bot->reply('sorry don under stand');
$lineuser->lastcommand = '';
$lineuser->write();
die(); 



////////// ------------------------- ด้านล่างอันเก่า  ----------------------//////
// เมนู 1  เช็คตารางงาน
if($text =="เช็คตารางงาน") {
    $lineuser->lastcommand = $text;
     $lineuser->write();  
     
     $bot->reply("ต้องการ เช็คตารางงาน \n กรุณากรอกรหัสพนักงาน เช่น '1234'");  
     die("ต้องการ เช็คตารางงาน \n กรุณากรอกรหัสพนักงาน เช่น '3653'");
}

if($lineuser->lastcommand == "เช็คตารางงาน") { 
    
    if($text =="1234"){   //ตรงนี้ค่อยเปลี่ยนค่าใหม่
        // สั่งให้เช็คตารางของพนักงานคนนี้ 
        $bot->reply("เช็คตารางงาน  \n\n"
                . "ตอบ : สั่งให้ตรวจเช็คตารางงานของพนักงานคนนี้ วันนี้ต้องทำอะไรบ้าง");
    } else { 
        $lineuser->lastcommand = ''; // Clear lastcommand ออกจากเงื่อนไขนี้ให้ไปเริ่มต้นใหม่
        $lineuser->write();    
        $bot->reply("คุณพิมพ์ข้อมูลไม่ถูกต้อง กรุณาเลือกทำรายการใหม่");
    }
    die(); 
}



    
// เมนูที่ 2 ข้อมูลตู้น้ำหยอดเหรียญ
if($text =="ข้อมูลตู้น้ำหยอดเหรียญ"){     
     
     $lineuser->lastcommand = $text;
     $lineuser->write();  
      
     $bot->reply("ต้องการดูข้อมูลตู้น้ำหยอดเหรียญ \n กรุณากรอกรหัสตู้ เช่น '3653'");  
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
   $bot->reply("กรุณากรอกหมายเลขรหัสตู้น้ำ กรุณากรอกรหัสตู้ เช่น '3653'"); 
   die("ต้องการดูข้อมูลตู้น้ำหยอดเหรียญ \n กรุณากรอกรหัสตู้ เช่น '3653'");
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
    $bot->reply("ต้องการเช็คสินค้าในตู้กดน้ำ \n กรุณากรอกรหัสตู้ เช่น '3653'");  
    die("ต้องการเช็คสินค้าในตู้กดน้ำ \n กรุณากรอกรหัสตู้ เช่น '3653'");  
} 

if($lineuser->lastcommand == 'เช็คสินค้าในตู้กดน้ำหยอดเหรียญ'){
    if($kiosk->totalitems) {
        $message_data = "เมนู เช็คสินค้าในตู้กดน้ำหยอดเหรียญ \n\n"
                . "ค้นหา คำว่า '$text' ผลการค้นหา\n\n"
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

//เมนูที่ 5  ซ่อมบำรุง
if($text =="ซ่อมบำรุง") {
    $lineuser->lastcommand = $text;
    $lineuser->write();
    $bot->reply("ต้องการซ่อมบำรุงตู้กดน้ำ \n กรุณากรอกรหัสตู้ เช่น '3653'"); 
    die("ต้องการซ่อมบำรุงตู้กดน้ำ \n กรุณากรอกรหัสตู้ เช่น '3653'"); 
}

if($lineuser->lastcommand =="ซ่อมบำรุง"){
     if($kiosk->totalitems) {
         
         // เรื่องที่จะซ่อมบำรุงเรื่องอะไร เอามาใส่ตรงนี้ 
         
     } else { 
        $lineuser->lastcommand = '';
        $lineuser->write();    
        $bot->reply("คุณพิมพ์ข้อมูลไม่ถูกต้อง กรุณาเลือกทำรายการใหม่");
    }
    die();
}





 // เมนูที่ 6 ช่วยเหลือ 
if($text =="ช่วยเหลือ") {
    $lineuser->lastcommand = $text;
    $lineuser->write();
    $bot->reply("ต้องการช่วยเหลือด้านใด ปล่อยสินค้า หรือ Restart เครื่อง \n กรุณาพิมพ์ข้อความ เช่น 'ปล่อยสินค้า' หรือ 'Restart'");
    die("ต้องการช่วยเหลือด้านใด ปล่อยสินค้า หรือ Restart เครื่อง \n กรุณาพิมพ์ข้อความ เช่น 'ปล่อยสินค้า' หรือ 'Restart'"); 
}

if($lineuser->lastcommand == "ช่วยเหลือ") { 
   if($text =="Restart"){   // พิมพ์ตัวพิมพ์ใหญ่มา ให้แปลงเป็นตัวพิมพ์เล็ก
       $text = strtolower($text);
   }
    
    if($text=="ปล่อยสินค้า"){
        $bot->reply("คุณเลือก ปล่อยสินค้า สั่งให้ทำอะไร เขียนเพิ่มตรงนี้");
       
    } else  if($text=="restart"){ 
        $bot->reply("คุณเลือก Restart เครื่องใหม่  สั่งให้ทำอะไร เขียนเพิ่มตรงนี้");
       
    } else { 
        $lineuser->lastcommand = '';
        $lineuser->write();    
        $bot->reply("คุณพิมพ์ข้อมูลไม่ถูกต้อง กรุณาเลือกทำรายการใหม่");
    }
    
    die();
}


