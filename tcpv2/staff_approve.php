<?php
// Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Staff";
//$_GET
if ($_GET['page']) {
   $page = $_GET['page'];
} else {
   $page = 1;
}
if ($_GET['routeid']) {
   $routeid = $_GET['routeid'];
} else {
   unset($routeid);
}
if ($_GET['kioskid']) {
   $kioskid = $_GET['kioskid'];
} else {
   unset($kioskid);
}
if ($_GET['productid']) {
   $productid = $_GET['productid'];
} else {
   unset($productid);
}
if ($_GET['display']) {
   $display = $_GET['display'];
} else {
   $display = 25;
}
if ($_GET['datefrom']) {
   $datefrom = $_GET['datefrom'];
} else {
   $datefrom = date('Y-m') . '-01';
} //default set to first Day of this month
if ($_GET['date']) {
   $date = $_GET['date'];
} else {
   $date = date('Y-m-t');
}  //default set to last Day of this month
if ($_GET['onhour']) {
   $onhour = $_GET['onhour'];
} else {
   unset($onhour);
}  //default set to 24 hour of this month
if ($_GET['search']) {
   $search = $_GET['search'];
} else {
   unset($search);
}
//Set Date for Query
$dateStart = strtotime($datefrom . ' 00:00:00');
$dateEnd = strtotime($date . ' 23:59:59');

//Category
$fetchUSER = new lineusers();
$fetchUSER->status = 99; //ยังไม่ อนุมัติ การเป็นพนักงาน
//SQL Query
$sql = "";
if ($search) {
   $sql .= " AND (`name` LIKE '%{$search}%' OR `mobile` LIKE '%{$search}%')";
}
$fetchUSER->loadmany(" {$sql} ORDER BY lastupdate ASC", $display, $page);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
<?php require_once('inc_head.php'); ?>
      <title><?= $pageTitle ?>, <?= $siteTitle ?></title>
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
                     <li class="breadcrumb-item active" aria-current="page"><?= $pageTitle ?></li>
                  </ol>
               </nav>
               <!--/end Breadcrumb-->

               <!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
               <div class="row">
                  <div class="content-title">
                     <div class="col-md-8 col-sm-8 col-xs-12">
                        <h2><?= $pageTitle ?> <b>Approve</b></h2>
                     </div><!--/col-->
                  </div><!--/content-title-->
               </div><!--/row-->

               <? if(isset($_GET['result'])){ ?>
               <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-fw fa-close"></i></button>
                  User ID <b><?= $_GET['userid'] ?></b>, has been <?= $_GET['result'] ?> <b>Successful</b>.
                  <i style="margin-left:10px; color:rgba(255,255,255,0.5);">on <?= $_GET['when'] ?> by <?= $_GET['bywho'] ?></i>
               </div>
               <? } ?>

               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="x_panel">
                        <div class="x_title">
                           <p class="text-th">แสดงรายชื่อ ผู้สมัครผ่านการสแกน Line QR Code ทั้งหมด <b class="text-green"><?= number_format($fetchUSER->totalrecords, 0) ?></b> รายชื่อ</p>
                           <!--<div class="nav navbar-right"><a href="user_add.php" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Add New User</a></div>-->
                        </div><!--/x_title-->
                        <div class="x_content">

                           <div class="dataTables_wrapper">
                              <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">

                                 <div class="top">
                                    <div class="dataTables_filter">
                                       <label>Search
                                          <input type="text" id="search" name="search" class="form-control input-sm autoFilter" placeholder="<?= $search ?>" onchange="this.form.submit()" />
                                       </label>
                                    </div>

                                    <? $findSTAFF = $fetchUSER; $page_show = $display; $total_record = $fetchUSER->totalrecords; ?>
