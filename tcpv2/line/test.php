<?
$from_line = file_get_contents('php://input');
include("../../main_include.php");

require_once ('./linebot.php');
echo "TEST";
$bot = new Linebot();
$res = $bot->getUserProfile('Ub11851038609f394401ba3ea9a69b815');

echo $res;