<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php"); 

//Site Detail
$pageTitle = "Kiosk"; 
//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['display']){ $display = $_GET['display']; } else { $display = 25;  }

if($_GET['kioskid']){ $kioskid = $_GET['kioskid']; } else { unset($kioskid);  }

if($_GET['datefrom']){ $datefrom = $_GET['datefrom']; } else { $datefrom = date('Y-m').'-01';  } //default set to first Day of this month
if($_GET['date']){ $date = $_GET['date']; } else { $date = date('Y-m-t');  }  //default set to last Day of this month

//Set Date for Query
$dateStart = strtotime($datefrom.' 00:00:00'); 
$dateEnd = strtotime($date.' 23:59:59');

//Fetch Kiosk
$fetchKiosk = new kiosk();
$fetchKiosk->status = 1;
if($_GET['kioskid']){ $fetchKiosk->id = $_GET['kioskid']; }
$fetchKiosk->loadmany(' ORDER BY id DESC'); //$fetchKiosk->track();

//Find Max Reset
/*$sql = "SELECT kiosk_id, MAX(time_update) AS checkintime, temp_fan1, temp_fan2, temp_fan3, temp_com1, temp_com2, temp_com3 ";
$sql .= " FROM kiosk_checkin";
if($_GET['kioskid']){ $sql .= " WHERE kiosk_id = {$kioskid}"; }
$sql .= " GROUP BY kiosk_id";
$sql .= " ORDER BY kiosk_id DESC";
//if($display == 'ALL'){ $sql .= " LIMIT all"; }
$res = ROOT::query($sql);
while($row = mysqli_fetch_array($res , MYSQLI_ASSOC)){ $findCheckin[] = $row; }; //vd($findCheckin); die;*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('inc_head.php'); ?>	
    <title>Check-in, <?=$siteTitle?></title> 
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
            <li class="breadcrumb-item active" aria-current="page"><?=$pageTitle?> Check-in</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2><?=$pageTitle?> <b>Check-in</b>
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
            <p class="text-th">แสดงข้อมูล การส่งสัญญาณ <b class="b600" style="color:#000;">รายงานตัว</b> ทั้งหมด</p>
            <? if($_GET['kioskid'] || $_GET['productid']){ ?>
            <h5 style="font-size:18px;">
                <? if($_GET['kioskid']){ ?>ของตู้กดน้ำ หมายเลข <b class="text-green"><?=$_GET['kioskid']?><? } ?></b>
            </h5>
            <? } ?>
            <p class="text-help">
           		ตั้งแต่วันที่ <b class="text-green"><?=($datefrom)?$datefrom:''?></b> ถึง <b class="text-green"><?=($date)?$date:''?></b>
                รวมทั้งหมด <b class="text-green"><?=number_format($fetchKiosk->totalrecords,0)?></b> รายการ
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
                            <? $findKOS = new kiosk(); $findKOS->status = 1; $findKOS->loadmany(); ?>
							<? for($xkos = 0; $xkos < $findKOS->totalrecords; $xkos++): ?>
                                <option value="<?=$findKOS->id[$xkos]?>" <?=($kioskid == $findKOS->id[$xkos])?'selected':''?>><? if($findKOS->tcpcode[$xkos]){ echo '<b>'.$findKOS->tcpcode[$xkos].'</b> <span>('.$findKOS->name[$xkos].')</span>'; }else{echo $findKOS->id[$xkos]; }?></option>
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
                    <? /*$findTRN = $fetchTRN;*/ $page_show = $display; $total_record = count($findCheckin); ?>
                    <?php require_once('inc_pagination.php'); ?>
                </div>
            </form>
            </div>
            
            <style type="text/css">
			 	.table>thead>tr.mini>th { text-align:center; width:30px; padding:8px 4px;}
			</style>
            <table id="" class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th rowspan="2"  style="color:#bbb;"><small>#ID</small></th>
                        <th rowspan="2" colspan="2">Time</th>
                        <th rowspan="2" style=" text-align:left;">Kiosk</th>
                        <th rowspan="1" colspan="6" style=" text-align:left;">Temperature</th>
                        <th rowspan="2" style=" text-align:left;">Description</th>
                    </tr>
                    <tr class="mini">
                    	<th>F1</th><th>F2</th><th>F3</th><th>C1</th><th>C2</th><th>C3</th>
                    </tr>
                </thead>
                
                <tbody>
                <? if($fetchKiosk->totalrecords!=0): ?>
                 <? 	///bypass kiosk()
						$usePRD = new product(); $usePRD->loadmany(); 
						$usePRD->name = array_combine($usePRD->id,$usePRD->product_name); //vd($useKOS->route); die;
						$useKIOS = new kiosk(); $useKIOS->loadmany(); 
						$useKIOS->tcpcode = array_combine($useKIOS->id,$useKIOS->tcpcode);
						$useKIOS->name = array_combine($useKIOS->id,$useKIOS->name);
				?>
                <? for ($x = 0; $x < $fetchKiosk->totalrecords; $x++) : $num = $x+1; ?>
                
