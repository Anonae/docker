<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Finance"; 

//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['display']){ $display = $_GET['display']; } else { $display = 25;  }
if($_GET['search']){ $search = $_GET['search']; } else { unset($search);  }   


$dateEnd = strtotime(date('Y-m-d').' 23:59:59');

//Kiosk Balance
$fetchKOS = new  kiosk_balance(); 
if($_GET['search']){
    $fetchKOS->kiosk_id = $_GET['search'];
}
$fetchKOS->loadmany("ORDER BY lastupdate DESC");   
                                 
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
            <li class="breadcrumb-item" aria-current="page"><?=$pageTitle?></li>
            <li class="breadcrumb-item active" aria-current="page">Cash'n Kiosks</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2><b>Cash'n</b> Kiosks</h2>
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
            <p class="text-th">แสดงยอดเงินของตู้กดน้ำ ที่มีเงินคงค้าง 
                <b class="text-green"> <?=$findKOS->totalitems; ?> 
                    <!-- <?=number_format(count($findKOS),0)?> --></b> ตู้
            </p>
            <div class="clearfix"></div>
        </div><!--/x_title-->        
        <div class="x_content">
        
        	<div class="dataTables_wrapper ">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
               <div class="top">
               		<div class="dataTables_filter">
                        <label>Search 
                            <input name="search" class="form-control input-sm" value="<?=$search?>" onchange="this.form.submit()" placeholder="KioskID"/>
                        </label>
                    </div>
                    <? $findKOS = $fetchKOS; $page_show = $display; $total_record = count($fetchKOS); ?>
                    <?php require_once('inc_pagination.php'); ?>
                </div>
            </form>
            </div>
        
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th style=" text-align:left;">รหัสตู้กดน้ำ</th>
                        <th style=" text-align:right;">ยอดรายรับ ภายในตู้</th>
                        <th style=" text-align:left;">เส้นทางเดินรถ</th>
                        <th style=" text-align:left;">บริเวณ</th> 
                        <th>เวลาขายสินค้าล่าสุด</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php 	
                    //bypass kiosk()
                    $useKIOS = new kiosk(); $useKIOS->status = 1; $useKIOS->loadmany(); 
                    $useKIOS->route = array_combine($useKIOS->id,$useKIOS->routeid); // vd($useKIOS->route); die;
                    $useKIOS->tcpcode = array_combine($useKIOS->id,$useKIOS->tcpcode);
                    $useKIOS->name = array_combine($useKIOS->id,$useKIOS->name);

                    //bypass route()
                    $useROT = new route(); $useROT->loadmany(); 
                    $useROT->name = array_combine($useROT->id,$useROT->route_name); // vd($useROT->name); die;
                    $useROT->area = array_combine($useROT->id,$useROT->area);

                    for ($x = 0; $x < $findKOS->totalitems; $x++) :
						if($findKOS->kiosk_id) :
                    ?>
                        <tr id="kosid_<?=$findKOS->kiosk_id[$x];?>">
                            <td>
                                <strong><?=$useKIOS->tcpcode[$findKOS->kiosk_id[$x]]; ?> </strong>( <?=$useKIOS->name[$findKOS->kiosk_id[$x]]; ?> )                               
                            </td>
                            <td class="text-right">
                            	<b style="color:#26B99A; font-weight:700;"><?= number_format($findKOS->total_amount[$x] - $findKOS->total_change[$x],0);?></b>
                                <small class="unit" style="color:#ccc; font-size:11px; font-weight:300;">THB</small>
                            </td>
                            <td> </td>
                            <td> </td>
                            
                            <td> <?= date('Y-m-d H:i:s',$findKOS->lastupdate[$x]); ?></td>                       
                        </tr>
                     <? else : ?>
                        <tr>
                            <td colspan="14" class="noData"><i>No Data !!!</i></td>
                        </tr>
                    <? endif; endfor; ?>

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
