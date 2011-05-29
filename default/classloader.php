<?php

include "config".DIRECTORY_SEPARATOR."config.php";

class Classes
{
	//const Memory			= "memcache.php";
	const Router			= "router.php";
	const UrlParams			= "classes/urlparams.php";
	const Page				= "layouts/page.php";
	
	const Session			= "classes/session.php";
	const SessionHandler	= "classes/sessionhandler.php";
}

function __autoload($classname)
{
	include Config::$SYSTEMROOT.constant("Classes::".$classname);
}
