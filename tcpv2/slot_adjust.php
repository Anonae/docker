<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Slot"; 
//$_GET
if($_GET['kioskid']){ $kioskid = $_GET['kioskid']; } else { unset($kioskid);  }
//GET
$kioskid = $_GET["kioskid"];

//Update
if($_POST['action']=='fixedSlot'){ 
	$idSlot =  $_POST['idSlot'];
	$fixedSlot =  $_POST['fixedSlot'];
	for($x=0; $x <= count($idSlot); $x++) : 
		$updateSlot = new slot();
		$updateSlot->id =  $idSlot[$x];
		$fixedID = $updateSlot->load();
		if($fixedID){ 
			$updateSlot->remain = $fixedSlot[$x];
			$updateSlot->time_update = time(); 
			$updateSlot->write();
		}
	endfor;
}

//TCP Code
$loadKiosk = new kiosk();
$loadKiosk->id = $_GET["kioskid"];
$loadKiosk->load();


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
            <li class="breadcrumb-item active">Kiosk <?=($loadKiosk->tcpcode)?$loadKiosk->tcpcode:$loadKiosk->id;?></li>
            <li class="breadcrumb-item active" aria-current="page">Slot Adjust</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Slot <b>Adjust</b> <? if($kioskid){ ?><span>on Kiosk</span> <b><?=($loadKiosk->tcpcode)?$loadKiosk->tcpcode:$loadKiosk->id;?></b> <? } ?>
				<? if($loadKiosk->description){ ?><small style="font-size:16px; margin-left:10px;">( <?=$loadKiosk->description?> )</small><? } ?>
            </h2>
        </div><!--/col-->    
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="dataTables_wrapper">
            <form method="GET">
                <div class="dataTables_custom" style="width:100%;">
                	<div class="dateMonthPicker">
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="fa fa-fw fa-building-o"></i></span>
                            <select id="kioskid" name="kioskid" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;" onchange="this.form.submit()">
                            <? $listKOS = new kiosk(); $listKOS->status = 1; $listKOS->loadmany(); ?>
                           	<? if(!$_GET['kioskid']){ ?><option value="" selected></option><? } ?>
                            <? for($xKos = 0; $xKos < $listKOS->totalrecords; $xKos++): ?>
                                <option data-content="<b><?=($listKOS->tcpcode[$xKos])?$listKOS->tcpcode[$xKos]:$listKOS->id[$xKos];?></b> <span style='font-weight:400;'>( <?=$listKOS->name[$xKos];?> )</span>" value="<?=$listKOS->id[$xKos]?>" <?=($listKOS->id[$xKos] == $_GET['kioskid'])?'selected':''?>><?=$listKOS->id[$xKos]?></option>
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
            <p class="text-th">หน้าระบบจัดการ ข้อมูลจำนวนสินค้า</p>
        </div><!--/x_title-->
        <div class="x_content">
        
        	<div class="dataTables_wrapper">
            	<style type="text/css">
				#filterForm {}
				#filterForm label { font-size:19px; font-weight:600; line-height:41px;}
				div.dataTables_wrapper div.dataTables_length label select { height:41px; font-size:17px;}
				</style>
                <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:0;">
                    <div class="top topSelect" style=" width:50%; display:table; border:none; margin:0; padding:0; float:left;">
                        <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                            <label>เลือกตู้กดน้ำ
                                <select name="kioskid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" >
                                    <option value="" selected>...</option>
                                <? $fetchKOS = new kiosk(); $findKOS = $fetchKOS; $findKOS->status = 1; $findKOS->loadmany(); ?>
                                <? for($xkos = 0; $xkos < $findKOS->totalrecords; $xkos++): ?>
                                <option value="<?=$findKOS->id[$xkos]?>" <?=($kioskid == $findKOS->id[$xkos])?'selected':''?>><? if($findKOS->tcpcode[$xkos]){ echo '<b>'.$findKOS->tcpcode[$xkos].'</b> <span>('.$findKOS->name[$xkos].')</span>'; }else{echo $findKOS->id[$xkos]; }?></option>
                            <? endfor; ?>
                                </select>
                            </label>
                        </div>
                    </div><!--/top-->
                    <? if($kioskid) : ?> 
                    <div style=" width:50%; float:right;">
                        <a class="btn btn-primary btn-block btnSubmitFixedForm" style="float:right; margin-right:0; font-size:19px; font-weight:400;">ยืนยันปรับจำนวน</a>
                    </div>
                    <? endif; ?>
                </form> 
			</div>
 
