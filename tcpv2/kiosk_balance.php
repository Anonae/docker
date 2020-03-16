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
$dateEnd = strtotime(date('Y-m-d').' 23:59:59');

$sqlA = "
	SELECT trn.kioskid, okt.opentime, SUM(trn.price) AS sumprice, COUNT(trn.price) AS countprice
	FROM kiosk_inventory_transactions AS trn
	INNER JOIN (
		SELECT kioskid, MAX(lastupdate) AS opentime
		FROM redbull.iot_transactions AS iot
		WHERE refill = 1 
		GROUP BY kioskid
		ORDER BY opentime DESC
		) AS okt 
	ON trn.kioskid = okt.kioskid 
	WHERE trn.status = 0 AND trn.lastupdate BETWEEN okt.opentime AND {$dateEnd}
	GROUP BY trn.kioskid
	ORDER BY sumprice DESC
	";
$res = ROOT::query($sqlA);
while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){ $fetchTRN[] = $row; }  //vd($fetchTRN); die;

////////////////////////////////////////////////////////////////////////
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
            <li class="breadcrumb-item active" aria-current="page"><?=$pageTitle?> Balance</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2><b>Cash'n</b> <?=$pageTitle?></h2>
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
            <p class="text-th">แสดงยอดเงินของตู้กดน้ำ ที่มีเงินคงค้าง <b class="text-green"><?=number_format(count($fetchTRN),0)?></b> ตู้</p>
            <div class="clearfix"></div>
        </div><!--/x_title-->        
        <div class="x_content">
        
        	<div class="dataTables_wrapper ">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
               <div class="top">
               		<div class="dataTables_filter">
                        <label>Search 
                            <input name="search" class="form-control input-sm" value="<?=$search?>" onchange="this.form.submit()" />
                        </label>
                    </div>
                    <? $findKOS = $fetchKOS; $page_show = $display; $total_record = count($fetchTRN); ?>
                    <?php require_once('inc_pagination.php'); ?>
                </div>
            </form>
            </div>
        
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th style=" text-align:left;">Kiosk</th>
                        <th style=" text-align:left;">Route</th>
                        <th style=" text-align:left;">Cover Area</th> 
                        <th style="width:100px; text-align:right;">Cash <small style="color:#ccc;">(THB)</small></th>
                        <th style="text-align:right;">Records</th>
                        <th>Last Open Kiosk</th>
                    </tr>
                </thead>
                
                <tbody>
				<? 	//bypass kiosk()
						$useKOS = new kiosk(); $useKOS->loadmany(); 
						$useKOS->route = array_combine($useKOS->id,$useKOS->routeid); //vd($useKOS->route); die;
						//bypass route()
						$useROT = new route(); $useROT->loadmany(); 
						$useROT->name = array_combine($useROT->id,$useROT->route_name); //vd($useROT->name); die;
						$useROT->area = array_combine($useROT->id,$useROT->area);
				?>
                <? if(count($fetchTRN) != 0): ?>
                <? for ($x = $record_start; $x < min($record_start+$page_show, $total_record); $x++) : $num = $x+1; ?>
                    <tr id="kosid_<?=$fetchTRN[$x][kioskid]?>">
						<td style=" text-align:left;">
                            <a href="kiosk_view.php?kioskid=<?=$fetchTRN[$x][kioskid]?>" title="<?=$fetchTRN[$x][location];?>">
                            	<b class="b700">Kos<?=str_pad($fetchTRN[$x][kioskid],3,"0",STR_PAD_LEFT);?></b>
                            </a>
                        </td>
                        <td style=" text-align:left"><?=$useROT->name[$useKOS->route[$fetchTRN[$x][kioskid]]]?></td>
                        <td style=" text-align:left"><?=$useROT->area[$useKOS->route[$fetchTRN[$x][kioskid]]]?></td>
                        <td style=" text-align:right"><b class="b700  text-green"><?=number_format($fetchTRN[$x][sumprice],0);?></b></td>
                        <td style="text-align:right">
                        	<a href="transaction_lists.php?kioskid=<?=$fetchTRN[$x][kioskid]?>&okt=<?=$dateStart?>" target="_blank">
								<?=number_format($fetchTRN[$x][countprice],0);?>
                            </a>
                        </td>  
                        <td id="openTime_<?=$fetchTRN[$x][opentime]?>"><?=date('Y-m-d H:i:s',$fetchTRN[$x][opentime])?></td>
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
            
            <div style="color:red; display:inline-table; width:100%; margin-top:15px;">* แสดงเฉพาะตู้กดน้ำที่มียอดเงินคงค้างภายในตู้เท่านั้น</div>
            
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
