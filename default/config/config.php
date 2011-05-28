<?php

class Config
{
	static $DEFAULTVIEW		= "index";
	
	static $SYSTEMROOT		= "/var/www/";
	static $PAGESPATH		= "/var/www/pages/";
	static $CONTROLLERSPATH	= "/var/www/controllers/";
	static $VIEWSPATH		= "/var/www/views/";
	
	static $DOMAIN			= "http://example.com/";
	static $WEBROOTPATH		= "http://example.com/path/to/website/";

	static $MEMCACHEDHOST	= "127.0.0.1";
}

Config::$SYSTEMROOT = substr(getcwd(), 0, -7);
Config::$PAGESPATH = Config::$SYSTEMROOT."pages/";
Config::$CONTROLLERSPATH = Config::$SYSTEMROOT."controllers/";
Config::$VIEWSPATH = Config::$SYSTEMROOT."views/";

$prot = "https://";
if($_SERVER["SERVER_PORT"] == "80") {
	$prot = "http://";
}
Config::$DOMAIN = $prot.$_SERVER["HTTP_HOST"]."/";
