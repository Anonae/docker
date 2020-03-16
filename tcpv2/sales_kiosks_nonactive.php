<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Last-Active Kiosks"; 
//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['display']){ $display = $_GET['display']; } else { $display = 25;  }
if($_GET['search']){ $search = $_GET['search']; } else { unset($search);  } 
if($_GET['sleepover']){ $sleepover = $_GET['sleepover']; } else { unset($sleepover);  } 
//Set Date for Query
$dateStart = strtotime($datefrom.' 00:00:00');
$dateEnd = strtotime($date.' 23:59:59');

//Transaction.
$sqlTRN = " SELECT kiosk_id, max(time_update) AS lasttime, MAX(id) AS id";
$sqlTRN .= " FROM transaction_buy";
$sqlTRN .= " WHERE status = 0";
	if($_GET['sleepover']){ $sqlTRN .= " AND time_update BETWEEN {$dateStart} AND {$dateEnd}"; }
$sqlTRN .= " GROUP BY kiosk_id";

// echo $sqlTRN;
$resultTRN = ROOT::query($sqlTRN);
while($rowTRN = mysqli_fetch_array($resultTRN,MYSQLI_ASSOC)){ $fetchTRN[] = $rowTRN; };  //vd($fetchTRN); die;

$dateLasttime = "2007-03-24 11:00:00";
$datePresent = date('Y-m-d H:i:s');



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
            <li class="breadcrumb-item"><a href="transaction_lists.php">Sales</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$pageTitle?></li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->

<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2><?=$pageTitle?> 
            	<!--
            	<span style="font-size:15px;">on 
                    <b class="text-green"><?=($datefrom)?$datefrom:''?></b> to <b class="text-green"><?=($date)?$date:''?></b>
                </span>
                -->
            </h2>
        </div><!--/col-->     
        <div class="col-md-4 col-sm-4 col-xs-12" style="display:none;">
            <div class="dataTables_wrapper">
                <div class="dataTables_custom" style=" width:100%;">
                    <div class="dateRangePicker topPageDisplay">
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                            <input name="" id="dateRangeTCP" class="form-control mainDatePicker" value="" autocomplete="off" />
                            <input class="form-control input-sm" style="left:34px;" id="datefromClone" value="<?=($datefrom)?$datefrom:''?>"  />
                            <input class="form-control input-sm" style="right:0;" id="dateClone" value="<?=($date)?$date:''?>"  />
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/col--> 
    </div><!--/content-title-->
</div><!--/row-->     

<? /*
<div class="row">  
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel cards cardRank">
            <div class="x_title">
                <p class="text-th">แสดงข้อมูลการใช้งานล่าสุด ของตู้กดน้ำ</p>
                <? if($_GET['kioskid'] || $_GET['productid']){ ?>
                <h5 style="font-size:18px; margin-top:0;">
                	<? if($_GET['kioskid']){ ?>ของตู้กดน้ำ หมายเลข <b class="text-green"><?=$_GET['kioskid']?><? } ?></b>
                    <?php if($_GET['productid']){ ?>
                    	<? for($x = 0; $x < count($loadPRD); $x++){ if($_GET['productid'] == $loadPRD[$x]->id){ $product_name = $loadPRD[$x]->product_name; } } ?>
                    	เฉพาะสินค้า  <span style="color:#ccc;">(<?=$_GET['productid']?>)</span> <b class="text-green"><?=$product_name?></b>
					<? } ?>
                </h5>
                <? } ?>
                <p class="text-help">
                	ที่ไม่มีการทำรายการ นานเกิน <b class="text-green"><?=$sleepover?></b>
                    รวมทั้งหมด <b class="text-green"><?=number_format(count($fetchTRN),0)?></b> รายการ
                </p>
            </div>
            <div class="x_content">
				<div class="dataTables_wrapper">
                <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:0;">
                    <div class="top">
                        <div class="">
                        	<span style="display:inline-block; float:left; margin-right:5px; margin-top:5px; font-weight:700; color:#000; font-size:16px;">แสดงเฉพาะ ตู้กดน้ำ <span style="color:red;">ที่ไม่มีการทำรายการ นานเกิน</span></span>
                            <div class="input-group input-group-sm" style="width:250px; margin-bottom:0;">
                            	<input type="number" name="lowlimit" class="form-control input-sm" value="<?=$sleepover?>" style="border-color: #ddd; height:32px; text-align:right; padding: 0; font-size: 18px; line-height: 32px;" min="0" step="1" />
                                <label class="input-group-addon" style="border-left:none; padding-top: 7px; font-size: 13px; line-height:18px;">ชั่วโมง</label>
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-default btn-primary" style="height:32px; font-size:13px; font-weight:400; padding-top: 7px; ">ตรวจสอบ</button>
                                </span>
                            </div>
                        </div>
                    </div><!--/top-->
                </form>
            	</div>
            </div><!--/x_content--> 
		</div><!--/x_panel--> 
	</div><!--/col-md-12-->
</div><!--/row--> 
*/ ?>

