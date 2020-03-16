<?php

class Setting {
	public static function getChannelAccessToken(){
		$channelAccessToken = "ftPAky3OTkihNn7/VzEAw+z+4UCwdBLqtPOHsolbGrKJB22INDZKEAOTMSFqLCQXEYuwjG7MfAoGTazvK2VylUca6GGriQDbYH8M/NS2R2pSgdcMiAnQhM+XOpZsJk/nUl22Afr/ObB0clrk+D1egQdB04t89/1O/w1cDnyilFU=";
		return $channelAccessToken;
	}
	public static function getChannelSecret(){
		$channelSecret = "e5c264409f246a7e21e195429e3829a2";
		return $channelSecret;
	}
	public static function getApiReply(){
		$api = "https://api.line.me/v2/bot/message/reply";
		return $api;
	}
	public static function getApiPush(){
		$api = "https://api.line.me/v2/bot/message/push";
		return $api;
	}
	public static function getProfile(){
		$api = "https://api.line.me/v2/bot/profile/";
		return $api;
	}	
}
