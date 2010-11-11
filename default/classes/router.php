<?php

switch (strtolower(UrlParams::getParam(0)))
{
	case "welcome":
	case "news":
		include Config::PAGESPATH."hello.php";
		break;

	case "profile":
		include Config::PAGESPATH."profile.php";
		break;

	default :
		Headers::setLocation("/news");
}