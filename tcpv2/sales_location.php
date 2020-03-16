<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Sales Location"; 
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
$sqlA = "
    SELECT newkos.area, SUM(trn.prd_price) AS sumprice, COUNT(trn.prd_price) AS countprice 
    FROM redbull.transaction_buy AS trn 
    INNER JOIN ( 
        SELECT kos.id, kos.location, kos.latitude, kos.longitude, rot.area 
        FROM redbull.kiosk AS kos 
        LEFT JOIN ( 
                SELECT id, name, area 
                FROM redbull.route 
                WHERE status = 0
            ) AS rot ON kos.routeid = rot.id 
            WHERE kos.status = 1 
            GROUP BY kos.id 
        ) AS newkos ON trn.kiosk_id = newkos.id 
        WHERE trn.status = 0 AND trn.time_update BETWEEN {$dateStart} AND {$dateEnd}";
       

$sqlA .= " GROUP BY newkos.area";
$sqlA .= " ORDER BY sumprice DESC";

// echo $sqlA;
$res = ROOT::query($sqlA);
while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){ $bestSOLD[] = $row; $totalRecords += $row[countprice]; $totalSales += $row[sumprice]; }  //vd($bestSOLD); die;

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
                <p class="text-th">10 พื้นที่ยอดขายสูงสุด</p>
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
                    รวมทั้งหมด <b class="text-green"><?=number_format($totalRecords,0)?></b> รายการ
                </p>
            </div>
            <div class="x_content">
            
                <div class="row">
                
                	<!-- Map -->
                	<div class="col-md-8 col-sm-8 col-xs-12" style="padding-top:0; padding-right:45px; min-height:600px;">
                        <!--<canvas id="rankDoughnut"></canvas>-->
                        <div id="thai_map" style="height:600px !important;"></div>
                    </div><!--/col-->
                    
                    <div class="col-md-4 col-sm-4 col-xs-12" style="padding-top:10px;">
                        <ul class="list-unstyled listRank">
                       <? $topSales = 0; 
					   		for($xA=0; $xA < 10; $xA++): 
								$topSales += $bestSOLD[$xA]['sumprice'];
								//Set Data JQVMap
								require_once('inc_define.php');
								$JQVMapCode = ''; $JQVMapColor = '';
									for($xPV = 0; $xPV < count($fetchProvince); $xPV++) :
										if($bestSOLD[$xA]['area'] == $fetchProvince[$xPV][name_th]){ $JQVMapCode = $fetchProvince[$xPV][jqvmap]; } 
									endfor;
									if($xA == 0){ $JQVMapColor = '#ff69b4'; }
									elseif ($xA == 1){ $JQVMapColor = '#ff4500'; }
									elseif ($xA == 2){ $JQVMapColor = '#ffa500'; }
									else { $JQVMapColor = '#c0c0c0'; }
								if($bestSOLD[$xA]['area'] != NULL){ $mapColors[] = "'".$JQVMapCode."': '".$JQVMapColor."'"; } //Chart xAxis Label
								//Unset Data JQVMap
								unset($JQVMapColor); unset($JQVMapCode);
						?>
                        <? if($bestSOLD[$xA]['sumprice']!=0) : ?>
                            <li style="position:relative;">
                            	<div class="rank <? echo 'rank'.($xA+1);?>" style=" top:14px; left:-10px;">
                                	<i class="fa fa-fw fa-certificate rankInner" style="font-size:38px; width:35px; height:35px; line-height:35px;"></i> 
                                    <b class="rankInner" style="font-size:18px; width:35px; height:35px; line-height:33px;"><?=$xA+1;?></b>
                                </div>
                                <div class="content" style="margin-left:20px; width:calc(60% - 30px);">
                                    <div class="topic" style="padding-top:0; height:20px;">
										<?=($bestSOLD[$xA]['area'])?$bestSOLD[$xA]['area']:'<i style=color:#ccc;font-weight:300;>พื้นที่ยังไม่ระบุจังหวัด</i>'?>
                                    </div>
                                    <div class="value" style="line-height:20px;">ยอดขาย <b style="font-size:16px;"><?= number_format($bestSOLD[$xA]['sumprice'],0) ?></b> บาท</div>
                                </div>
                                <div class="progress" style=" height:10px; margin-top:26px; width:calc(40% - 30px);">
                                	<div class="progress-text"><?= number_format(($bestSOLD[$xA]['sumprice']*100)/$totalSales,2) ?> %</div>
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<? echo ($bestSOLD[$xA]['sumprice']*100)/$totalSales; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<? echo ($bestSOLD[$xA]['sumprice']*100)/$totalSales; ?>%;"></div>
                                </div>
                            </li>
                        <? endif; ?>
                        <? endfor;
							//Set Other Data
							$chartsXAxis_Label[] = 'Other'; 
							$chartsXAxis_Percent[] = number_format((($totalSales-$topSales)*100)/$totalSales,2);
						?>
                        </ul>
                    </div><!--/col-->
                </div><!--/row-->
            
            </div><!--/x_content-->
        </div><!--/x_panel-->
    </div><!--/col-md-12-->
