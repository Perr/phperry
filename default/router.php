<?php

switch (strtolower(UrlParams::getParam(0)))
{
	case "":
		Headers::setLocation("/news");
		break;

	case "welcome":
	case "news":
		include Config::PAGESPATH."hello.php";
		break;

	case "profile":
		include Config::PAGESPATH."profile.php";
		break;

	default :
		include Config::PAGESPATH."default".DIRECTORY_SEPARATOR."404.php";
}