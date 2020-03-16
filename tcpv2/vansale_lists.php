<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "VanSales"; 
//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['routeid']){ $routeid = $_GET['routeid']; } else { unset($routeid);  }
if($_GET['kioskid']){ $kioskid = $_GET['kioskid']; } else { unset($kioskid);  }
if($_GET['productid']){ $productid = $_GET['productid']; } else { unset($productid);  }
if($_GET['display']){ $display = $_GET['display']; } else { $display = 25;  }
if($_GET['datefrom']){ $datefrom = $_GET['datefrom']; } else { $datefrom = date('Y-m').'-01';  } //default set to first Day of this month
if($_GET['date']){ $date = $_GET['date']; } else { $date = date('Y-m-t');  }  //default set to last Day of this month
if($_GET['onhour']){ $onhour = $_GET['onhour']; } else { unset($onhour);  }  //default set to 24 hour of this month
if($_GET['search']){ $search = $_GET['search']; } else { unset($search);  }
//Set Date for Query
$dateStart = strtotime($datefrom.' 00:00:00');
$dateEnd = strtotime($date.' 23:59:59');

//Category
$fetchVAN = new vansale();
$fetchVAN->status = 0;
	//SQL Query
	$sql = "";
	if($search){ $sql .= " AND (`name` LIKE '%{$search}%' OR `description` LIKE '%{$search}%')"; }
$fetchVAN->loadmany(" {$sql} ORDER BY license ASC", $display, $page);

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
	VanSale ID <b><?=$_GET['vanid']?></b>, has been <?=$_GET['result']?> <b>Successful</b>.
    <i style="margin-left:10px; color:rgba(255,255,255,0.5);">on <?=$_GET['when']?> by <?=$_GET['bywho']?></i>
</div>
<? } ?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">แสดงรายการ รถยนต์ขนสินค้า ทั้งหมด <b class="text-green"><?=number_format($fetchVAN->totalrecords,0)?></b> คัน</p>
            <div class="nav navbar-right"><a href="vansale_add.php" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Add New VanSales</a></div>
        </div><!--/x_title-->
        <div class="x_content">
            
            <div class="dataTables_wrapper">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
                
               <div class="top">
               		<div class="dataTables_filter">
                        <label>Search 
                            <input type="text" id="search" name="search" class="form-control input-sm autoFilter" placeholder="<?=$search?>" onchange="this.form.submit()" />
                        </label>
                    </div>

                    <? $findVAN = $fetchVAN; $page_show = $display; $total_record = $fetchVAN->totalrecords; ?>
                    <?php require_once('inc_pagination.php'); ?>
                </div>
            </form>
            </div>
            
            <style type="text/css">
			 	.table>thead>tr>th.topupCB { text-align:center; width:35px;}
			</style>
            <table id="" class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th rowspan="1">#</th>
                        <th rowspan="1">Van Name</th>
                        <th rowspan="1">License</th>
                        <th rowspan="1">Route</th>
                        <th rowspan="1">Area</th>
                        <th rowspan="1">Description</th>
                        <th rowspan="1">Last Update</th>
                        <th style=" text-align:center;">Action</th>
                </thead>
                
                <tbody>
                <?	//bypass route()
						$useROT = new route(); $useROT->loadmany(); 
						$useROT->name = array_combine($useROT->id,$useROT->name); //vd($useROT->name); die;
						$useROT->area = array_combine($useROT->id,$useROT->area);
                ?>
                <? if($findVAN->totalrecords != 0): ?>
                <? for ($x = 0; $x < $findVAN->totalitems; $x++) : $num = $x+1; ?>
                    <tr id="trROT_<?=$findVAN->id[$x];?>">
                    
                        <td class="ordinal"><?=$findVAN->id[$x];?></td>
                        <td><a href="vansale_edit.php?vanid=<?=$findVAN->id[$x]; ?>"><b class="b500"><?=$findVAN->name[$x]; ?></b></a></td>
                        <td><?=$findVAN->license[$x];?></td>
                        <td><?=$useROT->name[$findVAN->routeid[$x]]?></td>
                        <td><?=$useROT->area[$findVAN->routeid[$x]]?></td>
                        <td><?=$findVAN->description[$x];?></td>
                        <td><?=date('Y-m-d H:i:s',$findVAN->lastupdate[$x]);?></td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="vansale_edit.php?vanid=<?=$findVAN->id[$x]; ?>"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                <? endfor; ?>
                <? else: ?>
                	<tr><td colspan="6" class="noData"><i>No Data !!!</i></td></tr>
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
