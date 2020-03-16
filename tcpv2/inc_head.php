<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
// แก้ไขวันที่ ที่จะไปพบลูกค้า ที่ include / configs.php
if(date('Y-m-d') == $meeting_date OR date('Y-m-d') == "2019-06-21"){ 
   // Smart Vending 
        $favicon = "images/favicon_smart.ico"; 
    } else { 
    // TCP 
        $favicon =  "images/favicon.ico"; 
    }
?> 
    
<link rel="icon"  href="<?=$favicon;?>" type="image/ico">

<meta name="Author" content="Toonni Lomio">

<!--
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />-->