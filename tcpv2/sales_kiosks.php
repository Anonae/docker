<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Kiosks Report"; 
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

//Transaction
$sqlA  = "SELECT trn.kiosk_id, SUM(trn.prd_price) AS sumsold, COUNT(trn.prd_price) AS recordssold "
        . "FROM redbull.transaction_buy AS trn "
        . "WHERE trn.status = 0 "
        . "AND trn.time_update BETWEEN {$dateStart} AND {$dateEnd}";
if($_GET['productid']){ $sqlA .= " AND trn.prd_tid = {$productid}";}
$sqlA .= " GROUP BY trn.kiosk_id ORDER BY sumsold DESC";
// echo $sqlA;
//datetime filter = AND trn.lastupdate BETWEEN {$dateStart} AND {$dateEnd} 
//product filter = AND trn.productid = {$productid} 
$res = ROOT::query($sqlA);
while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){ $bestSOLD[] = $row; $overallSold += $row[sumsold]; $overallRecords += $row[recordssold]; }  //vd($bestSOLD); die;

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
<? 	///bypass kiosk()
		$useKIOS = new kiosk(); $useKIOS->loadmany(); 
		$useKIOS->tcpcode = array_combine($useKIOS->id,$useKIOS->tcpcode); 
		$useKIOS->name = array_combine($useKIOS->id,$useKIOS->name); 
