<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Command"; 
//$_GET
if($_GET['kioskid']){ $kioskid = $_GET['kioskid']; } else { unset($kioskid);  }
//GET
$kioskid = $_GET["kioskid"];

//TCP Code
$loadKiosk = new kiosk();
$loadKiosk->id = $_GET["kioskid"];
$loadKiosk->load();


if($_GET["kioskid"]){
    
    $actionTDL = new kiosk_todolist();
    $actionTDL->kioskid = $_GET["kioskid"];
    
    if($_POST['action'] == 'add') { 

        if(isset($_POST['restart_app'])){
            $actionTDL->cmd = 'restart_app';
        }
        if(isset($_POST['get_last_apilog'])){
            $actionTDL->cmd = 'get_last_apilog';
        }
        if(isset($_POST['get_last_log'])){
            $actionTDL->cmd = 'get_last_log';
        }
        if(isset($_POST['get_last_buy'])){
            $actionTDL->cmd = 'get_last_buy';
        }
        if(isset($_POST['closeservice'])){
            $actionTDL->cmd = 'closeservice';
        }
        $actionTDL->inputtime = time();
        $actionTDL->lastupdate = time();
        $actionTDL->status = 1;  // default
		
        if($actionTDL->write()){
			$returnMSG = $kiosk_todo->cmd;
        } // end write
		
    }  // end add
    $actionTDL->loadmany("ORDER BY id DESC"); 
}
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
            <li class="breadcrumb-item"><a href="kiosk_lists.php"><?=$pageTitle?></a></li>
            <li class="breadcrumb-item active">Kiosk <?=($loadKiosk->tcpcode)?$loadKiosk->tcpcode:$loadKiosk->id;?></li>
            <li class="breadcrumb-item active" aria-current="page">Send Command</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
        	<h2 style="margin-bottom:10px;"><b>Send Command</b></h2>
            <? if($kioskid){ ?>
            <h2>Kiosk <b><?=($loadKiosk->tcpcode)?$loadKiosk->tcpcode:$loadKiosk->id;?></b>
				<? if($loadKiosk->description){ ?><small style="font-size:16px; margin-left:10px;">( <?=$loadKiosk->description?> )</small><? } ?>
            </h2>
            <? } ?>
        </div><!--/col-->    
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="dataTables_wrapper">
            <form method="GET">
                <div class="dataTables_custom" style="width:100%;">
                	<div class="dateMonthPicker">
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="fa fa-fw fa-building-o"></i></span>
                            <select id="kioskid" name="kioskid" class="form-control input-sm selectpicker selectCustomW100" style="width:100%;" onchange="this.form.submit()">
                            <? $listKOS = new kiosk(); $listKOS->status = 1; $listKOS->loadmany(); ?>
			   <? if(!$_GET['kioskid']){ ?><option value="" selected></option><? } ?>
                            <? for($xKos = 0; $xKos < $listKOS->totalrecords; $xKos++): ?>
                                <option data-content="<b><?=($listKOS->tcpcode[$xKos])?$listKOS->tcpcode[$xKos]:$listKOS->id[$xKos];?></b> <span style='font-weight:400;'>( <?=$listKOS->name[$xKos];?> )</span>" value="<?=$listKOS->id[$xKos]?>" <?=($listKOS->id[$xKos] == $_GET['kioskid'])?'selected':''?>><?=$listKOS->id[$xKos]?></option>
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


