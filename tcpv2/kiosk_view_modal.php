<div class="modal fade modalActionSetup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                <h4 class="modal-title">
                    ช่องเก็บสินค้า หมายเลข <b style="font-weight:700;" class="showSlotID"></b>
                </h4>
                <p class="text-help doubleSlotDisplay" style="color:red; margin-bottom:0; font-size:13px; display:none;">* ช่องเก็บพิเศษ สามารถกดซื้อ จากหน้าตู้ 2 ปุ่ม</p>
            </div><!--/modal-header-->
            <div class="modal-body">
                <form method="POST" novalidate>
                    <input name="action" value="setupSLOT" type="hidden" >
                    <input name="kioskInventoryID" value=""  style="display:none;" />
                    <input name="slotid" value=""  style="display:none;" />
                    <input name="bywho" value="" style="display:none;" />
                    <input name="when" value="" style="display:none;" />

                    <h6 class="showNonProduct" style="color:#fff; background-color:#d9534f; font-weight:400; font-size:18px; line-height:30px; margin:0 0 20px; padding:10px; transition:.3s; border-radius:3px; text-align:center; display:none;">ยังไม่มีสินค้า กรุณาเลือกสินค้า และตั้งค่า</h6>
                    
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3" style="text-align:center;">

                            <div class="showHaveProduct" style=" border:1px solid #eee; padding:10px; text-align:center; margin:0 auto; width:100%; display:none;">
                            	<img class="showProductImage" src="" style="max-height:100px;" title="" />
                            </div>

                            <div class="showNonProduct selectDivImage" style=" border:1px solid #eee; padding:10px; text-align:center; margin:0 auto; width:100%; display:none;">
                            	<i id="" class="fa fa-question" style="color:#ccc; font-weight:300; line-height:100px; font-size:80px; transition:.3s;"></i>
                            </div>

                        </div><!--/.col-->
                        
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        <table class="table" style="margin-bottom:0;">
                        <tbody>
                        <tr id="" class="productTR">
                            <td style="border-top:none; line-height:30px; padding: 0 8px 5px; width:95px;"><span class="showNonProduct">เลือก</span>สินค้า</td>
                            <td style="border-top:none; text-align:left; padding: 0 8px 5px;">

                                <div class="showHaveProduct" style="line-height:27px;">
                                    <span style="color:#ccc;">(<span class="showProductID"></span>)</span> 
                                    <b style="color:#000; font-weight:400; font-size:16px;" class="showProductName"></b>
                                    <input name="productid" value="" style="display:none;" />
                                </div>

								<div class="showNonProduct">
                                <select name="productid" class="form-control input-sm select-product" style="width:100%; font-size:13px; padding:0 5px;" required >
                                    <option value="0" selected>...</option>
                                <? $listPRD = new product(); $listPRD->status = 0; $listPRD->loadmany("ORDER BY `product_name` ASC"); ?>
                                <? for($xsprd = 0; $xsprd < $listPRD->totalrecords; $xsprd++): ?>
                                    <option value="<?=$listPRD->id[$xsprd]?>" data-name="<?=$listPRD->product_name[$xsprd]?>" data-price="<?=number_format($listPRD->init_price[$xsprd],0)?>" data-image="<?=$listPRD->product_image[$xsprd]?>">(<?=$listPRD->id[$xsprd]?>) <?=$listPRD->product_name[$xsprd]?>, <?=number_format($listPRD->init_price[$xsprd],0)?> บาท</option>
                                <? endfor; ?>
                                </select>
                                </div>

                            </td>
                        </tr>
                        <tr class="showTRPrice">
                            <td style="border-top:none; line-height:30px; padding: 0 8px 5px; width:95px;"><div style="line-height:20px; margin-top:9px;">ราคาปกติ</div></td>
                            <td style="border-top:none; text-align:left; padding: 0 8px 5px;">
                                <input class="form-control input-sm" style="width:70px;" type="number" name="price" min="0"  value="" readonly /> <div class="unit">บาท</div>
                                <a href="" target="_blank" class="btn btn-silver pull-right btn-extra" style="display:none;">Edit</a>
                            </td>
                        </tr>
                        <tr id="" class="showTRRetail">
                            <td style="border-top:none; line-height:30px; padding: 0 8px 5px; width:95px;"><div style="line-height:20px; margin-top:9px;">ราคาขายหน้าตู้</div></td>
                            <td style="border-top:none; text-align:left; padding: 0 8px 5px;">
                                <input class="form-control input-sm input-green" style="width:70px;" type="number" name="retail" min="0"  value="" /> <div class="unit">บาท</div>
                            </td>
                        </tr>
                        </tbody>
                        </table>                        
                        </div><!--/.col-->
                    </div><!--/.row-->
                     
                    <!-- Fill Data -->
                    <table class="table selectPRD" style="margin-bottom:0; margin-top:10px;">
                    <tbody>
                    
                    <tr class="showTRCapacity" style="transition:.3s;">
                        <td style="line-height:45px; padding: 5px 8px;"><div style="line-height:20px; margin-top:10px; font-size:18px;">ความจุช่องเก็บ</div></td>
                        <td style="text-align:right; padding: 5px 8px;">
                            <input class="form-control input-capacity input-mini" type="number" id="capacity_<?=$numSLOT?>" name="capacity" min="0"  value="" /> <div class="unit">ชิ้น</div>
                        </td>
                    </tr>
                    
                    <tr class="showHaveProduct">
                        <td style="line-height:45px; padding: 5px 8px;"><div style="line-height:20px; margin-top:10px; font-size:18px;">สินค้าคงเหลือภายในตู้</div></td>
                        <td style="text-align:right; padding: 5px 8px;">
                            <input  class="form-control input-mini" type="number" id="current_qty_<?=$numSLOT?>" name="current_qty" value="" readonly /> <div class="unit">ชิ้น</div>
                        </td>
                    </tr>
                    
                    <tr class="showTRQuantity" style="transition:.3s;">
                        <td style="line-height:45px; padding: 5px 8px 0;"><div style="line-height:20px; margin-top:10px; font-size:18px;">เติมสินค้าเพิ่ม</div></td>
                        <td style="text-align:right; padding: 5px 8px 0;"><i class="fa fa-2x fa-download text-green" style=" margin-right:10px;"></i>
                            <input class="form-control input-large" type="number" name="fill_qty" min="0" max="" value="" /> <div class="unit">ชิ้น</div>
                        </td>
                    </tr>
                    
                    </tbody>
                    </table>
                    <button type="submit" class="btn btn-default btn-primary btn-block btn-lg" style="margin-top:10px;">ยืนยันตั้งค่า</button>
                </form>
                
                <div class="showHaveProduct">
                    <div style=" display:table; width:100%; padding:10px 0 0; text-align:center;">
                        <a id="" data-toggle="collapse" data-target="#divDEL_<?=$numSLOT?>" style="font-size:13px; cursor:pointer; color:#aaa;">เพิ่มเติม</a>
                        <div id="divDEL_<?=$numSLOT?>" class="collapse">
                            <form class="delForm" method="POST" novalidate>
                                <input name="action" value="delSLOT" style="display:none;" />
                                <input name="slot_refid" value=""  style="display:none;" />
                                <input name="quantity" value=""  style="display:none;" />
                                <button type="submit" class="btn btn-default btn-danger btn-lg" style="margin-top:10px;"><i class="fa fa-trash" style="padding-right:10px;"></i> เอาสินค้าออก</button>
                                
                                <input name="slotid" value="" type="hidden" />
                                <input name="bywho" value="<?=$_SESSION['name']?>" type="hidden" />
        						<input name="when" value="<?=date('Y-m-d H:i:s')?>" type="hidden" />
                            </form>
                        </div>
                    </div>
                </div>
                    
            </div><!--/modal-body-->
        </div><!--/modal-content-->
    </div><!--/modal-sm-->