<? if($kioskid) : ?>       
<style type="text/css">
.tableFillup {}
.tableFillup>tbody>tr>td { line-height:28px;}
.tableFillup>tbody>tr>td input.inputFillup { font-weight: 700; font-size: 20px; height: 28px; width:60px; padding: 0; padding-bottom: 2px; }
.tableFillup>tbody>tr>td a.btn { margin:5px;}
.tableFillup>tbody>tr>td.action { background-color: rgba(38,185,154,0.1);}
.tableFillup>tbody>tr>td.active, .tableFillup>tbody>tr>td.active:hover { background-color: rgba(255,0,0,0.1);}
</style>
        
            <table class="table table-striped table-bordered table-hover tableFillup" style="margin-top:10px;">
                <thead>
                    <tr>
						<th style=" text-align:left;">ช่องปล่อยสินค้า</th>
                        <th style=" text-align:left;">เครื่องดื่ม</th>
                        <th style=" text-align:center;">ราคาขาย</th>
                        <th style=" text-align:center;">ความจุ</th>

                        <th style=" text-align:center; border-left:1px solid #ddd; background-color: rgba(38,185,154,0.8); color:#fff; font-weight:700; font-size: 23px;">ปรับจำนวน</th>
                    </tr>
                </thead>
                
                <tbody>
                <? 	//Fetch Slot
						$fetchSlot = new slot();
						$fetchSlot->kioskid = $_GET["kioskid"];
						$fetchSlot->loadmany();
						//Product ArrayCombine
						$usePRD = new product(); $usePRD->loadmany(); 
						$usePRD->name = array_combine($usePRD->id,$usePRD->product_name);
						$usePRD->price = array_combine($usePRD->id,$usePRD->init_price);
				?>
                <? if($fetchSlot->totalrecords != 0): ?>
                <form id="fixedForm" method="POST" class="form form-group" style="margin-bottom:0;">
              	<input name="action" value="fixedSlot" type="hidden" >
                <? for ($x = 0; $x < $fetchSlot->totalrecords; $x++) :  ?>
                    <tr class="">
						<td id="slotid_<?=$fetchSlot->id[$x]?>" style=" text-align:left;">
                        	<small style="color:#ccc;">(<?=$fetchSlot->id[$x]?>)</small> Slot #<b><?=$fetchSlot->slotid[$x]?></b>
                        </td>
                        <td id="prdid_<?=$fetchSlot->productid[$x]?>" style=" text-align:left;">
							<?=$usePRD->name[$fetchSlot->productid[$x]]?><span style="color:#aaa;">, <?=$usePRD->price[$fetchSlot->productid[$x]]?> บาท</span>
                        </td>
                        <td style=" text-align:center;">
                       	<? if($fetchSlot->price_retail[$x]) : ?>
							<i class="fa fa-heart" style="margin-right:3px; color:#ff69b4;" title="ราคาขายหน้าตู้ (โปรโมชั่น)"></i> 
                            <b style="color:#ff69b4;"><?=$fetchSlot->price_retail[$x]?></b><span style="color:#aaa;"> / <?=$fetchSlot->price[$x]?></span>
                        <? else : ?>
							<?=$fetchSlot->price[$x]?>
                        <? endif; ?>
                        </td>
                        
                        <td style=" text-align:center;">
                        	<span style=" width:30px; display: inline-block; text-align: center; margin: 0 auto;"><?=$fetchSlot->capacity[$x]?></span>
                        </td>
                                             
                        <td class="action" style=" text-align:center;">
                        	<input name="idSlot[]" value="<?=$fetchSlot->id[$x]?>" type="hidden" />
                            <input id="remain_<?=$fetchSlot->id[$x]?>" name="remain" value="<?=$fetchSlot->remain[$x]?>" type="hidden" />
                        	<? $fillup = abs($fetchSlot->capacity[$x] - $fetchSlot->remain[$x]); ?>
							<input id="fixed_<?=$fetchSlot->id[$x]?>" type="number" name="fixedSlot[]" class="form-control input-mini inputFillup" value="<?=$fetchSlot->remain[$x]?>" data-max="<?=$fetchSlot->remain[$x]?>" max="<?=$fetchSlot->capacity[$x]?>" min="0" step="1" />
                            <span style="font-size: 20px; height: 28px; color:#ccc; padding-left:5px;">/ <span style="color:#aaa;"><?=$fetchSlot->capacity[$x]?></span></span>
                        
                        </td>
                        
                    </tr>
                <? endfor; ?>
                </form>
                <? else: ?>
                	<tr><td colspan="7" class="noData"><i>No Data !!!</i></td></tr>
                <? endif; ?>
                	<? /*<tr>
                    	<td colspan="6" class="noData"></td>
                    	<td style="text-align:center;">
                        	<a class="btn btn-silver btnClear">ล้างข้อมูล</a>
                        	<a class="btn btn-silver btnFillmax">เติมหมด</a>
                        </td>
                    </tr> */ ?>
                </tbody>
            </table>
			<div class="dataTables_wrapper">
				<div style=" width:50%; float:right;">
                	<a class="btn btn-primary btn-block btnSubmitFixedForm" style="float:right; margin-right:0; font-size:19px; font-weight:400;">ยืนยันปรับจำนวน</a>
                </div>
			</div>
<? endif; ?>
            
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
});
// Switch Display
$(document).ready(function(){
    $(".btn-kioskshow").click(function(){ 
		$(this).addClass("btn-info"); $(".btn-slotshow").removeClass("btn-info"); 
		$("#slotbox-wrapper").addClass("kioskshow"); 
	});
	$(".btn-slotshow").click(function(){ 
		$(this).addClass("btn-info"); $(".btn-kioskshow").removeClass("btn-info"); 
		$("#slotbox-wrapper").removeClass("kioskshow"); 
	});
});
//Submit Form
$('.btnSubmitFixedForm').click(function(){ 
	$("#fixedForm").submit();
});
$('.inputFillup').change(function() {
	var idSlot = $(this).attr('id').replace('fixed_', ''); 
	var remainSlot = $('#remain_'+idSlot).val(); 
	var fixedSlot = $(this).val();
	if(fixedSlot!=remainSlot){ $(this).parents().addClass('active');
	}else{  $(this).parent().removeClass('active'); }
});
//Auto Fill
/*
$('.btnClear').click(function(){ console.log('Clear Value ...');
	$('input.inputFillup').val(0);
});
$('.btnFillmax').click(function(){ console.log('Fill Max Value ...');
	$('input.inputFillup').each(function() {
		var maxFill = $(this).attr('data-max');
		$(this).val(maxFill);
	});
});*/
</script>
<?php require_once('kiosk_view_modal.php'); ?>
