<?php // Script on PAGE
include("../main_include.php");

$receive = json_decode(file_get_contents('php://input'));

//CMD GetSlotDetail //////////////////////////////////////////////////
include("api_getslotdetail.php");

//CMD Kiosk Check-in //////////////////////////////////////////////////
include("api_kioskcheckin.php");

//CMD Buy //////////////////////////////////////////////////
if($receive->cmd == 'buy'){
  include("api_buy.php");
}

if($receive->cmd == 'todo'){
  include("api_todo.php");
}

// Service Mode
include("api_servicemode.php");
