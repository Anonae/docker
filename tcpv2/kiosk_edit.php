<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Permission 
if($_SESSION['permission']<3) {
} else {
	ROOT::redirect("dashboard.php?error=yes");
}

//Site Detail
$pageTitle = "Kiosks"; 

//Insert 
if($_POST['action']=='edited'){ 
	$edit = new kiosk();  
	$edit->id = $_GET['kioskid']; 
	if ($edit->load()){ 
		$edit->name = $_POST['name'];
		$edit->tcpcode = $_POST['tcpcode'];
		$edit->serial = $_POST['serial'];
		if($_POST['image']){ $edit->image = $_POST['image']; }
		$edit->modelid = $_POST['modelid'];
		$edit->routeid = $_POST['routeid'];
		$edit->location = $_POST['location'];
		$edit->latitude = $_POST['latitude']; 
		$edit->longitude = $_POST['longitude']; 
		$edit->description = $_POST['description']; 
		$edit->lastupdate = time(date('Y-m-d H:i:s')); 
		$editedID = $edit->write();
		//Return Massage
    	if($editedID){ ROOT::redirect("kiosk_edit.php?result=edited&kioskid=".$_GET['kioskid']."&when=".$_POST['when']."&bywho=".$_POST['bywho']);   
		}else{ die('Server Insert Offline'); }
	}else{ die('No Data Found'); }
}

//Kiosk
$loadKOS = new kiosk();
$loadKOS->id = $_GET['kioskid'];
$loadKOS->load();
                                
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
            <li class="breadcrumb-item"><a href="kiosk_view.php?kioskid=<?=$_GET['kioskid']?>">Kiosk <?=($loadKOS->tcpcode)?$loadKOS->tcpcode:$loadKOS->id;?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Info</li>
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
                            <? $listKOS = new kiosk(); $listKOS->status = 0; $listKOS->loadmany(); //$listKOS->track(); die;?>
                            <? for($xsKOS = 0; $xsKOS < $listKOS->totalrecords; $xsKOS++): ?>
                                <option data-content="<span style='font-weight:400;'>Kiosk ID</span> <b><?=($listKOS->tcpcode[$xsKOS])?$listKOS->tcpcode[$xsKOS]:$listKOS->id[$xsKOS]?></b>" value="<?=$listKOS->id[$xsKOS]?>" <?=($listKOS->id[$xsKOS] == $_GET['kioskid'])?'selected':''?>><?=($listKOS->tcpcode[$xsKOS])?$listKOS->tcpcode[$xsKOS]:$listKOS->id[$xsKOS]?></option>
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
            <p class="text-th">หน้าแก้ไข ตู้กดน้ำ หมายเลข <b><?=($loadKOS->tcpcode)?$loadKOS->tcpcode:$loadKOS->id;?></b> <span>(<?=$loadKOS->description;?>)</span></p>
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
            <input type="hidden" name="action" value="edited"> 
            <input id="bywho" name="bywho" value="<?=$_SESSION['name']?>" style="display:none;" />
            <input id="when" name="when" value="<?=date('Y-m-d H:i:s')?>" style="display:none;" />
                <div class="row">
                    <div class="col col-md-3 col-sm-4 col-xs-12">
                    	<div class="form-group" style="text-align:center;">
                        <? if(!$loadKOS->image): ?>
                        	<img id="preview" src="" class="img-responsive" style="max-height:300px; margin:0 auto;">
                        <? else : ?>
                        	<img id="preview" src="<?=$loadKOS->image?>" class="img-responsive" style="max-height:300px; margin:0 auto;" title="Kiosk Image">
                        <? endif; ?>
                            <div style=" width:100%; margin-top:30px; padding:10px; border:1px solid #e6ecf5; border-radius: 2px; overflow:hidden;">
                            	<input type="file" name="previewimage" id="previewimage" onchange="previewIMG()">
                                <input id="image" name="image" value=""  style="display:none;" /> 
                            </div>
                        </div>
                    </div><!--/col-->
                    <div class="col col-md-9 col-sm-8 col-xs-12">
                    	<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kiosk Name</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control" type="text" id="name" name="name" value="<?=$loadKOS->name?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">TCP Code</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input class="form-control" type="text" id="tcpcode" name="tcpcode" value="<?=$loadKOS->tcpcode?>" />
                            </div>
                        </div>
                    	<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color:#111;"><span class="required">*</span> Board Serial</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control" type="text" id="serial" name="serial" value="<?=$loadKOS->serial?>" required="required" style="border-color:#333; background-color:rgba(0,0,0,0.15);" />
                                <p class="help-block" style="font-weight:600; color:#ff8c00; border-left:3px solid #ddd; padding-left:7px;">เลขรหัสเฉพาะของบอร์ดควบคุมระบบภายในตู้</p>
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
                                    <option data-content="<?=$listROT->name[$xsrot]?><span style='font-weight:300;color:#999;'>, <?=$listROT->area[$xsrot]?></span>" value="<?=$listROT->id[$xsrot]?>" <?=($listROT->id[$xsrot] == $loadKOS->routeid)?'selected':''?>><?=$listROT->route_name[$xsrot]?></option>
                                <? endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> Location</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control" type="text" id="location" name="location" value="<?=$loadKOS->location;?>" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Latitude, Longitude</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            	<div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <input class="form-control" type="text" id="latitude" name="latitude" value="<?=$loadKOS->latitude;?>" />
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <input class="form-control" type="text" id="longitude" name="longitude" value="<?=$loadKOS->longitude;?>" />
                                    </div>
                                </div>
                                <div style=" margin-bottom:10px;">
                                	<a href="https://www.google.co.th/maps/search/<?=str_pad($loadKOS->latitude, 9, '0', STR_PAD_RIGHT);?>,<?=str_pad($loadKOS->longitude, 9, '0', STR_PAD_RIGHT);?>" target="_blank" class="btn btn-sm btn-info" style="font-size:13px;"><i class="fa fa-fw fa-external-link"></i> Google Map</a>
									<span style=" margin-left:10px; line-height:30px; font-size:15px; vertical-align:text-top;">
                                    <b style="font-weight:400;"><?=str_pad($loadKOS->latitude, 9, '0', STR_PAD_RIGHT);?>, <?=str_pad($loadKOS->longitude, 9, '0', STR_PAD_RIGHT);?></b>
                                    </span>
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
