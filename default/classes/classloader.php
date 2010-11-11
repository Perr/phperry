<?php

function __autoload($classname)
{
	switch ($classname)
	{
		case "Memory":
			include Config::CLASSPATH."memory".DIRECTORY_SEPARATOR."memcache.php";
			break;

		case "UrlParams":
			include Config::CLASSPATH."urlparams.php";
			break;

		case "Headers":
			include Config::CLASSPATH."headers".DIRECTORY_SEPARATOR."headers.php";
			break;

		case "CONTENTTYPES":
			include Config::CLASSPATH."headers".DIRECTORY_SEPARATOR."contenttypes.php";
			break;
		
		default :
			if (file_exists(Config::OBJECTSPATH.$classname.".php"))
			{
				include Config::OBJECTSPATH.$classname.".php";
			}
	}
}
