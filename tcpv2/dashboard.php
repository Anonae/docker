<?php
// Script on PAGE

session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Daily Report";
//$_GET
if($_GET['kioskid']){ $kioskid = $_GET['kioskid'];
} else { unset($kioskid);
}
if($_GET['productid']){ $productid = $_GET['productid'];
} else { unset($productid);
}
if($_GET['statusid']){ $statusid = $_GET['statusid'];
} else { $statusid = 0;
}
if($_GET['datefrom']){ $datefrom = $_GET['datefrom'];
} else { $datefrom = date('Y-m').'-01';
} //default set to first Day of this month
if($_GET['date']){ $date = $_GET['date'];
} else { $date = date('Y-m-t');
}  //default set to last Day of this month
if($_GET['onhour']){ $onhour = $_GET['onhour'];
} else { unset($onhour);
}  //default set to 24 hour of this month
//Select Year & Month
if($_GET['dateyear'] && $_GET['datemonth']){
$dateyear = $_GET['dateyear'];
$datemonth = str_pad($_GET['datemonth'], 2, "0", STR_PAD_LEFT);
$datefrom = date('Y-').$datemonth.'-01';
$date = date('Y-m-t', strtotime($datefrom));
} else {
$dateyear = date('Y');
$datemonth = date('m');
$datefrom = date('Y-m').'-01';
$date = date('Y-m-t');
} //default on This Year & Month
if($_GET['search']){ $search = $_GET['search'];
} else { unset($search);
}

//Set Date for Query
$dateStart = strtotime($datefrom.' 00:00:00');
$dateEnd = strtotime($date.' 23:59:59');

//print_r ($_SESSION); die();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
<?php require_once('inc_head.php'); ?>
      <title><?= $pageTitle ?>, TCP Admin cPanel.</title>
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
                     <li class="breadcrumb-item active" aria-current="page"><?= $pageTitle ?></li>
                  </ol>
               </nav>
               <!--/end Breadcrumb-->

               <!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->

