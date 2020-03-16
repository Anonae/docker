<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Kiosks"; 
//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['display']){ $display = $_GET['display']; } else { $display = 25;  }
if($_GET['search']){ $search = $_GET['search']; } else { unset($search);  }

//Kiosk
$fetchKOS = new kiosk();
$fetchKOS->status = 1;
	//SQL Query
	if($search){ $sql .= " AND (`location` LIKE '%{$search}%' OR `description` LIKE '%{$search}%')";}
$fetchKOS->loadmany(" {$sql} ORDER BY `id` ASC", $display, $page);

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
	Kiosk ID <b><?=$_GET['kioskid']?></b>, has been added <b>Successful</b>.
    <i style="margin-left:10px; color:rgba(255,255,255,0.5);">on <?=$_GET['when']?> by <?=$_GET['bywho']?></i>
</div>
<? } ?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">แสดงรายการ ตู้กดน้ำ ทั้งหมด <b class="text-green"><?=$fetchKOS->totalrecords?></b> ตู้</p>
            <? if($_SESSION['permission']<3) : ?>
            <div class="nav navbar-right"><a href="kiosk_add.php" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Add New Kiosk</a></div>
            <? endif ?>
            <div class="clearfix"></div>
        </div><!--/x_title-->        
        <div class="x_content">
        
        	<div class="dataTables_wrapper">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
               <div class="top">
               		<div class="dataTables_filter">
                        <label>Search 
                            <input name="search" class="form-control input-sm" value="<?=$search?>" onchange="this.form.submit()" />
                        </label>
                    </div>
                    <? $findKOS = $fetchKOS; $page_show = $display; $total_record = $findKOS->totalrecords; ?>
                    <?php require_once('inc_pagination.php'); ?>
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
                <? 	//bypass model()
                            $useMOD = new kiosk_model(); $useMOD->loadmany(); 
                            $useMOD->name = array_combine($useMOD->id,$useMOD->model_name); //vd($useROT->name); die;
                            //bypass route()
                            $useROT = new route(); $useROT->loadmany(); 
                            $useROT->name = array_combine($useROT->id,$useROT->name); //vd($useROT->name); die;
                            $useROT->area = array_combine($useROT->id,$useROT->area);
				?>
                <? if($findKOS->totalrecords != 0): ?>
                <? for ($x = 0; $x < $findKOS->totalitems; $x++) :  ?>
                    <tr>
                    	<td style=" text-align:left;"><?=$useMOD->name[$findKOS->modelid[$x]]?></td>
						<td style=" text-align:left;">
                            <a href="kiosk_view.php?kioskid=<?=$findKOS->id[$x]; ?>"><b class="b700"><?=($findKOS->tcpcode[$x])?$findKOS->tcpcode[$x]:$findKOS->id[$x]?></b></a>
                        </td>
                        <td><?=$findKOS->name[$x]; ?></td> 
                        <td style=" text-align:left;"><?=$useROT->name[$findKOS->routeid[$x]]?></td>
                        <? /*<td><b class="b500"><?=$findKOS->location[$x];?></b></td>
                        <td><a href="https://www.google.co.th/maps/search/<?=str_pad($findKOS->latitude[$x], 9, '0', STR_PAD_RIGHT);?>,<?=str_pad($findKOS->longitude[$x], 9, '0', STR_PAD_RIGHT);?>" target="_blank"><?=$findKOS->latitude[$x];?>, <?=$findKOS->longitude[$x];?></a>
                        </td>*/ ?>
                        <td><?=$findKOS->description[$x]; ?></td> 
                        <td style=" text-align:center;"><a class="btn btn-silver btn-xs" title="edit" href="kiosk_edit.php?kioskid=<?=$findKOS->id[$x]; ?>"><i class="fa fa-fw fa-pencil"></i></a></td>
                    </tr>
                <? endfor; ?>
                <? else: ?>
                	<tr><td colspan="8" class="noData"><i>No Data !!!</i></td></tr>
                <? endif; ?>
                </tbody>
            </table>
            <div class="dataTables_wrapper">
            	<div class="bottom">
					<?= $pagination_pattern ?>
                	<div class="dataTables_info">Showing <?=number_format($record_start+1,0)?> to <?=($record_end>$total_record)?number_format($total_record,0):number_format($record_end,0)?> of <?=number_format($total_record,0)?> entries</div>
                </div>
            </div>
            
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
