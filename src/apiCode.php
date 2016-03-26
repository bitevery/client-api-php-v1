<?php
require_once 'apiUtil.php';

class ApiCode
{
	private static $API_CODE_ENDPOINT = "api_code";
	private static $SEPARATOR = "/";
	
	public static function getApiCode($username, $password) {
		return ApiUtil::call_get_api_code(ApiCode::$API_CODE_ENDPOINT, $username, $password);
	}
}

?>