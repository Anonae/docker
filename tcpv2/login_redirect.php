<?
session_start();
include ("../main_include.php");
$loginsession = new loginsession();
$loginsession->sessionid =  session_id();
$last5mins = time() - 5*60;
if($loginsession->load()){ // already set
	if($loginsession->allowuserid > 0 && $loginsession->lastupdate > $last5mins ){
		$lineuser = new lineusers();
		$lineuser->id = $loginsession->allowuserid;
		if($lineuser->load()){
			$_SESSION['userid'] = $lineuser->id;
			$_SESSION['username'] = $lineuser->name;
			$_SESSION['permission'] = $lineuser->per_id;
			ROOT::query("DELETE FROM loginsession WHERE lastupdate < {$last5mins}");
			//ROOT::redirect("dashboard.php");
		}
		echo "OK";
		die();
	}
}
echo "FAIL";
