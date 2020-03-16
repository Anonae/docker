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
            <li class="breadcrumb-item" aria-current="page">Slot</li>
            <li class="breadcrumb-item active" aria-current="page">Live Slot</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Slot <b>Technical LOG</b>
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
        	 

	
        	            <p class="text-th">แสดงข้อมูลด้านเทคนิค <b class="b600" style="color:#000;">ช่องเก็บสินค้า</b> ทั้งหมด</p>
                        <p class="text-help">
           		ตั้งแต่วันที่ <b class="text-green">2019-06-01</b> ถึง <b class="text-green">2019-06-30</b>
                รวมทั้งหมด <b class="text-green">0</b> รายการ
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
                    <div class="dataTables_filter" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:85px;">
                        <label>Slot
                            <input class="form-control input-sm autoFilter" name="slotid" value="" onchange="this.form.submit()" maxlength="2" style="width:40px; text-align:right;">
                        </label>
                    </div>
                    <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                        <label>Slot Action
                            <select name="slotaction" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;"> 
                            	<option value="" selected="">...</option>
                                <option value="buy">BUY</option>
                                <option value="fill">FILL</option>
                                <option value="remove">REMOVE</option>
                                <option value="setup">SETUP</option>
                            </select>
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
			 	.table>thead>tr>th.actionTD { text-align:center; width:50px; padding:8px 4px;}
			</style>
            <table id="" class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th rowspan="2" style="color:#bbb;"><small>#ID</small></th>
                        <th rowspan="2">Time</th>
                        <th rowspan="2" colspan="1" style=" text-align:center;">Kiosk</th>
                        <th rowspan="1" colspan="3" style=" text-align:center;">Product</th>
                        <th rowspan="2" colspan="1" style=" text-align:center;">Capacity</th>
                        <th rowspan="2" colspan="1" style=" text-align:center; border-right:1px solid #aaa;">Action</th>
                        <th rowspan="1" colspan="2" style=" text-align:center; border-right:1px solid #aaa;">Unit</th>
                        <th rowspan="1" colspan="2" style=" text-align:center;">Quantity</th>
                    </tr>
                    <tr>
                    	
                        <th style="text-align:center;" class=""><small style="color:#bbb; padding-right:3px;">#Slot ID</small></th>
                        <th style="text-align:center;" class="">Slot</th>
                    	<th style="text-align:left;" class="">Name</th>
                    	
                        <th style="text-align:center;" class="actionTD"><!--<i class="fa fa-fw fa-upload" title="ข้อมูล ขาออก"></i>-->Out</th>
                        <th style="text-align:center; border-right:1px solid #aaa;" class="actionTD"><!--<i class="fa fa-fw fa-download" title="ข้อมูล ขาเข้า"></i>-->In</th>
                        <th style="text-align:right;" class="">Initial</th>
                        <th style="text-align:right;" class="">Remain</th>

                    </tr>
                </thead>
                
                <tbody>
                                	<tr><td colspan="15" class="noData"><i>No Data !!!</i></td></tr>
                                </tbody>
            </table>
            <div class="dataTables_wrapper">
            	<div class="bottom">
					<div class="dataTables_paginate paging_simple_numbers">
    <ul class="pagination">
        <!-- Previous -->
                        <!-- First -->
                
        <!-- Main Loop -->
                                                                                                                                                            
        <!-- Last -->
                <!-- Next -->
                    </ul>
</div>

                	<div class="dataTables_info">Showing 
											1 to 0 of 0                                             entries</div>
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
