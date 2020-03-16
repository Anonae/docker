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
            <li class="breadcrumb-item active" aria-current="page">Category</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Category <b>Lists</b></h2>
        </div><!--/col-->     
    </div><!--/content-title-->
</div><!--/row-->


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">แสดงรายการ ประเภทสินค้า ทั้งหมด <b class="text-green">9</b> รายการ</p>
            <div class="nav navbar-right"><a href="category_add.php" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Add New Category</a></div>
        </div><!--/x_title-->
        <div class="x_content">
            <div id="dataTableTCP_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="top"><div id="dataTableTCP_filter" class="dataTables_filter"><label>Search <input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTableTCP"></label></div><div class="dt-buttons btn-group"><a class="btn btn-default buttons-csv buttons-html5 btn-sm btn-success" tabindex="0" aria-controls="dataTableTCP" href="#"><span>CSV</span></a><a class="btn btn-default buttons-print btn-sm btn-dark" tabindex="0" aria-controls="dataTableTCP" href="#"><span>Print</span></a></div><div class="dataTables_length" id="dataTableTCP_length"><label>Record/Page <select name="dataTableTCP_length" aria-controls="dataTableTCP" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div><div class="dataTables_paginate paging_simple_numbers" id="dataTableTCP_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="dataTableTCP_previous"><a href="#" aria-controls="dataTableTCP" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="dataTableTCP" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button next disabled" id="dataTableTCP_next"><a href="#" aria-controls="dataTableTCP" data-dt-idx="2" tabindex="0">Next</a></li></ul></div><div class="clear"></div></div><table id="dataTableTCP" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-describedby="dataTableTCP_info" style="width: 1493px;">
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTableTCP" rowspan="1" colspan="1" style="width: 91.005px;" aria-sort="ascending" aria-label="ID: activate to sort column descending">ID</th><th class="sorting" tabindex="0" aria-controls="dataTableTCP" rowspan="1" colspan="1" style="width: 416.005px;" aria-label="Name: activate to sort column ascending">Name</th><th class="sorting" tabindex="0" aria-controls="dataTableTCP" rowspan="1" colspan="1" style="width: 370.005px;" aria-label="Description: activate to sort column ascending">Description</th><th class="sorting" tabindex="0" aria-controls="dataTableTCP" rowspan="1" colspan="1" style="width: 333.005px;" aria-label="Last Update: activate to sort column ascending">Last Update</th><th style="text-align: center; width: 131px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Action">Action</th></tr>
                </thead>
                
                <tbody>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                <tr role="row" class="odd">
                        <td class="ordinal sorting_1" tabindex="0">1</td>
                        <td><a href="category_edit.php?catid=1"><b class="b500">Energy Drink</b></a></td>
                        <td>เครื่องดื่มชูกำลัง</td>
                        <td>2019-01-14 10:50:00</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="category_edit.php?catid=1"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                    </tr><tr role="row" class="even">
                        <td class="ordinal sorting_1" tabindex="0">2</td>
                        <td><a href="category_edit.php?catid=2"><b class="b500">Mineral Drink</b></a></td>
                        <td>เครื่องดื่มเกลือแร่</td>
                        <td>2018-08-09 07:07:31</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="category_edit.php?catid=2"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                    </tr><tr role="row" class="odd">
                        <td class="ordinal sorting_1" tabindex="0">3</td>
                        <td><a href="category_edit.php?catid=3"><b class="b500">White Tea with Fruit Juice</b></a></td>
                        <td>ชาขาวผสมน้ำผลไม้</td>
                        <td>2019-01-14 10:47:12</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="category_edit.php?catid=3"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                    </tr><tr role="row" class="even">
                        <td class="ordinal sorting_1" tabindex="0">4</td>
                        <td><a href="category_edit.php?catid=4"><b class="b500">Caffeinated Drinks</b></a></td>
                        <td>เครื่องดื่มผสมกาแฟอีน</td>
                        <td>2019-01-14 10:50:52</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="category_edit.php?catid=4"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                    </tr><tr role="row" class="odd">
                        <td class="ordinal sorting_1" tabindex="0">5</td>
                        <td><a href="category_edit.php?catid=5"><b class="b500">Functional Drinks</b></a></td>
                        <td>เครื่องดื่มฟังก์ชันนัลดริงก์</td>
                        <td>2019-01-14 10:51:21</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="category_edit.php?catid=5"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                    </tr><tr role="row" class="even">
                        <td class="ordinal sorting_1" tabindex="0">6</td>
                        <td><a href="category_edit.php?catid=6"><b class="b500">Sparkling Water</b></a></td>
                        <td>น้ำอัดลม</td>
                        <td>2019-01-14 10:49:46</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="category_edit.php?catid=6"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                    </tr><tr role="row" class="odd">
                        <td class="ordinal sorting_1" tabindex="0">7</td>
                        <td><a href="category_edit.php?catid=7"><b class="b500">Soy Milk</b></a></td>
                        <td>นมถั่วเหลือง</td>
                        <td>2019-01-14 10:47:59</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="category_edit.php?catid=7"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                    </tr><tr role="row" class="even">
                        <td class="ordinal sorting_1" tabindex="0">8</td>
                        <td><a href="category_edit.php?catid=8"><b class="b500">Water</b></a></td>
                        <td>น้ำดื่ม</td>
                        <td>2019-01-14 10:48:12</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="category_edit.php?catid=8"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                    </tr><tr role="row" class="odd">
                        <td class="ordinal sorting_1" tabindex="0">9</td>
                        <td><a href="category_edit.php?catid=9"><b class="b500">Fruit Juice</b></a></td>
                        <td>น้ำผลไม้</td>
                        <td>2019-01-14 10:48:49</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="category_edit.php?catid=9"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                    </tr></tbody>
            </table><div class="bottom"><div class="dataTables_paginate paging_simple_numbers"><ul class="pagination"><li class="paginate_button previous disabled"><a href="#" aria-controls="dataTableTCP" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="dataTableTCP" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button next disabled"><a href="#" aria-controls="dataTableTCP" data-dt-idx="2" tabindex="0">Next</a></li></ul></div><div class="dataTables_info" id="dataTableTCP_info" role="status" aria-live="polite">Showing 1 to 9 of 9 entries</div><div class="clear"></div></div></div>
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
