<?php // Script on PAGE

session_start(); 
include("../main_include.php");
include("../includes/config.php"); 
include("login_check.php");

//Site Detail
$pageTitle = "Maintenance Tool"; 
//$_GET
if($_GET['kioskid']){ $kioskid = $_GET['kioskid']; } else { unset($kioskid);  }
if($_GET['productid']){ $productid = $_GET['productid']; } else { unset($productid);  }
if($_GET['statusid']){ $statusid = $_GET['statusid']; } else { $statusid = 0; }
if($_GET['datefrom']){ $datefrom = $_GET['datefrom']; } else { $datefrom = date('Y-m').'-01';  } //default set to first Day of this month
if($_GET['date']){ $date = $_GET['date']; } else { $date = date('Y-m-t');  }  //default set to last Day of this month
if($_GET['onhour']){ $onhour = $_GET['onhour']; } else { unset($onhour);  }  //default set to 24 hour of this month

//Select Year & Month
	if($_GET['dateyear'] && $_GET['datemonth']){ 
		$dateyear = $_GET['dateyear']; $datemonth = str_pad($_GET['datemonth'],2,"0",STR_PAD_LEFT); 
		$datefrom = date('Y-').$datemonth.'-01'; $date = date('Y-m-t', strtotime($datefrom)); 
	} else { 
		$dateyear = date('Y'); $datemonth = date('m'); $datefrom = date('Y-m').'-01'; $date = date('Y-m-t'); 
	} //default on This Year & Month
if($_GET['search']){ $search = $_GET['search']; } else { unset($search); } 

//Set Date for Query
$dateStart = strtotime($datefrom.' 00:00:00');
$dateEnd = strtotime($date.' 23:59:59'); 

//print_r ($_SESSION); die();

?>
<!DOCTYPE html> 
<html lang="en">
<head>
<?php require_once('inc_head.php'); ?>	
    <title><?=$pageTitle?>, TCP Admin cPanel.</title> 
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
            <li class="breadcrumb-item active" aria-current="page"><?=$pageTitle?></li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->

<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2><?=$pageTitle?></h2>
        </div><!--/col-->     
    </div><!--/content-title-->
</div><!--/row-->     


<style type="text/css">
#canvasKiosk { margin:0; padding:0 5px;}
#canvasKiosk.kioskGrid .kiosk-wrap { float:left; width:20%; display:block; padding:5px;}
#canvasKiosk.kioskTable .kiosk-wrap { float:left; width:100%; display:block; padding:5px;}

