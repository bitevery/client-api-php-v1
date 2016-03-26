<?php
require_once 'apiUtil.php';

class Tip
{
    private static $ENDPOINT = "tip";
    private static $SEPARATOR = "/";
	private static $ACTION_TIPLINK = "tip_link";
	private $FORMAT = "URL";
	private $LOCALE = "en-us";

	public function setFormat($format) {
		$this->FORMAT = $format;
	}
	
	public function getFormat() {
		return $this->FORMAT;
	}
	
	public function setLocale($locale) {
		$this->LOCALE = $locale;
	}
	
	public function getLocale() {
		return $this->LOCALE;
	}
	
    private static function getResourceString($action) {
        return Tip::$ENDPOINT . Tip::$SEPARATOR . $action;
    }
    
 	private static function paramToList($params) {
		$result = Array();		
		foreach($params as $key => $val) {
			$keyValue = strval($key) . "=" .strval($val);
			array_push($result, $keyValue);
		}
		return $result;
	}
	
    public function getTipLink($api_code, $distribution) {
        $resource = tip::getResourceString(Tip::$ACTION_TIPLINK);
		
		$params = Array();
		$params["format"] = $this->getFormat();
		$params["locale"] = $this->getLocale();
		
		if(empty($distribution)) {
			return Tip::getTipLinkSingleReceiver($resource, $api_code, $params);
		}
		else {
			return Tip::getTipLinkMultipleReceivers($resource, $api_code, $params, $distribution);
		}
    }

	private static function getTipLinkSingleReceiver($resource, $api_code, $params) {
		return ApiUtil::call_api($resource, $api_code, "GET", Tip::paramToList($params), null);
	}
	
	private static function getTipLinkMultipleReceivers($resource, $api_code, $params, $distribution) {
		$merge = array_merge($params, $distribution);
		return ApiUtil::call_api($resource, $api_code, "GET", Tip::paramToList($merge), null);
	}
}
?>