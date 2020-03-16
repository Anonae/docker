<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Retrived
if($_POST['action'] == 'retrieved'):
	$update = new lineusers(); 
	$update->id = $_POST['staffid'];
	if($update->load()){ 
		$update->status = 1;                
		$update->lastupdate = time();
		$deletedID = $update->write();
		//Return Massage
		if($deletedID){ 
		}else{ die('Server Retrieved Offline'); } 
	}else{ die('No Data Found'); }
endif;

//Site Detail
$pageTitle = "Staff"; 
//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['display']){ $display = $_GET['display']; } else { $display = 25;  }

if($_GET['routeid']){ $routeid = $_GET['routeid']; } else { unset($routeid);  }
if($_GET['permisid']){ $permisid = $_GET['permisid']; } else { unset($permisid);  }
//if($_GET['description']){ $description = $_GET['description']; } else { unset($description);  }
if($_GET['productid']){ $productid = $_GET['productid']; } else { unset($productid);  }

if($_GET['datefrom']){ $datefrom = $_GET['datefrom']; } else { $datefrom = date('Y-m').'-01';  } //default set to first Day of this month
if($_GET['date']){ $date = $_GET['date']; } else { $date = date('Y-m-t');  }  //default set to last Day of this month
if($_GET['onhour']){ $onhour = $_GET['onhour']; } else { unset($onhour);  }  //default set to 24 hour of this month
if($_GET['search']){ $search = $_GET['search']; } else { unset($search);  }
//Set Date for Query
$dateStart = strtotime($datefrom.' 00:00:00');
$dateEnd = strtotime($date.' 23:59:59');

//Category
$fetchUSER = new lineusers();
$fetchUSER->status = 0;
	//SQL Query
	if($permisid){ $sql = " AND per_id = {$permisid}"; }
	if($search){ $sql .= " AND (`name` LIKE '%{$search}%' OR `mobile` LIKE '%{$search}%' OR `displayname` LIKE '%{$search}%' )"; }
$fetchUSER->loadmany(" {$sql} ORDER BY id ASC", $display, $page);


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
            <h2><?=$pageTitle?> <b>Archived</b> Lists</h2>
        </div><!--/col-->     
    </div><!--/content-title-->
</div><!--/row-->

