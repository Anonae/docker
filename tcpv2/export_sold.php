<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Sold Report - Account"; 
//$_GET
if($_GET['kioskid']){ $kioskid = $_GET['kioskid']; } else { unset($kioskid);  }
if($_GET['datefrom']){ $datefrom = $_GET['datefrom']; } else { $datefrom = date('Y-m').'-01';  } //default set to first Day of this month
if($_GET['date']){ $date = $_GET['date']; } else { $date = date('Y-m-t');  }  //default set to last Day of this month
//Set Date for Query
$dateStart = strtotime($datefrom.' 00:00:00');
$dateEnd = strtotime($date.' 23:59:59');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('inc_head.php'); ?>	
    <title><?=$pageTitle?>, <?=$siteTitle?></title> 
<?php require_once('inc_head_href.php'); ?>	
</head>

<body style="background-color:#fff;">

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->


	<div class="content-title" style="padding-top:15px;">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2><?=$pageTitle?> 
            	<span style="font-size:15px;">on 
                    <b class="text-green"><?=($datefrom)?$datefrom:''?></b> to <b class="text-green"><?=($date)?$date:''?></b>
                </span>
                <button class="btn btn-md btn-dark btn-export-file" style="float:right;">Export Excel</button>
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
                    <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:0; display:none;">
                        <input class="form-control input-sm" name="datefrom" id="datefrom" value="<?=($datefrom)?$datefrom:''?>" autocomplete="off" />
                        <input class="form-control input-sm" name="date" id="date" value="<?=($date)?$date:''?>" autocomplete="off" />
                    </form>
                </div>
            </div>
        </div><!--/col--> 
    </div><!--/content-title-->

<style type="text/css">/*
table { font-family:'Tahoma'; font-size:13px;}
table td { border:1px solid #000; padding:2px;}*/
</style>
<div id="export-data" data-filename="sold_<?=date('Ymd',$dateStart).'_'.date('Ymd',$dateEnd)?>" style="border-top:2px solid #4B5F71;">
<table class="table">
<!--<thead>
	<tr><th colspan="8"><h3>รายงานสรุปยอดการขาย</h3>รองรับการเทียบรายงาน ตามเอกสาร Excel จากทางบัญชีของ TCP</th></tr>
</thead>-->
<thead>
<tr style=" background-color:#eee;">
        <td>Sold Date</td>
        <td>Ship Kiosk</td>
        <td>Ship Name</td>
        <td>SKU</td>
        <td>Product</td>
        <td>Quantity</td>
        <td>Price/Unit (THB)</td>
        <td>Income (THB)</td>
    </tr>
</thead>
<tbody>   

<?php 
//Bypass PRD
$usePRD = new product(); $usePRD->loadmany(); 
$usePRD->name = array_combine($usePRD->id,$usePRD->product_name);
$usePRD->price = array_combine($usePRD->id,$usePRD->init_price);
$usePRD->SKU = array_combine($usePRD->id,$usePRD->SKU);
//Bypass Kiosk
$useKiosk = new kiosk(); $useKiosk->loadmany(); 
$useKiosk->name = array_combine($useKiosk->id,$useKiosk->name);
$useKiosk->description = array_combine($useKiosk->id,$useKiosk->description);
?>

<?php
//All Kiosk
$findKiosk = new kiosk();
$findKiosk->status = 1;
//$findKiosk->id = 2623;
$findKiosk->loadmany(); //$findKiosk->track(); die;

