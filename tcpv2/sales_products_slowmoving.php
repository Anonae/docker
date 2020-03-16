<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Slow Moving Products"; 
//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['kioskid']){ $kioskid = $_GET['kioskid']; } else { unset($kioskid);  }
if($_GET['productid']){ $productid = $_GET['productid']; } else { unset($productid);  }
if($_GET['display']){ $display = $_GET['display']; } else { $display = 25;  }
if($_GET['datefrom']){ $datefrom = $_GET['datefrom']; } else { $datefrom = date('Y-m').'-01';  } //default set to first Day of this month
if($_GET['date']){ $date = $_GET['date']; } else { $date = date('Y-m-t');  }  //default set to last Day of this month
if($_GET['search']){ $search = $_GET['search']; } else { unset($search);  }
if($_GET['lowlimit']){ $lowlimit = $_GET['lowlimit']; } else { unset($lowlimit);  } 
//Set Date for Query
$dateStart = strtotime($datefrom.' 00:00:00');
$dateEnd = strtotime($date.' 23:59:59');

//Transaction
$sqlA = "
	SELECT trn.prd_id, SUM(trn.prd_price) AS sumsold, COUNT(trn.prd_price) AS recordssold
	FROM redbull.transaction_buy AS trn
	WHERE trn.status = 0 AND trn.time_update BETWEEN {$dateStart} AND {$dateEnd} 
	";
	if($_GET['kioskid']){ $sqlA .= " AND trn.kiosk_id = {$kioskid}";}
$sqlA .= " GROUP BY trn.prd_id ";
	if($_GET['lowlimit']){ $sqlA .= " HAVING SUM(trn.prd_price) <= {$lowlimit}";}
$sqlA .= " ORDER BY sumsold ASC";

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

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel cards cardRank">
            <div class="x_title">
                <p class="text-th">แสดงสินค้า ที่มียอดขาย ตามเงื่อนไข กำหนดราคา เรียงจากน้อยสุดก่อน</p>
                <? if($_GET['kioskid'] || $_GET['productid']){ ?>
                <h5 style="font-size:18px; margin-top:0;">
                	<? if($_GET['kioskid']){ ?>ของตู้กดน้ำ หมายเลข <b class="text-green"><?=$_GET['kioskid']?><? } ?></b>
                </h5>
                <? } ?>
                <p class="text-help">
                	รายการขาย ตั้งแต่วันที่ <b class="text-green"><?=($datefrom)?$datefrom:''?></b> ถึง <b class="text-green"><?=($date)?$date:''?></b>
                    รวมทั้งหมด <b class="text-green"><?=number_format($overallRecords,0)?></b> รายการ
                </p>
            </div>
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
                                <option value="<?=$findKOS->id[$xkos]?>" <?=($kioskid == $findKOS->id[$xkos])?'selected':''?>><?=($findKOS->tcpcode[$xkos])?$findKOS->tcpcode[$xkos].' ('.$findKOS->name[$xkos].')':$findKOS->id[$xkos]?></option>
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
                    </div><!--/top.topSelect-->
                    <div class="top">
                        <div class="">
                        	<span style="display:inline-block; float:left; margin-right:5px; margin-top:5px; font-weight:700; color:#000; font-size:16px;">เลือกเฉพาะ ยอดขายรวม <span style="color:red;">ที่มีไม่ถึง</span></span>
                            <div class="input-group input-group-sm" style="width:250px; margin-bottom:0;">
                            	<input type="number" name="lowlimit" class="form-control input-sm" value="<?=$lowlimit?>" style="border-color: #ddd; height:32px; text-align:right; padding: 0; font-size: 18px; line-height: 32px;" min="0" step="1" />
                                <label class="input-group-addon" style="border-left:none; padding-top: 7px; font-size: 13px; line-height:18px;">บาท</label>
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-default btn-primary" style="height:32px; font-size:13px; font-weight:400; padding-top: 7px; ">ตรวจสอบ</button>
                                </span>
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
                	<th style="text-align:left;">รายชื่อสินค้า</th>
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
                <? 	$usePRD = new product(); $usePRD->loadmany(); 
						$usePRD->name = array_combine($usePRD->id,$usePRD->product_name);
						$usePRD->img = array_combine($usePRD->id,$usePRD->product_image);
				?>
				<? 	$bestPRDINDEX = 0;
						for($x=0; $x < count($bestSOLD); $x++) : 
						$bestPRDINDEX = ($bestSOLD[$x][sumsold]*100)/$overallSold;
							if($bestSOLD[$x][sumsold]!=0):
				?>
				<tr id="salesTR_<?=$bestSOLD[$x][prd_id]?>" class="<?=($onDateTimeStart>time())?'disabled':''?>">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(<?=$bestSOLD[$x][prd_id]?>)</span> <b style="font-weight:500; color:#000;"><?=$usePRD->name[$bestSOLD[$x][prd_id]]?></b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; <?=($bestSOLD[$x][sumsold]>0)?'font-weight: 700; color:#26B99A;':''?>">
						<span style=" <?=($bestSOLD[$x][sumsold]>0)?'':'color:#ccc;'?>"><?=number_format($bestSOLD[$x][sumsold],0)?></span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;"><?=($bestSOLD[$x][recordssold]>0)?number_format($bestPRDINDEX,2).' %':'- '?></td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; <?=($bestSOLD[$x][recordssold]>0)?'font-weight: 700;':''?>">
                    	<a href="transaction_lists.php?productid=<?=$bestSOLD[$x][prd_id]?>&datefrom=<?=date('Y-m-d', $dateStart)?>&date=<?=date('Y-m-d', $dateEnd)?>">
						<span style=" <?=($bestSOLD[$x][recordssold]>0)?'':'color:#ccc;'?>"><?=number_format($bestSOLD[$x][recordssold],0)?></span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
				<? unset($periodTSN); endif; endfor; ?>
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
<!-- ECharts -->
<script src="assets/echarts/dist/echarts.min.js"></script>
<script src="assets/echarts/map/js/world.js"></script>
<!-- EasyPieChart -->
<script src="assets/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
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