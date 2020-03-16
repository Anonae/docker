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
$pageTitle = "Products"; 

//Insert 
if($_POST['action']=='addPRD'){ 
	$add = new product();
	$add->id = NULL;
	$add->product_name = $_POST['productname'];
	$add->product_image = $_POST['productimage'];
	$add->SKU = $_POST['sku'];
	$add->category = $_POST['category'];
	$add->init_price = $_POST['price'];
	$add->description = $_POST['description']; 
	$add->status = 0;
	$add->lastupdate = time(date('Y-m-d H:i:s')); 
	$add->create_time = time(date('Y-m-d H:i:s'));
	$addedID = $add->write();
	//Return Massage
	if($addedID){ ROOT::redirect("product_lists.php?result=added&productid=".$addedID."&when=".$_POST['when']."&bywho=".$_POST['bywho']);   
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
            <li class="breadcrumb-item"><a href="product_lists.php"><?=$pageTitle?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Product <b>Add</b></h2>
        </div><!--/col-->     
    </div><!--/content-title-->
</div><!--/row--> 

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">เพิ่มข้อมูล สินค้า <b class="text-green">ใหม่ !!!</b></p>
        </div><!--/x_title-->

        <div class="x_content">
        	<form class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate>
            <input type="hidden" name="action" value="addPRD">
            <input id="bywho" name="bywho" value="<?=$_SESSION['name']?>" style="display:none;" />
            <input id="when" name="when" value="<?=date('Y-m-d H:i:s')?>" style="display:none;" /> 

                <div class="row">
                    <div class="col col-md-3 col-sm-4 col-xs-12">
                    	<div class="form-group" style="text-align:center;">
                        <? if(!$loadPRD->product_image): ?>
                        	<img id="preview" src="" class="img-responsive" style="max-height:300px; margin:0 auto;">
                        <? elseif(substr($loadPRD->product_image,0,4) == 'data'): ?>
                            <img id="preview" src="<?=$loadPRD->product_image?>" class="img-responsive" style="max-height:300px; margin:0 auto;">
                        <? else: ?>
                            <img id="preview" src="images/products/<?=$loadPRD->product_image?>" class="img-responsive" style="max-height:300px; margin:0 auto;">
                        <? endif; ?>
                            <div style=" width:100%; margin-top:30px; padding:10px; border:1px solid #e6ecf5; border-radius: 2px; overflow:hidden;">
                            	<input type="file" name="previewimage" id="previewimage" onchange="previewIMG()">
                                <input id="productimage" name="productimage" value="<?=($loadPRD->product_image)?$loadPRD->product_image:''?>"  style="display:none;" /> 
                            </div>
                        </div>
                    </div><!--/col-->
                    <div class="col col-md-9 col-sm-8 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> Product Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="productname" name="productname" value="" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> SKU</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="sku" name="sku" value="" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> Price</label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-inline">
                                <input class="form-control col-md-7 col-xs-12" type="number" id="price" name="price" value="" required="required" />
                                <span class="unit">THB</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> Category</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select id="category" name="category" class="form-control input-sm selectpicker selectCustomW100">
                               	<? $listCAT = new category(); $listCAT->loadmany(); ?>
								<? for($xscat = 0; $xscat < $listCAT->totalrecords; $xscat++): ?>
                                    <option data-content="<span style='font-weight:400;color:#aaa;'>(<?=$listCAT->id[$xscat]?>)</span> <b class='b600'><?=$listCAT->name[$xscat]?></b>" value="<?=$listCAT->id[$xscat]?>" <?=($listCAT->id[$xscat] == $loadPRD->category)?'selected':''?>><?=$listCAT->id[$xscat]?></option>
                                <? endfor; ?>
                                </select>
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
                    <div class="col-md-9 col-sm-6 col-xs-12"><button class="btn btn-primary btn-lg btn-block" type="submit" >Add New Product</button></div>
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
//Upload Image
var previewIMG = function() {
	var photo = document.getElementById("previewimage");
	var files = photo.files;
	for (var i = 0; i < files.length; i++) { var file = files[i]; }      
	var reader = new FileReader();
	reader.onloadend = function() {
		//console.log('BASE64 RESULT = ', reader.result)
		preview.src = reader.result; tempimage=reader.result;
		$("#productimage").val(tempimage);
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