<? if(isset($_GET['result'])){ ?>
<div class="alert alert-success alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-fw fa-close"></i></button>
	User ID <b><?=$_GET['staffid']?></b>, has been <?=$_GET['result']?> <b>Successful</b>.
    <i style="margin-left:10px; color:rgba(255,255,255,0.5);">on <?=$_GET['when']?> by <?=$_GET['bywho']?></i>
</div>
<? } ?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">
                แสดงรายชื่อ เจ้าหน้าที่เข้าใช้งาน ทั้งหมด <b class="text-green"><?=number_format($fetchUSER->totalrecords,0)?></b> รายชื่อ
            </p>
            <!--<div class="nav navbar-right"><a href="user_add.php" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Add New User</a></div>-->
        </div><!--/x_title-->
        <div class="x_content">
            
            <div class="dataTables_wrapper">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
                
               <div class="top">
               		<div class="dataTables_filter">
                        <label>ค้นหา 
                            <input type="text" id="search" name="search" class="form-control input-sm autoFilter" placeholder="Name, Mobile" value="<?=$search?>" onchange="this.form.submit()" />
                        </label>
                    </div>
                    <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                        <label>เลือกสิทธิ
                            <select name="permisid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;" >
								<option value="" selected>...</option>
                        <? $listPERMIS = new permission(); $listPERMIS->status = 0; $listPERMIS->loadmany(); ?>
                        <? for($xpermis = 0; $xpermis < $listPERMIS->totalrecords; $xpermis++): ?>
                            	<option value="<?=$listPERMIS->id[$xpermis]?>" <?=($permisid == $listPERMIS->id[$xpermis])?'selected':''?>><?=$listPERMIS->name[$xpermis]?></option>
                        <? endfor; ?>
                            </select>
                        </label>
                    </div>

                    <? $findSTAFF = $fetchUSER; $page_show = $display; $total_record = $fetchUSER->totalrecords; ?>
                    <?php require_once('inc_pagination.php'); ?>
                </div>
            </form>
            </div>
            
            <style type="text/css">
			 	.table>thead>tr>th.topupCB { text-align:center; width:35px;}
				img.disabled { filter: grayscale(100%);}
			</style>
            <table id="" class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th rowspan="1">#</th>
                        <th rowspan="1">Staffs</th>
                        <th rowspan="1">Mobile</th>
                        <th rowspan="1">Permission</th>
                        <th rowspan="1">Route</th>
                        <th rowspan="1">Group</th>
                        <th rowspan="1">Last Update</th>
                        <th style=" text-align:center;">Action</th>
                </thead>
                
                <tbody>
                <?	//bypass route()
						$usePERMIS = new permission(); $usePERMIS->loadmany(); 
						$usePERMIS->name = array_combine($usePERMIS->id,$usePERMIS->name); //vd($usePERMIS->name); die;
						$usePERMIS->description = array_combine($usePERMIS->id,$usePERMIS->description);
						$useROT = new route(); $useROT->loadmany();
						$useROT->name = array_combine($useROT->id,$useROT->name);
						$useROT->area = array_combine($useROT->id,$useROT->area);
                ?>
                <? if($findSTAFF->totalrecords != 0): ?>
                <? for ($x = 0; $x < $findSTAFF->totalitems; $x++) : $num = $x+1; ?>
                    <tr id="trStaff_<?=$findSTAFF->id[$x];?>">
                    
                        <td class="ordinal"><small><?=$findSTAFF->id[$x];?></small></td>
                        <td>
                        	<img src="<?=$findSTAFF->picture[$x]?>" class="avatar disabled" style=" width:40px; border-radius:100%; margin-right:5px;">
                        <? if($findSTAFF->displayname[$x]) : ?>
                        	<b class="b500" style="color:#999;"><?=$findSTAFF->displayname[$x]?></b>
                            <div style="color:#aaa; font-size:11px;"><?=$findSTAFF->name[$x]?></div>
                        <? else : ?>
                        	<b class="b500" style="color:#999;"><?=$findSTAFF->name[$x]; ?></b>
                        <? endif; ?>
                        </td>
                        <td> <?=$findSTAFF->mobile[$x];?> </td>
                        <td>
                        <? if($findSTAFF->per_id[$x]==0) : ?>
                        	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                        <? elseif($findSTAFF->per_id[$x]<3) : ?>
							<b><?=$usePERMIS->name[$findSTAFF->per_id[$x]]?></b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(<?=$findSTAFF->per_id[$x]?>)</span> <?=$usePERMIS->description[$findSTAFF->per_id[$x]]?></div>
                        <? else : ?>
							<?=$usePERMIS->name[$findSTAFF->per_id[$x]]?>
                            <div style="color:#aaa;"><span style="color:#ddd;">(<?=$findSTAFF->per_id[$x]?>)</span> <?=$usePERMIS->description[$findSTAFF->per_id[$x]]?></div>
                        <? endif; ?>
                        </td>
                        <td>
                        <? if($findSTAFF->route_id[$x]==0) : ?>
                        	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                        <? else : ?>
							<?=$useROT->name[$findSTAFF->route_id[$x]];?>
                            <div style="color:#aaa;"><?=$usePERMIS->area[$findSTAFF->route_id[$x]];?></div>
                        <? endif; ?>
                        </td>
                        <td>
                        <? if($findSTAFF->groupid[$x]==0) : ?>
                        	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                        <? else : ?>
							<?=$findSTAFF->groupid[$x]?>
                        <? endif; ?>
                        </td>
                        <td><?=date('Y-m-d H:i:s',$findSTAFF->lastupdate[$x]);?></td>
                        <td style=" text-align:center;">
                        	<form id="formRetrieved_<?=$findSTAFF->id[$x];?>" class="form-horizontal form-label-left" method="POST" data-parsley-validate="" novalidate>
                            <input type="hidden" name="action" value="retrieved">
                            <input name="staffid" value="<?=$findSTAFF->id[$x];?>" style="display:none;" />
                            <input name="bywho" value="<?=$_SESSION['name']?>" style="display:none;" />
                            <input name="when" value="<?=date('Y-m-d H:i:s')?>" style="display:none;" /> 
                                <a id="btnRetrieved_<?=$findSTAFF->id[$x];?>" class="btn btn-dark btn-block btn-sm btnRetrieved" type="submit" style="font-size:13px; color:#fff;">Retrieved</a>
                            </form>
                        </td>
                        
                    </tr>
                <? endfor; ?>
                <? else: ?>
                	<tr><td colspan="7" class="noData"><i>No Data !!!</i></td></tr>
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

<script type="text/javascript">
$('.btnRetrieved').click(function(){
	var id = $(this).attr('id'); id = id.replace('btnRetrieved_',''); console.log(id);
	$('#trStaff_'+id).fadeOut(300); 
	$.post('staff_lists_archived.php', $('#formRetrieved_'+id).serialize());
	$('#formRetrieved_'+id).reset();
});
</script>
