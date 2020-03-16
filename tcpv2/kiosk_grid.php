<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Kiosks"; 

//Function
function getData($url){
	$ch = curl_init();  
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_HEADER, false); 
	
	$output=curl_exec($ch);
	curl_close($ch);  
	$data = json_decode($output);
	return $data;
}
//Kiosk
$urlKiosktList = "http://192.168.0.23:3000/fetchKioskList";
$fetchKOS = getData($urlKiosktList);
$loadKOS = $fetchKOS;
if(empty($loadKOS)){ die('Server Offline');}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('inc_head.php'); ?>	
    <title><?=$pageTitle?>, TCP Admin cPanel.</title>
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
            <li class="breadcrumb-item"><a href="kiosk_lists.php"><?=$pageTitle?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2><?=$pageTitle?> <b>Monitor</b> 
            	<? /*<span style="font-size:15px;">on 
                    <b class="text-green"><?=($datefrom)?$datefrom:''?></b> to <b class="text-green"><?=($date)?$date:''?></b>
                </span> */ ?>
            </h2>
        </div><!--/col-->     
    </div><!--/content-title-->
</div><!--/row-->  

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">เพิ่มข้อมูล ตู้กดน้ำ <b class="text-green">ใหม่ !!!</b></p>
        </div><!--/x_title-->
		<? if(isset($_GET['result'])){ ?>
		<div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-fw fa-close"></i></button>
            Kiosk ID <b><?=$_GET['id']?></b>, has been added <b>Successful.</b> <i><?= date('Y-m-d H:i:s')?></i>
        </div>
		<? } ?>
        <div class="x_content">
        	<form class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate>
            <input type="hidden" name="action" value="add"> 
                <div class="row">
                    <div class="col col-md-3 col-sm-4 col-xs-12">
                    	<div class="form-group">
							<img src="images/redblue_vending_machine.png" class="img-responsive" style="max-height:300px; margin:0 auto;">
                            <div style=" width:100%; margin-top:30px; padding:10px; border:1px solid #e6ecf5; border-radius: 2px;">
                            	<input type="file" name="productimage" id="productimage">
                            </div>
                        </div>
                    </div><!--/col-->
                    <div class="col col-md-9 col-sm-8 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> Model</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="modelid" name="modelid" value="<?=$loadKOS[$x]->modelid;?>" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> Location</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="location" name="location" value="<?=$loadKOS[$x]->location;?>" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Latitude, Longitude</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <input class="form-control" type="text" id="latitude" name="latitude" value="<?=$loadKOS[$x]->latitude;?>" />
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <input class="form-control" type="text" id="longitude" name="longitude" value="<?=$loadKOS[$x]->longitude;?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="resizable_textarea form-control" rows="3" id="description" name="description"><?=$loadKOS[$x]->description;?></textarea>
                            </div>
                        </div>
                    </div><!--/col-->
                </div><!--/row-->
            
            	<div class="row">
                    <div class="ln_solid"></div>
                    <div class="col-md-3 col-sm-6 col-xs-12"><a href="javascript:history.go(-1)" class="btn btn-default btn-lg btn-block">Back</a></div>
                    <div class="col-md-9 col-sm-6 col-xs-12"><button class="btn btn-primary btn-lg btn-block" type="submit" >Add New Kiosk</button></div>
				</div><!--/row-->
            </form>
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

<script type="text/javascript">
function init_DataTables() {
	var handleDataTableButtons = function() {
		if ($("#dataTableTCP").length) {
			$("#dataTableTCP").DataTable({
				dom: "Blfrtip",
				buttons: [
					{ extend: "csv", className: "btn-sm btn-success" },
					{ extend: "print", className: "btn-sm btn-dark" },
				],
				"columnDefs": [ 
					{ "targets": 2, "orderable": false },
					{ "targets": 8, "orderable": false } 
				],
				"iDisplayLength":25,
				responsive: true
	}); } };
	TableManageButtons = function() {
		"use strict";
		return { init: function() { handleDataTableButtons(); } };
	}();
	TableManageButtons.init();
};
</script>