?>
<div class="row">  
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel cards cardRank">
            <div class="x_title">
                <p class="text-th">10 อันดับ ตู้กดน้ำยอดขายสูงสุด</p>
                <? if($_GET['kioskid'] || $_GET['productid']){ ?>
                <h5 style="font-size:18px; margin-top:0;">
                    <? if($_GET['productid']){ ?>
                    	<? for($x = 0; $x < count($loadPRD); $x++){ if($_GET['productid'] == $loadPRD[$x]->id){ $product_name = $loadPRD[$x]->product_name; } } ?>
                    	เฉพาะสินค้า  <span style="color:#ccc;">(<?=$_GET['productid']?>)</span> <b class="text-green"><?=$product_name?></b>
					<? } ?>
                </h5>
                <? } ?>
                <p class="text-help">
                	รายการขาย ตั้งแต่วันที่ <b class="text-green"><?=($datefrom)?$datefrom:''?></b> ถึง <b class="text-green"><?=($date)?$date:''?></b>
                    รวมทั้งหมด <b class="text-green"><?=number_format($overallRecords,0)?></b> รายการ
                </p>
            </div>
            <div class="x_content">
            
                <div class="row">
                	<div class="col-md-8 col-sm-8 col-xs-12" style="padding-top:45px;">
                        <canvas id="rankDoughnut"></canvas>
                    </div><!--/col-->
                    <div class="col-md-4 col-sm-4 col-xs-12" style="padding-top:10px;">
                        <ul class="list-unstyled listRank">
                        <?php 	$topAmount = 0; 
								for($x=0; $x < 10; $x++) : 
									$topAmount += $bestSOLD[$x][sumsold]; 
								//Chart Asset
								$chartsXAxis_Label[] = 'KioskID '.$bestSOLD[$x][kiosk_id].' '; //Chart xAxis Label
								$chartsXAxis_Amount[] = $bestSOLD[$x][sumsold]; //Chart xAxis Amount
								$chartsXAxis_Percent[] = number_format(($bestSOLD[$x][sumsold]*100)/$overallSold,2); //Chart xAxis Percent
						?>
                        	<? if($bestSOLD[$x][sumsold]!=0): ?>
                            <li id="rankPRD_<?= $bestSOLD[$x][kiosk_id] ?>" style="position:relative;">
                            	<div class="rank <? echo 'rank'.($x+1);?>" style=" top:14px; left:-10px;">
                                	<i class="fa fa-fw fa-certificate rankInner" style="font-size:38px; width:35px; height:35px; line-height:35px;"></i> 
                                    <b class="rankInner" style="font-size:18px; width:35px; height:35px; line-height:33px;"><?=$x+1;?></b>
                                </div>
                                <div class="content" style="margin-left:20px; width:calc(60% - 30px);">
                                    <div class="topic" style="padding-top:0; height:20px;">
                                    	<b style="color:#000;"><?=($useKIOS->tcpcode[$bestSOLD[$x][kiosk_id]])?$useKIOS->tcpcode[$bestSOLD[$x][kiosk_id]]:$bestSOLD[$x][kiosk_id];?></b> 
                                        <span style="font-weight:400; color: #73879C;">( <?=($useKIOS->name[$bestSOLD[$x][kiosk_id]])?$useKIOS->name[$bestSOLD[$x][kiosk_id]]:'';?> )</span>
                                    </div>
                                    <div class="value" style="line-height:20px;">ยอดขาย <b style="font-size:16px;"><?= number_format($bestSOLD[$x][sumsold],0) ?></b> บาท</div>
                                </div>
                                <div class="progress" style=" height:10px; margin-top:26px; width:calc(40% - 30px);">
                                	<div class="progress-text"><?= number_format(($bestSOLD[$x][sumsold]*100)/$overallSold,2) ?> %</div>
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<? echo ($bestSOLD[$x][sumsold]*100)/$overallSold; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<? echo ($bestSOLD[$x][sumsold]*100)/$overallSold; ?>%;"></div>
                                </div>
                            </li>
                            <? endif; ?>
                        <? endfor; 
							//Set Other Data
							$chartsXAxis_Label[] = 'Other'; 
							$chartsXAxis_Percent[] = number_format((($overallSold-$topAmount)*100)/$overallSold,2);
						?>
                        </ul>
                    </div><!--/col-->
                </div><!--/row-->
            
            </div><!--/x_content-->
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
        <div class="x_panel cards cardRank">
            <div class="x_content"> 
                <table class="table table-hover tableDateDetails">
                <thead>
                <tr>
                	<th style="text-align:left;">หมายเลขตู้กดน้ำ</th>
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
				<? 	$bestSOLDINDEX = 0;
						for($x=0; $x < count($bestSOLD); $x++) : 
						$bestSOLDINDEX = ($bestSOLD[$x][sumsold]*100)/$overallSold;
							if($bestSOLD[$x][sumsold]>0):
				?>
				<tr id="salesTR_<?=$bestSOLD[$x][kiosk_id]?>" class="<?=($onDateTimeStart>time())?'disabled':''?>">
                    <td style="text-align:left;">
                    	<b style="color:#000;"><?=($useKIOS->tcpcode[$bestSOLD[$x][kiosk_id]])?$useKIOS->tcpcode[$bestSOLD[$x][kiosk_id]]:$bestSOLD[$x][kiosk_id];?></b>
                        <span style="font-weight:400;">( <?=($useKIOS->name[$bestSOLD[$x][kiosk_id]])?$useKIOS->name[$bestSOLD[$x][kiosk_id]]:'';?> )</span>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; <?=($bestSOLD[$x][sumsold]>0)?'font-weight: 700; color:#26B99A;':''?>">
						<span style=" <?=($bestSOLD[$x][sumsold]>0)?'':'color:#ccc;'?>"><?=number_format($bestSOLD[$x][sumsold],0)?></span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;"><?=($bestSOLD[$x][recordssold]>0)?number_format($bestSOLDINDEX,2).' %':'- '?></td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; <?=($bestSOLD[$x][recordssold]>0)?'font-weight: 700;':''?>">
                    	<a href="transaction_lists.php?kioskid=<?=$bestSOLD[$x][kiosk_id]?>&datefrom=<?=date('Y-m-d', $dateStart)?>&date=<?=date('Y-m-d', $dateEnd)?>">
						<span style=" <?=($bestSOLD[$x][recordssold]>0)?'':'color:#ccc;'?>"><?=number_format($bestSOLD[$x][recordssold],0)?></span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
				<? endif; endfor; ?>
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
//Chart
function init_charts(){
	Chart.defaults.global.legend = { enabled: false };
	if ($('#rankDoughnut').length ){  
		var ctx = document.getElementById("rankDoughnut");
		var data = {
			labels: [<? for($x=0; $x <= count($chartsXAxis_Label); $x++){ echo "'".$chartsXAxis_Label[$x]."', "; } ?>],
			datasets: [{
				data: [<? for($x=0; $x <= count($chartsXAxis_Label); $x++){ echo "'".$chartsXAxis_Percent[$x]."', "; } ?>],
				backgroundColor: [ "#ff69b4", "#ff4500", "#ffa500", "#c0c0c0", "#c0c0c0", "#c0c0c0", "#c0c0c0", "#c0c0c0", "#c0c0c0", "#c0c0c0" ],
				hoverBackgroundColor: [ "#ff55aa", "#eb4000", "#eb9800", "#a7a7a7", "#a7a7a7", "#a7a7a7", "#a7a7a7", "#a7a7a7", "#a7a7a7", "#a7a7a7" ]
			}]
		};
		var canvasDoughnut = new Chart(ctx, { type: 'doughnut', tooltipFillColor: "rgba(51, 51, 51, 0.55)", data: data });
	} 
}
$(document).ready(function() { init_charts(); });

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