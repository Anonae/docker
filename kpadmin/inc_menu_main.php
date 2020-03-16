
<?php require_once 'inc_head_href.php'; ?>


<div class="left_col scroll-view">
   <style type="text/css">
        /* Toggle Menu */
        .nav-md .site-slogan { opacity:1; margin-left:65px; transition:.2s;}
        .nav-sm .site-slogan { opacity:0; margin-left:55px; transition:.2s;}
    </style>
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title">
                <img src="images/logo-tcp-white.png" alt="TCP Logo" class="profile_img" style=" width:50px; margin-top:-7px;" />
                <div class="site-slogan" style=" font-size:16px; margin-top:-65px;">Monitor <b style=" font-weight:700;">System</b></div>
                <div class="site-slogan" style=" font-size:13px; margin-top:-40px; color:#f9d916; ">Version <b>2.0</b></div>
            </a>
        </div>
        <div class="clearfix"></div>
        
        <!-- menu profile quick info -->
        <div class="profile clearfix" style=" border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:10px;">
            <div class="profile_pic" >
                <img src="https://profile.line-scdn.net/0hoLlPM7nQMGNRKR-IIatPNG1sPg4mBzYrKU0rBCQtOQN6Tn49aR0tViZ-OlZ1S3U2Okp5VnYsPFF9" alt="User Picture" class="img-circle profile_img" style="border:none; padding:0; box-shadow:1px 1px 6px rgba(0,0,0,0.3); width:56px; height:56px;" />
            </div>
            <div class="profile_info">
                <!--<span style=" font-size:14px; font-weight:300; color:rgba(255,255,255,0.6);">ยินดีต้อนรับ</span>-->
                <h2 style="padding-top:5px;">MANA-WinkWhite Sys S</h2>
                <h5 id="perid_2">Administrator</h5>
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

                    <li class=" "><a><i class="fa fa-fw fa-building-o"></i> Kiosks <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style=" ">
                        	
                            <li><a href="kiosk_lists.php">Kiosk Lists</a></li>
                            <!--<li><a href="kiosk_add.php">Kiosk Add</a></li>
                            <!--<li><a href="kiosk_balance.php">Kiosk Balance</a></li>

                            <li style="border-top:2px solid rgba(255,255,255,0.1);"><a href="kiosk_model_lists.php">Model Lists</a></li>
                            <li><a href="kiosk_model_add.php">Model Add</a></li>-->
                            
                        </ul>
                    </li>  
                                     
                                        <li><a><i class="fa fa-fw fa-flask"></i> Products <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="product_lists.php">Product Lists</a></li>
                            <li><a href="product_add.php">Product Add</a></li>
                            <li style="border-top:2px solid rgba(255,255,255,0.1);"><a href="category_lists.php">Category Lists</a></li>
                            <li><a href="category_add.php">Category Add</a></li>
                        </ul>
                    </li>
                                        
                    <li><a><i class="fa fa-fw fa-file-text-o"></i> Technical Report<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">	
                            <li><a href="transaction_checkin.php">Kiosk Check-in</a></li>
                            <li><a href="transaction_reset.php">Kiosk Reset</a></li>
						</ul>
                    </li>
                    
                </ul>
            </div> 
            
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
                    
        </div><!-- /sidebar menu -->
        
                
	</div>

<?php require_once('inc_footer_script.php');?>