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
            <li class="breadcrumb-item active" aria-current="page">Kiosks Report</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->

<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Kiosks Report 
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
                <p class="text-th">10 อันดับ ตู้กดน้ำยอดขายสูงสุด</p>
                                <p class="text-help">
                	รายการขาย ตั้งแต่วันที่ <b class="text-green">2019-06-01</b> ถึง <b class="text-green">2019-06-30</b>
                    รวมทั้งหมด <b class="text-green">102</b> รายการ
                </p>
            </div>
            <div class="x_content">
            
                <div class="row">
                	<div class="col-md-8 col-sm-8 col-xs-12" style="padding-top:45px;"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                        <canvas id="rankDoughnut" height="518" width="1040" style="width: 989px; height: 493px;"></canvas>
                    </div><!--/col-->
                    <div class="col-md-4 col-sm-4 col-xs-12" style="padding-top:10px;">
                        <ul class="list-unstyled listRank">
                                                	                            <li id="rankPRD_2323" style="position:relative;">
                            	<div class="rank rank1" style=" top:14px; left:-10px;">
                                	<i class="fa fa-fw fa-certificate rankInner" style="font-size:38px; width:35px; height:35px; line-height:35px;"></i> 
                                    <b class="rankInner" style="font-size:18px; width:35px; height:35px; line-height:33px;">1</b>
                                </div>
                                <div class="content" style="margin-left:20px; width:calc(60% - 30px);">
                                    <div class="topic" style="padding-top:0; height:20px;">
                                    	<b style="color:#000;">2323</b> 
                                        <span style="font-weight:400; color: #73879C;">( กระทิงแดง สนามบอล )</span>
                                    </div>
                                    <div class="value" style="line-height:20px;">ยอดขาย <b style="font-size:16px;">1,140</b> บาท</div>
                                </div>
                                <div class="progress" style=" height:10px; margin-top:26px; width:calc(40% - 30px);">
                                	<div class="progress-text">100.00 %</div>
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
                                </div>
                            </li>
                                                                            	                                                	                                                	                                                	                                                	                                                	                                                	                                                	                                                	                                                </ul>
                    </div><!--/col-->
                </div><!--/row-->
            
            </div><!--/x_content-->
        </div><!--/x_panel-->
    </div><!--/col-md-12-->
</div><!--/row-->

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="padding-top:5px; padding-bottom:1px; margin-bottom:0;">
        	<div class="x_content">
				<div class="dataTables_wrapper">
                <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:0;">
                    <div class="top topSelect" style=" width:100%; display:table; border:none; margin:0; padding:0;">
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
                	<th style="text-align:left;">หมายเลขตู้กดน้ำ</th>
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
								<tr id="salesTR_2323" class="">
                    <td style="text-align:left;">
                    	<b style="color:#000;">2323</b>
                        <span style="font-weight:400;">( กระทิงแดง สนามบอล )</span>
                    </td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700; color:#26B99A;">
						<span style=" ">1,140</span> <span class="unit">THB</span>
                    </td>
                    <td style="text-align:right;">100.00 %</td>
                    
                    <td style="text-align:right; border-left:1px solid #ddd; font-weight: 700;">
                    	<a href="transaction_lists.php?kioskid=2323&amp;datefrom=2019-06-01&amp;date=2019-06-30">
						<span style=" ">102</span> <span class="unit">Record</span>
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
