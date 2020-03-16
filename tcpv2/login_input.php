<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");

$INPUTFORM_CLASS = 'form-control';
$INP_action = new INPUTFORM('action', 'text', 'hidden');
$INP_userlogin = new INPUTFORM('userlogin', 'text', 'text');
$INP_pwslogin = new INPUTFORM('pwslogin','text','password');

if($INP_action->value == "save") {
	$owner = new owner();
	$owner->username = $INP_userlogin->value;
	$owner->password = $INP_pwslogin->value;
	if($owner->load()){
		// Login สำเร็จ 
		$_SESSION['name'] = $owner->name;
		$_SESSION['lastname'] = $owner->lastname;
		$_SESSION['username'] = $owner->username;   
		$_SESSION['password'] = $owner->password;
		$_SESSION['type'] = $owner->type;
		if($_SESSION['username']){
			$msg_alert ='Welcome, '.$_SESSION['name'];  // สำหรับแสดงข้อความต้อนรับ          
			ROOT::redirect("dashboard.php"); 
		} 
	} else {  
		$msg_alert = 'รหัสผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง';  
	}
	// $owner->track();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once('inc_head.php'); ?>	
    <title>TCP Login</title>
	<?php require_once('inc_head_href.php'); ?>	
    <link href="assets/animate.css/animate.min.css" rel="stylesheet">
    <style type="text/css">
		.login_content h1 { font-family:"Exo 2","Pridi"; font-size:24px;}
		.login_content h1:before { background: #d8d8d8; margin-top: 5px;}
		.login_content h1:after { background: #d8d8d8; margin-top: 5px;}
		.login_content .separator { margin-top:30px; padding-top:30px;}
		.login_content .separator a { font-size:16px; margin-left:10px;}
		
    </style>
</head>

<body class="login"> 

	<div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
                <div style="font-size:36px;"><img src="images/logo-tcp.png" alt="TCP Logo" class="profile_img" style=" width:80px; margin-top:-10px;" /> Admin <b>System</b>.</div>
                
				<form method="post">
                	<?=$INP_action->value('save')->show(); ?>      
                	<h1>Administrator</h1>
                    <? if($msg_alert) { ?>
                    <div style=" font-size:13px; color:red; padding:0px 0 20px; margin:0 auto;"><?=$msg_alert; ?></div> 
                    <? } ?>
                    <div><input type="text" class="form-control" placeholder="Username" name="userlogin" required="" /></div>
                    <div><input type="password" class="form-control" placeholder="Password" name="pwslogin" required="" /></div>
                    <div>
                        <button class="btn btn-default btn-primary btn-block submit" type="submit" style=" font-weight:300; font-size:18px;">Log in</button>
                        <!--<a class="reset_pass" href="#">Lost your password?</a>-->
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <!--<p class="change_link">New to site? <a href="#signup" class="to_register"> Create Account </a></p>-->
                        <div class="clearfix"></div>
                        <br />
                        <div>
                        <p>©<?=date('Y')?> All Rights Reserved. Develop by KapookTopup.com</p>
                        </div>
                    </div>
				</form>
				</section>
        	</div><!--/login-->

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                <form method="post">
                    <h1>Create Account</h1>
                    <div><input type="text" class="form-control" placeholder="Username" required="" /></div>
                    <div><input type="email" class="form-control" placeholder="Email" required="" /></div>
					<div><input type="password" class="form-control" placeholder="Password" required="" /></div>
                    <div>
                    <button class="btn btn-default btn-block submit" type="submit" style=" font-weight:300; font-size:18px;">Submit</button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <p class="change_link">Already a member ? <a href="#signin" class="to_register"> Log in </a></p>
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1><img src="images/logo-tcp.png" alt="TCP Logo" class="profile_img" style=" width:50px; margin-top:-7px;" /> Admin <b>System</b>.</h1>
                            <p>©<?=date('Y')?> All Rights Reserved. System by ADVWS PCL.</p>
                        </div>
                    </div>
                </form>
                </section>
            </div><!--/register-->
    
    	</div><!--/login_wrapper-->
    </div>
    
</body>
</html>