<?php if($_GET['error']) : ?>
               <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-fw fa-close"></i></button>
                  <h4 style="margin-bottom:0;">หน้าที่ท่านเรียก ไม่สามารถเปิดใช้งานได้ เนื่องจาก สิทธิของท่านไม่อนุญาตให้ใช้งาน</h4>
               </div>
               <? endif ?>

               <div class="row">
                  <div class="content-title">
                     <div class="col-md-8 col-sm-8 col-xs-12">
                        <h2><?= $pageTitle ?>
                           <span style="font-size:23px;">on <b style="color:#111;"><?= date('Y-m-d') ?></b></span>
                        </h2>
                     </div><!--/col-->
                     <div class="col-md-4 col-sm-4 col-xs-12">
                        <? /*
                        <div class="dataTables_wrapper">
                        <form method="GET">
                        <div class="dataTables_custom" style="width:100%;">
                        <div class="dateMonthPicker">
                        <div class="input-prepend input-group">
                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        <select id="dateYear" name="dateyear" class="form-control input-sm selectpicker selectCustomYear" style="width:auto;" onchange="this.form.submit()">
                        <? for($xYr = date('Y'); $xYr >= 2016; $xYr--): ?>
                        <option value="<?= $xYr ?>" <?= ($dateyear == $xYr)?'selected':'' ?>><?= $xYr ?></option>
                        <? endfor; ?>
                        </select>
                        <select id="dateMonth" name="datemonth" class="form-control input-sm selectpicker selectCustomMonth" style="width:auto;" onchange="this.form.submit()">
                           <? for($xMn = 01; $xMn <= 12; $xMn++): ?>
                           <option data-content="<span style='font-weight:400;color:#aaa;'><?= date('(m)', strtotime("$xMn/12/10")) ?></span> <?= date('F', strtotime("$xMn/12/10")) ?>"
                                   value="<?= date('m', strtotime("$xMn/12/10")) ?>" <?= ($datemonth == $xMn)?'selected':'' ?>
                                   ><?= date('(m) F', strtotime("$xMn/12/10")) ?></option>
                           <? endfor; ?>
                        </select>
                     </div>
                  </div>
               </div>
               </form>
            </div>
            */ ?>
         </div><!--/col-->
      </div><!--/content-title-->
   </div><!--/row-->

   <?
   //To Day
   $today = date('Y-m-d');
   $dateStartToDay = strtotime($today.' 00:00:00');
   $dateEndToDay = strtotime($today.' 23:59:59');
   //Transaction To Day
   $today_sql = " SELECT * FROM transaction_buy";
   $today_sql .= " WHERE status = 0 AND time_create BETWEEN {$dateStartToDay} AND {$dateEndToDay}";
   if($_GET['kioskid']){ $today_sql .= " AND kiosk_id = {$kioskid}";}
   if($_GET['productid']){ $today_sql .= " AND prd_id = {$productid}";}
   $today_sql .= " ORDER BY id DESC";
   $today_result = ROOT::query($today_sql);
   while($today_trn = mysqli_fetch_array($today_result,MYSQLI_ASSOC)){ $today_fetch[] = $today_trn; $today_sumPrice += $today_trn[prd_price]; }

   $yesterday = date('Y-m-d',strtotime("-1 days"));
   $dateStartYesterday = strtotime($yesterday.' 00:00:00');
   $dateEndYesterday = strtotime($yesterday.' 23:59:59');
   //Transaction Yesterday
   $yesterday_sql = " SELECT * FROM transaction_buy";
   $yesterday_sql .= " WHERE status = 0 AND time_create BETWEEN {$dateStartYesterday} AND {$dateEndYesterday}";
   if($_GET['kioskid']){ $yesterday_sql .= " AND kiosk_id = {$kioskid}";}
   if($_GET['productid']){ $yesterday_sql .= " AND prd_id = {$productid}";}
   $yesterday_sql .= " ORDER BY id DESC";
   $yesterday_result = ROOT::query($yesterday_sql);
   while($yesterday_trn = mysqli_fetch_array($yesterday_result,MYSQLI_ASSOC)){ $yesterday_fetch[] = $yesterday_trn; $yesterday_sumPrice += $yesterday_trn[prd_price]; }
   ?>

   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="row tile_count cards cardAnalyse" style="margin:15px 0; border-top:1px dotted rgba(0,0,0,0.12); margin-top:0; padding-top:15px;">
            <div class="col-md-5 col-sm-12 col-xs-12 tile_stats_count" style="border-right:3px solid rgba(0,0,0,0.06);">
               <div class="count_top">ยอดขายวันนี้ <b style="font-weight:500; padding-left:5px;"><?= date('l, d F Y', $dateStartToDay) ?></b></div>
               <div class="range">วันที่ <span><?= date('Y-m-d', $dateStartToDay) ?></span> </div>
               <div class="count">
                  <b style=" font-weight:700; color:#5cb85c;"><?= number_format($today_sumPrice, 0) ?></b>
                  <small class="unit">บาท</small>
               </div>
               <div class="count_bottom"><?= number_format(count($today_fetch), 0) ?> <small class="unit">รายการ</small></div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 tile_stats_count" style="filter: grayscale(1); opacity:0.6;">
               <div class="count_top">ยอดขายเมื่อวานนี้</small></div>
               <div class="range">วันที่ <span><?= date('Y-m-d', $dateStartYesterday) ?></span></div>
               <div class="count">
                  <span style="font-weight:400; font-size:18px;"><?= number_format($yesterday_sumPrice, 0) ?></span>
                  <small class="unit">บาท</small>
               </div>
               <div class="count_bottom"><?= number_format(count($yesterday_fetch), 0) ?> <small class="unit">รายการ</small></div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 tile_stats_count" style="border-left:3px solid rgba(0,0,0,0.06);">
               <div class="count_top">เปรียบเทียบผลต่าง</div>
               <div class="range">ระหว่าง วันนี้ <span><?= date('Y-m-d', $dateStartToDay) ?></span> กับเมื่อวาน <span><?= date('Y-m-d', $dateStartYesterday) ?></span></div>
               <div class="count" style=" display:table; width:100%;">
                  <? //Compare
                  $compareSold = ($today_sumPrice - $yesterday_sumPrice);
                  $compareUnit = (count($today_fetch) - count($yesterday_fetch));
                  //Index
                  $compareIndex = ($compareSold*100)/$yesterday_sumPrice;
                  ?>
                  <div style="width:35%; float:left; text-align:left;">
                    	<span style="font-weight:700; font-size:18px; <? if($compareIndex>0){echo'color:#5cb85c;';}elseif($compareIndex<0){echo'color:#fd1c00;';}?>">
                        <style type="text/css"> .mr5px { margin-right:5px;} </style>
                        <? if($compareIndex>0){echo'<i class="fa fa-caret-up mr5px"></i>';}elseif($compareIndex<0){echo'<i class="fa fa-caret-down mr5px"></i>';}?>
