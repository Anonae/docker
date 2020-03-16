
<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Staff"; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('inc_head.php'); ?>	
    <title><?=$pageTitle?>, <?=$siteTitle?></title>
<?php require_once('inc_head_href.php'); ?>	
</head>

<body class="nav-md"> 
<div class="container body">
<div class="main_container">
<?php require_once('inc_menu_main.php'); ?>	
<div class="right_col" role="main">	
    <!--start Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" >
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="staff_lists.php"><?=$pageTitle?></a></li>
            <li class="breadcrumb-item active" aria-current="page">QR Code</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-7 col-sm-7 col-xs-12">
            <h2>TCP Vending Machine's <b>QR Code</b></h2>
        </div><!--/col-->  
 
    </div><!--/content-title-->
</div><!--/row--> 

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">คิวอาร์โค้ด สำหรับเพิ่ม เจ้าหน้าที่เข้าใช้งาน</p>
        </div><!--/x_title-->
        <div class="x_content">
        	<div style=" padding:0; box-shadow:0 3px 12px rgba(0,0,0,0.1); width:fit-content; margin-bottom:30px;">
            	<img src="line/image.png" class="img-responsive" alt="TCP Vending Machine's QR Code"/>
            </div>
            
            <div style="font-size:18px; font-weight:600;">
                <p><b>1.</b> สแกนรูป QR Code เพื่อ Add Line เพิ่มเพื่อน เข้าสู่มือถือ ของท่าน</p>
                <p><b>2.</b> เมื่อเป็นเพื่อน @TCP Vending Machine แล้ว กรุณาพิมพ์ <b>ตัวเลข "1234" </b>เพื่อทำการ ลงทะเบียนพนักงาน อัตโนมัติ</p>
            </div>
        </div><!--/x_content-->
    </div><!--/x_panel-->
    </div><!--/col-md-12-->

</div><!--/row-->

<!-- // End Content on PAGE /////////////////////////////////////////////////////// -->

</div><!-- /right_col -->
<?php require_once('inc_footer.php'); ?>
</div><!-- /main_container -->
</div><!-- /container -->
<?php require_once('inc_footer_script.php'); ?>	
</body>
</html>