<div class="row">
	<!--Daily Details-->
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel cards cardRank">
        	<div class="x_title">
                <p class="text-th">แสดงข้อมูลการใช้งานล่าสุด ของตู้กดน้ำ</p>
			</div>
            <div class="x_content"> 
                <table class="table table-hover tableDateDetails">
                <thead>
                <tr>
                	<th style="text-align:left;">ตู้กดน้ำ</th>
                    <th style="text-align:left; border-left:1px solid #ddd">เส้นทางเดินรถ</th>
                    <th style="text-align:left;">ครอบคลุมบริเวณ</th>
                    <th style="text-align:left; border-left:1px solid #ddd">ซื้อสินค้าล่าสุด</th>
                    <th style="text-align:left;">ผ่านมาแล้ว</th>
                    <th style="text-align:left; border-left:1px solid #ddd">Check-in ล่าสุด</th>
				</tr>
                </thead>
                <tbody>
                <style type="text/css"> 
					.tableDateDetails tr.disabled { filter: grayscale(1); opacity:0.3;}
					.tableDateDetails tr.disabled:hover { background-color:inherit;}
					.tableDateDetails .unit { font-size:11px; font-weight:300; color:#ccc; padding-left:3px;} 
                </style>
                
                                <?php 	//Transaction SYNC /////////////////////////////////////////////////////////////
                                    $useSYNC = new transaction_buy ();
                                    $useSYNC->status = "!# IN(0) #!";   // เดิมเป็น 3
                                    $sync_sql = " GROUP BY kiosk_id, status"; 
                                    $useSYNC->loadmany($sync_sql,"","","kiosk_id, status, MAX(time_update) AS lasttime, MAX(id) AS id"); //$useSYNC->track(); die;
                                    $useSYNC->lasttime = array_combine($useSYNC->kiosk_id,$useSYNC->lasttime); 
                                    //track($useSYNC);

                                    //Bypass Kiosk
                                    $useKIOS = new kiosk();  $useKIOS->status =1; $useKIOS->loadmany(); //track($useKIOS);
                                    $useKIOS->tcpcode = array_combine($useKIOS->id,$useKIOS->tcpcode); 
                                    $useKIOS->name = array_combine($useKIOS->id,$useKIOS->name); 
                                    
                                    $findROT = new route(); $findROT->loadmany(); 
                                    
                                    $useROT->name = array_combine($findROT->id,$findROT->route_name);
                                    $useROT->area = array_combine($findROT->id,$findROT->area);
				?>
				<? 	$bestSOLDINDEX = 0;
				        for($x=0; $x < count($fetchTRN); $x++) : 
				?>
				<tr id="trID_<?=$fetchTRN[$x][id]?>">
                    <td style="text-align:left;">
                        <b style="font-weight:500; color:#000;"><?=($useKIOS->tcpcode[$fetchTRN[$x][kiosk_id]])?$useKIOS->tcpcode[$fetchTRN[$x][kiosk_id]]:$fetchTRN[$x][kiosk_id];?></b>
                        <span>( <?=($useKIOS->name[$fetchTRN[$x][kiosk_id]])?$useKIOS->name[$fetchTRN[$x][kiosk_id]]:'';?> )</span>
                    </td>

                    <td style="border-left:1px solid #ddd;"><?=$useROT->name[$bestSOLD[$x][routeid]]?></td>
                    <td style=""><?=$useROT->area[$bestSOLD[$x][routeid]]?></td>
                    
                    <td style="border-left:1px solid #ddd;"><?=date('Y-m-d H:i:s', $fetchTRN[$x][lasttime])?></td>
                    <td>
					<? $start_date = new DateTime(date('Y-m-d H:i:s', $fetchTRN[$x][lasttime])); $end_date = new DateTime(date("Y-m-d H:i:s")); $duration = date_diff($end_date, $start_date); ?>
                    <span style=" <? if($duration->m.$duration->d.$duration->h >= 3){ echo "font-weight:700; color:#fd1c00;";} elseif($duration->m.$duration->d.$duration->h >= 1){ echo "font-weight:500; color:orange;";} else { echo "font-weight:500; color:#5cb85c;"; } ?> ">
                    <? if($duration->m.$duration->d.$duration->h.$duration->i >= 1) : ?>
						<?=($duration->m)?$duration->m.' เดือน ':'';?>
                        <?=($duration->d)?$duration->d.' วัน ':'';?>
                        <?=($duration->h)?$duration->h.' ชั่วโมง ':'';?>
                        <?=($duration->i)?$duration->i.' นาที ':'';?>
                    <? elseif($duration->m.$duration->d.$duration->h.$duration->i <= 0) : ?>
                    	<?=($duration->s)?"ไม่ถึงนาที":'';?>
                    <? endif; ?>    
                    </span>
                    </td>
                    <td style="border-left:1px solid #ddd;">						
                      <span style="color:#5cb85c; font-weight:500;"><?=date('Y-m-d H:i:s', $useSYNC->lasttime[$fetchTRN[$x][kiosk_id]])?></span>
                    </td>

				</tr>
				<? endfor; ?>
                </tbody>
                </table>
            </div><!--/x_content-->
        </div><!--/x_panel-->
    </div><!--/col-->
</div><!--/row-->

<!-- // End Content on PAGE /////////////////////////////////////////////////////// -->

</div><!-- /right_col -->
<?php require_once('inc_footer.php'); ?>
</div><!-- /main_container -->
</div><!-- /container -->
<?php require_once('inc_footer_script.php'); ?>	
</body>
</html>