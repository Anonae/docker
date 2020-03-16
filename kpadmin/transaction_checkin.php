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
            <li class="breadcrumb-item active" aria-current="page">Kiosk Check-in</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Kiosk <b>Check-in</b>
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
            <p class="text-th">แสดงข้อมูล การส่งสัญญาณ <b class="b600" style="color:#000;">รายงานตัว</b> ทั้งหมด</p>
                        <p class="text-help">
           		ตั้งแต่วันที่ <b class="text-green">2019-06-01</b> ถึง <b class="text-green">2019-06-30</b>
                รวมทั้งหมด <b class="text-green">3</b> รายการ
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
                                                                                                                                                            
        <!-- Last -->
                <!-- Next -->
                    </ul>
</div>

                </div>
            </form>
            </div>
            
            <style type="text/css">
			 	.table>thead>tr.mini>th { text-align:center; width:30px; padding:8px 4px;}
			</style>
            <table id="" class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th rowspan="2" style="color:#bbb;"><small>#ID</small></th>
                        <th rowspan="2" colspan="2">Time</th>
                        <th rowspan="2" style=" text-align:left;">Kiosk</th>
                        <th rowspan="1" colspan="6" style=" text-align:left;">Temperature</th>
                        <th rowspan="2" style=" text-align:left;">Description</th>
                    </tr>
                    <tr class="mini">
                    	<th>F1</th><th>F2</th><th>F3</th><th>C1</th><th>C2</th><th>C3</th>
                    </tr>
                </thead>
                
                <tbody>
                                                                 

                    <tr id="rowID_">
                    
                        <td class="ordinal"><small>#78942</small></td>
                        
                        <td>2019-06-12 18:39:03</td>
                        
                        <td>
						                        								                                		<span style="color:#aaa;">สัญญาณหาย 1 วันแล้ว</span>
                               
                                                </td>
                        
                        <td style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=4153">
                                <b style="font-weight:700;"><span style="font-weight:500; color:#666;">004153</span></b>
                            </a>
                                                    </td>
                        
                        <td align="center">15</td>
                        <td align="center">6</td>
                        <td align="center">18</td>
                        <td align="center">14</td>
                        <td align="center">24</td>
                        <td align="center">16</td>

                        <td></td>                        
                    </tr>
                                

                    <tr id="rowID_">
                    
                        <td class="ordinal"><small>#</small></td>
                        
                        <td>1970-01-01 07:00:00</td>
                        
                        <td>
						<small style="color:orange;font-style: italic;">No Data</small>                        </td>
                        
                        <td style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=">
                                <b style="font-weight:700;"><span style="font-weight:500; color:#666;">000000</span></b>
                            </a>
                                                    </td>
                        
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>

                        <td></td>                        
                    </tr>
                                

                    <tr id="rowID_">
                    
                        <td class="ordinal"><small>#80270</small></td>
                        
                        <td>2019-06-14 16:22:47</td>
                        
                        <td>
						                        								                                		<span style="color:#1ABB9C;font-size:15px;font-weight:600;">รายงานตัวปกติ</span>
                               
                                                </td>
                        
                        <td style=" text-align:left;">
                        	<a class="" href="kiosk_view.php?kioskid=2323">
                                <b style="font-weight:700;">002323</b>
                            </a>
                            <span style="color:#bbb; padding-left:3px; font-weight: 300;">(กระทิงแดง สนามบอล)</span>                        </td>
                        
                        <td align="center">14</td>
                        <td align="center">9</td>
                        <td align="center">10</td>
                        <td align="center">13</td>
                        <td align="center">9</td>
                        <td align="center">11</td>

                        <td></td>                        
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
