
<div class="dataTables_length">
    <label>Record/Page 
        <select name="display" class="form-control input-sm autoFilter" onchange="this.form.submit()">
            <option value="10" <?=($display==10)?'selected':''?>>10</option>
            <option value="25" <?=($display==25)?'selected':''?>>25</option>
            <option value="50" <?=($display==50)?'selected':''?>>50</option>
            <option value="100" <?=($display==100)?'selected':''?>>100</option>	
            <option value="1000" <?=($display=='1000')?'selected':''?>>1000</option>
            <? if($pageTitle == 'Transaction'): ?>
            <option value="ALL" <?=($display=='ALL')?'selected':''?>>ALL</option>
            <? endif ?>
        </select>
    </label>
</div>

<?php
$total_pages = ceil( $total_record / $page_show ) ;
// find record
if($total_record < $page_show): $page = 1; endif; 
$record_start = (($page-1)*$page_show) ;
$record_end = $page * $page_show ;
	
// range of num links to show
$range = 2;
$page_start = $page - $range;
$page_end = ($page + $range)  + 1;
if($page==1){ $page_end = $page_end+2; } elseif($page==2) { $page_end = $page_end+1; }
if($page==$total_pages){ $page_start = $page_start-2; } elseif($page==($total_pages-1)) { $page_start = $page_start-1; }
?>
<?	ob_start(); //Start HTML Pagination
		$filterGET = '&kioskid='.$kioskid.'&productid='.$productid.'&display='.$display.'&datefrom='.$datefrom.'&date='.$date.'&onhour='.$onhour.'&search='.$search.'&refill='.$refill.'&action=filtered&trntype='.$trntype.'&permisid='.$permisid.'&slotid='.$slotid.'&slotaction='.$slotaction;
?>
<div class="dataTables_paginate paging_simple_numbers">
    <ul class="pagination">
        <!-- Previous -->
        <? if ($page) { $prevpage = ($page - 1); } else { $prevpage = 0; } ?>
        <? /*<li class="paginate_button previous <?=($prevpage>0)?'':'disabled'?>"><a href="?page=<?=$prevpage?><?=$filterGET?>">Previous</a></li>*/ ?>
        <!-- First -->
        <? if ($page > $range+1) : ?>
            <li class="paginate_button "><a href="?page=1<?=$filterGET?>">1</a></li>
            <? if ($page > $range+2){ ?><li class="paginate_button disabled"><a href="#">…</a></li><? } ?>
        <? endif; ?>
        
        <!-- Main Loop -->
        <? for ($xPG = $page_start; $xPG < $page_end; $xPG++) : ?>
            <? if (($xPG > 0) && ($xPG < $total_pages)) : ?>
                <? if($xPG == $page): // current page ?>
                <li class="paginate_button active"><a href="?page=<?=$xPG?><?=$filterGET?>"><?=$xPG?></a></li>
                <? else: ?>
                <li class="paginate_button "><a href="?page=<?=$xPG?><?=$filterGET?>"><?=$xPG?></a></li>
                <? endif; ?>
            <? endif; ?>
        <? endfor; ?>
        
        <!-- Last -->
        <? if ($page < $total_pages-($range)) : ?>
            <? if ($page < $total_pages-($range+1)) { ?><li class="paginate_button disabled"><a href="#">…</a></li><? } ?>
            <li class="paginate_button "><a href="?page=<?=$total_pages?><?=$filterGET?>"><?=$total_pages?></a></li>
        <? endif; ?>
        <!-- Next -->
        <? $nextpage = $page + 1; ?>
        <? /*<li class="paginate_button next <?=(($page)<$total_pages)?'':'disabled'?>"><a href="?page=<?=$nextpage?><?=$filterGET?>">Next</a></li>*/ ?>
    </ul>
</div>

<? $pagination_pattern = ob_get_flush() //End HTML Pagination ?>
