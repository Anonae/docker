<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Kiosks"; 
$turnFadein = "Yes";

//GET
$kioskid = $_GET["kioskid"] ;

// Insert Data
if($_POST['action']=='setupSLOT'){ 
	$updateSLOT = new slot();
	if($_POST['kioskInventoryID']){
		$updateSLOT->id = $_POST['kioskInventoryID']; 
		if($updateSLOT->load()){
			if($_POST["fill_qty"]==0){
				// Update Data Only
				$updateSLOT->capacity = $_POST["capacity"];
				$updateSLOT->remain = $_POST["current_qty"]; 
				$updateSLOT->price = $_POST["price"];
				$updateSLOT->price_retail = $_POST["retail"];
				$updateSLOT->status = 0;
				$updateSLOT->time_update = time(); 
				$updateID = $updateSLOT->write();
			}else{
				// 1.Update Inventory /////////////////////////////////////////
				$updateSLOT->productid = $_POST["productid"]; 
				$updateSLOT->capacity = $_POST["capacity"];
				$updateSLOT->remain = ($_POST["current_qty"]+$_POST["fill_qty"]); 
				$updateSLOT->price = $_POST["price"];
				if($_POST["retail"] == $_POST["price"]){  $updateSLOT->price_retail = 0;
				}else{  $updateSLOT->price_retail = $_POST["retail"];
				}
				$updateSLOT->status = 0;
				$updateSLOT->time_update = time(date('Y-m-d H:i:s')); 
				$updateID = $updateSLOT->write();
				// 2.Create Log
				if($updateID){
					$insert = new slot_log();
					$insert->slot_refid = $_POST['kioskInventoryID'];
					$insert->buy_refid = 0;
					$insert->kiosk_id = $_GET["kioskid"];
					$insert->slot_id = $_POST["slotid"];
					$insert->prd_id = $_POST["productid"];
					$insert->capacity = $_POST["capacity"];
					$insert->remain = ($_POST["current_qty"]); 
					$insert->quantity = $_POST['fill_qty'];
					$insert->action = 'fill';
					$insert->status = 0;
					$insert->bywho = '('.$_SESSION['userid'].') '.$_SESSION['username'];
					$insert->lastupdate = time();
					$insert->write();
					$resultAction = 'updateSLOT';
				} //$_POST["fill_qty"]!=0
			} //$updateSLOT->load()
		} //else $updateSLOT->load()
	}else{ // $_POST['kioskInventoryID']
		$updateSLOT->kioskid = $_GET['kioskid']; 
		$updateSLOT->slotid = $_POST['slotid']; 
		$updateSLOT->load();
		if($updateSLOT->productid!=NULL && $updateSLOT->status!=0){
			$updateSLOT->productid = $_POST["productid"]; 
			$updateSLOT->price = $_POST["price"];
				if($_POST["retail"] == $_POST["price"]){  $updateSLOT->price_retail = 0;
				}else{  $updateSLOT->price_retail = $_POST["retail"]; 
				}
			$updateSLOT->capacity = $_POST["capacity"]; 
			$updateSLOT->remain = ($_POST["current_qty"]+$_POST["fill_qty"]); 
			$updateSLOT->status = 0;
			$updateSLOT->time_update = time();
			$updateID = $updateSLOT->write();
			// 2.Create Log
			if($updateID){
				$insertDEL = new slot_log();
				$insertDEL->slot_refid = $updateID;
				$insertDEL->buy_refid = 0;
				$insertDEL->kiosk_id = $_GET['kioskid']; 
				$insertDEL->slot_id = $_POST['slotid'];
				$insertDEL->prd_id =  $_POST["productid"];
				$insertDEL->capacity = $_POST["capacity"];
				$insertDEL->remain = 0;
				$insertDEL->action = 'setup';
				$insertDEL->quantity = $_POST["fill_qty"]; 
				$insertDEL->status = 0;
				$insertDEL->bywho = '('.$_SESSION['userid'].') '.$_SESSION['username'];
				$insertDEL->lastupdate = time();
				$insertDEL->write();
				$resultAction = 'updateSLOT';
			} // if($updateID)
		}else{ // if($updateSLOT->productid)
			$addSLOT = new slot();
			$addSLOT->id = NULL; 
			$addSLOT->kioskid = $_GET["kioskid"];
			$addSLOT->slotid = $_POST["slotid"];
			$addSLOT->productid = $_POST["productid"]; 
			$addSLOT->capacity = $_POST["capacity"]; 
			$addSLOT->remain = $_POST["fill_qty"];
				// Find Price
				$findPRD = new product();
				$findPRD->id = $_POST["productid"];
				$findPRD->load();
			$addSLOT->price = $_POST['price']; // ใช้ราคาจากข้อมูล db table 'product'
			$addSLOT->price_retail = $_POST['retail'];
			$addSLOT->status = 0;
			$addSLOT->time_create = time(date('Y-m-d H:i:s'));
			$addSLOT->time_update = time(date('Y-m-d H:i:s'));
			$addSLOTID = $addSLOT->write();
			// 2.Create Log
			if($addSLOTID){

			} // if($addSLOTID)	
		} // if($_POST['existSLOT'])
	} // $_POST['kioskInventoryID']
}  //////////////////////////////////////////////////////////////////////////////////
if($_POST['action']=='delSLOT'){ 
	$updateDEL = new slot();
	$updateDEL->id = $_POST['slot_refid']; 
	if($updateDEL->load()){ 
		// 1.Update Inventory
		$updateDEL->status = 1; //Status 1 ถือว่า ลบไป ไม่ใช้งาน
		$updateDEL->time_update = time(date('Y-m-d H:i:s')); 
		$updateID = $updateDEL->write();
		// 2.Create Del Log
		if($updateID){
			$insertDEL = new slot_log();
			$insertDEL->slot_refid = $updateDEL->id;
			$insertDEL->buy_refid = 0;
			$insertDEL->kiosk_id = $updateDEL->kioskid;
			$insertDEL->slot_id = $updateDEL->slotid;
			$insertDEL->prd_id = $updateDEL->productid;
			$insertDEL->capacity = $updateDEL->capacity;
			$insertDEL->remain = 0;
			$insertDEL->action = 'remove';
			$insertDEL->quantity = $_POST["quantity"];
			$insertDEL->status = 0;
			$insertDEL->bywho = '('.$_SESSION['userid'].') '.$_SESSION['username'];
			$insertDEL->lastupdate = time(date('Y-m-d H:i:s'));
			$insertDEL->write();
			$resultAction = 'updateDEL';
		}
	}
}  //////////////////////////////////////////////////////////////////////////////////

  
//Kiosk Single
$loadKOS = new kiosk();
$loadKOS->id = $_GET["kioskid"];
$loadKOS->load();
//Kiosk Model
$loadMOD = new kiosk_model();
$loadMOD->id = $loadKOS->modelid;
$loadMOD->load();
	//Product Bypass
	$usePRD = new product(); $usePRD->loadmany(); 
	$usePRD->name = array_combine($usePRD->id,$usePRD->product_name);
	$usePRD->price = array_combine($usePRD->id,$usePRD->init_price);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('inc_head.php'); ?>	
    <title><?=$pageTitle?>, <?=$siteTitle?></title>
