<!DOCTYPE html> 
<html lang="en">
<head>
   <?php require_once 'inc_head_href.php'; ?>
    <title> Kaoook Vending </title>
</head>

<body class="nav-md">
<div class="container body">
<div class="main_container">
    <div class="col-md-3 left_col">
        <?php require_once 'inc_menu_main.php'; ?>
    </div><!-- /.col-md-3 left_col --> 

<!-- top navigation -->
<?php require_once 'inc_top_nav.php'; ?> 


	
<div class="right_col" role="main">	
    <!-- Start Content -->
     
    <!--start Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Staff</li>
        </ol>
    </nav>
    <!--/end Breadcrumb-->

<!-- // Start Content on PAGE /////////////////////////////////////////////////////// -->
<div class="row">
	<div class="content-title">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Staff <b>Lists</b></h2>
        </div><!--/col-->     
    </div><!--/content-title-->
</div><!--/row-->


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">
                แสดงรายชื่อ เจ้าหน้าที่เข้าใช้งาน ทั้งหมด <b class="text-green">17</b> รายชื่อ     
                
                
            </p>
            <div class="nav navbar-right"><a href="user_add.php" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Add New User</a></div>
        </div><!--/x_title-->
        <div class="x_content">
            
            <div class="dataTables_wrapper">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
                
               <div class="top">
               		<div class="dataTables_filter">
                        <label>ค้นหา 
                            <input type="text" id="search" name="search" class="form-control input-sm autoFilter" placeholder="Name, Mobile" value="" onchange="this.form.submit()">
                        </label>
                    </div>
                    <div class="dataTables_length" style="float:left; text-align:left; padding-left:0; padding-right:10px; width:fit-content;">
                        <label>เลือกสิทธิ
                            <select name="permisid" class="form-control input-sm autoFilter" onchange="this.form.submit()" style="width:auto;">
								<option value="" selected="">...</option>
                                                                            	<option value="2">Administrator</option>
                                                    	<option value="3">Monitor</option>
                                                    	<option value="11">Sales Officer</option>
                                                    	<option value="12">VanSale Officer</option>
                                                    </select>
                        </label>
                    </div>

                                        
<div class="dataTables_length">
    <label>Record/Page 
        <select name="display" class="form-control input-sm autoFilter" onchange="this.form.submit()">
            <option value="10">10</option>
            <option value="25" selected="">25</option>
            <option value="50">50</option>
            <option value="100">100</option>	
            <option value="1000">1000</option>
        </select>
    </label>
</div>

<div class="dataTables_paginate paging_simple_numbers">
    <ul class="pagination">
        <!-- Previous -->
                        <!-- First -->
                
        <!-- Main Loop -->
                                                                                                                                                                                                    
        <!-- Last -->
                <!-- Next -->
                    </ul>
