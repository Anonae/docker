<?php
$from_line = file_get_contents('php://input');
include("../../main_include.php");

require_once ('./linebot.php');


//print_r( $_POST);
print_r( $_POST['text']);
//print_r( $_POST['getkiosk']);
$text = 3;

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
   // $linechat->userId       = "U9db96fa969ea1a9da8f0350a82a5cf77";
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




$kioskobj = new kiosk();
$kioskobj->id = $_POST['text'];
if($kioskobj->load()) {  // has kiosk model
             $reply_data ="รหัสตู้กดน้ำ ของคุณคือ '$text' \n\n"; 
             $reply_data .= "เมนู ข้อมูลตู้น้ำหยอดเหรียญ \n\n"
                . ""
                . "ID: $kioskobj->id \n"
                . "TCP Code : $kioskobj->tcpcode \n"
                . "Name : $kioskobj->name \n"
                . "Serial : $kioskobj->serial \n"
                . "Description : $kioskobj->description \n\n"
                . "ตู้กดน้ำรุ่น  : $kioskmodelobj->model_name \n"
                . "หน้าตู้วางสินค้า : $kioskmodelobj->placement ตำแหน่ง \n"
                . "ช่องเก็บสินค้า : $kioskmodelobj->slot_amount ช่อง / $kioskmodelobj->placement ข้อมูล  \n\n"
                . "สถานที่ตั้งตู้  : $kioskobj->location   \n"
                . "พิกัด	: $kioskobj->latitude, $kioskobj->longitude \n"
                . "แผนที่ : https://www.google.co.th/maps/search/$kioskobj->latitude,$kioskobj->longitude \n\n"

                . "จำนวนสินค้าในตู้ขณะนี้ : xxxx ชิ้น  \n\n"
                . "* กรุณา Login ก่อนการใช้งาน *";
            }else{
              $reply_data = "not found model"  ;
            }

            $bot->reply($reply_data);



die();


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
      echo $kiosk->sql;
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
    $array = array('เช็คตารางงาน','ข้อมูลตู้น้ำหยอดเหรียญ','เก็บเงินในตู้กดน้ำ','เช็คสินค้าในตู้กดน้ำหยอดเหรียญ','ซ่อมบำรุง','ช่วยเหลือ');
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
       $bot->reply($reply[$id]);        // Bot ตอบกลับ
       die();
    }
}




check_main_command($text);
echo "No main command";
require_once ('./line_login.php');
echo "No Log-in";
if($lineuser->lastcommand ==''){
      echo "No last command";
          $bot->reply("sorry don't under stand");
       die();
}

// เมนูที่ 1
if($lineuser->lastcommand =='เช็คตารางงาน'){
    if(is_numeric(trim($text))){
      //  $reply = "วันนี้คุณมีงานเก็บเงินเส้นทาง ชลบุรี (วิ่งไปกลับ - ชลบุรี) กรุณาติดต่อหัวหน้างานของคุณ";
        $bot->reply("checking " . $text ."อยู่ระหว่างดำเนินการ");
        

        die();
    }
}


// เมนูที่ 2
if($lineuser->lastcommand =='ข้อมูลตู้น้ำหยอดเหรียญ'){
      global $lineuser,$bot,$text;

       if($text > 0 ){

        $kioskobj =  get_kiosk($text);  // get kiosk id

        if($kioskobj){  // has kiosk id

            $kioskmodelobj = get_kiosk_model($kioskobj->id); // model_id
            

            if($kioskmodelobj){  // has kiosk model
             $reply_data ="รหัสตู้กดน้ำ ของคุณคือ '$text' \n\n"; 
             $reply_data .= "เมนู ข้อมูลตู้น้ำหยอดเหรียญ \n\n"
                . ""
                . "ID: $kioskobj->id \n"
                . "TCP Code : $kioskobj->tcpcode \n"
                . "Name : $kioskobj->name \n"
                . "Serial : $kioskobj->serial \n"
                . "Description : $kioskobj->description \n\n"
                . "ตู้กดน้ำรุ่น  : $kioskmodelobj->model_name \n"
                . "หน้าตู้วางสินค้า : $kioskmodelobj->placement ตำแหน่ง \n"
                . "ช่องเก็บสินค้า : $kioskmodelobj->slot_amount ช่อง / $kioskmodelobj->placement ข้อมูล  \n\n"
                . "สถานที่ตั้งตู้  : $kioskobj->location   \n"
                . "พิกัด	: $kioskobj->latitude, $kioskobj->longitude \n"
                . "แผนที่ : https://www.google.co.th/maps/search/$kioskobj->latitude,$kioskobj->longitude \n\n"

                . "จำนวนสินค้าในตู้ขณะนี้ : xxxx ชิ้น  \n\n"
                . "* กรุณา Login ก่อนการใช้งาน *";
            }else{
              $reply_data = "not found model"  ;
            }

            $bot->reply($reply_data);
        }else{

            $lineuser->lastcommand = '';
            $lineuser->write();
            $bot->reply("ไม่พบข้อมูลรหัสตู้ นี้ กรุณาทำรายการใหม่อีกครั้ง");
        }
     //   echo "NAME IS  $kioskobj->name";

        die();
    }

}

