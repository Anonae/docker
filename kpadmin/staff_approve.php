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
            <li class="breadcrumb-item active" aria-current="page">Staff</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Staff <b>Approve</b></h2>
        </div><!--/col-->     
    </div><!--/content-title-->
</div><!--/row-->


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">แสดงรายชื่อ ผู้สมัครผ่านการสแกน Line QR Code ทั้งหมด <b class="text-green">0</b> รายชื่อ</p>
            <!--<div class="nav navbar-right"><a href="user_add.php" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Add New User</a></div>-->
        </div><!--/x_title-->
        <div class="x_content">
            
            <div class="dataTables_wrapper">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
                
               <div class="top">
               		<div class="dataTables_filter">
                        <label>Search 
                            <input type="text" id="search" name="search" class="form-control input-sm autoFilter" placeholder="" onchange="this.form.submit()">
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
.gridrow { padding:10px 5px; border-top:1px solid #eee; border-bottom:1px solid #eee;}
.gridrow .griditem { float:left; width:calc(20% - 10px); margin:0 5px; border:1px solid #ddd; border-radius: 12px 0 0 0;}
.gridrow .picture { position:relative; background-position:center center; background-repeat:no-repeat; background-size:cover; border-radius: 12px 0 0 0;}
.gridrow .ordinal { position:absolute; top:-3px; right:5px; z-index:9; 
	background-color:rgba(115,135,156); color:#fff; line-height:25px; text-align:right; padding:0 5px; 
	box-shadow:1px 0px 1px rgba(0,0,0,0.15); }
.gridrow .createon { position:absolute; bottom:5px; left:0; z-index:8; font-size:11px;
	background-color:rgba(115,135,156,0.3); color:#fff; line-height:20px; width:fit-content; text-align:left; padding:0 5px; }
.gridrow .profile ul { padding:10px 10px 0; margin:0}
.gridrow .profile ul li { min-height:25px;}
.gridrow .profile .topic { color:#aaa; font-size:13px; font-weight:300; line-height:13px; min-height:13px;}
.gridrow .profile .name { color:#000; font-size:16px; border-bottom:1px dotted #ddd;}
.gridrow form .bootstrap-select .filter-option { font-size:13px;}
.gridrow .action .btn { font-size:13px;}
.gridrow .dropdown-toggle { border-color:#ddd;}
.gridrow label.topic { color:#aaa; font-size:13px; font-weight:300; line-height:13px; min-height:13px; padding-left:5px;}

</style>
			<div class="gridrow">
            <div class="row">
			                            <div class="gridrow-item"><h3><i>No Data !!!</i></h3></div>
            			</div><!--/.row-->
            </div><!--/.gridrow-->
            
            <div class="dataTables_wrapper" style=" margin-top:10px;">
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

                	<div class="dataTables_info">Showing 1 to 0 of 0 entries</div>
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
