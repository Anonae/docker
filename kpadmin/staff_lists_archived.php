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
            <h2>Staff <b>Archived</b> Lists</h2>
        </div><!--/col-->     
    </div><!--/content-title-->
</div><!--/row-->


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">
                แสดงรายชื่อ เจ้าหน้าที่เข้าใช้งาน ทั้งหมด <b class="text-green">4</b> รายชื่อ
            </p>
            <!--<div class="nav navbar-right"><a href="user_add.php" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Add New User</a></div>-->
        </div><!--/x_title-->
        <div class="x_content">
            
            <div class="dataTables_wrapper">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
                
               <div class="top">
               		<div class="dataTables_filter">
                        <label>ค้นหา 
                            <input type="text" id="search" name="search" class="form-control input-sm autoFilter" placeholder="Name, Mobile" value="" onchange="this.form.submit()">
                        </label>
                    </div>
                    <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                        <label>เลือกสิทธิ
                            <select name="permisid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;">
								<option value="" selected="">...</option>
                                                                            	<option value="2">Administrator</option>
                                                    	<option value="3">Monitor</option>
                                                    	<option value="11">Sales Officer</option>
                                                    	<option value="12">VanSale Officer</option>
                                                    </select>
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
			 	.table>thead>tr>th.topupCB { text-align:center; width:35px;}
				img.disabled { filter: grayscale(100%);}
			</style>
            <table id="" class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th rowspan="1">#</th>
                        <th rowspan="1">Staffs</th>
                        <th rowspan="1">Mobile</th>
                        <th rowspan="1">Permission</th>
                        <th rowspan="1">Route</th>
                        <th rowspan="1">Group</th>
                        <th rowspan="1">Last Update</th>
                        <th style=" text-align:center;">Action</th>
                </tr></thead>
                
                <tbody>
                                                                    <tr id="trStaff_19">
                    
                        <td class="ordinal"><small>19</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hkpehx09mNF9YERk16_5LCGRUOjIvPzIXIHEoOXsWOWlwI3MJZCN5bS4UbzpwcXALYnd8a3oRbj0h" class="avatar disabled" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<b class="b500" style="color:#999;">KRIT $€¥฿</b>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Administrator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(2)</span> ผู้ดูแลระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-01-18 13:52:04</td>
                        <td style=" text-align:center;">
                        	<form id="formRetrieved_19" class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate="">
                            <input type="hidden" name="action" value="retrieved">
                            <input name="staffid" value="19" style="display:none;">
                            <input name="bywho" value="" style="display:none;">
                            <input name="when" value="2019-06-14 16:53:09" style="display:none;"> 
                                <a id="btnRetrieved_19" class="btn btn-dark btn-block btn-sm btnRetrieved" type="submit" style="font-size:13px; color:#fff;">Retrieved</a>
                            </form>
                        </td>
                        
                    </tr>
                                    <tr id="trStaff_22">
                    
                        <td class="ordinal"><small>22</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0haFsDM9IDPmlOPRRK179BPnJ4MAQ5EzghNlp1DDw4ZVlqCC5rIFtxWj4_NVkwCSw6dw4jDG00ZFww" class="avatar disabled" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<b class="b500" style="color:#999;">ʙᴏᴡᴡʏ~</b>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Administrator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(2)</span> ผู้ดูแลระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-01-18 14:17:43</td>
                        <td style=" text-align:center;">
                        	<form id="formRetrieved_22" class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate="">
                            <input type="hidden" name="action" value="retrieved">
                            <input name="staffid" value="22" style="display:none;">
                            <input name="bywho" value="" style="display:none;">
                            <input name="when" value="2019-06-14 16:53:09" style="display:none;"> 
                                <a id="btnRetrieved_22" class="btn btn-dark btn-block btn-sm btnRetrieved" type="submit" style="font-size:13px; color:#fff;">Retrieved</a>
                            </form>
                        </td>
                        
                    </tr>
                                    <tr id="trStaff_23">
                    
                        <td class="ordinal"><small>23</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hgyms09kjOFZQChIiHrdHAWxPNjsnJD4eKGpxMHYKNWJ8an1Tb2UjMXJZYGZ-OStSbDt3OXFdNGYp" class="avatar disabled" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<b class="b500" style="color:#999;">Viewvii</b>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Administrator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(2)</span> ผู้ดูแลระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-01-11 12:41:53</td>
                        <td style=" text-align:center;">
                        	<form id="formRetrieved_23" class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate="">
                            <input type="hidden" name="action" value="retrieved">
                            <input name="staffid" value="23" style="display:none;">
                            <input name="bywho" value="" style="display:none;">
                            <input name="when" value="2019-06-14 16:53:09" style="display:none;"> 
                                <a id="btnRetrieved_23" class="btn btn-dark btn-block btn-sm btnRetrieved" type="submit" style="font-size:13px; color:#fff;">Retrieved</a>
                            </form>
                        </td>
                        
                    </tr>
                                    <tr id="trStaff_24">
                    
                        <td class="ordinal"><small>24</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hh0-dVeZ3Nx8QHR1Is1ZISCxYOXJnMzFXaCsrejIcOnw8fiIZLXlwLD0fPik8enBNKHwreTIVPSk5" class="avatar disabled" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<b class="b500" style="color:#999;">❥Mu'Tammareen</b>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Administrator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(2)</span> ผู้ดูแลระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-01-11 12:41:59</td>
                        <td style=" text-align:center;">
                        	<form id="formRetrieved_24" class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate="">
                            <input type="hidden" name="action" value="retrieved">
                            <input name="staffid" value="24" style="display:none;">
                            <input name="bywho" value="" style="display:none;">
                            <input name="when" value="2019-06-14 16:53:09" style="display:none;"> 
                                <a id="btnRetrieved_24" class="btn btn-dark btn-block btn-sm btnRetrieved" type="submit" style="font-size:13px; color:#fff;">Retrieved</a>
                            </form>
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
                                                                                                                                                                                                    
        <!-- Last -->
                <!-- Next -->
                    </ul>
</div>

                	<div class="dataTables_info">Showing 1 to 4 of 4 entries</div>
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
