<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Sales Period"; 
//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['kioskid']){ $kioskid = $_GET['kioskid']; } else { unset($kioskid);  }
if($_GET['productid']){ $productid = $_GET['productid']; } else { unset($productid);  }
if($_GET['display']){ $display = $_GET['display']; } else { $display = 25;  }
if($_GET['datefrom']){ $datefrom = $_GET['datefrom']; } else { $datefrom = date('Y-m').'-01';  } //default set to first Day of this month
if($_GET['date']){ $date = $_GET['date']; } else { $date = date('Y-m-t');  }  //default set to last Day of this month
if($_GET['search']){ $search = $_GET['search']; } else { unset($search);  }
//Set Date for Query
$dateStart = strtotime($datefrom.' 00:00:00');
$dateEnd = strtotime($date.' 23:59:59');

//Transaction This Month
$thisSQL = " SELECT * FROM transaction_buy";
	$thisSQL .= " WHERE status = 0 AND time_update BETWEEN {$dateStart} AND {$dateEnd}";
	if($_GET['kioskid']){ $thisSQL .= " AND kiosk_id = {$kioskid}";}
	if($_GET['productid']){ $thisSQL .= " AND prd_id = {$productid}";}
$thisSQL .= " ORDER BY id DESC";

// echo $thisSQL;
$thisResult = ROOT::query($thisSQL);
while($thisTRN = mysqli_fetch_array($thisResult,MYSQLI_ASSOC)){ $loadTRN[] = $thisTRN; $sumPrice += $thisTRN[prd_price]; }

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
            <li class="breadcrumb-item active" aria-current="page"><?=$pageTitle?></li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2><?=$pageTitle?> 
            	<span style="font-size:15px;"> on 
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
                            <input class="form-control input-sm" style="left:35px;" id="datefromClone" value="<?=($datefrom)?$datefrom:''?>"  />
                            <input class="form-control input-sm" style="right:0;" id="dateClone" value="<?=($date)?$date:''?>"  />
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/col--> 
    </div><!--/content-title-->
</div><!--/row-->

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <p class="text-th">แสดงกราฟช่วงเวลา ยอดขายสินค้าแต่ละชั่วโมง</p>
                <? if($_GET['kioskid'] || $_GET['productid']){ ?>
                <h5 style="font-size:18px; margin-top:0;">
                	<? if($_GET['kioskid']){ ?>ของตู้กดน้ำ หมายเลข <b class="text-green"><?=$_GET['kioskid']?><? } ?></b>
                    <? if($_GET['productid']){ ?>
                    	<? for($x = 0; $x < count($loadPRD); $x++){ if($_GET['productid'] == $loadPRD[$x]->id){ $product_name = $loadPRD[$x]->product_name; } } ?>
                    	เฉพาะสินค้า  <span style="color:#ccc;">(<?=$_GET['productid']?>)</span> <b class="text-green"><?=$product_name?></b>
					<? } ?>
                </h5>
                <? } ?>
                <p class="text-help">
                	รายการขาย ตั้งแต่วันที่ <b class="text-green"><?=($datefrom)?$datefrom:''?></b> ถึง <b class="text-green"><?=($date)?$date:''?></b>
                	รวมทั้งหมด <b class="text-green"><?=number_format(count($loadTRN),0)?></b> รายการ
                </p>
            </div>
            <div class="x_content">
            	<canvas id="dailySoldChart" height="80"></canvas>
            </div>
        </div><!--/x_panel-->
    </div><!--/col-md-12-->
</div><!--/row--> 

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
                                <? $fetchKOS = new kiosk(); $findKOS = $fetchKOS; $findKOS->status = 1; $findKOS->loadmany(); ?>
                                <? for($xkos = 0; $xkos < $findKOS->totalrecords; $xkos++): ?>
                                <option value="<?=$findKOS->id[$xkos]?>" <?=($kioskid == $findKOS->id[$xkos])?'selected':''?>><? if($findKOS->tcpcode[$xkos]){ echo '<b>'.$findKOS->tcpcode[$xkos].'</b> <span>('.$findKOS->name[$xkos].')</span>'; }else{echo $findKOS->id[$xkos]; }?></option>
                            <? endfor; ?>
                                </select>
                            </label>
                        </div>
                        <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                            <label>เลือกเจาะจงเฉพาะสินค้า
                                <select name="productid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" >
                                    <option value="" selected>...</option>
                                <? $listPRD = new product(); $listPRD->status = 0; $listPRD->loadmany(); ?>
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
</div><!--/row--> 

