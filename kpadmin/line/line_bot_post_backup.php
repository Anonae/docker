<?php
$from_line = file_get_contents('php://input');
include("../../main_include.php");

require_once ('./linebot.php');

$bot = new Linebot();

if($from_line){		// KEEP IN DB
	$linechat = new linechats();
	$linechat->rawmsg = $from_line;
	$linechat->lastupdate = time();
	$linechat->userId = $bot->getUserId();
	$linechat->write();
}


$text = $bot->getMessageText();
// $bot->reply("I got it $text");

    
    

if($text == "เก็บเงินในตู้กดน้ำ"){
   
   $bot->reply("กรุณากรอกหมายเลขรหัสตู้น้ำ เช่น ตู้น้ำ 1234");    
     
} 

if($text =="ตู้น้ำ 1234") {
      $bot->reply("OK ข้อมูลถูกต้องคุณมีสิทธิ์เข้าจัดการตู้ กรุณาจัดการตู้ก่อนเวลา 19:00 น.");
      
} 
if($text =="ข้อมูลตู้น้ำหยอดเหรียญ"){ 
    
     $bot->reply("กรุณากรอก เช่น ดูตู้น้ำ 1234");  
} 
if($text =="ดูตู้น้ำ 1234"){
    $imageUrl = "https://admin-official.line.me/14333992/account/profile.jpg";
    $previewImageUrl = $imageUrl;
    $bot->pushImage("dd",$imageUrl);
     
} 

    
//    $bot->reply("Robot ไม่รู้จัก, กรุณากลับไปเลือก Rich Menu อีกครั้งค่ะ");



// echo "OK";

