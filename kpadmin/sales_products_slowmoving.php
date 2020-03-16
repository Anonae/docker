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
            <li class="breadcrumb-item"><a href="transaction_lists.php">Sales</a></li>
            <li class="breadcrumb-item active" aria-current="page">Slow Moving Products</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->

<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Slow Moving Products 
            	<span style="font-size:15px;">on 
                    <b class="text-green">2019-06-01</b> to <b class="text-green">2019-06-30</b>
                </span>
            </h2>
        </div><!--/col-->     
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="dataTables_wrapper">
                <div class="dataTables_custom" style=" width:100%;">
                    <div class="dateRangePicker topPageDisplay">
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                            <input name="" id="dateRangeTCP" class="form-control mainDatePicker" value="" autocomplete="off">
                            <input class="form-control input-sm" style="left:34px;" id="datefromClone" value="2019-06-01">
                            <input class="form-control input-sm" style="right:0;" id="dateClone" value="2019-06-30">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/col--> 
    </div><!--/content-title-->
</div><!--/row-->     

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel cards cardRank">
            <div class="x_title">
                <p class="text-th">แสดงสินค้า ที่มียอดขาย ตามเงื่อนไข กำหนดราคา เรียงจากน้อยสุดก่อน</p>
                                <p class="text-help">
                	รายการขาย ตั้งแต่วันที่ <b class="text-green">2019-06-01</b> ถึง <b class="text-green">2019-06-30</b>
                    รวมทั้งหมด <b class="text-green">102</b> รายการ
                </p>
            </div>
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
                        <div class="dataTables_custom">
                            <div class="dateRangePicker displayOnly form-inline">
                                <span>ตั้งแต่วันที่</span>
                                <input class="form-control input-sm" name="datefrom" id="datefrom" value="2019-06-01" autocomplete="off">
                                <span>ถึง</span>
                                <input class="form-control input-sm" name="date" id="date" value="2019-06-30" autocomplete="off">
                            </div>
                        </div>
                    </div><!--/top.topSelect-->
                    <div class="top">
                        <div class="">
                        	<span style="display:inline-block; float:left; margin-right:5px; margin-top:5px; font-weight:700; color:#000; font-size:16px;">เลือกเฉพาะ ยอดขายรวม <span style="color:red;">ที่มีไม่ถึง</span></span>
                            <div class="input-group input-group-sm" style="width:250px; margin-bottom:0;">
                            	<input type="number" name="lowlimit" class="form-control input-sm" value="" style="border-color: #ddd; height:32px; text-align:right; padding: 0; font-size: 18px; line-height: 32px;" min="0" step="1">
                                <label class="input-group-addon" style="border-left:none; padding-top: 7px; font-size: 13px; line-height:18px;">บาท</label>
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-default btn-primary" style="height:32px; font-size:13px; font-weight:400; padding-top: 7px; ">ตรวจสอบ</button>
                                </span>
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
                	<th style="text-align:left;">รายชื่อสินค้า</th>
                    <th style="text-align:right; border-left:1px solid #ddd">ยอดขายรวม</th>
                    <th style="text-align:right;">คิดเป็น %</th>
                    <th style="text-align:right; border-left:1px solid #ddd;">ทำรายการทั้งหมด</th>
				</tr>
                </thead>
                <tbody>
                <style type="text/css"> 
					.tableDateDetails tr.disabled { filter: grayscale(1); opacity:0.3;}
					.tableDateDetails tr.disabled:hover { background-color:inherit;}
					.tableDateDetails .unit { font-size:11px; font-weight:300; color:#ccc; padding-left:3px;} 
                </style>
                								<tr id="salesTR_135" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(135)</span> <b style="font-weight:500; color:#000;">สปอนเซอร์ บีเฟรช 240 ซี.ซี.</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">10</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">0.88 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=135&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">1</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_146" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(146)</span> <b style="font-weight:500; color:#000;">กาแฟโกปิโก้ รสเข้ม 240 ซีซี.</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">10</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">0.88 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=146&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">1</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_107" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(107)</span> <b style="font-weight:500; color:#000;">น้ำมะพร้าวอ่อนพร้อมเนื้อ ชบา 230 ซีซี.</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">12</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">1.05 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=107&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">1</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_142" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(142)</span> <b style="font-weight:500; color:#000;">น้ำแอปเปิ้ล ชบา 230 ซีซี.</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">12</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">1.05 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=142&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">1</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_132" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(132)</span> <b style="font-weight:500; color:#000;">แมนซั่ม ฟรุตโซดา คอลลาเจน 325 ซีซี.</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">15</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">1.32 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=132&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">1</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_113" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(113)</span> <b style="font-weight:500; color:#000;">อาร์ซีโคล่า 250 ซีซี.</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">20</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">1.75 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=113&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">2</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_119" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(119)</span> <b style="font-weight:500; color:#000;">เพียวริคุ มิกซ์ เบอร์รี่ 350 ซี.ซี.</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">26</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">2.28 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=119&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">2</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_121" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(121)</span> <b style="font-weight:500; color:#000;">เพียวริคุ คูล เก๊กฮวยขาว 350 ซีซี.</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">26</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">2.28 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=121&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">2</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_123" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(123)</span> <b style="font-weight:500; color:#000;">กระทิงแดง จีทู 140 ซีซี.</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">30</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">2.63 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=123&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">2</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_126" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(126)</span> <b style="font-weight:500; color:#000;">เรดบูล เอ็กซ์ตร้า 170 ซี.ซี. กระป๋อง</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">39</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">3.42 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=126&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">3</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_134" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(134)</span> <b style="font-weight:500; color:#000;">สปอนเซอร์ แอคทีฟ 240 ซี.ซี.</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">40</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">3.51 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=134&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">4</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_115" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(115)</span> <b style="font-weight:500; color:#000;">เนสกาแฟ เอสเปรสโซ่ โรสต์ 180 ซีซี.</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">45</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">3.95 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=115&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">3</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_129" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(129)</span> <b style="font-weight:500; color:#000;">กระทิงแดง เอบีซี 145 ซีซี. (ขวดกลม)</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">80</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">7.02 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=129&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">8</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_128" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(128)</span> <b style="font-weight:500; color:#000;">กระทิงแดง 145 ซีซี.  (ขวดกลม)</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">100</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">8.77 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=128&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">10</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_101" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(101)</span> <b style="font-weight:500; color:#000;">เอส โคล่า 250 ซีซี</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">100</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">8.77 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=101&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">10</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_127" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(127)</span> <b style="font-weight:500; color:#000;">กระทิงแดง ซิงค์ 145 ซีซี. (ขวดกลม)</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">110</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">9.65 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=127&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">11</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_112" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(112)</span> <b style="font-weight:500; color:#000;">เป็ปซี่  245 ซีซี.</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">120</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">10.53 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=112&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">10</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_147" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(147)</span> <b style="font-weight:500; color:#000;">กาแฟโกปิโก้ รสกลมกล่อม 240 ซีซี.</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">150</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">13.16 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=147&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">15</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
								<tr id="salesTR_118" class="">
                    <td style="text-align:left;">
                    	<span style="color:#bbb; font-weight:300;">(118)</span> <b style="font-weight:500; color:#000;">สปอนเซอร์ ออริจินัล 325 ซี.ซี.T</b>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">195</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">17.11 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?productid=118&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">15</span> <span class="unit">Record</span>
                        </a>
                    </td>
                    
				</tr>
				                </tbody>
                </table>
            </div><!--/x_content-->
        </div><!--/x_panel-->
    </div><!--/col-->
</div><!--/row-->

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
