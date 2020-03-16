<?php

require_once ('./setting.php');

class Linebot {
	private $channelAccessToken;
	private $channelSecret;
	private $webhookResponse;
	private $webhookEventObject;
	private $apiReply;
	private $apiPush;
	
	public function __construct(){
		$this->channelAccessToken = Setting::getChannelAccessToken();
		$this->channelSecret = Setting::getChannelSecret();
		$this->apiReply = Setting::getApiReply();
		$this->apiPush = Setting::getApiPush();
		$this->apiProfile = Setting::getProfile();
		//$advws_system->{"events"}[0] = file_get_contents('php://input');
		
		//$this->webhookResponse =file_get_contents('php://input');
		$this->webhookResponse=$_POST;
		//$this->webhookResponse = file_get_contents('php://input');
		$this->webhookEventObject = json_decode($this->webhookResponse);
//		echo $this->channelAccessToken;
		//print_r($this->webhookEventObject);
//		die("GOT THIS");
		//echo "GOT WEB HOOK";
		//echo $this->webhookEventObject;
	}
	
	private function httpPost($api,$body){
		$ch = curl_init($api); 
		
		if($body){
			curl_setopt($ch, CURLOPT_POST, true); 
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
		}else{			
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); 			
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		if($body){
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body)); 
		
			curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
		'Content-Type: application/json; charser=UTF-8', 
		'Authorization: Bearer '.$this->channelAccessToken)); 
		}else{
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
		'Authorization: Bearer '.$this->channelAccessToken)); 			
		}
		$result = curl_exec($ch); 
		curl_close($ch); 
		return $result;
	}
	
	public function reply($text){
		$api = $this->apiReply;
		$webhook = $this->webhookEventObject;
		$replyToken = $webhook->{"replyToken"}; 
		$body["replyToken"] = $replyToken;
		$body["messages"][0] = array(
			"type" => "text",
			"text"=>$text
		);
		
		$result = $this->httpPost($api,$body);
		return $result;
	}
	
	public function push($body){
		$api = $this->apiPush;
		$result = $this->httpPost($api, $body);
		return $result;
    	}
    	public function pushText($to, $text){
		$body = array(
		    'to' => $to,
		    'messages' => [
			array(
			    'type' => 'text',
			    'text' => $text
			)
		    ]
		);
		$this->push($body);
	 }
   	 public function pushImage($to, $imageUrl, $previewImageUrl = false){
        	$body = array(
		    'to' => $to,
		    'messages' => [
			array(
			    'type' => 'image',
			    'originalContentUrl' => $imageUrl,
			    'previewImageUrl' => $previewImageUrl ? $previewImageUrl : $imageUrl
			)
		    ]
		);
		$this->push($body);
    	}
    	public function pushVideo($to, $videoUrl, $previewImageUrl){
        	$body = array(
          	  'to' => $to,
          	  'messages' => [
          	      array(
			    'type' => 'video',
			    'originalContentUrl' => $videoUrl,
			    'previewImageUrl' => $previewImageUrl
			)
		    ]
		);
        	$this->push($body);
    	}
    	public function pushAudio($to, $audioUrl, $duration){
		$body = array(
		    'to' => $to,
		    'messages' => [
			array(
			    'type' => 'audio',
			    'originalContentUrl' => $audioUrl,
			    'duration' => $duration
			)
		    ]
		);
		$this->push($body);
	}
    	public function pushLocation($to, $title, $address, $latitude, $longitude){
		$body = array(
		    'to' => $to,
		    'messages' => [
			array(
			    'type' => 'location',
			    'title' => $title,
			    'address' => $address,
			    'latitude' => $latitude,
			    'longitude' => $longitude
			)
		    ]
		);
		$this->push($body);
	}
	
	public function getMessageText(){
		$webhook = $this->webhookEventObject;
		$messageText = $webhook->{"message"}->{"text"}; 
		return $messageText;
	}
	
	public function postbackEvent(){
		$webhook = $this->webhookEventObject;
		$postback = $webhook->{"postback"}->{"data"}; 
		return $postback;
	}
	
	public function getUserId(){
		$webhook = $this->webhookEventObject;
		$userId = $webhook->{"source"}->{"userId"}; 
		return $userId;
	}
	
	public function getUserProfile($userId){			
		$api = $this->apiProfile . $userId;	
		$result = $this->httpPost($api,false);
		return $result;		
		
	}
}
