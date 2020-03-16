<!DOCTYPE html> 
<html lang="en">
<head>
   <?php require_once 'inc_head_href.php'; ?>
    <title> Kaoook Vending </title>
</head>

<body class="nav-md">
    
<div class="container body">
<div class="main_container">
    <div class="col-md-3 left_col" id="inc_menu_main">
        <?//php require_once 'inc_menu_main.php'; ?>
    </div><!-- /.col-md-3 left_col --> 

<!-- top navigation -->
<div class="top_nav" id="inc_top_nav">
<?php// require_once 'inc_top_nav.php'; ?> 
</div>
	
<div class="right_col" role="main">	
    <!-- Start Content -->
     	
    <!--start Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
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
                	<b style=" font-weight:700; color:#5cb85c;">344</b>
                	<small class="unit">บาท</small>
                </div>
                <div class="count_bottom">29 <small class="unit">รายการ</small></div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 tile_stats_count" style="filter: grayscale(1); opacity:0.6;">
                <div class="count_top">ยอดขายเมื่อวานนี้</div>
                <div class="range">วันที่ <span>2019-06-13</span></div>
                <div class="count">
					<span style="font-weight:400; font-size:18px;">559</span>
                    <small class="unit">บาท</small>
                </div>
                <div class="count_bottom">49 <small class="unit">รายการ</small></div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 tile_stats_count" style="border-left:3px solid rgba(0,0,0,0.06);">
                <div class="count_top">เปรียบเทียบผลต่าง</div>
                <div class="range">ระหว่าง วันนี้ <span>2019-06-14</span> กับเมื่อวาน <span>2019-06-13</span></div>
                <div class="count" style=" display:table; width:100%;">
                	                    <div style="width:35%; float:left; text-align:left;">
                    	<span style="font-weight:700; font-size:18px; color:#fd1c00;">
                        <style type="text/css"> .mr5px { margin-right:5px;} </style>
                        <i class="fa fa-caret-down mr5px"></i>						38.46 %
                        </span>
                    </div>
                    <div style="width:65%; float:right; text-align:right;">
                        <span style="font-weight:400; font-size:18px; color:#fd1c00;">
                        -  215                        </span>
                        <small class="unit">บาท</small>
                    </div>
                </div>
                <div class="count_bottom">
                    - 					20 
                    <small class="unit">รายการ</small>
                </div>
            </div>
        </div><!--/cards-->        
    </div><!--/col-md-12-->
</div><!--/row--> 