<?php require_once('inc_head_href.php'); ?>	
</head>

<body class="nav-md" onload="readyShow();">
<div class="container body">
<div class="main_container">
<?php require_once('inc_menu_main.php'); ?>	
<div class="right_col" role="main">	
    <!--start Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" >
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="kiosk_lists.php"><?=$pageTitle?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Kiosk <?=($loadKOS->tcpcode)?$loadKOS->tcpcode:$loadKOS->id;?></li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Kiosk <b><?=($loadKOS->tcpcode)?$loadKOS->tcpcode:$loadKOS->id;?></b> 
				<? if($loadKOS->description){ ?><small style="font-size:16px; margin-left:10px;">( <?=$loadKOS->description?> )</small><? } ?>
            </h2>
        </div><!--/col-->    
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="dataTables_wrapper">
            <form method="GET">
                <div class="dataTables_custom" style="width:100%;">
                	<div class="dateMonthPicker">
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="fa fa-fw fa-building-o"></i></span>
                            <select id="kioskid" name="kioskid" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;" onchange="this.form.submit()">
                            <? $findKOS = new kiosk(); $findKOS->status = 1; $findKOS->loadmany(); ?>
                            <? for($xKos = 0; $xKos < $findKOS->totalrecords; $xKos++): ?>
                                <option data-content="<b><?=($findKOS->tcpcode[$xKos])?$findKOS->tcpcode[$xKos]:$findKOS->id[$xKos];?></b> <span style='font-weight:400;'>( <?=$findKOS->name[$xKos];?> )</span>" value="<?=$findKOS->id[$xKos]?>" <?=($findKOS->id[$xKos] == $_GET['kioskid'])?'selected':''?>><?=$findKOS->id[$xKos]?></option>
                            <? endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div><!--/col-->  
    </div><!--/content-title-->
