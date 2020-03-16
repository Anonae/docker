<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Slot Planogram"; 
//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['modelid']){ $modelid = $_GET['modelid']; } else { $modelid = 2; }
if($_GET['kioskid']){ $kioskid = $_GET['kioskid']; } else { unset($kioskid);  }
if($_GET['productid']){ $productid = $_GET['productid']; } else { unset($productid);  }
if($_GET['display']){ $display = $_GET['display']; } else { $display = 25;  }
if($_GET['datefrom']){ $datefrom = $_GET['datefrom']; } else { $datefrom = date('Y-m').'-01';  } //default set to first Day of this month
if($_GET['date']){ $date = $_GET['date']; } else { $date = date('Y-m-t');  }  //default set to last Day of this month
if($_GET['search']){ $search = $_GET['search']; } else { unset($search);  }
//Set Date for Query
$dateStart = strtotime($datefrom.' 00:00:00');
$dateEnd = strtotime($date.' 23:59:59'); 

//Transaction
$sqlA = "SELECT xModel AS model, trn.slot_id, SUM(trn.prd_price) AS sumprice, COUNT(trn.prd_price) AS countprice 
        FROM redbull.transaction_buy AS trn 
        INNER JOIN ( 
                SELECT kos.id AS xID, kos.modelid AS xModel, kmod.slot_amount AS xSlot, kmod.placement AS xPlace 
                FROM redbull.kiosk AS kos 
                LEFT JOIN ( 
                    SELECT id, slot_amount, placement FROM redbull.kiosk_model 
                    WHERE status = 0 
            ) AS kmod ON kos.modelid = kmod.id 
            WHERE kos.status = 1 ) 
            AS sold ON trn.kiosk_id = xID 
            WHERE trn.status = 0";


$sqlA .= " AND xModel = {$modelid}";
$sqlA .= " AND trn.time_update BETWEEN {$dateStart} AND {$dateEnd} ";
$sqlA .= " GROUP BY xModel, trn.slot_id";

 

//Separate Query
$sqlList = $sqlA; $sqlList .= " ORDER BY xModel DESC, slot_id ASC";

$resList = ROOT::query($sqlList);
while($rowList = mysqli_fetch_array($resList,MYSQLI_ASSOC)){ $listSLOT[$rowList["slot_id"]] = $rowList; $totalRecords += $rowList[countprice]; $totalSales += $rowList[sumprice]; } //vd($listSLOT); die;
$sqlRank = $sqlA; $sqlRank .= " ORDER BY countprice DESC";

//echo $sqlRank;
$resRank = ROOT::query($sqlRank);
while($rowRank = mysqli_fetch_array($resRank,MYSQLI_ASSOC)){ $rankSLOT[] = $rowRank; } //vd($rankSLOT); die;
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
            <li class="breadcrumb-item"><a href="transaction_lists.php">Sales</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$pageTitle?></li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->

<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2><?=$pageTitle?> 
            	<span style="font-size:15px;">on 
                    <b class="text-green"><?=($datefrom)?$datefrom:''?></b> to <b class="text-green"><?=($date)?$date:''?></b>
                </span>
            </h2>
        </div><!--/col-->     
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="dataTables_wrapper">
                <div class="dataTables_custom" style=" width:100%;">
                    <div class="dateRangePicker topPageDisplay">
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                            <input name="" id="dateRangeTCP" class="form-control mainDatePicker" value="" autocomplete="off" />
                            <input class="form-control input-sm" style="left:34px;" id="datefromClone" value="<?=($datefrom)?$datefrom:''?>"  />
                            <input class="form-control input-sm" style="right:0;" id="dateClone" value="<?=($date)?$date:''?>"  />
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/col--> 
    </div><!--/content-title-->
</div><!--/row-->     

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel cards cardRank">
            <div class="x_title">
                <div class="dataTables_wrapper">
