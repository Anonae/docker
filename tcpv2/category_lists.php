<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Category"; 

//Category
$fetchCAT = new category();
$fetchCAT->status = 0;
$fetchCAT->loadmany();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('inc_head.php'); ?>	
    <title><?=$pageTitle?>, <?=$siteTitle?></title>
<?php require_once('inc_head_href.php'); ?>	
</head>

<body class="nav-md">
<div class="container body">
<div class="main_container">
<?php require_once('inc_menu_main.php'); ?>	
<div class="right_col" role="main">	
    <!--start Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" >
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$pageTitle?></li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2><?=$pageTitle?> <b>Lists</b></h2>
        </div><!--/col-->     
    </div><!--/content-title-->
</div><!--/row-->

<? if(isset($_GET['result'])){ ?>
<div class="alert alert-success alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-fw fa-close"></i></button>
	Category ID <b><?=$_GET['catid']?></b>, has been <?=$_GET['result']?> <b>Successful</b>.
    <i style="margin-left:10px; color:rgba(255,255,255,0.5);">on <?=$_GET['when']?> by <?=$_GET['bywho']?></i>
</div>
<? } ?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">แสดงรายการ ประเภทสินค้า ทั้งหมด <b class="text-green"><?=number_format($fetchCAT->totalrecords,0)?></b> รายการ</p>
            <div class="nav navbar-right"><a href="category_add.php" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Add New Category</a></div>
        </div><!--/x_title-->
        <div class="x_content">
            <table id="dataTableTCP" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                    	<th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Last Update</th>
                        <th style=" text-align:center;">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                <? for ($x = 0; $x < $fetchCAT->totalrecords; $x++) :  ?>
                    <tr>
                        <td class="ordinal"><?=$fetchCAT->id[$x]; ?></td>
                        <td><a href="category_edit.php?catid=<?=$fetchCAT->id[$x]; ?>"><b class="b500"><?=$fetchCAT->name[$x]; ?></b></a></td>
                        <td><?=$fetchCAT->description[$x]; ?></td>
                        <td><?=date('Y-m-d h:i:s', $fetchCAT->lastupdate[$x])?></td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="category_edit.php?catid=<?=$fetchCAT->id[$x]; ?>"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                    </tr>
                <? endfor; ?>
                </tbody>
            </table>
        </div><!--/x_content-->
    </div><!--/x_panel-->
    </div><!--/col-md-12-->

</div><!--/row-->

<!-- // End Content on PAGE /////////////////////////////////////////////////////// -->

</div><!-- /right_col -->
<?php require_once('inc_footer.php'); ?>
</div><!-- /main_container -->
</div><!-- /container -->
<?php require_once('inc_footer_script.php'); ?>	
</body>
</html>

<script type="text/javascript">
function init_DataTables() {
	var handleDataTableButtons = function() { 
		if ($("#dataTableTCP").length) {
			$("#dataTableTCP").DataTable({
				"iDisplayLength":25,
				"oLanguage": {"sSearch": "Search _INPUT_", "sLengthMenu": "Record/Page _MENU_"},
				"dom": '<"top"fBlp<"clear">>rt<"bottom"pi<"clear">>',
				"columnDefs": [ 
					{ "targets": 4, "orderable": false } 
				],
				buttons: [
					{ extend: "csv", className: "btn-sm btn-success" },
					{ extend: "print", className: "btn-sm btn-dark" },
				],
				responsive: true
	}); } };
	TableManageButtons = function() {
		"use strict";
		return { init: function() { handleDataTableButtons(); } };
	}();
	TableManageButtons.init();
};
</script>