<?= number_format(abs($compareIndex), 2) ?> %
                     </span>
                  </div>
                  <div style="width:65%; float:right; text-align:right;">
                     <span style="font-weight:400; font-size:18px; <? if($compareSold>0){echo'color:#5cb85c;';}elseif($compareSold<0){echo'color:#fd1c00;';}?>">
                        <? if($compareSold>0){echo'+ ';}elseif($compareSold<0){echo'- ';}?> <?= number_format(abs($compareSold), 0) ?>
                     </span>
                     <small class="unit">บาท</small>
                  </div>
               </div>
               <div class="count_bottom">
                  <? if($compareIndex>0){echo'+ ';}elseif($compareIndex<0){echo'- ';}?>
<?= number_format(abs($compareUnit), 0) ?>
                  <small class="unit">รายการ</small>
               </div>
            </div>
         </div><!--/cards-->
      </div><!--/col-md-12-->
   </div><!--/row-->

   <div class="row row-dashboard">
      <div class="col-md-7 col-sm-7 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <p class="text-th">แสดงกราฟช่วงเวลา ยอดขายสินค้า <b class="b600" style="color:#000;">แต่ละชั่วโมง</b></p>
               <p class="text-help">
                  รายการขาย เฉพาะวันที่ <b class="text-green" style="font-size:18px; padding:0 5px; line-height:0;"><?= ($today)?$today:'' ?></b> แสดงเป็นช่วงเวลาแต่ละชั่วโมง
                  รวมทั้งหมด <b class="text-green"><?= number_format(count($today_fetch), 0) ?></b> รายการ
               </p>
            </div>
            <div class="x_content">
               <? 	$periodSoldACCUM = 0; $hournow = date('H');
               for($x=0; $x < $hournow; $x++) :
               $xPeriod = str_pad($x,2,"0",STR_PAD_LEFT)." น.";
               //$xPeriod = str_pad($x,2,"0",STR_PAD_LEFT).':00:00 - '.str_pad($x,2,"0",STR_PAD_LEFT).':59:59';
               //Link href DateTime
               $onDateTimeStart = $dateStart;
               $onDateTimeEnd = $dateEnd;
               $chartsXAxis_Label[] = $xPeriod; //Chart xAxis Label

               $totalSold = 0; $periodSoldSUM = 0;
               for($xd=0; $xd<=count($today_fetch); $xd++){ $totalSold += $today_fetch[$xd][prd_price];
               if(date('H', $today_fetch[$xd][time_update]) == str_pad($x,2,"0",STR_PAD_LEFT) ) {
               $periodTSN[] = $today_fetch[$xd];
               $periodSoldSUM += $today_fetch[$xd][prd_price];
               }
               }
               $periodRecordACCUM += count($periodTSN);
               $periodRecordINDEX = (count($periodTSN)*100)/count($today_fetch);
               $periodSoldACCUM += $periodSoldSUM;
               $periodSoldINDEX = ($periodSoldSUM*100)/$totalSold;
               //Chart Asset
               $chartsXAxis_Sold[] = $periodSoldSUM; //Chart xAxis Sold
               $chartsXAxis_Record[] = count($periodTSN); //Chart xAxis Record
               $totalSoldSUMBack = $chartsXAxis_Sold[$x]+$chartsXAxis_Sold[$x-1]+$chartsXAxis_Sold[$x-2] ;
               $chartsXAxis_Exponential[] = ($totalSoldSUMBack/3); //Chart xAxis Exponential
               $chartsXAxis_Trendline[] = ($periodSoldACCUM/$x); //Chart xAxis Trendline

               unset($periodTSN); endfor;
               ?>
               <canvas id="dailySoldChart" height="80"></canvas>
            </div>
         </div><!--/x_panel-->
      </div><!--/col-->

      <div class="col-md-5 col-sm-5 col-xs-12">
         <div class="x_panel" style=" padding: 0 10px; background-color:#fff; border: 3px solid #73879c; box-shadow:0 5px 10px rgba(0,0,0,0.1);">
            <div class="x_content">
               <table class="table table-hover tableDateDetails">
                  <thead>
                     <tr>
                        <th style="text-align:left;">ตู้กดน้ำ</th>
                        <th style="text-align:left; border-left:1px solid #ddd;">ซื้อสินค้าล่าสุด</th>
                        <th style="text-align:left; border-left:1px solid #ddd;">Check-in ล่าสุด</th>
                     </tr>
                  </thead>
                  <tbody>
                  <style type="text/css">
                     .tableDateDetails tr.disabled { filter: grayscale(1); opacity:0.3;}
                     .tableDateDetails tr.disabled:hover { background-color:inherit;}
                     .tableDateDetails .unit { font-size:11px; font-weight:300; color:#ccc; padding-left:3px;}
                  </style>
                  <? 	//Transaction Sell ///////////////////////////////////////////////////////////////
                  $sell_sql = " SELECT kiosk_id, MAX(time_update) AS lasttime, MAX(id) AS id";
                  $sell_sql .= " FROM transaction_buy";
                  $sell_sql .= " WHERE status IN(0)";
                  $sell_sql .= " GROUP BY kiosk_id";
                  $sell_result = ROOT::query($sell_sql);
                  while($sell_row = mysqli_fetch_array($sell_result,MYSQLI_ASSOC)){ $sell_fetch[] = $sell_row; };  //vd($sell_fetch); die;
                  //Transaction SYNC /////////////////////////////////////////////////////////////
                  $useSYNC = new kiosk_checkin();
                  $sync_sql = " GROUP BY kiosk_id";
                  $useSYNC->loadmany($sync_sql,"","","kiosk_id, MAX(time_update) AS lasttime, MAX(id) AS id"); //$useSYNC->track(); die;
                  $useSYNC->lasttime = array_combine($useSYNC->kiosk_id,$useSYNC->lasttime);
                  //Bypass Kiosk
                  $useKIOS = new kiosk(); $useKIOS->loadmany();
                  $useKIOS->tcpcode = array_combine($useKIOS->id,$useKIOS->tcpcode);
                  $useKIOS->name = array_combine($useKIOS->id,$useKIOS->name);
                  for($sell_x=0; $sell_x < min(count($sell_fetch), 10); $sell_x++) :
                  ?>
                  <tr id="trID_<?= $sell_fetch[$sell_x][id] ?>">
                     <td style="text-align:left;" data-status="<?= $sell_fetch[$sell_x][status] ?>">
                        <b style="font-weight:500; color:#000;"><?= ($useKIOS->tcpcode[$sell_fetch[$sell_x][kiosk_id]])?$useKIOS->tcpcode[$sell_fetch[$sell_x][kiosk_id]]:$sell_fetch[$sell_x][kiosk_id]; ?></b>
                        <span>( <?= ($useKIOS->name[$sell_fetch[$sell_x][kiosk_id]])?$useKIOS->name[$sell_fetch[$sell_x][kiosk_id]]:''; ?> )</span>
                     </td>
                     <td style="border-left:1px solid #ddd;">
                        <? //Duration Time
                        $start_date = new DateTime(date('Y-m-d H:i:s', $sell_fetch[$sell_x][lasttime]));
                        $end_date = new DateTime(date("Y-m-d H:i:s"));
                        $duration = date_diff($end_date, $start_date);
                        ?>
                        <span style=" <? if($duration->m.$duration->d.$duration->h >= 3){ echo "font-weight:700; color:#fd1c00;";} elseif($duration->m.$duration->d.$duration->h >= 1){ echo "font-weight:500; color:orange;";} else { echo "font-weight:500; color:#5cb85c;"; } ?> ">
                              <? if($duration->m.$duration->d >= 1) : ?>
                              <span style="color:#aaa; font-weight:500;">เกิน 1 วันขึ้นไป</span>
                                                                               <? elseif($duration->m.$duration->d.$duration->h.$duration->i >= 1) : ?>
<?= ($duration->m)?$duration->m.' เดือน ':''; ?>
<?= ($duration->d)?$duration->d.' วัน ':''; ?>
<?= ($duration->h)?$duration->h.' ชั่วโมง ':''; ?>
<?= ($duration->i)?$duration->i.' นาที ':''; ?>
                                                                               <? elseif($duration->m.$duration->d.$duration->h.$duration->i <= 0) : ?>
<?= ($duration->s)?"ไม่ถึงนาที":''; ?>
                                                                               <? endif; ?>
                                                                            </span>
                        </td>
                        <td style="border-left:1px solid #ddd;">
                           <? //Duration Time
                           $startReset = new DateTime(date('Y-m-d H:i:s', $useSYNC->lasttime[$sell_fetch[$sell_x][kiosk_id]]));
                           $endReset = new DateTime(date("Y-m-d H:i:s"));
                           $durationReset = date_diff($endReset, $startReset);
                           ?>
                           <? if($durationReset->m.$durationReset->d >= 1) : ?>
                           <span style="color:#aaa; font-weight:500;"><?= date('Y-m-d H:i:s', $useSYNC->lasttime[$sell_fetch[$sell_x][kiosk_id]]) ?></span>
                           <? else : ?>
                           <span style="color:#5cb85c; font-weight:500;"><?= date('Y-m-d H:i:s', $useSYNC->lasttime[$sell_fetch[$sell_x][kiosk_id]]) ?></span>
                           <? endif ?>
                        </td>
                     </tr>
                     <? endfor; ?>
                     </tbody>
                  </table>
               </div><!--/x_content-->
               <div class="x_footer" style="border-top:1px solid #efefef; ">
                  <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i> <a href="sales_kiosks_nonactive.php" class="more">รายละเอียดเพิ่มเติม</a>
               </div>
            </div><!--/x_panel-->
         </div><!--/col-->
      </div><!--/row-->

      <div class="row row-dashboard">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <? //Transaction List ///////////////////////////////////////////////////////////////
            if($_GET['display']){ $display = $_GET['display']; } else { $display = 25; }
            if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }

            $findTRN = new transaction_buy();
            //SQL Query
            $trn_sql = " WHERE `status` = 0";
            if($_GET['kioskid']){ $trn_sql .= " AND `kiosk_id` = {$_GET['kioskid']}"; }
            if($_GET['productid']){ $trn_sql .= " AND `prd_id` = {$_GET['productid']}"; }
            if($date){ $trn_sql .= " AND `time_update` BETWEEN {$dateStartToDay} AND {$dateEndToDay}"; }
            $findTRN->loadmany(" {$trn_sql} ORDER BY `id` DESC ",$display,$page); //$findTRN->track(); die;
            ?>
            <div class="x_panel">
               <div class="x_title" style="border-bottom:none; margin-bottom:0; padding-bottom:0;">
                  <p class="text-th">แสดงข้อมูล รายการธุรกรรม <b class="b600" style="color:#111;">ขายสินค้า</b></p>
                  <p class="text-help">รายการขาย เฉพาะวันที่ <b class="text-green" style="font-size:18px; padding:0 5px; line-height:0;"><?= ($today)?$today:'' ?></b>
                     รวมทั้งหมด <b class="text-green"><?= number_format($findTRN->totalrecords, 0) ?></b> รายการ</p>
               </div>
               <div class="x_content">
                  <div class="dataTables_wrapper">
                     <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
                        <div class="top topSelect" style=" width:100%; display:table;">
                           <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                              <label>Kiosk
                                 <select name="kioskid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" >
                                    <option value="" selected>...</option>
                                    <? $listKOS = new kiosk(); $listKOS->status = 1; $listKOS->loadmany(); ?>
                                    <? for($xkos = 0; $xkos < $listKOS->totalrecords; $xkos++): ?>
                                    <option value="<?= $listKOS->id[$xkos] ?>" <?= ($kioskid == $listKOS->id[$xkos])?'selected':'' ?>><? if($listKOS->tcpcode[$xkos]){ echo '<b>'.$listKOS->tcpcode[$xkos].'</b> <span>('.$listKOS->name[$xkos].')</span>'; }else{echo $listKOS->id[$xkos]; }?></option>
                                    <? endfor; ?>
                                 </select>
                              </label>
                           </div>
                        </div><!--/top-->
                        <div class="top">
                           <div class="dataTables_filter">
                              <label>Search
                                 <input type="search" class="form-control input-sm autoFilter" placeholder="<?= $search ?>" onchange="this.form.submit()" disabled />
                              </label>
                           </div>
                           <? $page_show = $display; $total_record = $findTRN->totalrecords; ?>
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
                        <tr id="trTRN_<?= $findTRN->id[$x]; ?>">
                           <td class="ordinal"><small><?= $findTRN->id[$x]; ?></small></td>
                           <td><?= date('Y-m-d H:i:s', $findTRN->time_update[$x]); ?></td>
                           <td style=" text-align:center; color:#bbb;"><small>#<?= $findTRN->iot_id[$x] ?></small></td>
                           <td id="kioskid_<?= $findTRN->kiosk_id[$x] ?>" style=" text-align:left;">
                              <a class="" href="kiosk_view.php?kioskid=<?= $findTRN->kiosk_id[$x]; ?>">
                               <!--<a class="" href="?kioskid=<?= $findTRN->kiosk_id[$x]; ?>&datefrom=<?= $datefrom ?>&date=<?= $date ?>&display=<?= $display ?>">-->
                                 <b style="font-weight:700;"><?= ($useKIOS->tcpcode[$findTRN->kiosk_id[$x]])?$useKIOS->tcpcode[$findTRN->kiosk_id[$x]]:$findTRN->kiosk_id[$x] ?></b>
                              </a>
                              <? if($useKIOS->name[$findTRN->kiosk_id[$x]]){ ?><span style="color:#bbb; padding-left:3px; font-weight: 300;">(<?= $useKIOS->name[$findTRN->kiosk_id[$x]] ?>)</span><? } ?>
                           </td>

                           <td style=" text-align:center;">
                              <? if($findTRN->slot_id[$x]!=0){ ?>
<?= $findTRN->slot_id[$x] ?>
                              <? }else{ ?>
                              <i class="fa fa-exclamation-triangle" style=" padding-top:3px; color:orange;" title="ไม่มีข้อมูลการปล่อยสินค้า"></i>
                              <? } ?>
                           </td>

                           <td id="tdPRD_<?= $findTRN->prd_id[$x] ?>">
                              <? if($findTRN->prd_id[$x]){
                              echo $usePRD->name[$findTRN->prd_id[$x]];
                              ?>
                              <? if($findTRN->prd_price[$x]!=0): ?>
                              <span style="color:#ccc; font-weight:300;"> - <?= number_format($findTRN->prd_price[$x], 0) ?> บ.</span>
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
                              <span style="color:#ccc; font-weight:300;"> - <?= number_format($findSlot->price, 0) ?> บ.</span>
                              <? endif; ?>
                              <? } //endif ?>
                           </td>
                           <td style="text-align:center;">
                              <? if($findTRN->prd_id[$x]) : ?>
                              <? if($findTRN->prd_remain[$x]==0) { ?>
                              <span style="font-weight:300;color:#fd1c00;font-weight:600;">ขายหมด</span>
                              <? }else{ ?>
                              <span style="font-weight:300;"><?= $findTRN->prd_remain[$x] ?></span>
                              <? } ?>
                              <? endif; /*else : ?>
                              <span style="font-weight:300;color:orange;"><?= $findTRN->prd_remain[$x] ?></span>
                              <? endif;*/ ?>
                           </td>
                           <td style=" text-align:center;"><?= ($findTRN->coin1B[$x]==0)?'':$findTRN->coin1B[$x]; ?></td>
                           <td style=" text-align:center;"><?= ($findTRN->coin2B[$x]==0)?'':$findTRN->coin2B[$x]; ?></td>
                           <td style=" text-align:center;"><?= ($findTRN->coin5B[$x]==0)?'':$findTRN->coin5B[$x]; ?></td>
                           <td style=" text-align:center;"><?= ($findTRN->coin10B[$x]==0)?'':$findTRN->coin10B[$x]; ?></td>
                           <td style=" text-align:center;"><?= ($findTRN->note20B[$x]==0)?'':$findTRN->note20B[$x]; ?></td>
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
                              <? if($calcTopup!=0): ?><span style="color:#000;">+ <b style=" font-weight:700;"><?= number_format(abs($calcTopup), 0) ?></b></span>
                              <? endif; ?>
                           </td>
                           <td id="changeTDid_<?= $findTRN->kiosk_id[$x] ?>" style=" text-align:right;">
                              <? 	$returnTopup = 0;
                              if($findTRN->prd_price[$x]){
                              $returnTopup = $calcTopup - $findTRN->prd_price[$x]; // echo $returnTopup;
                              }elseif($findSlot->price){
                              $returnTopup = $calcTopup - $findSlot->price; // echo $returnTopup;
                              }
                              $totalRetuen += $returnTopup;
                              ?>
                              <? if($findTRN->slot_id[$x]==0) { // กินเงินลูกค้า ทำรายการเกิน 5 นาที ?>
                              <i class="fa fa-exclamation-triangle pull-left" style=" padding-top:3px; color:orange;" title="กินเงินลูกค้า <?= number_format(abs($calcTopup), 0) ?> บาท"></i>

                              <? }else{ ?>
                              <? if($returnTopup > 0) : // เหตุการณ์ปกติ *หยอดเงินมา มากกว่า ราคาสินค้า ?>
                              <? if($returnTopup > 10) : ?>
                              <i class="fa fa-exclamation-circle pull-left" style=" padding-top:3px; color:#ccc;" title="พฤติกรรมการหยอด ผิดปกติ "></i>
                              <span style="color:#aaa; font-weight:400;">- <?= number_format($returnTopup, 0) ?></span>
                              <? else : ?>
                              <span style="color:#fd1c00; font-weight:600;">- <?= number_format($returnTopup, 0) ?></span>
                              <? endif; ?>

                              <? elseif($returnTopup < 0) : // เหตุการณ์ผิด *หยอดเงินมา น้อยกว่า ราคาสินค้า ?>
                              <i class="fa fa-exclamation-triangle pull-left" style=" padding-top:3px; color:orange;" title="ข้อมูลการหยอดเงินไม่ครบถ้วน ยอดขาดไป <?= abs($returnTopup) ?> บาท"></i>
                              <span style="color:#aaa; font-weight:400;">+ <?= number_format(abs($returnTopup), 0) ?></span>

                              <? elseif($returnTopup == 0) : // หยอดเงินมาพอดี ราคาสินค้า ?>
                              <span style="color:#ccc; font-weight:300;">0</span>

                              <? endif; // ข้อมูลหยอดเหรียญ ผิดปกติ ?>
                              <? } // กินเงินลูกค้า ?>
                           </td>
                           <td style=" text-align:center;">
                              <? if($findTRN->slot_id[$x]==0) { // กินเงินลูกค้า ทำรายการเกิน 5 นาที ?>
                              <span style=" color:#5cb85c;">+ <b style=" font-weight:700;"><?= number_format($calcTopup, 0) ?></b></span>
                              <? }elseif($returnTopup < 0){ ?>
                              <span style=" color:#ccc;"><b style=" font-weight:400;">0</b></span>
                              <? }else{ ?>
                              <? if($findTRN->prd_price[$x]!=0){ ?>
                              <span style=" color:#5cb85c;">+ <b style=" font-weight:700;"><?= number_format($findTRN->prd_price[$x], 0) ?></b></span>
                              <? }elseif($findSlot->price){ ?>
                              <span style=" color:#5cb85c;">+ <b style=" font-weight:700;"><?= number_format($findSlot->price, 0) ?></b></span>
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
               </div><!--/.x_content-->
               <div class="x_footer"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i> <a href="transaction_lists.php" class="more">แสดงรายการทั้งหมด</a></div>
            </div><!--/.x_panel-->
         </div><!--/.col-->
      </div><!--/.row-->


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
//Select Picker
           $(document).ready(function () {
   $('#dateYear').selectpicker({ liveSearch: false, maxOptions: 1 });
           $('#dateMonth').selectpicker({ liveSearch: false, maxOptions: 1 });
           });
//Charts Display
           function init_charts() {
           if ($('#dailySoldChart').length){
           var ctx = document.getElementById("dailySoldChart");
                   var dailySoldStatement = new Chart(ctx, { type: 'line',
                           data: {
                           labels: [ < ? for ($x = 0; $x <= count($chartsXAxis_Label); $x++){ echo "'".$chartsXAxis_Label[$x]."', "; } ? > ],
                                   datasets: [{
                                   label: 'Trend Line', type: 'line', backgroundColor: "rgba(0,0,0,0)", borderColor:"rgba(255,0,0,0.6)", borderDash:[10, 5], borderWidth:1, pointRadius:0, pointHoverRadius:0,
                                           data: [ < ? for ($x = 0; $x < count($chartsXAxis_Label); $x++){ if ($x < 0){ echo ' , '; } else{ echo $chartsXAxis_Trendline[$x].', '; }} ? > ]
                                   }, {
                                   label: 'Sold Amount', lineTension:0, backgroundColor: "rgba(38,185,154,0.5)", borderColor:"#26B99A", borderWidth:2, pointRadius:3, pointHoverRadius:6, pointBackgroundColor:"#FFFFFF", pointBorderColor:"#26B99A", pointHoverBackgroundColor:"#FFFFFF", pointHoverBorderColor:"#26B99A",
                                           data: [ < ? for ($x = 0; $x < count($chartsXAxis_Label); $x++){ echo $chartsXAxis_Sold[$x].', '; } ? > ]
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
</script>
