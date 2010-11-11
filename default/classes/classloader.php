<?php

function __autoload($classname)
{
	switch ($classname)
	{
		case "Memory":
			include Config::CLASSPATH."memory.php";
			break;

		case "UrlParams":
			include Config::CLASSPATH."urlparams.php";
			break;
		
		default :
			if (file_exists(Config::OBJECTSPATH.$classname.".php"))
			{
				include Config::OBJECTSPATH.$classname.".php";
			}
	}
}
