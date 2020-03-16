<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Kiosks"; 

//Function Insert
function postData($input_data,$url){
    $data_string = json_encode($input_data);
    $ch=curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data_string );
    curl_setopt($ch, CURLOPT_HTTPHEADER,
		array('Content-Type:application/json', 'Content-Length: ' . strlen($data_string)) );
	$result = curl_exec($ch);    
	curl_close($ch);    
	return $result;
}
//Insert Data
if($_POST['action']=='editKOS' && $_POST){ 
	$data->modelid = $_POST['modelid'];
	$data->location = $_POST['location'];
    $data->latitude = $_POST['latitude'];
    $data->longitude = $_POST['longitude'];
	$data->description = $_POST['description'];
    $url = "http://192.168.0.23:3000/editKiosk/".$_GET['kioskid'];
    $result= postData($data,$url);
	//Return Massage
    if($result){ ROOT::redirect("kiosk_edit.php?kioskid=".$_GET['kioskid']."&result=success&when=".$_POST['when']."&bywho=".$_POST['bywho']);                
    }else{ die('Server Insert Offline'); }
} 

//Function GET
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
$fetchKOS=getData($urlKiosktList);
	//GET Single Kiosk
	foreach ($fetchKOS as $key=>$value){ if($value->id == $_GET["kioskid"]){ $loadKOS = $value; } }
if(empty($loadKOS)){ die('Server loadKOS Offline');}
//Kiosk Model
$urlModelList = "http://192.168.0.23:3000/fetchKioskModelList";
$fetchMOD = getData($urlModelList);
if(empty($fetchMOD)){ die('Server fetchMOD Offline');}

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
            <li class="breadcrumb-item"><a href="kiosk_lists.php"><?=$pageTitle?></a></li>
            <li class="breadcrumb-item"><a href="kiosk_view.php?kioskid=<?=$_GET['kioskid']?>">KioskID <b><?=$_GET['kioskid']?></b></a></li>
            <li class="breadcrumb-item active" aria-current="page">Setup Products</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Kiosk <b>Editor</b></h2>
        </div><!--/col-->   
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="dataTables_wrapper">
            <form method="GET">
                <div class="dataTables_custom" style="width:100%;">
                	<div class="dateMonthPicker">
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="fa fa-fw fa-building-o"></i></span>
                            <select id="kioskid" name="kioskid" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;" onchange="this.form.submit()">
                            <? for($xKos = 0; $xKos < count($fetchKOS); $xKos++): ?>
                                <option data-content="<span style='font-weight:400;'>Kiosk ID</span> <b><?=$fetchKOS[$xKos]->id?></b>" 
                                value="<?=$fetchKOS[$xKos]->id?>" <?=($fetchKOS[$xKos]->id == $_GET['kioskid'])?'selected':''?>><?=$fetchKOS[$xKos]->id?></option>
                            <? endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div><!--/col-->   
    </div><!--/content-title-->
</div><!--/row-->  

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">หน้าแก้ไข ตู้กดน้ำ หมายเลข <b><?=$_GET['kioskid']?></b></p>
        </div><!--/x_title-->
<? if(isset($_GET['result'])){ ?>
<div class="alert alert-success alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-fw fa-close"></i></button>
	Kiosk ID <b><?=$_GET['kioskid']?></b>, has been edited <b>Successful</b>. 
    <i style="margin-left:10px; color:rgba(255,255,255,0.5);">on <?=$_GET['when']?> by <?=$_GET['bywho']?></i>
</div>
<? } ?>
        <div class="x_content">
        	<form class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate>
            <input type="hidden" name="action" value="editKOS"> 
            <input id="bywho" name="bywho" value="<?=$_SESSION['name']?>" style="display:none;" />
            <input id="when" name="when" value="<?=date('Y-m-d H:i:s')?>" style="display:none;" />
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
                                <select id="modelid" name="modelid" class="form-control input-sm selectpicker selectCustomW100">
								<? for($xMod = 0; $xMod < count($fetchMOD); $xMod++): ?>
                                    <option data-content="<span style='font-weight:400;color:#aaa;'>(<?=$fetchMOD[$xMod]->id?>)</span> <b class='b600'><?=$fetchMOD[$xMod]->model_name?></b>" value="<?=$fetchMOD[$xMod]->id?>" <?=($fetchMOD[$xMod]->id == $loadKOS->modelid)?'selected':''?>>(<?=$fetchMOD[$xMod]->id?>) <?=$fetchMOD[$xMod]->model_name?></option>
                                <? endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> Location</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="location" name="location" value="<?=$loadKOS->location;?>" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Latitude, Longitude</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <input class="form-control" type="text" id="latitude" name="latitude" value="<?=$loadKOS->latitude;?>" />
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <input class="form-control" type="text" id="longitude" name="longitude" value="<?=$loadKOS->longitude;?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="resizable_textarea form-control" rows="3" id="description" name="description"><?=$loadKOS->description;?></textarea>
                            </div>
                        </div>
                    </div><!--/col-->
                </div><!--/row-->
            
            	<div class="row">
                    <div class="ln_solid"></div>
                    <div class="col-md-3 col-sm-6 col-xs-12"><a href="javascript:history.go(-1)" class="btn btn-default btn-lg btn-block">Back</a></div>
                    <div class="col-md-9 col-sm-6 col-xs-12"><button class="btn btn-primary btn-lg btn-block" type="submit" >Submit Edited</button></div>
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
//Select Picker
$(document).ready(function () {
	$('#kioskid').selectpicker({ liveSearch: false, maxOptions: 1 });
	$('#modelid').selectpicker({ liveSearch: false, maxOptions: 1 });
});
//DataTable
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