</div><!--/modal-->

<div class="modal fade modalActionDel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                <h4 class="modal-title">ข้อมูลสินค้า ช่องเก็บ หมายเลข <b style="font-weight:700;" class="showSlotID"></b></h4>
                <p class="text-help doubleSlotDisplay" style="color:red; margin-bottom:0; font-size:13px; display:none;">* ช่องเก็บพิเศษ สามารถกดซื้อ จากหน้าตู้ 2 ปุ่ม</p>
            </div><!--/modal-header-->
            <div class="modal-body">
                <form method="POST" novalidate>
                    <input type="hidden" name="action" value="delSLOT">
                    <input type="text" name="kioskInventoryID" value=""  style="display:none;" />
                    <input type="text" name="slotid" value=""  style="display:none;" />
                    <input type="text" name="bywho" value="" style="display:none;" />
                    <input type="text" name="when" value="" style="display:none;" />
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                            <div style=" border:1px solid #eee; padding:10px; text-align:center; margin:0 auto; width:100%;">
                            <img class="showProductImage" src="" style="max-height:160px;" title="" />
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <table class="table" style="margin-bottom:0;">
                            <tbody>
                            <tr id="" class="showModelID">
                                <td style="border-top:none; text-align:left; padding-bottom:15px;"><div>สินค้า</div>
                                    <b style="font-size:22px; line-height:30px; font-weight:500;" class="showProductName"></b>
                                    <input name="productid" value=""  style="display:none;" />
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left; border-top:1px solid #eee; padding-top:15px;"><div>มีสินค้าคงค้าง</div>
                                    <b style="font-size:60px; line-height:50px; color:#333;">
										<span class="showQuantity"></span><span style="color:#aaa; font-size:11px; font-weight:400;"> Unit</span>
                                    </b> 
                                    <input name="current_qty" value="" style="display:none;" />
                                </td>
                            </tr>
                            </tbody> 
                            </table>
                        </div>
                    </div>
                    <div style="padding:20px 5px 0;">
                        <span style="color:red;">* หากลบช่องเก็บนี้ ระบบจะทำการสร้างทะเบียน "<b style="font-size:18px; font-weight:600;">สินค้าเก็บกลับ</b>" เพื่อเก็บเป็นข้อมูลตรวจสอบต่อไป</span>
                    </div>
                    <button type="submit" class="btn btn-default btn-danger btn-block btn-lg" style="margin-top:10px;">ลบข้อมูลสินค้า</button>
                </form>
            </div><!--/modal-body-->
        </div><!--/modal-content-->
    </div><!--/modal-sm-->