//For Kiosk All
for($i=0; $i < $findKiosk->totalrecords; $i++) {
	//Find Reset Time while Selected Date/Month
	$findReset = new kiosk_balance_reset();
	$findReset->kiosk_id = $findKiosk->id[$i];
	//$findReset->kiosk_id = 2323;
		$sqlReset .= " AND resetdate BETWEEN {$dateStart} AND {$dateEnd}";
	$findReset->loadmany( $sqlReset . " ORDER BY resetdate DESC");
	
?>
	<!--<tr style="border-bottom:2px solid #ddd; background-color:#26B99A;">
    	<td colspan="8" align="left" style="color:#fff;">
        	(<?=$findKiosk->id[$i]?>) <?=$useKiosk->description[$findKiosk->id[$i]]?>
        	<span style=" padding-left:15px; color:#42d8b8;">Total Reset Time : <?=$findReset->totalrecords?> Time</span>
        </td>
    </tr>-->
<?php
	//For Reset Time
	for($z=0; $z < $findReset->totalrecords; $z++) { //echo $findKiosk->id[$i].' / '.$z.' - '.$findReset->totalrecords.'<br>';
		if($findReset->resetdate[$z]){ // no collect TRN that not still in Kiosk
			//Find Previous ResetDate
			$sqlPrev[$z] = "
				SELECT * 
				FROM kiosk_balance_reset 
				WHERE kiosk_id = {$findKiosk->id[$i]} AND resetdate < {$findReset->resetdate[$z]}
				";
			$sqlPrev[$z] .= " ORDER BY id DESC LIMIT 1 ";
			$resultPrev[$z] = ROOT::query($sqlPrev[$z]);
			while($rowPrev[$z] = mysqli_fetch_array($resultPrev[$z],MYSQLI_ASSOC)){ $loadPrevReset[$findKiosk->id[$i]][$z] = $rowPrev[$z][resetdate]; $loadPrevID[$z] = $rowPrev[$z][id];} 
			//Set new DateStart & DateEnd
			if($loadPrevReset[$findKiosk->id[$i]][$z]){ $dateStartReset = $loadPrevReset[$findKiosk->id[$i]][$z] + 1; 
			}else{ $dateStartReset = 0; $loadPrevID[$z] = 0;}
			$dateEndReset = $findReset->resetdate[$z];
			
			//Transaction
			$sqlA = "
				SELECT trn.prd_id, trn.prd_price, SUM(trn.prd_price) AS sumsold, COUNT(trn.prd_price) AS recordssold
				FROM transaction_buy AS trn
				WHERE trn.status = 0 AND trn.kiosk_id = {$findKiosk->id[$i]} AND trn.time_update BETWEEN {$dateStartReset} AND {$dateEndReset}
				";
			$sqlA .= " GROUP BY trn.prd_id, trn.prd_price ORDER BY trn.prd_id ASC";
			$resultA = ROOT::query($sqlA);
			while($rowA = mysqli_fetch_array($resultA,MYSQLI_ASSOC)){ $soldPRD[] = $rowA; $overallSold += $rowA[sumsold]; $overallRecords += $rowA[recordssold]; } //vd($soldPRD); //die;
				if($overallRecords != 0){ //show Records exist only
?>
    <!--<tr style="border-bottom:2px solid #ddd; background-color:#999;">
        <td colspan="8" align="left" style="color:#ddd;">
            <span>#<?=$z+1?> Reset on : <?=date('Y-m-d H:i:s',$dateStartReset)?> - <?=date('Y-m-d H:i:s',$dateEndReset)?></span>
            <small style="margin-left:15px; color:#bbb;">Total Sold <?=$overallRecords?> Records</small>
        </td>
    </tr>
    <tr style=" background-color:#eee;">
        <td>Sold Date</td>
        <td>Ship Kiosk</td>
        <td>Ship Name</td>
        <td>SKU</td>
        <td>Product</td>
        <td>Quantity</td>
        <td>Price/Unit (THB)</td>
        <td>Income (THB)</td>
    </tr>-->
    
<?php		//For Transaction
				for($x=0; $x < count($soldPRD); $x++) {
					if($soldPRD[$x][sumsold]!=0) :
?>
    <tr class="">
        
        <td><?=date('Y-m-d',$dateEndReset)?></td>
        <td><?=str_pad($findKiosk->id[$i],6,0,STR_PAD_LEFT)?></td>
        <td><?=$useKiosk->description[$findKiosk->id[$i]]?></td>
        <td><?=$usePRD->SKU[$soldPRD[$x][prd_id]]?></td>
        <td><?=$usePRD->name[$soldPRD[$x][prd_id]]?></td>
        <td><?=number_format($soldPRD[$x][recordssold],0)?></td>
        <td><!--<?=number_format($usePRD->price[$soldPRD[$x][prd_id]],2)?>/ใช้ราคาขาย--><?=number_format($soldPRD[$x][prd_price],2)?></td>
        <td><?=number_format($soldPRD[$x][sumsold],2)?></td>
        
    </tr>
<?php //End Loop
					endif; 	
				} //for Query
				} //endif Show Records Existed
				unset($overallRecords); unset($soldPRD); unset($rowA); unset($resultA); unset($sqlA);
		}//endif no collect TRN that not still in Kiosk
	} //for Reset Time
} //for Kiosk
?>
<?  ?>

</tbody>
</table>
</div><!--//export-data-->

<!-- // End Content on PAGE /////////////////////////////////////////////////////// -->
<?php require_once('inc_footer_script.php'); ?>	
<script src="js/jquery-redirect.js"></script> 

</body>
</html>

<script type="text/javascript">
//Export to Excel
$(document).ready(function(){  
	$('.btn-export-file').click(function(){  
		var exportData = $('#export-data').html();
		var exportFilemane = $('#export-data').attr('data-filename');
		$.redirect('export_file_xls.php', { filename:exportFilemane, data:exportData } );
	});
});  
 
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