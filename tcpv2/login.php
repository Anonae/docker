<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");

$last5mins = time() - 5*60;

$loginsession = new loginsession();
$loginsession->sessionid = session_id();

if($loginsession->load()){ // Already Set
	//if($loginsession->allowuserid > 0 && $loginsession->lastupdate > $last5mins ){
	if($loginsession->allowuserid > 0 ){
		$lineuser = new lineusers();
		$lineuser->id = $loginsession->allowuserid;
		if($lineuser->load()){
			$_SESSION['userid'] = $lineuser->id;
			$_SESSION['username'] = $lineuser->name;
			$_SESSION['permission'] = $lineuser->per_id;
			ROOT::query("DELETE FROM loginsession WHERE lastupdate < {$last5mins} ");
		}
	}
}else{
	$loginsession->lastupdate = 0;
}

if($loginsession->lastupdate < $last5mins){ // 5 mins pass
	$loginsession->mappagenumber = rand(10000,999999);
	$loginsession->lastupdate = time();
	$loginsession->write();
}

/// AJAX refresh()

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once('inc_head.php'); ?>
    <title>TCP Login</title>
	<?php require_once('inc_head_href.php'); ?>
    
	<script src="js/jquery.min.js"></script>
    <style type="text/css">
        .login_content { letter-spacing: 20px; font-size: 30px; background-color: #e9ecef; border-radius: 5px; padding: 5px 0px 5px 15px; box-shadow:0 5px 10px rgba(0,0,0,0.1) inset;}
        .login_content h1 { font-family:"Exo 2","Pridi"; font-size:24px;}
        .login_content h1:before { background: #d8d8d8; margin-top: 5px;}
        .login_content h1:after { background: #d8d8d8; margin-top: 5px;}
        .login_content .separator { margin-top:30px; padding-top:30px;}
        .login_content .separator a { font-size:16px; margin-left:10px;}
    </style>
</head>

<body class="login" style=" margin-top:50px;">
    
<div align="center">
    
    <?php       
    // $meeting_date   // ไปปรับที่  includes /configs.php
    
//    if(date('Y-m-d') == $meeting_date OR date('Y-m-d') == "2019-11-20"){   // แก้ไขวันที่ ที่จะไปพบลูกค้านี่นี่
//        // Smart Vending 
//        $logo_img           = "images/logo_smart_vending.png";
//        $logo_alt           = "Smart Vending Logo"; 
//        $line_login_name    = "Smart Vending Machine"; 
//        $logo_width         = "width:130px";
//        
//      } else { 
//        // TCP Vending       
//        $logo_img           = "images/logo-tcp.png";
//        $logo_alt           = "TCP Logo";
//        $line_login_name    = "TCP Vending Machine";
//        $logo_width         = "width:80px";
//      }
      
      
        $logo_img           = "images/logo_smart_vending.png";
        $logo_alt           = "Smart Vending Logo"; 
        $line_login_name    = "Smart Vending Machine"; 
        $logo_width         = "width:130px";
        
      ?>
    
          <div style="font-size:36px;">
               <img src="<?=$logo_img;?>" alt="<?=$logo_alt;?>" class="profile_img" style=" <?=$logo_width;?>; margin-top:-10px; vertical-align: baseline;" /> Admin <b>System</b>.
          </div>
</div>

<div class="col-md-12" style=" text-align:center;">
    <div class="" align="center" style="margin:0 auto; margin-top:30px; width:fit-content;">
    
        <div class="login_content">
        	<font style="font-weight:600; font-size:30px; color:#f81917;"><?=$loginsession->mappagenumber?></font>
        </div>
        
        <p style=" margin-top:20px; font-size:18px; font-weight:400;">
            <span style="font-size:18px;">เพื่อเข้าสู่ระบบ</span>
            <br>กรุณาพิมพ์ รหัสด้านบน ลงใน 
          <br>Line@ <?=$line_login_name;?><!--  TCP Vending Machine-->
        </p>
        
    </div>
</div><!--/col-md-12-->

    
<script>
var countTimer = 0;
setInterval(function(){
	$.get("login_redirect.php", function(data){
		if(data == 'OK'){ window.location.href = "dashboard.php"; }
		if(countTimer > 3){ location.reload();  } console.log('Login-> '+data);
		countTimer++;
	});
},5000);
</script>

</body>
</html>
