<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Transaction"; 
//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['display']){ $display = $_GET['display']; } else { $display = 25;  }
if($_GET['datefrom']){ $datefrom = $_GET['datefrom']; } else { $datefrom = date('Y-m').'-01';  } //default set to first Day of this month
if($_GET['date']){ $date = $_GET['date']; } else { $date = date('Y-m-t');  }  //default set to last Day of this month

if($_GET['kioskid']){ $kioskid = $_GET['kioskid']; } else { unset($kioskid);  }
if($_GET['refill']){ if($_GET['refill']=='zero'){ $refill = 0; }else{ $refill = $_GET['refill']; } } else { unset($refill); }
if($_GET['search']){ $search = $_GET['search']; } else { unset($search);  } 
//Set Date for Query
$dateStart = strtotime($datefrom.' 00:00:00');
$dateEnd = strtotime($date.' 23:59:59');

//Kiosk
$fetchKOS = new kiosk();

//Query table 'iot_transactions'
$fetchIOT = new iot_transactions();
	//SQL Query
	$sql = " WHERE id != 0";
	if($_GET['kioskid']){ $sql .= " AND kioskid = {$_GET['kioskid']}"; }
	if($_GET['refill']){ $sql .= " AND refill = {$refill}"; }
	if($_GET['search']){ $sql .= " AND iot_transactions_id LIKE '%{$_GET['search']}%' "; }
