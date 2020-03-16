<?php // Script on PAGE
session_start();
include("../main_include.php");
include("../includes/config.php");
include("login_check.php");

//Site Detail
$pageTitle = "Products"; 
//$_GET
if($_GET['page']){ $page = $_GET['page']; } else { $page = 1; }
if($_GET['display']){ $display = $_GET['display']; } else { $display = 25;  }
if($_GET['search']){ $search = $_GET['search']; } else { unset($search);  }

//Products
$fetchPRD = new product();
	//SQL Query
	$sql = "WHERE `status` = 0";
	if($search){ $sql .= " AND (`product_name` LIKE '%{$search}%' OR `SKU` LIKE '%{$search}%' OR `init_price` LIKE '%{$search}%' OR `description` LIKE '%{$search}%')"; }
$fetchPRD->loadmany(" {$sql} ORDER BY product_name ASC", $display, $page);

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
            <h2><?=$pageTitle?> <b>Lists</b></h2>
        </div><!--/col-->     
    </div><!--/content-title-->
</div><!--/row-->

<? if(isset($_GET['result'])){ ?>
<div class="alert <?=($_GET['result']=='removed')?'alert-danger':'alert-success';?> alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-fw fa-close"></i></button>
	Product ID <b><?=$_GET['productid']?></b>, has been <?=$_GET['result']?> <b>Successful</b>.
    <i style="margin-left:10px; color:rgba(255,255,255,0.5);">on <?=$_GET['when']?> by <?=$_GET['bywho']?></i>
</div>
<? } ?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <p class="text-th">แสดงรายการ สินค้า ทั้งหมด <b class="text-green"><?=number_format($fetchPRD->totalrecords,0)?></b> รายการ</p>
            <div class="nav navbar-right"><a href="product_add.php" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i> Add New Product</a></div>
        </div><!--/x_title-->
        <div class="x_content">
        
        	<div class="dataTables_wrapper">
            <form id="filterForm" method="GET" class="form form-group" style="margin-bottom:6px;">
                
               <div class="top">
               		<div class="dataTables_filter">
                        <label>Search 
                            <input type="text" id="search" name="search" class="form-control input-sm autoFilter" value="<?=$search?>" onchange="this.form.submit()" />
                        </label>
                    </div>

                    <? $findPRD = $fetchPRD; $page_show = $display; $total_record = $fetchPRD->totalrecords; ?>
                    <?php require_once('inc_pagination.php'); ?>
                </div>
            </form>
            </div><!--/dataTables_wrapper-->
            
            <div class="table-responsive">
                <table id="" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>SKU</th>
                            <th style=" text-align:center;">Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Last Update</th>
                            <th style=" text-align:center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?	//bypass route()
                            $useCAT = new category(); $useCAT->loadmany(); 
                            $useCAT->name = array_combine($useCAT->id,$useCAT->name); //vd($useROT->name); die;
                    ?>
                    <? if($findPRD->totalrecords != 0): ?>
                    <? for ($x = 0; $x < $findPRD->totalitems; $x++) : $num = $x+1; ?>
                        <tr id="trPRD_<?=$findPRD->id[$x];?>">
                            <td class="ordinal"><?=$findPRD->id[$x]; ?></td>
                            <td><?=$findPRD->SKU[$x]; ?></td>
                            <td style=" text-align:center;">
                                <? if(!empty($findPRD->product_image[$x])): ?>
                                <a data-toggle="modal" data-target="#modelPrd" class="avatar_link" modal-name="<?=$findPRD->product_name[$x]; ?>">
                                    <? if(substr($findPRD->product_image[$x],0,4) == 'data'): ?>
                                    <img src="<?=$findPRD->product_image[$x]?>" class="avatar" style=" height:40px;" />
                                    <? else: ?>
                                    <img src="images/products/<?=$findPRD->product_image[$x]?>" class="avatar" style=" height:40px;" />
                                    <? endif; ?>
                                </a>
                                <? else: ?>
                                <i style="color:#ccc;">N/A</i>
                                <? endif; ?>
                            </td>
                            <td>
                                <a href="product_edit.php?productid=<?=$findPRD->id[$x]; ?>">
                                    <b class="b500"><?=$findPRD->product_name[$x]; ?></b>
                                </a>
                            </td>
                            <td class="text-right"><b class="b700"><?=$findPRD->init_price[$x]; ?></b> <small style="color:#ccc;">THB</small></td>
                            <td><?= $useCAT->name[$findPRD->category[$x]] ?></td> 
                            <td><?=$findPRD->description[$x]; ?></td>
                            <td><?=date('Y-m-d h:i:s', $findPRD->lastupdate[$x])?></td>
                            <td style=" text-align:center;">
                        	<a class="btn btn-silver btn-xs" title="edit" href="product_edit.php?productid=<?=$findPRD->id[$x]; ?>"><i class="fa fa-fw fa-pencil"></i></a>
                        </td>
                        </tr>
                    <? endfor; ?>
                    <? else: ?>
                        <tr><td colspan="9" class="noData"><i>No Data !!!</i></td></tr>
                    <? endif; ?>
                    </tbody>
                </table>
                <div class="dataTables_wrapper">
                    <div class="bottom">
                        <?= $pagination_pattern ?>
                        <div class="dataTables_info">Showing <?=number_format($record_start+1,0)?> to <?=($record_end>$total_record)?number_format($total_record,0):number_format($record_end,0)?> of <?=number_format($total_record,0)?> entries</div>
                    </div>
                </div><!--/dataTables_wrapper-->
                
            </div><!--/table-responsive-->
            
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

<!-- Modal -->
<script type="text/javascript">
$('.avatar_link').on('click', function(){
	modalWidth = $('.modal-dialog').width();
	prdName = $(this).attr('modal-name');
	prdImg = $(this).find('img').attr('src');
	$('#modelPrd .modal-title').html(prdName);
	$('#modelPrd .avatar_modal').find('img').attr('src', prdImg); 
	$('#modelPrd .avatar_modal').find('img').attr('title', prdName);
	$('#modelPrd .avatar_modal').find('img').css('max-height', modalWidth/1.5);
});
</script>
<div id="modelPrd" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            <h4 class="modal-title"><i style="color:#aaa;">Product Name</i></h4>
        </div>
        <div class="modal-body avatar_modal">
            <img src="" class="img-responsive" title="" style="margin:0 auto;" />
        </div>
    </div>
    </div>
</div>