</div>

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
                        <th rowspan="1">Staffs</th>
                        <th rowspan="1">Mobile</th>
                        <th rowspan="1">Permission</th>
                        <th rowspan="1">Route</th>
                        <th rowspan="1">Group</th>
                        <th rowspan="1">Last Update</th>
                        <th style=" text-align:center;">Action</th>
                </tr></thead>
                
                <tbody>
                                                                    <tr id="trROT_2">
                    
                        <td class="ordinal"><small>2</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hVpkesoIQCV9WHCWNaAV2CGpZBzIhMg8XLi5FOHofU2Z8fxsKbi4VbnpOUDx8KE1dOX1DOXpLUz8v" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=2"><b class="b500">Monai advws.com</b></a>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Creator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(1)</span> ผู้สร้างระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2018-12-14 14:47:01</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=2"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_3">
                    
                        <td class="ordinal"><small>3</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0m0e5c12ce7251304ca6fabd87238d924b7f89623f3290" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=3"><b class="b500">Toonni</b></a>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Creator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(1)</span> ผู้สร้างระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2018-12-14 14:00:47</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=3"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_11">
                    
                        <td class="ordinal"><small>11</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hRdtFAIKrDUtJPyfSaFxyHHV6AyY-EQsDMQpCfmk4Un9tD0JPdw5Lfm07VXo3CkhNJ1FCeGg_AXox" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=11"><b class="b500">Waraporn</b></a>
                            <div style="color:#aaa; font-size:11px;">Yu¡!¿Yu¡!¿</div>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Creator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(1)</span> ผู้สร้างระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-01-07 10:26:25</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=11"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_12">
                    
                        <td class="ordinal"><small>12</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hrHjEU6whLWdXPAAv1udSMGt5IwogEisvL1xgAHZpelEqXm5ibF5iUnU5dlAvWG0wa1NhBSE4IFYq" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=12"><b class="b500">คุณอู๋ สุดอร่อย</b></a>
                            <div style="color:#aaa; font-size:11px;">คุณอู๋ สุดอร่อย</div>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Administrator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(2)</span> ผู้ดูแลระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-01-30 14:17:07</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=12"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_13">
                    
                        <td class="ordinal"><small>13</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hwpW5BDL9KF9qTAQdEvtXCFYJJjIdYi4XEi1uOB8eIWdHKWoKVH5uOE5NJWZBKWoNUSoyPRhNfzxC" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=13"><b class="b500">Virote S</b></a>
                                                </td>
                        <td>  </td>
                        <td>
                        							Monitor                            <div style="color:#aaa;"><span style="color:#ddd;">(3)</span> ผู้ตรวจสอบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-01-18 13:40:42</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=13"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_15">
                    
                        <td class="ordinal"><small>15</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0h85vXDldIZxpLIU33J5MYTXdkaXc8D2FSMxAqdWgoPio0E3JNdRcoeWp0PCNuFiYcf0UtemombC9v" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=15"><b class="b500">Koii</b></a>
                            <div style="color:#aaa; font-size:11px;">Koii</div>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Administrator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(2)</span> ผู้ดูแลระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-02-11 09:57:15</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=15"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_18">
                    
                        <td class="ordinal"><small>18</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hnMSzbttRMWJuAxvXuxRONVJGPw8ZLTcqFm0sB0sFbAVKOyNjVTUqBRxUOFdHOiU9UGN7UE0KZgEX" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=18"><b class="b500">Zee</b></a>
                                                </td>
                        <td>  </td>
                        <td>
                        							VanSale Officer                            <div style="color:#aaa;"><span style="color:#ddd;">(12)</span> พนักงานหน่วยรถ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2018-12-20 13:39:44</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=18"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_20">
                    
                        <td class="ordinal"><small>20</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hEFPKHPUOGmltMjehFO1lPlF3FAQaHBwhFVcFBksyQ1EUVV5rUwBcCkA1RAsTUlU_V1EGBkk3FF4Q" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=20"><b class="b500">piyapong 2424</b></a>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Administrator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(2)</span> ผู้ดูแลระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-01-07 09:15:51</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=20"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_21">
                    
                        <td class="ordinal"><small>21</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0m072bb47072510e2e12e3a133d4d7b25764c8348eedbb" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=21"><b class="b500">Khemik</b></a>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Administrator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(2)</span> ผู้ดูแลระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-01-07 09:34:32</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=21"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_25">
                    
                        <td class="ordinal"><small>25</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0h1vFBqSxXbll7O0QXPHERDkd-YDQMFWgRA1l2OQs4ZWtUC3oGRV10PAlrMmgDD34PQlspPQk6MTwD" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=25"><b class="b500">Bum</b></a>
                                                </td>
                        <td>  </td>
                        <td>
                        							Monitor                            <div style="color:#aaa;"><span style="color:#ddd;">(3)</span> ผู้ตรวจสอบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-01-08 09:25:03</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=25"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_26">
                    
                        <td class="ordinal"><small>26</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hOWZ_WuPmEHhnJjoq-lBvL1tjHhUQCBYwH0RaTkB2Rh9LF14pWUVfTUEiT0saQwN5DkFfG0N1TUpO" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=26"><b class="b500">v304</b></a>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Administrator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(2)</span> ผู้ดูแลระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-01-09 13:10:55</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=26"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_27">
                    
                        <td class="ordinal"><small>27</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hlDkRfGMoM2tWKx8MryJMPGpuPQYhBTUjLksuBHMsOgkpE3I9a0R7DXt4bQwsGSY4Yx4sCSAoOg4r" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=27"><b class="b500">jumbo</b></a>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Administrator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(2)</span> ผู้ดูแลระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-01-08 17:55:16</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=27"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_51">
                    
                        <td class="ordinal"><small>51</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hoLlPM7nQMGNRKR-IIatPNG1sPg4mBzYrKU0rBCQtOQN6Tn49aR0tViZ-OlZ1S3U2Okp5VnYsPFF9" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=51"><b class="b500">MANA-WinkWhite Sys S</b></a>
                            <div style="color:#aaa; font-size:11px;">MANA-WinkWhite Sys S</div>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Administrator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(2)</span> ผู้ดูแลระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-06-12 12:15:03</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=51"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_54">
                    
                        <td class="ordinal"><small>54</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hdZBT9HdSO3V_LRF4Y5ZEIkNoNRgIAz09BxhwQF59YBdWGXVzQEkmFwopZEwBTXl2FEJ0R1l-bEUF" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=54"><b class="b500">E-Biz</b></a>
                                                </td>
                        <td>  </td>
                        <td>
                        							Sales Officer                            <div style="color:#aaa;"><span style="color:#ddd;">(11)</span> พนักงานขาย</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-02-11 09:49:23</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=54"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_73">
                    
                        <td class="ordinal"><small>73</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hn3r9MAO0MRxPQBvxTj1OS3MFP3E4bjdUNyd-fmITPCVgcCMacy96fG1JO3wydSMeIHQreG1FPSlm" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=73"><b class="b500">TBT</b></a>
                            <div style="color:#aaa; font-size:11px;">TBT</div>
                                                </td>
                        <td>  </td>
                        <td>
                        							<b>Administrator</b>
                            <div style="color:#aaa;"><span style="color:#ddd;">(2)</span> ผู้ดูแลระบบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-05-13 11:55:01</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=73"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_74">
                    
                        <td class="ordinal"><small>74</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hNZAYjhNCEXV8IDv5jXRuIkBlHxgLDhc9BBEJG1koS0QGEgZxRBELQVshGEFRRF9wQxRaRwopHEBU" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=74"><b class="b500">TJ</b></a>
                            <div style="color:#aaa; font-size:11px;">TJ</div>
                                                </td>
                        <td>  </td>
                        <td>
                        							Monitor                            <div style="color:#aaa;"><span style="color:#ddd;">(3)</span> ผู้ตรวจสอบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-05-23 13:45:13</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=74"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                    <tr id="trROT_85">
                    
                        <td class="ordinal"><small>85</small></td>
                        <td>
                        	<img src="https://profile.line-scdn.net/0hmF88jnTMMmkFQR2jcLpNPjkEPARybzQhfXAoDSgTbF4hIyY_bXMqCSdDOA5_dSU3OnN6CCZIZFB4" class="avatar" style=" width:40px; border-radius:100%; margin-right:5px;">
                                                	<a href="staff_edit.php?staffid=85"><b class="b500">[.:.:.]****</b></a>
                            <div style="color:#aaa; font-size:11px;">[.:.:.]****</div>
                                                </td>
                        <td>  </td>
                        <td>
                        							Monitor                            <div style="color:#aaa;"><span style="color:#ddd;">(3)</span> ผู้ตรวจสอบ</div>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>
                                                	<i class="" style="color:#ddd;">ยังไม่ระบุ</i>
                                                </td>
                        <td>2019-05-30 14:27:19</td>
                        <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="staff_edit.php?staffid=85"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        
                    </tr>
                                                </tbody>
            </table>
            <div class="dataTables_wrapper">
            	<div class="bottom">
					<div class="dataTables_paginate paging_simple_numbers">
    <ul class="pagination">
        <!-- Previous -->
                        <!-- First -->
                
        <!-- Main Loop -->
                                                                                                                                                                                                    
        <!-- Last -->
                <!-- Next -->
                    </ul>
