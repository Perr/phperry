<?php

class UrlParams
{
	private static $instance;
	public $params;

	/**
	 *
	 * @return UrlParams
	 */
	public static function getInstance()
	{
		if (!self::$instance)
		{
			self::$instance = new self();
		}
		return self::$instance;
	}

	function __construct()
	{
		$req = str_replace(substr($_SERVER["PHP_SELF"], 0, -10), "", $_SERVER["REQUEST_URI"]);
		if ($req[0] == "/")
		{
			$req = substr($req, 1);
		}
		$this->params = explode("/", $req);
	}

	public static function getParam($val)
	{
		$val = intval($val);
		$params = UrlParams::getInstance()->params;
		if(isset($params[$val])) {
			return strval($params[$val]);
		}
		return null;
	}
}