</div><!--/row-->  

<? if($resultSuperpass == 'รหัสไม่ถูกต้อง'){ ?>
<div class="alert alert-danger alert-dismissible fade in" role="alert" style="margin-bottom: 15px;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></button>
    <div style="font-size:18px; color:#fff; font-weight:600;"><?=$resultSuperpass?></div>
</div>
<? }elseif($resultSuperpass == 'ผ่าน'){ ?>
<div class="alert alert-success alert-dismissible fade in" role="alert" style="margin-bottom: 15px;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></button>
    <div style="font-size:18px;">
    	<span style="margin-right:10px;">Kiosk ID <b><?=$_POST['fillkioskid']?></b>, </span>
        has been Auto Refill and Balance Reset <b style="font-weight:700;">Successful</b>.
        <i style="margin-left:10px; color:rgba(255,255,255,0.5); font-size:13px;">on <?=$_POST['when']?> by <?=$_POST['bywho']?></i>
    </div>
</div>
<? } ?>

<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12" style=" padding-right:30px;">
    	<?	//Find OpenKioskTime aka OKT
				$findReset = new kiosk_balance();
				$findReset->kiosk_id = $_GET['kioskid'];
				$findReset->load();
				//Calc
				$profit = ($findReset->total_amount - $findReset->total_change);
		?> 
        <style type="text/css">
			.table-showmoney>tbody>tr>td { font-size:14px; font-weight:400; line-height:20px; padding:8px; border-top: 1px dotted #ddd;} 
			.table-showmoney>tbody>tr td:nth-child(2) { text-align:right;}
        </style>
    	<table class="table table-condensed table-showmoney">
        <tbody>
        	<tr>
            	<td style="border-top:none;">ยอดเงินคงเหลือภายในตู้</td>
            	<td style="border-top:none;">
                	<b class="text-green" style=" font-size:1.6em; font-weight:700;"><?=number_format($profit,0)?></b> 
                	<span style="color:#ccc;">บาท</span>
                </td>
            </tr>
            <? if($findReset->lastupdate) { ?>
            <tr>
            	<td>เปิดตู้กดน้ำ เก็บเงิน/เติมสินค้า ล่าสุด</td>
                <td>วันที่ <b class="b600"><?=date('Y-m-d',$findReset->lastupdate)?></b> ณ เวลา <b class="b600"><?=date('H:i:s',$findReset->lastupdate)?></b></td>
            </tr>
            <? } ?>
        </tbody>
        </table>
        
        <div class="btn-group" style="float:left; ">
        	<? if($_SESSION['permission']<3) {  ?>
            <a href="slot_autofill.php?kioskid=<?=$_GET['kioskid']?>" target="_blank" class="btn btn-silver btn-sm" style="font-weight:600; font-size:15px;">
            	<i class="fa fa-fw fa-download"></i> เติมสินค้าและรีเซ็ตยอดเงิน
            </a>
            <? } ?>
        </div>
    </div><!--/col-->
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<div class="x_panel" style="padding:0;">
            <div class="x_content">
            	<div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                    	<table class="table" style="margin-bottom:0;">
                        <tbody>
                        	<? if(empty($loadMOD)) : ?>
                            <tr>
                            <td colspan="2" style="border-top:none; color:red;">
                            	<i>ไม่พบรุ่นตู้กดน้ำ</i>
                                <a href="kiosk_edit.php?kioskid=<?=$_GET['kioskid']?>" class="btn btn-default btn-silver" style="float:right; font-size:13px; margin:-1px 0;">Edit</a>
                            </td>
                            </tr>
                            <? else : ?>
                            <tr id="modelID_<?=$loadKOS->modelid;?>">
                            	<td style="border-top:none; width:100px;">ตู้กดน้ำรุ่น</td>
                            	<td style="border-top:none;">
                                	<b style="font-size:16px;"><?=$loadMOD->model_name;?></b>
                                </td>
                            </tr>
                            <tr><td>หน้าตู้วางสินค้า</td><td><b>30</b> ตำแหน่ง</td></tr>
                            <tr>
                            	<td>ช่องเก็บสินค้า</td>
                                <? $findSLOT = new slot(); $findSLOT->kioskid = $_GET['kioskid']; $findSLOT->status = 0; $findSLOT->loadmany(); ?>
                                <td><b><?=$loadMOD->slot_amount;?></b> ช่อง <span style="color:#ccc;">/ <?=$findSLOT->totalrecords;?></span> ข้อมูล 
                                	<? if($loadMOD->slot_amount == $findSLOT->totalrecords) : ?><i class="fa fa-fw fa-check text-green"></i>
                                    <? else : ?><i class="fa fa-fw fa-close text-red" title="ตรวจพบข้อมูลเก็บสินค้า เกินช่องสินค้าของตู้กดน้ำรุ่นดังกล่าว"></i>
                                    <? endif; ?>
                                    <? if($_SESSION['permission']<3) { ?>
                                    <a href="kiosk_edit.php?kioskid=<?=$_GET['kioskid']?>" class="btn btn-default btn-silver" style="float:right; font-size:13px; margin:-1px 0;">Edit</a>
                                    <? } ?>
                                </td>
                            </tr>
                            <? endif; ?>
                            <tr><td style="width:100px;">สถานที่ตั้งตู้</td><td style="line-height:18px;"><?=$loadKOS->location;?></td></tr>
                            <tr><td>พิกัด</td><td><?=$loadKOS->latitude;?>, <?=$loadKOS->longitude;?></td></tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <img src="images/redblue_vending_machine.png" class="img-responsive" style="margin: 0 auto; max-height:145px; width:auto; padding:5px 0 0;">
                    </div><!--/col-->
                </div><!--/row-->
            </div><!--/x_content-->
        </div><!--/x_panel-->
    </div><!--/col-->
</div><!--/row-->

<div id="slotbox-wrapper" class="row" style="margin:0 -2px;">
    
    <div class="col-12" style="border-top:2px solid rgba(0,0,0,0.03); padding:10px 2px 10px 2px; display:table; width:100%;">

        <div class="btn-group" style="float:left; ">
            <button class="btn btn-default btn-sm btn-slotshow btn-info" style="font-weight:600; font-size:15px;" onClick="canvasGen()">
            	<i class="fa fa-fw fa-stack-overflow"></i> แสดงตามช่องเก็บสินค้า
            </button>
            <button class="btn btn-default btn-sm btn-kioskshow" style="font-weight:600; font-size:15px;" onClick="kioskGen()">
            	<i class="fa fa-fw fa-building-o"></i> แสดงตามหน้าตู้กดน้ำ
            </button>
        </div>
    </div>
    
	<? if(isset($resultAction)) : ?>
    <div class="alert alert-success alert-dismissible fade in" role="alert" style="margin-bottom: 5px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></button>
        <div style="font-size:13px;">
            <span style="margin-right:10px;">Slot ID <b><?=$_POST['slotid']?></b>, </span>
            <? if($resultAction=='addedSLOT'){ echo 'has been added '; }elseif($resultAction=='updateSLOT'){ echo 'has been updated '; }elseif($resultAction=='updateDEL'){ echo 'has been deleted '; } ?>
            <b style="font-weight:700;">Successful</b>.
            <i style="margin-left:10px; color:rgba(255,255,255,0.5);">on <?=$_POST['when']?> by <?=$_POST['bywho']?></i>
        </div>
    </div>
    <? endif; ?>

</div>

<div id="slotbox-display" class="slotbox-canvas slotshow">  

<? // Kiosk show Slot Query ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if($loadMOD->slot_amount == 25){ $arrModelSlotPlots = array('11', '12', '13', '14', '15'); // จัดการหน้าตู้โชว์ ให้ตรงกับ ช่องเก็บของ 
	}elseif($loadMOD->slot_amount == 30){ $arrModelSlotPlots = array(); }
	// Slot Record
	if($findSLOT->totalrecords < $loadMOD->slot_amount ){ 
		$slotRecord = $loadMOD->slot_amount; 
	}else{ 
		$slotRecord = $findSLOT->totalrecords; 
	} 
						
	//Loop 
	$x=0; $numSLOT = 1;
	//Slot on Kiosk
	$findSLOT =  new slot();
	$findSLOT->kioskid = $_GET["kioskid"];
	$findSLOT->status = 0;
	$findSLOT->loadmany(); 
	while($x < $slotRecord) : $numSLOT = $x+1; // ดึง ข้อมูลเก็บสินค้า เทียบกับ ช่องเก็บสินค้า
		for($xslot=0; $xslot < $findSLOT->totalrecords; $xslot++) : // เพื่อให้ ข้อมูลเก็บสินค้า ตรงกับ ช่องเก็บสินค้า	
			if($findSLOT->slotid[$xslot] == $numSLOT) :
				$loadSLOT[id] = $findSLOT->id[$xslot];
				$loadSLOT[slotid] = $findSLOT->slotid[$xslot];
				$loadSLOT[productid] = $findSLOT->productid[$xslot];
				$loadSLOT[capacity] = $findSLOT->capacity[$xslot];
				$loadSLOT[remain] = $findSLOT->remain[$xslot];
				$loadSLOT[price] = $findSLOT->price[$xslot];
				$loadSLOT[price_retail] = $findSLOT->price_retail[$xslot];
			endif; 
		endfor; //vd($loadSLOT); die;
		if($loadSLOT[slotid] != $numSLOT && $numSLOT < $loadMOD->slot_amount){ $slotRecord++; }
		$x++; 