</div>

                	<div class="dataTables_info">Showing 1 to 17 of 17 entries</div>
                </div>
            </div>
            
        </div><!--/x_content-->
    </div><!--/x_panel-->
    </div><!--/col-md-12-->

</div><!--/row-->

<!-- // End Content on PAGE /////////////////////////////////////////////////////// -->


    <!-- End Content -->
</div><!-- /right_col -->



        <!-- footer content -->
        <footer>    
                <?php require_once('inc_footer.php');?>
        </footer>
        <!-- /footer content -->
    </div><!-- /main_container -->
</div><!-- /container -->
<!-- jQuery -->

<?php require_once('inc_footer_script.php');?>
</body>
</html>

<style type="text/css">
	tr.onFocus>td { background-color:rgba(38,185,154,0.1);}
</style>
            
<script type="text/javascript">
    
    
//On Focus
$('td').click(function(){
	$(this).parent().toggleClass('onFocus')
});

//Select Picker
$(document).ready(function () {
	$('#dateYear').selectpicker({ liveSearch: false, maxOptions: 1 });
    $('#dateMonth').selectpicker({ liveSearch: false, maxOptions: 1 });
});

//Charts Display
function init_charts() {
	if ($('#dailySoldChart').length ){ 	  
		var ctx = document.getElementById("dailySoldChart");
		var dailySoldStatement = new Chart(ctx, { type: 'line',
			data: {
				labels: ['00 น.', '01 น.', '02 น.', '03 น.', '04 น.', '05 น.', '06 น.', '07 น.', '08 น.', '09 น.', '10 น.', '11 น.', '12 น.', '13 น.', '14 น.', '', ],
				datasets: [{ 
					label: 'Trend Line', type: 'line', backgroundColor: "rgba(0,0,0,0)", borderColor:"rgba(255,0,0,0.6)", borderDash:[10,5], borderWidth:1, pointRadius:0, pointHoverRadius:0, 
					data: [, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.92307692307692, 0.85714285714286, ]	
					}, {
					label: 'Sold Amount', lineTension:0, backgroundColor: "rgba(38,185,154,0.5)", borderColor:"#26B99A", borderWidth:2, pointRadius:3, pointHoverRadius:6, pointBackgroundColor:"#FFFFFF", pointBorderColor:"#26B99A", pointHoverBackgroundColor:"#FFFFFF", pointHoverBorderColor:"#26B99A",
					data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12, 0, ]
				}]
			},
			options: { 
				scales: { yAxes: [{ ticks: { beginAtZero: true } }] },
				legend: { display: false }
			} 
		}); 
	} 
}
$(document).ready(function () { init_charts(); });
</script>
