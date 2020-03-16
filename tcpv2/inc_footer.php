<?php 
    if(date('Y-m-d') == $meeting_date || date('Y-m-d') == "2019-06-21" ) { 
       $web_name = "Smart Vending " ;
    } else {
       $web_name = "TCP " ;  
    }
?>

<!-- footer content -->
<footer>
    <div class="pull-right">
    <b class="b600"><?=$web_name;?></b> Admin <b class="b600">System</b>, Develop by <a href="http://advws.com/" target="_blank"><b class="b600">Advws PCL.</b></a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->