</div><!--/modal--> 
 
<script type="text/javascript">
//Fix Max Fill Input
$(document).ready(function () {
	$(".input-capacity").change(function(){ 
		var id=$(this).attr('id'); id = id.replace('capacity_', ''); 
		var maxQuantity = $(this).val(); var remainQuantity = $("#current_qty_"+id).val();
		var fillQuantity = (maxQuantity - remainQuantity);
		if(fillQuantity<=0){ $("#fill_qty_"+id).attr('max', 0);}
		else{ $("#fill_qty_"+id).attr('max', fillQuantity);}
		$("#fill_qty_"+id).val(fillQuantity);
	}); 
	$(".select-product").change(function(){ 
		var id = $(this).attr('id'); id = id.replace('select_product_', ''); 
		var modalSet = $('.modalActionSetup');
		var selectPrice = $(this).find(':selected').attr('data-price'); console.log(selectPrice);
			modalSet.find('input[name="price"]').attr({'value':selectPrice});
			modalSet.find('input[name="retail"]').attr({'value':selectPrice});
		var selectName = $(this).find(':selected').attr('data-name'); console.log(selectName);
		var selectImagePath = $(this).find(':selected').attr('data-image'); console.log(selectImagePath);
		
		if($(this).val()){
			$('.selectDivImage').html('<img class="showProductImage" src="'+selectImagePath+'" style="max-height:100px;" title="'+selectName+'" />');
			//$("#image_icon_"+id).removeClass('fa-question'); $("#image_icon_"+id).addClass('fa-thumbs-o-up'); $("#image_icon_"+id).css('color','#26B99A');
			$("#capacityTR_"+id).css('opacity','1'); $("#currentTR_"+id).css('opacity','1'); 
			$("#topicH6_"+id).css({'background-color':'#26B99A'}).text('ตั้งค่าสินค้าที่เลือก และกดปุ่มยืนยัน');
			modalSet.find('tr.showTRPrice').show(); modalSet.find('tr.showTRRetail').show();
			modalSet.find('table.selectPRD').show();
			modalSet.find('input[name="fill_qty"]').attr({'value':(0)});
		}else{
			$('.selectDivImage').html('<i id="" class="fa fa-question" style="color:#ccc; font-weight:300; line-height:100px; font-size:80px; transition:.3s;"></i>');
			//$("#image_icon_"+id).removeClass('fa-thumbs-o-up'); $("#image_icon_"+id).addClass('fa-question'); $("#image_icon_"+id).css('color','#ccc');
			$("#capacityTR_"+id).css('opacity','0'); $("#currentTR_"+id).css('opacity','0'); 
			$("#topicH6_"+id).css({'background-color':'#d9534f'}).text('ยังไม่มีสินค้า กรุณาเลือกสินค้า และตั้งค่า');
			modalSet.find('tr.showTRPrice').hide(); modalSet.find('tr.showTRRetail').hide();
			modalSet.find('table.selectPRD').hide();
		}
		
	}); 
});