<div class="row row-dashboard">
	<div class="col-md-8 col-sm-8 col-xs-6">
    	<div class="x_panel">
        	<div class="x_title">
                <p class="text-th">แสดงกราฟช่วงเวลา ยอดขายสินค้า <b class="b600" style="color:#000;">แต่ละชั่วโมง</b></p>
                <p class="text-help">
                	รายการขาย เฉพาะวันที่ <b class="text-green" style="font-size:18px; padding:0 5px; line-height:0;">2019-06-14</b> แสดงเป็นช่วงเวลาแต่ละชั่วโมง
                	รวมทั้งหมด <b class="text-green">29</b> รายการ
                </p>
            </div>
            <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
            	            	<canvas id="dailySoldChart" height="275" width="1038" style="width: 987px; height: 262px;"></canvas>
            </div>
        </div><!--/x_panel-->
    </div><!--/col-->
    
	<div class="col-md-4 col-sm-4 col-xs-6">
        <div class="x_panel" style=" padding: 0 10px; background-color:#fff; border: 3px solid #73879c; box-shadow:0 5px 10px rgba(0,0,0,0.1);">
            <div class="x_content"> 
                <table class="table table-hover tableDateDetails">
                <thead>
                    <tr>
                        <th style="text-align:left;">ตู้กดน้ำ</th>
                        <th style="text-align:left;">ใช้งานล่าสุด</th>
                    </tr>
                </thead>
                <tbody>
                <style type="text/css"> 
					.tableDateDetails tr.disabled { filter: grayscale(1); opacity:0.3;}
					.tableDateDetails tr.disabled:hover { background-color:inherit;}
					.tableDateDetails .unit { font-size:11px; font-weight:300; color:#ccc; padding-left:3px;} 
                </style>
                				<tr id="trID_97493">
                    <td style="text-align:left;">
                        <b style="font-weight:500; color:#000;">3653</b>
                        <span>( บิ๊กสตาร์ )</span>
                    </td>
                    <td>
					                    <span style=" font-weight:700; color:#fd1c00; ">
                    						                        5 วัน                         14 ชั่วโมง                         43 นาที                         
                    </span>
                    </td>
				</tr>
								<tr id="trID_97705">
                    <td style="text-align:left;">
                        <b style="font-weight:500; color:#000;">2349</b>
                        <span>( อลูแพค )</span>
                    </td>
                    <td>
					                    <span style=" font-weight:500; color:#5cb85c; ">
                    						                                                                        59 นาที                         
                    </span>
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
                รวมทั้งหมด <b class="text-green">29</b> รายการ</p>
            </div>
        	<div class="x_content">
            <div class="dataTables_wrapper">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
               <div class="top">
               		<div class="dataTables_filter">
                        <label>Search 
                            <input type="search" class="form-control input-sm autoFilter" placeholder="" onchange="this.form.submit()" disabled="">
                        </label>
                    </div>
                                        
<div class="dataTables_length">
    <label>Record/Page 
        <select name="display" class="form-control input-sm autoFilter" onchange="this.form.submit()">
            <option value="10">10</option>
            <option value="25" selected="">25</option>
            <option value="50">50</option>
            <option value="100">100</option>	
            <option value="1000">1000</option>
                    </select>
    </label>
</div>

<div class="dataTables_paginate paging_simple_numbers">
    <ul class="pagination">
        <!-- Previous -->
                        <!-- First -->
                
        <!-- Main Loop -->
                                                                                                                <li class="paginate_button active"><a href="?page=1&amp;kioskid=&amp;productid=&amp;display=25&amp;datefrom=2019-06-01&amp;date=2019-06-30&amp;onhour=&amp;search=&amp;refill=&amp;action=filtered&amp;trntype=&amp;permisid=&amp;slotid=&amp;slotaction=">1</a></li>
                                                                                                                            
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
                        <th rowspan="2">#</th>
                        <th rowspan="2">Time</th>
                        <th rowspan="2" style=" text-align:center;">Kiosk</th>
                        <th rowspan="2" style=" text-align:center;">Slot</th>
                        <th rowspan="2">Product</th>
                        <th colspan="6" style=" text-align:center;">Amount <span style="color:#aaa;">( Unit Count )</span></th>
                        <th rowspan="2" style=" text-align:center;">Change</th>
                        <th rowspan="2" style=" text-align:center;">Income</th>
                    </tr>
                    <tr>
                        <th class="topupCB">C1</th>
                        <th class="topupCB">C2</th>
                        <th class="topupCB">C5</th>
                        <th class="topupCB">C10</th>
                        <th class="topupCB">B20</th>
                        <th style="text-align:center; border-right-width: 1px;">Total</th>
                    </tr>
                </thead>
                
                <tbody>
                                                                     <tr id="trTRN_97705">
                        <td class="ordinal"><small>(Sold)</small> 97705</td>
                        <td>2019-06-14 16:13:33</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">16</td>		
                        <td id="tdPRD_118">
							สปอนเซอร์ ออริจินัล 325 ซี.ซี.T                                                            <span style=" color:#ccc; font-weight:300;"> - 13 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	                            <span style="color:#fd1c00; font-weight:600;">- 7</span>
                                                                            </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">13</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97704">
                        <td class="ordinal"><small>(Sold)</small> 97704</td>
                        <td>2019-06-14 16:12:03</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">9</td>		
                        <td id="tdPRD_125">
							ริคุ องุ่นเคียวโฮ 350 ซีซี.                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97703">
                        <td class="ordinal"><small>(Sold)</small> 97703</td>
                        <td>2019-06-14 16:11:32</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">9</td>		
                        <td id="tdPRD_125">
							ริคุ องุ่นเคียวโฮ 350 ซีซี.                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	                            <span style="color:#fd1c00; font-weight:600;">- 10</span>
                                                                            </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97702">
                        <td class="ordinal"><small>(Sold)</small> 97702</td>
                        <td>2019-06-14 13:43:15</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">17</td>		
                        <td id="tdPRD_101">
							เอส โคล่า 250 ซีซี                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97701">
                        <td class="ordinal"><small>(Sold)</small> 97701</td>
                        <td>2019-06-14 13:42:46</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">20</td>		
                        <td id="tdPRD_128">
							กระทิงแดง 145 ซีซี.  (ขวดกลม)                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	                            <span style="color:#fd1c00; font-weight:600;">- 10</span>
                                                                            </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97700">
                        <td class="ordinal"><small>(Sold)</small> 97700</td>
                        <td>2019-06-14 13:33:55</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">8</td>		
                        <td id="tdPRD_145">
							น้ำองุ่นขาวกลิ่นนมเปรี้ยว (มิกกุ) 300 ซีซี.                                                            <span style=" color:#ccc; font-weight:300;"> - 12 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">3</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	                            <span style="color:#fd1c00; font-weight:600;">- 3</span>
                                                                            </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">12</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97699">
                        <td class="ordinal"><small>(Sold)</small> 97699</td>
                        <td>2019-06-14 13:25:31</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">14</td>		
                        <td id="tdPRD_129">
							กระทิงแดง เอบีซี 145 ซีซี. (ขวดกลม)                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	                            <span style="color:#fd1c00; font-weight:600;">- 10</span>
                                                                            </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97698">
                        <td class="ordinal"><small>(Sold)</small> 97698</td>
                        <td>2019-06-14 13:14:10</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">6</td>		
                        <td id="tdPRD_135">
							สปอนเซอร์ บีเฟรช 240 ซี.ซี.                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97697">
                        <td class="ordinal"><small>(Sold)</small> 97697</td>
                        <td>2019-06-14 12:59:35</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">14</td>		
                        <td id="tdPRD_129">
							กระทิงแดง เอบีซี 145 ซีซี. (ขวดกลม)                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97696">
                        <td class="ordinal"><small>(Sold)</small> 97696</td>
                        <td>2019-06-14 12:58:28</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">14</td>		
                        <td id="tdPRD_129">
							กระทิงแดง เอบีซี 145 ซีซี. (ขวดกลม)                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">2</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97695">
                        <td class="ordinal"><small>(Sold)</small> 97695</td>
                        <td>2019-06-14 12:48:21</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">12</td>		
                        <td id="tdPRD_115">
							เนสกาแฟ เอสเปรสโซ่ โรสต์ 180 ซีซี.                                                            <span style=" color:#ccc; font-weight:300;"> - 15 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">3</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97694">
                        <td class="ordinal"><small>(Sold)</small> 97694</td>
                        <td>2019-06-14 12:46:10</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">10</td>		
                        <td id="tdPRD_141">
							ปีโป้เชค รสองุ่น 230 ซีซี.                                                            <span style=" color:#ccc; font-weight:300;"> - 12 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	                            <span style="color:#fd1c00; font-weight:600;">- 3</span>
                                                                            </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">12</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97693">
                        <td class="ordinal"><small>(Sold)</small> 97693</td>
                        <td>2019-06-14 12:11:00</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">4</td>		
                        <td id="tdPRD_117">
							เรดดี้ 150 ซี.ซี.                                                            <span style=" color:#ccc; font-weight:300;"> - 15 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	                            <span style="color:#fd1c00; font-weight:600;">- 5</span>
                                                                            </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97692">
                        <td class="ordinal"><small>(Sold)</small> 97692</td>
                        <td>2019-06-14 10:21:52</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">25</td>		
                        <td id="tdPRD_128">
							กระทิงแดง 145 ซีซี.  (ขวดกลม)                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">2</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97691">
                        <td class="ordinal"><small>(Sold)</small> 97691</td>
                        <td>2019-06-14 09:34:50</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">13</td>		
                        <td id="tdPRD_104">
							เนสกาแฟ ลาเต้  180 ซีซี.                                                            <span style=" color:#ccc; font-weight:300;"> - 15 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	                            <span style="color:#fd1c00; font-weight:600;">- 5</span>
                                                                            </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97690">
                        <td class="ordinal"><small>(Sold)</small> 97690</td>
                        <td>2019-06-14 09:29:30</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">1</td>		
                        <td id="tdPRD_124">
							ริคุ ส้มยูสุ 350 ซีซี                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97689">
                        <td class="ordinal"><small>(Sold)</small> 97689</td>
                        <td>2019-06-14 08:47:16</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">22</td>		
                        <td id="tdPRD_128">
							กระทิงแดง 145 ซีซี.  (ขวดกลม)                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">2</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97688">
                        <td class="ordinal"><small>(Sold)</small> 97688</td>
                        <td>2019-06-14 07:56:37</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">12</td>		
                        <td id="tdPRD_115">
							เนสกาแฟ เอสเปรสโซ่ โรสต์ 180 ซีซี.                                                            <span style=" color:#ccc; font-weight:300;"> - 15 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">3</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97687">
                        <td class="ordinal"><small>(Sold)</small> 97687</td>
                        <td>2019-06-14 07:54:17</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">12</td>		
                        <td id="tdPRD_115">
							เนสกาแฟ เอสเปรสโซ่ โรสต์ 180 ซีซี.                                                            <span style=" color:#ccc; font-weight:300;"> - 15 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97686">
                        <td class="ordinal"><small>(Sold)</small> 97686</td>
                        <td>2019-06-14 07:53:47</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">7</td>		
                        <td id="tdPRD_109">
							น้ำนมถั่วเหลือง ยูเอฟซี (โฮมซอย) 300 ซีซี.                                                            <span style=" color:#ccc; font-weight:300;"> - 15 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	                            <span style="color:#fd1c00; font-weight:600;">- 5</span>
                                                                            </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97685">
                        <td class="ordinal"><small>(Sold)</small> 97685</td>
                        <td>2019-06-14 07:47:00</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">5</td>		
                        <td id="tdPRD_127">
							กระทิงแดง ซิงค์ 145 ซีซี. (ขวดกลม)                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">2</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97684">
                        <td class="ordinal"><small>(Sold)</small> 97684</td>
                        <td>2019-06-14 07:43:17</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">12</td>		
                        <td id="tdPRD_115">
							เนสกาแฟ เอสเปรสโซ่ โรสต์ 180 ซีซี.                                                            <span style=" color:#ccc; font-weight:300;"> - 15 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	                            <span style="color:#fd1c00; font-weight:600;">- 5</span>
                                                                            </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97683">
                        <td class="ordinal"><small>(Sold)</small> 97683</td>
                        <td>2019-06-14 06:56:37</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">20</td>		
                        <td id="tdPRD_128">
							กระทิงแดง 145 ซีซี.  (ขวดกลม)                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97682">
                        <td class="ordinal"><small>(Sold)</small> 97682</td>
                        <td>2019-06-14 04:07:08</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">4</td>		
                        <td id="tdPRD_117">
							เรดดี้ 150 ซี.ซี.                                                            <span style=" color:#ccc; font-weight:300;"> - 15 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	                            <span style="color:#fd1c00; font-weight:600;">- 5</span>
                                                                            </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>                        
                    </tr>
                                    <tr id="trTRN_97681">
                        <td class="ordinal"><small>(Sold)</small> 97681</td>
                        <td>2019-06-14 02:56:32</td>
                        <td id="kioskid_4" style=" text-align:center;">
                        	<a class="" href="kiosk_view.php?kioskid=4">
                            <!--<a class="" href="?kioskid=4&datefrom=2019-06-01&date=2019-06-30&display=25">-->
                                <b style="font-weight:700;">2349</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(อลูแพค)</span>                        </td>
                        <td style=" text-align:center;">1</td>		
                        <td id="tdPRD_124">
							ริคุ ส้มยูสุ 350 ซีซี                                                            <span style=" color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                    </td>	
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">
                                                <span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        <td id="changeTDid_4" style=" text-align:right;">
						                                                	<span style="color:#ccc; font-weight:300;">0</span>
                                                </td>
                        <td style=" text-align:center;">
						                            <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
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


    <!-- End Content -->
</div><!-- /right_col -->



        <!-- footer content -->
        <footer>    
                <?php require_once('inc_footer.php');?>
        </footer>
        <!-- /footer content -->
    </div><!-- /main_container -->
</div><!-- /container -->
<!-- jQuery -->

<?php require_once('inc_footer_script.php');?>
</body>
</html>

<style type="text/css">
	tr.onFocus>td { background-color:rgba(38,185,154,0.1);}
</style>
            
<script type="text/javascript">
// manage Page    
$('#inc_menu_main').load('inc_menu_main.php');
$('#inc_top_nav').load('inc_top_nav.php');


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
	if ($('#dailySoldChart').length ){ 	  
		var ctx = document.getElementById("dailySoldChart");
		var dailySoldStatement = new Chart(ctx, { type: 'line',
			data: {
				labels: ['00 น.', '01 น.', '02 น.', '03 น.', '04 น.', '05 น.', '06 น.', '07 น.', '08 น.', '09 น.', '10 น.', '11 น.', '12 น.', '13 น.', '14 น.', '', ],
				datasets: [{ 
					label: 'Trend Line', type: 'line', backgroundColor: "rgba(0,0,0,0)", borderColor:"rgba(255,0,0,0.6)", borderDash:[10,5], borderWidth:1, pointRadius:0, pointHoverRadius:0, 
					data: [, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.92307692307692, 0.85714285714286, ]	
					}, {
					label: 'Sold Amount', lineTension:0, backgroundColor: "rgba(38,185,154,0.5)", borderColor:"#26B99A", borderWidth:2, pointRadius:3, pointHoverRadius:6, pointBackgroundColor:"#FFFFFF", pointBorderColor:"#26B99A", pointHoverBackgroundColor:"#FFFFFF", pointHoverBorderColor:"#26B99A",
					data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12, 0, ]
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


