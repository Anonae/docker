<!DOCTYPE html>
<html lang="en">
   <head>
      <?php require_once 'inc_head_href.php'; ?>
      <title> Kaoook Vending </title>
   </head>

   <body class="nav-md">
      <div class="container body">
         <div class="main_container">
            <div class="col-md-3 left_col">
               <?php require_once 'inc_menu_main.php'; ?>
            </div><!-- /.col-md-3 left_col -->

            <!-- top navigation -->
            <?php require_once 'inc_top_nav.php'; ?>



            <div class="right_col" role="main">
               <!--start Breadcrumb-->
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb" >
                     <li class="breadcrumb-item active" aria-current="page">Daily Report</li>
                  </ol>
               </nav>
               <!--/end Breadcrumb-->

               <!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->


               <div class="row">
                  <div class="content-title">
                     <div class="col-md-8 col-sm-8 col-xs-12">
                        <h2>Daily Report
                           <span style="font-size:23px;">on <b style="color:#111;">2019-06-14</b></span>
                        </h2>
                     </div><!--/col-->
                     <div class="col-md-4 col-sm-4 col-xs-12">
                     </div><!--/col-->
                  </div><!--/content-title-->
               </div><!--/row-->


               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="row tile_count cards cardAnalyse" style="margin:15px 0; border-top:1px dotted rgba(0,0,0,0.12); margin-top:0; padding-top:15px;">
                        <div class="col-md-5 col-sm-12 col-xs-12 tile_stats_count" style="border-right:3px solid rgba(0,0,0,0.06);">
                           <div class="count_top">ยอดขายวันนี้ <b style="font-weight:500; padding-left:5px;">Friday, 14 June 2019</b></div>
                           <div class="range">วันที่ <span>2019-06-14</span> </div>
                           <div class="count">
                              <b style=" font-weight:700; color:#5cb85c;">12</b>
                              <small class="unit">บาท</small>
                           </div>
                           <div class="count_bottom">1 <small class="unit">รายการ</small></div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12 tile_stats_count" style="filter: grayscale(1); opacity:0.6;">
                           <div class="count_top">ยอดขายเมื่อวานนี้</small></div>
                           <div class="range">วันที่ <span>2019-06-13</span></div>
                           <div class="count">
                              <span style="font-weight:400; font-size:18px;">70</span>
                              <small class="unit">บาท</small>
                           </div>
                           <div class="count_bottom">7 <small class="unit">รายการ</small></div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 tile_stats_count" style="border-left:3px solid rgba(0,0,0,0.06);">
                           <div class="count_top">เปรียบเทียบผลต่าง</div>
                           <div class="range">ระหว่าง วันนี้ <span>2019-06-14</span> กับเมื่อวาน <span>2019-06-13</span></div>
                           <div class="count" style=" display:table; width:100%;">
                              <div style="width:35%; float:left; text-align:left;">
                                 <span style="font-weight:700; font-size:18px; color:#fd1c00;">
                                    <style type="text/css"> .mr5px { margin-right:5px;} </style>
                                    <i class="fa fa-caret-down mr5px"></i>						82.86 %
                                 </span>
                              </div>
                              <div style="width:65%; float:right; text-align:right;">
                                 <span style="font-weight:400; font-size:18px; color:#fd1c00;">
                                    -  58                        </span>
                                 <small class="unit">บาท</small>
                              </div>
                           </div>
                           <div class="count_bottom">
                              - 					6
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
                              รายการขาย เฉพาะวันที่ <b class="text-green" style="font-size:18px; padding:0 5px; line-height:0;">2019-06-14</b> แสดงเป็นช่วงเวลาแต่ละชั่วโมง
                              รวมทั้งหมด <b class="text-green">1</b> รายการ
                           </p>
                        </div>
                        <div class="x_content">
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
                              <tr id="trID_1118">
                                 <td style="text-align:left;" data-status="">
                                    <b style="font-weight:500; color:#000;">2323</b>
                                    <span>( กระทิงแดง สนามบอล )</span>
                                 </td>
                                 <td style="border-left:1px solid #ddd;">
                                    <span style=" font-weight:500; color:orange; ">
                                       1 ชั่วโมง                         28 นาที
                                    </span>
                                 </td>
                                 <td style="border-left:1px solid #ddd;">
                                    <span style="color:#5cb85c; font-weight:500;">2019-06-14 15:02:37</span>
                                 </td>
                              </tr>
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
                     <div class="x_panel">
                        <div class="x_title" style="border-bottom:none; margin-bottom:0; padding-bottom:0;">
                           <p class="text-th">แสดงข้อมูล รายการธุรกรรม <b class="b600" style="color:#111;">ขายสินค้า</b></p>
                           <p class="text-help">รายการขาย เฉพาะวันที่ <b class="text-green" style="font-size:18px; padding:0 5px; line-height:0;">2019-06-14</b>
                              รวมทั้งหมด <b class="text-green">1</b> รายการ</p>
                        </div>
                        <div class="x_content">
                           <div class="dataTables_wrapper">
                              <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
                                 <div class="top topSelect" style=" width:100%; display:table;">
                                    <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                                       <label>Kiosk
                                          <select name="kioskid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" >
                                             <option value="" selected>...</option>
                                             <option value="2323" ><b>2323</b> <span>(กระทิงแดง สนามบอล)</span></option>
                                             <option value="4152" >4152</option>
                                             <option value="4153" >4153</option>
                                          </select>
                                       </label>
                                    </div>
                                 </div><!--/top-->
                                 <div class="top">
                                    <div class="dataTables_filter">
                                       <label>Search
                                          <input type="search" class="form-control input-sm autoFilter" placeholder="" onchange="this.form.submit()" disabled />
                                       </label>
                                    </div>

                                    <div class="dataTables_length">
                                       <label>Record/Page
                                          <select name="display" class="form-control input-sm autoFilter" onchange="this.form.submit()">
                                             <option value="10" >10</option>
                                             <option value="25" selected>25</option>
                                             <option value="50" >50</option>
                                             <option value="100" >100</option>
                                             <option value="1000" >1000</option>
                                          </select>
                                       </label>
                                    </div>

                                    <div class="dataTables_paginate paging_simple_numbers">
                                       <ul class="pagination">
                                          <!-- Previous -->
                                          <!-- First -->

                                          <!-- Main Loop -->

                                          <!-- Last -->
                                          <!-- Next -->
                                       </ul>
                                    </div>

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
                                 <tr id="trTRN_1118">
                                    <td class="ordinal"><small>1118</small></td>
                                    <td>2019-06-14 13:32:47</td>
                                    <td style=" text-align:center; color:#bbb;"><small>#1745</small></td>
                                    <td id="kioskid_2323" style=" text-align:left;">
                                       <a class="" href="kiosk_view.php?kioskid=2323">
                                          <!--<a class="" href="?kioskid=2323&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                          <b style="font-weight:700;">2323</b>
                                       </a>
                                       <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>

                                    <td style=" text-align:center;">
                                       21                                                </td>

                                    <td id="tdPRD_142">
                                       น้ำแอปเปิ้ล ชบา 230 ซีซี.                                                            <span style="color:#ccc; font-weight:300;"> - 12 บ.</span>
                                    </td>
                                    <td style="text-align:center;">
                                       <span style="font-weight:300;">25</span>
                                    </td>
                                    <td style=" text-align:center;">2</td>
                                    <td style=" text-align:center;"></td>
                                    <td style=" text-align:center;"></td>
                                    <td style=" text-align:center;">1</td>
                                    <td style=" text-align:center;"></td>
                                    <td style=" text-align:center;">
                                       <span style="color:#000;">+ <b style=" font-weight:700;">12</b></span>
                                    </td>
                                    <td id="changeTDid_2323" style=" text-align:right;">
                                       <span style="color:#ccc; font-weight:300;">0</span>

                                    </td>
                                    <td style=" text-align:center;">
                                       <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">12</b></span>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div><!--/.x_content-->
                        <div class="x_footer"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i> <a href="transaction_lists.php" class="more">แสดงรายการทั้งหมด</a></div>
                     </div><!--/.x_panel-->
                  </div><!--/.col-->
               </div><!--/.row-->


               <!-- // End Content on PAGE /////////////////////////////////////////////////////// -->

            </div><!-- /right_col -->
            <!-- footer content -->
            <footer>
               <?php require_once('inc_footer.php'); ?>
            </footer>
            <!-- /footer content --></div><!-- /main_container -->
      </div><!-- /container -->
      <!-- jQuery -->

      <?php require_once('inc_footer_script.php'); ?>
   </body>