<?php //Fetch MAX(time_update)
$sql[$x] = "SELECT * ";
$sql[$x] .= " FROM kiosk_checkin";
$sql[$x] .= " WHERE kiosk_id = {$fetchKiosk->id[$x]} AND time_update = (SELECT MAX(time_update) FROM kiosk_checkin WHERE kiosk_id = {$fetchKiosk->id[$x]})";
//$sql[$x] .= " ORDER BY kiosk_id DESC";
//if($display == 'ALL'){ $sql .= " LIMIT all"; }
$res[$x] = ROOT::query($sql[$x]); //echo $sql[$x]; die;
while($row[$x] = mysqli_fetch_array($res[$x] , MYSQLI_ASSOC)){ $findCheckin[$x] = $row[$x]; }; //vd($findCheckin); die;
?>

                    <tr id="rowID_<?=$findTRN->id[$x];?>">
                    
                        <td class="ordinal"><small>#<?=$findCheckin[$x][id];?></small></td>
                        
                        <td><?=date('Y-m-d H:i:s',$findCheckin[$x][time_update]);?></td>
                        
                        <td>
						<? if($findCheckin[$x][time_update]){ ?>
                        	<? 	//DateDiff
									$duration = '';
									$start_date = new DateTime(date('Y-m-d H:i:s', $findCheckin[$x][time_update])); 
									$end_date = new DateTime(date("Y-m-d H:i:s")); 
									$duration = date_diff($end_date, $start_date); 
							?>
							<?	 if($duration->m.$duration->d >= 1) : ?>
                                		<span style="color:#aaa;">สัญญาณหาย 1 วันแล้ว</span>
                            <?	 elseif($duration->m.$duration->d.$duration->h >= 1) : ?>
                                		<span style="color:#aaa;">ไม่รายงานตัวเกิน 1 ชั่วโมงขึ้นไป</span>
                            <? 	elseif($duration->m.$duration->d.$duration->h.$duration->i > 6) : ?>
                                		<span style="color:#111;">การรายงานตัว ขาดหาย <?=$duration->i.' นาที'?></span>
                            <? 	elseif($duration->m.$duration->d.$duration->h.$duration->i <= 6) : ?>
                                		<span style="color:#1ABB9C;font-size:15px;font-weight:600;">รายงานตัวปกติ</span>
                            <? 	endif; ?>   
                        <? }else{ echo '<small style="color:orange;font-style: italic;">No Data</small>'; } ?>
                        </td>
                        
                        <td style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=<?=$findCheckin[$x][kiosk_id];?>">
                                <b style="font-weight:700;"><?=($useKIOS->tcpcode[$findCheckin[$x][kiosk_id]])?str_pad($useKIOS->tcpcode[$findCheckin[$x][kiosk_id]],6,0,STR_PAD_LEFT):'<span style="font-weight:500; color:#666;">'.str_pad($findCheckin[$x][kiosk_id],6,0,STR_PAD_LEFT).'</span>'?></b>
                            </a>
                            <? if($useKIOS->name[$findCheckin[$x][kiosk_id]]){ ?><span style="color:#bbb; padding-left:3px; font-weight: 300;">(<?=$useKIOS->name[$findCheckin[$x][kiosk_id]]?>)</span><? } ?>
                        </td>
                        
                        <td align="center"><?=$findCheckin[$x][temp_fan1]?></td>
                        <td align="center"><?=$findCheckin[$x][temp_fan2]?></td>
                        <td align="center"><?=$findCheckin[$x][temp_fan3]?></td>
                        <td align="center"><?=$findCheckin[$x][temp_com1]?></td>
                        <td align="center"><?=$findCheckin[$x][temp_com2]?></td>
                        <td align="center"><?=$findCheckin[$x][temp_com3]?></td>

                        <td><?=$findCheckin[$x][description]?></td>                        
                    </tr>
                <? endfor; ?>
                <? else: ?>
                	<tr><td colspan="13" class="noData"><i>No Data !!!</i></td></tr>
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