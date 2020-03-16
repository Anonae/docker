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
            <li class="breadcrumb-item" aria-current="page">Transaction</li>
            <li class="breadcrumb-item active" aria-current="page">Live Transaction</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2><b>Live</b> Transaction 
            	<span style="font-size:15px;"> on 
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
                            <input class="form-control input-sm" style="left:35px;" id="datefromClone" value="2019-06-01">
                            <input class="form-control input-sm" style="right:0;" id="dateClone" value="2019-06-30">
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
        	 

	
        	            <p class="text-th">แสดงข้อมูล รายการธุรกรรม <b class="b600" style="color:#000;">ขายสินค้า</b> ทั้งหมด</p>
                        <p class="text-help">
           		ตั้งแต่วันที่ <b class="text-green">2019-06-01</b> ถึง <b class="text-green">2019-06-30</b>
                รวมทั้งหมด <b class="text-green">102</b> รายการ
            </p>
        </div><!--/x_title-->
        <div class="x_content">
            
            <div class="dataTables_wrapper">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
                <div class="top topSelect" style=" width:100%; display:table;">
                	<div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                        <label>Kiosk
                            <select name="kioskid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;"> 
                            	<option value="" selected="">...</option>
                            							                                <option value="2323">2323 (กระทิงแดง สนามบอล)</option>
                                                            <option value="4152">4152</option>
                                                            <option value="4153">4153</option>
                                                        </select>
                        </label>
                    </div>
                    <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                        <label>Product
                            <select name="productid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;">
                            	<option value="" selected="">...</option>
                            							                                <option value="101">เอส โคล่า 250 ซีซี</option>
                                                            <option value="102">เอส สตรอเบอร์รี่ 250 ซีซี</option>
                                                            <option value="103">เนสกาแฟ เอ็กซ์ตร้า  180 ซีซี.</option>
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
                                                            <option value="143">โกปิโก้คอฟฟี่ 240 ซีซี.</option>
                                                            <option value="144">น้ำส้ม ดีโด้ 450 ซีซี.</option>
                                                            <option value="145">น้ำองุ่นขาวกลิ่นนมเปรี้ยว (มิกกุ) 300 ซีซี.</option>
                                                            <option value="146">กาแฟโกปิโก้ รสเข้ม 240 ซีซี.</option>
                                                            <option value="147">กาแฟโกปิโก้ รสกลมกล่อม 240 ซีซี.</option>
                                                            <option value="148">เป๊ปซี่แมกซ์ 245 ซีซี</option>
                                                            <option value="149">ชเวปส์มะนาวโซดา 330 ซีซี</option>
                                                            <option value="150">แฟนต้า น้ำส้มแคน 325 มล.</option>
                                                            <option value="151">สไปรท์ กระป๋อง 245 มล.</option>
                                                        </select>
                        </label>
                    </div>
                    <div class="dataTables_filter" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:50px;">
                        <label>Slot
                            <input class="form-control input-sm autoFilter" name="slotid" value="" onchange="this.form.submit()" maxlength="2" style="width:40px; text-align:right;">
                        </label>
                    </div>
                    <div class="dataTables_custom">
                    	<div class="dateRangePicker displayOnly form-inline">
                            <span>From</span>
                            <input class="form-control input-sm" name="datefrom" id="datefrom" value="2019-06-01" autocomplete="off">
                            <span>To Date</span>
                            <input class="form-control input-sm" name="date" id="date" value="2019-06-30" autocomplete="off">
                            <span>Displayed.</span>
                        </div>
                    </div>
                </div><!--/top-->
               <div class="top">
               		<div class="dataTables_filter">
                        <label>Search 
                            <input class="form-control input-sm autoFilter" name="search" placeholder="" onchange="this.form.submit()" disabled="">
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
                        <option value="ALL">ALL</option>
                    </select>
    </label>
</div>

