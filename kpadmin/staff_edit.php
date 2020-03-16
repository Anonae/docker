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
               <!-- Start Content -->



               <!--start Breadcrumb-->
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="staff_lists.php">Staff</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Editor</li>
                  </ol>
               </nav>
               <!--/end Breadcrumb-->

               <!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
               <div class="row">
                  <div class="content-title">
                     <div class="col-md-7 col-sm-7 col-xs-12">
                        <h2>Staff <b>Editor</b></h2>
                     </div><!--/col-->
                     <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="dataTables_wrapper">
                           <form method="GET">
                              <div class="dataTables_custom" style="width:100%;">
                                 <div class="dateMonthPicker">
                                    <div class="input-prepend input-group">
                                       <span class="add-on input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                                       <div class="btn-group bootstrap-select input-group-btn form-control input-sm selectCustomW100"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" data-id="userid" title="Monai advws.com, (1)"><span class="filter-option pull-left">Monai advws.com<span style="font-weight:300;color:#999;">, (1)</span></span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true">Monai advws.com<span style="font-weight:300;color:#999;">, (1)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">Toonni<span style="font-weight:300;color:#999;">, (1)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">Waraporn<span style="font-weight:300;color:#999;">, (1)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">คุณอู๋ สุดอร่อย<span style="font-weight:300;color:#999;">, (2)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">Virote S<span style="font-weight:300;color:#999;">, (3)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">Koii<span style="font-weight:300;color:#999;">, (2)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">Zee<span style="font-weight:300;color:#999;">, (12)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="7"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">piyapong 2424<span style="font-weight:300;color:#999;">, (2)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="8"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">Khemik<span style="font-weight:300;color:#999;">, (2)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="9"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">Bum<span style="font-weight:300;color:#999;">, (3)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="10"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">v304<span style="font-weight:300;color:#999;">, (2)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="11"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">jumbo<span style="font-weight:300;color:#999;">, (2)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="12"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">MANA-WinkWhite Sys S<span style="font-weight:300;color:#999;">, (2)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="13"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">E-Biz<span style="font-weight:300;color:#999;">, (11)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="14"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">TBT<span style="font-weight:300;color:#999;">, (2)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="15"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">TJ<span style="font-weight:300;color:#999;">, (3)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="16"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">[.:.:.]****<span style="font-weight:300;color:#999;">, (3)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select id="userid" name="staffid" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;" onchange="this.form.submit()" tabindex="-98">
                                             <option data-content="Monai advws.com<span style='font-weight:300;color:#999;'>, (1)</span>" value="2" selected="">Monai advws.com</option>
                                             <option data-content="Toonni<span style='font-weight:300;color:#999;'>, (1)</span>" value="3">Toonni</option>
                                             <option data-content="Waraporn<span style='font-weight:300;color:#999;'>, (1)</span>" value="11">Yu¡!¿Yu¡!¿</option>
                                             <option data-content="คุณอู๋ สุดอร่อย<span style='font-weight:300;color:#999;'>, (2)</span>" value="12">คุณอู๋ สุดอร่อย</option>
                                             <option data-content="Virote S<span style='font-weight:300;color:#999;'>, (3)</span>" value="13">Virote S</option>
                                             <option data-content="Koii<span style='font-weight:300;color:#999;'>, (2)</span>" value="15">Koii</option>
                                             <option data-content="Zee<span style='font-weight:300;color:#999;'>, (12)</span>" value="18">Zee</option>
                                             <option data-content="piyapong 2424<span style='font-weight:300;color:#999;'>, (2)</span>" value="20">piyapong 2424</option>
                                             <option data-content="Khemik<span style='font-weight:300;color:#999;'>, (2)</span>" value="21">Khemik</option>
                                             <option data-content="Bum<span style='font-weight:300;color:#999;'>, (3)</span>" value="25">Bum</option>
                                             <option data-content="v304<span style='font-weight:300;color:#999;'>, (2)</span>" value="26">v304</option>
                                             <option data-content="jumbo<span style='font-weight:300;color:#999;'>, (2)</span>" value="27">jumbo</option>
                                             <option data-content="MANA-WinkWhite Sys S<span style='font-weight:300;color:#999;'>, (2)</span>" value="51">MANA-WinkWhite Sys S</option>
                                             <option data-content="E-Biz<span style='font-weight:300;color:#999;'>, (11)</span>" value="54">E-Biz</option>
                                             <option data-content="TBT<span style='font-weight:300;color:#999;'>, (2)</span>" value="73">TBT</option>
                                             <option data-content="TJ<span style='font-weight:300;color:#999;'>, (3)</span>" value="74">TJ</option>
                                             <option data-content="[.:.:.]****<span style='font-weight:300;color:#999;'>, (3)</span>" value="85">[.:.:.]****</option>
                                          </select></div>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div><!--/col-->
                  </div><!--/content-title-->
               </div><!--/row-->

               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="x_panel">
                        <div class="x_title row">
                           <div class="col-md-8"><p class="text-th">แก้ไขข้อมูล เจ้าหน้าที่เข้าใช้งาน</p></div>
                           <div class="col-md-4">
                              <form class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate="">
                                 <input type="hidden" name="action" value="archived">
                                 <input id="bywho" name="bywho" value="" style="display:none;">
                                 <input id="when" name="when" value="2019-06-14 17:26:17" style="display:none;">
                                 <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-9"><button class="btn btn-block btn-sm btn-danger staffArc" type="submit">Archived</button></div>
                              </form>
                           </div>
                        </div><!--/x_title-->
                        <div class="x_content">
                           <form class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate="">
                              <input type="hidden" name="action" value="edited">
                              <input id="bywho" name="bywho" value="" style="display:none;">
                              <input id="when" name="when" value="2019-06-14 17:26:17" style="display:none;">

                              <div class="row">

                                 <div class="col col-md-3 col-sm-4 col-xs-12 col-image">
                                    <div class="form-group" style="text-align:center;">
                                       <img id="preview" src="https://profile.line-scdn.net/0hVpkesoIQCV9WHCWNaAV2CGpZBzIhMg8XLi5FOHofU2Z8fxsKbi4VbnpOUDx8KE1dOX1DOXpLUz8v" class="img-responsive" style="max-height:300px; margin:0 auto; background: #f7f7f7; border: 1px solid #e6e6e6; padding: 2px; box-shadow: 0 10px 20px -10px rgba(0,0,0,0.35); border-radius: 100%;">
                                    </div>
                                 </div><!--/col-->

                                 <div class="col col-md-9 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Display Name</label>
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" type="text" id="displayname" name="displayname" value="" required="">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Line Name</label>
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" type="text" id="linename" name="linename" value="Monai advws.com" required="" readonly="">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12"> Line UserID</label>
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" type="text" id="lineuserid" name="lineuserid" value="Ub11851038609f394401ba3ea9a69b815" required="" readonly="">
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Permission</label>
                                       <div class="col-md-6 col-sm-12 col-xs-12">
                                          <div class="btn-group bootstrap-select form-control input-sm selectCustomW100"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" data-id="permission" title="..."><span class="filter-option pull-left">...</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">...</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><b style="font-weight:600;">Administrator</b> <span>(ผู้ดูแลระบบ)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><b style="font-weight:600;">Monitor</b> <span>(ผู้ตรวจสอบ)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><b style="font-weight:600;">Sales Officer</b> <span>(พนักงานขาย)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><b style="font-weight:600;">VanSale Officer</b> <span>(พนักงานหน่วยรถ)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select id="permission" name="per_id" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;" tabindex="-98">
                                                <option value="0">...</option>
                                                <option data-content="<b style='font-weight:600;'>Administrator</b> <span>(ผู้ดูแลระบบ)</span>" value="2">Administrator</option>
                                                <option data-content="<b style='font-weight:600;'>Monitor</b> <span>(ผู้ตรวจสอบ)</span>" value="3">Monitor</option>
                                                <option data-content="<b style='font-weight:600;'>Sales Officer</b> <span>(พนักงานขาย)</span>" value="11">Sales Officer</option>
                                                <option data-content="<b style='font-weight:600;'>VanSale Officer</b> <span>(พนักงานหน่วยรถ)</span>" value="12">VanSale Officer</option>
                                             </select></div>
                                          <p class="text-help">สิทธิการเข้าใช้งานระบบ</p>
                                       </div>
                                    </div>
                                    <div class="form-group form-group-route" style="display:none;">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Route</label>
                                       <div class="col-md-6 col-sm-12 col-xs-12">
                                          <div class="btn-group bootstrap-select form-control input-sm selectCustomW100"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" data-id="route" title="..."><span class="filter-option pull-left">...</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">...</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><b style="font-weight:600;">Ladkrabang</b> <span>(กรุงเทพมหานคร)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><b style="font-weight:600;">Chonburi</b> <span>(ชลบุรี)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select id="route" name="route_id" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;" tabindex="-98">
                                                <option value="0">...</option>
                                                <option data-content="<b style='font-weight:600;'>Ladkrabang</b> <span>(กรุงเทพมหานคร)</span>" value="2">Ladkrabang</option>
                                                <option data-content="<b style='font-weight:600;'>Chonburi</b> <span>(ชลบุรี)</span>" value="3">Chonburi</option>
                                             </select></div>
                                          <p class="text-help">เส้นทางการเดินรถ (สำหรับพนักงานหน่วยรถ)</p>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile</label>
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" type="text" id="mobile" name="mobile" value="" required="">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" type="text" id="description" name="description" value="" required="">
                                       </div>
                                    </div>
                                 </div><!--/col-->

                              </div><!--/row-->

                              <div class="row">
                                 <div class="ln_solid"></div>
                                 <div class="col-md-3 col-sm-6 col-xs-12"><a href="staff_lists.php" class="btn btn-default btn-lg btn-block">Back to Staff Lists</a></div>
                                 <div class="col-md-9 col-sm-6 col-xs-12"><button class="btn btn-primary btn-lg btn-block" type="submit">Submit Edited</button></div>
                              </div><!--/row-->

                           </form>
                        </div><!--/x_content-->
                     </div><!--/x_panel-->
                  </div><!--/col-md-12-->

               </div><!--/row-->

               <!-- // End Content on PAGE /////////////////////////////////////////////////////// -->



               <!-- End Content -->
            </div><!-- /right_col -->



            <!-- footer content -->
            <footer>
               <?php require_once('inc_footer.php'); ?>
            </footer>
            <!-- /footer content -->
         </div><!-- /main_container -->
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
