<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php"); 

//Site Detail
$pageTitle = "Slot"; 
//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['kioskid']){ $kioskid = $_GET['kioskid']; } else { unset($kioskid);  }
if($_GET['productid']){ $productid = $_GET['productid']; } else { unset($productid);  }
if($_GET['slotid']){ $slotid = $_GET['slotid']; } else { unset($slotid);  }
if($_GET['slotaction']){ $slotaction = $_GET['slotaction']; } else { unset($slotaction);  }
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
$fetchTRN = new slot_log();
	//SQL Query
	$sql = " WHERE status = {$statusid}";
	//$sql .= " OR `status` = 3";
	if($_GET['kioskid']){ $sql .= " AND kiosk_id = {$_GET['kioskid']}"; }
	if($_GET['productid']){ $sql .= " AND prd_id = {$_GET['productid']}"; }
	if($_GET['slotid']){ $sql .= " AND slot_id = {$_GET['slotid']}"; }
	if($_GET['slotaction']){ $sql .= " AND action = '{$_GET['slotaction']}'"; }
	if($date){ $sql .= " AND lastupdate BETWEEN {$dateStart} AND {$dateEnd}"; }
	if($_GET['onhour']){ $sql .= " AND substr(from_unixtime(lastupdate),12,2) = ".str_pad($_GET['onhour'],2,"0",STR_PAD_LEFT); }
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
            <h2><?=$pageTitle?> <b>Technical LOG</b>
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
            <p class="text-th">แสดงข้อมูลด้านเทคนิค <b class="b600" style="color:#000;">ช่องเก็บสินค้า</b> ทั้งหมด</p>
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
                    <div class="dataTables_filter" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:85px;">
                        <label>Slot
                            <input class="form-control input-sm autoFilter" name="slotid" value="<?=$slotid?>" onchange="this.form.submit()" maxlength="2" style="width:40px; text-align:right;" />
                        </label>
                    </div>
                    <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                        <label>Slot Action
                            <select name="slotaction" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" > 
                            	<option value="" selected>...</option>
                                <option value="buy" <?=($slotaction == 'buy')?'selected':''?>>BUY</option>
                                <option value="fill" <?=($slotaction == 'fill')?'selected':''?>>FILL</option>
                                <option value="remove" <?=($slotaction == 'remove')?'selected':''?>>REMOVE</option>
                                <option value="setup" <?=($slotaction == 'setup')?'selected':''?>>SETUP</option>
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
                            <input class="form-control input-sm autoFilter" name="search" placeholder="<?=$search?>" onchange="this.form.submit()" disabled />
                        </label>
                    </div>
                    <? $findTRN = $fetchTRN; $page_show = $display; $total_record = $findTRN->totalrecords; ?>
                    <?php require_once('inc_pagination.php'); ?>
                </div>
            </form>
            </div>
            
            <style type="text/css">
			 	.table>thead>tr>th.actionTD { text-align:center; width:50px; padding:8px 4px;}
			</style>
            <table id="" class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th rowspan="2"  style="color:#bbb;"><small>#ID</small></th>
                        <th rowspan="2">Time</th>
                        <th rowspan="2" colspan="1" style=" text-align:center;">Kiosk</th>
                        <th rowspan="1" colspan="3" style=" text-align:center;">Product</th>
                        <th rowspan="2" colspan="1" style=" text-align:center;">Capacity</th>
                        <th rowspan="2" colspan="1" style=" text-align:center; border-right:1px solid #aaa;">Action</th>
                        <th rowspan="1" colspan="2" style=" text-align:center; border-right:1px solid #aaa;">Unit</th>
                        <th rowspan="1" colspan="2" style=" text-align:center;">Quantity</th>
                    </tr>
                    <tr>
                    	
                        <th style="text-align:center;" class=""><small style="color:#bbb; padding-right:3px;">#Slot ID</small></th>
                        <th style="text-align:center;" class="">Slot</th>
                    	<th style="text-align:left;" class="">Name</th>
                    	
                        <th style="text-align:center;" class="actionTD"><!--<i class="fa fa-fw fa-upload" title="ข้อมูล ขาออก"></i>-->Out</th>
                        <th style="text-align:center; border-right:1px solid #aaa;" class="actionTD"><!--<i class="fa fa-fw fa-download" title="ข้อมูล ขาเข้า"></i>-->In</th>
                        <th style="text-align:right;" class="">Initial</th>
                        <th style="text-align:right;" class="">Remain</th>

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
                        
                        <td><?=date('Y-m-d H:i:s',$findTRN->lastupdate[$x]);?></td>	
                        
                        <td data-kioskid="<?=$findTRN->kiosk_id[$x]?>" data-iotid="<?=$findTRN->slot_refid[$x]?>" style=" text-align:left;">
							<b style="font-weight:700;"><?=($useKIOS->tcpcode[$findTRN->kiosk_id[$x]])?$useKIOS->tcpcode[$findTRN->kiosk_id[$x]]:'<span style="font-weight:500; color:#666;">'.$findTRN->kiosk_id[$x].'</span>'?></b>
                        </td>
                        
                        <td style=" text-align:center; color:#bbb;">
                        	<span>#<?=$findTRN->slot_refid[$x]?></span>
                        </td>
                        
                        <td style=" text-align:center;">
						<? if($findTRN->slot_id[$x]!=0){ ?>
                        	<?=$findTRN->slot_id[$x]?>
                        <? }else{ ?>
                        	<i class="fa fa-exclamation-triangle" style=" padding-top:3px; color:orange;" title="ไม่มีข้อมูลการปล่อยสินค้า"></i>
                        <? } ?>
                        </td>	
                        	
                        <td>
                        <? if($findTRN->prd_id[$x]){ 
								echo $usePRD->name[$findTRN->prd_id[$x]];
						?>
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
                        <? } //endif ?>
                        </td>	
                        
                        <td style="text-align:center;">
						<? if($findTRN->capacity[$x]) : ?>
                            <span style="font-weight:300;"><?=$findTRN->capacity[$x]?></span>
                        <? endif; ?>
                        </td>
                        
                        <td style=" text-align:center; border-right:1px solid #aaa;">
                        	<span style="color:#000; text-transform: uppercase; font-size:11px;"><?=$findTRN->action[$x]?></span>
                        </td>
                        
                        <? $beforeRemain = 0; ?>
                        <? if($findTRN->action[$x]=='buy' || $findTRN->action[$x]=='remove'){ $beforeRemain = $findTRN->remain[$x] + $findTRN->quantity[$x]; ?>
                        <td style=" text-align:center;">
                        	<span style="color:#fd1c00; font-weight:600;"><?=$findTRN->quantity[$x]?></span>
                        </td>
                        <td style=" border-right:1px solid #aaa;"></td>
                        <? }elseif($findTRN->action[$x]=='fill' || $findTRN->action[$x]=='setup'){ $beforeRemain = $findTRN->remain[$x] - $findTRN->quantity[$x]; ?>
                        <td></td>
                        <td style=" text-align:center; border-right:1px solid #aaa;">
                        	<span style="color:#26B99A ; font-weight:600;"><?=$findTRN->quantity[$x]?></span>
                        </td>
                        <? } ?>    
                        
                        <td style="text-align:right;">
						<? if($findTRN->prd_id[$x]) : ?>
                            <span style=" color:#aaa; font-weight:300;"><?=$beforeRemain?></span>
                        <? endif; ?>
                        </td> 
                        <td style="text-align:right;">
						<? if($findTRN->prd_id[$x]) : ?>
                            <span style=" color:#000; font-weight:600;"><?=$findTRN->remain[$x]?></span>
                        <? endif; ?>
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
