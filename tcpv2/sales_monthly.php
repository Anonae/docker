<?php
// Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Monthly Report";
//$_GET
if($_GET['page']){ $page = $_GET['page'];
} else { $page = 1;
}
if($_GET['kioskid']){ $kioskid = $_GET['kioskid'];
} else { unset($kioskid);
}
if($_GET['productid']){ $productid = $_GET['productid'];
} else { unset($productid);
}
if($_GET['display']){ $display = $_GET['display'];
} else { $display = 25;
}
//Select Year & Month
if($_GET['dateyear'] && $_GET['datemonth']){
$dateyear = $_GET['dateyear'];
$datemonth = str_pad($_GET['datemonth'], 2, "0", STR_PAD_LEFT);
$datefrom = $dateyear.'-'.$datemonth.'-01';
$date = date('Y-m-t', strtotime($datefrom));
/* } elseif($_GET['datefrom'] && $_GET['date']){
  $dateyear = date('Y',strtotime($_GET['date'])); $datemonth = date('m',strtotime($_GET['date']));
  $datefrom = $_GET['datefrom']; $date = $_GET['date']; */
} else {
$dateyear = date('Y');
$datemonth = date('m');
$datefrom = date('Y-m').'-01';
$date = date('Y-m-t');
} //default on This Year & Month
if($_GET['statusid']){ $statusid = $_GET['statusid'];
} else { $statusid = 0;
}
if($_GET['search']){ $search = $_GET['search'];
} else { unset($search);
}
//Set Date for Query
$dateStart = strtotime($datefrom.' 00:00:00');
$dateEnd = strtotime($date.' 23:59:59');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
<?php require_once('inc_head.php'); ?>
      <title><?= $pageTitle ?>, <?= $siteTitle ?></title>
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
                     <li class="breadcrumb-item active" aria-current="page"><?= $pageTitle ?></li>
                  </ol>
               </nav>
               <!--/end Breadcrumb-->

               <!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->

               <div class="row">
                  <div class="content-title">
                     <div class="col-md-8 col-sm-8 col-xs-12">
                        <h2><?= $pageTitle ?>
                           <span style="font-size:15px;">on
                              <b class="text-green"><?= ($datefrom)?$datefrom:'' ?></b> to <b class="text-green"><?= ($date)?$date:'' ?></b>
                           </span>
                        </h2>
                     </div><!--/col-->
                     <div class="col-md-4 col-sm-4 col-xs-12">
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
                     </div><!--/col-->
                  </div><!--/content-title-->
               </div><!--/row-->

               <?php
//Report This Month
               $dateStartMN = strtotime(date('Y-m', $dateEnd).'-01'.' 00:00:00');
               $dateEndMN = strtotime(date('Y-m-t', $dateEnd).' 23:59:59');
               $dateStartMNLast = strtotime("-1 month", $dateStartMN);
               $dateEndMNLast = strtotime(date('Y-m-t', $dateStartMNLast).' 23:59:59');

//Transaction This Month
               $thisSQL = " SELECT * FROM transaction_buy";
               $thisSQL .= " WHERE status = 0 AND time_update BETWEEN {$dateStartMN} AND {$dateEndMN}";

               if($_GET['kioskid']){ $thisSQL .= " AND kiosk_id = {$kioskid}";
               }
               if($_GET['productid']){ $thisSQL .= " AND prd_id = {$productid}";
               }
               $thisSQL .= " ORDER BY id DESC";
