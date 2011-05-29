<?php

class Config
{
	static $DEFAULTVIEW		= "index";
	
	static $SYSTEMROOT		= "/var/www/-example";
	static $PAGESPATH		= "/var/www/pages/-example";
	static $CONTROLLERSPATH	= "/var/www/controllers/-example";
	static $VIEWSPATH		= "/var/www/views/-example";
	
	static $DOMAIN			= "http://example.com/-example";
	static $WEBROOTPATH		= "http://example.com/path/to/website/-example";

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
