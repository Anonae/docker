<!DOCTYPE html>
<html lang="en">
<head><?php require_once 'inc_head_href.php'; ?>
    <title> Kaoook Vending </title>
	
</head>

<body style="background-color:#fff;">

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->


	<div class="content-title" style="padding-top:15px;">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Sold Report - Account 
            	<span style="font-size:15px;">on 
                    <b class="text-green">2019-06-01</b> to <b class="text-green">2019-06-30</b>
                </span>
                <button class="btn btn-md btn-dark btn-export-file" style="float:right;">Export Excel</button>
            </h2>
        </div><!--/col-->     
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="dataTables_wrapper">
                <div class="dataTables_custom" style=" width:100%;">
                    <div class="dateRangePicker topPageDisplay">
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                            <input name="" id="dateRangeTCP" class="form-control mainDatePicker" value="" autocomplete="off" />
                            <input class="form-control input-sm" style="left:34px;" id="datefromClone" value="2019-06-01"  />
                            <input class="form-control input-sm" style="right:0;" id="dateClone" value="2019-06-30"  />
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        </div>
                    </div>
                    <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:0; display:none;">
                        <input class="form-control input-sm" name="datefrom" id="datefrom" value="2019-06-01" autocomplete="off" />
                        <input class="form-control input-sm" name="date" id="date" value="2019-06-30" autocomplete="off" />
                    </form>
                </div>
            </div>
        </div><!--/col--> 
    </div><!--/content-title-->

<style type="text/css">/*
table { font-family:'Tahoma'; font-size:13px;}
table td { border:1px solid #000; padding:2px;}*/
</style>
<div id="export-data" data-filename="sold_20190601_20190630" style="border-top:2px solid #4B5F71;">
<table class="table">
<!--<thead>
	<tr><th colspan="8"><h3>รายงานสรุปยอดการขาย</h3>รองรับการเทียบรายงาน ตามเอกสาร Excel จากทางบัญชีของ TCP</th></tr>
</thead>-->
<thead>
<tr style=" background-color:#eee;">
        <td>Sold Date</td>
        <td>Ship Kiosk</td>
        <td>Ship Name</td>
        <td>SKU</td>
        <td>Product</td>
        <td>Quantity</td>
        <td>Price/Unit (THB)</td>
        <td>Income (THB)</td>
    </tr>
</thead>
<tbody>   


	<!--<tr style="border-bottom:2px solid #ddd; background-color:#26B99A;">
    	<td colspan="8" align="left" style="color:#fff;">
        	(2323) บริษัท เครื่องดื่มกระทิงแดง จำกัด        	<span style=" padding-left:15px; color:#42d8b8;">Total Reset Time : 0 Time</span>
        </td>
    </tr>-->
	<!--<tr style="border-bottom:2px solid #ddd; background-color:#26B99A;">
    	<td colspan="8" align="left" style="color:#fff;">
        	(4152)         	<span style=" padding-left:15px; color:#42d8b8;">Total Reset Time : 0 Time</span>
        </td>
    </tr>-->
	<!--<tr style="border-bottom:2px solid #ddd; background-color:#26B99A;">
    	<td colspan="8" align="left" style="color:#fff;">
        	(4153)         	<span style=" padding-left:15px; color:#42d8b8;">Total Reset Time : 0 Time</span>
        </td>
    </tr>-->

</tbody>
</table>
</div><!--//export-data-->

<!-- // End Content on PAGE /////////////////////////////////////////////////////// -->
<!-- jQuery -->
<?php require_once('inc_footer_script.php');?>

</body>
</html>

<script type="text/javascript">
//Export to Excel
$(document).ready(function(){  
	$('.btn-export-file').click(function(){  
		var exportData = $('#export-data').html();
		var exportFilemane = $('#export-data').attr('data-filename');
		$.redirect('export_file_xls.php', { filename:exportFilemane, data:exportData } );
	});
});  
 
//DateRange
var startDate; var endDate;
$(document).ready(function() {
	$('#dateRangeTCP').daterangepicker({
		maxDate: moment(), startDate: moment().startOf('month'), endDate: moment().endOf('month'),
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
			'Last 7 Days': [moment().subtract('days', 6), moment()],
			'Last 30 Days': [moment().subtract('days', 29), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')],
			'Last 3 Month': [moment().subtract('month', 3).startOf('month'), moment().subtract('month', 1).endOf('month')]
		},
		alwaysShowCalendars: true, showCustomRangeLabel: false, showDropdowns: true,
		opens: 'left', buttonClasses: ['btn btn-default'], applyClass: 'btn-small btn-primary', cancelClass: 'btn-small btn-danger',
		locale: { format: 'YYYY-MM-DD', applyLabel: 'Submit', cancelLabel: 'Del'}
	}, function(start, end) {
		//console.log('from ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD')); 
		startDate = start; endDate = end;
		$("#datefrom").val(start.format('YYYY-MM-DD')); $("#date").val(end.format('YYYY-MM-DD'));
		$("#datefromClone").val(start.format('YYYY-MM-DD')); $("#dateClone").val(end.format('YYYY-MM-DD'));
		document.getElementById("filterForm").submit();
	});
	//Set the initial state of the picker label
	$('#dateRangeTCP').val('');
	$('.cancelBtn').click(function(){
		$('#datefrom').val(''); $('#date').val(''); $('#datefromClone').val(''); $('#dateClone').val('');
		document.getElementById("filterForm").submit();
	});
	});
</script> 