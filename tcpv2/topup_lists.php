<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php"); 

//Site Detail
$pageTitle = "Topup Channel"; 
//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['kioskid']){ $kioskid = $_GET['kioskid']; } else { unset($kioskid);  }
if($_GET['productid']){ $productid = $_GET['productid']; } else { unset($productid);  }
if($_GET['display']){ $display = $_GET['display']; } else { $display = 25;  }
if($_GET['datefrom']){ $datefrom = $_GET['datefrom']; } else { $datefrom = date('Y-m').'-01';  } //default set to first Day of this month
if($_GET['date']){ $date = $_GET['date']; } else { $date = date('Y-m-t');  }  //default set to last Day of this month
if($_GET['okt']){ $okt = $_GET['okt']; } else { unset($okt);  }  //for specific open time
if($_GET['onhour']){ $onhour = $_GET['onhour']; } else { unset($onhour);  }  //default set to 24 hour of this month
if($_GET['search']){ $search = $_GET['search']; } else { unset($search);  }
//Set Date for Query
if($_GET['okt']){ $dateStart = $_GET['okt']; }
else { $dateStart = strtotime($datefrom.' 00:00:00'); }
$dateEnd = strtotime($date.' 23:59:59');

//Product
$fetchPRD = new product();

//Kiosk
$fetchKOS = new kiosk();

//Transaction
$fetchTRN = new transaction_buy();
$fetchTRN->status = 9; //ดึงเฉพาะ  รายการ เติมเงิน (status = 9)
	//SQL Query
	$sql = "";
	if($_GET['kioskid']){ $sql .= " AND `kiosk_id` = {$_GET['kioskid']}"; }
	if($_GET['productid']){ $sql .= " AND `prd_id` = {$_GET['productid']}"; }
	if($date){ $sql .= " AND `time_update` BETWEEN {$dateStart} AND {$dateEnd}"; }
	if($_GET['onhour']){ $sql .= " AND substr(from_unixtime(time_update),12,2) = ".str_pad($_GET['onhour'],2,"0",STR_PAD_LEFT); }
