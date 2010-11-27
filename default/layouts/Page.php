<?php

class Page
{
	private static $instance;
	public $output;

	/**
	 * @return Page
	 */
	static function get()
	{
		if (!self::$instance)
		{
			self::$instance = new self();
		}
		return self::$instance;
	}

	function __construct()
	{

	}

	function __destruct()
	{
		echo $this->getHtml().$this->output.$this->getClosingHtml();
	}

	function getHtml()
	{
		return
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Test</title>
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>';
	}

	function getClosingHtml()
	{
		return '
	</body>
</html>';
	}
}