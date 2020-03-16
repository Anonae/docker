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
            <li class="breadcrumb-item"><a href="kiosk_lists.php">Command</a></li>
            <li class="breadcrumb-item active">Kiosk 4152</li>
            <li class="breadcrumb-item active" aria-current="page">Send Command</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
        	<h2 style="margin-bottom:10px;"><b>Send Command</b></h2>
                        <h2>Kiosk <b>4152</b>
				            </h2>
                    </div><!--/col-->    
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="dataTables_wrapper">
            <form method="GET">
                <div class="dataTables_custom" style="width:100%;">
                	<div class="dateMonthPicker">
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="fa fa-fw fa-building-o"></i></span>
                            <div class="btn-group bootstrap-select input-group-btn form-control input-sm selectCustomW100"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" data-id="kioskid" title="4152 (  )"><span class="filter-option pull-left"><b>4152</b> <span style="font-weight:400;">(  )</span></span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><b>2323</b> <span style="font-weight:400;">( กระทิงแดง สนามบอล )</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><b>4152</b> <span style="font-weight:400;">(  )</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><b>4153</b> <span style="font-weight:400;">(  )</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select id="kioskid" name="kioskid" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;" onchange="this.form.submit()" tabindex="-98">
                            							                                                            <option data-content="<b>2323</b> <span style='font-weight:400;'>( กระทิงแดง สนามบอล )</span>" value="2323">2323</option>
                                                            <option data-content="<b>4152</b> <span style='font-weight:400;'>(  )</span>" value="4152" selected="">4152</option>
                                                            <option data-content="<b>4153</b> <span style='font-weight:400;'>(  )</span>" value="4153">4153</option>
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
        <div class="x_content">
        	<div class="dataTables_wrapper">
            	                <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:0;">
                    <div class="top topSelect" style=" width:100%; display:table; border:none; margin:0; padding:0;">
                        <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                            <label>เลือกตู้กดน้ำ
                                <select name="kioskid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;">
                                    <option value="" selected="">...</option>
                                                                                                <option value="2323">2323 (กระทิงแดง สนามบอล)</option>
                                                            <option value="4152" selected="">4152</option>
                                                            <option value="4153">4153</option>
                                                            </select>
                            </label>
                        </div>
                    </div> <!--/top-->
                </form>
			</div>            
        </div><!--/x_content-->
    </div><!--/x_panel-->
    </div><!--/col-md-12-->
</div><!--/row-->

  

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    	<div class="x_title">
            <p class="text-th">ชุดคำสั่งสำหรับเจ้าหน้าที่ดูแลระบบเท่านั้น</p>
        </div><!--/x_title-->
        

        <div class="x_content row">
            <form method="post">
                <input type="hidden" id="action" name="action" value="add">
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                    <button class="btn btn-silver btn-block btnCMD" type="submit" name="restart_app" value="restart_app" onclick="return confirm('ส่งเลือกคำสั่ง restart_app ?')">
                    <div class="topic">สั่ง Restart App</div> restart_app
                    </button>
        		</div> <!-- // restart_app --> 

                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                    <button class="btn btn-silver btn-block btnCMD" type="submit" name="get_last_apilog" value="get_last_apilog" onclick="return confirm('ส่งคำสั่ง get_last_apilog ?')">
                        <div class="topic">ขอ Api Log ล่าสุด</div>get_last_apilog
                    </button>
                </div> <!-- get_last_apilog --> 
            
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                    <button class="btn btn-silver btn-block btnCMD" type="submit" name="get_last_log" value="get_last_log" onclick="return confirm('ส่งคำสั่ง get_last_log ?')">
                        <div class="topic">ขอ Log ล่าสุด</div>get_last_log
                    </button>
                </div> <!-- get_last_log --> 
            
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                    <button class="btn btn-silver btn-block btnCMD" type="submit" name="get_last_buy" value="get_last_buy" onclick="return confirm('ส่งคำสั่ง get_last_buy ?')">
                        <div class="topic">ขอ รายการขายล่าสุด</div>get_last_buy
                    </button>
                </div> <!-- get_last_buy -->  
            
            <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                <button class="btn btn-silver btn-block btnCMD" type="submit" name="closeservice" value="closeservice" onclick="return confirm('ส่งคำสั่ง closeservice ?')">
                	<div class="topic">สั่งปิด App</div>closeservice
                </button>
           </div>  <!-- closeservice -->  
       </form>

		</div><!--/x_content-->
    </div><!--/x_panel-->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            	<div class="x_title">
                    <p class="text-th">แสดงรายการ ส่งคำสั่ง ย้อนหลัง</p>
                    <p class="text-help">
                    	Kiosk ID : <b class="text-green"></b>
                        รวมทั้งหมด <b class="text-green">0</b> รายการ
                    </p>
                </div><!--/x_title-->
                <div class="x_content">
                    <div class="dataTables_wrapper">                       
<style type="text/css">
.btnCMD { padding:10px 0 15px; font-size:15px; line-height:20px; font-weight:500; color:red !important; margin-bottom:15px;}
.btnCMD>.topic { font-size:16px; padding:5px 0; font-weight:500; color:#000;}
.cmd_show_sort { overflow: hidden; padding-bottom:10px; height:40px; width:300px; word-break:break-all;}
.cmd_show_full { overflow: auto; height:auto; width:auto; word-break:break-all;}
.badge-cmd { font-size:18px; font-weight:400; background-color:#26B99A; margin-top:-8px; padding: 5px 10px 8px;}
</style>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="color:#bbb;"><small>#ID</small></th>
                                    <th>Input Time</th>
                                    <th>Last Update</th>
									<th style="text-align:left;">Status</th>  
                                    <th>Command</th>
                                    <th id="cmdDisplay">Return</th>
                                </tr>
                            </thead>

                            <tbody>
                                
                                                                    <tr><td colspan="7" class="noData"><i>No Data !!!</i></td></tr>
								                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--// end row --> 
    </div>
</div>

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