<?php require_once('inc_pagination.php'); ?>
                                 </div>
                              </form>
                           </div>

                           <style type="text/css">
                              .gridrow { padding:10px 5px; border-top:1px solid #eee; border-bottom:1px solid #eee;}
                              .gridrow .griditem { float:left; width:calc(20% - 10px); margin:0 5px; border:1px solid #ddd; border-radius: 12px 0 0 0;}
                              .gridrow .picture { position:relative; background-position:center center; background-repeat:no-repeat; background-size:cover; border-radius: 12px 0 0 0;}
                              .gridrow .ordinal { position:absolute; top:-3px; right:5px; z-index:9;
                                                  background-color:rgba(115,135,156); color:#fff; line-height:25px; text-align:right; padding:0 5px;
                                                  box-shadow:1px 0px 1px rgba(0,0,0,0.15); }
                              .gridrow .createon { position:absolute; bottom:5px; left:0; z-index:8; font-size:11px;
                                                   background-color:rgba(115,135,156,0.3); color:#fff; line-height:20px; width:fit-content; text-align:left; padding:0 5px; }
                              .gridrow .profile ul { padding:10px 10px 0; margin:0}
                              .gridrow .profile ul li { min-height:25px;}
                              .gridrow .profile .topic { color:#aaa; font-size:13px; font-weight:300; line-height:13px; min-height:13px;}
                              .gridrow .profile .name { color:#000; font-size:16px; border-bottom:1px dotted #ddd;}
                              .gridrow form .bootstrap-select .filter-option { font-size:13px;}
                              .gridrow .action .btn { font-size:13px;}
                              .gridrow .dropdown-toggle { border-color:#ddd;}
                              .gridrow label.topic { color:#aaa; font-size:13px; font-weight:300; line-height:13px; min-height:13px; padding-left:5px;}

                           </style>
                           <div class="gridrow">
                              <div class="row">
                                 <?	//bypass route()
                                 $usePERMIS = new permission(); $usePERMIS->loadmany();
                                 $usePERMIS->name = array_combine($usePERMIS->id,$usePERMIS->name); //vd($useROT->name); die;
                                 ?>
                                 <? if($findSTAFF->totalrecords != 0): ?>
                                 <? $listPERMIS = new permission(); $listPERMIS->status = 0; $listPERMIS->loadmany(); ?>
                                 <? for ($x = 0; $x < $findSTAFF->totalitems; $x++) : $num = $x+1; ?>
                                 <div id="staffid_<?= $findSTAFF->id[$x]; ?>" class="griditem">

                                    <div class="picture" style=" background-image:url(<?= $findSTAFF->picture[$x]; ?>)">
                                       <div class="ordinal"><small>#<?= $findSTAFF->id[$x]; ?></small></div>
                                       <div class="createon"><?= date('Y-m-d H:i:s', $findSTAFF->lastupdate[$x]); ?></div>
                                    </div>
                                    <div class="profile">
                                       <ul class="list-unstyled">
                                          <li class="topic">ชื่อผู้ลงทะเบียน</li>
                                          <li class="name"><b class="b500"><?= $findSTAFF->name[$x]; ?></b></li>
                                       </ul>
                                    </div>
                                    <form style=" padding:5px; padding-bottom:10px;">
                                       <label class="topic">เลือกสิทธิเข้าใช้งาน</label>
                                       <select id="perid_<?= $findSTAFF->id[$x]; ?>" name="permisid" class="form-control input-sm selectpicker selectCustomW100 peridSelected" style="width:100%;">
                                          <option value="0" selected>...</option>
                                          <? for($xspermis = 0; $xspermis < $listPERMIS->totalrecords; $xspermis++): ?>
                                          <option data-content="<b style='font-weight:600;'><?= $listPERMIS->name[$xspermis] ?></b> <span>(<?= $listPERMIS->description[$xspermis] ?>)</span>" value="<?= $listPERMIS->id[$xspermis] ?>" <?= ($listPERMIS->id[$xspermis] == $loadStaff->per_id) ? 'selected' : '' ?>><?= $listPERMIS->name[$xspermis] ?></option>
                                          <? endfor; ?>
                                       </select>

                                    </form>
                                    <div class="action" style="padding:5px 5px 0; border-top:1px dotted #ddd;">
                                       <a id="btnAccept_<?= $findSTAFF->id[$x]; ?>" class="btn btn-primary btn-sm" onClick="approveAccept(<?= $findSTAFF->id[$x]; ?>);" style="display:none;">อนุมัติ</a>
                                       <a id="btnDenied_<?= $findSTAFF->id[$x]; ?>" class="btn btn-danger btn-sm pull-right" onClick="approveDenied(<?= $findSTAFF->id[$x]; ?>);" style="margin-right:0;">ยกเลิก</a>
                                    </div>

                                 </div>
                                 <? endfor; ?>
                                 <? else: ?>
                                 <div class="gridrow-item"><h3><i>No Data !!!</i></h3></div>
                                 <? endif; ?>
                              </div><!--/.row-->
                           </div><!--/.gridrow-->

                           <div class="dataTables_wrapper" style=" margin-top:10px;">
                              <div class="bottom">
<?= $pagination_pattern ?>
                                 <div class="dataTables_info">Showing <?= number_format($record_start + 1, 0) ?> to <?= ($record_end > $total_record) ? number_format($total_record, 0) : number_format($record_end, 0) ?> of <?= number_format($total_record, 0) ?> entries</div>
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

<script>
   function scaleGen() {
      $('div.griditem').each(function () {
         var picWidth = $(this).width();
         $(this).find('.picture').css({'min-height': picWidth + 'px', 'background-color': '#eee'});
      });
   }
   scaleGen();
   $(window).resize(function () {
      scaleGen();
   });

//Action
   $('.peridSelected').change(function () {
      var idStaff = $(this).attr('id').replace('perid_', '');
      var idPermis = $(this).val();
      console.log(idPermis);
      if (idPermis > 0) {
         $('#btnAccept_' + idStaff).fadeIn(300).show();
         $('#btnDenied_' + idStaff).hide();
      } else {
         $('#btnAccept_' + idStaff).hide();
         $('#btnDenied_' + idStaff).fadeIn(300).show();
      }
   });
   function approveAccept(id) {
      var idStaff = id;
      console.log('SEND... Accept ID -> ' + idStaff);
      var idPermis = $('#perid_' + idStaff).val();
      console.log('SEND... Permis ID -> ' + idPermis);
      $.post('staff_cmd.php?cmd=accept&staffid=' + idStaff + '&permisid=' + idPermis, function (data) { //console.log('Data-> '+data);
         if (data == 'OK') {
            $('div#staffid_' + idStaff).fadeOut(300);
         }
      });
   }
   function approveDenied(id) {
      var idStaff = id;
      console.log('SEND... Denied ID -> ' + idStaff);
      $.post('staff_cmd.php?cmd=denied&staffid=' + idStaff, function (data) { //console.log('Data-> '+data);
         if (data == 'OK') {
            $('div#staffid_' + idStaff).fadeOut(300);
         }
      });
   }
</script>
