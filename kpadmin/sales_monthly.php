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
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="transaction_lists.php">Sales</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Monthly Report</li>
                  </ol>
               </nav>
               <!--/end Breadcrumb-->

               <!-- // Start Content on PAGE /////////////////////////////////////////////////// -->

               <div class="row">
                  <div class="content-title">
                     <div class="col-md-8 col-sm-8 col-xs-12">
                        <h2>Monthly Report 5555
                           <span style="font-size:15px;">on
                              <b class="text-green">2019-06-01</b> to <b class="text-green">2019-06-30</b>
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
                                       <div class="btn-group bootstrap-select input-group-btn form-control input-sm selectCustomYear"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" data-id="dateYear" title="2019"><span class="filter-option pull-left">2019</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">2019</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">2018</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">2017</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">2016</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select id="dateYear" name="dateyear" class="form-control input-sm selectpicker selectCustomYear" style="width:auto;" onchange="this.form.submit()" tabindex="-98">
                                             <option value="2019" selected="">2019</option>
                                             <option value="2018">2018</option>
                                             <option value="2017">2017</option>
                                             <option value="2016">2016</option>
                                          </select></div>
                                       <div class="btn-group bootstrap-select input-group-btn form-control input-sm selectCustomMonth"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" data-id="dateMonth" title="(06) June"><span class="filter-option pull-left"><span style="font-weight:400;color:#aaa;">(06)</span> June</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span style="font-weight:400;color:#aaa;">(01)</span> January<span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span style="font-weight:400;color:#aaa;">(02)</span> February<span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span style="font-weight:400;color:#aaa;">(03)</span> March<span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span style="font-weight:400;color:#aaa;">(04)</span> April<span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span style="font-weight:400;color:#aaa;">(05)</span> May<span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span style="font-weight:400;color:#aaa;">(06)</span> June<span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span style="font-weight:400;color:#aaa;">(07)</span> July<span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="7"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span style="font-weight:400;color:#aaa;">(08)</span> August<span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="8"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span style="font-weight:400;color:#aaa;">(09)</span> September<span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="9"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span style="font-weight:400;color:#aaa;">(10)</span> October<span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="10"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span style="font-weight:400;color:#aaa;">(11)</span> November<span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="11"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span style="font-weight:400;color:#aaa;">(12)</span> December<span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select id="dateMonth" name="datemonth" class="form-control input-sm selectpicker selectCustomMonth" style="width:auto;" onchange="this.form.submit()" tabindex="-98">
                                             <option data-content="<span style='font-weight:400;color:#aaa;'>(01)</span> January" value="01">(01) January</option>
                                             <option data-content="<span style='font-weight:400;color:#aaa;'>(02)</span> February" value="02">(02) February</option>
                                             <option data-content="<span style='font-weight:400;color:#aaa;'>(03)</span> March" value="03">(03) March</option>
                                             <option data-content="<span style='font-weight:400;color:#aaa;'>(04)</span> April" value="04">(04) April</option>
                                             <option data-content="<span style='font-weight:400;color:#aaa;'>(05)</span> May" value="05">(05) May</option>
                                             <option data-content="<span style='font-weight:400;color:#aaa;'>(06)</span> June" value="06" selected="">(06) June</option>
                                             <option data-content="<span style='font-weight:400;color:#aaa;'>(07)</span> July" value="07">(07) July</option>
                                             <option data-content="<span style='font-weight:400;color:#aaa;'>(08)</span> August" value="08">(08) August</option>
                                             <option data-content="<span style='font-weight:400;color:#aaa;'>(09)</span> September" value="09">(09) September</option>
                                             <option data-content="<span style='font-weight:400;color:#aaa;'>(10)</span> October" value="10">(10) October</option>
                                             <option data-content="<span style='font-weight:400;color:#aaa;'>(11)</span> November" value="11">(11) November</option>
                                             <option data-content="<span style='font-weight:400;color:#aaa;'>(12)</span> December" value="12">(12) December</option>
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
                     <div class="row tile_count cards cardAnalyse" style="margin:15px 0;">
                        <div class="col-md-5 col-sm-12 col-xs-12 tile_stats_count" style="border-right:3px solid rgba(0,0,0,0.06);">
                           <div class="count_top">ยอดขายเดือน <b style="font-weight:500;">June 2019</b> <small>(เดือนที่เลือก)</small></div>
                           <div class="range">ตั้งแต่ <span>2019-06-01</span> ถึง <span>2019-06-30</span></div>
                           <div class="count">
                              <b style=" font-weight:700; color:#5cb85c;">1,140</b>
                              <small class="unit">บาท</small>
                           </div>
                           <div class="count_bottom">102 <small class="unit">รายการ</small></div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12 tile_stats_count" style="filter: grayscale(1); opacity:0.6;">
                           <div class="count_top">ยอดขายย้อนหลัง 1 เดือน</div>
                           <div class="range">ตั้งแต่ <span>2019-05-01</span> ถึง <span>2019-05-31</span></div>
                           <div class="count">
                              <span style="font-weight:400; font-size:18px;">0</span>
                              <small class="unit">บาท</small>
                           </div>
                           <div class="count_bottom">0 <small class="unit">รายการ</small></div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 tile_stats_count" style="border-left:3px solid rgba(0,0,0,0.06);">
                           <div class="count_top">เปรียบเทียบผลต่าง</div>
                           <div class="range">ระหว่าง เดือน <span>2019-06</span> กับ <span>2019-05</span></div>
                           <div class="count" style=" display:table; width:100%;">
                              <div style="width:35%; float:left; text-align:left;">
                                 <span style="font-weight:700; font-size:18px; ">
                                    <style type="text/css"> .mr5px { margin-right:5px;} </style>
                                    0.00 %
                                 </span>
                              </div>
                              <div style="width:65%; float:right; text-align:right;">
                                 <span style="font-weight:400; font-size:18px; color:#5cb85c;">
                                    +  1,140                        </span>
                                 <small class="unit">บาท</small>
                              </div>
                           </div>
                           <div class="count_bottom">
                              102
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
                           <p class="text-help">
                              รายการขาย ตั้งแต่วันที่ <b class="text-green">2019-06-01</b> ถึง <b class="text-green">2019-06-30</b>
                              รวมทั้งหมด <b class="text-green">102</b> รายการ
                           </p>
                        </div>
                        <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                           <canvas id="dailySoldChart" height="312" width="1571" style="width: 1494px; height: 297px;"></canvas>
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
                                          <select name="kioskid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;">
                                             <option value="" selected="">...</option>
                                             <option value="2323">2323 (กระทิงแดง สนามบอล)</option>
                                             <option value="4152">4152</option>
                                             <option value="4153">4153</option>
                                          </select>
                                       </label>
                                    </div>
                                    <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                                       <label>เลือกเจาะจงเฉพาะสินค้า
                                          <select name="productid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;">
                                             <option value="" selected="">...</option>
                                             <option value="101">เอส โคล่า 250 ซีซี</option>
                                             <option value="102">เอส สตรอเบอร์รี่ 250 ซีซี</option>
                                             <option value="104">เนสกาแฟ ลาเต้  180 ซีซี.</option>
                                             <option value="105">นมถั่วเหลือง (ขิงผสมเม็ดแมงลัก) 180 มล.</option>
                                             <option value="106">นมถั่วเหลือง 180  มล.</option>
                                             <option value="107">น้ำมะพร้าวอ่อนพร้อมเนื้อ ชบา 230 ซีซี.</option>
                                             <option value="108">น้ำว่านหางจระเข้ ชบา 230 ซีซี.</option>
                                             <option value="109">น้ำนมถั่วเหลือง ยูเอฟซี (โฮมซอย) 300 ซีซี.</option>
                                             <option value="110">น้ำแร่ ฟริ้งค์ 300 ซีซี.</option>
                                             <option value="111">โค้ก (สลิม)  245  ซีซี.</option>
                                             <option value="112">เป็ปซี่  245 ซีซี.</option>
                                             <option value="113">อาร์ซีโคล่า 250 ซีซี.</option>
                                             <option value="114">น้ำแร่ เพอร์ร่า 500 ซีซี.</option>
                                             <option value="115">เนสกาแฟ เอสเปรสโซ่ โรสต์ 180 ซีซี.</option>
                                             <option value="116">กระทิงแดง 150 ซี.ซี. ลังกระดาษ</option>
                                             <option value="117">เรดดี้ 150 ซี.ซี.</option>
                                             <option value="118">สปอนเซอร์ ออริจินัล 325 ซี.ซี.T</option>
                                             <option value="119">เพียวริคุ มิกซ์ เบอร์รี่ 350 ซี.ซี.</option>
                                             <option value="120">แมนซั่ม 325 ซีซี.</option>
                                             <option value="121">เพียวริคุ คูล เก๊กฮวยขาว 350 ซีซี.</option>
                                             <option value="123">กระทิงแดง จีทู 140 ซีซี.</option>
                                             <option value="124">ริคุ ส้มยูสุ 350 ซีซี</option>
                                             <option value="125">ริคุ องุ่นเคียวโฮ 350 ซีซี.</option>
                                             <option value="126">เรดบูล เอ็กซ์ตร้า 170 ซี.ซี. กระป๋อง</option>
                                             <option value="127">กระทิงแดง ซิงค์ 145 ซีซี. (ขวดกลม)</option>
                                             <option value="128">กระทิงแดง 145 ซีซี.  (ขวดกลม)</option>
                                             <option value="129">กระทิงแดง เอบีซี 145 ซีซี. (ขวดกลม)</option>
                                             <option value="130">เพียวริคุ สตอเบอร์รี่ 280 ซีซี.</option>
                                             <option value="131">เพียวริคุ ลิ้นจี่ 350 ซีซี.</option>
                                             <option value="132">แมนซั่ม ฟรุตโซดา คอลลาเจน 325 ซีซี.</option>
                                             <option value="133">แมนซั่ม ฟรุตโซดา แอลกลูตาไธโอน 325 ซีซี.</option>
                                             <option value="134">สปอนเซอร์ แอคทีฟ 240 ซี.ซี.</option>
                                             <option value="135">สปอนเซอร์ บีเฟรช 240 ซี.ซี.</option>
                                             <option value="141">ปีโป้เชค รสองุ่น 230 ซีซี.</option>
                                             <option value="142">น้ำแอปเปิ้ล ชบา 230 ซีซี.</option>
                                             <option value="144">น้ำส้ม ดีโด้ 450 ซีซี.</option>
                                             <option value="145">น้ำองุ่นขาวกลิ่นนมเปรี้ยว (มิกกุ) 300 ซีซี.</option>
                                             <option value="146">กาแฟโกปิโก้ รสเข้ม 240 ซีซี.</option>
                                             <option value="147">กาแฟโกปิโก้ รสกลมกล่อม 240 ซีซี.</option>
                                             <option value="150">แฟนต้า น้ำส้มแคน 325 มล.</option>
                                             <option value="151">สไปรท์ กระป๋อง 245 มล.</option>
                                          </select>
                                       </label>
                                    </div>
                                    <div class="dataTables_custom">
                                       <div class="dateRangePicker displayOnly form-inline">
                                          <span>ตั้งแต่วันที่</span>
                                          <input class="form-control input-sm" name="datefrom" id="datefrom" value="2019-06-01" autocomplete="off">
                                          <span>ถึง</span>
                                          <input class="form-control input-sm" name="date" id="date" value="2019-06-30" autocomplete="off">
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
                                 </tr>
                              </thead>
                              <tbody>
                              <style type="text/css">
                                 .tableDateDetails tr.disabled { filter: grayscale(1); opacity:0.3;}
                                 .tableDateDetails tr.disabled:hover { background-color:inherit;}
                                 .tableDateDetails .unit { font-size:11px; font-weight:300; color:#ccc; padding-left:3px;}
                              </style>
                              <tr id="dateTR_01" class="">
                                 <td style="text-align:center; font-weight:600;">01</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <span style=" ">32</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #5cb85c;">
                                    <i class="fa fa-caret-up mr5px"></i>                        <span style=" ">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #5cb85c;">
                                    +
                                    <span style=" ">32</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    + <span style=" ">32</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" ">2.81 %</span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-01&amp;date=2019-06-01"><span style=" ">3</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_02" class="">
                                 <td style="text-align:center; font-weight:600;">02</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    <i class="fa fa-caret-down mr5px"></i>                        <span style=" ">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    -
                                    <span style=" ">32</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">32</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-02&amp;date=2019-06-02"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_03" class="">
                                 <td style="text-align:center; font-weight:600;">03</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <span style=" ">101</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #5cb85c;">
                                    <i class="fa fa-caret-up mr5px"></i>                        <span style=" ">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #5cb85c;">
                                    +
                                    <span style=" ">101</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    + <span style=" ">133</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" ">8.86 %</span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-03&amp;date=2019-06-03"><span style=" ">8</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_04" class="">
                                 <td style="text-align:center; font-weight:600;">04</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <span style=" ">63</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    <i class="fa fa-caret-down mr5px"></i>                        <span style=" ">37.62 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    -
                                    <span style=" ">38</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    + <span style=" ">196</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" ">5.53 %</span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-04&amp;date=2019-06-04"><span style=" ">5</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_05" class="">
                                 <td style="text-align:center; font-weight:600;">05</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <span style=" ">99</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #5cb85c;">
                                    <i class="fa fa-caret-up mr5px"></i>                        <span style=" ">57.14 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #5cb85c;">
                                    +
                                    <span style=" ">36</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    + <span style=" ">295</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" ">8.68 %</span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-05&amp;date=2019-06-05"><span style=" ">9</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_06" class="">
                                 <td style="text-align:center; font-weight:600;">06</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <span style=" ">80</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    <i class="fa fa-caret-down mr5px"></i>                        <span style=" ">19.19 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    -
                                    <span style=" ">19</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    + <span style=" ">375</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" ">7.02 %</span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-06&amp;date=2019-06-06"><span style=" ">8</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_07" class="">
                                 <td style="text-align:center; font-weight:600;">07</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <span style=" ">12</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    <i class="fa fa-caret-down mr5px"></i>                        <span style=" ">85.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    -
                                    <span style=" ">68</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    + <span style=" ">387</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" ">1.05 %</span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-07&amp;date=2019-06-07"><span style=" ">1</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_08" class="">
                                 <td style="text-align:center; font-weight:600;">08</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    <i class="fa fa-caret-down mr5px"></i>                        <span style=" ">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    -
                                    <span style=" ">12</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">387</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-08&amp;date=2019-06-08"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_09" class="">
                                 <td style="text-align:center; font-weight:600;">09</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <span style=" ">66</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #5cb85c;">
                                    <i class="fa fa-caret-up mr5px"></i>                        <span style=" ">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #5cb85c;">
                                    +
                                    <span style=" ">66</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    + <span style=" ">453</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" ">5.79 %</span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-09&amp;date=2019-06-09"><span style=" ">6</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_10" class="">
                                 <td style="text-align:center; font-weight:600;">10</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <span style=" ">182</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #5cb85c;">
                                    <i class="fa fa-caret-up mr5px"></i>                        <span style=" ">175.76 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #5cb85c;">
                                    +
                                    <span style=" ">116</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    + <span style=" ">635</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" ">15.96 %</span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-10&amp;date=2019-06-10"><span style=" ">16</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_11" class="">
                                 <td style="text-align:center; font-weight:600;">11</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <span style=" ">243</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #5cb85c;">
                                    <i class="fa fa-caret-up mr5px"></i>                        <span style=" ">33.52 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #5cb85c;">
                                    +
                                    <span style=" ">61</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    + <span style=" ">878</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" ">21.32 %</span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-11&amp;date=2019-06-11"><span style=" ">22</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_12" class="">
                                 <td style="text-align:center; font-weight:600;">12</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <span style=" ">180</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    <i class="fa fa-caret-down mr5px"></i>                        <span style=" ">25.93 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    -
                                    <span style=" ">63</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    + <span style=" ">1,058</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" ">15.79 %</span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-12&amp;date=2019-06-12"><span style=" ">16</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_13" class="">
                                 <td style="text-align:center; font-weight:600;">13</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <span style=" ">70</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    <i class="fa fa-caret-down mr5px"></i>                        <span style=" ">61.11 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    -
                                    <span style=" ">110</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    + <span style=" ">1,128</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" ">6.14 %</span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-13&amp;date=2019-06-13"><span style=" ">7</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_14" class="">
                                 <td style="text-align:center; font-weight:600;">14</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <span style=" ">12</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    <i class="fa fa-caret-down mr5px"></i>                        <span style=" ">82.86 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    -
                                    <span style=" ">58</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    + <span style=" ">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" ">1.05 %</span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-14&amp;date=2019-06-14"><span style=" ">1</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_15" class="disabled">
                                 <td style="text-align:center; font-weight:600;">15</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    <i class="fa fa-caret-down mr5px"></i>                        <span style=" ">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; color: #fd1c00;">
                                    -
                                    <span style=" ">12</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-15&amp;date=2019-06-15"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_16" class="disabled">
                                 <td style="text-align:center; font-weight:600;">16</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-16&amp;date=2019-06-16"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_17" class="disabled">
                                 <td style="text-align:center; font-weight:600;">17</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-17&amp;date=2019-06-17"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_18" class="disabled">
                                 <td style="text-align:center; font-weight:600;">18</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-18&amp;date=2019-06-18"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_19" class="disabled">
                                 <td style="text-align:center; font-weight:600;">19</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-19&amp;date=2019-06-19"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_20" class="disabled">
                                 <td style="text-align:center; font-weight:600;">20</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-20&amp;date=2019-06-20"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_21" class="disabled">
                                 <td style="text-align:center; font-weight:600;">21</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-21&amp;date=2019-06-21"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_22" class="disabled">
                                 <td style="text-align:center; font-weight:600;">22</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-22&amp;date=2019-06-22"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_23" class="disabled">
                                 <td style="text-align:center; font-weight:600;">23</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-23&amp;date=2019-06-23"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_24" class="disabled">
                                 <td style="text-align:center; font-weight:600;">24</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-24&amp;date=2019-06-24"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_25" class="disabled">
                                 <td style="text-align:center; font-weight:600;">25</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-25&amp;date=2019-06-25"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_26" class="disabled">
                                 <td style="text-align:center; font-weight:600;">26</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-26&amp;date=2019-06-26"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_27" class="disabled">
                                 <td style="text-align:center; font-weight:600;">27</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-27&amp;date=2019-06-27"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_28" class="disabled">
                                 <td style="text-align:center; font-weight:600;">28</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-28&amp;date=2019-06-28"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_29" class="disabled">
                                 <td style="text-align:center; font-weight:600;">29</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-29&amp;date=2019-06-29"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              <tr id="dateTR_30" class="disabled">
                                 <td style="text-align:center; font-weight:600;">30</td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right; font-size:11px; ">
                                    <span style=" color:#ccc;">100.00 %</span>
                                 </td>
                                 <td style="text-align:right; font-size:11px; ">

                                    <span style=" color:#ccc;">0</span> <span class="unit">THB</span>
                                 </td>

                                 <td style="text-align:right;">
                                    <span style=" color:#ccc;">1,140</span>
                                    <span class="unit">THB</span>
                                 </td>
                                 <td style="text-align:right;"><span style=" color:#ccc;">- </span></td>

                                 <td style="text-align:right; border-left:1px solid #ddd; ">
                                    <a href="transaction_lists.php?kioskid=&amp;productid=&amp;datefrom=2019-06-30&amp;date=2019-06-30"><span style=" color:#ccc;">0</span></a> <span class="unit">Record</span>
                                 </td>

                              </tr>
                              </tbody>
                           </table>
                        </div><!--/x_content-->
                     </div><!--/x_panel-->
                  </div><!--/col-->
               </div><!--/row-->

               <!-- // End Content on PAGE /////////////////////////////////////////////////////// -->




               <!-- // Content  -->
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