<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_content">
        	<div class="dataTables_wrapper">
            	<? if(!$kioskid){ ?><h2 style="color:#fd1c00; padding-bottom:10px;">กรุณาเลือกตู้กดน้ำที่ต้องการ <i class="fa fa-fw fa-share"></i> ส่งคำสั่ง</h2><? } ?>
                <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:0;">
                    <div class="top topSelect" style=" width:100%; display:table; border:none; margin:0; padding:0;">
                        <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                            <label>เลือกตู้กดน้ำ
                                <select name="kioskid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" >
                                    <option value="" selected>...</option>
                                <? $fetchKOS = new kiosk(); $findKOS = $fetchKOS; $findKOS->status = 1; $findKOS->loadmany(); ?>
                                <? for($xkos = 0; $xkos < $findKOS->totalrecords; $xkos++): ?>
                                <option value="<?=$findKOS->id[$xkos]?>" <?=($kioskid == $findKOS->id[$xkos])?'selected':''?>><? if($findKOS->tcpcode[$xkos]){ echo '<b>'.$findKOS->tcpcode[$xkos].'</b> <span>('.$findKOS->name[$xkos].')</span>'; }else{echo $findKOS->id[$xkos]; }?></option>
                            <? endfor; ?>
                                </select>
                            </label>
                        </div>
                    </div><!--/top-->
                </form>
			</div>            
        </div><!--/x_content-->
    </div><!--/x_panel-->
    </div><!--/col-md-12-->
</div><!--/row-->

<? if($kioskid) : ?>  

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    	<div class="x_title">
            <p class="text-th">ชุดคำสั่งสำหรับเจ้าหน้าที่ดูแลระบบเท่านั้น</p>
        </div><!--/x_title-->
        
<? if(isset($returnMSG)){ ?>
<div class="alert alert-success alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-fw fa-close"></i></button>
	Command <b><?=$returnMSG?></b>, has been send <b>Successful</b>.
    <!--<i style="margin-left:10px; color:rgba(255,255,255,0.5);">on <?=$_GET['when']?> by <?=$_GET['bywho']?></i>-->
</div>
<? } ?>

        <div class="x_content row">
            <form method="post">
                <input type="hidden" id="action" name="action" value="add">
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                    <button class="btn btn-silver btn-block btnCMD" type="submit" name="restart_app" value="restart_app" onclick="return confirm('ส่งเลือกคำสั่ง restart_app ?')">
                    <div class="topic">สั่ง Restart App</div> restart_app
                    </button>
        		</div> <!-- // restart_app --> 

                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                    <button class="btn btn-silver btn-block btnCMD" type="submit" name="get_last_apilog" value="get_last_apilog" onclick="return confirm('ส่งคำสั่ง get_last_apilog ?')">
                        <div class="topic">ขอ Api Log ล่าสุด</div>get_last_apilog
                    </button>
                </div> <!-- get_last_apilog --> 
            
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                    <button class="btn btn-silver btn-block btnCMD" type="submit" name="get_last_log" value="get_last_log" onclick="return confirm('ส่งคำสั่ง get_last_log ?')">
                        <div class="topic">ขอ Log ล่าสุด</div>get_last_log
                    </button>
                </div> <!-- get_last_log --> 
            
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                    <button class="btn btn-silver btn-block btnCMD" type="submit" name="get_last_buy" value="get_last_buy" onclick="return confirm('ส่งคำสั่ง get_last_buy ?')">
                        <div class="topic">ขอ รายการขายล่าสุด</div>get_last_buy
                    </button>
                </div> <!-- get_last_buy -->  
            
            <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                <button class="btn btn-silver btn-block btnCMD" type="submit" name="closeservice" value="closeservice" onclick="return confirm('ส่งคำสั่ง closeservice ?')">
                	<div class="topic">สั่งปิด App</div>closeservice
                </button>
           </div>  <!-- closeservice -->  
       </form>

		</div><!--/x_content-->
    </div><!--/x_panel-->

<? //Fetch Todolist
	$findTDL = new kiosk_todolist();
	$findTDL->kioskid = $_GET["kioskid"];
	$findTDL->loadmany(' ORDER BY id DESC');
?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            	<div class="x_title">
                    <p class="text-th">แสดงรายการ ส่งคำสั่ง ย้อนหลัง</p>
                    <p class="text-help">
                    	Kiosk ID : <b class="text-green"><?=$loadKiosk->tcpcode?></b>
                        รวมทั้งหมด <b class="text-green"><?=number_format($findTDL->totalrecords,0)?></b> รายการ
                    </p>
                </div><!--/x_title-->
                <div class="x_content">
                    <div class="dataTables_wrapper">                       
