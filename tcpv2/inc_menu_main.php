<?php //Check waiting staffs                  
	$userInfo = new lineusers();
	$userInfo->name = $_SESSION['username'];
	$userInfo->load(); 
	//Bypass Kiosk
	$usePermis = new permission(); $usePermis->loadmany(); 
	$usePermis->name = array_combine($usePermis->id,$usePermis->name);
	$usePermis->description = array_combine($usePermis->id,$usePermis->description);
?>
<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
	<style type="text/css">
    /* Toggle Menu */
    .nav-md .site-slogan { opacity:1; margin-left:65px; transition:.2s;}
    .nav-sm .site-slogan { opacity:0; margin-left:55px; transition:.2s;}
    </style>
        <div class="navbar nav_title" style="border: 0;">
            <?php       
          // $meeting_date   // ไปปรับที่  includes /configs.php
          
            if(date('Y-m-d') == $meeting_date OR date('Y-m-d') == "2019-06-21"){   // แก้ไขวันที่ ที่จะไปพบลูกค้านี่นี่
                // Smart Vending 
                $logo_img           = "images/logo_smart_vending_white.png";
                $logo_alt           = "Smart Vending Logo"; 
                $line_login_name    = "Smart Vending Machine"; 
                $logo_width         = "width:90px";
                
                $slogan_m_top1      = "margin-top:-68px";
                $slogan_m_top2      = "margin-top:-40px";
                
                $slogan_m_left1     = "margin-left: 98px;";
                $slogan_m_left2     =  "margin-left: 99px;";

              } else { 
                // TCP Vending       
                $logo_img           = "images/logo-tcp-white.png";
                $logo_alt           = "TCP Logo";
                $line_login_name    = "TCP Vending Machine";
                $logo_width         = "width:50px"; 
                $slogan_m_top1      = "margin-top:-65px";
                $slogan_m_top2      = "margin-top:-40px";
              }
              ?>
            
            <a href="index.php" class="site_title">
                <img src="<?=$logo_img;?>" alt="<?=$logo_alt;?>" class="profile_img" style=" <?=$logo_width;?>; margin-top:-7px;" />
                <div class="site-slogan" style=" font-size:16px; <?=$slogan_m_top1;?>; <?=$slogan_m_left1;?>">Monitor <b style=" font-weight:700;">System</b></div>
                <div class="site-slogan" style=" font-size:13px; <?=$slogan_m_top2;?>; <?=$slogan_m_left2;?> color:#f9d916; ">Version <b>2.0</b></div>
            </a>
            
        </div>
        <div class="clearfix"></div>
        
        <!-- menu profile quick info -->
        <div class="profile clearfix" style=" border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:10px;">
            <div class="profile_pic" <?=($turnFadein=='Yes')?'style="display:none;"':''?>>
                <img src="<?=($userInfo->picture!=NULL)?$userInfo->picture:'images/user.png';?>" alt="User Picture" class="img-circle profile_img" style="border:none; padding:0; box-shadow:1px 1px 6px rgba(0,0,0,0.3); width:56px; height:56px;" />
            </div>
            <div class="profile_info">
                <!--<span style=" font-size:14px; font-weight:300; color:rgba(255,255,255,0.6);">ยินดีต้อนรับ</span>-->
                <h2 style="padding-top:5px;"><?=$_SESSION['username']?></h2>
                <h5 id="perid_<?=$_SESSION['permission']?>"><?=$usePermis->name[$_SESSION['permission']]?></h5>
            </div>
        </div>
        <!-- /menu profile quick info -->
        
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        
        	<div class="menu_section" style="margin-bottom:15px;">
            	<ul class="nav side-menu">
                	<li><a href="dashboard.php" class="dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="transaction_lists.php" class="dashboard"><i class="fa fa-fw fa-circle-o-notch fa-spin"></i> Sold Transaction</a></li>
                </ul>
			</div>

			<div class="menu_section">
            	<h3 style="color:#f9d916;">Report & Analysis</h3>
                <ul class="nav side-menu">
                	<? /*<li><a><i class="fa fa-fw fa-line-chart"></i> Financial <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        	<!--<li><a href="finance_profitandloss.php">Profit & Loss</a></li>
                            <li><a href="finance_estimate_cashin.php">Estimate Cash-In</a></li>
                            <li><a href="finance_cashin_kiosks.php">Cash'n Kiosk</a></li>
                            </ul>
                    </li>*/ ?>
                	<li><a><i class="fa fa-fw fa-bar-chart"></i> Sales Report <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="sales_monthly.php">Monthly Report</a></li>
                            <li style="border-top:2px solid rgba(255,255,255,0.1);"><a href="sales_kiosks.php">Kiosks Report</a></li>
                            <li><a href="sales_kiosks_slowmoving.php">Slow Moving Kiosk</a></li>
                            <li><a href="sales_kiosks_nonactive.php">Last-Active Kiosk</a></li>
                            <li style="border-top:2px solid rgba(255,255,255,0.1);"><a href="sales_products.php">Products Report</a></li>
                            <li><a href="sales_products_slowmoving.php">Slow Moving Products</a></li>
                            <li style="border-top:2px solid rgba(255,255,255,0.1);"><a href="sales_period.php">Sales Period</a></li>
                            <li><a href="sales_location.php">Sales Location</a></li>
                        </ul>
					</li>
                    <? /*<li><a><i class="fa fa-fw fa-list-ol"></i> Plan-O-Gram <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="plan_slot.php">Slot Planogram</a></li>
                            <!--<li><a href="plan_location.php">Location Plan</a></li>-->
                        </ul>
                    </li> 
					<li><a href="topup_lists.php"><i class="fa fa-fw fa-fax"></i> Topup Channel</a></li>*/ ?>
                    <li><a><i class="fa fa-fw fa-file-excel-o"></i> Export <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        	<li><a href="export_sold.php" target="_blank">Sold Report via Account</a></li>
                            
						</ul>
                    </li>
				</ul>
           </div>
           
            <div class="menu_section">
                <h3 style="color:#1abb9c;">Management</h3>
                <ul class="nav side-menu">

                    <li class=" <?=($pageTitle == 'Kiosks')?'active':''?>"><a><i class="fa fa-fw fa-building-o"></i> Kiosks <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style=" <?=($pageTitle == 'Kiosks')?'display:block;':''?>">
                        	
                            <li><a href="kiosk_lists.php">Kiosk Lists</a></li>
                            <!--<li><a href="kiosk_add.php">Kiosk Add</a></li>
                            <!--<li><a href="kiosk_balance.php">Kiosk Balance</a></li>

                            <li style="border-top:2px solid rgba(255,255,255,0.1);"><a href="kiosk_model_lists.php">Model Lists</a></li>
                            <li><a href="kiosk_model_add.php">Model Add</a></li>-->
                            
                        </ul>
                    </li>  
                    <?php /*
                    <li><a><i class="fa fa-fw fa-truck"></i> VanSales <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        	<li><a href="vansale_lists.php">Vansale Lists</a></li>
                            <li><a href="vansale_add.php">Vansale Add</a></li>
                        </ul>
                    </li> 
                    
                    <li><a><i class="fa-fw glyphicon glyphicon-road"></i> Route <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        	<li><a href="route_lists.php">Route Lists</a></li>
                            <li><a href="route_add.php">Route Add</a></li>
                        </ul>
                    </li>  */?>                 
                    <? if($_SESSION['permission']<3) : ?>
                    <li><a><i class="fa fa-fw fa-flask"></i> Products <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="product_lists.php">Product Lists</a></li>
                            <li><a href="product_add.php">Product Add</a></li>
                            <li style="border-top:2px solid rgba(255,255,255,0.1);"><a href="category_lists.php">Category Lists</a></li>
                            <li><a href="category_add.php">Category Add</a></li>
                        </ul>
                    </li>
                    <? endif ?>
                    
                    <li><a><i class="fa fa-fw fa-file-text-o"></i> Technical Report<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">	
                            <li><a href="transaction_checkin.php">Kiosk Check-in</a></li>
                            <li><a href="transaction_reset.php">Kiosk Reset</a></li>
						</ul>
                    </li>
                    
                </ul>
            </div> 
            
            <? if($_SESSION['permission']<3) : ?>
            <div class="menu_section" style="border-top: 1px solid rgba(255,255,255,0.1);">
                <h3 style="color:#ff4500;">Admin Control</h3>
                <ul class="nav side-menu">
                                   
                    <li><a><i class="fa fa-fw fa-download"></i>Slot<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        	<li><a href="slot_autofill.php">Slot Auto-Fill</a></li>
                            <li><a href="slot_log.php">Slot Technical LOG</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-fw fa-user"></i> Staffs<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        	<li><a href="staff_qrcode.php"><i class="fa fa-fw fa-qrcode" style=" vertical-align:bottom;"></i> QR Code</a></li>
                        	<li><a href="staff_approve.php"><i class="fa fa-fw fa-check-square-o" style=" vertical-align:bottom;"></i> Approve Staffs</a></li>
                            <li><a href="staff_lists.php">Staff Lists</a></li>
                            <li><a href="staff_lists_archived.php">Archived Lists</a></li>
                            <li style="border-top:2px solid rgba(255,255,255,0.1);"><a href="user_permission_lists.php">Permission Lists</a></li>
                            <li><a href="user_permission_add.php">Permission Add</a></li>
                        </ul>
                    </li> 
                    
                    <li><a href="command.php" class="dashboard"><i class="fa fa-fw fa-share"></i> Send Command</a></li>

                </ul>
            </div>
            <? endif; ?>
        
        </div><!-- /sidebar menu -->
        
        <? /*
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
		*/ ?>
        
	</div>