/*Kiosk-Box*/
.kiosk-box { color:#000; border:1px solid rgba(0,0,0,0.1); padding:10px; background-color:#fff; box-shadow:0 10px 30px -20px rgba(0,0,0,0.5); position:relative;}
.kiosk-box .kiosk-row { display:inline-block; width:100%; border-bottom:1px dotted rgba(0,0,0,0.1); padding-top:5px;}
.kiosk-box .kiosk-row.first-row { border-bottom:1px dotted rgba(0,0,0,0.1); margin-bottom:5px; padding-top:15px; padding-bottom:5px;}
.kiosk-box .kiosk-id { position:absolute; top:-3px; left:5px; background-color:#2A3F54; color:#fff; padding:0 5px; box-shadow:0 3px 6px -3px rgba(0,0,0,0.3); border-radius:0 0 6px 1px;}
.kiosk-box .kiosk-status { position:absolute; top:-5px; right:0; padding:0 5px; }
.kiosk-box .kiosk-status .badge { height:23px; width:23px; font-size:14px; line-height:22px; text-align:center; border-radius:100%; padding:0;}
.kiosk-box .kiosk-status .badge-success { background-color:#1ABB9C ;}
.kiosk-box .kiosk-status .badge-danger { background-color:#fd1c00 ;}
.kiosk-box .kiosk-status .badge i.fa { color:#fff; margin:0 auto;}
.kiosk-box .topic { color:#999; display:inline-block; width:65px; border-right:1px dotted rgba(0,0,0,0.1); margin-right:5px;}
.kiosk-box .data { color:#111; display:inline-block; width:calc(100% - 75px);}

/*kioskTable*/
.kioskTable .kiosk-box .kiosk-row { width:calc(18%); border-bottom:none; vertical-align:top; padding:0 5px;}
.kioskTable .kiosk-box .kiosk-row.first-row { width:calc(28% - 12px); border-bottom:none; vertical-align:bottom; margin-bottom:0;}
.kioskTable .kiosk-box .topic { width:100%; border:none; margin-right:0;}


</style>

<div class="row row-dashboard" style="padding-bottom:15px;">
<div id="canvasKiosk" class="kiosk-maintenance kioskGrid">
<?php
//Kiosk 
$findKiosk = new kiosk();
$findKiosk->status = 1;
$findKiosk->loadmany();

//Kiosk Loop 
for($x=0; $x < $findKiosk->totalrecords; $x++) : 
	//Check-in
	$sql = "SELECT MAX(time_update) AS checkintime";
	$sql .= " FROM kiosk_checkin";
	$sql .= " WHERE kiosk_id = {$findKiosk->id[$x]}";
	$res = ROOT::query($sql);
	while($row = mysqli_fetch_array($res , MYSQLI_ASSOC)){ $checkintime = $row[checkintime]; }; //vd($checkintime); //die;
	//Buy
	$sql = "SELECT MAX(time_update) AS lastbuy";
	$sql .= " FROM transaction_buy";
	$sql .= " WHERE kiosk_id = {$findKiosk->id[$x]}";
	$res = ROOT::query($sql);
	while($row = mysqli_fetch_array($res , MYSQLI_ASSOC)){ $lastbuy = $row[lastbuy]; }; //vd($lastbuy); //die;
	//Reset
	$sql = "SELECT MAX(resetdate) AS resetdate";
	$sql .= " FROM kiosk_balance_reset";
	$sql .= " WHERE kiosk_id = {$findKiosk->id[$x]}";
	$res = ROOT::query($sql);
	while($row = mysqli_fetch_array($res , MYSQLI_ASSOC)){ $resetdate = $row[resetdate]; }; //vd($resetdate); //die;
	//Find Cash
	$totalCash = 0;
	$trnBUY = new transaction_buy();
		$trnBUY->kiosk_id = $findKiosk->id[$x];
		$sqlBUY .= " AND time_create > {$resetdate}";
	$trnBUY->loadmany(" {$sqlBUY} ORDER BY `id` DESC");
	for($b=0;$b<$trnBUY->totalrecords;$b++){ $totalCash += $trnBUY->prd_price[$b]; }
	
	//DateDiff
	$duration = '';
	$start_date = new DateTime(date('Y-m-d H:i:s', $lastbuy)); 
	$end_date = new DateTime(date("Y-m-d H:i:s")); 
	$duration = date_diff($end_date, $start_date); 
?>

<div class="kiosk-wrap">
    <div class="kiosk-box" title="<?=$findKiosk->name[$x]?>">
    
    	<div class="kiosk-id"><b><?=str_pad($findKiosk->id[$x],6,0,STR_PAD_LEFT)?></b></div>
        
        <div class="kiosk-status">
        	<? if($checkintime+((5*60)+30) < time()){ //ระบบจะรายงานตัวทุกๆ 5นาที ถ้ามากกว่า 6นาที ยังไม่รายงานตัว ถือว่า ผิดปกติ ?>
            <span class="badge badge-danger" title="มีปัญหาสัญญาณหาย"><i class="fa fa-fw fa-exclamation"></i></span>
            <? }else{ ?>
            <span class="badge badge-success" title="รายงานตัวปกติ"><i class="fa fa-fw fa-check"></i></span>
            <? } ?>
        </div>
        
        <div class="kiosk-row first-row">
        	<?=$findKiosk->description[$x]?><br><span style="color:#aaa;"><?=$findKiosk->name[$x]?></span>
        </div>
        
        <div class="kiosk-row">
        	<div class="topic">Check-in</div> 
            <div class="data">
            	<span class="<? if($checkintime+((5*60)+30) < time()){echo'text-red';}else{echo'text-green';} ?>" style="font-size:11px;"><?=date('Y-m-d H:i:s',$checkintime)?></span>
            </div>
        </div>
    
        <div class="kiosk-row">
        	<div class="topic">Reset</div> 
            <div class="data">
            	<span style="font-size:11px;"><?=date('Y-m-d H:i:s',$resetdate)?></span>
            </div>
        </div>
                        
        <div class="kiosk-row">
        	<div class="topic">Last Sold</div> 
            <div class="data">
			<? if($lastbuy){ ?>
				<? if($duration->m.$duration->d >= 1) : ?>
                	<span style="color:#aaa; font-weight:500;">เกิน 1 วันขึ้นไป</span>
                <? elseif($duration->m.$duration->d.$duration->h.$duration->i >= 1) : ?>
                    <span style="color:#111;">
                    <?=($duration->h)?$duration->h.' ชั่วโมง ':'';?>
                    <?=($duration->i)?$duration->i.' นาที ':'';?>
                    </span>
                <? elseif($duration->m.$duration->d.$duration->h.$duration->i <= 0) : ?>
                    <span style="color:#1ABB9C;"><?=($duration->s)?"ไม่ถึงนาที":'';?></span>
                <? endif; ?>    
            <? }else{ echo '<small style="color:orange;font-style: italic;">No Data</small>'; } ?>
            </div>
        </div>
 
		<div class="kiosk-row" style="border-bottom:none;">
        	<div class="topic">Cash</div> 
            <div class="data">
            	<span><?=number_format($totalCash,0)?></span> <small style="color:#aaa;">THB</small> 
            </div>
        </div>

    </div><!--/.kiosk-box-->
</div><!--/.kiosk-wrap-->
    
<? endfor; //Kiosk Loop ?>
</div><!--/.kiosk-maintenance--> 
</div><!--/.row-->


<!-- // End Content on PAGE /////////////////////////////////////////////////////// -->

</div><!-- /right_col -->
<?php require_once('inc_footer.php'); ?>
</div><!-- /main_container -->
</div><!-- /container -->
<?php require_once('inc_footer_script.php'); ?>	

</body>
</html>
            
<script type="text/javascript">
function canvasGen(){	
	$('#canvasKiosk').hide();
	var kioskCanvas = $('#canvasKiosk').width(); console.log('kioskCanvas-> '+kioskCanvas);
	//Responsive
	/*if(kioskCanvas<900){ 
		$('#canvasKiosk').removeClass('kioskGrid');
		$('#canvasKiosk').addClass('kioskTable');
	}else{
		$('#canvasKiosk').removeClass('kioskTable');
		$('#canvasKiosk').addClass('kioskGrid');
	}*/
	if(kioskCanvas>1200){ $('.kiosk-wrap').css('width','20%'); }
	if(kioskCanvas<1200 && kioskCanvas>1001){  $('.kiosk-wrap').css('width','25%'); }
	if(kioskCanvas<1000 && kioskCanvas>801){  $('.kiosk-wrap').css('width','33.3333333333333%'); }
	if(kioskCanvas<800){ $('.kiosk-wrap').css('width','50%'); }
	
	var boxWidth = (kioskCanvas/5); 
	$('#canvasKiosk').fadeIn(300);
	//find maxHeight
	var highest = null; var hi = 0;
	$(".kiosk-box").each(function(){
		var h = $(this).height();
		if(h > hi){ hi = h; highest = $(this); } 
	});
	var maxHeight = highest.height();
	$('.kiosk-box').height(maxHeight);
}

$(document).ready(function(){
	canvasGen();
});
$(window).resize(function() {
	canvasGen();
});




</script>
