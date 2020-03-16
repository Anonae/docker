
<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "User"; 

//Insert
if($_POST['action'] == 'edited'):
	$edit = new owner();
	$edit->id = $_GET['userid'];
	if($edit->load()){ 
		$edit->name = $_POST['name'];
		$edit->mobile = $_POST['mobile'];
		$edit->email = $_POST['email'];
		$edit->type = $_POST['type'];
		$edit->description = $_POST['description'];
		$edit->lastupdate = time(date('Y-m-d H:i:s'));
		$editedID = $edit->write();
		//Return Massage
		if($editedID){ ROOT::redirect("user_edit.php?result=edited&userid=".$editedID."&when=".$_POST['when']."&bywho=".$_POST['bywho']);                
		}else{ die('Server Insert Offline'); }
	}else{ die('No Data Found'); }
endif;

//Route
$loadUSER = new owner();
$loadUSER->id = $_GET['userid'];
$loadUSER->load();

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
            <li class="breadcrumb-item"><a href="user_lists.php"><?=$pageTitle?></a></li>
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
                            <span class="add-on input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                            <select id="userid" name="userid" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;" onchange="this.form.submit()">
                            <? $listUSER = new owner(); $listUSER->status = 0; $listUSER->loadmany(); ?>
                            <? for($xsuser = 0; $xsuser < $listUSER->totalrecords; $xsuser++): ?>
                                <option data-content="<?=$listUSER->name[$xsuser]?><span style='font-weight:300;color:#999;'>, (<?=$listUSER->id[$xsuser]?>) <?=$listUSER->username[$xsuser]?></span>" value="<?=$listUSER->id[$xsuser]?>" <?=($listUSER->id[$xsuser] == $_GET['userid'])?'selected':''?>><?=$listUSER->name[$xsuser]?></option>
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
            <p class="text-th">แก้ไขข้อมูล เจ้าหน้าที่เข้าใช้งาน</p>
        </div><!--/x_title-->
<? if(isset($_GET['result'])){ ?>
<div class="alert alert-success alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-fw fa-close"></i></button>
	User ID <b><?=$_GET['vanid']?></b>, has been <?=$_GET['result']?> <b>Successful</b>.
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
                            <i class="fa fa-fw fa-user" style=" font-size:12vw; margin:0 auto;"></i>
                        </div>
                    </div><!--/col-->
                    
                    <div class="col col-md-9 col-sm-8 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required">*</span> Full Name</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="name" name="name" value="<?=($loadUSER->name)?$loadUSER->name:''?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Username</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="username" name="username" value="<?=($loadUSER->username)?$loadUSER->username:''?>" required readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="number" id="mobile" name="mobile" value="<?=($loadUSER->mobile)?$loadUSER->mobile:''?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">E-Mail</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="email" name="email" value="<?=($loadUSER->email)?$loadUSER->email:''?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <select id="type" name="type" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;" onchange="this.form.submit()">
								<? $listPERMIS = new permission(); $listPERMIS->status = 0; $listPERMIS->loadmany(); ?>
                                <? for($xspermis = 1; $xspermis < $listPERMIS->totalrecords; $xspermis++): ?>
                                    <option data-content="<?=$listPERMIS->name[$xspermis]?>" value="<?=$listPERMIS->id[$xspermis]?>" <?=($listPERMIS->id[$xspermis] == $loadUSER->type)?'selected':''?>><?=$listPERMIS->name[$xspermis]?></option>
                                <? endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="description" name="description" value="<?=($loadUSER->description)?$loadUSER->description:''?>" required />
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
	$('#userid').selectpicker({ liveSearch: false, maxOptions: 1 });
	$('#type').selectpicker({ liveSearch: false, maxOptions: 1 });
});
</script>