<div class="row">
	<!--Daily Details-->
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content"> 
                <table class="table table-hover tableDateDetails">
                <thead>
				<tr>
                    <th rowspan="2" style="width:138px; text-align:center;">ช่วงเวลา</th>
                    <th rowspan="1" colspan="3" style="text-align:center; border-left:1px solid #ddd; font-size:20px;">ยอดขาย (บาท)</th>
                    <th rowspan="2" colspan="1" style="text-align:right; border-left:1px solid #ddd;">ทำรายการต่อชั่วโมง</th>
                </tr>
                <tr>
                    <th style="text-align:right; border-left:1px solid #ddd">ยอดขายต่อชั่วโมง</th>
                    <th style="text-align:right;">ยอดขายสะสม</th>
                    <th style="text-align:right;">คิดเป็น %</th>
                    <? /*<th style="text-align:right; border-left:1px solid #ddd">ทำรายการต่อชั่วโมง</th>
                    <th style="text-align:right;">ทำรายการสะสม</th>
                    <th style="text-align:right;">คิดเป็น %</th>*/?>
				</tr>
                </thead>
                <tbody>
                <style type="text/css"> 
					.tableDateDetails tr.disabled { filter: grayscale(1); opacity:0.3;}
					.tableDateDetails tr.disabled:hover { background-color:inherit;}
					.tableDateDetails .unit { font-size:11px; font-weight:300; color:#ccc; padding-left:3px;} 
                </style>
				<? 	$periodSoldACCUM = 0;
						for($x=0; $x < 24; $x++) : 
							//$xPeriod = str_pad($x,2,"0",STR_PAD_LEFT);
							$xPeriod = str_pad($x,2,"0",STR_PAD_LEFT).':00:00 - '.str_pad($x,2,"0",STR_PAD_LEFT).':59:59';
							//Link href DateTime
							$onDateTimeStart = $dateStart;
							$onDateTimeEnd = $dateEnd;
							$chartsXAxis_Label[] = $xPeriod; //Chart xAxis Label

							$totalSold = 0; $periodSoldSUM = 0;
							for($xd=0; $xd<=count($loadTRN); $xd++){ $totalSold += $loadTRN[$xd][prd_price];
									if(date('H', $loadTRN[$xd][time_update]) == str_pad($x,2,"0",STR_PAD_LEFT) ) {
											$periodTSN[] = $loadTRN[$xd];
											$periodSoldSUM += $loadTRN[$xd][prd_price]; 
									}
							}

							$periodRecordACCUM += count($periodTSN);
							$periodRecordINDEX = (count($periodTSN)*100)/count($loadTRN);
							$periodSoldACCUM += $periodSoldSUM;
							$periodSoldINDEX = ($periodSoldSUM*100)/$totalSold;
							//Chart Asset
							$chartsXAxis_Sold[] = $periodSoldSUM; //Chart xAxis Sold
							$chartsXAxis_Record[] = count($periodTSN); //Chart xAxis Record
							$totalSoldSUMBack = $chartsXAxis_Sold[$x]+$chartsXAxis_Sold[$x-1]+$chartsXAxis_Sold[$x-2] ;
							$chartsXAxis_Exponential[] = ($totalSoldSUMBack/3); //Chart xAxis Exponential
							$chartsXAxis_Trendline[] = ($periodSoldACCUM/$x); //Chart xAxis Trendline
				?>
				<tr id="dateTR_<?= str_pad($x,2,"0",STR_PAD_LEFT) ?>" class="<?=($onDateTimeStart>time())?'disabled':''?>">
                    <td style="text-align:center; font-weight:600;"><?=$xPeriod?></td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; <?=($periodSoldSUM>0)?'font-weight: 700;':''?>">
						<span style=" <?=($periodSoldSUM>0)?'':'color:#ccc;'?>"><?=number_format($periodSoldSUM,0)?></span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">
						<?=($periodSoldSUM>0)?'+':''?> <span style=" <?=($periodSoldSUM>0)?'':'color:#ccc;'?>"><?=number_format($periodSoldACCUM,0)?></span> 
                        <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;"><?=($periodSoldSUM>0)?number_format($periodSoldINDEX,2).' %':'- '?></td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; <?=(count($periodTSN)>0)?'font-weight: 700;':''?>">
						<a href="transaction_lists.php?kioskid=<?=$_GET['kioskid']?>&productid=<?=$_GET['productid']?>&datefrom=<?=date('Y-m-d', $onDateTimeStart)?>&date=<?=date('Y-m-d', $onDateTimeEnd)?>&onhour=<?=$x?>"><span style=" <?=($periodSoldSUM>0)?'':'color:#ccc;'?>"><?=number_format(count($periodTSN,0))?></span></a> <span class="unit">Record</span>
                    </td>
                    <? /*<td style="text-align:right;"><?=($periodSoldSUM>0)?'+':''?> <?=number_format($periodRecordACCUM,0)?> <span class="unit">Record</span></td>
                    <td style="text-align:right;"><?=(count($periodTSN)>0)?number_format($periodRecordINDEX,2).' %':'- '?></td>*/?>
                    
				</tr>
				<? unset($periodTSN); endfor; ?>
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
//Charts Display
function init_charts() {
	if ($('#dailySoldChart').length ){ 	  
		var ctx = document.getElementById("dailySoldChart");
		var dailySoldStatement = new Chart(ctx, { type: 'line',
			data: {
				labels: [<? for($x=0; $x <= count($chartsXAxis_Label); $x++){ echo "'".$chartsXAxis_Label[$x]."', "; } ?>],
				datasets: [{ 
					label: 'Trend Line', type: 'line', backgroundColor: "rgba(0,0,0,0)", borderColor:"rgba(255,0,0,0.6)", borderDash:[10,5], borderWidth:1, pointRadius:0, pointHoverRadius:0, 
					data: [<? for($x=0; $x < count($chartsXAxis_Label); $x++){ if($x<0){ echo ' , ';}else{ echo $chartsXAxis_Trendline[$x].', '; }} ?>]	
					}, {
					label: 'Sold Amount', lineTension:0, backgroundColor: "rgba(38,185,154,0.5)", borderColor:"#26B99A", borderWidth:2, pointRadius:3, pointHoverRadius:6, pointBackgroundColor:"#FFFFFF", pointBorderColor:"#26B99A", pointHoverBackgroundColor:"#FFFFFF", pointHoverBorderColor:"#26B99A",
					data: [<? for($x=0; $x < count($chartsXAxis_Label); $x++){ echo $chartsXAxis_Sold[$x].', '; } ?>]
				}]
			},
			options: { 
				scales: { yAxes: [{ ticks: { beginAtZero: true } }] },
				legend: { display: false }
			} 
		}); 
	} 
}
$(document).ready(function () { init_charts(); });
//DatePicker
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
