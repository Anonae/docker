<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php"); 

//Site Detail
$pageTitle = "Transaction"; 
//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['kioskid']){ $kioskid = $_GET['kioskid']; } else { unset($kioskid);  }
if($_GET['productid']){ $productid = $_GET['productid']; } else { unset($productid);  }
if($_GET['slotid']){ $slotid = $_GET['slotid']; } else { unset($slotid);  }
if($_GET['display']){ $display = $_GET['display']; } else { $display = 25;  }
if($_GET['datefrom']){ $datefrom = $_GET['datefrom']; } else { $datefrom = date('Y-m').'-01';  } //default set to first Day of this month
if($_GET['date']){ $date = $_GET['date']; } else { $date = date('Y-m-t');  }  //default set to last Day of this month
if($_GET['statusid']){ $statusid = $_GET['statusid']; } else { $statusid = 0; }
if($_GET['okt']){ $okt = $_GET['okt']; } else { unset($okt);  }  //for specific open time
if($_GET['onhour']){ $onhour = $_GET['onhour']; } else { unset($onhour);  }  //default set to 24 hour of this month
if($_GET['search']){ $search = $_GET['search']; } else { unset($search);  }
if($_GET['trntype']){ $trntype = $_GET['trntype']; } else { $trntype = 'buy';  }
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
	//SQL Query
	$sql = " WHERE `status` = {$statusid}";
	//$sql .= " OR `status` = 3";
	if($_GET['kioskid']){ $sql .= " AND `kiosk_id` = {$_GET['kioskid']}"; }
	if($_GET['productid']){ $sql .= " AND `prd_id` = {$_GET['productid']}"; }
	if($_GET['slotid']){ $sql .= " AND `slot_id` = {$_GET['slotid']}"; }
	if($date){ $sql .= " AND `time_update` BETWEEN {$dateStart} AND {$dateEnd}"; }
	if($_GET['onhour']){ $sql .= " AND substr(from_unixtime(time_update),12,2) = ".str_pad($_GET['onhour'],2,"0",STR_PAD_LEFT); }
