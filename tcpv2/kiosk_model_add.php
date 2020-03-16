<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Kiosk Model"; 

//Insert 
if($_POST['action']=='addMOD' && $_POST){ 
	$model = new kiosk_model();
	$model->model_name = $_POST['model_name'];
	$model->model_image = $_POST['model_image'];
	$model->slot_amount = $_POST['slot_amount'];
	$model->description = $_POST['description'];
	$model->create_time = time(); 
	$model->lastupdate = time();
	$newID = $model->write();
	ROOT::redirect("kiosk_model_lists.php?modelid=".$newID."&result=success&when=".$_POST['when']."&bywho=".$_POST['bywho']);   
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
            <li class="breadcrumb-item"><a href="product_lists.php"><?=$pageTitle?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-7 col-sm-8 col-xs-12">
            <h2><?=$pageTitle?> <b>Add</b></h2>
        </div><!--/col-->   
        <div class="col-md-5 col-sm-4 col-xs-12">

        </div><!--/col-->   
    </div><!--/content-title-->
</div><!--/row-->  

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">เพิ่มข้อมูล ประเภทตู้กดน้ำ</p>
        </div><!--/x_title-->

        <div class="x_content">
        	<form class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate>
            <input type="hidden" name="action" value="addMOD"> 
			<input id="bywho" name="bywho" value="<?=$_SESSION['name']?>" style="display:none;" />
            <input id="when" name="when" value="<?=date('Y-m-d H:i:s')?>" style="display:none;" />
                <div class="row">
                    <div class="col col-md-3 col-sm-4 col-xs-12">
                    	<div class="form-group" style="text-align:center;">
                        <? if(!$loadMOD->model_image): ?>
                        	<img id="preview" src="" class="img-responsive" style="max-height:300px; margin:0 auto;">
                        <? elseif(substr($loadMOD->model_image,0,4) == 'data'): ?>
                            <img id="preview" src="<?=$loadMOD->model_image?>" class="img-responsive" style="max-height:300px; margin:0 auto;">
                        <? else: ?>
                            <img id="preview" src="images/products/<?=$loadMOD->model_image?>" class="img-responsive" style="max-height:300px; margin:0 auto;">
                        <? endif; ?>
                            <div style=" width:100%; margin-top:30px; padding:10px; border:1px solid #e6ecf5; border-radius: 2px; overflow:hidden;">
                            	<input type="file" name="previewimage" id="previewimage" onchange="previewIMG()">
                                <input id="model_image" name="model_image" value=""  style="display:none;" /> 
                            </div>
                        </div>
                    </div><!--/col-->
                    <div class="col col-md-9 col-sm-8 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-6 col-xs-12"><span class="required">*</span> Model Name</label>
                            <div class="col-md-9 col-sm-6 col-xs-12">
                                <input class="form-control col-md-12 col-xs-12" type="text" id="model_name" name="model_name" value="<?=$loadMOD->model_name;?>" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> Slot Available</label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <select id="slot_amount" name="slot_amount" class="form-control input-sm">
                                    <option value="25" <?=($loadMOD->slot_amount == 25)?'selected':''?>>25</option>
                                    <option value="30" <?=($loadMOD->slot_amount == 30)?'selected':''?>>30</option>
                                    <option value="36" <?=($loadMOD->slot_amount == 36)?'selected':''?>>36</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="resizable_textarea form-control" rows="3" id="description" name="description"><?=$loadMOD->description;?></textarea>
                            </div>
                        </div>
                    </div><!--/col-->
                </div><!--/row-->
            
            	<div class="row">
                    <div class="ln_solid"></div>
                    <div class="col-md-3 col-sm-6 col-xs-12"><a href="javascript:history.go(-1)" class="btn btn-default btn-lg btn-block">Back</a></div>
                    <div class="col-md-9 col-sm-6 col-xs-12"><button class="btn btn-primary btn-lg btn-block" type="submit" >Add New Kiosk Model</button></div>
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
});
//Upload Image
var previewIMG = function() {
	var photo = document.getElementById("previewimage");
	var files = photo.files;
	for (var i = 0; i < files.length; i++) { var file = files[i]; }      
	var reader = new FileReader();
	reader.onloadend = function() {
		preview.src = reader.result; tempimage=reader.result;
		$("#model_image").val(tempimage); 
	}
	reader.readAsDataURL(file);
}
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
