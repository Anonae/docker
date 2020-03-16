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
if($_POST['action']=='editPRD'){ 
	$edit = new product();
	$edit->id = $_GET['productid'];
	if($edit->load()){ 
		$edit->product_name = $_POST['productname'];
		if($_POST['productimage']){ $edit->product_image = $_POST['productimage']; }
		$edit->SKU = $_POST['sku'];
		$edit->category = $_POST['category'];
		$edit->init_price = $_POST['price'];
		$edit->description = $_POST['description']; 
		$edit->status = 0; 
		$edit->lastupdate = time(date('Y-m-d H:i:s')); 
		$editedID = $edit->write();
		//Return Massage
    	if($editedID){ ROOT::redirect("product_edit.php?result=edited&productid=".$_GET['productid']."&when=".$_POST['when']."&bywho=".$_POST['bywho']);   
		}else{ die('Server Insert Offline'); }
	}else{ die('No Data Found'); }
}
/* Del function use Java at bottom  */
if($_POST['action']=='delPRD'){ 
	$del = new product();
	$del->id = $_GET['productid'];
	if($del->load()){ 
		$del->status = 1;
		$del->lastupdate = time(date('Y-m-d H:i:s')); 
		$del->description = $_POST['description'].' ///* Removed by '.$_POST['bywho'].', at '.$_POST['when']; 
		$deletedID = $del->write();
		/*Return Massage
    	if($deletedID){ ROOT::redirect("product_lists.php?result=deleted&productid=".$_GET['productid']."&when=".$_POST['when']."&bywho=".$_POST['bywho']);   
		}else{ die('Server Insert Offline'); }*/
	}else{ die('No Data Found'); }
}

//Products
$fetchPRD = new product();
$fetchPRD->status = 0;
$fetchPRD->loadmany();
if(empty($fetchPRD)){ die('Server fetchPRD Offline');}
//Product Single
$loadPRD = new product();
$loadPRD->id = $_GET['productid'];
$loadPRD->load();
if(empty($loadPRD)){ die('Server loadPRD Offline');}


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
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-7 col-sm-8 col-xs-12">
            <h2><?=$pageTitle?> <b>Editor</b></h2>
        </div><!--/col-->   
        <div class="col-md-5 col-sm-4 col-xs-12">
            <div class="dataTables_wrapper">
            <form method="GET">
                <div class="dataTables_custom" style="width:100%;">
                	<div class="dateMonthPicker">
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="fa fa-fw fa-flask"></i></span>
                            <select id="productid" name="productid" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;" onchange="this.form.submit()">
                            <? for($x = 0; $x < $fetchPRD->totalrecords; $x++): ?>
                                <option data-content="<span style='font-weight:300;color:#999;'>(<?=$fetchPRD->id[$x]?>)</span> <?=$fetchPRD->product_name[$x]?>" 
                                value="<?=$fetchPRD->id[$x]?>" <?=($fetchPRD->id[$x] == $_GET['productid'])?'selected':''?>><?=$fetchPRD->id[$x]?></option>
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
            <p class="text-th">หน้าแก้ไข สินค้า <span style='font-weight:300;color:#999;'>(<?=$loadPRD->id?>)</span> <b><?=$loadPRD->product_name;?></b></p>
            
            <button class="btn btn-danger btn-sm pull-right btn-delPRD" data-productid="<?=$loadPRD->id?>"><i class="glyphicon glyphicon-trash"></i></button>
            
        </div><!--/x_title-->
<? if(isset($_GET['result'])){ ?>
<div class="alert alert-success alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-fw fa-close"></i></button>
	Product ID <b><?=$_GET['productid']?></b>, has been <?=$_GET['result']?> <b>Successful</b>. 
    <i style="margin-left:10px; color:rgba(255,255,255,0.5);">on <?=$_GET['when']?> by <?=$_GET['bywho']?></i>
</div>
<? } ?>
        <div class="x_content">
        	<form id="editPRD" class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate>
            <input type="hidden" name="action" value="editPRD"> 
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
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control" type="text" id="productname" name="productname" value="<?=$loadPRD->product_name;?>" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> SKU</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control" type="text" id="sku" name="sku" value="<?=$loadPRD->SKU;?>" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> Price</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input class="form-control" type="number" id="price" name="price" value="<?=$loadPRD->init_price;?>" style="width:calc(100% - 40px); display:inline-block;" required />
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
                                <textarea class="resizable_textarea form-control" rows="3" id="description" name="description"><?=$loadPRD->description;?></textarea>
                            </div>
                        </div>
                    </div><!--/col-->
                </div><!--/row-->
            
            	<div class="row">
                    <div class="ln_solid"></div>
                    <div class="col-md-3 col-sm-6 col-xs-12"><a href="product_lists.php" class="btn btn-default btn-lg btn-block">Back to Product Lists</a></div>
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
	$('#productid').selectpicker({ liveSearch: false, maxOptions: 1 });
	$('#category').selectpicker({ liveSearch: false, maxOptions: 1 });
});
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
//Del PRD
$(".btn-delPRD").click(function(){
	var prdID = $(this).attr('data-productid'); console.log(prdID)
	var when = $('#when').val(); var bywho = $('#bywho').val(); 
    $.post('product_edit.php?productid='+prdID, { 
		'action':'delPRD','productid':prdID,
		'when':when,'bywho':bywho
	});
	window.location.href = 'product_lists.php?result=removed&productid='+prdID+'&when='+when+'&bywho='+bywho;
});
</script>