$fetchTRN->loadmany(" {$sql} ORDER BY `time_update` DESC", $display, $page); //$fetchTRN->track(); die;
//track($fetchTRN);
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
<div class="right_col" role="main" style=" background-color:#f5f9f5;">	
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
            <p class="text-th">แสดงรายการ ช่องทางการเติมเงิน ทั้งหมด <b class="text-green"><?=number_format($fetchTRN->totalrecords,0)?></b> รายการ</p>
            <? if($_GET['kioskid'] || $_GET['productid']){ ?>
            <h5 style="font-size:18px;">
                <? if($_GET['kioskid']){ ?>ของตู้กดน้ำ หมายเลข <b class="text-green"><?=$_GET['kioskid']?><? } ?></b>
            </h5>
            <? } ?>
            <p class="text-help">ตั้งแต่วันที่ <b class="text-green"><?=($datefrom)?$datefrom:''?></b> ถึง <b class="text-green"><?=($date)?$date:''?></b></p>
        </div><!--/x_title-->
        <div class="x_content">
            
            <div class="dataTables_wrapper">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
                <div class="top topSelect" style=" width:100%; display:table;">
                	<div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                        <label>Kiosk
                            <select name="kioskid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" >
                            	<option value="" selected>...</option>
                            <? $findKOS = $fetchKOS; $findKOS->loadmany(); ?>
							<? for($xkos = 0; $xkos < $findKOS->totalrecords; $xkos++): ?>
                                <option value="<?=$findKOS->id[$xkos]?>" <?=($kioskid == $findKOS->id[$xkos])?'selected':''?>><?=$findKOS->id[$xkos]?></option>
                            <? endfor; ?>
                            </select>
                        </label>
                    </div>
                    <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                        <label>Product
                            <select name="productid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" >
                            	<option value="" selected>...</option>
                            <? $findPRD = $fetchPRD; $findPRD->loadmany(); ?>
							<? for($xprd = 0; $xprd < $findPRD->totalrecords; $xprd++): ?>
                                <option value="<?=$findPRD->id[$xprd]?>" <?=($productid == $findPRD->id[$xprd])?'selected':''?>><?=$findPRD->product_name[$xprd]?></option>
                            <? endfor; ?>
                            </select>
                        </label>
                    </div>
                    <div class="dataTables_custom">
                    	<div class="dateRangePicker displayOnly form-inline">
                            <span>From</span>
                            <input class="form-control input-sm" name="datefrom" id="datefrom" value="<?=($datefrom)?$datefrom:''?>" autocomplete="off" />
                            <span>To Date</span>
                            <input class="form-control input-sm" name="date" id="date" value="<?=($date)?$date:''?>" autocomplete="off" />
                            <span>Displayed.</span>
                        </div>
                    </div>
                </div><!--/top-->
               <div class="top">
               		<div class="dataTables_filter">
                        <label>Search 
                            <input type="search" class="form-control input-sm autoFilter" placeholder="<?=$search?>" onchange="this.form.submit()" disabled />
                        </label>
                    </div>
                    <? $findTRN = $fetchTRN; $page_show = $display; $total_record = $findTRN->totalrecords; ?>
                    <?php require_once('inc_pagination.php'); ?>
                </div>
            </form>
            </div>
            
            <style type="text/css">
			 	.table>thead>tr>th.topupCB { text-align:center; width:35px;}
			</style>
            <table id="" class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th rowspan="2" style="width:50px;">#</th>
                        <th rowspan="2">Time</th>
                        <th rowspan="2" style=" text-align:center; width:80px;">Kiosk</th>
                        <th colspan="6" style=" text-align:center;">Amount <span style="color:#aaa;">( Unit Count )</span></th>
                        <th rowspan="2" style=" text-align:center; width:120px;">Accumulate</th>
                    </tr>
                    <tr>
                        <th class="topupCB">C1</th>
                        <th class="topupCB">C2</th>
                        <th class="topupCB">C5</th>
                        <th class="topupCB">C10</th>
                        <th class="topupCB">B20</th>
                        <th style="text-align:center; border-right-width: 1px; width:120px;">Topup</th>
                    </tr>
                </thead>
                
                <tbody>
                <? if($findTRN->totalrecords != 0): ?>
                <? for ($x = 0; $x < $findTRN->totalitems; $x++) : $num = $x+1; ?>
                <? // for ($x = $record_start; $x < min($record_start+$page_show, $total_record); $x++) : $num = $x+1; ?>
                    <tr id="trTRN_<?=$findTRN->id[$x];?>">
                    
                        <td class="ordinal"><small>(<?=($findTRN->status[$x]==1)?'Fill':'Sold';?>)</small> <?=$findTRN->id[$x];?></td>
                        
                        <td><?=date('Y-m-d H:i:s',$findTRN->lastupdate[$x]);?></td>
                        
                        <td style=" text-align:center;">
                            <a class="" href="?kioskid=<?=$findTRN->kioskid[$x];?>&datefrom=<?=$datefrom?>&date=<?=$date?>&display=<?=$display?>">
                                <b style="font-weight:700;"><?=$findTRN->kioskid[$x];?></b>
                            </a>
                        </td>
                        	
                        <td style=" text-align:center;"><span style=" color:#5cb85c; font-weight:700;"><? echo $salePrice; unset($salePrice);?></span></td>
                        <td style=" text-align:center;"><?=($findTRN->coin1B[$x]==0)?'':$findTRN->coin1B[$x];?></td>
                        <td style=" text-align:center;"><?=($findTRN->coin2B[$x]==0)?'':$findTRN->coin2B[$x];?></td>
                        <td style=" text-align:center;"><?=($findTRN->coin5B[$x]==0)?'':$findTRN->coin5B[$x];?></td>
                        <td style=" text-align:center;"><?=($findTRN->coin10B[$x]==0)?'':$findTRN->coin10B[$x];?></td>
                        <td style=" text-align:center;"><?=($findTRN->note20B[$x]==0)?'':$findTRN->note20B[$x];?></td>
                        <td style=" text-align:center;">
                        <?php	$thb1 = $findTRN->coin1B[$x]*1; 
                                	$thb2 = $findTRN->coin2B[$x]*2; 
                                	$thb5 = $findTRN->coin5B[$x]*5; 
                                	$thb10 = $findTRN->coin10B[$x]*10; 
                                	$thb20 = $findTRN->note20B[$x]*20; 
										$calcTopup = 0;
										$calcTopup = $thb1+$thb2+$thb5+$thb10+$thb20;
										$totalTopup += $calcTopup;
                        ?><span style="color:#000;">+ <b style=" font-weight:700;"><?=number_format(abs($calcTopup),0)?></b></span>
                        </td>

                    </tr>
                <? endfor; ?>
                <? else: ?>
                	<tr><td colspan="10" class="noData"><i>No Data !!!</i></td></tr>
                <? endif; ?>
                </tbody>
            </table>
            <div class="dataTables_wrapper">
            	<div class="bottom">
					<?= $pagination_pattern ?>
                	<div class="dataTables_info">Showing <?=number_format($record_start+1,0)?> to <?=($record_end>$total_record)?number_format($total_record,0):number_format($record_end,0)?> of <?=number_format($total_record,0)?> entries</div>
                </div>
            </div>
            
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
