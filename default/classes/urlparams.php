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
		$req = $_SERVER["REQUEST_URI"];
		if ($req[0] == "/")
		{
			$req = substr($req, 1);
		}
		$this->params = explode("/", $req);
	}

	public static function getParam($val)
	{
		return strval(UrlParams::getInstance()->params[intval($val)]);
	}
}