<style type="text/css">
.btnCMD { padding:10px 0 15px; font-size:15px; line-height:20px; font-weight:500; color:red !important; margin-bottom:15px;}
.btnCMD>.topic { font-size:16px; padding:5px 0; font-weight:500; color:#000;}
.cmd_show_sort { overflow: hidden; padding-bottom:10px; height:40px; width:300px; word-break:break-all;}
.cmd_show_full { overflow: auto; height:auto; width:auto; word-break:break-all;}
.badge-cmd { font-size:18px; font-weight:400; background-color:#26B99A; margin-top:-8px; padding: 5px 10px 8px;}
</style>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="color:#bbb;"><small>#ID</small></th>
                                    <th>Input Time</th>
                                    <th>Last Update</th>
									<th style="text-align:left;">Status</th>  
                                    <th>Command</th>
                                    <th id="cmdDisplay">Return</th>
                                </tr>
                            </thead>

                            <tbody>
                                
                                <? //For loop
									if($findTDL->totalrecords!=0) {
										for ($x=0; $x < $findTDL->totalrecords; $x++ ) { 
                                ?>
                                
                                <tr>
                                    <td class="ordinal">#<small><?=$findTDL->id[$x];?></small></td>
									<td class="ordinal"><?=date('Y-m-d H:i:s',$findTDL->inputtime[$x]);?></td>
                                    <td><?=date('Y-m-d H:i:s',$findTDL->lastupdate[$x]);?></td>
                                    <td style="text-align:left;">
                                    	<? if($findTDL->status[$x]==1){ ?><span style="color:red;"><i class="fa fa-fw fa-paper-plane-o"></i> Sending</span><? } ?>
                                        <? if($findTDL->status[$x]==2){ ?><span style="color:orange;"><i class="fa fa-fw fa-spinner fa-pulse"></i> Processing</span><? } ?>
                                        <? if($findTDL->status[$x]==3){ ?><span style="color:#26B99A ;"><i class="fa fa-fw fa-check-square-o"></i> Finished</span><? } ?>
                                    </td> 
                                    <td><?=$findTDL->cmd[$x];?></td>
                                    <td>      
                                        <? if($findTDL->description[$x] != "")  { ?>

<!-- Button -->
<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#cmdModal_<?=$findTDL->id[$x];?>" style="font-size:13px;">Open JSon Return</button>
<!-- Modal -->
<div id="cmdModal_<?=$findTDL->id[$x];?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-fw fa-close"></i></button>
                <h4 class="modal-title">
                	Command <span class="badge badge-cmd"><?=$findTDL->cmd[$x];?></span> 
                	on <?=date('Y-m-d H:i:s',$findTDL->inputtime[$x]);?>
                </h4>
            </div><!--/.modal-header-->
            <div class="modal-body">
            	<p style="word-break:break-all;"><? vd(json_decode($findTDL->description[$x])); //stripslashes($findTDL->description[$x])?></p>
            </div><!--/.modal-body-->
        </div><!--/.modal-content-->
    </div><!--/.modal-dialog-->
</div>
                                        <? } ?>
                                    </td>                                                 
                                </tr>
								<? 	} //end for ?>
                                <? }else{ ?>
                                    <tr><td colspan="7" class="noData"><i>No Data !!!</i></td></tr>
								<? } //end if ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--// end row --> 
    </div>
</div>
<? endif; ?>

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
//Toggle Return Desc
$(document).ready(function(){   
	var cmdDisplay = $('#cmdDisplay').width(); console.log(cmdDisplay);
	$("button").click(function(){
		var btn_val = $( this ).val(); console.log(btn_val);
		var divshow = "cmd_show_"+btn_val;    
		$("."+divshow).toggleClass("cmd_show_full").css({'width':cmdDisplay+'px'});
	});
});
</script>
