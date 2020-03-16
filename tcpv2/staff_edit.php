<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Staff"; 

//Insert
if($_POST['action'] == 'edited'): 
	$edit = new lineusers();
	$edit->id = $_GET['staffid'];
	if($edit->load()){ 
		$edit->displayname = $_POST['displayname'];
		$edit->mobile = $_POST['mobile'];
        $edit->description  = $_POST['description'];
		$edit->per_id = $_POST['per_id'];
		$edit->route_id = $_POST['route_id'];              
		$edit->lastupdate = time(date('Y-m-d H:i:s'));
		$editedID = $edit->write();
		//Return Massage
		if($editedID){ ROOT::redirect("staff_edit.php?result=edited&staffid=".$editedID."&when=".$_POST['when']."&bywho=".$_POST['bywho']);                
		}else{ die('Server Insert Offline'); } 
	}else{ die('No Data Found'); }
endif;
//Delete
if($_POST['action'] == 'archived'): 
	$del = new lineusers();
	$del->id = $_GET['staffid'];
	if($del->load()){
		$del->status = 0;                
		$del->lastupdate = time(date('Y-m-d H:i:s'));
		$deletedID = $del->write();
		//Return Massage
		if($deletedID){ ROOT::redirect("staff_lists.php?result=archived&staffid=".$deletedID."&when=".$_POST['when']."&bywho=".$_POST['bywho']);                
		}else{ die('Server Delete Offline'); } 
	}else{ die('No Data Found - Archived'); }
endif;

//Staff
$loadStaff = new lineusers();
$loadStaff->id = $_GET['staffid'];
$loadStaff->status = 1;
$loadStaff->load();

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
                            <select id="userid" name="staffid" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;" onchange="this.form.submit()">
                            <? $listUSER = new lineusers(); $listUSER->status = 1; $listUSER->loadmany(); ?>
                            <? for($xsuser = 0; $xsuser < $listUSER->totalrecords; $xsuser++): ?>
                                <option data-content="<?=($listUSER->displayname[$xsuser])?$listUSER->displayname[$xsuser]:$listUSER->name[$xsuser];?><span style='font-weight:300;color:#999;'>, (<?=$listUSER->per_id[$xsuser]?>)</span>" value="<?=$listUSER->id[$xsuser]?>" <?=($listUSER->id[$xsuser] == $_GET['staffid'])?'selected':''?>><?=$listUSER->name[$xsuser]?></option>
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
        <div class="x_title row">
            <div class="col-md-8"><p class="text-th">แก้ไขข้อมูล เจ้าหน้าที่เข้าใช้งาน</p></div>
            <div class="col-md-4">
            	<form class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate>
                <input type="hidden" name="action" value="archived">
                <input id="bywho" name="bywho" value="<?=$_SESSION['name']?>" style="display:none;" />
                <input id="when" name="when" value="<?=date('Y-m-d H:i:s')?>" style="display:none;" /> 
                <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-9"><button class="btn btn-block btn-sm btn-danger" type="submit" >Archived</button></div>
                </form>
            </div>
        </div><!--/x_title-->
<? if(isset($_GET['result'])){ ?>
<div class="alert alert-success alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-fw fa-close"></i></button>
	User ID <b><?=$_GET['staffid']?></b>, has been <?=$_GET['result']?> <b>Successful</b>.
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
                        <? if(!$loadStaff->picture): ?>
                        	<img id="preview" src="" class="img-responsive" style="max-height:300px; margin:0 auto;">
                        <? else: ?>
                            <img id="preview" src="<?=$loadStaff->picture?>" class="img-responsive" style="max-height:300px; margin:0 auto; background: #f7f7f7; border: 1px solid #e6e6e6; padding: 2px; box-shadow: 0 10px 20px -10px rgba(0,0,0,0.35); border-radius: 100%;">
                        <? endif; ?>
                        </div>
                    </div><!--/col-->
                    
                    <div class="col col-md-9 col-sm-8 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Display Name</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="displayname" name="displayname" value="<?=($loadStaff->displayname)?$loadStaff->displayname:''?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Line Name</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="linename" name="linename" value="<?=($loadStaff->name)?$loadStaff->name:''?>" required readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Line UserID</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="lineuserid" name="lineuserid" value="<?=$loadStaff->UserId?>" required readonly />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Permission</label>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <select id="permission" name="per_id" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;">
								<? $listPERMIS = new permission(); $listPERMIS->status = 0; $listPERMIS->loadmany(); ?>
                                	<option value="0" <?=($listPERMIS->id[$xsrot])?'selected':''?>>...</option>
                                <? for($xspermis = 0; $xspermis < $listPERMIS->totalrecords; $xspermis++): ?>
                                    <option data-content="<b style='font-weight:600;'><?=$listPERMIS->name[$xspermis]?></b> <span>(<?=$listPERMIS->description[$xspermis]?>)</span>" value="<?=$listPERMIS->id[$xspermis]?>" <?=($listPERMIS->id[$xspermis] == $loadStaff->per_id)?'selected':''?>><?=$listPERMIS->name[$xspermis]?></option>
                                <? endfor; ?>
                                </select>
                                <p class="text-help">สิทธิการเข้าใช้งานระบบ</p>
                            </div>
                        </div>
                        <div class="form-group form-group-route" style="display:none;">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Route</label>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <select id="route" name="route_id" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;">
								<? $listROUTE = new route(); $listROUTE->status = 0; $listROUTE->loadmany(); ?>
                                	<option value="0" <?=($listROUTE->id[$xsrot])?'selected':''?>>...</option>
                                <? for($xsrot = 0; $xsrot < $listROUTE->totalrecords; $xsrot++): ?>
                                    <option data-content="<b style='font-weight:600;'><?=$listROUTE->name[$xsrot]?></b> <span>(<?=$listROUTE->area[$xsrot]?>)</span>" value="<?=$listPERMIS->id[$xsrot]?>" <?=($listPERMIS->id[$xsrot] == $loadStaff->route_id)?'selected':''?>><?=$listROUTE->name[$xsrot]?></option>
                                <? endfor; ?>
                                </select>
                                <p class="text-help">เส้นทางการเดินรถ (สำหรับพนักงานหน่วยรถ)</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="mobile" name="mobile" value="<?=($loadStaff->mobile)?$loadStaff->mobile:''?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="description" name="description" value="<?=($loadStaff->description)?$loadStaff->description:''?>" required />
                            </div>
                        </div>
                    </div><!--/col-->
                    
                </div><!--/row-->
            
            	<div class="row">
                    <div class="ln_solid"></div>
                    <div class="col-md-3 col-sm-6 col-xs-12"><a href="staff_lists.php" class="btn btn-default btn-lg btn-block">Back to Staff Lists</a></div>
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
//Route Setup
$('#permission').change(function() {
	var idPermis = $(this).val(); console.log(idPermis);
	if(idPermis>10){ $('.form-group-route').fadeIn(300).show();
	} else { $('.form-group-route').hide(); }
});
</script>