if($display == 'ALL'){
	$fetchTRN->loadmany(" {$sql} ORDER BY `id` DESC");
}else{
	$fetchTRN->loadmany(" {$sql} ORDER BY `id` DESC", $display, $page); //$fetchTRN->track(); die;
}

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
            <li class="breadcrumb-item active" aria-current="page">Live <?=$pageTitle?></li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2><b>Live</b> <?=$pageTitle?> 
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
        	<?php require_once('inc_define.php'); ?>	
        	<? $useStatus = array_combine($defineStatus[id],$defineStatus[status_th]); //vd($useStatus); die(); ?>
            <p class="text-th">แสดงข้อมูล รายการธุรกรรม <b class="b600" style="color:#000;">ขายสินค้า</b> ทั้งหมด</p>
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
           		ตั้งแต่วันที่ <b class="text-green"><?=($datefrom)?$datefrom:''?></b> ถึง <b class="text-green"><?=($date)?$date:''?></b>
                รวมทั้งหมด <b class="text-green"><?=number_format($fetchTRN->totalrecords,0)?></b> รายการ
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
                            <? $findKOS = $fetchKOS; $findKOS->status = 1; $findKOS->loadmany(); ?>
							<? for($xkos = 0; $xkos < $findKOS->totalrecords; $xkos++): ?>
                                <option value="<?=$findKOS->id[$xkos]?>" <?=($kioskid == $findKOS->id[$xkos])?'selected':''?>><? if($findKOS->tcpcode[$xkos]){ echo '<b>'.$findKOS->tcpcode[$xkos].'</b> <span>('.$findKOS->name[$xkos].')</span>'; }else{echo $findKOS->id[$xkos]; }?></option>
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
                    <div class="dataTables_filter" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:50px;">
                        <label>Slot
                            <input class="form-control input-sm autoFilter" name="slotid" value="<?=$slotid?>" onchange="this.form.submit()" maxlength="2" style="width:40px; text-align:right;" />
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
                            <input class="form-control input-sm autoFilter" name="search" placeholder="<?=$search?>" onchange="this.form.submit()" disabled />
                        </label>
                    </div>
                    <? $findTRN = $fetchTRN; $page_show = $display; $total_record = $findTRN->totalrecords; ?>
                    <?php require_once('inc_pagination.php'); ?>
                </div>
            </form>
            </div>
            
            <style type="text/css">
			 	.table>thead>tr>th.topupCB { text-align:center; width:30px; padding:8px 4px;}
			</style>
            <table id="" class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th rowspan="2"  style="color:#bbb;"><small>#ID</small></th>
                        <th rowspan="2">Time</th>
                        <th rowspan="1" colspan="3" style=" text-align:center;">Kiosk</th>
                        <th rowspan="1" colspan="2" style=" text-align:center;">Product</th>
                        <th rowspan="1" colspan="6" style=" text-align:center;">Topup <span style="color:#aaa;">( Unit Count )</span></th>
                        <th rowspan="1" colspan="2" style=" text-align:center;">Statement</th>
                    </tr>
                    <tr>
                    	<th style="text-align:center;" class=""><small style="color:#bbb; padding-right:3px;">#IOT</small></th>
                        <th style="text-align:left;" class="">Code</th>
                        <th style="text-align:center;" class="">Slot</th>
                    	<th style="text-align:left;" class="">Name</th>
                    	<th style="text-align:center;" class="">Remain</th>
                        <th class="topupCB">C1</th>
                        <th class="topupCB">C2</th>
                        <th class="topupCB">C5</th>
                        <th class="topupCB">C10</th>
                        <th class="topupCB">B20</th>
                        <th style="text-align:center; border-right-width: 1px;">Total</th>
                        <th style="text-align:center;" class="">Change</th>
                    	<th style="text-align:center;" class="">Income</th>
                    </tr>
                </thead>
                
                <tbody>
                <? if($findTRN->totalrecords != 0): ?>
                 <? 	///bypass kiosk()
						$usePRD = new product(); $usePRD->loadmany(); 
						$usePRD->name = array_combine($usePRD->id,$usePRD->product_name); //vd($useKOS->route); die;
						$useKIOS = new kiosk(); $useKIOS->loadmany(); 
						$useKIOS->tcpcode = array_combine($useKIOS->id,$useKIOS->tcpcode);
						$useKIOS->name = array_combine($useKIOS->id,$useKIOS->name);
				?>
                <? for ($x = 0; $x < $findTRN->totalitems; $x++) : $num = $x+1; ?>
                <? // for ($x = $record_start; $x < min($record_start+$page_show, $total_record); $x++) : $num = $x+1; ?>
                    <tr id="trTRN_<?=$findTRN->id[$x];?>">
                    
                        <td class="ordinal"><small>#<?=$findTRN->id[$x];?></small></td>
                        
                        <td><?=date('Y-m-d H:i:s',$findTRN->time_update[$x]);?></td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#<?=$findTRN->iot_id[$x]?></small></td>	
                        <td data-kioskid="<?=$findTRN->kiosk_id[$x]?>" data-iotid="<?=$findTRN->iot_id[$x]?>" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=<?=$findTRN->kiosk_id[$x];?>">
                                <b style="font-weight:700;"><?=($useKIOS->tcpcode[$findTRN->kiosk_id[$x]])?$useKIOS->tcpcode[$findTRN->kiosk_id[$x]]:'<span style="font-weight:500; color:#666;">'.$findTRN->kiosk_id[$x].'</span>'?></b>
                            </a>
                            <? if($useKIOS->name[$findTRN->kiosk_id[$x]]){ ?><span style="color:#bbb; padding-left:3px; font-weight: 300;">(<?=$useKIOS->name[$findTRN->kiosk_id[$x]]?>)</span><? } ?>
                        </td>
                        
                        <td style=" text-align:center;">
						<? if($findTRN->slot_id[$x]!=0){ ?>
                        	<?=$findTRN->slot_id[$x]?>
                        <? }else{ ?>
                        	<i class="fa fa-exclamation-triangle" style=" padding-top:3px; color:orange;" title="ไม่มีข้อมูลการปล่อยสินค้า"></i>
                        <? } ?>
                        </td>	
                        	
                        <td id="tdPRD_<?=$findTRN->prd_id[$x]?>" <? //if(!$findTRN->prd_id[$x]){echo'colspan="2"';}?>>
                        <? if($findTRN->prd_id[$x]){ 
								echo $usePRD->name[$findTRN->prd_id[$x]];
						?>
                            <? if($findTRN->prd_price[$x]!=0): ?>
                                <span style="color:#ccc; font-weight:300;"> - <?=number_format($findTRN->prd_price[$x],0)?> บ.</span>
                            <? endif; ?>
                        <? } elseif($findTRN->slot_id[$x]) { ?>
							<? //find Slot
                                $findSlot = new slot();
                                $findSlot->kioskid = $findTRN->kiosk_id[$x];
								$findSlot->slotid = $findTRN->slot_id[$x];
                                $findSlot->load();
								echo '<i class="fa fa-fw fa-exclamation" style="color:orange;" title="ข้อมูลรหัสสินค้าล่าช้า"></i> ';
								echo '<span style="color:orange;" title="ข้อมูลรหัสสินค้าล่าช้า">'.$usePRD->name[$findSlot->productid].'</span>';
								//echo '<i style="color:orange; font-style:italic;">ไม่มีสินค้า</i>';
                            ?>
                            <? if($findSlot->price!=0): ?>
                                <span style="color:#ccc; font-weight:300;"> - <?=number_format($findSlot->price,0)?> บ.</span>
                            <? endif; ?>
                        <? } //endif ?>
                        </td>	
                        
                        <td style="text-align:center;">
						<? if($findTRN->prd_id[$x]) : ?>
							<? if($findTRN->prd_remain[$x]==0) { ?>
                            	<span style="font-weight:300;color:#fd1c00;font-weight:600;">ขายหมด</span>
                            <? }else{ ?>
                            	<span style="font-weight:300;"><?=$findTRN->prd_remain[$x]?></span>
                            <? } ?>
                        <? endif; /*else : ?>
                        		<span style="font-weight:300;color:orange;"><?=$findTRN->prd_remain[$x]?></span>
                        <? endif;*/ ?>
                        </td>

                        <td style=" text-align:center;"><?=($findTRN->coin1B[$x]==0)?'':$findTRN->coin1B[$x];?></td>
                        <td style=" text-align:center;"><?=($findTRN->coin2B[$x]==0)?'':$findTRN->coin2B[$x];?></td>
                        <td style=" text-align:center;"><?=($findTRN->coin5B[$x]==0)?'':$findTRN->coin5B[$x];?></td>
                        <td style=" text-align:center;"><?=($findTRN->coin10B[$x]==0)?'':$findTRN->coin10B[$x];?></td>
                        <td style=" text-align:center;"><?=($findTRN->note20B[$x]==0)?'':$findTRN->note20B[$x];?></td>
                   
                        <td style=" text-align:center;">
                        <?	$thb1 = $findTRN->coin1B[$x]*1; 
								$thb2 = $findTRN->coin2B[$x]*2; 
								$thb5 = $findTRN->coin5B[$x]*5; 
								$thb10 = $findTRN->coin10B[$x]*10; 
								$thb20 = $findTRN->note20B[$x]*20; 
								//Calculate
								$calcTopup = 0;
								$calcTopup = $thb1+$thb2+$thb5+$thb10+$thb20;
								$totalTopup += $calcTopup;
                        ?>
                        <? if($calcTopup!=0): ?>
                        	<span style="color:#000;">+ <b style=" font-weight:700;"><?=number_format(abs($calcTopup),0)?></b></span>
                        <? endif;?>
                        </td>
                        
                        <td id="changeTDid_<?=$findTRN->kiosk_id[$x]?>" style=" text-align:right;">
						<? 	$returnTopup = 0; 
								if($findTRN->prd_price[$x]){ 
									$returnTopup = $calcTopup - $findTRN->prd_price[$x]; // echo $returnTopup;
								}elseif($findSlot->price){
									$returnTopup = $calcTopup - $findSlot->price; // echo $returnTopup;
								}
								$totalRetuen += $returnTopup; 
						?>
                        <? if($findTRN->slot_id[$x]==0) { // กินเงินลูกค้า ทำรายการเกิน 5 นาที ?>
                        		<i class="fa fa-exclamation-triangle pull-left" style=" padding-top:3px; color:orange;" title="กินเงินลูกค้า <?=number_format(abs($calcTopup),0)?> บาท"></i>
                                
                        <? }else{ ?>
							<? if($returnTopup > 0) : // เหตุการณ์ปกติ *หยอดเงินมา มากกว่า ราคาสินค้า ?>
                                    <? if($returnTopup > 10) : ?>
                                    <i class="fa fa-exclamation-circle pull-left" style=" padding-top:3px; color:#ccc;" title="พฤติกรรมการหยอด ผิดปกติ "></i>
                                    <span style="color:#aaa; font-weight:400;">- <?=number_format($returnTopup,0)?></span>
                                    <? else : ?>
                                    <span style="color:#fd1c00; font-weight:600;">- <?=number_format($returnTopup,0)?></span>
                                    <? endif; ?>
        
                            <? elseif($returnTopup < 0) : // เหตุการณ์ผิด *หยอดเงินมา น้อยกว่า ราคาสินค้า ?>
                                    <i class="fa fa-exclamation-triangle pull-left" style=" padding-top:3px; color:orange;" title="ข้อมูลการหยอดเงินไม่ครบถ้วน ยอดขาดไป <?=abs($returnTopup)?> บาท"></i>
                                    <span style="color:#aaa; font-weight:400;">+ <?=number_format(abs($returnTopup),0)?></span>
                                
                            <? elseif($returnTopup == 0) : // หยอดเงินมาพอดี ราคาสินค้า ?>
                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                            <? endif; // ข้อมูลหยอดเหรียญ ผิดปกติ ?>
                        <? } // กินเงินลูกค้า ?>
                        </td>         
                        
                        <td style=" text-align:center;">
                        <? if($findTRN->slot_id[$x]==0) { // กินเงินลูกค้า ทำรายการเกิน 5 นาที ?>
							<span style=" color:#5cb85c;">+ <b style=" font-weight:700;"><?=number_format($calcTopup,0)?></b></span>
                        <? }elseif($returnTopup < 0){ ?>
                            <span style=" color:#ccc;"><b style=" font-weight:400;">0</b></span>
                        <? }else{ ?>
							<? if($findTRN->prd_price[$x]!=0){ ?>
                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;"><?=number_format($findTRN->prd_price[$x],0)?></b></span>
                            <? }elseif($findSlot->price){ ?>
                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;"><?=number_format($findSlot->price,0)?></b></span>
                            <? } ?>
                        <? } // กินเงินลูกค้า ?>
                        </td>
                                                
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
                	<div class="dataTables_info">Showing 
					<? if($display == 'ALL'): ?>
                    	<?=number_format($total_record,0)?>
                   	<? else: ?>
						<?=number_format($record_start+1,0)?> to <?=($record_end>$total_record)?number_format($total_record,0):number_format($record_end,0)?> of <?=number_format($total_record,0)?>
                    <? endif; ?>
                         entries</div>
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
