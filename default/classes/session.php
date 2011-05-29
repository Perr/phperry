<?php

abstract class Session
{
	static $userid;
	static $sessionvar;
}

SessionHandler::getInstance();
$sessionreflection = new ReflectionClass("Session");
foreach ($_SESSION as $sesskey => $sessval)
{
	$sessionreflection->setStaticPropertyValue($sesskey, $sessval);
}