$fetchIOT->loadmany(" {$sql} ORDER BY `lastupdate` DESC", $display, $page);

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
            <li class="breadcrumb-item" aria-current="page"><?=$pageTitle?></li>
            <li class="breadcrumb-item active" aria-current="page">IOT <?=$pageTitle?></li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2><b>IOT</b> <?=$pageTitle?> 
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
            <p class="text-th">แสดงรายการ ข้อมูลทางเทคนิค ส่งจากตู้กดน้ำ</p>
            <? if($_GET['kioskid'] || $_GET['productid']){ ?>
            <h5 style="font-size:18px;">
                <? if($_GET['kioskid']){ ?>ของตู้กดน้ำ หมายเลข <b class="text-green"><?=$_GET['kioskid']?><? } ?></b>
                <? if($_GET['productid']){ ?>
                    <? 	$usePRD = new product(); $usePRD->loadmany(); 
							$usePRD->name = array_combine($usePRD->id,$usePRD->product_name);
					?>
                    เฉพาะสินค้า  <span style="color:#ccc;">(<?=$_GET['productid']?>)</span> <b class="text-green"><?=$usePRD->name[$_GET['productid']]?></b>
                <? } ?>
            </h5>
            <? } ?>
            <p class="text-help">
           		รายการทางเทคนิค  ตั้งแต่วันที่ <b class="text-green"><?=($datefrom)?$datefrom:''?></b> ถึง <b class="text-green"><?=($date)?$date:''?></b>
                รวมทั้งหมด <b class="text-green"><?=number_format($fetchIOT->totalrecords,0)?></b> รายการ
            </p>
        </div><!--/x_title-->
        <div class="x_content">
            
            <div class="dataTables_wrapper">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
                <div class="top topSelect" style=" width:100%; display:table;">
                	<div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                        <label>Kiosk
                            <select name="kioskid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" >
                            	<option value="" selected>...</option>
                            <? $findKOS = $fetchKOS; $findKOS->status = 0; $findKOS->loadmany(); ?>
							<? for($xkos = 0; $xkos < $findKOS->totalrecords; $xkos++): ?>
                                <option value="<?=$findKOS->id[$xkos]?>" <?=($kioskid == $findKOS->id[$xkos])?'selected':''?>><?=($findKOS->tcpcode[$xkos])?$findKOS->tcpcode[$xkos]:$findKOS->id[$xkos]?></option>
                            <? endfor; ?>
                            </select>
                        </label>
                    </div>
                    <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                        <label data-refill="<?=$refill?>">Refill 
                            <select name="refill" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" >
                            	<option value="" <?=(!$refill)?'selected':''?>>...</option>
                                <option value="zero" <?=($refill == 'zero')?'selected':''?>>0</option>
                                <option value="1" <?=($refill == '1')?'selected':''?>>1</option>
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
                        <label>Search IOT 
                            <input name="search" class="form-control input-sm autoFilter" placeholder="<?=$search?>" value="<?=($search)?$search:''?>" onchange="this.form.submit()" />
                        </label>
                    </div>
                    <? $findIOT = $fetchIOT; $page_show = $display; $total_record = $findIOT->totalrecords; ?>
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
                    	<th>#</th>
                        <th style="color:#ccc;">Lastupdate</th>
                        <th>Datetime</th>
                        <th>Kiosk</th>
                        <th>IOT</th>
                        <th>Slot</th>
                        <th class="topupCB">C1</th>
                        <th class="topupCB">C2</th>
                        <th class="topupCB">C5</th>
                        <th class="topupCB">C10</th>
                        <th class="topupCB">B20</th>
                        <th>CoinCashOut</th>
                        <th>CoinCashTube</th>
                        <th>Quantity</th>
                        <th>Refill</th>
                    </tr>
                </thead>
                
                <tbody>
                <? if($findIOT->totalrecords != 0): ?>
                <? 	///bypass kiosk()
						$useKIOS = new kiosk(); $useKIOS->loadmany(); 
						$useKIOS->tcpcode = array_combine($useKIOS->id,$useKIOS->tcpcode);
				?>
                <? for ($x = 0; $x < $findIOT->totalitems; $x++) : $num = $x+1; ?>
                    <tr id="trTRN_<?=$findIOT->id[$x];?>">
                    
                        <td class="ordinal"><?=$findIOT->id[$x];?></td>
                        <td class="" style="color:#ccc;"><?=date('Y-m-d H:i:s',$findIOT->lastupdate[$x]);?></td>
                        <td class=""><?=($findIOT->datetime[$x])?$findIOT->datetime[$x]:'<i style="color:orange;">ไม่มีค่าส่งมา<span>';?></td>
                        
                        <td class=""><span style="color:#ccc;">(<?=$findIOT->kioskid[$x];?>)</span> <?=$useKIOS->tcpcode[$findIOT->kioskid[$x]]?></td>
                        <td class=""><a href="transaction_iot_gen.php?kioskid=<?=$findIOT->kioskid[$x]?>&iotgen=<?=$findIOT->iot_transactions_id[$x];?>" target="_blank"><?=$findIOT->iot_transactions_id[$x];?></a></td>
                        <td class=""><?=$findIOT->slotid[$x];?></td>
                        <td style=" text-align:center;"><?=($findIOT->coin1B[$x]==0)?'-':$findIOT->coin1B[$x];?></td>
                        <td style=" text-align:center;"><?=($findIOT->coin2B[$x]==0)?'-':$findIOT->coin2B[$x];?></td>
                        <td style=" text-align:center;"><?=($findIOT->coin5B[$x]==0)?'-':$findIOT->coin5B[$x];?></td>
                        <td style=" text-align:center;"><?=($findIOT->coin10B[$x]==0)?'-':$findIOT->coin10B[$x];?></td>
                        <td style=" text-align:center;"><?=($findIOT->note20B[$x]==0)?'-':$findIOT->note20B[$x];?></td>
                        <td class=""><?=$findIOT->coinCashOut[$x];?></td>
                        <td class=""><?=$findIOT->coinCashTube[$x];?></td>
                        <td class=""><?=($findIOT->qty[$x]==0)?'-':$findIOT->qty[$x];?></td>
                        <td class=""><?=$findIOT->refill[$x];?></td>  
                    </tr>
                <? endfor; ?>
                <? else: ?>
                	<tr><td colspan="15" class="noData"><i>No Data !!!</i></td></tr>
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

<style type="text/css">
	tr.onFocus>td { background-color:rgba(38,185,154,0.1);}
</style>
            
<script type="text/javascript">
//On Focus
$('td').click(function(){
	$(this).parent().toggleClass('onFocus')
});

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