<div class="dataTables_paginate paging_simple_numbers">
    <ul class="pagination">
        <!-- Previous -->
                        <!-- First -->
                
        <!-- Main Loop -->
                                                                                            <li class="paginate_button active"><a href="?page=1&amp;kioskid=&amp;productid=&amp;display=25&amp;datefrom=2019-06-01&amp;date=2019-06-30&amp;onhour=&amp;search=&amp;refill=&amp;action=filtered&amp;trntype=buy&amp;permisid=&amp;slotid=&amp;slotaction=">1</a></li>
                                                                                <li class="paginate_button "><a href="?page=2&amp;kioskid=&amp;productid=&amp;display=25&amp;datefrom=2019-06-01&amp;date=2019-06-30&amp;onhour=&amp;search=&amp;refill=&amp;action=filtered&amp;trntype=buy&amp;permisid=&amp;slotid=&amp;slotaction=">2</a></li>
                                                                                <li class="paginate_button "><a href="?page=3&amp;kioskid=&amp;productid=&amp;display=25&amp;datefrom=2019-06-01&amp;date=2019-06-30&amp;onhour=&amp;search=&amp;refill=&amp;action=filtered&amp;trntype=buy&amp;permisid=&amp;slotid=&amp;slotaction=">3</a></li>
                                                                                <li class="paginate_button "><a href="?page=4&amp;kioskid=&amp;productid=&amp;display=25&amp;datefrom=2019-06-01&amp;date=2019-06-30&amp;onhour=&amp;search=&amp;refill=&amp;action=filtered&amp;trntype=buy&amp;permisid=&amp;slotid=&amp;slotaction=">4</a></li>
                                                                
        <!-- Last -->
                    <li class="paginate_button disabled"><a href="#">…</a></li>            <li class="paginate_button "><a href="?page=5&amp;kioskid=&amp;productid=&amp;display=25&amp;datefrom=2019-06-01&amp;date=2019-06-30&amp;onhour=&amp;search=&amp;refill=&amp;action=filtered&amp;trntype=buy&amp;permisid=&amp;slotid=&amp;slotaction=">5</a></li>
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
                        <th rowspan="2" style="color:#bbb;"><small>#ID</small></th>
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
                    
                        <td class="ordinal"><small>#1118</small></td>
                        
                        <td>2019-06-14 13:32:47</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1745</small></td>	
                        <td data-kioskid="2323" data-iotid="1745" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
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
                                                    <tr id="trTRN_1117">
                    
                        <td class="ordinal"><small>#1117</small></td>
                        
                        <td>2019-06-13 10:40:22</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1744</small></td>	
                        <td data-kioskid="2323" data-iotid="1744" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	17                                                </td>	
                        	
                        <td id="tdPRD_101">
                        เอส โคล่า 250 ซีซี                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">11</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1116">
                    
                        <td class="ordinal"><small>#1116</small></td>
                        
                        <td>2019-06-13 10:07:59</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1743</small></td>	
                        <td data-kioskid="2323" data-iotid="1743" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	20                                                </td>	
                        	
                        <td id="tdPRD_128">
                        กระทิงแดง 145 ซีซี.  (ขวดกลม)                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">7</span>
                                                                            </td>

                        <td style=" text-align:center;">5</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1115">
                    
                        <td class="ordinal"><small>#1115</small></td>
                        
                        <td>2019-06-13 09:21:01</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1742</small></td>	
                        <td data-kioskid="2323" data-iotid="1742" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	24                                                </td>	
                        	
                        <td id="tdPRD_127">
                        กระทิงแดง ซิงค์ 145 ซีซี. (ขวดกลม)                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">8</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                                                        <span style="color:#fd1c00; font-weight:600;">- 10</span>
                                            
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1114">
                    
                        <td class="ordinal"><small>#1114</small></td>
                        
                        <td>2019-06-13 08:33:46</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1741</small></td>	
                        <td data-kioskid="2323" data-iotid="1741" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	14                                                </td>	
                        	
                        <td id="tdPRD_129">
                        กระทิงแดง เอบีซี 145 ซีซี. (ขวดกลม)                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">5</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                                                        <span style="color:#fd1c00; font-weight:600;">- 10</span>
                                            
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1113">
                    
                        <td class="ordinal"><small>#1113</small></td>
                        
                        <td>2019-06-13 08:33:38</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1740</small></td>	
                        <td data-kioskid="2323" data-iotid="1740" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	14                                                </td>	
                        	
                        <td id="tdPRD_129">
                        กระทิงแดง เอบีซี 145 ซีซี. (ขวดกลม)                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">6</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1112">
                    
                        <td class="ordinal"><small>#1112</small></td>
                        
                        <td>2019-06-13 07:43:37</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1739</small></td>	
                        <td data-kioskid="2323" data-iotid="1739" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	15                                                </td>	
                        	
                        <td id="tdPRD_127">
                        กระทิงแดง ซิงค์ 145 ซีซี. (ขวดกลม)                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">9</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1111">
                    
                        <td class="ordinal"><small>#1111</small></td>
                        
                        <td>2019-06-13 07:38:06</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1738</small></td>	
                        <td data-kioskid="2323" data-iotid="1738" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	15                                                </td>	
                        	
                        <td id="tdPRD_127">
                        กระทิงแดง ซิงค์ 145 ซีซี. (ขวดกลม)                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">10</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1110">
                    
                        <td class="ordinal"><small>#1110</small></td>
                        
                        <td>2019-06-12 17:52:06</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1737</small></td>	
                        <td data-kioskid="2323" data-iotid="1737" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	1                                                </td>	
                        	
                        <td id="tdPRD_118">
                        สปอนเซอร์ ออริจินัล 325 ซี.ซี.T                                                            <span style="color:#ccc; font-weight:300;"> - 13 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">16</span>
                                                                            </td>

                        <td style=" text-align:center;">3</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">13</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">13</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1109">
                    
                        <td class="ordinal"><small>#1109</small></td>
                        
                        <td>2019-06-12 15:07:34</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1736</small></td>	
                        <td data-kioskid="2323" data-iotid="1736" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	16                                                </td>	
                        	
                        <td id="tdPRD_115">
                        เนสกาแฟ เอสเปรสโซ่ โรสต์ 180 ซีซี.                                                            <span style="color:#ccc; font-weight:300;"> - 15 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">18</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                                                        <span style="color:#fd1c00; font-weight:600;">- 5</span>
                                            
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">15</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1108">
                    
                        <td class="ordinal"><small>#1108</small></td>
                        
                        <td>2019-06-12 14:18:25</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1735</small></td>	
                        <td data-kioskid="2323" data-iotid="1735" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	17                                                </td>	
                        	
                        <td id="tdPRD_101">
                        เอส โคล่า 250 ซีซี                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">12</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1107">
                    
                        <td class="ordinal"><small>#1107</small></td>
                        
                        <td>2019-06-12 13:37:37</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1734</small></td>	
                        <td data-kioskid="2323" data-iotid="1734" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	2                                                </td>	
                        	
                        <td id="tdPRD_118">
                        สปอนเซอร์ ออริจินัล 325 ซี.ซี.T                                                            <span style="color:#ccc; font-weight:300;"> - 13 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">10</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                                                        <span style="color:#fd1c00; font-weight:600;">- 2</span>
                                            
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">13</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1106">
                    
                        <td class="ordinal"><small>#1106</small></td>
                        
                        <td>2019-06-12 13:19:25</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1733</small></td>	
                        <td data-kioskid="2323" data-iotid="1733" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	14                                                </td>	
                        	
                        <td id="tdPRD_129">
                        กระทิงแดง เอบีซี 145 ซีซี. (ขวดกลม)                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">7</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1105">
                    
                        <td class="ordinal"><small>#1105</small></td>
                        
                        <td>2019-06-12 13:19:14</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1732</small></td>	
                        <td data-kioskid="2323" data-iotid="1732" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	14                                                </td>	
                        	
                        <td id="tdPRD_129">
                        กระทิงแดง เอบีซี 145 ซีซี. (ขวดกลม)                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">8</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                                                        <span style="color:#fd1c00; font-weight:600;">- 10</span>
                                            
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1104">
                    
                        <td class="ordinal"><small>#1104</small></td>
                        
                        <td>2019-06-12 11:08:34</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1730</small></td>	
                        <td data-kioskid="2323" data-iotid="1730" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	15                                                </td>	
                        	
                        <td id="tdPRD_127">
                        กระทิงแดง ซิงค์ 145 ซีซี. (ขวดกลม)                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">11</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1103">
                    
                        <td class="ordinal"><small>#1103</small></td>
                        
                        <td>2019-06-12 10:41:37</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1729</small></td>	
                        <td data-kioskid="2323" data-iotid="1729" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	12                                                </td>	
                        	
                        <td id="tdPRD_134">
                        สปอนเซอร์ แอคทีฟ 240 ซี.ซี.                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">19</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">2</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1102">
                    
                        <td class="ordinal"><small>#1102</small></td>
                        
                        <td>2019-06-12 09:55:26</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1728</small></td>	
                        <td data-kioskid="2323" data-iotid="1728" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	2                                                </td>	
                        	
                        <td id="tdPRD_118">
                        สปอนเซอร์ ออริจินัล 325 ซี.ซี.T                                                            <span style="color:#ccc; font-weight:300;"> - 13 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">11</span>
                                                                            </td>

                        <td style=" text-align:center;">3</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">13</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">13</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1101">
                    
                        <td class="ordinal"><small>#1101</small></td>
                        
                        <td>2019-06-12 09:13:54</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1727</small></td>	
                        <td data-kioskid="2323" data-iotid="1727" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	9                                                </td>	
                        	
                        <td id="tdPRD_147">
                        กาแฟโกปิโก้ รสกลมกล่อม 240 ซีซี.                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;color:#fd1c00;font-weight:600;">ขายหมด</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1100">
                    
                        <td class="ordinal"><small>#1100</small></td>
                        
                        <td>2019-06-12 09:13:33</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1726</small></td>	
                        <td data-kioskid="2323" data-iotid="1726" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	9                                                </td>	
                        	
                        <td id="tdPRD_147">
                        กาแฟโกปิโก้ รสกลมกล่อม 240 ซีซี.                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">1</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                                                        <span style="color:#fd1c00; font-weight:600;">- 10</span>
                                            
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1099">
                    
                        <td class="ordinal"><small>#1099</small></td>
                        
                        <td>2019-06-12 09:05:54</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1725</small></td>	
                        <td data-kioskid="2323" data-iotid="1725" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	1                                                </td>	
                        	
                        <td id="tdPRD_118">
                        สปอนเซอร์ ออริจินัล 325 ซี.ซี.T                                                            <span style="color:#ccc; font-weight:300;"> - 13 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">17</span>
                                                                            </td>

                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">2</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">13</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">13</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1098">
                    
                        <td class="ordinal"><small>#1098</small></td>
                        
                        <td>2019-06-12 07:59:19</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1724</small></td>	
                        <td data-kioskid="2323" data-iotid="1724" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	15                                                </td>	
                        	
                        <td id="tdPRD_127">
                        กระทิงแดง ซิงค์ 145 ซีซี. (ขวดกลม)                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">12</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1097">
                    
                        <td class="ordinal"><small>#1097</small></td>
                        
                        <td>2019-06-12 07:53:21</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1723</small></td>	
                        <td data-kioskid="2323" data-iotid="1723" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	6                                                </td>	
                        	
                        <td id="tdPRD_119">
                        เพียวริคุ มิกซ์ เบอร์รี่ 350 ซี.ซี.                                                            <span style="color:#ccc; font-weight:300;"> - 13 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">24</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">15</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                                                        <span style="color:#fd1c00; font-weight:600;">- 2</span>
                                            
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">13</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1096">
                    
                        <td class="ordinal"><small>#1096</small></td>
                        
                        <td>2019-06-12 06:45:14</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1722</small></td>	
                        <td data-kioskid="2323" data-iotid="1722" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	20                                                </td>	
                        	
                        <td id="tdPRD_128">
                        กระทิงแดง 145 ซีซี.  (ขวดกลม)                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">8</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">10</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1095">
                    
                        <td class="ordinal"><small>#1095</small></td>
                        
                        <td>2019-06-12 06:44:59</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1721</small></td>	
                        <td data-kioskid="2323" data-iotid="1721" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	20                                                </td>	
                        	
                        <td id="tdPRD_128">
                        กระทิงแดง 145 ซีซี.  (ขวดกลม)                                                            <span style="color:#ccc; font-weight:300;"> - 10 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">9</span>
                                                                            </td>

                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">20</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                                                        <span style="color:#fd1c00; font-weight:600;">- 10</span>
                                            
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">10</b></span>
                                                                            </td>
                                                
                    </tr>
                                                    <tr id="trTRN_1094">
                    
                        <td class="ordinal"><small>#1094</small></td>
                        
                        <td>2019-06-11 17:57:10</td>
                        
                        <td style=" text-align:center; color:#bbb;"><small>#1720</small></td>	
                        <td data-kioskid="2323" data-iotid="1720" style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">2323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td style=" text-align:center;">
						                        	2                                                </td>	
                        	
                        <td id="tdPRD_118">
                        สปอนเซอร์ ออริจินัล 325 ซี.ซี.T                                                            <span style="color:#ccc; font-weight:300;"> - 13 บ.</span>
                                                                            </td>	
                        
                        <td style="text-align:center;">
													                            	<span style="font-weight:300;">12</span>
                                                                            </td>

                        <td style=" text-align:center;">3</td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;"></td>
                        <td style=" text-align:center;">1</td>
                        <td style=" text-align:center;"></td>
                   
                        <td style=" text-align:center;">
                                                                        	<span style="color:#000;">+ <b style=" font-weight:700;">13</b></span>
                                                </td>
                        
                        <td id="changeTDid_2323" style=" text-align:right;">
						                        							                                    <span style="color:#ccc; font-weight:300;">0</span>
                                    
                                                                            </td>         
                        
                        <td style=" text-align:center;">
                        							                                <span style=" color:#5cb85c;">+ <b style=" font-weight:700;">13</b></span>
                                                                            </td>
                                                
                    </tr>
                                                </tbody>
            </table>
            <div class="dataTables_wrapper">
            	<div class="bottom">
					<div class="dataTables_paginate paging_simple_numbers">
    <ul class="pagination">
        <!-- Previous -->
                        <!-- First -->
                
        <!-- Main Loop -->
                                                                                            <li class="paginate_button active"><a href="?page=1&amp;kioskid=&amp;productid=&amp;display=25&amp;datefrom=2019-06-01&amp;date=2019-06-30&amp;onhour=&amp;search=&amp;refill=&amp;action=filtered&amp;trntype=buy&amp;permisid=&amp;slotid=&amp;slotaction=">1</a></li>
                                                                                <li class="paginate_button "><a href="?page=2&amp;kioskid=&amp;productid=&amp;display=25&amp;datefrom=2019-06-01&amp;date=2019-06-30&amp;onhour=&amp;search=&amp;refill=&amp;action=filtered&amp;trntype=buy&amp;permisid=&amp;slotid=&amp;slotaction=">2</a></li>
                                                                                <li class="paginate_button "><a href="?page=3&amp;kioskid=&amp;productid=&amp;display=25&amp;datefrom=2019-06-01&amp;date=2019-06-30&amp;onhour=&amp;search=&amp;refill=&amp;action=filtered&amp;trntype=buy&amp;permisid=&amp;slotid=&amp;slotaction=">3</a></li>
                                                                                <li class="paginate_button "><a href="?page=4&amp;kioskid=&amp;productid=&amp;display=25&amp;datefrom=2019-06-01&amp;date=2019-06-30&amp;onhour=&amp;search=&amp;refill=&amp;action=filtered&amp;trntype=buy&amp;permisid=&amp;slotid=&amp;slotaction=">4</a></li>
                                                                
        <!-- Last -->
                    <li class="paginate_button disabled"><a href="#">…</a></li>            <li class="paginate_button "><a href="?page=5&amp;kioskid=&amp;productid=&amp;display=25&amp;datefrom=2019-06-01&amp;date=2019-06-30&amp;onhour=&amp;search=&amp;refill=&amp;action=filtered&amp;trntype=buy&amp;permisid=&amp;slotid=&amp;slotaction=">5</a></li>
                <!-- Next -->
                    </ul>
</div>

                	<div class="dataTables_info">Showing 
											1 to 25 of 102                                             entries</div>
                </div>
            </div>
            
        </div><!--/x_content-->
    </div><!--/x_panel-->
    </div><!--/col-md-12-->

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