<style type="text/css">
/*SelectCustomModel*/
.selectCustomModel { box-shadow:none; margin-top:-10px; margin-left: 10px !important;}
.selectCustomModel>.btn.dropdown-toggle { border:none; box-shadow:none; font-size:19px; font-weight:500; padding:2px 10px; border:1px solid #26b99a; }
.selectCustomModel.open>.btn.dropdown-toggle,
.selectCustomModel>.btn.dropdown-toggle:hover,
.selectCustomModel>.btn.dropdown-toggle:active,
.selectCustomModel>.btn.dropdown-toggle:focus { background-color:#fff; border:1px solid #26b99a ;}
.selectCustomModel>.btn.dropdown-toggle .filter-option { color:#000; font-size:19px;}
.selectCustomModel>.btn.dropdown-toggle .filter-option>span { font-weight:300; font-size:15px;}
</style>
				<p class="text-th" style="margin-bottom:10px;">จำแนกความถี่ การใช้งาน ตามแผนผังหน้าตู้กดน้ำ</p>
                <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:0;">
                    <div class="top topSelect" style=" width:100%; display:table; border:none; margin:0; padding:0;">
                    	<div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                            <label style="font-size:17px; font-weight:500;">เฉพาะประเภทตู้กดน้ำ 
                                <select name="modelid" class="form-control input-sm selectpicker selectCustomModel" onchange="this.form.submit()">
                                    <option value="" selected>...</option>
                                <? $fetchMOD = new kiosk_model(); $findMOD = $fetchMOD; $findMOD->status = 0; $findMOD->loadmany(' ORDER BY slot_amount ASC'); ?>
                                <? for($xmod = 0; $xmod < $findMOD->totalrecords; $xmod++): ?>
                                <option value="<?=$findMOD->id[$xmod]?>" data-content="<b><?=$findMOD->model_name[$xmod]?></b>, <span><?=$findMOD->slot_amount[$xmod]?> Slot / <?=$findMOD->placement[$xmod]?> Placement</span>" <?=($modelid == $findMOD->id[$xmod])?'selected':''?>><?=$findMOD->id[$xmod]?></option>
                            <? endfor; ?>
                                </select>
                            </label>
                        </div>
                        <div class="dataTables_custom">
                            <div class="dateRangePicker displayOnly form-inline sr-only">
                                <span>From</span>
                                <input class="form-control input-sm" name="datefrom" id="datefrom" value="<?=($datefrom)?$datefrom:''?>" autocomplete="off" />
                                <span>To Date</span>
                                <input class="form-control input-sm" name="date" id="date" value="<?=($date)?$date:''?>" autocomplete="off" />
                                <span>Displayed.</span>
                            </div>
                        </div>
                    </div><!--/top-->
                    
                </form>
            	</div>
                <p class="text-help" style="padding-top:10px;">
                	ใช้ข้อมูลการขาย ตั้งแต่วันที่ <b class="text-green"><?=($datefrom)?$datefrom:''?></b> ถึง <b class="text-green"><?=($date)?$date:''?></b>
                    รวมทั้งหมด <b class="text-green"><?=number_format($totalRecords,0)?></b> รายการ
                </p>
            </div>
            <div class="x_content">
          
<!-- Display Placement ///////////////////////////////////////////////// -->  
<?php 
	//Query Placement
	$loadPlacement = new kiosk_model(); $loadPlacement->status = 0; $loadPlacement->id = $modelid; $loadPlacement->load();
        
	//LoopFor new Array
	for($xSort=0; $xSort <= $loadPlacement->placement; $xSort++){
		//Create Array
		$sortSlot[$rankSLOT[$xSort]['slot_id']] = array(
			'rankid'=>$xSort+1, 
			'slotid'=>$rankSLOT[$xSort]['slot_id'], 
			'sumprice'=>$rankSLOT[$xSort]['sumprice'], 
			'countprice'=>$rankSLOT[$xSort]['countprice']
		);	
	}
	//LoopFor Placement
	for($xPm=1; $xPm <= $loadPlacement->placement; $xPm++) : 
?>       
<div class="slotbox col-md-12 col-sm-12 col-xs-12 <? if($loadPlacement->placement==36){ echo 'width12'; }elseif($loadPlacement->placement==30){ echo 'width10'; } ?>">
	<?php $colorRank = '';
	if(!$sortSlot[$xPm]['rankid']){$colorRank='#eee';}
	elseif($sortSlot[$xPm]['rankid']==1){$colorRank='#ff69b4';}
	elseif($sortSlot[$xPm]['rankid']==2){$colorRank='#ff4500';}
	elseif($sortSlot[$xPm]['rankid']==3){$colorRank='#ffa500';}
	elseif($sortSlot[$xPm]['rankid']<=5){$colorRank='#cba582';}
	elseif($sortSlot[$xPm]['rankid']<=9){$colorRank='#c0c0c0';}
	else{$colorRank='#ddd';} 
	?>
	<div class="slotbox-header" style=" border: 1px solid <?=$colorRank?>; background-color:<?=$colorRank?>;">
        <span class="slotText">ช่องเก็บ #</span>
        <b style="font-weight:700; margin-right:5px; color:#fff;"><?=$xPm?></b>
    </div><!--/slotbox-header-->
    
    <div class="slotbox-content slotRank" style="border: 1px solid <?=$colorRank?>; ">
    	<!--Rank-->
    	<div class="wrapRank">
            <div class="displayRank"><div class="titleRank">Rank</div>
            	<div class="badgeRank">
            	<? if(!$sortSlot[$xPm]['rankid']): echo '<b>';
				elseif($sortSlot[$xPm]['rankid']==1): echo '<i class="fa fa-fw fa-certificate" style="color:#ff69b4;"></i><b class="labelRank">';
                elseif($sortSlot[$xPm]['rankid']==2): echo '<i class="fa fa-fw fa-certificate" style="color:#ff4500;"></i><b class="labelRank">';
                elseif($sortSlot[$xPm]['rankid']==3): echo '<i class="fa fa-fw fa-certificate" style="color:#ffa500;"></i><b class="labelRank">';
                elseif($sortSlot[$xPm]['rankid']<=5): echo '<i class="fa fa-fw fa-certificate" style="color:#cba582;"></i><b class="labelRank">';
                elseif($sortSlot[$xPm]['rankid']<=9): echo '<i class="fa fa-fw fa-certificate" style="color:#c0c0c0;"></i><b class="labelRank">';
                else: echo '<b style="font-weight:300; color:#aaa;">';
				endif; ?><?=$sortSlot[$xPm]['rankid']?></b>
                </div>
            </div>
        </div>
        <!--Times-->
		<div style="width:100%; display:block; border-top:1px dotted #ccc; margin-top:5px; padding-top:5px;">
            <div style="text-align:left; font-size:11px; color:#ddd;">Hit Times</div>
            <div style="text-align:right; font-weight:500; color:<?=(!$sortSlot[$xPm]['rankid'])?'#ddd':'#333';?>;">
				<?=number_format($listSLOT[$xPm]['countprice'],0)?><span style="font-size: 9px;font-weight: 300;color: #bbb;padding-left: 3px;">TIME</span>
            </div>
        </div>

    </div><!--/slotbox-content-->
    
</div>
<? endfor; ?>             
<!-- End Placement /////////////////////////////////////////////////////-->      
        
            </div><!--/x_content-->
        </div><!--/x_panel-->
    </div><!--/col-md-12-->
</div><!--/row-->

<?php /*
<!--Filter-->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="padding-top:5px; padding-bottom:1px; margin-bottom:0;">
        	<div class="x_content">
				<div class="dataTables_wrapper">
                <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:0;">
                    <div class="top topSelect" style=" width:100%; display:table; border:none; margin:0; padding:0;">
                    	<div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                            <label>เลือกตู้กดน้ำ
                                <select name="kioskid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" >
                                    <option value="" selected>...</option>
                                <? $fetchKOS = new kiosk(); $findKOS = $fetchKOS; $findKOS->status = 0; $findKOS->loadmany(); ?>
                                <? for($xkos = 0; $xkos < $findKOS->totalrecords; $xkos++): ?>
                                <option value="<?=$findKOS->id[$xkos]?>" <?=($kioskid == $findKOS->id[$xkos])?'selected':''?>><?=($findKOS->tcpcode[$xkos])?$findKOS->tcpcode[$xkos].' ('.$findKOS->name[$xkos].')':$findKOS->id[$xkos]?></option>
                            <? endfor; ?>
                                </select>
                            </label>
                        </div>
                        <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                            <label>เลือกเจาะจงเฉพาะสินค้า
                                <select name="productid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" >
                                    <option value="" selected>...</option>
                                <? $listPRD = new product(); $listPRD->loadmany(); ?>
                                <? for($xsPRD = 0; $xsPRD < $listPRD->totalrecords; $xsPRD++): ?>
                                    <option value="<?=$listPRD->id[$xsPRD]?>" <?=($productid == $listPRD->id[$xsPRD])?'selected':''?>><?=$listPRD->product_name[$xsPRD]?></option>
                                <? endfor; ?>
                                </select>
                            </label>
                        </div>
                        <div class="dataTables_custom">
                            <div class="dateRangePicker displayOnly form-inline">
                                <span>ตั้งแต่วันที่</span>
                                <input class="form-control input-sm" name="datefrom" id="datefrom" value="<?=($datefrom)?$datefrom:''?>" autocomplete="off" />
                                <span>ถึง</span>
                                <input class="form-control input-sm" name="date" id="date" value="<?=($date)?$date:''?>" autocomplete="off" />
                            </div>
                        </div>
                    </div><!--/top-->
                </form>
            	</div>
            </div><!--/x_content--> 
		</div><!--/x_panel--> 
	</div><!--/col-md-12-->
</div><!--/row--> */ ?>

<!--Details-->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel cards cardRank">
            <div class="x_content"> 
                <table class="table table-hover tableDateDetails">
                <thead>
                <tr>
                	<th style="text-align:left;">ชั้นวาง</th>
                	<th style="text-align:left;">หมายเลขช่องวางสินค้า</th>
                    <th style="text-align:right; border-left:1px solid #ddd">ยอดขายรวม</th>
                    <th style="text-align:right;">คิดเป็น %</th>
                    <th style="text-align:right; border-left:1px solid #ddd;">ทำรายการทั้งหมด</th>
				</tr>
                </thead>
                <tbody>
                <style type="text/css"> 
                        .tableDateDetails tr.disabled { filter: grayscale(1); opacity:0.3;}
                        .tableDateDetails tr.disabled:hover { background-color:inherit;}
                        .tableDateDetails .unit { font-size:11px; font-weight:300; color:#ccc; padding-left:3px;} 
                </style>
				<?php
					//Find Model ID
					$listMOD = new kiosk_model(); $listMOD->status = 0; $listMOD->id = $modelid; $listMOD->load();
					for($x=1; $x < $listMOD->placement+1; $x++) : 
						$listSLOTINDEX = $listSLOT[$x]['sumprice']/$totalRecords;
				?>
				<tr class="">
                	<td style="text-align:left;">
                    <? if($listMOD->placement==30): ?>
                    	<? if($x<=10){ ?>ด้านบนสุด<? }elseif($x<=20){ ?>ชั้นตรงกลาง<? }elseif($x<=30){ ?>ด้านล่างสุด<? }else{ echo 'ไม่ได้ระบุ';} ?>
                    <? elseif($listMOD->placement==36): ?>
                    	<? if($x<=12){ ?>ด้านบนสุด<? }elseif($x<=24){ ?>ชั้นตรงกลาง<? }elseif($x<=36){ ?>ด้านล่างสุด<? }else{ echo 'ไม่ได้ระบุ';} ?>
                    <? endif; ?>
                    </td>
                    <td style="text-align:left;">
                    	ช่องวางหมายเลข <b style="font-weight:500; color:#000; letter-spacing:1px; padding-left:5px;"><?=$x?></b>
                    </td>
                    <td style="text-align:right; border-left:1px solid #ddd; <?=($listSLOT[$x]['sumprice']>0)?'font-weight: 700; color:#26B99A;':''?>">
						<span style=" <?=($listSLOT[$x]['sumprice']>0)?'':'color:#ccc;'?>"><?=number_format($listSLOT[$x]['sumprice'],0)?></span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;"><?=($listSLOT[$x]['countprice']>0)?number_format($listSLOTINDEX,2).' %':'- '?></td>
                    <td style="text-align:right; border-left:1px solid #ddd; <?=($listSLOT[$x]['countprice']>0)?'font-weight: 700;':''?>">
						<span style=" <?=($listSLOT[$x]['countprice']>0)?'':'color:#ccc;'?>"><?=number_format($listSLOT[$x]['countprice'],0)?></span> <span class="unit">Record</span>
                    </td>
				</tr>
				<? endfor; ?>
                </tbody>
                </table>
            </div><!--/x_content-->
        </div><!--/x_panel-->
    </div><!--/col-->
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

//DateRange
var startDate; var endDate;
$(document).ready(function() {
	$('#dateRangeTCP').daterangepicker({
		maxDate: moment(), startDate: moment().startOf('month'), endDate: moment().endOf('month'),
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
			'Last 7 Days': [moment().subtract('days', 6), moment()],
			'Last 30 Days': [moment().subtract('days', 29), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')],
			'Last 3 Month': [moment().subtract('month', 3).startOf('month'), moment().subtract('month', 1).endOf('month')]
		},
		alwaysShowCalendars: true, showCustomRangeLabel: false, showDropdowns: true,
		opens: 'left', buttonClasses: ['btn btn-default'], applyClass: 'btn-small btn-primary', cancelClass: 'btn-small btn-danger',
		locale: { format: 'YYYY-MM-DD', applyLabel: 'Submit', cancelLabel: 'Del'}
	}, function(start, end) {
		//console.log('from ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD')); 
		startDate = start; endDate = end;
		$("#datefrom").val(start.format('YYYY-MM-DD')); $("#date").val(end.format('YYYY-MM-DD'));
		$("#datefromClone").val(start.format('YYYY-MM-DD')); $("#dateClone").val(end.format('YYYY-MM-DD'));
		document.getElementById("filterForm").submit();
	});
	//Set the initial state of the picker label
	$('#dateRangeTCP').val('');
	$('.cancelBtn').click(function(){
		$('#datefrom').val(''); $('#date').val(''); $('#datefromClone').val(''); $('#dateClone').val('');
		document.getElementById("filterForm").submit();
	});
	<? if(!$date): ?>
		$("#datefrom").val(moment().startOf('month').format('YYYY-MM-DD')); $("#date").val(moment().endOf('month').format('YYYY-MM-DD'));
		$("#datefromClone").val(moment().startOf('month').format('YYYY-MM-DD')); $("#dateClone").val(moment().endOf('month').format('YYYY-MM-DD'));
	<? endif; ?>
});
</script> 