//SET Model
function modalSetup(obj){
	modalResetDefalut();
	//Gather Data
	var slotModelID = $(obj).find('input[name="loadslot-modelid"]').val(); 
	var slotBywho = $(obj).find('input[name="loadslot-bywho"]').val(); 
	var slotWhen = $(obj).find('input[name="loadslot-when"]').val(); 
	var slotID = $(obj).find('input[name="loadslot-id"]').val();
	var slotNumber = $(obj).find('input[name="loadslot-number"]').val();
	var slotDouble = $(obj).find('input[name="loadslot-double"]').val();
	var slotProductID = $(obj).find('input[name="loadslot-product-id"]').val(); 
	var slotProductImage = $(obj).find('input[name="loadslot-product-img"]').val(); 
	var slotProductName = $(obj).find('input[name="loadslot-product-name"]').val(); 
	var slotCapacity = $(obj).find('input[name="loadslot-capacity"]').val(); 
	var slotQuantity = $(obj).find('input[name="loadslot-quantity"]').val(); //console.log(slotQuantity);
	var slotPrice = $(obj).find('input[name="loadslot-price"]').val(); 
	var slotRetailPrice = $(obj).find('input[name="loadslot-price-retail"]').val(); 
	var slotSalePrice = $(obj).find('input[name="loadslot-price-sale"]').val(); 
	//Re-Write Modal HTML
	var modalSet = $('.modalActionSetup');
	modalSet.find('.showSlotID').html(slotNumber);
		if(slotDouble==1){ modalSet.find('p.doubleSlotDisplay').show(); }
	modalSet.find('input[name="kioskInventoryID"]').attr({'value':slotID});
	modalSet.find('input[name="slotid"]').attr({'value':slotNumber});
	modalSet.find('input[name="bywho"]').attr({'value':slotBywho});
	modalSet.find('input[name="when"]').attr({'value':slotWhen});
		if(slotProductID){
			modalSet.find('tr.showTRPrice').show(); modalSet.find('tr.showTRRetail').show();
			modalSet.find('table.selectPRD').show();
			modalSet.find('.showHaveProduct').show(); 
				modalSet.find('tr.productTR input').attr({'name':'productid','value':slotProductID});
				modalSet.find('tr.productTR select').attr({'name':''});
			modalSet.find('.showProductImage').attr({'src':slotProductImage,'title':slotProductName}); 
			modalSet.find('.showProductID').html(slotProductID);
			modalSet.find('.showProductName').html(slotProductName);
			modalSet.find('tr.showTRPrice').attr({'id':'priceTR_'+slotNumber});
				modalSet.find('input[name="price"]').attr({'value':slotPrice});
				modalSet.find('tr.showTRPrice .btn-extra').show().attr({'href':'product_edit.php?productid='+slotProductID});
			modalSet.find('tr.showTRRetail').attr({'id':'retailTR_'+slotNumber});
				modalSet.find('input[name="retail"]').attr({'value':slotRetailPrice});
			modalSet.find('tr.showTRCapacity').attr({'id':'capacityTR_'+slotNumber}).css({'opacity':1});
				modalSet.find('tr.showTRCapacity input').removeClass('input-large input-green').addClass('input-mini');
				modalSet.find('input[name="capacity"]').attr({'id':'capacity_'+slotNumber,'value':slotCapacity});
			modalSet.find('tr.showTRQuantity').attr({'id':'currentTR_'+slotNumber}).css({'opacity':1});
				modalSet.find('input[name="current_qty"]').attr({'id':'current_qty_'+slotNumber,'value':slotQuantity}); //console.log(slotQuantity);
				modalSet.find('input[name="fill_qty"]').attr({'id':'fill_qty_'+slotNumber,'value':(slotCapacity-slotQuantity),'max':(slotCapacity-slotQuantity)});
			
		} else { 
			modalSet.find('tr.showTRPrice').hide(); modalSet.find('tr.showTRRetail').hide();
			modalSet.find('h6.showNonProduct').show().attr({'id':'topicH6_'+slotNumber});
			modalSet.find('.showNonProduct').show(); 
				modalSet.find('tr.productTR input').attr({'name':''});
				modalSet.find('tr.productTR select').attr({'name':'productid'});
			//Clear Data
			modalSet.find('tr.productTR select').val(0);
			$('.selectDivImage').html('<i id="" class="fa fa-question" style="color:#ccc; font-weight:300; line-height:100px; font-size:80px; transition:.3s;"></i>');
			modalSet.find('h6').css({'background-color':'#d9534f'}).text('ยังไม่มีสินค้า กรุณาเลือกสินค้า และตั้งค่า');
				
			modalSet.find('tr.showTRCapacity').attr({'id':'capacityTR_'+slotNumber}).css({'opacity':1});
				modalSet.find('tr.showTRCapacity input').removeClass('input-mini').addClass('input-large input-green');
				modalSet.find('input[name="capacity"]').attr({'id':'capacity_'+slotNumber,'value':0});
			modalSet.find('tr.showTRQuantity').attr({'id':'currentTR_'+slotNumber}).css({'opacity':1});
			modalSet.find('table.selectPRD').hide();
			
		}
	modalSet.find('.showModelID').attr({'id':'modelID_'+slotModelID});
	modalSet.find('select[name="productid"]').attr({'id':'select_product_'+slotNumber});
	modalSet.find('.fa-question').attr({'id':'image_icon_'+slotNumber});
	
	//Remove PRD
	var removeSet = $('form.delForm');
	removeSet.find('input[name="slotid"]').attr({'value':slotNumber});  console.log('slotNumber-> '+slotNumber);
	removeSet.find('input[name="slot_refid"]').attr({'value':slotID});  console.log('slotID-> '+slotID);
	removeSet.find('input[name="quantity"]').attr({'value':slotQuantity});  console.log('slotQuantity-> '+slotQuantity);
	
}
//Del Modal
function modalDel(obj){
	modalResetDefalut();
	//Gather Data
	var slotModelID = $(obj).find('input[name="loadslot-modelid"]').val(); 
	var slotBywho = $(obj).find('input[name="loadslot-bywho"]').val(); 
	var slotWhen = $(obj).find('input[name="loadslot-when"]').val(); 
	var slotID = $(obj).find('input[name="loadslot-id"]').val();
	var slotNumber = $(obj).find('input[name="loadslot-number"]').val(); 
	var slotDouble = $(obj).find('input[name="loadslot-double"]').val();
	var slotProductID = $(obj).find('input[name="loadslot-product-id"]').val(); 
	var slotProductImage = $(obj).find('input[name="loadslot-product-img"]').val(); 
	var slotProductName = $(obj).find('input[name="loadslot-product-name"]').val(); 
	var slotCapacity = $(obj).find('input[name="loadslot-capacity"]').val(); 
	var slotQuantity = $(obj).find('input[name="loadslot-quantity"]').val(); 
	//Re-Write HTML
	var modalDel = $('.modalActionDel');
	modalDel.find('.showSlotID').html(slotNumber);
		if(slotDouble==1){ modalDel.find('p.doubleSlotDisplay').show(); }
	modalDel.find('input[name="slot_refid"]').val(slotID);  
	modalDel.find('input[name="slot_id"]').val(slotNumber);  
	modalDel.find('input[name="prd_id"]').val(slotProductID); 
	modalDel.find('input[name="quantity"]').val(slotQuantity);
	modalDel.find('input[name="bywho"]').val(slotBywho);
	/*modalDel.find('.showProductImage').attr({'src':slotProductImage,'title':slotProductName});
	modalDel.find('.showModelID').attr({'id':'modelID_'+slotModelID});
	modalDel.find('.showProductName').html(slotProductName);
	modalDel.find('.showQuantity').html(slotQuantity);
	modalDel.find('input[name="current_qty"]').val(slotQuantity);*/
}
function modalResetDefalut(){
	//Re-Set Default
	var modalDefault = $('.modal');
	modalDefault.find('tr.showTRCapacity').css({'opacity':0});
	modalDefault.find('tr.showTRQuantity').css({'opacity':0});
	modalDefault.find('.doubleSlotDisplay').hide();
	modalDefault.find('.showHaveProduct').hide();
	modalDefault.find('.showNonProduct').hide(); 	
	modalDefault.find('input[name="price"]').attr({'value':0});
	modalDefault.find('input[name="retail"]').attr({'value':0});
}

</script>