</html>

<style type="text/css">
   tr.onFocus>td { background-color:rgba(38,185,154,0.1);}
</style>

<script type="text/javascript">


//On Focus
   $('td').click(function () {
      $(this).parent().toggleClass('onFocus')
   });

//Select Picker
   $(document).ready(function () {
      $('#dateYear').selectpicker({liveSearch: false, maxOptions: 1});
      $('#dateMonth').selectpicker({liveSearch: false, maxOptions: 1});
   });

//Charts Display
   function init_charts() {
      if ($('#dailySoldChart').length) {
         var ctx = document.getElementById("dailySoldChart");
         var dailySoldStatement = new Chart(ctx, {type: 'line',
            data: {
               labels: ['00 น.', '01 น.', '02 น.', '03 น.', '04 น.', '05 น.', '06 น.', '07 น.', '08 น.', '09 น.', '10 น.', '11 น.', '12 น.', '13 น.', '14 น.', '', ],
               datasets: [{
                     label: 'Trend Line', type: 'line', backgroundColor: "rgba(0,0,0,0)", borderColor: "rgba(255,0,0,0.6)", borderDash: [10, 5], borderWidth: 1, pointRadius: 0, pointHoverRadius: 0,
                     data: [, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.92307692307692, 0.85714285714286, ]
                  }, {
                     label: 'Sold Amount', lineTension: 0, backgroundColor: "rgba(38,185,154,0.5)", borderColor: "#26B99A", borderWidth: 2, pointRadius: 3, pointHoverRadius: 6, pointBackgroundColor: "#FFFFFF", pointBorderColor: "#26B99A", pointHoverBackgroundColor: "#FFFFFF", pointHoverBorderColor: "#26B99A",
                     data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12, 0, ]
                  }]
            },
            options: {
               scales: {yAxes: [{ticks: {beginAtZero: true}}]},
               legend: {display: false}
            }
         });
      }
   }
   $(document).ready(function () {
      init_charts();
   });
</script>