// เมนูที่ 3 
if($lineuser->lastcommand =='เก็บเงินในตู้กดน้ำ'){
    global $lineuser,$bot,$text;
    if($text > 0 ){

        $kioskobj =  get_kiosk($text);  // get kiosk id

        if($kioskobj){  // has kiosk id

            $kioskmodelobj = get_kiosk_model($kioskobj->id); // model_id
            $kioskmoney= new kiosk_wallet();
            $kioskmoney->kioskid = $kioskobj->id;
            $kioskmoney->load();
            
            $kiosk_checkin = new kiosk_checkin();
            $kiosk_checkin->kiosk_id = $kioskobj->id;
            $kiosk_checkin->load("ORDER BY id desc LIMIT 1");
                   

            if($kioskmodelobj){  // has kiosk model
             $reply_data ="รหัสตู้กดน้ำ ของคุณคือ '$text' \n\n"; 
             $reply_data .= "เมนู เก็บเงินในตู้กดน้ำ \n\n"
               
                . "ID: $kioskobj->id \n"
                . "TCP Code : $kioskobj->tcpcode \n"
                . "Check In : ".root::day($kiosk_checkin->time_update,true)."\n"
                . "หมายเหตุ : ".$kiosk_checkin->description."\n\n"
               
                . "ยอดเงินคงเหลือภายในตู้ : $kioskmoney->balance  บาท \n"
                . "1B= $kioskmoney->coin1B ,2B=$kioskmoney->coin2baht \n"
                . "5B=$kioskmoney->coin5baht,10B=$kioskmoney->coin10baht \n"
                . "Bill:$kioskmoney->note_amount ";
             
            }else{
              $reply_data = "not found model"  ;
            }

            $bot->reply($reply_data);
        }else{

            $lineuser->lastcommand = '';
            $lineuser->write();
            $bot->reply("ไม่พบข้อมูลรหัสตู้ นี้ กรุณาทำรายการใหม่อีกครั้ง");
        }
     //   echo "NAME IS  $kioskobj->name";

        die();
    }
}


// เมนูที่ 4
if($lineuser->lastcommand =='เช็คสินค้าในตู้กดน้ำหยอดเหรียญ'){
    global $lineuser,$bot,$text;
      if($text > 0 ){
            $kioskobj =  get_kiosk($text);  // get kiosk id
            if($kioskobj) {
                $replymsg ="รหัสตู้กดน้ำ ของคุณคือ '$text' \n\n"; 
                $replymsg .= "เมนู เช็คสินค้าในตู้กดน้ำหยอดเหรียญ \n\n"
                
                    . "ID: $kioskobj->id \n"
                    . "TCP Code : $kioskobj->tcpcode \n"
                    . "Name : $kioskobj->name \n"                    
                    . "Description : $kioskobj->description \n\n"
                    
                    . "ขออภัย ขณะนี้อยู่ระหว่างดำเนินการ"; 
              
       
                $bot->reply($replymsg);
             //   $bot->reply(" ขออภัยขณะนี้อยู่ระหว่างดำเนินการ ");
                
            }else{
                $lineuser->lastcommand = '';
                $lineuser->write();
                echo "ไม่พบข้อมูลรหัสตู้ นี้ กรุณาทำรายการใหม่อีกครั้ง";
                $bot->reply("ไม่พบข้อมูลรหัสตู้ นี้ กรุณาทำรายการใหม่อีกครั้ง");
            }
            die();
      }    
}


// เมนูที่ 5
if($lineuser->lastcommand =='ซ่อมบำรุง'){
    global $lineuser,$bot,$text;

      if($text > 0 ){
            $kioskobj =  get_kiosk($text);  // get kiosk id
            if($kioskobj) {
              $allproduct = new slot();
              $allproduct->kioskid = $kioskobj->id;
              $allproduct->status =0;

              $allproduct->loadmany();
              echo "Slot = $allproduct->totalitems";
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
                echo "ไม่พบข้อมูลรหัสตู้ นี้ กรุณาทำรายการใหม่อีกครั้ง";
                $bot->reply("ไม่พบข้อมูลรหัสตู้ นี้ กรุณาทำรายการใหม่อีกครั้ง");
            }
            die();
      }
}


// เมนูที่ 6

if($lineuser->lastcommand =='ช่วยเหลือ'){
    global $lineuser,$bot,$text;
    
        if($text){ 
            
            if($text =='ปล่อยสินค้า') {                
              // print_r( $_POST);
               $bot->reply("กรุณารอสักครู่ ขณะนี้เครื่องกำลังดำเนินการปล่อยสินค้า");              
            } 
                
            if($text =='Restart' OR $text =='restart'){
                $bot->reply($replymsg. "กรุณารอสักครู่ รอประมาณ 5 นาที ขณะนี้เครื่องกำลังทำการ Restart เครื่อง");                
            } 
          
                $bot->reply($replymsg. "Checking " . $text ." อยู่ระหว่างดำเนินการ");

                die();
          
        }
}



$bot->reply('sorry don under stand กรุณาเริ่มต้นใหม่อีกครั้ง');
$lineuser->lastcommand = '';
$lineuser->write();
die();
