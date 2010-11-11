<?php

switch (strtolower(UrlParams::getParam(0)))
{
	case "welcome":
		include Config::PAGESPATH."hello.php";
		break;
}