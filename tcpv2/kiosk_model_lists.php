<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Kiosk Model"; 

//Function
/*function getData($url){
	$ch = curl_init();  
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_HEADER, false); 
	$output=curl_exec($ch); curl_close($ch); $data = json_decode($output);
	return $data;
}
//Kiosk Model
$urlModelList = "http://192.168.0.23:3000/fetchKioskModelList";
$fetchMOD = getData($urlModelList);
if(empty($fetchMOD)){ die('Server fetchMOD Offline');} */

//Kiosk Model
$fetchMOD = new kiosk_model();
$fetchMOD->status = 0;
$fetchMOD->loadmany();

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
	Model ID <b><?=$_GET['modelid']?></b>, has been added <b>Successful</b>.
    <i style="margin-left:10px; color:rgba(255,255,255,0.5);">on <?=$_GET['when']?> by <?=$_GET['bywho']?></i>
</div>
<? }elseif($_GET['result']=='delete'){ ?>
<div class="alert alert-warning alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-fw fa-close"></i></button>
	Model ID <b><?=$_GET['modelid']?></b>, has been deleted <b>Successful</b>.
    <i style="margin-left:10px; color:rgba(255,255,255,0.5);">on <?=$_GET['when']?> by <?=$_GET['bywho']?></i>
</div>
<? } ?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">แสดงรายการ ประเภทตู้กดน้ำ ทั้งหมด <b class="text-green"><?=$fetchMOD->totalrecords;?></b> ตู้</p>
            <div class="nav navbar-right"><a href="kiosk_model_add.php" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Add New Kiosk Model</a></div>
            <div class="clearfix"></div>
        </div><!--/x_title-->        
        <div class="x_content">
            <table id="dataTableTCP" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                    	<th>ID</th>
                        <th style=" width:60px;">Image</th>
                        <th style=" text-align:left;">Kiosk</th>
                        <th>Slot Available</th>
                        <th>Placement</th>
                        <th>Description</th>
                        <th style=" text-align:center;">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                <? for ($x = 0; $x < $fetchMOD->totalitems; $x++) :  ?>
                    <tr>
                        <td class="ordinal"><?=$fetchMOD->id[$x]; ?></td>
                        <td style=" text-align:center;">
                        	<? if(!empty($fetchMOD->model_image[$x])): ?>
                        	<a data-toggle="modal" data-target="#model_<?=$fetchMOD->id[$x]; ?>" class="avatar_link">
                                <? if(substr($fetchMOD->model_image[$x],0,4) == 'data'): ?>
                                <img src="<?=$fetchMOD->model_image[$x]?>" class="avatar" style=" height:40px;" />
                                <? else: ?>
                                <img src="images/models/<?=$fetchMOD->model_image[$x]?>" class="avatar" style=" height:40px;" />
                                <? endif; ?>
                            </a>
                            <div id="model_<?=$fetchMOD->id[$x]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                                        <h4 class="modal-title"><?=$fetchMOD->product_name[$x]; ?></h4>
                                    </div>
                                    <div class="modal-body avatar_modal">
                                        <? if(substr($fetchMOD->model_image[$x],0,4) == 'data'): ?>
                                        <img src="<?=$fetchMOD->model_image[$x]?>" class="img-responsive" title="<?=$fetchMOD->product_name[$x]; ?>" />
                                        <? else: ?>
                                        <img src="images/products/<?=$fetchMOD->model_image[$x]?>" class="img-responsive" title="<?=$fetchMOD->product_name[$x]; ?>" />
                                        <? endif; ?>
                                    </div>
                                </div>
                                </div>
                          	</div>
                            <? else: ?>
                            <i style="color:#ccc;">N/A</i>
                            <? endif; ?>
                    	</td>
						<td style=" text-align:left;">
                            <a href="kiosk_model_edit.php?modelid=<?=$fetchMOD->id[$x]; ?>"><b class="b500"><?=$fetchMOD->model_name[$x];?></b></a>
                        </td>
                        <td><b class="b700"><?=$fetchMOD->slot_amount[$x]; ?></b></td>
                        <td><b class="b700"><?=$fetchMOD->placement[$x]; ?></b></td>
                        <td><?=$fetchMOD->description[$x]; ?></td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="kiosk_model_edit.php?modelid=<?=$fetchMOD->id[$x]; ?>"><i class="fa fa-fw fa-pencil"></i></a>
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
					{ "targets": 1, "orderable": false },
					{ "targets": 5, "orderable": false } 
				],
				buttons: [
					{ extend: "csv", className: "btn-sm btn-success" },
					{ extend: "print", className: "btn-sm btn-dark" },
				],
				responsive: true
	}); } };
	TableManageButtons = function() { "use strict"; return { init: function() { handleDataTableButtons(); } }; }();
	TableManageButtons.init();
};
</script>