</div><!-- /.col-md-3 left_col --> 

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-fw fa-bars"></i></a>
            </div>
            
            <div class="nav navbar-nav navbar-left" style="padding: 9px 5px 0;">
            	<div style="font-size:13px; font-weight:500; color:#26B99A ;"><?= date('Y-m-d H:i:s') ?></div> 
                <div style="font-size:13px; font-weight:300; color:#aaa;">Server Time Zone</div>
            </div>
        
            <ul class="nav navbar-nav navbar-right navbar-users">
                
                <li class="user-info">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?=($userInfo->picture!=NULL)?$userInfo->picture:'images/user.png';?>" class="" />
						<?=$_SESSION['username']?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul id="userid_<?=$_SESSION['userid']?>" class="dropdown-menu dropdown-usermenu pull-right">
                    <? /*
                        <li><a href="javascript:;"> Profile</a></li>
                        <li><a href="javascript:;"><span class="badge bg-red pull-right">50%</span><span>Settings</span></a></li>
                        <li><a href="javascript:;">Help</a></li> */ ?>
                        <li></li>
                        <li><a href="logout.php"><i class="fa fa-fw fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
                
                <?php //Check waiting staffs                  
					$waitStaff = new lineusers();
					$waitStaff->status = 99;
					$waitStaff->loadmany(); 
					
                	if($waitStaff->totalitems){ 
				?>
				<li class="user-approve">
                    <a href="staff_approve.php" title="รายชื่อรออนุมัติ">
						<i class="fa fa-user-plus" style="vertical-align: middle; font-size:25px; color:#999;"></i>
						<div class="badge" style="color:#fff; font-weight: bold; background-color:red; font-size:15px; margin-left: -5px;"><?=abs($waitStaff->totalitems);?></div>
					</a>                                           
				</li>
                <? } // end waiting staffs ?>
                
               
            </ul> 
            
        </nav>
    </div>
</div>
<!-- /top navigation -->
