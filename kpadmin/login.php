<!DOCTYPE html>
<html lang="en">
<head>
    
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
    <div style="font-size:36px;">
        <img src="images/logo-tcp.png" alt="TCP Logo" class="profile_img" style=" width:80px; margin-top:-10px;" /> Admin <b>System</b>.
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
            <br>Line@ TCP Vending Machine
        </p>        
    </div>
</div><!--/col-md-12-->

    
<script>  /* 
var countTimer = 0;
setInterval(function(){
	$.get("login_redirect.php", function(data){
		if(data == 'OK'){ window.location.href = "dashboard.php"; }
		if(countTimer > 3){ location.reload();  } console.log('Login-> '+data);
		countTimer++;
	});
},5000);  */
</script>

</body>
</html>
