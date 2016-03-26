<?php

class ApiUtil
{
	private static $BASE_URL = 'https://www.bitevery.com/api';
	private static $SEPARATOR = '/';
	private static $CONNECTOR = '&';
	
	public static function call_api($resource, $api_code, $method, $params, $data) {
		$request = ApiUtil::$BASE_URL . ApiUtil::$SEPARATOR . $resource . ApiUtil::$SEPARATOR . $api_code . ApiUtil::getParamString($params);
		
		if($method != null && $method != 'GET') {
			return "Unsupported http method:" . strval($method);
		}
		
		return ApiUtil::sendHttpRequest($request);
	}
	
	public static function call_get_api_code($resource, $username, $password) {
		$usernameFull = "username=" . strval($username);
		$passwordFull = "password=" . strval($password);
		$request = ApiUtil::$BASE_URL . ApiUtil::$SEPARATOR . $resource . ApiUtil::$CONNECTOR . $usernameFull . ApiUtil::$CONNECTOR . $passwordFull;
		return ApiUtil::sendHttpRequest($request);
	}
	
	private static function getParamString($params) {
		$result = "";
		foreach($params as $item) {
			$result .= ApiUtil::$CONNECTOR;
			$result .= strval($item);
		}
		return $result;
	}
	
	private static function sendHttpRequest($request) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_URL, $request);
		curl_setopt($curl, CURLOPT_USERAGENT, 'BitEvery-PHP/1.0_beta');
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		$resp = curl_exec($curl);
		curl_close($curl);
		return $resp;
	}
}

?>