<style type="text/css">
/* Slot Box */
.slotbox .bannedText { text-align:center; font-size:13px; font-weight:600; border-radius:5px 0 0; position: absolute; width: calc(100% - 4px); 
	background-color: rgba(255,0,0,0.8); color: #fff; z-index: 10; padding: 20px 10px 10px; height: 126px; }
.slotbox .bannedText >b { font-size:28px;}
.slotbox { padding:0; padding-top:10px;}
.slotbox.width5 { width:20% !important;}
.slotbox.width10 { width:10% !important;}
.slotbox.width12 { width:8.3333333333333% !important;}
.slotbox .slotbox-header { border:1px solid #73879C; background-color:#73879C; border-radius:5px 0 0 0; padding:0; text-align:right;}
.slotbox .slotbox-header .slotText { color:rgba(255,255,255,0.3);}
.slotbox .slotbox-content { border:1px solid #73879C; padding:2px 19px 2px 3px; background-color:#fff; min-height:105px; position:relative; text-align:center;}
.slotbox .product { text-align:center; width:100%; position:relative; display:inline-block; padding:15px 2px 10px; margin-top:3px;				
	transition:.3s; background-color:#fff; border:0px solid #fff; border-radius:0 5px 0 0; }
.slotbox .product-plus { margin:0 auto; display:inline-block; font-weight:300; font-size:16px; padding-top:15%; color:#eee;}
.slotbox .product>img { margin:0 auto; max-height:65px; width:auto; filter: grayscale(0%); opacity:1; transition:.1s;}
.slotbox .product>i { display:none; position:absolute; top:-1px; left:-1px;background-color:#ddd;color:#fff;border-radius:0 0 6px 0;font-size:10px;text-align: center;font-style: normal; z-index:8;
	width:fit-content; min-width:16px; padding:0px 3px 1px;}
.slotbox .product>.price {  border:1px solid #2A3F54; border-radius:5px; background-color:#2A3F54; width:100%; text-align:center; display:grid; padding-top:2px; 
	transition:.3s; opacity:0; height:1px; }
.slotbox .product>.price>b { background-color:#fff; line-height:16px; font-size:13px; font-weight:700; margin:0 auto; color:#2A3F54; width: 60px; height:16px; display:none;}
.slotbox .product>.price>b>small { font-size:10px; font-weight:300; margin-left:2px; color:#999;}
.slotbox .product>.price.retail>b { color:red;}
.slotbox .stock { position:absolute; top:5px; right:3px; transform: rotate(180deg); text-align:left;}
.slotbox .stock .stock-quantity { transform: rotate(180deg); display:block; font-size:11px; font-weight:700; text-align:center; color:#000;}
.slotbox .stock .stock-stack { background-color:#fefefe; border:1px solid #ddd; display:block; height:3px; width:12px; margin-bottom:1px;}
.slotbox .stock .progress { margin-bottom:0; height:65px; width:12px; background-color: #fff; box-shadow: inset 0 0px 10px rgba(0,0,0,0.2); border:1px solid #8a9bac;}
.slotbox .stock .progress .progress-bar { width:12px; box-shadow:none;}
.slotbox .stock .progress .progress-bar-striped { background-size: 10px 10px;}
.slotbox .stock .progress .bar-red { background-color:#ff2500;}
.slotbox .stock .progress .bar-orange { background-color:#ffa500;}
.slotbox .stock .progress .bar-green { background-color:#26b99a;}
.slotbox .stock .progress .bar-full { background-color:#3498db;}
.slotbox .stock .stock-capacity { transform: rotate(180deg); display:block; font-size:11px; font-weight:700; text-align:center; color:#000;}
/* modalAction */
.slotbox a.modalAction { display:contents; cursor:pointer;}
.slotbox a.modalAction:hover .slotbox-header { border:1px solid #ff8200; background-color:#ff8200; transition:.3s;}
.slotbox a.modalAction:hover .slotbox-header .slotText { color:rgba(255,255,255,1);}
.slotbox a.modalAction:hover .slotbox-content { border:1px solid #ff8200; background-color:#eaeaea; transition:.3s;}
.slotbox a.modalAction .hoverText { opacity:0; width:93%; position:absolute; transition:.1s; bottom:0px; z-index:9; padding:2px 8px; 
	background-color:rgba(0,0,0,0.6); color:#fff; border-radius: 4px; line-height: 30px;}
.slotbox a.modalAction:hover .hoverText { opacity:1; bottom:36px; transition:.3s;}


/* SlotShow*/
.slotshow .slotbox a.modalAction .slotbox-content { border: 1px solid #c0c0c0; border-left-width:3px; border-right-width:3px;}
.slotshow .slotbox a.modalAction:hover .slotbox-content { border-left-width:3px; border-right-width:3px; background-color:#ddd;}
.slotshow .slotbox a.modalAction .slotbox-content .slot-number { position:absolute; left:0; top:0; border-radius:0 0 6px 0; z-index:9;
	background-color:#eee; color:#999; width:28px; height:21px; }
.slotshow .slotbox a.modalAction .hoverText { width:calc(100% - 3px);}
#slotbox-display { position:relative; margin:0;}
.slotshow .slotbox { position:absolute; height:110px; }
.slotshow .slotbox:nth-child(5n+1) { top:0px;}
.slotshow .slotbox:nth-child(5n+2) { top:118px;}
.slotshow .slotbox:nth-child(5n+3) { top:236px;}
.slotshow .slotbox:nth-child(5n+4) { top:354px;}
.slotshow .slotbox:nth-child(5n+5) { top:472px;}
.slotshow .slotbox .product { height:108px;}
.slotshow .slotbox .product>img { transform: rotate(-90deg); margin-top: -15px;}
.slotshow .slotbox .product>i { right:-1px; left:inherit; border-radius:0 0 0 3px; display:none;}
.slotshow .slotbox .product .name { position:absolute; bottom:0; font-family:Tahoma; font-size: 0.7vw; font-weight:300; text-align:center; width: calc(100% - 3px);}
.slotshow .slotbox .stock .progress { height:75px; border:1px solid #cacaca;}

/* ////////////////////////////////////////////////////////////// */
/* KioskShow */
.kioskshow .slotbox a.modalAction { cursor: default;}
.kioskshow .slotbox a.modalAction .slotbox-content { border: 0px solid #c0c0c0; padding: 2px;}
.kioskshow .slotbox a.modalAction:hover .slotbox-content { background-color:#ddd;}
.kioskshow .slotbox a.modalAction .slotbox-content .slot-number { position:absolute; left:0; top:0; border-radius:0 0 6px 0; z-index:9;
	background-color:#eee; color:#999; width:28px; height:21px; }
.kioskshow .slotbox .slotbox-header { opacity:0; transition:.2s;}
.kioskshow .slotbox .slotbox-content { border:none; background-color: transparent;}
.kioskshow .slotbox .product { padding:5px 2px 2px; margin-top:0; transition:.3s; background-color:#fff;}
.kioskshow .slotbox .product>img { filter: grayscale(0%); opacity:1; transition:.3s; transform: rotate(0); margin: 10px 8%;}
.kioskshow .slotbox .product-plus { opacity:0; transition:.2s;}
.kioskshow .slotbox .product>.price { margin-top:2px; opacity:1; height:22px; transition:.3s; transition-delay:0; }
.kioskshow .slotbox .product>.price>b { display:block; box-shadow: 0 1px 5px -1px rgba(0,0,0,0.3) inset; border-radius:60px; }
.kioskshow .slotbox .stock { opacity:0; transition:.1s;}
/* modalAction */
.kioskshow .slotbox a.modalAction:hover .slotbox-header { border:1px solid transparent; background-color: transparent; transition:.3s;}
.kioskshow .slotbox a.modalAction:hover .slotbox-content { border:none; background-color:transparent; transition:.3s;}
.kioskshow .slotbox a.modalAction:hover .hoverText { opacity:0;}

</style>

<script type="text/javascript">

function kioskGen(){	
	$(".btn-kioskshow").addClass("btn-info"); $(".btn-slotshow").removeClass("btn-info"); 
	$("#slotbox-display").addClass("kioskshow"); $("#slotbox-display").removeClass("slotshow"); 
	$('.modalAction').attr('data-target',''); 
	//Calc
	canvasHeight = (118*5)+30; //each slotbox * 5 row + margin-bottom 15px;
	$('#slotbox-display').height(canvasHeight);
	canvasWidth = $('#slotbox-display').width(); //console.log('canvasWidth-> '+canvasWidth);
	slotWidth = ((canvasWidth*10)/100)-4;
	$('.slotbox').width(slotWidth); //console.log('slotWidth-> '+slotWidth);
		arrModelSlotPlots = <?=json_encode($arrModelSlotPlots)?>; console.log(arrModelSlotPlots)
		for ( var x = 1; x <= <?=$loadMOD->slot_amount?>; x++){ //console.log(x);
			if(jQuery.inArray(x.toString(), arrModelSlotPlots) != -1){ $('#loadSLOT_' + x).width(slotWidth*2); } //console.log(x+'-> '+jQuery.inArray(x.toString(), arrModelSlotPlots)); }
		}
	$('.slotbox').css('float','left');
	$('.slotbox .product img').css('min-height','65px');
	$('.slotbox .product img.secondIMG').fadeIn(300);
	$('.slotbox .product .name').hide();
	$('.slotbox .stock .progress').css('height','64px');
	//$('.modalAction').attr('data-target','');
	//Done then Show
	$('.slotbox').removeClass('sr-only'); console.log('show-> kiosk display');
}

function canvasGen(){	
	$(".btn-slotshow").addClass("btn-info"); $(".btn-kioskshow").removeClass("btn-info"); 
	$("#slotbox-display").addClass("slotshow"); $("#slotbox-display").removeClass("kioskshow");
	$('.modalAction').attr('data-target',''); $('.actionDel').attr('data-target','.modalActionDel'); $('.actionSetup').attr('data-target','.modalActionSetup');
	//Calc
	canvasHeight = (118*5)+30; //each slotbox * 5 row + margin-bottom 15px;
	$('#slotbox-display').height(canvasHeight);
	canvasWidth = $('#slotbox-display').width(); //console.log('canvasWidth-> '+canvasWidth);
	slotWidth = ((canvasWidth*20)/100)-5;
	$('.slotbox').width(slotWidth); //console.log('slotWidth-> '+slotWidth);
	$('.slotbox').css('float','none');
	$('.slotbox .product img').css('min-height','100px');
	$('.slotbox .product img.secondIMG').hide();
	$('.slotbox .product .name').fadeIn(300);
	$('.slotbox .stock .progress').css('height','75px');
	for ( var x = 1; x <= <?=$loadMOD->slot_amount?>; x++){ //console.log(x);
		if(x > 5){ $('#loadSLOT_' + x).css('left',(slotWidth+5)*1); }
		if(x > 10){ $('#loadSLOT_' + x).css('left',((slotWidth+5)*2)); }
		if(x > 15){ $('#loadSLOT_' + x).css('left',((slotWidth+5)*3)); }
		if(x > 20){ $('#loadSLOT_' + x).css('left',((slotWidth+5)*4)); }
		if(x > 25){ $('#loadSLOT_' + x).css('left',((slotWidth+5)*5)); }
	}
	//Done then Show
	$('.slotbox').removeClass('sr-only'); console.log('show-> slot display');
}

$(document).ready(function(){
	canvasGen();
});
$( window ).resize(function() {
	canvasGen();
});

</script> 