?>

 	<? if($loadSLOT[slotid] == NULL && $numSLOT > $loadMOD->slot_amount) : // เงื่อนไข ไม่ต้องแสดงข้อมูลสินค้า ที่ไม่มีบันทึก และ เกินมา ?>
    <? else : ?>
    
    <div class="slotbox sr-only" id="loadSLOT_<?=($loadSLOT[slotid])?$loadSLOT[slotid]:$numSLOT;?>">
    <? //echo $loadSLOT[status]; //vd($loadSLOT); ?>
    
    <? if($_SESSION['permission']<3) { ?>
		<? if($numSLOT > $loadMOD->slot_amount): // ตรวจสอบข้อมูลเก็บสินค้า กับ ช่องเก็บสินค้า ?>
            <a class="modalAction actionDel" type="button" data-toggle="modal" data-target=".modalActionDel" onClick="modalDel(this);">
            <div class="bannedText"><b>เกิน</b><br>ช่องเก็บสินค้า<br>ในตู้กดน้ำ</div>    
        <? else: //if(!$loadSLOT[productid]): // ตรวจสอบข้อมูลว่ามีสินค้า หรือไม่? ?>
            <a class="modalAction actionSetup" type="button" data-toggle="modal" data-target=".modalActionSetup" onClick="modalSetup(this);">
        <? endif; ?>
    <? } else { ?>
    	<a class="modalAction actionDel" type="button" data-toggle="" data-target="">
    <? } ?>

        <div class="slotbox-content">
        	<? if($loadSLOT[slotid]==$numSLOT){ ?>
            <b class="slot-number" style="font-weight:700;"><?=$loadSLOT[slotid]?></b>
            <? }else{ ?>
            <b class="slot-number" style="font-weight:400;"><?=$numSLOT?></b>
            <? } ?>
		
			<? $loadPRD = new product(); $loadPRD->id = $loadSLOT[productid]; $loadPRD->load(); //ดึงเฉพาะตัวสินค้า ที่ตรงกับ สินค้าในข้อมูลสินค้า ?>
            
            <? /*if(in_array($loadSLOT[slotid],$arrModelSlotPlots)): // สำหรับ ช่องแสดงผลคู่ //////////////////////// ?>
            <div class="product" style="width:calc(50% - 14px); float:left;">
            	<!--Text when Hover-->
                <? if($loadPRD->id==0){ ?>
                	<div class="hoverText">เพิ่ม</div>
                    <i><?=$loadPRD->id?></i>
                    <img style="min-height:65px;" />
                    <div class="price"><b></b></div>
				<? }else{ ?>
                	<div class="hoverText">ตั้งค่า</div>
                    <i><?=$loadPRD->id?></i>
                    <? if(substr($loadPRD->product_image,0,4) == 'data'): ?>
                        <img src="<?=$loadPRD->product_image?>" title="<?=$loadPRD->product_name?>" style="min-height:65px;" />
                    <? else: ?>
                        <img src="images/products/<?=$loadPRD->product_image?>" title="<?=$loadPRD->product_name?>" style="min-height:65px;" />
                    <? endif; ?>
                    <? if($loadSLOT[price_retail]!='0'): ?>
                    	<div class="price retail"><b><?=number_format($loadSLOT[price_retail],0)?></b></div>
                    <? else: ?>
                    	<div class="price"><b><?=number_format($loadPRD->init_price,0)?></b></div>
                    <? endif; ?>
                <? } ?>
            </div><!--/slotbox-product-->
            <div class="product-plus"><i class="fa fa-plus"></i></div>
            <div class="product" style="width:calc(50% - 14px); float:right;">
            	<!--Text when Hover-->
                <? if($loadPRD->id==0){ ?>
                	<div class="hoverText">เพิ่ม</div>
                    <i><?=$loadPRD->id?></i>
                    <img style="min-height:65px;" />
                    <div class="price"><b></b></div>
				<? }else{ ?>
                	<div class="hoverText">ตั้งค่า</div>
                    <i><?=$loadPRD->id?></i>
                    <? if(substr($loadPRD->product_image,0,4) == 'data'): ?>
                        <img src="<?=$loadPRD->product_image?>" title="<?=$loadPRD->product_name?>" style="min-height:65px;" />
                    <? else: ?>
                        <img src="images/products/<?=$loadPRD->product_image?>" title="<?=$loadPRD->product_name?>" style="min-height:65px;" />
                    <? endif; ?>
                    <? if($loadSLOT[price_retail]!='0'): ?>
                    	<div class="price retail"><b><?=number_format($loadSLOT[price_retail],0)?></b></div>
                    <? else: ?>
                    	<div class="price"><b><?=number_format($loadPRD->init_price,0)?></b></div>
                    <? endif; ?>
                <? } ?>
            </div><!--/slotbox-product-->

        	<? else:*/ // แสดง ช่องเดียว ////////////////////////////////// ?>
            <div class="product">
                <!--Text when Hover-->
                <? if($loadPRD->id==0){ ?>
                	<? if($_SESSION['permission']<3) { ?><div class="hoverText">เพิ่ม</div><? } ?>
                    <i><?=$loadPRD->id?></i>
                    <img style="min-height:100px;" />
                    <div class="price"><b></b></div>
                <? }else{ ?>
                	<? if($_SESSION['permission']<3) { ?><div class="hoverText">ตั้งค่า</div><? } ?>
                    <i><?=$loadPRD->id?></i>
                    <? if(in_array($loadSLOT[slotid],$arrModelSlotPlots)): ?>
                    	<img src="<?=$loadPRD->product_image?>" title="<?=$loadPRD->product_name?>" style="min-height:100px;" />
                    	<img src="<?=$loadPRD->product_image?>" title="<?=$loadPRD->product_name?>" style="min-height:100px;" class="secondIMG" />
                    <? else : ?>
                        <img src="<?=$loadPRD->product_image?>" title="<?=$loadPRD->product_name?>" style="min-height:100px;" />
                    <? endif; ?>
                    <? if($loadSLOT[price_retail] != 0 && $loadSLOT[price_retail] != $loadSLOT[price]): ?>
                    	<div class="price retail"><b><?=number_format($loadSLOT[price_retail],0)?><small>บาท</small></b></div>
                    <? else: ?>
                    	<div class="price"><b><?=number_format($loadPRD->init_price,0)?><small>บาท</small></b></div>
                    <? endif; ?>
                    <div class="name"><?=$loadPRD->product_name?></div>
                <? } ?>
            </div><!--/slotbox-product-->
        	<? //endif; // จบการแสดงผลช่องสินค้า /////////////////////////////////// ?> 
        
        	<? if($loadSLOT[productid]) : ?>
        	<div class="stock">
            	<? 	$xQTY = $loadSLOT[remain]; 
						if($loadSLOT[capacity]){ $indexQTY = $loadSLOT[remain]*100/$loadSLOT[capacity];
						} else { $indexQTY = 0;}
				?>
                <span class="stock-quantity">
                    <? if($indexQTY<=0){ echo '<span style="color:red;">' ?>
                    <? }elseif($indexQTY<=30){ echo '<span style="color:red;">' ?>
                    <? }elseif($indexQTY<=60){ echo '<span style="color:orange;">' ?>
                    <? }elseif($indexQTY==100){ echo '<span style="color:#c0c0c0;">' ?>
                    <? }else{ echo '<span style="color:#26B99A;">' ?>
                    <? } echo $loadSLOT[remain].'</span>' ?>
                </span>
                <div class="progress">
                	<div class="progress-bar progress-bar-striped <? if($indexQTY<=0){echo'bar-red';}elseif($indexQTY<=30){echo'bar-red';}elseif($indexQTY<=60){echo'bar-orange';}elseif($indexQTY==100){echo'bar-full';}else{echo'bar-green';} ?>" role="progressbar" style="height:<?=$indexQTY?>%" aria-valuenow="<?=$xQTY?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="stock-capacity">
                    <? if($indexQTY>=100){ ?><span style="color:#3498db;"><?=$loadSLOT[capacity]?><!--<b style="font-size:14px; line-height:0px;">F</b>--></span>
                    <? }else{ ?><span style="color:#aaa; font-weight:500;"><?=$loadSLOT[capacity]?></span>
                    <? } ?>
                </span>
            </div><!--/slotbox-stock--> 
            <? endif; ?>
 
        </div><!--/slotbox-content-->
        
        <!--Java Collect Data for Model-->
        <input name="loadslot-modelid" value="<?=$loadKOS->modelid;?>" type="hidden" />
        <input name="loadslot-bywho" value="<?=$_SESSION['name']?>" type="hidden" />
        <input name="loadslot-when" value="<?=date('Y-m-d H:i:s')?>" type="hidden" />
        
        <input name="loadslot-id" value="<?=$loadSLOT[id]?>" type="hidden" />
        <input name="loadslot-number" value="<?=($loadSLOT[slotid])?$loadSLOT[slotid]:$numSLOT;?>" type="hidden" />
        <input name="loadslot-double" value="<?=(in_array($loadSLOT[slotid],$arrModelSlotPlots))?1:0;?>" type="hidden" />
        
        <input name="loadslot-product-id" value="<?=$loadPRD->id?>" type="hidden" />
        <input name="loadslot-product-name" value="<?=$loadPRD->product_name?>" type="hidden" />
        <input name="loadslot-product-img" value="<?=$loadPRD->product_image?>" type="hidden" />

        <input name="loadslot-capacity" value="<?=$loadSLOT[capacity]?>" type="hidden" />
        <input name="loadslot-quantity" value="<?=$loadSLOT[remain]?>" type="hidden" />
        <input name="loadslot-price" value="<?=$loadPRD->init_price?>" type="hidden" />
        
        <? if($loadSLOT[price_retail] != 0 && $loadSLOT[price_retail] != $loadPRD->init_price): ?>
		<input name="loadslot-price-retail" value="<?=$loadSLOT[price_retail]?>" type="hidden" />
        <? else: ?>
		<input name="loadslot-price-retail" value="<?=$loadPRD->init_price?>" type="hidden" />
        <? endif; ?>
        
        <? if($loadSLOT[price_retail]!='0'): ?>
            <input name="loadslot-price-sale" value="<?=$loadSLOT[price_retail]?>" type="hidden" />
        <? else: ?>
            <input name="loadslot-price-sale" value="<?=$loadPRD->init_price?>" type="hidden" />
        <? endif; ?>
        <!--/End Java Collect-->            

    <? if($numSLOT > $loadMOD->slot_amount): // ตรวจสอบข้อมูลเก็บสินค้า กับ ช่องเก็บสินค้า ?></a>
    <? else: //if(!$loadSLOT[productid]): // ตรวจสอบข้อมูลว่ามีสินค้า หรือไม่? ?></a>
	<? endif; ?>  

    </div><!--/col-md-12-->
    
    <? endif; // เช็ค Status 1 คือสิ่งที่ไม่ต้องการให้แสดง ?>
    
<? unset($loadPRD); unset($loadSLOT); endwhile; ?>

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
//Select Picker
$(document).ready(function () {
	$('#kioskid').selectpicker({ liveSearch: false, maxOptions: 1 });
});
function readyShow(){
   $('.profile_pic').fadeIn(300);
}
// Switch Display
/*$(document).ready(function(){
    $(".btn-kioskshow").click(function(){ 
		$(this).addClass("btn-info"); $(".btn-slotshow").removeClass("btn-info"); 
		$("#slotbox-wrapper").addClass("kioskshow"); $("#slotbox-wrapper").removeClass("slotshow"); 
		$("#slotbox-display").removeClass("slotbox-canvas"); 
	});
	$(".btn-slotshow").click(function(){ 
		$(this).addClass("btn-info"); $(".btn-kioskshow").removeClass("btn-info"); 
		$("#slotbox-wrapper").removeClass("slotshow"); $("#slotbox-wrapper").addClass("kioskshow"); 
		$("#slotbox-display").addClass("slotbox-canvas"); 
	});
});*/
</script>
<?php require_once('kiosk_view_canvas.php'); ?>
<?php require_once('kiosk_view_modal.php'); ?>

