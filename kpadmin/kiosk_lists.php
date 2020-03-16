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
            <li class="breadcrumb-item active" aria-current="page">Kiosks</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Kiosks <b>Lists</b></h2>
        </div><!--/col-->     
    </div><!--/content-title-->
</div><!--/row-->


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">แสดงรายการ ตู้กดน้ำ ทั้งหมด <b class="text-green">3</b> ตู้</p>
                        <div class="nav navbar-right"><a href="kiosk_add.php" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Add New Kiosk</a></div>
                        <div class="clearfix"></div>
        </div><!--/x_title-->        
        <div class="x_content">
        
        	<div class="dataTables_wrapper">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
               <div class="top">
               		<div class="dataTables_filter">
                        <label>Search 
                            <input name="search" class="form-control input-sm" value="" onchange="this.form.submit()">
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
        
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                    	<th style=" text-align:left; width:130px;">Model</th>
                        <th style=" text-align:left; width:100px;">Code</th>
                        <th>Name</th>
                        <th style=" text-align:left; width:100px;">Route</th>
                        <!--<th>Location</th>
                        <th style="width:160px;">Latitude, Longitude</th>-->
                        <th>Description</th>
                        <th style=" text-align:center;">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                                                                    <tr>
                    	<td style=" text-align:left;">TCP 25 Slot</td>
						<td style=" text-align:left;">
                            <a href="kiosk_view.php?kioskid=2323"><b class="b700">2323</b></a>
                        </td>
                        <td>กระทิงแดง สนามบอล</td> 
                        <td style=" text-align:left;"></td>
                                                <td>บริษัท เครื่องดื่มกระทิงแดง จำกัด</td> 
                        <td style=" text-align:center;"><a class="btn btn-silver btn-xs" title="edit" href="kiosk_edit.php?kioskid=2323"><i class="fa fa-fw fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                    	<td style=" text-align:left;">TCP 25 Slot</td>
						<td style=" text-align:left;">
                            <a href="kiosk_view.php?kioskid=4152"><b class="b700">4152</b></a>
                        </td>
                        <td></td> 
                        <td style=" text-align:left;">Ladkrabang</td>
                                                <td></td> 
                        <td style=" text-align:center;"><a class="btn btn-silver btn-xs" title="edit" href="kiosk_edit.php?kioskid=4152"><i class="fa fa-fw fa-pencil"></i></a></td>
                    </tr>
                                    <tr>
                    	<td style=" text-align:left;">TCP 25 Slot</td>
						<td style=" text-align:left;">
                            <a href="kiosk_view.php?kioskid=4153"><b class="b700">4153</b></a>
                        </td>
                        <td></td> 
                        <td style=" text-align:left;"></td>
                                                <td></td> 
                        <td style=" text-align:center;"><a class="btn btn-silver btn-xs" title="edit" href="kiosk_edit.php?kioskid=4153"><i class="fa fa-fw fa-pencil"></i></a></td>
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

                	<div class="dataTables_info">Showing 1 to 3 of 3 entries</div>
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
