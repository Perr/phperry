<?php

class SessionHandler
{
	static $instance;

	/**
	 *
	 * @return SessionStoreHandler
	 */
	static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	function  __construct()
	{
		session_start();
	}

	function __destruct()
	{
		$sessionstorereflection = new ReflectionClass("Session");
		$properties = $sessionstorereflection->getStaticProperties();
		foreach ($properties as $propertyname => $propertyval) {
			if(!is_null($propertyval)) {
				$_SESSION[$propertyname] = $propertyval;
			}
		}
	}
}
