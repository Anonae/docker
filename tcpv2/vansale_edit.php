
<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "VanSales"; 

//Insert
if($_POST['action'] == 'edited'):
	$edit = new vansale();
	$edit->id = $_GET['vanid'];
	if($edit->load()){ 
		$edit->name = $_POST['name'];
		$edit->license = $_POST['license'];
		$edit->routeid = $_POST['routeid'];
		$edit->description = $_POST['description'];
		$edit->lastupdate = time(date('Y-m-d H:i:s'));
		$editedID = $edit->write();
		//Return Massage
		if($editedID){ ROOT::redirect("vansale_edit.php?result=edited&vanid=".$editedID."&when=".$_POST['when']."&bywho=".$_POST['bywho']);                
		}else{ die('Server Insert Offline'); }
	}else{ die('No Data Found'); }
endif;

//Route
$loadVAN = new vansale();
$loadVAN->id = $_GET['vanid'];
$loadVAN->load();

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
            <li class="breadcrumb-item"><a href="vansale_lists.php"><?=$pageTitle?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Editor</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-7 col-sm-7 col-xs-12">
            <h2><?=$pageTitle?> <b>Editor</b></h2>
        </div><!--/col-->  
        <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="dataTables_wrapper">
            <form method="GET">
                <div class="dataTables_custom" style="width:100%;">
                	<div class="dateMonthPicker">
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="fa fa-fw fa-truck"></i></span>
                            <select id="vanid" name="vanid" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;" onchange="this.form.submit()">
                            <? $listVAN = new vansale(); $listVAN->status = 0; $listVAN->loadmany(); ?>
                            <? for($xsvan = 0; $xsvan < $listVAN->totalrecords; $xsvan++): ?>
                                <option data-content="<?=$listVAN->name[$xsvan]?> <span style='font-weight:300;color:#999;'>(<?=$listVAN->license[$xsvan]?>)</span> <span style='font-weight:300;color:#999;'>, <?=$listVAN->area[$xsvan]?></span>" value="<?=$listVAN->id[$xsvan]?>" <?=($listVAN->id[$xsvan] == $_GET['vanid'])?'selected':''?>><?=$listVAN->name[$xsvan]?></option>
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
            <p class="text-th">แก้ไขข้อมูล รถยนต์ขนสินค้า</p>
        </div><!--/x_title-->
<? if(isset($_GET['result'])){ ?>
<div class="alert alert-success alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-fw fa-close"></i></button>
	VanSale ID <b><?=$_GET['vanid']?></b>, has been <?=$_GET['result']?> <b>Successful</b>.
    <i style="margin-left:10px; color:rgba(255,255,255,0.5);">on <?=$_GET['when']?> by <?=$_GET['bywho']?></i>
</div>
<? } ?>
        <div class="x_content">
        	<form class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate>
            <input type="hidden" name="action" value="edited">
            <input id="bywho" name="bywho" value="<?=$_SESSION['name']?>" style="display:none;" />
            <input id="when" name="when" value="<?=date('Y-m-d H:i:s')?>" style="display:none;" /> 

                <div class="row">
                
                	<div class="col col-md-3 col-sm-4 col-xs-12 col-image">
                    	<div class="form-group" style="text-align:center;">
                            <i class="fa fa-fw fa-truck" style=" font-size:12vw; margin:0 auto;"></i>
                        </div>
                    </div><!--/col-->
                    
                    <div class="col col-md-9 col-sm-8 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> VanSale Name</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="name" name="name" value="<?=($loadVAN->name)?$loadVAN->name:''?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> License Plate</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="license" name="license" value="<?=($loadVAN->license)?$loadVAN->license:''?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Route</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select id="routeid" name="routeid" class="form-control input-sm selectpicker selectCustomW100">
                                <? $listROT = new route(); $listROT->status = 0; $listROT->loadmany(); ?>
								<? for($xsrot = 0; $xsrot < $listROT->totalrecords; $xsrot++){ ?>
                                    <option data-content="<span style='font-weight:300;color:#999;'>(<?=$listROT->id[$xsrot]?>)</span> <?=$listROT->name[$xsrot]?><span style='font-weight:300;color:#999;'>, <?=$listROT->area[$xsrot]?></span>" value="<?=$listROT->id[$xsrot]?>" <?=($listROT->id[$xsrot] == $loadVAN->area)?'selected':''?>><?=$listROT->name[$xsrot]?></option>
                                <? } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="resizable_textarea form-control" rows="3" id="description" name="description"><?=($loadVAN->description)?$loadVAN->description:''?></textarea>
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
	$('#vanid').selectpicker({ liveSearch: false, maxOptions: 1 });
	$('#routeid').selectpicker({ liveSearch: false, maxOptions: 1 });
});
</script>