</div><!--/row-->


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
                                <? $fetchKOS = new kiosk(); $findKOS = $fetchKOS; $findKOS->status = 1; $findKOS->loadmany(); ?>
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
</div><!--/row--> 
<!--Details-->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel cards cardRank">
            <div class="x_content"> 
                <table class="table table-hover tableDateDetails">
                <thead>
                <tr>
                	<th style="text-align:left;">ชื่อพื้นที่</th>
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
						$bestSOLDINDEX = ($bestSOLD[$x]['sumprice']*100)/$totalSales;
							if($bestSOLD[$x]['sumprice']>0):
				?>
				<tr class="<?=($onDateTimeStart>time())?'disabled':''?>">
                    <td style="text-align:left;">
                    	<b style="font-weight:500; color:#000;"><?=($bestSOLD[$x]['area'])?$bestSOLD[$x]['area']:'<i style=color:#ccc;>พื้นที่ยังไม่ระบุจังหวัด</i>'?></b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; <?=($bestSOLD[$x]['sumprice']>0)?'font-weight: 700; color:#26B99A;':''?>">
						<span style=" <?=($bestSOLD[$x]['sumprice']>0)?'':'color:#ccc;'?>"><?=number_format($bestSOLD[$x]['sumprice'],0)?></span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;"><?=($bestSOLD[$x]['countprice']>0)?number_format($bestSOLDINDEX,2).' %':'- '?></td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; <?=($bestSOLD[$x]['countprice']>0)?'font-weight: 700;':''?>">
						<span style=" <?=($bestSOLD[$x]['countprice']>0)?'':'color:#ccc;'?>"><?=number_format($bestSOLD[$x]['countprice'],0)?></span> <span class="unit">Record</span>
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

<!-- JQVMap -->
<script src="js/maps/jquery.vmap.js"></script>
<script src="js/maps/jquery.vmap.thai.js"></script>

</body>
</html>

<script type="text/javascript">
//Map
function init_JQVmap(){
	var highlighted_province = { <? for($xLabel=0; $xLabel < count($mapColors); $xLabel++){ echo $mapColors[$xLabel].', '; } ?> }
	if(typeof (jQuery.fn.vectorMap) === 'undefined'){ return; }
	if ($('#thai_map').length ){
		jQuery('#thai_map').vectorMap({ map: 'thailand',
			backgroundColor: '#fff', color: '#e5e5e5', borderColor: '#fff', borderOpacity: 1, selectedColor: '#333', hoverOpacity: 0.7,
			showTooltip: true, enableZoom: true, normalizeFunction: 'polynomial',
			colors: highlighted_province
		});
	}
};

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