<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Permission 1=Engineer 
if($_SESSION['permission']!=1) {
} else {
	ROOT::redirect("dashboard.php?error=yes");
}

//Site Detail
$pageTitle = "Kiosks"; 

//Insert 
if($_POST['action']=='added'){ 
	$add = new kiosk();
	$add->id = NULL;
	$add->serial = $_POST['serial'];
	$add->image = $_POST['image'];
	$add->modelid = $_POST['modelid'];
	$add->routeid = $_POST['routeid'];
	$add->location = $_POST['location'];
    if($_POST['latitude']){ $add->latitude = $_POST['latitude']; }else{ $add->latitude = 0; }
    if($_POST['longitude']){ $add->longitude = $_POST['longitude']; }else{ $add->longitude = 0; }
	$add->status = 1; 
	$add->description = $_POST['description'];
	$add->lastupdate = time(date('Y-m-d H:i:s')); 
	$add->create_time = time(date('Y-m-d H:i:s')); 
	$addedID = $add->write();
	//Return Massage
	if($addedID){ ROOT::redirect("kiosk_lists.php?result=added&kioskid=".$addedID."&when=".$_POST['when']."&bywho=".$_POST['bywho']);   
	}else{ die('Server Insert Offline'); }
}

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
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Kiosk <b>Add</b></h2>
        </div><!--/col-->     
    </div><!--/content-title-->
</div><!--/row-->  

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">เพิ่มข้อมูล ตู้กดน้ำ <b class="text-green">ใหม่ !!!</b></p>
        </div><!--/x_title-->

        <div class="x_content">
        	<form class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate>
            <input type="hidden" name="action" value="added"> 
            <input id="bywho" name="bywho" value="<?=$_SESSION['name']?>" style="display:none;" />
            <input id="when" name="when" value="<?=date('Y-m-d H:i:s')?>" style="display:none;" />
                <div class="row">
                    <div class="col col-md-3 col-sm-4 col-xs-12">
                    	<div class="form-group" style="text-align:center;">
                        <? if(!$loadKOS->image): ?>
                        	<img id="preview" src="" class="img-responsive" style="max-height:300px; margin:0 auto;">
                        <? else: ?>
                            <img id="preview" src="<?=$loadKOS->image?>" class="img-responsive" style="max-height:300px; margin:0 auto;">
                        <? endif; ?>
                            <div style=" width:100%; margin-top:30px; padding:10px; border:1px solid #e6ecf5; border-radius: 2px; overflow:hidden;">
                            	<input type="file" name="previewimage" id="previewimage" onchange="previewIMG()">
                                <input id="image" name="image" value=""  style="display:none;" /> 
                            </div>
                        </div>
                    </div><!--/col-->
                    <div class="col col-md-9 col-sm-8 col-xs-12">
                    	<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> Board Serial</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="serial" name="serial" value="" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> Model</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select id="modelid" name="modelid" class="form-control input-sm selectpicker selectCustomW100">
                                <? $listMOD = new kiosk_model(); $listMOD->status = 0; $listMOD->loadmany(); //$listMOD->track(); die; ?>
								<? for($xsmod = 0; $xsmod < $listMOD->totalrecords; $xsmod++): ?>
                                    <option data-content="<span style='font-weight:400;color:#aaa;'>(<?=$listMOD->id[$xsmod]?>)</span> <b class='b600'><?=$listMOD->model_name[$xsmod]?></b>" value="<?=$listMOD->id[$xsmod]?>" <?=($listMOD->id[$xsmod] == $loadKOS->modelid)?'selected':''?>>(<?=$listMOD->id[$xsmod]?>) <?=$listMOD->model_name[$xsmod]?></option>
                                <? endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Route</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select id="routeid" name="routeid" class="form-control input-sm selectpicker selectCustomW100">
                                	<option value="0">...</option>
								<? $listROT = new route(); $listROT->status = 0; $listROT->loadmany(); ?>
                                <? for($xsrot = 0; $xsrot < $listROT->totalrecords; $xsrot++): ?>
                                    <option data-content="<?=$listROT->route_name[$xsrot]?> <span style='font-weight:300;color:#999;'>(<?=$listROT->license_plate[$xsrot]?>)</span> <span style='font-weight:300;color:#999;'>, <?=$listROT->area[$xsrot]?></span>" value="<?=$listROT->id[$xsrot]?>"><?=$listROT->route_name[$xsrot]?></option>
                                <? endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> Location</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="location" name="location" value="" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Latitude, Longitude</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            	<div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <input class="form-control" type="text" id="latitude" name="latitude" value=""  />
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <input class="form-control" type="text" id="longitude" name="longitude" value=""  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="resizable_textarea form-control" rows="3" id="description" name="description"></textarea>
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
//Select Picker
$(document).ready(function () {
	$('#modelid').selectpicker({ liveSearch: false, maxOptions: 1 });
	$('#routeid').selectpicker({ liveSearch: false, maxOptions: 1 });
});
//Upload Image
var previewIMG = function() {
	var photo = document.getElementById("previewimage");
	var files = photo.files;
	for (var i = 0; i < files.length; i++) { var file = files[i]; }      
	var reader = new FileReader();
	reader.onloadend = function() {
		preview.src = reader.result; tempimage=reader.result;
		$("#image").val(tempimage); 
	}
	reader.readAsDataURL(file);
}
</script>