// echo $thisSQL;

               $thisResult = ROOT::query($thisSQL);
               while($thisTRN = mysqli_fetch_array($thisResult, MYSQLI_ASSOC)){ $thisMN[] = $thisTRN;
               $thisMNSold += $thisTRN[prd_price];
               }
               ?>

               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="row tile_count cards cardAnalyse" style="margin:15px 0;">
                        <div class="col-md-5 col-sm-12 col-xs-12 tile_stats_count" style="border-right:3px solid rgba(0,0,0,0.06);">
                           <div class="count_top">ยอดขายเดือน <b style="font-weight:500;"><?= date('F Y', $dateStartMN) ?></b> <small>(เดือนที่เลือก)</small></div>
                           <div class="range">ตั้งแต่ <span><?= date('Y-m-d', $dateStartMN) ?></span> ถึง <span><?= date('Y-m-d', $dateEndMN) ?></span></div>
                           <div class="count">
                              <b style=" font-weight:700; color:#5cb85c;"><?= number_format($thisMNSold, 0) ?></b>
                              <small class="unit">บาท</small>
                           </div>
                           <div class="count_bottom"><?= number_format(count($thisMN), 0) ?> <small class="unit">รายการ</small></div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12 tile_stats_count" style="filter: grayscale(1); opacity:0.6;">
                           <div class="count_top">ยอดขายย้อนหลัง 1 เดือน</small></div>
                           <div class="range">ตั้งแต่ <span><?= date('Y-m-d', $dateStartMNLast) ?></span> ถึง <span><?= date('Y-m-d', $dateEndMNLast) ?></span></div>
                           <div class="count">
                              <span style="font-weight:400; font-size:18px;"><?= number_format($lastMNSold, 0) ?></span>
                              <small class="unit">บาท</small>
                           </div>
                           <div class="count_bottom"><?= number_format(count($lastMN), 0) ?> <small class="unit">รายการ</small></div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 tile_stats_count" style="border-left:3px solid rgba(0,0,0,0.06);">
                           <div class="count_top">เปรียบเทียบผลต่าง</div>
                           <div class="range">ระหว่าง เดือน <span><?= date('Y-m', $dateStartMN) ?></span> กับ <span><?= date('Y-m', $dateStartMNLast) ?></span></div>
                           <div class="count" style=" display:table; width:100%;">
                              <? //Compare
                              $compareSold = ($thisMNSold - $lastMNSold);
                              $compareUnit = (count($thisMN) - count($lastMN));
                              //Index
                              $compareIndex = ($compareSold*100)/$lastMNSold;
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

               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="x_panel cards cardRank">
                        <div class="x_title">
                           <p class="text-th">แสดงแผนภูมิแท่ง ยอดขายสินค้าแต่ละวัน</p>
                           <? if($_GET['kioskid'] || $_GET['productid']){ ?>
                           <h5 style="font-size:18px; margin-top:0;">
                              <? if($_GET['kioskid']){ ?>ของตู้กดน้ำ หมายเลข <b class="text-green"><?= $_GET['kioskid'] ?><? } ?></b>
                              <? if($_GET['productid']){ ?>
                              <? for($x = 0; $x < count($loadPRD); $x++){ if($_GET['productid'] == $loadPRD[$x]->id){ $product_name = $loadPRD[$x]->product_name; } } ?>
                              เฉพาะสินค้า  <span style="color:#ccc;">(<?= $_GET['productid'] ?>)</span> <b class="text-green"><?= $product_name ?></b>
                              <? } ?>
                           </h5>
                           <? } ?>
                           <p class="text-help">
                              รายการขาย ตั้งแต่วันที่ <b class="text-green"><?= ($datefrom)?$datefrom:'' ?></b> ถึง <b class="text-green"><?= ($date)?$date:'' ?></b>
                              รวมทั้งหมด <b class="text-green"><?= number_format(count($thisMN), 0) ?></b> รายการ
                           </p>
                        </div>
                        <div class="x_content">
                           <canvas id="dailySoldChart" height="60"></canvas>
                        </div>
                     </div><!--/x_panel-->
                  </div><!--/col-md-12-->
               </div><!--/row-->

               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="x_panel" style="padding-top:5px; padding-bottom:1px; margin-bottom:0px;">
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
                                             <option value="<?= $findKOS->id[$xkos] ?>" <?= ($kioskid == $findKOS->id[$xkos])?'selected':'' ?>><? if($findKOS->tcpcode[$xkos]){ echo '<b>'.$findKOS->tcpcode[$xkos].'</b> <span>('.$findKOS->name[$xkos].')</span>'; }else{echo $findKOS->id[$xkos]; }?></option>
                                             <? endfor; ?>
                                          </select>
                                       </label>
                                    </div>
                                    <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                                       <label>เลือกเจาะจงเฉพาะสินค้า
                                          <select name="productid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" >
                                             <option value="" selected>...</option>
                                             <? $listPRD = new product(); $listPRD->status = 0; $listPRD->loadmany(); ?>
                                             <? for($xsPRD = 0; $xsPRD < $listPRD->totalrecords; $xsPRD++): ?>
                                             <option value="<?= $listPRD->id[$xsPRD] ?>" <?= ($productid == $listPRD->id[$xsPRD])?'selected':'' ?>><?= $listPRD->product_name[$xsPRD] ?></option>
                                             <? endfor; ?>
                                          </select>
                                       </label>
                                    </div>
                                    <div class="dataTables_custom">
                                       <div class="dateRangePicker displayOnly form-inline">
                                          <span>ตั้งแต่วันที่</span>
                                          <input class="form-control input-sm" name="datefrom" id="datefrom" value="<?= ($datefrom)?$datefrom:'' ?>" autocomplete="off" />
                                          <span>ถึง</span>
                                          <input class="form-control input-sm" name="date" id="date" value="<?= ($date)?$date:'' ?>" autocomplete="off" />
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
                                    <th rowspan="2" style="width:138px; text-align:center;">วันที่</th>
                                    <th rowspan="1" colspan="5" style="text-align:center; border-left:1px solid #ddd; font-size:20px;">ยอดขาย (บาท)</th>
                                    <th rowspan="2" colspan="1" style="text-align:right; border-left:1px solid #ddd;">ทำรายการต่อวัน</th>
                                 </tr>
                                 <tr>
                                    <th style="text-align:right; border-left:1px solid #ddd">ยอดขายต่อวัน</th>
                                    <th colspan="2" style="text-align:right;">ผลต่างต่อวัน</th>
                                    <th style="text-align:right;">ยอดขายสะสม</th>
                                    <th style="text-align:right;">คิดเป็น %</th>
                                    <? /*<th style="text-align:right; border-left:1px solid #ddd">ทำรายการต่อวัน</th>
                                    <th style="text-align:right;">ทำรายการสะสม</th>
                                    <th style="text-align:right;">คิดเป็น %</th> */?>
                                 </tr>
                              </thead>
                              <tbody>
                              <style type="text/css">
                                 .tableDateDetails tr.disabled { filter: grayscale(1); opacity:0.3;}
                                 .tableDateDetails tr.disabled:hover { background-color:inherit;}
                                 .tableDateDetails .unit { font-size:11px; font-weight:300; color:#ccc; padding-left:3px;}
                              </style>
                              <?php
                              $dateSoldACCUM = 0;
                              $dateSoldSUMLast = 0;
                              for($x = 1;
                              $x <= date('d', $dateEndMN);
                              $x++) :
                              $onDateTimeStart = strtotime(date('Y-m', $dateEnd).'-'.str_pad($x, 2, "0", STR_PAD_LEFT).' 00:00:00');
                              $onDateTimeStartDATE = date('Y-m', $dateEnd).'-'.str_pad($x, 2, "0", STR_PAD_LEFT).' 00:00:00';
                              $onDateTimeEnd = strtotime(date('Y-m', $dateEnd).'-'.str_pad($x, 2, "0", STR_PAD_LEFT).' 23:59:59');
                              $chartsXAxis_Label[] = str_pad($x, 2, "0", STR_PAD_LEFT); //Chart xAxis Label

                              $dateSoldSUM = 0;
                              for($xd = 0;
                              $xd<=count($thisMN);
                              $xd++){
                              if($thisMN[$xd][time_update] > $onDateTimeStart && $thisMN[$xd][time_update] < $onDateTimeEnd) {
                              $dateTSN[] = $thisMN[$xd];
                              $dateSoldSUM += $thisMN[$xd][prd_price];
                              }
                              }

                              $chartsXAxis_Record[$x] = count($dateTSN); //Chart xAxis Record
                              $dateSoldACCUM += $dateSoldSUM;
                              $soldDateINDEX = ($dateSoldSUM*100)/$thisMNSold;
                              $dateRecordACCUM += count($dateTSN);
                              $dateRecordINDEX = (count($dateTSN)*100)/count($loadTSN);
                              //Calc Difference
                              if($dateSoldSUMLast == 0){ $dateDiff = ($dateSoldSUM - $dateSoldSUMLast);
                              $dateDiffINDEX = 100;
                              }
                              else{ $dateDiff = ($dateSoldSUM - $dateSoldSUMLast);
                              $dateDiffINDEX = ($dateDiff*100)/$dateSoldSUMLast;
                              }
                              //Chart Asset
                              $chartsXAxis_Sold[] = $dateSoldSUM; //Chart xAxis Sold
                              $totalSoldSUMBack = $chartsXAxis_Sold[$x]+$chartsXAxis_Sold[$x-1]+$chartsXAxis_Sold[$x-2];
                              //$totalSoldSUMBack = $chartsXAxis_Sold[$x]+$chartsXAxis_Sold[$x-1];
                              $chartsXAxis_Exponential[] = ($totalSoldSUMBack/3); //Chart xAxis Exponential
                              $chartsXAxis_Trendline[] = ($dateSoldACCUM/$x); //Chart xAxis Trendline
                              ?>
                              <tr id="dateTR_<?= str_pad($x, 2, "0", STR_PAD_LEFT) ?>" class="<?= ($onDateTimeStart>time())?'disabled':'' ?>">
                                 <td style="text-align:center; font-weight:600;"><?= str_pad($x, 2, "0", STR_PAD_LEFT) ?></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; <?= ($dateSoldSUM>0)?'font-weight: 700;':'' ?>">
                                    <span style=" <?= ($dateSoldSUM>0)?'':'color:#ccc;' ?>"><?= number_format($dateSoldSUM, 0) ?></span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; <? if($dateDiff>0){echo'color: #5cb85c;';}elseif($dateDiff<0){echo'color: #fd1c00;';}?>">
                                    <? if($dateDiff>0){echo'<i class="fa fa-caret-up mr5px"></i>';}elseif($dateDiff<0){echo'<i class="fa fa-caret-down mr5px"></i>';}?>
                                    <span style=" <?= ($dateDiff!=0)?'':'color:#ccc;' ?>"><?= number_format(abs($dateDiffINDEX), 2) ?> %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; <? if($dateDiff>0){echo'color: #5cb85c;';}elseif($dateDiff<0){echo'color: #fd1c00;';}?>">
                                    <? if($dateDiff>0){echo'+ ';}elseif($dateDiff<0){echo'- ';} ?>
                                    <span style=" <?= ($dateDiff!=0)?'':'color:#ccc;' ?>"><?= number_format(abs($dateDiff), 0) ?></span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
<?= ($dateSoldSUM>0)?'+':'' ?> <span style=" <?= ($dateSoldSUM>0)?'':'color:#ccc;' ?>"><?= number_format($dateSoldACCUM, 0) ?></span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" <?= ($dateSoldSUM>0)?'':'color:#ccc;' ?>"><?= ($dateSoldSUM>0)?number_format($soldDateINDEX, 2).' %':'- ' ?></span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; <?= ($dateSoldSUM>0)?'font-weight: 700;':'' ?>">
                                    <a href="transaction_lists.php?kioskid=<?= $_GET['kioskid'] ?>&productid=<?= $_GET['productid'] ?>&datefrom=<?= date('Y-m-d', $onDateTimeStart) ?>&date=<?= date('Y-m-d', $onDateTimeEnd) ?>"><span style=" <?= ($dateSoldSUM>0)?'':'color:#ccc;' ?>"><?= number_format(count($dateTSN, 0)) ?></span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <? 	//Storage Last SUM
                              $dateSoldSUMLast = $dateSoldSUM; //จำเป็นต้องอยู่ล่างสุดของ Loop
                              unset($dateTSN);
                              endfor;
                              ?>
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

<script>
//Charts Display
           function init_echarts() {
           if ($('#dailySoldChart').length){
           var ctx = document.getElementById("dailySoldChart");
                   var dailySoldStatement = new Chart(ctx, { type: 'bar',
                           data: {
                           labels: [ < ? for ($x = 1; $x <= count($chartsXAxis_Label); $x++){ echo "'".str_pad($x, 2, "0", STR_PAD_LEFT)."', "; } ? > ],
                                   datasets: [{
                                   label: 'Trend Line', type: 'line', backgroundColor: "rgba(0,0,0,0)", borderColor:"rgba(255,0,0,0.6)", borderDash:[10, 5], borderWidth:1, pointRadius:0, pointHoverRadius:0,
                                           data: [ < ? for ($x = 0; $x < count($chartsXAxis_Label); $x++){ if ($x < 0){ echo ' , '; } else{ echo $chartsXAxis_Trendline[$x].', '; }} ? > ]
                                   }, {
                                   label: 'Sold Amount', backgroundColor: "#26B99A",
                                           data: [ < ? for ($x = 0; $x < count($chartsXAxis_Label); $x++){ echo $chartsXAxis_Sold[$x].', '; } ? > ]
                                   }]
                           },
                           options: { scales: { yAxes: [{ ticks: { beginAtZero: true } }] } }
                   });
           }
           }
   $(document).ready(function () { init_echarts(); init_charts(); });
//Select Picker
           $(document).ready(function () {
   $('#dateYear').selectpicker({ liveSearch: false, maxOptions: 1 });
           $('#dateMonth').selectpicker({ liveSearch: false, maxOptions: 1 });
           });
</script>